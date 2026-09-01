# robinguitars.com — WordPress block theme rebuild

Mockup: `design-system/mockups/robin-home.png` (approved). Root CLAUDE.md rules apply.

## Environment

- Local dev: `wp-env` (add `.wp-env.json` here) or LocalWP, seeded from a live
  export (ask owner for WP admin + DB export, or use WP All-Export).
- Theme lives in `theme/robin-2026/`. Block theme: `theme.json` consumes
  `design-system/tokens.json` values; do not restyle via plugin CSS.
- Keep active plugins working: Smash Balloon Instagram Feed, the existing quote
  form plugin (identify it from the export before touching form markup), Site Kit.

## Homepage build order (matches mockup top→bottom)

1. Hero — "BUILT ONE AT A TIME. / PLAYED FOR A LIFETIME." (second line accent),
   intro line, `Explore our Guitars` CTA, Texas lockup, Savoy Classic photo with
   MODEL SHOWN chip.
2. Model strip — 6 cards: Avalon "Classic Versatility", Machete "Modern Edge",
   Medley "Bold & Powerful", Ranger "Vintage Soul", RAWHIDE "Distinct Flair",
   SAVOY "Large body sound". Each links to its model page.
3. Artist Spotlight — Mat Mitchell Machete: "FOR THOSE WHO REFUSE TO SOUND LIKE
   EVERYONE ELSE." + Machete logo art + launch copy. Link press release:
   https://guitarpr.com/robin-guitars-launches-mat-mitchell-signature-machete/
   Photo credit Michelle Shiers, logo credit Ken Taylor — keep credits.
4. Rio Grande cross-promo band — "GREAT TONE STARTS HERE." + `15% off special`
   CTA → riograndepickups.com. CONFIRM the 15% offer is real before launch
   (DECISIONS.md #5).
5. Steamboat cross-promo band — "BUILT DIFFERENT. PLAYED LOUD." + Learn More →
   steamboatamps.com.
6. Instagram strip — @robinguitars, 5–6 tiles, lazy-loaded, no layout shift.
7. Newsletter signup — "STAY IN TUNE." (identify current ESP from the export;
   wire the real form, not a dummy).
8. Footer — four-brand logo band + NAP + social (FB, IG, YouTube, Reddit).

## Interior pages (extend the system, no mockups exist)

Models ×6, History, Artists, Hometown Heroes, Guitar Gallery + 6 sub-galleries,
Vintage Catalogs index + 8 catalog pages (1982, 1983, 1985, 1988, 1990, 1992,
1994, 1998), Classic Images, Contact, Request a Quote. Migrate content as-is
first; propose copy edits separately.

## Site-specific hard rules

- Ship `planning/REDIRECTS.md` Robin map as 301s (redirection plugin or
  .htaccess) in the same deploy as the new theme.
- Fix permalink settings so nav emits slugs, never `?page_id=`.
- All logos as SVG in the theme; delete dependence on the 7062px PNG original.
- Heritage matters: "since 1982", SRV/White Zombie history — do not strip the
  History/Vintage Catalog content, it's a differentiator.
