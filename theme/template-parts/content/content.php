<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php if ( get_field( 'll_hide_featured_image' ) != true ) :
	ll_featured_image();
endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'px-2 py-8  |  md:container lg:px-[16px]' ); ?>>

	<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

	<header>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title | md:py-8 dark:text-neutral-100">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title | dark:text-neutral-100"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header>

	<div class="md:flex md:gap-8 lg:gap-16">
		<div class="md:order-1 md:w-2/3">
			<div <?php ll_content_class( 'entry-content' ) ?>>
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

				if ( get_field( 'll_hide_socialshare' ) != 1 ) {
					get_template_part( 'template-parts/form/form', 'webshare' );
				}
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

			<?php get_template_part( 'template-parts/siteblocks/area', 'after-post' ); ?>

			<?php	// if( ( get_field( 'll_hide_related' ) !== 1 ) && ( yarpp_related_exist() ) ) {
				if ( get_field( 'll_hide_related' ) != 1 ) {
				yarpp_related(
					[
						'limit'                         => 3,
						'extra_css_class'               => 'container mx-0 my-4 print:hidden',
						'generate_missing_thumbnails'   => false,
						'recent'                        => '18 month',
					]
				);
			}
			?>
		</div>

		<aside class="mt-8 md:mt-0 md:order-2 md:w-1/3">
			<?php if ( ( get_field( 'll_normal_contact_form_location' ) == 1 ) && ( !in_category( 'resources' ) ) ) : ?>
				<div id="contact" class="container-contact-form not-prose motion-preset-slide-up mb-8 lg:mb-16">
					<?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
				</div>
			<?php endif; ?>

			<!--   A R E A   S I D E   -->
			<?php get_template_part( 'template-parts/siteblocks/area', 'side' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="post-meta | text-sm lg:text-base text-neutral-600 dark:text-neutral-400">
					<?php
					if ( get_field( 'll_hide_author' ) != 1 ) {
						ll_posted_by_cards( array( 'show_thumb' => true	) );
					}

					ll_posted_on();

					ll_entry_footer();
				?>
				</div>
			<?php endif; ?>
		</aside>
	</div>

</article><!-- post-<?php the_ID(); ?> -->
