<?php
/**
 * Mat Mitchell / Machete artist spotlight. Photo credit Michelle Shiers,
 * Machete wordmark logo credit Ken Taylor — keep both credits per
 * sites/robin-guitars/CLAUDE.md. Photo below is a temporary crop from the
 * approved mockup pending the real asset file.
 */
return array(
	'title'      => __( 'Robin Artist Spotlight', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-band rg-band--dark","layout":{"type":"constrained"}} -->
<section class="wp-block-group rg-band rg-band--dark">

	<!-- wp:html -->
	<p class="rg-eyebrow-rule">Artist Spotlight</p>
	<!-- /wp:html -->

	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%">
			<!-- wp:heading {"level":2} -->
			<h2>For those who <span style="color:var(--wp--preset--color--accent)">refuse</span> to sound like everyone else.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"24%"} -->
		<div class="wp-block-column" style="flex-basis:24%">
			<!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large">
				<img src="' . esc_url( get_theme_file_uri( 'assets/img/artist-mat-mitchell-placeholder.jpg' ) ) . '" alt="Mat Mitchell playing a Robin Machete" />
				<figcaption class="wp-element-caption" style="font-size:0.6875rem">Photo: Michelle Shiers</figcaption>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%">
			<!-- wp:paragraph -->
			<p style="font-family:var(--wp--preset--font-family--display);text-transform:uppercase;letter-spacing:0.04em">Mat Mitchell Machete</p>
			<!-- /wp:paragraph -->

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
