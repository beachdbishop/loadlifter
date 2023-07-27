<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$brand_message = get_field( 'll_brand_message' );
$page_excerpt = get_the_excerpt();
$trending = get_field( 'll_front_trending_items' );
?>

<?php echo ll_page_hero( $brand_message['label'], $page_excerpt, $featimg[0] ); ?>

<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-4 md:py-6 lg:py-8' ); } ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">

		<header>
			<?php
			if ( !is_front_page() ) {
				the_title( '<h1 class="entry-title | ">', '</h1>' );
			} else {
				the_title( '<h1 class="entry-title | hidden ">', '</h1>' );
			}
			?>
		</header>

		<div>
            <section class="full-bleed ll-equal-vert-padding bg-gradient-70 from-brand-blue from-30% via-brand-blue-dark via-50% to-brand-blue to-90% bg-180pct animate-sway">
                <div class="px-2 wp-block-group post-grid md:container md:mx-auto md:px-0 has-brand-blue-faint-color">
                    <h2 class="mb-4 lg:mb-8">Trending Now</h2>
                    <?php echo do_shortcode( '[display-posts post_type="post,page,industries" id="' . implode( ', ', $trending ) . '" ignore_sticky_posts="true" orderby="title" order="DESC" wrapper="div" wrapper_class="dps-grid-3max text-brand-blue-faint" layout="card-simple" /]' ); ?>
                </div>
            </section>

			<?php the_content(); ?>

			<?php
			// wp_link_pages(
			// 	array(
			// 		'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
			// 		'after'  => '</div>',
			// 	)
			// );
			?>

            <section class="full-bleed ll-equal-vert-padding not-prose">
                <div class="post-grid | px-2 md:container md:mx-auto md:px-0">
                    <div class="flex items-center justify-between mb-4">
                        <h2>Recent Posts</h2>
                        <a href="/blog/" class="px-5 py-3 font-bold border-2 rounded-lg font-head border-brand-blue text-brand-blue hover:text-brand-blue-dark hover:border-brand-blue-dark">View All</a>
                    </div>
                    <?php echo do_shortcode(
                        '[display-posts
                        posts_per_page="4"
                        ignore_sticky_posts="true"
                        orderby="date"
                        order="DESC"
                        wrapper="div"
                        wrapper_class="dps-grid-4max"
                        layout="card" /]'
                    ); ?>
                </div>
            </section>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
