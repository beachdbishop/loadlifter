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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-600 pb-4 md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

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
			<div class="md:order-first md:w-2/3">
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

                    get_template_part( 'template-parts/form/form', 'webshare' );
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

				<?php
				if( yarpp_related_exist() ) {
					yarpp_related(
						[
							'limit'                         => 3,
							'extra_css_class'               => 'container mx-0 print:hidden',
                            'generate_missing_thumbnails'   => false,
                            'recent'                        => '18 month',
						]
					);
				}
				?>
			</div>

			<aside class="mt-8 md:mt-0 md:order-last md:w-1/3">
				<?php
				if ( 'post' === get_post_type() ) :
				?>
				<div class="post-meta | text-sm text-neutral-600 dark:text-neutral-400">
					<?php
					ll_posted_by( array(
						'show_thumb' => true,
					) );

                    ll_posted_on();

					ll_entry_footer();
                    ?>

				</div>
				<?php endif; ?>

				<!--   A R E A   S I D E   -->
				<?php get_template_part( 'template-parts/siteblocks/area', 'side' ); ?>

				<div id="contact" class="container-contact-form not-prose">
                    <?php get_template_part( 'template-parts/form/form', 'hubspot-contact-sidebar' ); ?>
                </div>
			</aside>
		</div>

	</div>

</article><!-- post-<?php the_ID(); ?> -->
