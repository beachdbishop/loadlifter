<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Load_Lifter
 */

// 20231110 -- this function might not be needed anymore
// ... might have only been used while developing an earlier version of the primary nav
// if ( ! function_exists( 'll_menu_det_summary' ) ) :
// 	function ll_menu_det_summary( $name, $link = '', $summaryclasses ='', $linkclasses = '' ) {
// 		$html = sprintf( '<summary class="flex items-center px-3 py-2 md:py-1 rounded-lg lg:gap-2 %3$s"><span class=""><a href="%1$s" class="%4$s">%2$s</a></span><span class="ml-auto transition duration-300 shrink-0"><svg class="icon"><use xlink:href="#angle-down" /></svg></span></summary>', $name, $link, $summaryclasses, $linkclasses );

// 		return $html;
// 	}
// endif;


if ( ! function_exists( 'll_show_social_links' ) ) :
	/**
	 * Outputs linked social icons (from FA)
	 */
	function ll_show_social_links() {

		$social_html = '<div class="inline-flex items-center justify-start gap-4">';

			$social_html .= '<a href="https://www.linkedin.com/company/beachfleischman/" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-linkedin">
				<i class="size-8 fa-brands fa-linkedin-in  |  print:size-4"></i>
				<span id="soclink-linkedin" class="screen-reader-text">LinkedIn</span>
			</a>
			<a href="https://twitter.com/beachfleischman" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-twitter">
				<i class="size-8 fa-brands fa-x-twitter  |  print:size-4"></i>
				<span id="soclink-twitter" class="screen-reader-text">Twitter</span>
			</a>
			<a href="https://www.facebook.com/BeachFleischmanCPAs" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-facebook">
				<i class="size-8 fa-brands fa-facebook  |  print:size-4"></i>
				<span id="soclink-facebook" class="screen-reader-text">Facebook</span>
			</a>
			<a href="https://instagram.com/beachfleischman" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-instagram">
				<i class="size-8 fa-brands fa-instagram  |  print:size-4"></i>
				<span id="soclink-instagram" class="screen-reader-text">Instagram</span>
			</a>';

			// $social_html .= '<a href="" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-youtube">
			//         <i class="w-8 h-8 fa-brands fa-youtube"></i>
			//         <span id="soclink-youtube" class="screen-reader-text">Youtube</span>
			//     </a>
			//     <a href="" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-vimeo">
			//         <i class="w-8 h-8 fa-brands fa-vimeo-v"></i>
			//         <span id="soclink-vimeo" class="screen-reader-text">Vimeo</span>
			//     </a>
			//     <a href="" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-tiktok">
			//         <i class="w-8 h-8 fa-brands fa-tiktok"></i>
			//         <span id="soclink-tiktok" class="screen-reader-text">TikTok</span>
			//     </a>
			//     <a href="" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-mastodon">
			//         <i class="w-8 h-8 fa-brands fa-mastodon"></i>
			//         <span id="soclink-mastodon" class="screen-reader-text">Mastodon</span>
			//     </a>';

			$social_html .= '</div>';

		return $social_html;
	}
endif;


if ( ! function_exists( 'll_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ll_posted_on() {
		$time_string = '<time class="entry-date" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'YY "/" mm "/" dd' ) !== get_the_modified_time( 'YY "/" mm "/" dd' ) ) {
			$time_string = '<time class="entry-date date-published" datetime="%1$s">%2$s</time> <time class="date-updated font-bold" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( '%s', 'post date', 'loadlifter' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="timestamp lg:my-16">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

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
				<div class="print:break-inside-avoid"><h3>Authored by:</h3>
				<div class="flex items-center justify-center w-full py-4 print:justify-start">
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
				</div></div>
				EOT;
			} else {
				coauthors_posts_links(); // plain jane list
			}
		} else {
			the_author_posts_link();
		}
	}
endif;

