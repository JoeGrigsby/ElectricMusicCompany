<?php
/**
 * Mat Mitchell / Machete artist spotlight. Photo credit Michelle Shiers,
 * Machete wordmark logo credit Ken Taylor — keep both credits per
 * sites/robin-guitars/CLAUDE.md.
 */
$photo = esc_url( get_theme_file_uri( 'assets/img/artist-mat-mitchell.jpg' ) );
$logo  = esc_url( get_theme_file_uri( 'assets/img/mat-mitchell-machete-logo.png' ) );

return array(
	'title'      => __( 'Robin Artist Spotlight', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-band rg-band--dark rg-spotlight-section","layout":{"type":"constrained","contentSize":"90rem"}} -->
<section class="wp-block-group rg-band rg-band--dark rg-spotlight-section">

	<!-- wp:html -->
	<p class="rg-eyebrow-rule">Artist Spotlight</p>
	<!-- /wp:html -->

	<!-- wp:columns {"className":"rg-spotlight"} -->
	<div class="wp-block-columns rg-spotlight">

		<!-- wp:column {"width":"26%","className":"rg-spotlight__headline"} -->
		<div class="wp-block-column rg-spotlight__headline" style="flex-basis:26%;flex-grow:0;flex-shrink:0">
			<!-- wp:heading {"level":2} -->
			<h2>For those who <span style="color:var(--wp--preset--color--accent)">refuse</span> to sound like everyone else.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%"} -->
		<div class="wp-block-column" style="flex-basis:20%;flex-grow:0;flex-shrink:0">
			<!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large">
				<img src="' . $photo . '" alt="Mat Mitchell playing a Robin Machete" />
				<figcaption class="wp-element-caption" style="font-size:0.6875rem">Photo: Michelle Shiers</figcaption>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%;flex-grow:0;flex-shrink:0">

			<!-- wp:image {"className":"rg-spotlight__logo"} -->
			<figure class="wp-block-image rg-spotlight__logo">
				<img src="' . $logo . '" alt="Mat Mitchell Machete" />
			</figure>
			<!-- /wp:image -->

			<!-- wp:paragraph -->
			<p>Announcing the launch of our retro-futuristic <a href="/machete/" style="color:var(--wp--preset--color--accent)">Machete</a> guitar in a new artist collaboration with Puscifer guitarist and producer <strong>Mat Mitchell</strong>.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><a href="https://guitarpr.com/robin-guitars-launches-mat-mitchell-signature-machete/">Read the press release &rarr;</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.75rem"}},"textColor":"text-muted-dark"} -->
			<p class="has-text-muted-dark-color has-text-color" style="font-size:0.75rem">Machete wordmark: Ken Taylor</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
',
);
