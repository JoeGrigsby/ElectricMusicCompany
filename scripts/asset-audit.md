# Asset audit checklist (run after gather-assets.mjs)

For each site's `assets-raw/<site>/manifest.json`:

- [ ] Zero entries with `ok: false` left unresolved — retry, find alternate
      source, or log in DECISIONS.md as "need original from owner".
- [ ] Review `warnings[]` — every staging-URL leak and cross-domain asset gets a
      replacement plan before Phase 1/3 builds.
- [ ] Hero candidates identified per site at ≥2000px width (Savoy Classic,
      Steamboat Classic 18, Texas Humbucker macro). If largest capture is
      smaller, request originals (DECISIONS.md #7).
- [ ] Logos: discard raster captures; SVG redraws replace them (Phase 0 task).
- [ ] Instagram-sourced photos (Steamboat workshop collage) flagged — IG
      renditions are ≤1080px and often too compressed for hero/band use.
- [ ] Photographer credits carried into a `credits.md` next to the manifest
      (known: Michelle Shiers — Mat Mitchell photos; Ken Taylor — Machete logo;
      Daniel Martin Diaz — El Coyote art).
- [ ] Dedupe by content hash (filenames are prefixed with sha1-8 — identical
      prefixes = identical files).
- [ ] Output derivatives pipeline decided: AVIF + WebP + JPEG fallback,
      responsive widths 480/960/1600/2400 for heroes.

Rio Grande: assets come from `stencil download` (theme bundle) + the
BigCommerce control panel image manager, not this crawler. Same checklist
applies once collected.
