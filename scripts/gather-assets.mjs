#!/usr/bin/env node
/**
 * gather-assets.mjs — crawl the two WordPress sites, collect image URLs,
 * strip CDN wrappers, and download originals into ./assets-raw/<site>/.
 *
 * Usage:  node scripts/gather-assets.mjs [robin|steamboat|all]
 * Needs:  Node 18+ (built-in fetch). No npm dependencies.
 *
 * Notes for Claude Code:
 * - Written blind against the live sites; expect to adjust selectors/regexes
 *   after a first run. Run with one site first and inspect manifest.json.
 * - Be polite: sequential downloads with a small delay. These are small-shop
 *   servers.
 * - Rio Grande assets are NOT gathered here — pull those from the theme via
 *   `stencil download` and the store control panel instead.
 */

import { mkdir, writeFile } from "node:fs/promises";
import { createHash } from "node:crypto";
import path from "node:path";

const SITES = {
  robin: {
    base: "https://robinguitars.com",
    // Seed pages: home + nav targets found in the Sept 2026 audit.
    seeds: [
      "/", "/history/", "/artists/", "/hometown-heroes/", "/contact/",
      "/get-a-quote/", "/avalon/", "/machete/", "/medley/", "/ranger/",
      "/rawhide/", "/savoy/",
      // page_id URLs still resolve; include so gallery/catalog images are found
      "/?page_id=316", "/?page_id=494", "/?page_id=495", "/?page_id=496",
      "/?page_id=497", "/?page_id=498", "/?page_id=499", "/?page_id=314",
      "/?page_id=581", "/?page_id=582", "/?page_id=583", "/?page_id=584",
      "/?page_id=585", "/?page_id=586", "/?page_id=587", "/?page_id=588",
      "/?page_id=315",
    ],
  },
  steamboat: {
    base: "https://steamboatamps.com",
    seeds: ["/", "/repairs/", "/amps/", "/cabinets-3/", "/custom/", "/contact/", "/request-a-quote/"],
  },
};

const DELAY_MS = 750;
const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

/** Unwrap Jetpack/Photon CDN and size-suffixed WP thumbs to get the original. */
function normalizeImageUrl(raw, base) {
  let u;
  try { u = new URL(raw, base); } catch { return null; }

  // i0.wp.com/robinguitars.com/wp-content/... -> https://robinguitars.com/wp-content/...
  if (/^i\d+\.wp\.com$/.test(u.hostname)) {
    const rest = u.pathname.replace(/^\//, "");
    u = new URL("https://" + rest);
  }
  u.search = ""; // drop ?fit=&ssl= etc.

  // Strip WP-generated size suffix: foo-1024x535.png -> foo.png
  // (Keep the sized URL as fallback in the manifest — original may 404.)
  const sized = u.href;
  const original = sized.replace(/-\d{2,4}x\d{2,4}(\.[a-z]{3,4})$/i, "$1");
  return { original, sized };
}

function extractImageUrls(html, base) {
  const urls = new Set();
  const attrRe = /(?:src|href|data-src|data-full)=["']([^"']+\.(?:png|jpe?g|webp|gif|svg))(?:\?[^"']*)?["']/gi;
  let m;
  while ((m = attrRe.exec(html))) urls.add(m[1]);
  // srcset entries
  const srcsetRe = /srcset=["']([^"']+)["']/gi;
  while ((m = srcsetRe.exec(html))) {
    for (const part of m[1].split(",")) {
      const u = part.trim().split(/\s+/)[0];
      if (/\.(png|jpe?g|webp|gif|svg)(\?|$)/i.test(u)) urls.add(u);
    }
  }
  return [...urls].map((u) => normalizeImageUrl(u, base)).filter(Boolean);
}

async function fetchText(url) {
  const res = await fetch(url, { headers: { "user-agent": "asset-gather/1.0 (site redesign, owner-authorized)" } });
  if (!res.ok) throw new Error(`${res.status} ${url}`);
  return res.text();
}

async function download(url, dir) {
  const res = await fetch(url, { headers: { "user-agent": "asset-gather/1.0 (site redesign, owner-authorized)" } });
  if (!res.ok) return { url, ok: false, status: res.status };
  const buf = Buffer.from(await res.arrayBuffer());
  const hash = createHash("sha1").update(buf).digest("hex").slice(0, 8);
  const name = path.basename(new URL(url).pathname);
  const file = path.join(dir, `${hash}-${name}`);
  await writeFile(file, buf);
  return { url, ok: true, file, bytes: buf.length };
}

async function run(siteKey) {
  const site = SITES[siteKey];
  const outDir = path.join("assets-raw", siteKey);
  await mkdir(outDir, { recursive: true });

  const found = new Map(); // original -> {original, sized, pages:[]}
  const warnings = [];

  for (const seed of site.seeds) {
    const pageUrl = site.base + seed;
    try {
      const html = await fetchText(pageUrl);
      // Flag audit problems while we're here:
      if (html.includes("mybluehost.me")) warnings.push(`STAGING URL LEAK on ${pageUrl}`);
      if (siteKey === "steamboat" && html.includes("robinguitars.com/wp-content"))
        warnings.push(`CROSS-DOMAIN ASSET on ${pageUrl}`);
      for (const entry of extractImageUrls(html, site.base)) {
        const rec = found.get(entry.original) ?? { ...entry, pages: [] };
        rec.pages.push(seed);
        found.set(entry.original, rec);
      }
      console.log(`crawled ${pageUrl} — ${found.size} unique images so far`);
    } catch (e) {
      warnings.push(`CRAWL FAILED ${pageUrl}: ${e.message}`);
    }
    await sleep(DELAY_MS);
  }

  const results = [];
  for (const rec of found.values()) {
    let r = await download(rec.original, outDir);
    if (!r.ok && rec.sized !== rec.original) {
      r = await download(rec.sized, outDir); // fallback to sized rendition
      r.note = "original 404 — sized fallback";
    }
    results.push({ ...rec, ...r });
    console.log(r.ok ? `saved ${r.file} (${r.bytes}b)` : `FAILED ${rec.original}`);
    await sleep(DELAY_MS);
  }

  await writeFile(
    path.join(outDir, "manifest.json"),
    JSON.stringify({ site: site.base, generated: new Date().toISOString(), warnings, images: results }, null, 2)
  );
  console.log(`\n${siteKey}: ${results.filter((r) => r.ok).length}/${results.length} downloaded.`);
  if (warnings.length) console.log("WARNINGS:\n" + warnings.join("\n"));
}

const target = process.argv[2] ?? "all";
const keys = target === "all" ? Object.keys(SITES) : [target];
for (const k of keys) {
  if (!SITES[k]) { console.error(`Unknown site "${k}". Use: robin | steamboat | all`); process.exit(1); }
  await run(k);
}
