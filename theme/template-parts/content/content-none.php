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
		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'loadlifter' ); ?></h1>
	</header>

	<div class="prose lg:prose-xl entry-content">
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
			<?php
			get_search_form();
			?>

			<p class="todo">Perhaps we add suggested content here? But what to suggest?</p>
			<div class="w-[10px] bg-transparent h-[300px]">&nbsp;</div>

			<?php
		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'loadlifter' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section>
