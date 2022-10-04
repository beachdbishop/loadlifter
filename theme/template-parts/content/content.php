<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php ll_featured_image(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<header>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title | ">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title | "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header>

		<div class="md:flex md:gap-4 lg:gap-8">
			<div class="md:order-last md:w-2/3 lg:w-3/4">
				<div class="entry-content">
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

				<?php get_sidebar( 'after-post' ); ?>
			</div>

			<aside class="mt-4 md:mt-0 md:order-first md:w-1/3 lg:w-1/4">
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
				<?php get_sidebar(); ?>
			<?php endif; ?>
			</aside>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
