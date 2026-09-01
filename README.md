# ElectricMusicCompany

Monorepo workspace for redesigning three related Houston guitar-shop sites
(Robin Guitars, Steamboat Amps, Rio Grande Pickups) under one shared design
system. `CLAUDE.md` is the workspace entry point — read it (and
`BUILD_SPEC.md`) before starting any site work.

```
index.html                     Family hub page — links out to all four brand sites
CLAUDE.md                      Workspace rules, loaded every session
BUILD_SPEC.md                  Full audit, architecture, page inventories, launch checklist
design-system/
  tokens.css                   Shared design tokens + component contracts (source of truth)
  tokens.json                  Machine-readable mirror for theme.json / Stencil config
  fonts/                       Self-hosted Bebas Neue + Inter (woff2)
  styleguide.html               Static preview of every token + shared component
  mockups/                     Approved homepage mockups (PNG/JPG) + *-preview.html wrappers
sites/
  robin-guitars/CLAUDE.md      WP block theme rules, homepage build order, content inventory
  steamboat-amps/CLAUDE.md     Same, plus repairs-page emphasis and asset-purge rules
  rio-grande/CLAUDE.md         Stencil workflow, store-safety rules, two-phase plan
scripts/
  gather-assets.mjs            Crawls both WP sites, de-CDNs and downloads originals (Node 18+, no deps)
  asset-audit.md               Checklist to run on the crawl output
planning/
  PHASES.md                    Ordered backlog with review gates
  REDIRECTS.md                 Robin ?page_id → slug 301 map
  DECISIONS.md                 Blockers + open questions; append, never guess
```

## Status

Phase 0 (foundations) is in progress — see `planning/PHASES.md`. Typeface
(Bebas Neue + Inter) and the brand palette are resolved; see
`planning/DECISIONS.md`.
