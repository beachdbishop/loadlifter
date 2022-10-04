<?php
/**
 * Title: Area Insights
 * Slug: loadlifter/area-posts
 * Categories: fullwidthsections
 * Description: Category posts for Industry Pages', 'Block pattern description.
 * Keywords: posts, industry, industries
 * Block Types: core/heading, core/shortcode
 *
 * @package loadlifter
 * @since 1.0.7
 */
?>
<!-- wp:heading {"level":3,"textColor":"brand-blue"} --><h3 class="has-brand-blue-color has-text-color"><?php echo 'Area Insights &amp; Updates'; ?></h3>
<!-- /wp:heading --><!-- wp:shortcode -->[display-posts category="cannabis" orderby="date" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="grid grid-auto-fit gap-8 -m-4" layout="card" /]<!-- /wp:shortcode -->
