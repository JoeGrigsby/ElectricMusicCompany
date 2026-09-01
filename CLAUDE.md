# Houston Guitar Family — Website Redesigns

Monorepo workspace for redesigning three related sites owned by the same Houston shop
(3526 E TC Jester Blvd, Houston, TX 77018 · (713) 957-0470):

| Site | Current platform | Rebuild as | Directory |
|---|---|---|---|
| robinguitars.com | WordPress (Bluehost) | WordPress block theme | `sites/robin-guitars/` |
| steamboatamps.com | WordPress (Bluehost) | WordPress block theme | `sites/steamboat-amps/` |
| riograndepickups.com | BigCommerce (Stencil) | Stencil theme (Cornerstone fork) | `sites/rio-grande/` |

Read `BUILD_SPEC.md` (full audit + architecture) before starting any site work.
Each site directory has its own CLAUDE.md with site-specific rules. `planning/PHASES.md`
is the task backlog — work it top to bottom unless told otherwise.

## Non-negotiables (apply to all three sites)

1. **One design system, three applications.** All visual values come from
   `design-system/tokens.css` / `tokens.json`. Never hardcode a color, font stack,
   or radius in a site — reference the token. If a needed token doesn't exist, add it
   to the design-system first, then use it.
2. **Approved mockups are the source of truth for layout.** They live in
   `design-system/mockups/` (drop the three homepage PNGs there). Match them; don't
   invent alternative layouts. Where a mockup doesn't cover a page (interior pages),
   extend the same system conservatively.
3. **Self-hosted assets only.** No hotlinking between the three domains, no
   `i0.wp.com` Jetpack wrappers, no `cdn11.bigcommerce.com` references inside the WP
   sites, and absolutely no `*.mybluehost.me` staging URLs. The current sites violate
   all of these — the rebuilds must not.
4. **Rio Grande is a live store.** Never modify checkout, cart, account, or catalog
   data. Theme work only. Push to an INACTIVE preview theme; the owner activates.
5. **Quote forms are the conversion path** on Robin and Steamboat. Any change that
   touches Request a Quote must be tested end-to-end before commit.
6. **Preserve SEO.** Keep/improve existing titles and meta descriptions. Robin needs
   the 301 map in `planning/REDIRECTS.md` shipped with launch.

## Shared brand facts (use verbatim)

- Family of four brands: Robin Guitars, Rio Grande Pickups, Steamboat Amps, Big Tex
  (bigtexguitar.com — footer link only, not being redesigned).
- Footer NAP on every site: `(713) 957-0470 · 3526 E TC Jester Blvd, Houston, Texas 77018`
- Emails: sales@robinguitars.com · info@steamboatamps.com · sales@riograndepickups.com
- Steamboat public hours (footer + Repairs page): Tue–Fri 11am–6pm, Sat 12pm–4pm
- Taglines already approved in mockups:
  - Robin: "Built one at a time. Played for a lifetime."
  - Steamboat: "Built different. Played loud."
  - Rio Grande: "Great Tone Starts Here." / "The Original Hot Texas Pickup"
- The Texas-outline + "HAND CRAFTED IN HOUSTON, TEXAS" lockup appears on all three heroes.

## Workflow conventions

- Conventional commits, scoped by site: `feat(robin): model grid section`.
- Screenshot every completed section at 390px and 1280px and compare against the
  mockup before marking a task done.
- Log open questions and owner decisions in `planning/DECISIONS.md` instead of
  guessing on brand/content matters (pricing, copy claims, artist names, photo rights).
- Run `node scripts/gather-assets.mjs` output through `scripts/asset-audit.md`
  checklist before using any downloaded image in a build.
