<?php
/**
 * Six-model strip. Photos are temporary crops from the approved mockup —
 * replace with real per-model photography when it lands.
 */

$robin_models = array(
	array( 'slug' => 'avalon', 'name' => 'Avalon', 'tag' => 'Classic Versatility' ),
	array( 'slug' => 'machete', 'name' => 'Machete', 'tag' => 'Modern Edge' ),
	array( 'slug' => 'medley', 'name' => 'Medley', 'tag' => 'Bold & Powerful' ),
	array( 'slug' => 'ranger', 'name' => 'Ranger', 'tag' => 'Vintage Soul' ),
	array( 'slug' => 'rawhide', 'name' => 'Rawhide', 'tag' => 'Distinct Flair' ),
	array( 'slug' => 'savoy', 'name' => 'Savoy', 'tag' => 'Large Body Sound' ),
);

$cards = '';
foreach ( $robin_models as $model ) {
	$img = esc_url( get_theme_file_uri( 'assets/img/model-' . $model['slug'] . '-placeholder.jpg' ) );
	$cards .= '<a class="rg-model-card" href="/' . esc_attr( $model['slug'] ) . '/">'
		. '<img src="' . $img . '" alt="Robin Guitars ' . esc_attr( $model['name'] ) . '" loading="lazy" />'
		. '<h3>' . esc_html( $model['name'] ) . '</h3>'
		. '<p>' . esc_html( $model['tag'] ) . '</p>'
		. '</a>';
}

return array(
	'title'      => __( 'Robin Model Strip', 'robin-2026' ),
	'categories' => array( 'robin-2026' ),
	'content'    => '
<!-- wp:html -->
<nav class="rg-model-grid" aria-label="Robin Guitars models">
	' . $cards . '
</nav>
<!-- /wp:html -->
',
);
