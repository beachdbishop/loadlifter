<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Load_Lifter
 */

if ( ! function_exists( 'll_menu_det_summary' ) ) :
	function ll_menu_det_summary( $name, $link = '', $summaryclasses ='', $linkclasses = '' ) {
		$html = sprintf( '<summary class="flex items-center px-3 py-2 md:py-1 rounded-lg lg:gap-2 %3$s"><span class=""><a href="%1$s" class="%4$s">%2$s</a></span><span class="ml-auto transition duration-300 shrink-0"><svg class="icon"><use xlink:href="#angle-down" /></svg></span></summary>', $name, $link, $summaryclasses, $linkclasses );

		return $html;
	}
endif;


if ( ! function_exists( 'll_show_social_links' ) ) :
	/**
	 *
	 */
	function ll_show_social_links( $out = '' ) {
		$socials = [
			'linkedin' => get_field( 'll_social_linkedin', 'option' ),
			'twitter' => get_field( 'll_social_twitter', 'option' ),
			'facebook' => get_field( 'll_social_facebook', 'option' ),
			'instagram' => get_field( 'll_social_instagram', 'option' ),
			'youtube' => get_field( 'll_social_youtube', 'option' ),
		];

		$social_html = '<div class="inline-flex items-center justify-start gap-4">';
		foreach( $socials as $key=>$value ) {
			$social_html .= sprintf( '<a href="%1$s" class="duration-200 ease-in-out hover:scale-125"><svg class="llicon-2x"><use xlink:href="#%2$s" /></svg><span class="screen-reader-text">%2$s</span></a>', esc_url( $value ), esc_attr( $key ) );
		}
		$social_html .= '</div>';

		if ( $out === 'echo' ) {
			echo $social_html;
		} else {
			return $social_html;
		}
	}
endif;


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
				echo <<<EOT
				<h6>Authored by:</h6>
				<div class="flex items-center justify-center w-full py-4 ">
					<div class="flex -space-x-3">
				EOT;
				foreach( $coauthors as $coauthor ) {
					// $avatar = coauthors_get_avatar( $coauthor, 200, '', $coauthor->display_name, 'mb-2 rounded-full ' );
					// aspect ratio = 95:127
					$avatar = get_field( 'll_user_headshot', 'user_' . $coauthor->ID );
					// $person_archivelink = sprintf( '<a href="/author/%1$s/">%2$s</a>', $peepnicename, $peepname );

					if( !empty( $avatar ) ) {
						$avatar_markup = sprintf( '<a href="/author/%3$s" class="relative inline-flex items-center justify-center text-white w-30 rounded-2xl"><img src="%1$s" alt="%2$s" title="%2$s" width="120" class="max-w-full border-2 border-white rounded-2xl" /></a>', $avatar['url'], $coauthor->display_name, $coauthor->user_nicename );
					} else {
						$avatar_markup = sprintf( '<a href="/author/%2$s" class="relative border-2 border-white text-neutral-100 bg-neutral-400 rounded-2xl"><div class="inline-flex items-center justify-center px-4 w-[120px] aspect-headshot" title="%1$s"><i class="fa-regular fa-user fa-2x"></i></div></a>', $coauthor->display_name, $coauthor->user_nicename );
					}

					echo $avatar_markup;
				}
				echo <<<EOT
					</div>
				</div>
				EOT;
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
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'loadlifter' ) );

			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="catlist">' . esc_html__( 'Posted in: %1$s', 'loadlifter' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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


