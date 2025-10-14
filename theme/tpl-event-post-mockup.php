<?php
/**
 *
 * Template Name: Event Mock-up (Temp)
 * Template Post Type: post
 *
 * This is the template that displays an Event (webinar, seminar, mixer, etc)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$post_id = get_the_ID();
$post_excerpt = get_the_excerpt();
$post_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $post_featimg == true ) {
	$post_featimg_url = $post_featimg[0];
} else {
	$post_featimg_url = '';
}
?>

<style>
	[popover]::backdrop {background-color: rgb(0 51 102 / 0.5); backdrop-filter: blur(4px);}
</style>

<main id="primary" class="bg-white relative z-10 shadow-xl  |  lg:shadow-2xl dark:bg-neutral-900">

	<?php
	while ( have_posts() ) :
		the_post();

		if ( get_field( 'll_hide_featured_image' ) === false ) :
			ll_featured_image();
		endif;
		?>

		<article id="post-<?php the_ID(); ?>" <?php ll_content_class( 'event' ); ?>>
			<?php // the_content(); ?>


			<div class="full-bleed not-prose bg-neutral-950 text-neutral-50 text-center py-2 m-0">
				<p class="text-sm">Dev Version: You're currently using the temporary Event Mock-up template. This is all hard-coded. No Block Editor content here.</p>
			</div>

			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
			<style>
				.font-abril {
					font-family: "Abril Fatface", serif;
					font-weight: 400;
					font-style: normal;
				}
			</style>
			<section class="full-bleed mixer">
				<div class="not-prose px-2 py-8 text-xl text-white font-head  |  md:text-2xl md:container md:py-12 lg:py-20 lg:px-[16px]">
					<header class="md:pb-4 lg:pb-0">
						<h2 class="text-2xl font-light text-white leading-tight  |  lg:text-3xl">beachfleischman's</h2>
						<h3 class="text-3xl text-white leading-tight tracking-tight font-abril  |  md:text-4xl lg:text-5xl">construction industry</h3>
						<h4 class="mb-4 text-5xl text-pink-650 font-abril font-bold leading-none tracking-tight  |  md:text-6xl lg:text-8xl">networking mixer</h4>
						<p class="font-light  |  lg:text-3xl">Enjoy complimentary drinks and appetizers while connecting with fellow professionals in the construction industry.</p>
					</header>
					<div class="w-full  |  md:flex md:flex-row lg:my-12">
						<div class="w-full mb-8 text-center  |  md:w-1/3 md:mb-0 md:order-last">
							<div class="relative mx-auto rounded-full bg-purple-450 aspect-square" style="width: 200px;">
								<div class="z-10 flex flex-row items-center justify-center w-full h-full">
									<span class="font-bold leading-none font-abril" style="color: rgba(255,255,255,0.1); font-size: 200px">2</span>
								</div>
								<div class="absolute top-0 left-0 z-20 flex flex-row items-center justify-center w-full h-full">
									<p class="text-4xl font-bold leading-none font-abril">2 dates<br>2 locations</p>
								</div>
							</div>
						</div>
						<div class="w-full  |  md:w-2/3 md:order-first">
							<div class="mb-8">
								<h4 class="inline-block px-12 pt-3 pb-2 mb-3 -ml-12 text-white font-abril bg-pink-650 bg-skewed  |  md:-ml-16 md:text-3xl md:px-16 lg:-ml-20 lg:text-4xl lg:px-20">Tuesday, January 17, 2023 • Phoenix</h4>
								<p class="lg:text-3xl font-abril">4:30pm - 6:30pm • The Gladly <small>(Whiskey Room)</small></p>
								<p>2201 E. Camelback Rd., Phoenix, AZ 85016</p>
							</div>
							<div class="mb-8">
								<h4 class="inline-block px-12 pt-3 pb-2 mb-3 -ml-12 text-white font-abril bg-pink-650 bg-skewed  |  md:-ml-16 md:text-3xl md:px-16 lg:-ml-20 lg:text-4xl lg:px-20">Thursday, January 19, 2023 • Tucson</h4>
								<p class="lg:text-3xl font-abril">4:30pm - 6:30pm • Union Public House</p>
								<p>4340 N. Campbell Ave., Ste 100, Tucson, AZ 85718</p>
							</div>
						</div>
					</div>
					<div class="w-full mt-8 min-h-32">
						<p class="my-4 text-center font-bold">Registration for this event has closed.</p>
					</div>
				</div>
			</section>

		</article>

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
