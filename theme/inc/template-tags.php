<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Load_Lifter
 */

if ( ! function_exists( 'll_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ll_posted_on() {
		$time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date | date-published" datetime="%1$s">%2$s</time> <time class="date-updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'loadlifter' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="timestamp">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'll_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ll_posted_by( $options = array() ) {
		$defaults = array(
			'show_thumb' => false,
		);
		$config = array_merge( $defaults, $options );

		if( function_exists( 'coauthors_posts_links' ) ) {
			if( $config['show_thumb']) {
				$coauthors = get_coauthors();
				foreach( $coauthors as $coauthor ) {
					$avatar = coauthors_get_avatar( $coauthor, 200, '', $coauthor->display_name, 'mb-2 rounded-full ' );
					$namelink = coauthors_posts_links_single( $coauthor );
					echo <<<EOT
					<div class="author | mb-4">
						{$avatar}
						<p class="text-xl font-bold font-head text-brand-red ">{$namelink}</p>
					</div>
					EOT;
				}
			} else {
				coauthors_posts_links(); // plain jane list
			}
		} else {
			the_author_posts_link();
		}
	}
endif;

if ( ! function_exists( 'll_social_shares' ) ) :
	/**
	 *
	 *
	 * Depends on Shared Counts plugin
	 */
	function ll_social_shares() {
		if( function_exists( 'shared_counts' ) ) {
			shared_counts()->front->display();
		}
	}
endif;

if ( ! function_exists( 'll_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ll_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'loadlifter' ) );
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'loadlifter' ) );

			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span>' . esc_html__( 'Posted in: %1$s', 'loadlifter' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			if ( $categories_list && $tags_list ) {
				printf( '<br />' );
			}

			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="list--tags | ">' . esc_html__( 'Tagged: %1$s', 'loadlifter' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;


if ( ! function_exists( 'll_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ll_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div>
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>

			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
							'class' => 'object-cover w-full',
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;


if ( ! function_exists( 'll_people_headshot' ) ) :
	/**
	 * Displays headshot set for person.
	 */
	function ll_people_headshot() {
		$person_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

		if ( !$person_image_url ) {
			if ( is_singular() ) { ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' ); ?>" alt="" />
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/headshot__empty.svg' ); ?>" alt="" />
				</a>
			<?php }
		} else {
			if ( is_singular() ) :
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
						'class' => 'mx-auto md:mx-0',
					)
				);
			else : ?>
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php
						the_post_thumbnail(
							'post-thumbnail',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
								'class' => 'w-full',
							)
						);
					?>
				</a>
				<?php
			endif; // End is_singular().
		}
	}
endif;


if ( ! function_exists( 'll_featured_image' ) ) :
	/**
	 * Renders a post's featured image above the title and breadcrumbs
	 * This should ONLY be used on blog post... does not contain support for brand images.
	 */
	function ll_featured_image( $options = array() ) {
		$defaults = array(
			'size' => 'full',
		);
		$config = array_merge( $defaults, $options );

		$post_date = strtotime( the_date( 'Y-m-d', '', '', false ) );
		$cutoff_date = strtotime( '2022-03-02' ); // via: https://wordpress.stackexchange.com/questions/110185/if-posted-after-date
		// After 2022-03-02, we started uploading larger featured images. This compensates for that.

		if ( $config['size'] === 'full' ) {
			$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

			if ( $post_date > $cutoff_date ) {
				$feat_aspect_ratio = '3.75 / 1';
				$bg_size = 'bg-center bg-cover bg-no-repeat';
			} else {
				$feat_aspect_ratio = '4.3 / 1';
				$bg_size = 'bg-center bg-no-repeat';
			}
		} else {
			$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
			$feat_aspect_ratio = '1.91';
			$bg_size = 'bg-center bg-cover bg-no-repeat';
		}

		if ( !$feat_image_url ) {
			$thumb_id = $thumb_url_array = $thumb_url = null;
			// $featmarkup = '';
			if ( is_singular( 'post' ) ) {
				$featmarkup = '';
			} else {
				$featmarkup = sprintf(
					'<div class="image__featured--outer | empty-feat-img print:hidden"><div class="image__featured--inner | %4$s " style="background-image: url(%1$s); aspect-ratio: %2$s" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="image" aria-label="%3$s"></div></div>',
					esc_url( get_template_directory_uri() . '/img/feat__empty--blog.svg' ),
					esc_attr( $feat_aspect_ratio ),
					esc_attr( get_the_title() ),
					esc_attr( $bg_size ),
				);
			}
		} else {
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'large' );
			$thumb_url = $thumb_url_array[0];
			$featmarkup = sprintf(
				'<div class="image__featured--outer print:hidden"><div class="image__featured--inner | %4$s " style="background-image: url(%1$s); aspect-ratio: %2$s" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="image" aria-label="%3$s"></div></div>',
				esc_url( $feat_image_url[0] ),
				esc_attr( $feat_aspect_ratio ),
				esc_attr( get_the_title() ),
				esc_attr( $bg_size ),
			);
		}

		echo $featmarkup;
	}
endif;


if ( ! function_exists( 'll_paging_nav' ) ) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 * Based on paging nav function from Twenty Fourteen
	 * via: https://mor10.com/add-proper-pagination-default-wordpress-themes/
	 */

	function ll_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 3,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&lt; Previous', 'loadlifter' ),
			'next_text' => __( 'Next &gt;', 'loadlifter' ),
			'type'      => 'list',
			'before_page_number' => '<span class="screen-reader-text">' . __( 'Page ', 'loadlifter' ) . '</span>',
		) );

		if ( $links ) :

		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Posts navigation', 'loadlifter' ); ?></h3>
				<?php echo $links; ?>
		</nav><!-- .navigation -->
		<?php
		endif;
	}
endif;
