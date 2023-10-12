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
<div class="md:grid md:gap-4 md:grid-cols-3 lg:gap-8">
	<?php
	while ( have_posts() ) :
		the_post();

        if ( has_post_thumbnail() ) : ?>
		<div>
            <a href="<?php the_permalink(); ?>" rel="bookmark norewrite" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail(
                    $dimensions['size'],
                    [
                        'class' => 'border border-solid border-neutral-100',
                        'data-pin-nopin' => 'true',
                    ]
                ); ?>
            </a>
            <p class="my-2 text-lg font-head lg:text-2xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><!-- (<?php the_score(); ?>)--></p>
        </div>
		<?php endif; ?>
	<?php endwhile; ?>
</div>
<style>.yarpp-related {margin-block: 1rem;}</style>

<?php else : ?>
<p>No related photos.</p>
<?php endif; ?>
