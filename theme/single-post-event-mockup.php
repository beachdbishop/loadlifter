<?php
/**
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

<main id="primary" class="bg-white dark:bg-neutral-900">

	<?php
	while ( have_posts() ) :
		the_post();

		if ( get_field( 'll_hide_featured_image' ) === false ) :
			ll_featured_image();
		endif;
		?>

		<article id="post-<?php the_ID(); ?>" <?php ll_content_class( 'event' ); ?>>
			<?php // the_content(); ?>

			<section class="ll-equal-vert-padding not-prose bg-brand-blue print:bg-transparent">
				<svg viewBox="0 0 1200 800" class=" z-0 w-[75vw] border-0 absolute top-0 right-0 "><path fill="#CE182D" d="M819 63.04 1181.04-299l362.04 362.04-362.04 362.04z"/><path fill="#67E8F9" fill-opacity=".8" d="M998 422.04 1360.04 60l362.04 362.04-362.04 362.04zm-630-271L730.04-211l362.04 362.04-362.04 362.04z"/><path fill="#ECFEFF" fill-opacity=".8" d="M428-210.96 790.04-573l362.04 362.04-362.04 362.04z"/></svg>

				<div class="relative z-10 px-2 md:container lg:px-[16px]">
					<div class="grid gap-24 lg:gap-16 lg:grid-cols-2">
						<div class="text-neutral-50 space-y-8 md:text-2xl"><!-- Column 1 -->
							<p class="leading-none text-xl md:text-3xl -mb-4">BeachFleischman's</p>
							<h1 class="uppercase leading-none font-semibold text-5xl md:text-8xl lg:text-9xl"><small class="text-brand-blue-pale">Family Law</small><br />
								Lunch <br />&amp; Learn</h1>
							<h2 class="font-semibold text-4xl leading-none lg:text-5xl">Calculating Community Equitable Liens:<br /><small class="text-brand-blue-pale font-light">Key Factors and Challenges</small></h2>
							<p class="">Join Ashley Byma for an overview of methods for calculating community liens on separate property, including homes, and the challenges involved. She will also discuss the most appropriate methods for handling complex divorce cases.</p>

							<p class="text-3xl text-brand-blue-pale font-semibold">Friday, August 9, 2024<br />
							11:30am to 1:00pm</p>

							<p class="text-3xl"><span class="font-semibold">BeachFleischman</span><br />
							1985 E. River Road, Suite 201<br />
							Tucson, AZ 85718</p>

							<p class="italic">Family law attorneys are encouraged to attend. One hour of CLE* credit will be given.</p>
							<p class="text-base text-neutral-200 leading-tight">* - The State Bar of Arizona does not approve or accredit CLE activities for the Mandatory Continuing Legal Education requirement. This activity may qualify for up to 1 hour toward your annual CLE requirement for the State Bar of Arizona.</p>

						</div>

						<div class=""><!-- Column 2 -->
							<div class="max-w-[320px] mx-auto mb-32">
								<img class="rounded-full object-cover object-top w-[320px] h-[320px] ring-8 ring-neutral-50 " src="//peoplecptauthortest.local/wp-content/uploads/2024/03/bio_rect-abyma-jpg.webp" alt="photo of Ashley Byma" />
								<div class="-mt-1 px-4 py-2 mb-8 rounded-full bg-neutral-50 text-center z-20">
									<h3 class="text-brand-red font-semibold md:text-3xl">Ashley T. Byma, CPA</h3>
									<p class="italic text-brand-blue leading-none">Director, Financial Forensics &amp; Valuation Services</p>
								</div>
							</div>

							<div id="contact" class="container-contact-form not-prose mt-12 border-4 border-brand-blue-pale bg-neutral-50 text-neutral-800">
								<h3 class="text-brand-red text-center font-semibold mb-4">Register by August 6<sup>th</sup> to secure your spot.</h3>
								<script>
									hbspt.forms.create({
										region: "na1",
										portalId: "5578910",
										formId: "b3cbb13a-ca57-4dbe-9d62-335927a0b66d"
									});
								</script>
							</div>
						</div>
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
