<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Load_Lifter
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ll_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'll_pingback_header' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );




/**
 * Display post id column in posts list
 */
function ll_add_id_column( $columns ) {
	$columns['ll_id'] = 'ID';
	return $columns;
}

function ll_id_column_content( $column, $id ) {
	if ( 'll_id' == $column ) {
		echo $id;
	}
}

add_filter( 'manage_posts_columns', 'll_add_id_column', 5 );
add_filter( 'manage_pages_columns', 'll_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'll_id_column_content', 5, 2 );
add_action( 'manage_pages_custom_column', 'll_id_column_content', 5, 2 );









/**
 * Custom body classes
 */
function ll_body_class( $classes ) {
	global $post;

	if ( wp_get_environment_type() == 'production' ) {
		$classes[] = 'env-prod';
	}

	if ( wp_get_environment_type() == 'staging' ) {
		$classes[] = 'env-staging';
	}

	if ( wp_get_environment_type() == 'local' ) {
		$classes[] = 'env-dev';
	}

	return $classes;
}
add_filter( 'body_class', 'll_body_class' );


/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 *
 * via: https://developer.wordpress.org/reference/functions/get_the_terms/#comment-405
 */
// function wpdocs_custom_taxonomies_terms_links() {
// 	// Get post by post ID.
// 	if ( ! $post = get_post() ) {
// 		return '';
// 	}

// 	// Get post type by post.
// 	$post_type = $post->post_type;

// 	// Get post type taxonomies.
// 	$taxonomies = get_object_taxonomies( $post_type, 'objects' );

// 	$out = array();

// 	foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

// 		// Get the terms related to post.
// 		$terms = get_the_terms( $post->ID, $taxonomy_slug );

// 		if ( ! empty( $terms ) ) {
// 			$out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
// 			foreach ( $terms as $term ) {
// 				$out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
// 					esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
// 					esc_html( $term->name )
// 				);
// 			}
// 			$out[] = "\n</ul>\n";
// 		}
// 	}
// 	return implode( '', $out );
// }


/**
 * Using a shortcode to conditionally enqueue the a11y-slider js
 */
function ll_a11y_slider_shortcode() {
    return '';
}
add_shortcode( 'a11yslider', 'll_a11y_slider_shortcode' );


/**
 * Social Links
 * Uses Social URLs specified in Yoast SEO. See SEO > Social
 *
 * via: https://www.billerickson.net/code/displaying-social-links-from-yoast-seo/
 */
function ll_social_links() {

	$options = array(
		'linkedin' 		=> array(
			'key' 		=> 'linkedin_url',
			'icon' 		=> '<svg class="m-[7px] fill-current " height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m5.2 21.6v-14.5h-4.8v14.5zm-2.4-16.5c1.7 0 2.7-1.1 2.7-2.5s-1-2.5-2.7-2.5c-1.6 0-2.7 1.1-2.7 2.5s1 2.5 2.7 2.5zm5.1 16.5h4.8v-8.1c0-.4 0-.9.2-1.2.3-.9 1.1-1.8 2.5-1.8 1.7 0 2.4 1.3 2.4 3.3v7.8h4.8v-8.3c0-4.5-2.4-6.5-5.5-6.5-2.6 0-3.7 1.5-4.4 2.4v-2.1h-4.8z" fill-rule="evenodd" transform="translate(.5 1)"/></svg>',
		),
		'twitter' 		=> array(
			'key' 		=> 'twitter_site',
			'prepend' 	=> 'https://twitter.com/',
			'icon' 		=> '<svg class="m-[7px] fill-current " height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m46 10.2625813c-1.6182207.7220984-3.358458 1.210165-5.184707 1.4321953 1.8642542-1.1261536 3.2944492-2.90639637 3.9685412-5.02868577-1.7462382 1.04214211-3.6745011 1.79824522-5.7327818 2.20430059-1.6462245-1.76624085-3.9905441-2.87039142-6.5888985-2.87039142-4.98668 0-9.027231 4.0705551-9.027231 9.0892394 0 .7140974.080011 1.4061918.234032 2.0722826-7.5010229-.3780515-14.15393012-3.996545-18.60453702-9.49529479-.77810611 1.34018275-1.22216666 2.90239579-1.22216666 4.56862299 0 3.1524299 1.59421739 5.9348093 4.01454743 7.5630313-1.48020184-.0480065-2.87039141-.4560622-4.08855753-1.1361549v.1160158c0 4.4026004 3.11042415 8.0751012 7.24298768 8.9112152-.7581034.2060281-1.55421193.3200436-2.37832431.3200436-.58207938 0-1.14815657-.0580079-1.69823158-.1660226 1.14815657 3.6104923 4.48261129 6.2388507 8.43114969 6.3128608-3.0884211 2.4383325-6.98095194 3.8905306-11.21152883 3.8905306-.72809929 0-1.44819748-.044006-2.15429377-.1260172 3.99454471 2.5783516 8.7391917 4.0825567 13.837887 4.0825567 16.6042642 0 25.6835023-13.8498886 25.6835023-25.8595263 0-.3940537-.0100014-.7841069-.0260036-1.1741601 1.7642406-1.2821749 3.2944493-2.8823931 4.5046143-4.7046416z" fill-rule="evenodd"/></svg>',
		),
		'facebook' 		=> array(
			'key' 		=> 'facebook_site',
			'icon' 		=> '<svg class="m-[7px] fill-current " height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m27.3303691 44h-8.8883949v-18.8883948h-4.4419742v-7.2765674h4.4419742v-4.3686083c0-5.93374831 2.5077812-9.4664295 9.6309471-9.4664295h5.9337483v7.2787906h-3.7060916c-2.7745664 0-2.9590929 1.0182303-2.9590929 2.9146287l-.011116 3.6416185h6.7185415l-.7870164 7.2765674h-5.9315251z" fill-rule="evenodd"/></svg>',
		),
		'instagram' 	=> array(
			'key' 		=> 'instagram_url',
			'icon' 		=> '<svg class="m-[7px] fill-current " height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m31.9591786 4c6.6394276 0 12.0408214 5.26122862 12.0408214 11.7279466v16.5441068c0 6.4668388-5.4013938 11.7279466-12.0408214 11.7279466h-15.9182332c-6.63942762 0-12.0409454-5.2611078-12.0409454-11.7279466v-16.5441068c0-6.46671798 5.40151778-11.7279466 12.0409454-11.7279466zm7.6928228 28.2720534v-16.5441068c0-4.1315881-3.4509697-7.49285141-7.6928228-7.49285141h-15.9182332c-4.2418531 0-7.69282279 3.36126331-7.69282279 7.49285141v16.5441068c0 4.1315881 3.45096969 7.4928514 7.69282279 7.4928514h15.9182332c4.2418531 0 7.6928228-3.3612633 7.6928228-7.4928514zm-15.5744383-19.4380664c3.5180547.1000046 6.4521849 1.2699851 8.4849462 3.3837282 1.9316998 2.008545 2.91615 4.700696 2.847081 7.7851352-.066341 2.9544816-1.2643222 5.7223606-3.3730966 7.7937104-2.1422548 2.1043224-4.9962799 3.2633121-8.0364317 3.2633121-6.2914786 0-11.4100243-4.9854915-11.4100243-11.1135468 0-6.2362728 5.1788106-11.2920573 11.4875254-11.1123391zm6.0187987 11.0558148c.0266604-1.1878558-.1967908-2.8693329-1.4125044-4.1333998-1.043351-1.0849525-2.6897227-1.6894485-4.7612965-1.7483884-.0558008-.0015701-.1112296-.0022947-.1665344-.0022947-1.5429542 0-3.0028273.6166946-4.1109072 1.7364313-1.1224642 1.1344716-1.7407371 2.6275344-1.7407371 4.2041759 0 3.2738197 2.7344874 5.9372254 6.0956798 5.9372254 3.3430881 0 6.0210307-2.6327279 6.0962998-5.9937497zm4.6846386-12.8765373c1.3559596 0 2.4551114 1.0705799 2.4551114 2.3912919 0 1.3205912-1.0991518 2.3911711-2.4551114 2.3911711-1.3559595 0-2.4551113-1.0705799-2.4551113-2.3911711 0-1.320712 1.0991518-2.3912919 2.4551113-2.3912919z" fill-rule="evenodd"/></svg>',
		),
		'pinterest' 	=> array(
			'key' 		=> 'pinterest_url',
			'icon' 		=> '<svg class="m-[7px] fill-current " height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m21.5273456 30.4552531c-1.1118822 5.5053449-2.4682375 10.7850224-6.4855878 13.5447469-1.2411708-8.323837 1.8217943-14.5743545 3.2439692-21.2103872-2.4235741-3.8598532.2914871-11.624223 5.4042647-9.7107513 6.2904795 2.353053-5.448928 14.3439856 2.4329769 15.8437337 8.2274582 1.5632171 11.5866118-13.5000835 6.4855878-18.3989472-7.3718026-7.07326331-21.4619124-.1621984-19.7294447 9.9646272.4231264 2.4776403 3.1264341 3.2275143 1.081323 6.6454355-4.71785955-.9896456-6.12828095-4.508647-5.94492617-9.2006489.29148709-7.6773938 7.29658007-13.05345008 14.32282937-13.79862273 8.8856548-.94028093 17.2259467 3.08647217 18.3777908 10.98953343 1.295237 8.9209154-4.0102982 18.582302-13.5141877 17.8864941-2.5740191-.1904069-3.6553421-1.3963172-5.6745954-2.5552135" fill-rule="evenodd"/></svg>',
		),
		'youtube' 		=> array(
			'key' 		=> 'youtube_url',
			'icon' 		=> '<svg class="m-[7px] fill-current " height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m24.0041653 8.22999954c0 1.85174986 0 3.77208316-.4114999 5.55524966-.2743334 1.2345-1.3030833 2.1946666-2.5375832 2.3318332-2.9490832.3429167-5.8981664.3429167-8.8472495.3429167-2.94908321 0-5.89816638 0-8.84724955-.3429167-1.23449993-.1371666-2.26324988-1.0287499-2.5375832-2.3318332-.41149997-1.7831665-.41149997-3.7034998-.41149997-5.55524966 0-1.85174989 0-3.77208312.41149997-5.55524969.34291665-1.23449993 1.37166659-2.19466654 2.60616653-2.3318332 2.88049984-.34291665 5.82958301-.34291665 8.77866622-.34291665 2.9490831 0 5.8981663 0 8.8472495.34291665 1.2344999.13716666 2.2632498 1.02874994 2.5375832 2.3318332.4114999 1.78316657.4114999 3.7034998.4114999 5.55524969zm-14.74541581 5.62383306 7.88708291-5.4866664-7.88708291-5.48666636z" fill-rule="evenodd" transform="translate(0 3.77)"/></svg>',
		),
	);

	$options = apply_filters( 'll_social_link_options', $options );

	$output = array();

	$seo_data = get_option( 'wpseo_social' );
	foreach( $options as $social => $settings ) {

		$url = !empty( $seo_data[ $settings['key'] ] ) ? $seo_data[ $settings['key'] ] : false;
		if( !empty( $url ) && !empty( $settings['prepend'] ) )
			$url = $settings['prepend'] . $url;

		if( $url && !empty( $settings['icon'] ) )
			$output[] = '<a class="inline-block w-[38px] h-[38px] text-center rounded-full " href="' . esc_url_raw( $url ) . '">' . $settings['icon'] . '<span class="screen-reader-text">' . $social . '</span></a>';
	}

	if( !empty( $output ) )
		return '<p class="social-links | m-0 leading-none space-x-2">' . join( ' ', $output ) . '</p>';
}
// add_shortcode( 'social_links', 'll_social_links' );


/**
 * Template Parts with Display Posts Shortcode
 * @author Bill Erickson
 * @see https://www.billerickson.net/template-parts-with-display-posts-shortcode
 *
 * @param string $output, current output of post
 * @param array $original_atts, original attributes passed to shortcode
 * @return string $output
 */
function ll_dps_template_part( $output, $original_atts ) {

	// Return early if our "layout" attribute is not specified
	if( empty( $original_atts['layout'] ) )
		return $output;
	ob_start();
	get_template_part( 'template-parts/dps/dps', $original_atts['layout'] );
	$new_output = ob_get_clean();
	if( !empty( $new_output ) )
		$output = $new_output;
	return $output;
}
add_action( 'display_posts_shortcode_output', 'll_dps_template_part', 10, 2 );

/**
 * Display Posts, span wrapper open
 * @see https://displayposts.com/2019/01/23/display-inline-link-with-most-recent-post/
 */
function ll_dps_span_wrapper_open( $wrapper, $atts ) {
	if( !empty( $atts['wrapper'] ) && 'span' == $atts['wrapper'] )
		$wrapper = '<span class="dps-inline">';
	return $wrapper;
}
add_filter( 'display_posts_shortcode_wrapper_open', 'll_dps_span_wrapper_open', 10, 2 );

/**
 * Display Posts, pan wrapper close
 * @see https://displayposts.com/2019/01/23/display-inline-link-with-most-recent-post/
 */
function ll_dps_span_wrapper_close( $wrapper, $atts ) {
	if( !empty( $atts['wrapper'] ) && 'span' == $atts['wrapper'] )
		$wrapper = '</span>';
	return $wrapper;
}
add_filter( 'display_posts_shortcode_wrapper_close', 'll_dps_span_wrapper_close', 10, 2 );

/**
 * Display Posts, span in output
 * @see https://displayposts.com/2019/01/23/display-inline-link-with-most-recent-post/
 */
function ll_dps_span_output( $output, $atts ) {
	if( !empty( $atts['wrapper'] ) && 'span' == $atts['wrapper'] ) {
		$output = str_replace( array( '<div', '<li' ), '<span', $output );
		$output = str_replace( array( '</div>', '</li>' ), '</span>', $output );
	}
	return $output;
}
add_filter( 'display_posts_shortcode_output', 'll_dps_span_output', 10, 2 );

/**
 * Exclude displayed posts from Display Posts
 * @see https://displayposts.com/2019/01/03/exclude-posts-already-displayed/
 */
function ll_dps_exclude_displayed_posts( $args ) {
	global $dps_excluded_posts;
	$args['post__not_in'] = !empty( $args['post__not_in'] ) ? array_merge( $args['post__not_in'], $dps_excluded_posts ) : $dps_excluded_posts;
	return $args;
}
// add_filter( 'display_posts_shortcode_args', 'll_dps_exclude_displayed_posts' );

/**
 * Add DPS posts to exclusion list
 * @see https://displayposts.com/2019/01/03/exclude-posts-already-displayed/
 */
function ll_dps_add_posts_to_exclusion_list( $output ) {
  global $dps_excluded_posts;
  $dps_excluded_posts[] = get_the_ID();
  return $output;
}
// add_filter( 'display_posts_shortcode_output', 'll_dps_add_posts_to_exclusion_list' );


/**
 * Display Reusable Blocks in Menu
 */
function ll_show_reusable_blocks_menu() {
	add_menu_page(
		__( 'Reusable Blocks', 'loadlifter' ),
		'Reusable Blocks',
		'manage_options',
		'edit.php?post_type=wp_block',
		'',
		'dashicons-insert',
		31
	);
}
add_action( 'admin_menu', 'll_show_reusable_blocks_menu' );
