<?php
/**
 * Rio Grande cross-promo band. The "15% off special" CTA copy is
 * unconfirmed — DECISIONS.md #5 — do not ship without owner sign-off on
 * whether it's a real standing offer.
 */
return array(
	'title'      => __( 'Robin Cross-promo: Rio Grande', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-band rg-band--dark","layout":{"type":"constrained","contentSize":"90rem"}} -->
<section class="wp-block-group rg-band rg-band--dark">

	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:html -->
			<p class="rg-eyebrow-rule">Great Tone Starts Here.</p>
			<!-- /wp:html -->

			<!-- wp:heading {"level":3} -->
			<h3>Rio Grande Pickups</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Handcrafted to help musicians find the tone that is uniquely their own.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent","textColor":"paper"} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-paper-color has-accent-background-color has-text-color has-background wp-element-button" href="https://www.riograndepickups.com/">15% off special</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.6875rem"}},"textColor":"text-muted-dark"} -->
			<p class="has-text-muted-dark-color has-text-color" style="font-size:0.6875rem">Offer pending confirmation — planning/DECISIONS.md #5.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large">
				<img src="' . esc_url( get_theme_file_uri( 'assets/img/cross-promo-riogrande-placeholder.jpg' ) ) . '" alt="Rio Grande Texas Humbucker pickups" loading="lazy" />
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
