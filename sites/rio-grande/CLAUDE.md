# riograndepickups.com — BigCommerce Stencil theme redesign

Mockup: `design-system/mockups/riogrande-home.png` (approved). Root CLAUDE.md rules apply.
**This is a live store. Theme work only. Never touch catalog, pricing, checkout, or
customer data. All pushes go to an INACTIVE preview theme.**

## Environment setup (blockers — need from owner before starting)

1. Store API account with **Themes: modify** scope → client id + access token.
2. Confirm current theme name/version (likely Cornerstone fork) — pull it with
   `stencil download` rather than starting from stock, so existing template
   customizations aren't lost.

Then:
```
npm i -g @bigcommerce/stencil-cli
stencil init            # uses the token; creates .stencil / secrets — gitignore them
stencil start           # live local preview against real store data
stencil bundle && stencil push   # push as new INACTIVE theme, owner activates
```

## Phase 1 — global chrome + homepage (this phase only, then stop for review)

- Map `design-system/tokens.json` into `config.json` theme settings and
  `assets/scss/settings/` overrides. No hardcoded colors in templates.
- Header: keep promo banner slot (free-shipping message), search, account, cart.
  Nav per mockup: READY TO SHIP · GUITAR · BASS · HARDWARE & MORE · TONE TWISTER ·
  GUITARS FOR SALE · MERCH · TONE TIPS · ABOUT. Category tree data stays untouched;
  this is presentation-layer nav styling only. Raise to DECISIONS.md whether
  compare/wishlist links stay in the header.
- Homepage (`templates/pages/home.html` + components):
  1. Hero replaces the 5-slide carousel — "Great Tone / Starts / Here." (lines
     2–3 accent), intro copy, `Shop pickups` CTA, Texas lockup, Texas Humbucker
     photo + MODEL SHOWN chip. Keep the carousel component available but
     unused (owner may want seasonal slides back).
  2. Tone Twister band (cream) — Tone Twister logo art + product group photo,
     links to /tone-twister/.
  3. Artist Spotlight / El Coyote split band (dark) — Mat Mitchell quote
     ("Rio Grande pickups give me the clarity, punch, and output I need to cut
     through any mix. They are simply the best.") + EL COYOTE PICKUP SET
     `Learn More` → /mat-mitchell-el-coyote-pickup-set/.
  4. Keep below the mockup fold (restyled, not removed): Shop by Category,
     Trending Now product grid, Tone Tips latest, About band, newsletter form.
- Footer: four-brand band + NAP + legal links (Privacy, Do Not Sell or Share,
  Shipping & Returns, Sitemap) — legal links are required, do not drop.

## Phase 2 — catalog templates (separate review gate)

Category listing, product detail (option variants: covers, wire types — test a
multi-option product like Texas Barbeque Set end to end), Tone Tips blog list +
post, search results, cart page styling. Support pages (FAQ, Wiring Diagrams,
Tone Finder) restyle last.

## Verification before any push

- `stencil bundle` passes with zero template errors.
- Local checkout smoke test: add to cart → cart → begin checkout renders.
- Screenshot home/category/product at 390px and 1280px vs mockup.
- Confirm no URLs changed (theme-only work should change none).
