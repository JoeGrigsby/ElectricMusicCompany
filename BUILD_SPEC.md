# Robin Guitars / Steamboat Amps / Rio Grande Pickups — Redesign Build Spec

Prepared from a source audit of the three live sites (September 2026) plus the approved homepage mockups. Intended to be dropped into the Claude Code workspace as the project brief.

---

## 1. Current-state audit

### robinguitars.com
- **Platform:** WordPress (Bluehost). Plugins observed: Google Site Kit 1.186, Smash Balloon Instagram Feed, Jetpack image CDN (assets served via `i0.wp.com`).
- **Content model:** 6 guitar models (Avalon, Machete, Medley, Ranger, Rawhide, Savoy), History, Artists (+ Hometown Heroes), Guitar Gallery (per-model sub-galleries), Vintage Catalogs (1982–1998, 8 catalogs), Classic Images, Contact, Request a Quote. Homepage features Mat Mitchell Machete launch, model grid, Instagram feed, YouTube embed.
- **Defects to fix:**
  - Navigation links use raw `?page_id=NNN` URLs (e.g. `/?page_id=127` for Avalon) even though pretty permalinks exist (`/avalon/`, `/machete/` resolve). Build a redirect map: every `?page_id=` → its slug, 301.
  - Source logo file is 7062×2092px PNG served through Jetpack CDN. All logos need properly sized, self-hosted exports (SVG preferred for logos).
  - Instagram feed renders placeholder GIFs pre-JS.

### steamboatamps.com
- **Platform:** WordPress, same host and plugin stack as Robin.
- **Content model:** Small — Home, Repairs, Amps, Cabinets, Custom, Contact, Request a Quote. Repairs is a major business line: showroom hours (Tue–Fri 11–6, Sat 12–4) and address must stay prominent. Founded 2009 ("Making Houston louder since 2009").
- **Defects to fix:**
  - Footer logos hotlinked from `robinguitars.com/wp-content/...` — cross-domain dependency. Self-host everything.
  - One image references the Bluehost staging domain `wgk.eln.mybluehost.me` — broken/fragile hardcoded URL. Audit all image srcs for staging-domain leftovers before launch.

### riograndepickups.com
- **Platform:** **BigCommerce, Stencil theme** (`meta-platform: bigcommerce.stencil`). This is a live store: customer accounts, cart, wishlist, compare, promo banner (free shipping over $200), 100+ SKUs with option variants (covers, wire types), blog ("Tone Tips"), newsletter signup.
- **Content model:** Deep category tree — Guitar (Strat, Tele, P-90, Humbuckers, Mini-Humbuckers, ASAT, Jazzmaster, Jaguar, Gretsch, 7-String, El Coyote signature, Specialty) and Bass (J-Bass, P-Bass, Humbuckers, Combo Sets, 5-String, Specialty), each split singles/sets. Plus Hardware & More, Tone Twister, Guitars For Sale, Merch, Tone Tips, About/Artists/Builders, Support (FAQ, Wiring Diagrams, Tone Finder, Shipping, Contact).
- **Implication:** The redesign is a **Stencil theme project**, not an HTML rebuild. Checkout, cart, accounts, and the product catalog stay on BigCommerce.

---

## 2. Architecture decisions

### Rio Grande — Stencil theme (fixed)
- Fork **Cornerstone** (current markup matches it) or start from the store's downloaded active theme via `stencil download`.
- Local dev with `stencil-cli`: `npm i -g @bigcommerce/stencil-cli`, `stencil init` with a store API token (Themes scope), `stencil start` to live-preview against real catalog data, `stencil bundle` / `stencil push` to ship.
- Apply the shared design tokens in the theme's SCSS (`assets/scss/settings/`) and theme `config.json` variables.
- Rebuild homepage regions to match the mockup: hero (single hero replaces the 5-slide carousel — "Great Tone Starts Here" + Texas Humbucker photo + MODEL SHOWN chip), Tone Twister band (cream), Artist Spotlight / El Coyote split band (dark). Keep category tree, product templates, and checkout untouched in phase 1; restyle product cards/PLP/PDP in phase 2.
- Do not remove: promo banner slot, account/cart/search header actions, wishlist/compare (confirm with owner whether compare is worth keeping — it clutters the header).

### Robin + Steamboat — recommendation: WordPress block themes
Two viable paths; pick one before generating code.

**Option A — stay WordPress (recommended).** Build each mockup as a custom block theme (`theme.json` carries the design tokens). Content (models, galleries, catalogs, posts) stays where it is; the quote forms and Instagram Feed plugin keep working; shop staff keep their editing workflow. Claude Code builds the theme locally against a `wp-env` or LocalWP instance seeded with an export of the live DB.

**Option B — go static.** Astro (or Eleventy) builds, hosted on Netlify/Cloudflare Pages. Faster and zero WP maintenance, but requires: a form backend for Request a Quote (Formspree / Netlify Forms), an Instagram embed service (Behold, SnapWidget) or a build-time fetch, and a content migration for galleries + 8 vintage catalogs. Only choose this if nobody needs to edit content through a CMS.

