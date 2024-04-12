<?php
/*
YARPP Template: Thumb and Title
Description: This template returns the related posts as thumbnails in an ordered list. Requires a theme which supports post thumbnails.
Author: YARPP Team
*/
?>

<?php
/*
Templating in YARPP enables developers to uber-customize their YARPP display using PHP and template tags.

The tags we use in YARPP templates are the same as the template tags used in any WordPress template. In fact, any WordPress template tag will work in the YARPP Loop. You can use these template tags to display the excerpt, the post date, the comment count, or even some custom metadata. In addition, template tags from other plugins will also work.

If you've ever had to tweak or build a WordPress theme before, you’ll immediately feel at home.

// Special template tags which only work within a YARPP Loop:

1. the_score()		// this will print the YARPP match score of that particular related post
2. get_the_score()		// or return the YARPP match score of that particular related post

Notes:
1. If you would like Pinterest not to save an image, add `data-pin-nopin="true"` to the img tag.

*/
?>

<?php
/* Pick Thumbnail */
global $_wp_additional_image_sizes;
if ( isset( $_wp_additional_image_sizes['yarpp-thumbnail'] ) ) {
	$dimensions['size'] = 'yarpp-thumbnail';
} else {
	$dimensions['size'] = 'medium'; // default
}
?>

<h3 class="mb-4 text-lg lg:text-2xl">Related</h3>
<?php if ( have_posts() ) : ?>
<ul class="cards-ic md:max-w-sm md:grid md:gap-4 lg:max-w-none lg:grid-cols-3 lg:gap-8">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content', 'card-ic-min' );
	endwhile; ?>
</ul>

<?php else : ?>
<p>No related posts.</p>
<?php endif; ?>
