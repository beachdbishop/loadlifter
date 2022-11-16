<?php
/**
 * Title: Related / Siblings
 * Slug: loadlifter/related-siblings
 * Categories: fullwidthsections
 * Description:
 * Keywords:
 * Block Types: core/spacer, core/shortcode, core/heading
 *
 * @package loadlifter
 * @since 1.4.0
 */
?>
<!-- wp:spacer {"className":"is-style-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-xs"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":6,"textColor":"brand-blue"} -->
<h6 class="has-brand-blue-color has-text-color">Related:</h6>
<!-- /wp:heading -->

<!-- wp:shortcode -->
[display-posts post_type="page" post_parent="current" orderby="title" order="ASC" wrapper="span" /]
<!-- /wp:shortcode -->

<!-- wp:spacer {"height":"24px","className":"is-style-xs"} -->
<div style="height:24px" aria-hidden="true" class="wp-block-spacer is-style-xs"></div>
<!-- /wp:spacer -->
