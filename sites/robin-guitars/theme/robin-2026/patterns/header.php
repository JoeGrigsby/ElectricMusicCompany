<?php
/**
 * Site header. A template part (parts/header.html) can't run PHP, so the
 * logo — which needs get_theme_file_uri() — lives here as a pattern and
 * the template part just references it.
 */
$logo = esc_url( get_theme_file_uri( 'assets/img/robin-logo.png' ) );

return array(
	'title'      => __( 'Robin Header', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"header","layout":{"type":"constrained","contentSize":"90rem"},"style":{"color":{"background":"#111111"},"spacing":{"padding":{"top":"1rem","bottom":"1rem","left":"var:preset|spacing|gutter","right":"var:preset|spacing|gutter"}}}} -->
<header class="wp-block-group" style="background-color:#111111;padding-top:1rem;padding-right:var(--wp--preset--spacing--gutter);padding-bottom:1rem;padding-left:var(--wp--preset--spacing--gutter)">

	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
	<div class="wp-block-group">

		<!-- wp:html -->
		<a href="/" class="rg-logo" aria-label="Robin Guitars home">
			<img src="' . $logo . '" alt="Robin Guitars" />
		</a>
		<!-- /wp:html -->

		<!-- wp:navigation {"textColor":"paper","overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right"},"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.04em","fontSize":"0.875rem"}}} -->
		<!-- wp:navigation-link {"label":"Guitars","url":"/guitars/"} /-->
		<!-- wp:navigation-link {"label":"History","url":"/history/"} /-->
		<!-- wp:navigation-link {"label":"Artist","url":"/artist/"} /-->
		<!-- wp:navigation-link {"label":"Galleries","url":"/guitar-gallery/"} /-->
		<!-- wp:navigation-link {"label":"Contact Us","url":"/contact/"} /-->
		<!-- /wp:navigation -->

	</div>
	<!-- /wp:group -->

</header>
<!-- /wp:group -->
',
);
