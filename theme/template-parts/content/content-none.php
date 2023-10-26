<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<section>
	<header>
		<h1 class="page-title">
            <?php
                printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', '_tw' ),
					get_search_query()
				);
            ?>
        </h1>
	</header>

	<div <?php ll_content_class( 'page-content' ); ?>>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'loadlifter' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'loadlifter' ); ?></p>
			<div class="max-w-prose "><?php get_search_form(); ?></div>

			<p class="todo">Perhaps we add suggested content here? But what to suggest?</p>
			<div class="w-[10px] bg-transparent h-[300px]">&nbsp;</div>

			<?php
		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'loadlifter' ); ?></p>
			<div class="max-w-prose "><?php get_search_form(); ?></div><?php

		endif;
		?>
	</div>
</section>
