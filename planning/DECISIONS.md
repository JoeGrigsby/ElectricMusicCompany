# Decisions log

Claude Code: append new open questions here instead of guessing on brand,
content, pricing, or legal matters. Mark resolved items with the answer + date.

## Blockers (needed before Phase 0 completes)

1. **[OPEN] Access.** WP admin logins + full exports (DB + uploads) for
   robinguitars.com and steamboatamps.com; BigCommerce store API token
   (Themes: modify scope) for riograndepickups.com.
2. **[OPEN] Mockup files.** Final PNGs (or Figma) for all three homepages into
   `design-system/mockups/` as robin-home.png, steamboat-home.png,
   riogrande-home.png.
4. **[OPEN] Robin/Steamboat platform confirmation.** Spec recommends staying on
   WordPress with new block themes (staff keep editing; forms/IG keep working).
   Confirm, or switch plan to static (Astro) per BUILD_SPEC.md §2 Option B.

## Content questions

5. **[OPEN] "15% off special"** in Robin's Rio Grande cross-promo band — is this
   a real standing offer? Needs promo code/mechanics or softer copy.
6. **[OPEN] Steamboat workshop photography** — mockup collage images look like
   Instagram pulls; need print-quality originals or a reshoot list.
7. **[OPEN] Hero photography rights** — Savoy Classic hero, Steamboat Classic 18
   hero, Texas Humbucker macro: confirm these exist at full resolution and
   who shot them (credit requirements — Michelle Shiers is credited on Mat
   Mitchell shots).
8. **[OPEN] Rio Grande header utilities** — keep wishlist + compare links, or
   simplify header to search/account/cart per the cleaner mockup nav?
9. **[OPEN] Newsletter platform(s)** — what ESP backs Robin's signup and Rio
   Grande's BigCommerce newsletter form? Wire real integrations, not dummies.
10. **[OPEN] Big Tex** — footer-link only, or is a matching refresh planned
    later? (Affects whether the shared footer band ships as a reusable package.)

## Resolved

- Rio Grande must remain on BigCommerce; redesign is a Stencil theme.
  (Resolved by platform audit, Sept 2026.)
- All three sites share one token system with per-brand copy/imagery.
  (Resolved by approved mockups.)
- **Display + body typefaces.** Bebas Neue (display, heavy condensed
  uppercase) + Inter (body). Both free/OFL, no license purchase needed.
  Font files self-hosted at `design-system/fonts/` and wired into
  `tokens.css` via `@font-face`; each site copies them into its own theme
  assets at build time per the self-hosted-assets rule. `tokens.css` /
  `tokens.json` updated accordingly. (Resolved by owner, Sept 2026.)
- **Palette confirmed.** Bone White `#F5F1E8` (background), Carbon Black
  `#111111` (dark/stage), Burnt Orange `#C66A2A` (signature accent),
  Copper `#C4421A` (Rio Grande pickup windings / family connection),
  Walnut `#4A3628` (fingerboards, wood grain), Aged Brass `#9C7A41`
  (premium highlight). Replaces the placeholder accent hex in tokens.css;
  new `--copper`, `--walnut`, `--brass` tokens added for the three
  material accents. `--text-muted-dark` / `--text-muted-light` remain
  placeholders pending resample from final assets. (Resolved by owner,
  Sept 2026.)
