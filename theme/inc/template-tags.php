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
			$social_html .= sprintf( '<a href="%1$s" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-%2$s"><svg class="llicon-2x" aria-hidden="true"><use xlink:href="#%2$s" /></svg><span id="soclink-%2$s" class="screen-reader-text">%2$s</span></a>', esc_url( $value ), esc_attr( $key ) );
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
		if ( get_the_time( 'YY "/" mm "/" dd' ) !== get_the_modified_time( 'YY "/" mm "/" dd' ) ) {
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
				<h3>Authored by:</h3>
				<div class="flex items-center justify-center w-full py-4 ">
					<div class="flex -space-x-3">
				EOT;
				foreach( $coauthors as $coauthor ) {

					$avatar = get_field( 'll_user_headshot', 'user_' . $coauthor->ID );

					if( !empty( $avatar ) ) {
						$avatar_markup = sprintf( '<a href="/author/%3$s" class="relative inline-flex items-center justify-center text-white w-30 rounded-2xl" aria-label="Visit %2$s\'s author page"><img src="%1$s" alt="%2$s" title="%2$s" width="120" height="159" class="max-w-full border-2 border-white rounded-2xl" /></a>', $avatar['url'], $coauthor->display_name, $coauthor->user_nicename );
					} else {
						$avatar_markup = sprintf( '<a href="/author/%2$s" class="relative border-2 border-white text-neutral-100 bg-neutral-400 rounded-2xl" aria-label="Visit %2$s\'s author page"><div class="inline-flex items-center justify-center px-4 w-[120px] aspect-headshot" title="%1$s"><i class="fa-regular fa-user fa-2x"></i></div></a>', $coauthor->display_name, $coauthor->user_nicename );
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

            echo '<div class="my-8"><h3 class="mb-2">' . __( 'Related topics', 'loadlifter' ) . '</h3>';


			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="catlist lg:mb-2">' . esc_html__( 'Posted in: %1$s', 'loadlifter' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			if ( $categories_list && $tags_list ) {
				printf( '<div>&nbsp;</div>' );
			}

			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="list--tags | ">' . esc_html__( 'Tagged: %1$s', 'loadlifter' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

            echo '</div>';
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


if ( ! function_exists( 'll_page_title' ) ) :
    function ll_page_title( $h1, $h2 ) {
        echo '<div class="px-2 md:container md:mx-auto md:px-0">
            <h1 class="leading-none tracking-light lg:text-6xl">'.$h1.'</h1>
            <h2 class="mt-4 text-2xl leading-normal max-w-[42ch] text-brand-blue-pale lg:text-4xl">'.$h2.'</h2>
        </div>';

        if ( function_exists( 'bcn_display' ) && !is_front_page() ) {
            echo '<div class="breadcrumbs | container mx-auto px-2 md:px-0 font-head text-neutral-600" typeof="BreadcrumbList" vocab="https://schema.org">' . bcn_display( true ) . '</div>
            </div>';
        }
    }
endif;


/* Used on Pages */
if ( ! function_exists( 'll_page_hero' ) ) :
    function ll_page_hero( $h1, $h2 ) {
        $easedGradient = 'linear-gradient(to right, hsla(0, 0%, 16%, 0.9) 0%, hsla(0, 0%, 16%, 0.891) 8.1%, hsla(0, 0%, 16%, 0.866) 15.5%, hsla(0, 0%, 16%, 0.827) 22.5%, hsla(0, 0%, 16%, 0.777) 29%, hsla(0, 0%, 16%, 0.719) 35.3%, hsla(0, 0%, 16%, 0.654) 41.2%, hsla(0, 0%, 16%, 0.585) 47.1%, hsla(0, 0%, 16%, 0.515) 52.9%, hsla(0, 0%, 16%, 0.446) 58.8%, hsla(0, 0%, 16%, 0.381) 64.7%, hsla(0, 0%, 16%, 0.323) 71%, hsla(0, 0%, 16%, 0.273) 77.5%, hsla(0, 0%, 16%, 0.234) 84.5%, hsla(0, 0%, 16%, 0.209) 91.9%, hsla(0, 0%, 16%, 0.2) 100%)';
        $moreA11yGradient = 'linear-gradient(to right, hsl(0 0% 16% / 0.95) 0%, hsl(0 0% 16% / 0.8) 40%, hsl(0 0% 16% / 0.6) 60%, hsl(0 0% 16% / 0.2) 100% )';

        $hero_html = '<style>.page-hero { background-color: #171717; background-image: linear-gradient(to right, hsl(0 0% 16% / 0.8) 0%, hsl(0 0% 16% / 0.8) 100%), var(--ll--page-feat-img); } @media (min-width: 768px) { .page-hero { background-image: ' . $moreA11yGradient . ', var(--ll--page-feat-img); } }</style>';

        $hero_html .= '<div class="page-hero | ll-equal-vert-padding bg-no-repeat bg-[right_33%_center] bg-cover lg:bg-center print:py-8">';
        $hero_html .= '<div class="flex flex-col justify-center px-2 min-h-[240px] md:container md:mx-auto md:px-0 md:min-h-hero">
                <div class="">
                    <h1 class="leading-none text-white tracking-light text-shadow shadow-neutral-950 lg:text-6xl">' . $h1 . '</h1>
					<h2 class="mt-4 text-2xl leading-normal max-w-[42ch] text-brand-blue-pale text-shadow shadow-neutral-950 lg:text-4xl">' . $h2 . '</h2>
                </div>
		    </div>';
        $hero_html .= '<nav class="breadcrumbs | container mx-auto px-2 md:px-0 font-head text-brand-gray-faint" aria-label="Breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org">' . bcn_display( true ) . '</nav>';
        $hero_html .= '</div>';

        return $hero_html;
    }
endif;


/* Used on Posts */
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
					'<div class="image__featured--outer | overflow-hidden empty-feat-img print:hidden">
                        <div
                            class="image__featured--inner | %4$s transition-transform duration-300 ease-in-out group-hover:scale-110"
                            style="background-image: url(%1$s); aspect-ratio: %2$s"
                            aria-label="%3$s"
                            role="img"
                        ></div>
                    </div>',
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
				'<div class="overflow-hidden image__featured--outer print:hidden">
                    <div
                        class="image__featured--inner | %4$s transition-transform duration-300 ease-in-out group-hover:scale-110"
                        style="background-image: url(%1$s); aspect-ratio: %2$s"
                        aria-label="%3$s"
                        role="img"
                    ></div>
                </div>',
				esc_url( $feat_image_url[0] ),
				esc_attr( $feat_aspect_ratio ),
				esc_attr( get_the_title() ),
				esc_attr( $bg_size ),
			);
		}

		echo $featmarkup;
	}
