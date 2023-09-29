<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$featimg                        = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
$featvideo                      = get_field( 'll_page_hero_video' );
$brand_message                  = get_field( 'll_brand_message' );
$page_excerpt                   = get_the_excerpt();
$trending                       = get_field( 'll_front_trending_items' );
$video_heading                  = 'Partners who value your vision';
$video_subheading               = 'Work with our advisors and experience the power of collaboration and what it can accomplish.';
// $after_vid_heading              = 'Partner with our accounting professionals';
// $after_vid_para                 = 'What do you envision for your financial future? Whether it is to grow your company, preserve wealth for future generations, or minimize tax liability, we can provide the expertise and support you need. Work with our advisors and experience the power of collaboration and what it can accomplish.';
// $after_vid_img                  = [
//     'url'                       => 'https://res.cloudinary.com/beachfleischman/image/upload/c_scale,dpr_auto,f_auto,w_465/v1695337812/team-at-work_w43bcy.jpg',
//     'alt'                       => 'Three people watch and listen to a woman speaking and gesturing with her hands',
//     'width'                     => '465',
//     'height'                    => '243',
// ];

?>

<div class="page-hero | ll-equal-vert-padding bg-no-repeat overflow-hidden flex items-center justify-center print:py-8">
    <video playsinline autoplay muted loop poster="<?php echo $featimg[0]; ?>" class="absolute top-[-200px] left-0 object-cover w-full h-[1080px] print:hidden">
        <source src="<?php echo $featvideo; ?>">
        Your browser does not support the video tag.
    </video>

    <div class="overlay | absolute top-0 left-0 w-full h-[1080px] bg-neutral-800/70 lg:bg-transparent lg:bg-hero-gradient"></div>

    <div class="relative flex flex-col justify-center px-2 min-h-[240px] md:container md:mx-auto md:px-0 md:min-h-hero text-left">
        <h1 class="leading-none text-white tracking-light text-shadow-lg shadow-neutral-900 lg:text-6xl">
            <?php echo $video_heading; ?>
        </h1>
        <p class="mt-4 text-2xl leading-normal font-head max-w-[44ch] text-brand-blue-pale text-shadow-lg shadow-neutral-900 lg:text-4xl">
            <?php echo $video_subheading; ?>
        </p>
    </div>
</div>

<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-4 md:py-6 lg:py-8' ); } ?>>
	<div class="px-1 md:container md:mx-auto md:px-0">

		<header>
			<?php the_title( '<h1 class="entry-title | hidden ">', '</h1>' ); ?>
		</header>

        <?php /*
        <section class="bg-white full-bleed ll-equal-vert-padding not-prose">
            <div class="px-2 md:container md:mx-auto md:px-0">
                <div class="grid gap-8 md:grid-cols-3 lg:gap-16">
                    <div class="md:col-span-2">
                        <h2 class="mb-4 lg:mb-8"><?php echo $after_vid_heading; ?></h2>
                        <p class="text-2xl leading-normal font-head"><?php echo $after_vid_para; ?></p>
                    </div>
                    <div class="align-right">
                        <?php echo sprintf( '<img src="%1$s" alt="%2$s" width="%3$u" height="%4$u">', $after_vid_img['url'], $after_vid_img['alt'], $after_vid_img['width'], $after_vid_img['height'] ); ?>
                    </div>
                </div>
            </div>
        </section>
        */ ?>

        <section class="full-bleed ll-equal-vert-padding bg-gradient-70 from-brand-blue from-30% via-brand-blue-dark via-50% to-brand-blue to-90% bg-180pct animate-sway">
            <div class="px-2 wp-block-group post-grid md:container md:mx-auto md:px-0 has-brand-blue-faint-color">
                <h2 class="mb-4 lg:mb-8">Trending now</h2>
                <?php echo do_shortcode(
                    '[display-posts
                    post_type="post,page,industries"
                    id="' . implode( ', ', $trending ) . '"
                    ignore_sticky_posts="true"
                    orderby="title"
                    order="DESC"
                    wrapper="div"
                    wrapper_class="dps-grid-3max text-brand-blue-faint"
                    layout="card-simple" /]'
                ); ?>
            </div>
        </section>

        <?php the_content(); ?>

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
</article><!-- #post-<?php the_ID(); ?> -->
