<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
	ll_featured_image();
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<header>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title | md:py-8">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title | "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header>

		<div class="md:flex md:gap-4 lg:gap-x-12 lg:gap-y-8">
			<div class="md:order-first md:w-2/3 lg:w-3/4">
				<div class="prose lg:prose-xl entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span> "%s"</span>', 'loadlifter' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
					?>
					<div class="clear-both">&nbsp;</div>
					<?php
					wp_link_pages(
						array(
							'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>

				<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

				<?php get_template_part( 'template-parts/siteblocks/area', 'after-post' ); ?>

				<?php
				if( yarpp_related_exist() ) {
					yarpp_related(
						[
							'limit' => 3,
							'extra_css_class' => 'container mx-0',
						]
					);
				}

				// yarpp_related(
				// 	array(
				// 		// Pool options: these determine the "pool" of entities which are considered
				// 		'post_type' => array( 'post' ), //  post types to include in results
				// 		'show_pass_post' => false, // show password-protected posts
				// 		'show_sticky_posts' => true, // show sticky posts
				// 		'past_only' => true, // show only posts which were published before the reference post
				// 		'exclude' => array(), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
				// 		'recent' => '12 month', // to limit to entries published recently, set to like '15 day', '20 week', or '12 month' (https://www.mysqltutorial.org/mysql-interval/)

				// 		// Relatedness algorithm options: these determine how "relatedness" is computed
				// 		// Weights are used to construct the "match score" between candidates and the reference post
				// 		'weight' => array(
				// 		'body' => 1,
				// 		'title' => 2, // larger weights mean this criteria will be weighted more heavily
				// 		'tax' => array(
				// 			'post_tag' => 1,
				// 			... // put any taxonomies you want to consider here with their weights
				// 		)
				// 		),
				// 		// Specify taxonomies and a number here to require that a certain number be shared:
				// 		'require_tax' => array(
				// 			'post_tag' => 1 // for example, this requires all results to have at least one 'post_tag' in common
				// 		),
				// 		// The threshold which must be met by the "match score" to be considered related
				// 		'threshold' => 5,

				// 		// Display options:
				// 		'template' => 'thumbnails', // which theme/custom template to use. Built-in ones include "list" and "thumbnails", or the name of a YARPP template file in your active theme folder starting with "yarpp-template-". Example: yarpp-template-videos or yarpp-template-videos.php
				// 		'limit' => 4, // maximum number of results
				// 		'order' => 'score DESC', // column on "wp_posts" to order by, then a space, and whether to order in ascending ("ASC") or descending ("DESC") order
				// 		'promote_yarpp' => false, // boolean indicating whether to add 'Powered by YARPP' below related posts
				// 		'generate_missing_thumbnails' => true, // automatically generate missing thumbnail sizes on the fly
				// 		'extra_css_class' => 'container mx-auto', // add CSS classes to YARPP's parent div
				// 	)
				// );
				?>
			</div>

			<aside class="mt-4 md:mt-0 md:order-last md:w-1/3 lg:w-1/4">
				<?php
				if ( 'post' === get_post_type() ) :
				?>
				<div class="post-meta | text-sm text-neutral-600 ">
					<?php
					ll_posted_by( array(
						'show_thumb' => true,
					) );
					?>

					<?php ll_posted_on(); ?>

					<h4 class="mt-8 mb-2 text-lg">Related topics</h4>
					<?php ll_entry_footer(); ?>
					<p class="my-4"><?php ll_social_shares(); ?></p>

				</div>
				<!-- <div class="p-4 text-sm bg-brand-blue-faint md:mt-4 ">
					<h5 class="mb-2">Categories</h5>
					<ul class="list-none">
						<?php
						// wp_list_categories( array(
						// 	'orderby'    	=> 'name',
						// 	'show_count' 	=> true,
						// 	'title_li' 		=> '',
						// ) );
						?>
					</ul>
				</div> -->
				<?php endif; ?>

				<!--   A R E A   S I D E   -->
				<?php get_template_part( 'template-parts/siteblocks/area', 'side' ); ?>

				<?php get_template_part( 'template-parts/form/form', 'hubspot-newsletter-onlight' ); ?>
			</aside>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