endif;


/* Used on People */
if ( ! function_exists( 'll_people_headshot' ) ) :
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


if ( ! function_exists( 'll_people_dept_list' ) ) :
	/**
	 * Display People/Author department(s)
	 */
	function ll_people_show_dept_list( $departments ) {
		echo '<span class="inline-pipe-sep | "><svg class="inline llicon"><use xlink:href="#people-group" title="Department(s)"></use></svg> ';
		foreach( $departments as $dept ) {
			echo '<span class="">' . $dept['label'] . '</span>';
		}
		echo '</span>';
	}
endif;

if ( ! function_exists( 'll_people_show_location' ) ) :
	/**
	 * Display People/Author location
	 */
	function ll_people_show_location( $location ) {
		echo '<span class=""><svg class="inline llicon"><use xlink:href="#location-dot" title="Location"></use></svg> <span class="">' . esc_html( $location ) . '</span></span>';
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


if ( ! function_exists( 'll_footer_address' ) ) :
    function ll_footer_address( $addr ) {
        echo '<div class=" md:pt-2">
            <address class="space-y-2 not-italic text-shadow shadow-neutral-900" property="address" typeof="PostalAddress">
                <p class="street-address | font-head leading-none " property="streetAddress">' . $addr['street1'] . '</p>
                <p class="locality | font-head leading-none "><span property="addressLocality">' . $addr['city'] . '</span>, <span class="state" property="addressRegion">' . $addr['state'] . '</span> <span class="zip" property="postalCode">' . $addr['zip'] . '</span></p>
                <p class="font-bold leading-none font-head " property="telephone">P: <a href="tel:'. ll_format_phone_number( $addr['phone'] ) .'" rel="nofollow" onclick="ga(\'send\', \'event\', \'Phone Call Tracking\', \'Click to Call\', \'' . ll_format_phone_number( $addr['phone'], 'us') . '\', 0);">' . ll_format_phone_number( $addr['phone'], 'beach') . '</a></p>
                <p class="font-bold leading-none font-head " property="faxNumber">F: ' . ll_format_phone_number( $addr['fax'], 'beach' ) . '</p>
            </address>
        </div>';
    }
endif;


if ( ! function_exists( 'll_no_link_card' ) ) :
    function ll_no_link_card( $card ) {
        echo '<div>
            <div class="card | relative inline-block float-left w-[--card-size] h-[--card-size] [perspective:600px]" style="--card-back-bg: #092f42">
                <div class="card-content | absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-700 [transform-style:preserve-3d] dark:shadow-none">
                    <div class="card-front | text-center bg-[--card-front-bg] text-[--card-front-text] absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
                        <div class="card-icon | text-[--card-front-icon]">
                            <span class="fa-stack fa-2x">
                                <i class="text-white fa-solid fa-circle fa-stack-2x dark:text-neutral-700"></i>
                                <i class="fa-duotone ' . $card['icon'] . ' fa-stack-1x "></i>
                            </span>
                        </div>
                        <h3 class="mt-2 font-light leading-none text-current">' . $card['label'] . '</h3>
                    </div>
                    <div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-[--card-back-bg] text-[--card-back-text] bg-no-repeat bg-cover bg-blend-multiply shadow-neutral-900/50 [backface-visibility:hidden]  [transform:rotateY(180deg)]">
                        <h6 class="my-2 leading-none tracking-wide text-center text-current text-shadow">' . $card['label'] . '</h6>
                        <p class="text-center text-shadow">' . $card['backContent'] . '</p>
                    </div>
                </div>
            </div>
        </div>';
    }
endif;


if ( ! function_exists( 'll_render_hover_card' ) ) :
    function ll_render_hover_card( $card ) {
        echo '<a href="#" class="relative block bg-brand-blue-dark group">
            <img alt="' . $card['imgAlt'] . '" src="' . $card['img'] . '" class="absolute inset-0 object-cover w-full h-full transition-opacity opacity-75 group-hover:opacity-25" />

            <div class="relative p-4 sm:p-6 lg:p-8">
                <p class="text-xl font-bold text-white font-head text-shadow shadow-neutral-700 hover:shadow-brand-blue-dark sm:text-2xl ">' . $card['label'] . '</p>

                <div class="mt-8 sm:mt-4 lg:mt-8">
                    <div class="prose text-white transition-all transform translate-y-8 opacity-0 text-shadow shadow-brand-blue-dark group-hover:translate-y-0 group-hover:opacity-100">' . $card['onHoverContent'] . '</div>
                </div>
            </div>
        </a>';
    }
endif;