if ( ! function_exists( 'll_posted_by_cards' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ll_posted_by_cards( $options = array() ) {
		$defaults = array(
			'show_thumb' => false,
		);
		$config = array_merge( $defaults, $options );

		if( function_exists( 'coauthors_posts_links' ) ) {
			if( $config['show_thumb']) {
				$coauthors = get_coauthors();
				echo <<<EOT
					<div class="print:break-inside-avoid"><h3>Authored by:</h3>
					<ul class="mt-4 mb-8 list-none grid grid-cols-1 gap-2 lg:gap-4">
					EOT;
					foreach( $coauthors as $coauthor ) {

						$avatar = get_field( 'll_user_headshot', 'user_' . $coauthor->ID );
						$title = get_field( 'll_user_title', 'user_' . $coauthor->ID );
						$desigs = get_field( 'll_user_designations', 'user_' . $coauthor->ID );

						if( !empty( $avatar ) ) {
							// $avatar_markup = sprintf( '<a href="/author/%3$s" class="relative inline-flex items-center justify-center text-white w-30 rounded-2xl" aria-label="Visit %2$s\'s author page"><img src="%1$s" alt="%2$s" title="%2$s" width="120" height="159" class="max-w-full border-2 border-white rounded-2xl" /></a>', $avatar['url'], $coauthor->display_name, $coauthor->user_nicename );


							$avatar_markup = '<li class="person-card | group @container">
								<div class="flex flex-col @2xs:flex-row gap-3 items-center h-full p-4 border rounded-lg border-neutral-200 lg:flex-row dark:border-neutral-600">

									<div class="card-text | flex-grow order-1 ">
										<h3 class="font-semibold text-xl lg:text-2xl !leading-none text-brand-gray-dark group-hover:text-brand-red dark:text-neutral-400">
											<a href="/author/' . $coauthor->user_nicename . '/" rel="bookmark">' . $coauthor->display_name . '</a> <small class="font-normal text-ellipsis overflow-hidden">' . $desigs . '</small>
										</h3>
										<p class="text-lg leading-tight text-neutral-600 font-head dark:text-neutral-500">' . $title . '</p>
									</div>

									<div class="card-img | shrink-0 object-cover object-center rounded-full bg-neutral-100 group-hover:border-brand-red" style="background-image: url(' . $avatar['url'] . '); background-size: 64px 86px; background-position: center top;">
										<a href="/author/' . $coauthor->user_nicename . '/" rel="bookmark" class="no-underline" aria-label="View ' . $coauthor->display_name . '&apos;s bio">
											<div class="w-16 h-16 aspect-square">&nbsp;</div>
										</a>
									</div>

								</div>
							</li>';

						} else {
							// $avatar_markup = sprintf( '<a href="/author/%2$s" class="relative border-2 border-white text-neutral-100 bg-neutral-400 rounded-2xl" aria-label="Visit %2$s\'s author page"><div class="inline-flex items-center justify-center px-4 w-[120px] aspect-headshot" title="%1$s"><i class="fa-regular fa-user fa-2x"></i></div></a>', $coauthor->display_name, $coauthor->user_nicename );
							$avatar_markup = '<li class="person-card | group @container">
								<div class="flex flex-col @2xs:flex-row gap-3 items-center h-full p-4 border rounded-lg border-neutral-200 lg:flex-row dark:border-neutral-600">

									<div class="card-text | flex-grow order-1 ">
										<h3 class="font-semibold text-xl lg:text-2xl !leading-none text-brand-gray-dark group-hover:text-brand-red dark:text-neutral-400">
											<a href="/author/' . $coauthor->user_nicename . '/" rel="bookmark">' . $coauthor->display_name . '</a> <small class="font-normal text-ellipsis overflow-hidden">' . $desigs . '</small>
										</h3>
										<p class="text-lg leading-tight text-neutral-600 font-head dark:text-neutral-500">' . $title . '</p>
									</div>

									<div class="card-img | shrink-0 object-cover object-center rounded-full bg-neutral-200 group-hover:border-brand-red dark:bg-neutral-600">
										<a href="/author/' . $coauthor->user_nicename . '/" rel="bookmark" class="no-underline" aria-label="View ' . $coauthor->display_name . '&apos;s bio">
											<div class="w-16 h-16 aspect-square">&nbsp;</div>
										</a>
									</div>

								</div>
							</li>';
						}

						echo $avatar_markup;
					}
					echo <<<EOT
					</ul>
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
			$categories_list = get_the_category_list( esc_html__( ', ', 'loadlifter' ) );
			$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'loadlifter' ) );

			echo '<div class="my-8 lg:my-16"><h3 class="mb-2">' . __( 'Related topics', 'loadlifter' ) . '</h3>';

			if ( $categories_list ) {
				printf( '<span class="catlist lg:mb-2">' . esc_html__( 'Posted in: %1$s', 'loadlifter' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			if ( $categories_list && $tags_list ) {
				printf( '<div>&nbsp;</div>' );
			}

			if ( $tags_list ) {
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


// if ( ! function_exists( 'll_page_title' ) ) :
// 	function ll_page_title( $h1, $h2 ) {
// 		echo '<div class="px-2 md:container lg:px-[16px]">
// 			<h1 class="leading-none tracking-light lg:text-6xl">'.$h1.'</h1>
// 			<h2 class="mt-4 text-2xl leading-normal max-w-[42ch] text-orient-400 lg:text-4xl">'.$h2.'</h2>
// 		</div>';

// 		if ( function_exists( 'bcn_display' ) && !is_front_page() ) {
// 			echo '<div class="breadcrumbs | px-2 md:container lg:px-[16px] font-head text-neutral-600" typeof="BreadcrumbList" vocab="https://schema.org">' . bcn_display( true ) . '</div>
// 			</div>';
// 		}
// 	}
// endif;


/* Used on Pages */
if ( ! function_exists( 'll_page_hero' ) ) :
	function ll_page_hero( $h1, $h2, $cta1_text = null, $cta1_url = null, $cta2_text = null, $cta2_url = null ) {
		$easedGradient = 'linear-gradient(to right, hsla(0, 0%, 16%, 0.9) 0%, hsla(0, 0%, 16%, 0.891) 8.1%, hsla(0, 0%, 16%, 0.866) 15.5%, hsla(0, 0%, 16%, 0.827) 22.5%, hsla(0, 0%, 16%, 0.777) 29%, hsla(0, 0%, 16%, 0.719) 35.3%, hsla(0, 0%, 16%, 0.654) 41.2%, hsla(0, 0%, 16%, 0.585) 47.1%, hsla(0, 0%, 16%, 0.515) 52.9%, hsla(0, 0%, 16%, 0.446) 58.8%, hsla(0, 0%, 16%, 0.381) 64.7%, hsla(0, 0%, 16%, 0.323) 71%, hsla(0, 0%, 16%, 0.273) 77.5%, hsla(0, 0%, 16%, 0.234) 84.5%, hsla(0, 0%, 16%, 0.209) 91.9%, hsla(0, 0%, 16%, 0.2) 100%)';
		$moreA11yGradient = 'linear-gradient(to right, hsl(0 0% 16% / 0.95) 0%, hsl(0 0% 16% / 0.8) 40%, hsl(0 0% 16% / 0.6) 50%, hsl(0 0% 16% / 0.2) 80%, hsl(0 0% 16% / 0) 100% )';

		$hero_html = '<style>.page-hero { background-color: #171717; background-image: linear-gradient(to right, hsl(0 0% 16% / 0.8) 0%, hsl(0 0% 16% / 0.8) 100%), var(--ll--page-feat-img); } @media (min-width: 768px) { .page-hero { background-image: ' . $moreA11yGradient . ', var(--ll--page-feat-img); } } @media print { .page-hero { background-color: transparent; background-image: none; } }</style>';

		$hero_html .= '<div class="page-hero | ll-equal-vert-padding bg-no-repeat bg-[right_33%_center] bg-cover  |  lg:bg-center print:py-8">';
		$hero_html .= '<div class="flex flex-col justify-center px-2 min-h-[240px]  |  md:container xl:px-4 md:min-h-(--height-hero) print:min-h-fit"><div class="">';
		$hero_html .= '<h1 class="leading-none text-white tracking-light  |  lg:text-6xl print:drop-shadow-none">' . $h1 . '</h1>';
		$hero_html .= '<h2 class="my-6 text-2xl leading-normal max-w-[42ch] text-orient-400  |  lg:text-4xl print:drop-shadow-none">' . $h2 . '</h2>';

		if ( ( !empty( $cta1_text ) ) && ( !empty( $cta1_url ) ) ) {
			$hero_html .= '<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex ">
				<div class="inline-block m-0">
					<a class="border-2 inline-flex items-center justify-center px-5 py-3 font-head font-semibold no-underline rounded-lg text-neutral-100 !bg-brand-red-dark border-brand-red-dark shadow-md shadow-neutral-950 hover:border-white hover:text-white" href="' . $cta1_url . '">' . $cta1_text . '</a>
				</div>';
				if ( ( !empty( $cta2_text ) ) && ( !empty( $cta2_url ) ) ) {
					$hero_html .= '<div class="inline-block m-0">
						<a class="border-2 inline-flex items-center justify-center px-5 py-3 font-head font-semibold no-underline rounded-lg bg-transparent border-neutral-200 text-neutral-200 shadow-md shadow-neutral-950 hover:bg-transparent hover:border-orient-400 hover:text-orient-400" href="' . $cta2_url . '">' . $cta2_text . '</a>
					</div>';
				}
			$hero_html .= '</div>';
		}

		$hero_html .= '</div></div>';
		$hero_html .= '<nav class="breadcrumbs | md:container px-2 xl:px-4 font-head text-neutral-50 print:mt-8" aria-label="Breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org">' . bcn_display( true ) . '</nav>';
		$hero_html .= '</div>';

		return $hero_html;
	}
endif;


if ( ! function_exists( 'll_better_page_hero' ) ) :
	function ll_better_page_hero( $h1, $h2, $cta1_text = null, $cta1_url = null, $cta2_text = null, $cta2_url = null, $maxw = null ) {
		?>

		<div class="page-hero | wp-block-cover bg-neutral-950 ll-equal-vert-padding !px-0 print:py-4 print:bg-white print:text-black">
			<span aria-hidden="true" class="page-hero-overlay | z-[1] absolute top-0 right-0 bottom-0 left-0 print:hidden"></span>
			<?php echo the_post_thumbnail( 'full', ['class' => 'wp-block-cover__image-background not-transparent wp-post-image print:hidden'] ); ?>

			<div class="wp-block-cover__inner-container | px-2 lg:px-4 print:!px-0">
				<div class="text-neutral-800 flex flex-col justify-center space-y-6 min-h-[240px] | md:min-h-(--height-hero) print:min-h-min">
					<h1 class="has-text-color leading-none text-white tracking-light text-pretty drop-shadow-xl shadow-neutral-950 <?php if ( $maxw == 1 ) { echo ' md:max-w-5xl'; } ?> lg:text-6xl lg:print:!text-xl print:text-black print:drop-shadow-none" style="text-wrap: unset"><?php echo $h1; ?></h1>
					<?php if ( !empty( $h2 ) ) { ?><h2 class="text-2xl leading-none text-pretty !text-orient-400 drop-shadow-xl shadow-neutral-950 md:max-w-5xl lg:text-4xl lg:print:!text-base print:drop-shadow-none print:!text-black"><?php echo $h2; ?></h2><?php } ?>
					<?php if ( ( !empty( $cta1_text ) ) && ( !empty( $cta1_url ) ) ) { ?>
						<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex *:inline-block *:m-0">
							<div class="print:hidden">
								<a class="border-2 inline-flex items-center justify-center px-5 py-3 font-head font-semibold no-underline rounded-lg text-neutral-100 !bg-brand-red-dark border-brand-red-dark shadow-md shadow-neutral-950 hover:border-white hover:text-white" href="<?php echo $cta1_url; ?>"><?php echo $cta1_text; ?></a>
							</div>
							<?php if ( ( !empty( $cta2_text ) ) && ( !empty( $cta2_url ) ) ) { ?>
								<div class="print:hidden">
									<a class="border-2 inline-flex items-center justify-center px-5 py-3 font-head font-semibold no-underline rounded-lg bg-transparent border-neutral-200 text-neutral-200 shadow-md shadow-neutral-950 hover:bg-transparent hover:border-orient-400 hover:text-orient-400" href="<?php echo $cta2_url; ?>"><?php echo $cta2_text; ?></a>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>

				<?php if ( ( !is_front_page() ) && ( !is_page_template( LL_LP_TEMPLATES ) ) ) { ?>
					<nav class="breadcrumbs  |  mt-4 font-head text-neutral-50  |  sm:mt-0 print:mt-8 print:text-black" aria-label="Breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org"><?php echo bcn_display( true ); ?></nav>
				<?php } ?>
			</div>
		</div>

		<?php
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
				$feat_aspect_ratio = 'aspect-feat-375';
				$bg_size = 'bg-center bg-cover bg-no-repeat';
			} else {
				$feat_aspect_ratio = 'aspect-feat-43';
				$bg_size = 'bg-center bg-no-repeat';
			}
		} else {
			$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
			$feat_aspect_ratio = 'aspect-card';
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
							class="image__featured--inner | %4$s %2$s transition-transform duration-300 ease-in-out group-hover:scale-110"
							style="background-image: url(%1$s);"
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
				'<div class="image__featured--outer | overflow-hidden print:hidden">
					<div
						class="image__featured--inner | %4$s %2$s transition-transform duration-300 ease-in-out group-hover:scale-110"
						style="background-image: url(%1$s);"
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


if ( ! function_exists( 'll_post_social_image' ) ) :
	/**
	 * Renders a post's social image set in The SEO Framework
	 */
	function ll_post_social_image() {
		global $post;
		$default_post_image = esc_url( get_template_directory_uri() . '/img/feat__empty--blog.svg' );
		$default_loc_image = esc_url( get_template_directory_uri() . '/img/feat__map--none.png' );
		$post_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
		$post_social_image = $post->_social_image_url;


		if ( 'location' === get_post_type() ) {
			if ( !$post_social_image ) {
				$featured_image = $default_loc_image;
			} else {
				$featured_image = $post_social_image;
			}
		} else {
			// Page, Post, etc.
			if ( ( !has_post_thumbnail() ) && ( !$post_social_image ) ) {
				$featured_image = $default_post_image;
			} elseif ( ( has_post_thumbnail() ) && ( !$post_social_image ) ) {
				$featured_image = $post_featured_image[0];
			} else {
				$featured_image = $post_social_image;
			}
		}


		$featmarkup = sprintf(
			'<div class="image__featured--outer  |  overflow-hidden  |  print:hidden">
				<div
					class="image__featured--inner  |  bg-center bg-cover bg-no-repeat aspect-card transition-transform duration-300 ease-in-out  |  group-hover:scale-110"
					style="background-image: url(%1$s);"
					aria-label="%2$s"
					role="img"
				></div>
			</div>',
			$featured_image,
			esc_attr( get_the_title() ),
		);

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
						'class' => 'relative mx-auto md:mx-0 print:!h-[2in] print:w-auto',
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
	function ll_people_show_dept_list( $departments, $options = array() ) {
		$defaults = array(
			'icons' => true,
		);
		$config = array_merge( $defaults, $options );

		if ( $config['icons'] ) {
			echo '<span class="inline-pipe-sep text-ellipsis overflow-hidden"><i class="fa-solid fa-people-group" title="Department(s)"></i> ';
		} else {
			echo '<span class="inline-pipe-sep">';
		}

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
		echo '<span class=""><i class="fa-solid fa-location-dot" title="Location"></i> <span class="">' . esc_html( $location ) . '</span></span>';
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


if ( ! function_exists( 'll_content_class' ) ) :
	/**
	 * Displays the class names for the post content wrapper.
	 *
	 * This allows us to add Tailwind Typography’s modifier classes throughout
	 * the theme without repeating them in multiple files. (They can be edited
	 * at the top of the `../functions.php` file via the
	 * LL_TYPOGRAPHY_CLASSES constant.)
	 *
	 * Based on WordPress core’s `body_class` and `get_body_class` functions.
	 *
	 * @param array $classes Space-separated string or array of class names to
	 *                     add to the class list.
	 */
	function ll_content_class( $classes = '' ) {
		$all_classes = array( $classes, LL_TYPOGRAPHY_CLASSES );

		foreach ( $all_classes as &$class_groups ) {
			if ( ! empty( $class_groups ) ) {
				if ( ! is_array( $class_groups ) ) {
					$class_groups = preg_split( '#\s+#', $class_groups );
				}
			} else {
				// Ensure that we always coerce class to being an array.
				$class_groups = array();
			}
		}

		$combined_classes = array_merge( $all_classes[0], $all_classes[1] );
		$combined_classes = array_map( 'esc_attr', $combined_classes );

		// Separates class names with a single space, preparing them for the
		// post content wrapper.
		echo 'class="' . esc_attr( implode( ' ', $combined_classes ) ) . '"';
	}
endif;


if ( ! function_exists( 'll_a11y_icon_link' ) ) :
	function ll_a11y_icon_link( $link ) {
		echo '<a href="'. $link['url'] .'" class="duration-200 ease-in-out hover:scale-125" aria-labelledby="soclink-%2$s">
			<i class="'. $link['icon'] .'"></i>
			<span class="screen-reader-text">'. $link['label'] .'</span>
		</a>';
	}
endif;


if ( ! function_exists( 'll_footer_address' ) ) :
	function ll_footer_address( $addr ) {
		echo '<div class=" md:pt-2">
			<div class="space-y-2 not-italic text-shadow shadow-neutral-900 print:drop-shadow-none print:space-y-1" property="address" typeof="PostalAddress">
				<p class="street-address | font-head leading-none " property="streetAddress">' . $addr['street1'] . '</p>
				<p class="locality | font-head leading-none "><span property="addressLocality">' . $addr['city'] . '</span>, <span class="state" property="addressRegion">' . $addr['state'] . '</span> <span class="zip" property="postalCode">' . $addr['zip'] . '</span></p>
				<p class="font-semibold leading-none font-head " property="telephone">P: <a href="tel:'. ll_format_phone_number( $addr['phone'] ) .'" rel="nofollow" onclick="ga(\'send\', \'event\', \'Phone Call Tracking\', \'Click to Call\', \'' . ll_format_phone_number( $addr['phone'], 'us') . '\', 0);">' . ll_format_phone_number( $addr['phone'], 'beach') . '</a></p>
				<p class="font-semibold leading-none font-head" property="faxNumber">F: ' . ll_format_phone_number( $addr['fax'], 'beach' ) . '</p>
			</div>
		</div>';
	}
	function ll_footer_address_clean( $addr ) {
		if ( !is_array( $addr ) || empty( $addr['street1'] ) || empty( $addr['city'] ) || empty( $addr['state'] ) || empty( $addr['zip'] ) || empty( $addr['phone'] ) ) {
			echo '<p class="is-style-note-error">Invalid address data provided.</p>';
			return;
		}

		echo '<div class="not-italic print:space-y-1" property="address" typeof="PostalAddress">
			<p class="street-address | leading-snug " property="streetAddress">' . $addr['street1'] . '</p>
			<p class="locality | leading-snug mb-2"><span property="addressLocality">' . $addr['city'] . '</span>, <span class="state" property="addressRegion">' . $addr['state'] . '</span> <span class="zip" property="postalCode">' . $addr['zip'] . '</span></p>
			<p class="leading-snug " property="telephone">P: ' . ll_format_phone_number( $addr['phone'], 'beach') . '</p>';
			if ( !empty( $addr['fax'] ) ) {
				echo '<p class="leading-snug" property="faxNumber">F: ' . ll_format_phone_number( $addr['fax'], 'beach' ) . '</p>';
			}
			echo '</div>';
	}
endif;


if ( ! function_exists( 'll_no_link_card' ) ) :
	function ll_no_link_card( $card ) {
		echo '<div>
			<div class="card | relative inline-block float-left w-(--_card-size) h-(--_card-size) [perspective:600px]" style="--_card-back-bg: #092f42">
				<div class="card-content | absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-700 [transform-style:preserve-3d] dark:shadow-none">
					<div class="card-front | text-center bg-(--_card-front-bg) text-(--_card-front-text) absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">
						<div class="card-icon | text-(--_card-front-icon)">
							<span class="fa-stack fa-2x">
								<i class="text-white fa-solid fa-circle fa-stack-2x dark:text-neutral-700"></i>
								<i class="fa-duotone ' . $card['icon'] . ' fa-stack-1x "></i>
							</span>
						</div>
						<h3 class="mt-2 font-light leading-none text-current">' . $card['label'] . '</h3>
					</div>
					<div class="card-back | absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-(--_card-back-bg) text-(--_card-back-text) bg-no-repeat bg-cover bg-blend-multiply shadow-neutral-900/50 [backface-visibility:hidden]  [transform:rotateY(180deg)]">
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
		echo '<div href="#" class="relative block bg-orient-950 group">
			<img alt="' . $card['imgAlt'] . '" src="' . $card['img'] . '" class="absolute inset-0 object-cover w-full h-full transition-opacity opacity-75 group-hover:opacity-25" />

			<div class="relative p-4 sm:p-6 lg:p-8">
				<p class="text-xl font-semibold text-white font-head text-shadow shadow-neutral-700 hover:shadow-orient-950 sm:text-2xl ">' . $card['label'] . '</p>

				<div class="mt-8 sm:mt-4 lg:mt-8">
					<div class="prose text-white transition-all transform translate-y-8 opacity-0 text-shadow shadow-orient-950 group-hover:translate-y-0 group-hover:opacity-100">' . $card['onHoverContent'] . '</div>
				</div>
			</div>
		</div>';
	}
endif;
