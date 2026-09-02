<?php
/**
 * Homepage hero. Photo is a temporary crop from the approved mockup
 * (design-system/mockups/robin-home.jpg) — replace with real Avalon
 * photography. See planning/DECISIONS.md for the Avalon/Savoy label note.
 *
 * Full-bleed background-image hero (owner request, Sept 2026) — photo
 * fills the section, text sits on top over a left-to-right scrim for
 * legibility.
 */
$hero_img       = esc_url( get_theme_file_uri( 'assets/img/hero-avalon-placeholder.jpg' ) );
$hand_crafted_tx = esc_url( get_theme_file_uri( 'assets/img/hand-crafted-tx.png' ) );

return array(
	'title'      => __( 'Robin Hero', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-hero"} -->
<section class="wp-block-group rg-hero" style="background-image:url(' . $hero_img . ')">

	<div class="rg-hero__scrim"></div>

	<!-- wp:group {"layout":{"type":"constrained"},"className":"rg-hero__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|band","bottom":"var:preset|spacing|band","left":"var:preset|spacing|gutter","right":"var:preset|spacing|gutter"}}}} -->
	<div class="wp-block-group rg-hero__content" style="padding-top:var(--wp--preset--spacing--band);padding-right:var(--wp--preset--spacing--gutter);padding-bottom:var(--wp--preset--spacing--band);padding-left:var(--wp--preset--spacing--gutter)">

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

		<!-- wp:image {"width":"11rem","className":"rg-texas-lockup-img"} -->
		<figure class="wp-block-image rg-texas-lockup-img" style="width:11rem">
			<img src="' . $hand_crafted_tx . '" alt="Hand Crafted in Houston, Texas" />
		</figure>
		<!-- /wp:image -->

	</div>
	<!-- /wp:group -->

	<div class="rg-model-chip">
		<span class="rg-model-chip__label">Model Shown</span>
		Avalon
	</div>

</section>
<!-- /wp:group -->
',
);
