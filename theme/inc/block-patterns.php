<?php
/**
 *
 */

register_block_pattern_category(
    'layout',
    [
        'label' => esc_html__( 'Layout', 'loadlifter' ),
    ]
);


$block_patt_section_content = '<!-- wp:group {"align":"full","backgroundColor":"teal-pale","className":"full-bleed not-prose py-4 md:py-8 2xl:py-12"} -->
<div class="wp-block-group alignfull full-bleed has-brand-blue-faint-background-color has-background"><!-- wp:group {"className":"md:container md:mx-auto"} -->
<div class="px-1 wp-block-group md:container md:mx-auto md:px-0"><!-- wp:paragraph -->
<p>Lorem ipsum.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->';

register_block_pattern(
	'loadlifter/section-block-pattern',
	[
		'categories'	=> [
			'layout',
		],
		'content'		=> $block_patt_section_content,
		'desciption'	=> '',
		'keywords'		=> '',
		'title'			=> '',
		'viewportWidth'	=> 800,
	],
);
