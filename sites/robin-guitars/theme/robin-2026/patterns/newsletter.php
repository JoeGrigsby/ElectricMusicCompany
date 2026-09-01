<?php
/**
 * Newsletter signup. Form posts nowhere yet — wire to the real ESP once
 * identified from the export (sites/robin-guitars/CLAUDE.md). Do not ship
 * as a dummy form.
 */
return array(
	'title'      => __( 'Robin Newsletter Signup', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:group {"tagName":"section","className":"rg-band rg-band--dark","layout":{"type":"constrained"}} -->
<section class="wp-block-group rg-band rg-band--dark">

	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">
			<!-- wp:html -->
			<p class="rg-eyebrow-rule">Stay in Tune.</p>
			<!-- /wp:html -->

			<!-- wp:heading {"level":3} -->
			<h3>Join the Robin Guitars family</h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Get the latest on new models, new artists, events, and behind-the-scenes content.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:html -->
			<form class="rg-newsletter-form" method="post" action="#" style="display:flex;gap:0.5rem;flex-wrap:wrap">
				<label class="screen-reader-text" for="rg-newsletter-email">Your email address</label>
				<input id="rg-newsletter-email" type="email" name="email" placeholder="Your email address" required style="flex:1 1 16rem;padding:0.75em 1em;border-radius:8px;border:1px solid var(--wp--preset--color--text-muted-dark);background:transparent;color:inherit" />
				<button type="submit" class="wp-element-button" style="background:var(--wp--preset--color--accent);color:var(--wp--preset--color--paper);border:none;border-radius:8px;padding:0.75em 1.6em;font-weight:600">Sign Up</button>
			</form>
			<p class="rg-placeholder-flag">Not wired to an email service yet — see sites/robin-guitars/CLAUDE.md.</p>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
',
);
