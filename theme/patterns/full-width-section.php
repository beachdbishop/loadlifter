<?php
/**
 * Title: Full-width Section
 * Slug: loadlifter/full-width-section
 * Categories: fullwidthsections
 * Description: Nested Group blocks to provide a full-width section w/ a background color + centered container.
 * Keywords: section, group
 * Block Types: core/heading, core/group
 *
 * @package loadlifter
 * @since 1.2.9
 */
?>
<!-- wp:group {"align":"full","backgroundColor":"brand-gray-faint","className":"full-bleed ll-equal-vert-padding","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull full-bleed ll-equal-vert-padding has-brand-gray-faint-background-color has-background"><!-- wp:group {"className":"container mx-auto px-1 md:px-0","layout":{"type":"default"}} -->
<div class="container px-1 mx-auto wp-block-group md:px-0"><!-- wp:heading -->
<h2><?php echo 'Section Title'; ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo 'Content...'; ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
