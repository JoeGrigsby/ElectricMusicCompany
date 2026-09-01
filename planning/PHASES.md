# Execution phases

Work top to bottom. Each phase ends with a review gate — stop and present
screenshots/diffs to the owner before continuing.

## Phase 0 — Foundations (no site code yet)
- [ ] Owner inputs collected (see DECISIONS.md blockers): WP admin/exports for
      Robin + Steamboat, BigCommerce API token, mockup PNGs into
      `design-system/mockups/`, logo source files.
- [ ] Run `scripts/gather-assets.mjs` for both WP sites; complete
      `scripts/asset-audit.md` checklist; flag gaps (esp. Steamboat workshop
      photos and anything only on the staging domain).
- [ ] Redraw as SVG: Robin logo, Steamboat script logo, Rio Grande logo,
      Big Tex logo, Texas-outline icon.
- [x] Finalize display typeface (DECISIONS.md #3) and lock tokens.css.
- [ ] Build a static styleguide page (plain HTML in `design-system/`) rendering
      every token + shared component; screenshot-approve before porting anywhere.

## Phase 1 — Robin Guitars homepage + theme shell
- [ ] wp-env running with live content export — blocked: this sandbox can't
      reach wordpress.org or run Docker; needs a real WP environment.
- [x] Block theme scaffold, theme.json from tokens.json, header/footer
      patterns — `sites/robin-guitars/theme/robin-2026/`. PHP-linted and
      `theme.json`-validated only; never rendered in live WordPress (see
      DECISIONS.md #4).
- [x] Homepage sections 1–8 per sites/robin-guitars/CLAUDE.md — built as
      block patterns with placeholder photography (DECISIONS.md #11, #12).
- [x] Review gate: side-by-side vs mockup, mobile + desktop — via a static
      QA mirror (`sites/robin-guitars/preview/index.html`) since live
      WordPress isn't reachable here; screenshotted at 390px and 1280px.

## Phase 2 — Robin interior pages + launch prep
- [ ] 6 model pages, History, Artists, galleries, vintage catalogs, contact/quote.
- [ ] REDIRECTS.md map implemented and tested (curl each old URL → 301 → slug).
- [ ] Quote form end-to-end test. Lighthouse mobile pass. Launch checklist in
      BUILD_SPEC.md §6.

## Phase 3 — Steamboat homepage + interior (small site, one phase)
- [ ] Theme scaffold reusing Robin patterns where identical (footer band, hero).
- [ ] Homepage per sites/steamboat-amps/CLAUDE.md; Amps, Cabinets, Custom,
      Repairs, Contact, Quote.
- [ ] Cross-domain + staging-URL purge verified (grep the built output).
- [ ] Review gate + launch checklist.

## Phase 4 — Rio Grande Stencil phase 1 (global chrome + homepage)
- [ ] stencil-cli running against live store with downloaded current theme.
- [ ] Tokens into config.json/SCSS; header/footer; homepage per
      sites/rio-grande/CLAUDE.md.
- [ ] Push as inactive preview theme; owner reviews on preview URL.

## Phase 5 — Rio Grande phase 2 (catalog templates)
- [ ] PLP, PDP (multi-option product tested), blog, search, cart styling,
      support pages.
- [ ] Full pre-push verification list; owner activates.

## Phase 6 — Family polish
- [ ] Cross-links between all sites verified both directions.
- [ ] Consistent og:image set per brand.
- [ ] Final Lighthouse + accessibility pass on all three (visible focus,
      reduced motion, contrast on orange-over-cream checked).
