<?php
/**
 * The template for displaying specific page - tucson-office
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 70%, rgba(0,0,0,0.2) 100%)';
$gradientmd = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
$page_id = get_the_ID();
$page_excerpt = get_the_excerpt();
$page_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url = $page_featimg[0];
} else {
	$page_featimg_url = '';
}
?>

<main id="primary" class="bg-white">

	<article id="post-<?php the_ID(); ?>" <?php post_class('constrmixer'); ?>>
		<?php if ( get_field( 'll_hide_featured_image' ) === false ) : ?>
			<style>
			<?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration; ?>
			.page-feat-image {background-image: <?php echo $gradient; ?>, url('<?php echo $page_featimg_url; ?>')}
			@media (min-width: 768px) {.page-feat-image {background-image: <?php echo $gradientmd; ?>, url('<?php echo $page_featimg_url; ?>')}}
			</style>
			<div class="page-feat-image | bg-center bg-cover" itemprop="image" itemscope itemtype="https://schema.org/ImageObject" role="img" aria-label="<?php the_title_attribute(); ?>">
				<div class="px-1 py-8 md:container md:mx-auto md:px-0 md:py-12 lg:py-24 print:py-8">
					<div class="w-full min-h-[40vw] md:min-h-[30vw] lg:min-h-[20vw] md:w-1/2 lg:w-1/3">&nbsp;</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="px-1 py-8 text-xl text-white md:text-2xl md:container md:mx-auto lg:px-0 font-head md:py-12 lg:py-20">
			<header class="md:pb-4 lg:pb-0">
				<h2 class="text-2xl font-light leading-tight lg:text-3xl">beachfleischman's</h2>
				<h3 class="text-3xl leading-tight tracking-tight font-abril md:text-4xl lg:text-5xl">construction industry</h3>
				<h4 class="mb-4 text-5xl font-bold leading-none tracking-tight md:text-6xl font-abril lg:text-8xl text-pink-650">networking mixer</h4>
				<p class="font-light lg:text-3xl">Enjoy complimentary drinks and appetizers while connecting with fellow professionals in the construction industry.</p>
			</header>
			<div class="w-full md:flex md:flex-row lg:my-12">
				<div class="w-full mb-8 text-center md:w-1/3 md:mb-0 md:order-last">
					<div class="relative mx-auto rounded-full bg-purple-450 aspect-square" style="width: 200px;">
						<div class="z-10 flex flex-row items-center justify-center w-full h-full">
							<span class="font-bold leading-none font-abril" style="color: rgba(255,255,255,0.1); font-size: 200px">2</span>
						</div>
						<div class="absolute top-0 left-0 z-20 flex flex-row items-center justify-center w-full h-full">
							<p class="text-4xl font-bold leading-none font-abril">2 dates<br>2 locations</p>
						</div>
					</div>
				</div>
				<div class="w-full md:w-2/3 md:order-first">
					<div class="mb-8">
						<h4 class="inline-block px-12 pt-3 pb-2 mb-3 -ml-12 text-white md:-ml-16 md:text-3xl md:px-16 lg:-ml-20 lg:text-4xl lg:px-20 font-abril bg-pink-650 bg-skewed">Tuesday, January 17, 2023 • Phoenix</h4>
						<p class="lg:text-3xl font-abril">4:30pm - 6:30pm • The Gladly <small>(Whiskey Room)</small></p>
						<p>2201 E. Camelback Rd., Phoenix, AZ 85016</p>
					</div>
					<div class="mb-8">
						<h4 class="inline-block px-12 pt-3 pb-2 mb-3 -ml-12 text-white md:-ml-16 md:text-3xl md:px-16 lg:-ml-20 lg:text-4xl lg:px-20 font-abril bg-pink-650 bg-skewed">Thursday, January 19, 2023 • Tucson</h4>
						<p class="lg:text-3xl font-abril">4:30pm - 6:30pm • Union Public House</p>
						<p>4340 N. Campbell Ave., Ste 100, Tucson, AZ 85718</p>
					</div>
				</div>
			</div>
			<div class="w-full mt-8">
				<p class="my-4 text-center">Must register to attend by Wednesday, January 11, 2023</p>
				<div class="p-4 rounded-lg md:mx-auto md:max-w-xl md:p-8" style="background-color: rgba(255,255,255,0.9)">
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
					<script>
						hbspt.forms.create({
							region: "na1",
							portalId: "5578910",
							formId: "a5cbe045-fed5-4b5c-89d3-562c7b631152"
						});
					</script>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php
get_footer();