if ( ! function_exists( 'll_page_hero' ) ) :
    function ll_page_hero( $h1, $h2, $img ) {
        $bg = esc_url( $img );
        $easedGradient = 'linear-gradient(to right, hsla(0, 0%, 0%, 0.97) 0%, hsla(210, 50%, 0.78%, 0.959) 8.1%, hsla(210, 66.67%, 2.35%, 0.928) 15.5%, hsla(206.25, 61.54%, 5.1%, 0.88) 22.5%, hsla(206.67, 62.79%, 8.43%, 0.817) 29%, hsla(207, 62.5%, 12.55%, 0.744) 35.3%, hsla(207.78, 61.36%, 17.25%, 0.664) 41.2%, hsla(207.43, 62.5%, 21.96%, 0.578) 47.1%, hsla(208.24, 62.04%, 26.86%, 0.492) 52.9%, hsla(207.92, 62.73%, 31.57%, 0.406) 58.8%, hsla(208.17, 62.16%, 36.27%, 0.326) 64.7%, hsla(208.13, 62.14%, 40.39%, 0.253) 71%, hsla(208.06, 62.33%, 43.73%, 0.19) 77.5%, hsla(207.76, 62.03%, 46.47%, 0.142) 84.5%, hsla(207.84, 62.45%, 48.04%, 0.111) 91.9%, hsla(207.87, 62.25%, 48.82%, 0.1) 100%)';
        $easedGrad2 = 'linear-gradient(
              to right,
              hsl(0, 0%, 16%) 0%,
              hsla(0, 0%, 16%, 0.99) 8.1%,
              hsla(0, 0%, 16%, 0.961) 15.5%,
              hsla(0, 0%, 16%, 0.917) 22.5%,
              hsla(0, 0%, 16%, 0.86) 29%,
              hsla(0, 0%, 16%, 0.793) 35.3%,
              hsla(0, 0%, 16%, 0.718) 41.2%,
              hsla(0, 0%, 16%, 0.64) 47.1%,
              hsla(0, 0%, 16%, 0.56) 52.9%,
              hsla(0, 0%, 16%, 0.482) 58.8%,
              hsla(0, 0%, 16%, 0.407) 64.7%,
              hsla(0, 0%, 16%, 0.34) 71%,
              hsla(0, 0%, 16%, 0.283) 77.5%,
              hsla(0, 0%, 16%, 0.239) 84.5%,
              hsla(0, 0%, 16%, 0.21) 91.9%,
              hsla(0, 0%, 16%, 0.2) 100%
            )';

        echo '<style>
            .page-hero {
                background-image: linear-gradient(to right, hsl(0 0% 0% / 1) 5%, hsl(0 0% 0% / 0.8) 40%, hsl(0 0% 0% / 0.2) 95%), url(' . $bg . ');
            }
            @media (min-width: 768px) {
                .page-hero {
                    background-image: ' . $easedGradient . ', url(' . $bg . ');
                }
            }
        </style>';
        // style="background-image: ' . $easedGradient . ', url(' . $bg . ');"
        echo '<div class="page-hero | ll-equal-vert-padding bg-no-repeat bg-[right_33%_center] bg-cover lg:bg-center print:py-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="">
            <div class="flex flex-col justify-center px-2 min-h-[240px] md:container md:mx-auto md:px-0 md:min-h-hero">
                <div class="">
                    <h1 class="leading-none text-white tracking-light text-shadow-lg shadow-neutral-900 lg:text-6xl">' . $h1 . '</h1>
                    <h2 class="mt-4 text-2xl leading-normal max-w-[42ch] text-brand-blue-pale text-shadow-lg shadow-neutral-900 lg:text-4xl">' . $h2 . '</h2>
                </div>
            </div>';

        if ( function_exists( 'bcn_display' ) && !is_front_page() ) {
            echo '<div class="breadcrumbs | container mx-auto px-2 md:px-0 font-head text-brand-gray-faint" typeof="BreadcrumbList" vocab="https://schema.org">' . bcn_display( true ) . '</div>
            </div>';
        }

        echo '</div>';
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
					'<div class="image__featured--outer | overflow-hidden empty-feat-img  print:hidden"><div class="image__featured--inner | %4$s transition-transform duration-300 ease-in-out group-hover:scale-110" style="background-image: url(%1$s); aspect-ratio: %2$s" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="%3$s"></div></div>',
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
				'<div class="overflow-hidden image__featured--outer print:hidden"><div class="image__featured--inner | %4$s transition-transform duration-300 ease-in-out group-hover:scale-110" style="background-image: url(%1$s); aspect-ratio: %2$s" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="%3$s"></div></div>',
				esc_url( $feat_image_url[0] ),
				esc_attr( $feat_aspect_ratio ),
				esc_attr( get_the_title() ),
				esc_attr( $bg_size ),
			);
		}

		echo $featmarkup;
	}
endif;


if ( ! function_exists( 'll_people_dept_list' ) ) :
	/**
	 * Display People/Author department(s)
	 */
	function ll_people_show_dept_list( $departments ) {
		echo '<span class="inline-pipe-sep | "><svg class="inline llicon"><use xlink:href="#people-group" title="Department(s)"></use></svg> ';
		foreach( $departments as $dept ) {
			echo '<span class="text-neutral-600">' . $dept['label'] . '</span>';
		}
		echo '</span>';
	}