Either way, both sites are built from the same shared design system (below) with per-brand overrides.

---

## 3. Shared design system (from the mockups)

All three homepages share a visual family. Extract once, apply three times. Values below are read from the mockups — sample the final assets to confirm exact hexes.

**Tokens (CSS custom properties / theme.json / Stencil SCSS vars):**
- `--color-ink`: near-black page ground for dark bands (~#171310 warm black)
- `--color-cream`: light band ground (~#F4EFE6)
- `--color-accent`: burnt orange (~#C9702E–#D07A33 range; buttons, highlighted headline words, eyebrows)
- `--color-paper`: white text on dark
- Type: heavy condensed uppercase display face for headlines (mockups use something in the Archivo/Oswald/Tungsten family — pick one licensed face and use it on all three sites); clean sans for body. Rio Grande's "Tone Twister" mark uses its own slab/western display — that's logo art, not a system font.
- Radius: pill/rounded buttons (~8–10px), otherwise square-cornered imagery.

**Shared components (build once as patterns, port per platform):**
1. **Hero:** left column headline (two-tone: white + orange line), short positioning paragraph, orange CTA button, "HAND CRAFTED IN HOUSTON, TEXAS" lockup with Texas-outline icon; right side full-bleed product photo with a **"MODEL SHOWN" chip** (orange eyebrow + model name on translucent dark).
2. **Texas badge lockup** (icon + two-line text) — identical on all three.
3. **Section eyebrow:** small orange uppercase label with trailing rule (e.g. "THE WORKSHOP ————", "ARTIST SPOTLIGHT ————").
4. **Orange CTA button** — same padding/radius/weight everywhere.
5. **Cross-brand band/footer:** all four brand logos (Rio Grande, Robin, Steamboat, Big Tex) linking across the family, shared NAP: (713) 957-0470 · 3526 E TC Jester Blvd, Houston, TX 77018, per-brand email. Steamboat footer also carries public hours.
6. **Card grid** (Robin model grid, Steamboat amp lineup): photo, name, one-line descriptor.
7. **Instagram strip** (Robin, Steamboat) and **newsletter signup** (Robin, Rio Grande).

**Cross-promotion blocks (per mockups):** Robin's homepage promotes Rio Grande ("15% off special") and Steamboat; keep these as real links between properties.

---

## 4. Per-site page inventory for the rebuild

**Robin:** Home, 6 model pages, History, Artists, Hometown Heroes, Guitar Gallery + 6 model galleries, Vintage Catalogs index + 8 catalog pages, Classic Images, Contact, Request a Quote. Preserve press-release outlinks (guitarpr.com) and YouTube/Instagram/Reddit/Facebook links.

**Steamboat:** Home, Amps, Cabinets, Custom, Repairs, Contact, Request a Quote. Mockup adds a "The Workshop" band and an amp-lineup strip — source new photography or pull from Instagram archive.

**Rio Grande:** Homepage template + global header/footer restyle in phase 1. Phase 2: category listing, product detail, Tone Tips blog templates. Keep BigCommerce-managed URLs as-is (no redirects needed if theme-only).

---

## 5. Asset gathering (Claude Code tasks)

1. Crawl `robinguitars.com/wp-content/uploads/` and `steamboatamps.com/wp-content/uploads/` referenced images; strip Jetpack CDN wrappers (`i0.wp.com/...?fit=...&ssl=1`) and fetch originals from the source domain.
2. Rio Grande imagery lives on `cdn11.bigcommerce.com/s-8luld6gwij/` — collect carousel/product/brand images at max stencil size (`1280w` in URLs can often be bumped to `original`).
3. Export/redraw all four brand logos as SVG. Redraw the Texas-outline icon as SVG (used everywhere).
4. Generate responsive image sets (AVIF/WebP + fallback) for hero photography; heroes in the mockups are full-bleed and will dominate page weight.
5. Flag any asset whose only source is the Bluehost staging domain — request originals from the owner.

## 6. Launch checklist / fixes to carry through

- [ ] 301 map for all `?page_id=NNN` URLs on Robin (and any on Steamboat) → slug URLs.
- [ ] No cross-domain asset references between the sites; each domain self-hosts.
- [ ] No staging-domain (`*.mybluehost.me`) URLs anywhere in output.
- [ ] Preserve titles/meta descriptions or improve them; keep `og:image` per site (Robin's current one is 1200×627, fine).
- [ ] Forms tested end-to-end (quote requests are the primary conversion on Robin and Steamboat).
- [ ] Instagram feeds lazy-loaded below the fold; no placeholder-GIF layout shift.
- [ ] Lighthouse pass on mobile — current sites are image-heavy WP defaults; target LCP < 2.5s on the heroes.
- [ ] Stencil theme bundled and pushed to a **preview** (inactive) theme first; verify checkout/cart/account flows unstyled-region by region before activation.
