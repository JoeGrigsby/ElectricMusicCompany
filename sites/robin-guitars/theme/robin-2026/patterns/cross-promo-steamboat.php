<?php
/**
 * Steamboat Amps cross-promo band.
 */
return array(
	'title'      => __( 'Robin Cross-promo: Steamboat', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-band rg-band--dark","layout":{"type":"constrained","contentSize":"90rem"}} -->
<section class="wp-block-group rg-band rg-band--dark">

	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:html -->
			<p class="rg-eyebrow-rule">Built Different. Played Loud.</p>
			<!-- /wp:html -->

			<!-- wp:heading {"level":3} -->
			<h3>Steamboat Amps</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>For musicians who believe great sound should have as much character as the people playing through it.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent","textColor":"paper"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-paper-color has-accent-background-color has-text-color has-background wp-element-button" href="https://www.steamboatamps.com/">Learn More</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large">
				<img src="' . esc_url( get_theme_file_uri( 'assets/img/cross-promo-steamboat-placeholder.jpg' ) ) . '" alt="Steamboat Classic 50 amp head" loading="lazy" />
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
',
);
