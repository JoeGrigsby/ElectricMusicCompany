<?php
/**
 * Homepage hero. Photo is a temporary crop from the approved mockup
 * (design-system/mockups/robin-home.jpg) — replace with real Avalon
 * photography. See planning/DECISIONS.md for the Avalon/Savoy label note.
 */
return array(
	'title'      => __( 'Robin Hero', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-hero","layout":{"type":"grid","columns":2}} -->
<section class="wp-block-group rg-hero">

	<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|band","bottom":"var:preset|spacing|band","left":"var:preset|spacing|gutter","right":"var:preset|spacing|gutter"}}}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--band);padding-right:var(--wp--preset--spacing--gutter);padding-bottom:var(--wp--preset--spacing--band);padding-left:var(--wp--preset--spacing--gutter)">

		<!-- wp:heading {"level":1} -->
		<h1>Built one<br>at a time.<br><span class="is-accent">Played for<br>a lifetime.</span></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"rg-intro"} -->
		<p class="rg-intro">Robin Guitars are made for players who demand tone, feel, and attitude.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"accent","textColor":"paper"} -->
			<div class="wp-block-button"><a class="wp-block-button__link has-paper-color has-accent-background-color has-text-color has-background wp-element-button" href="/guitars/">Explore our Guitars</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:html -->
		<p class="rg-texas-lockup">
			<svg viewBox="0 0 120 120" aria-hidden="true"><path d="M40 8 L78 8 L78 22 L96 22 L98 34 L108 40 L104 52 L92 56 L90 70 L78 90 L66 112 L52 108 L38 90 L26 74 L18 48 L24 28 L34 22 Z"/></svg>
			Hand Crafted in<br>Houston, Texas
		</p>
		<!-- /wp:html -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"rg-hero__media"} -->
	<div class="wp-block-group rg-hero__media">
		<img src="' . esc_url( get_theme_file_uri( 'assets/img/hero-avalon-placeholder.jpg' ) ) . '" alt="Robin Guitars Avalon, flame-maple top, on a workshop bench" />
		<div class="rg-model-chip">
			<span class="rg-model-chip__label">Model Shown</span>
			Avalon
		</div>
	</div>
	<!-- /wp:group -->

</section>
<!-- /wp:group -->
',
);
