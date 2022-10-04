<?php
/**
 * Title: Team Section
 * Slug: loadlifter/team-plus-col
 * Categories: fullwidthsections
 * Description: A full-width section showing featured team members plus a column for some contnet.
 * Keywords: team, services, industry, industries
 * Block Types: core/group, core/columns, core/heading, core/shortcode
 *
 * @package loadlifter
 * @since 1.0.7
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"brand-blue-faint","className":"full-bleed not-prose py-4 md:py-8 2xl:py-12"} --><div class="py-4 wp-block-group alignfull full-bleed not-prose md:py-8 2xl:py-12 has-brand-blue-faint-background-color has-background"><!-- wp:group {"className":"px-1 wp-block-group md:container md:mx-auto md:px-0"} --><div class="px-1 wp-block-group md:container md:mx-auto md:px-0"><!-- wp:columns --><div class="wp-block-columns"><!-- wp:column {"width":"66.67%"} --><div class="wp-block-column" style="flex-basis:66.67%"><!-- wp:heading {"level":3,"textColor":"brand-red","className":"head-last-bold text-4xl mb-4 lg:mb-8"} --><h3 class="mb-4 text-4xl head-last-bold lg:mb-8 has-brand-red-color has-text-color"><?php echo 'Meet our team'; ?></h3><!-- /wp:heading --><!-- wp:shortcode -->[display-posts post_type="people" id="2249, 2254, 2257" orderby="title" order="ASC" posts_per_page="3" wrapper="div" wrapper_class="grid grid-auto-fit gap-8" layout="card-people" /]<!-- /wp:shortcode --><!-- wp:paragraph --><p><?php echo 'Additional details...'; ?></p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column {"width":"33.33%"} --><div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:heading {"level":3,"textColor":"brand-red","className":"head-last-bold text-4xl mb-4 lg:mb-8"} --><h3 class="mb-4 text-4xl head-last-bold lg:mb-8 has-brand-red-color has-text-color"><?php echo 'Our approach'; ?></h3><!-- /wp:heading --><!-- wp:paragraph {"className":"mb-4"} --><p class="mb-4"><?php echo 'Lorem ipsum first para?'; ?></p><!-- /wp:paragraph --><!-- wp:paragraph --><p><?php echo 'And another one...'; ?></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group --></div><!-- /wp:group -->