endif;

if ( ! function_exists( 'll_people_show_location' ) ) :
	/**
	 * Display People/Author location
	 */
	function ll_people_show_location( $location ) {
		echo '<span class=""><svg class="inline llicon"><use xlink:href="#location-dot" title="Location"></use></svg> <span class="text-neutral-600">' . esc_html( $location ) . '</span></span>';
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


// if ( ! function_exists( 'll_people_paging_nav' ) ) :
// 	/**
// 	 * Display navigation to next/previous set of people when applicable.
// 	 *
// 	 * via:
// 	 */

// 	function ll_people_paging_nav( $pages = '', $range = 4) {
// 		$showitems = ( $range * 2 ) + 1;
//         global $paged;
//         if( empty( $paged ) ) $paged = 1;
//         if( $pages == '' )
//         {
//             global $wp_query;
//             $pages = $wp_query->max_num_pages;
//             if( !$pages ) {
//                 $pages = 1;
//             }
//         }
//         if( 1 != $pages ) {
//             echo "<nav aria-label='Page navigation'><ul class='pagination'><li>Page ".$paged." of ".$pages."</li>";
//             if( $paged > 2 && $paged > $range+1 && $showitems < $pages ) echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo; First</a>";
//             if( $paged > 1 && $showitems < $pages ) echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo; Previous</a>";
//             for ( $i=1; $i <= $pages; $i++ )
//             {
//                 if ( 1 != $pages &&( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
//                     echo ( $paged == $i )? "<li class=\"page-item active\"><a class='page-link'>" . $i . "</a></li>" : "<li class='page-item'> <a href='" . get_pagenum_link( $i ) . "' class=\"page-link\">" . $i . "</a></li>";
//                 }
//             }
//             if ( $paged < $pages && $showitems < $pages ) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link( $paged + 1 ) . "\">i class='fa-regular fa-back'></i></a></li>";
//             if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) echo " <li class='page-item'><a class='page-link' href='" . get_pagenum_link( $pages ) . "'><i class='fa-regular fa-forward'></i></a></li>";
//             echo "</ul></nav>\n";
//         }
// 	}
// endif;


/**
 * Change the label of the footnotes section below the content.
 */
function ll_efn_change_label_markup( $output, $label ) {
	return '<h6 class="mt-16 text-brand-red-pale">' . $label . '</h6>';
}
add_filter( 'efn_footnote_label', 'll_efn_change_label_markup', 10, 2 );

/**
 * Disable the js 'qTip' functionality for better performance
 */
function ll_efn_deregister_scripts() {
	wp_deregister_style( 'qtipstyles' );
	wp_deregister_script( 'imagesloaded' );
	wp_deregister_script( 'qtip' );
	wp_deregister_script( 'qtipcall' );
}
add_action( 'wp_enqueue_scripts', 'll_efn_deregister_scripts' );


if ( ! function_exists( 'll_content_class' ) ) :
	/**
	 * Displays the class names for the post content wrapper.
	 *
	 * This allows us to add Tailwind Typography’s modifier classes throughout
	 * the theme without repeating them in multiple files. (They can be edited
	 * at the top of the `../functions.php` file via the
	 * _TW_TYPOGRAPHY_CLASSES constant.)
	 *
	 * Based on WordPress core’s `body_class` and `get_body_class` functions.
	 *
	 * @param array $class Space-separated string or array of class names to
	 *                     add to the class list.
	 */
	function ll_content_class( $class = '' ) {
		$all_classes = array( $class, LL_TYPOGRAPHY_CLASSES );

		foreach ( $all_classes as &$classes ) {
			if ( ! empty( $classes ) ) {
				if ( ! is_array( $classes ) ) {
					$classes = preg_split( '#\s+#', $classes );
				}
			} else {
				// Ensure that we always coerce class to being an array.
				$classes = array();
			}
		}

		$combined_classes = array_merge( $all_classes[0], $all_classes[1] );
		$combined_classes = array_map( 'esc_attr', $combined_classes );

		// Separates class names with a single space, preparing them for the
		// post content wrapper.
		echo 'class="' . esc_attr( implode( ' ', $combined_classes ) ) . '"';
	}
endif;
