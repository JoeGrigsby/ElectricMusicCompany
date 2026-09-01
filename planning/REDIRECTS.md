# Robin Guitars — 301 redirect map

Built from the live nav audit (Sept 2026). The nav currently links to raw
`?page_id=` URLs; pretty permalinks exist for at least the model pages
(`/machete/`, `/history/` confirmed live). **Verify each target slug resolves on
the live site before shipping** — slugs marked `VERIFY` are inferred from page
titles and must be confirmed against the WP export (wp_posts.post_name).

| Old URL | Target | Status |
|---|---|---|
| /?page_id=127 | /avalon/ | confirmed pattern |
| /?page_id=124 | /machete/ | confirmed live |
| /?page_id=126 | /medley/ | confirmed pattern |
| /?page_id=123 | /ranger/ | confirmed pattern |
| /?page_id=162 | /rawhide/ | confirmed pattern |
| /?page_id=125 | /savoy/ | confirmed pattern |
| /?page_id=316 | /guitar-gallery/ | VERIFY |
| /?page_id=494 | /avalon-gallery/ | VERIFY |
| /?page_id=495 | /machete-gallery/ | VERIFY |
| /?page_id=496 | /medley-gallery/ | VERIFY |
| /?page_id=497 | /ranger-gallery/ | VERIFY |
| /?page_id=498 | /rawhide-gallery/ | VERIFY |
| /?page_id=499 | /savoy-gallery/ | VERIFY |
| /?page_id=314 | /vintage-catalogs/ | VERIFY |
| /?page_id=581 | /1982-catalog/ | VERIFY |
| /?page_id=582 | /1983-catalog/ | VERIFY |
| /?page_id=583 | /1985-catalog/ | VERIFY |
| /?page_id=584 | /1988-catalog/ | VERIFY |
| /?page_id=585 | /1990-catalog/ | VERIFY |
| /?page_id=586 | /1992-catalog/ | VERIFY |
| /?page_id=587 | /1994-catalog/ | VERIFY |
| /?page_id=588 | /1998-catalog/ | VERIFY |
| /?page_id=315 | /classic-images/ | VERIFY |
| /home/ | / | nav links "Home" to /home/ — canonicalize to root |

Implementation notes:
- WordPress resolves `?page_id=` automatically when permalinks are pretty, but
  don't rely on that alone — external links and Google's index carry the ugly
  URLs, so explicit 301s (Redirection plugin or .htaccess RewriteCond on
  QUERY_STRING) make the canonical intent unambiguous.
- After shipping: crawl the new site (e.g. `wget --spider -r`) and confirm zero
  internal links emit `page_id`.
- Steamboat audit found no `page_id` links in nav; re-check interior pages
  during Phase 3.
