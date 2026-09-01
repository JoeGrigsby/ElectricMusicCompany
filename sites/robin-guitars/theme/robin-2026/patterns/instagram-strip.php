<?php
/**
 * Instagram strip. Uses the existing Smash Balloon shortcode (keep the
 * plugin active per sites/robin-guitars/CLAUDE.md) instead of faking tiles.
 * Confirm the saved feed ID once the plugin export is available.
 */
return array(
	'title'      => __( 'Robin Instagram Strip', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-band rg-band--dark","layout":{"type":"constrained"}} -->
<section class="wp-block-group rg-band rg-band--dark">

	<!-- wp:html -->
	<p class="rg-eyebrow-rule">Follow us @robinguitars on Instagram</p>
	<!-- /wp:html -->

	<!-- wp:shortcode -->
	[instagram-feed feed=1]
	<!-- /wp:shortcode -->

</section>
<!-- /wp:group -->
',
);
