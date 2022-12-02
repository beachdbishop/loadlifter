<?php
/**
 * Title: Area Insights
 * Slug: loadlifter/area-posts
 * Categories: fullwidthsections
 * Description: Category posts for Industry Pages', 'Block pattern description.
 * Keywords: posts, industry, industries
 * Block Types: core/group, core/heading, core/shortcode
 *
 * @package loadlifter
 * @since 1.0.7
 */
?>
<!-- wp:group {"align":"full","className":"full-bleed","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull full-bleed"><!-- wp:group {"className":"container mx-auto","layout":{"type":"default"}} -->
<div class="container mx-auto wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"textColor":"brand-blue"} -->
<h3 class="has-brand-blue-color has-text-color"><?php echo 'Area Insights &amp; Updates'; ?></h3>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[display-posts taxonomy="category" tax_term="construction" tax_operator="IN" taxonomy_2="category" tax_2_term="archived-events" tax_2_operator="NOT IN" orderby="date" order="DESC" posts_per_page="3" wrapper="div" wrapper_class="dps-grid-3max" layout="card-simple" /]
<!-- /wp:shortcode --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
