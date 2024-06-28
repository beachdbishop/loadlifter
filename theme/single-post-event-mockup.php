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

		<article id="post-<?php the_ID(); ?>" <?php ll_content_class( 'event ' ); ?>>
			<?php // the_content(); ?>

			<section class="full-bleed ll-equal-vert-padding not-prose bg-brand-blue print:bg-transparent">
				<svg viewBox="0 0 1200 800" class="z-0 w-[75vw] border-0 absolute top-0 right-0"><path fill="#CE182D" d="M819 63.04 1181.04-299l362.04 362.04-362.04 362.04z"/><path fill="#67E8F9" fill-opacity=".8" d="M998 422.04 1360.04 60l362.04 362.04-362.04 362.04zm-630-271L730.04-211l362.04 362.04-362.04 362.04z"/><path fill="#ECFEFF" fill-opacity=".8" d="M428-210.96 790.04-573l362.04 362.04-362.04 362.04z"/></svg>

				<div class="relative z-10 px-2 md:container lg:px-[16px]">
					<div class="grid gap-8 lg:grid-cols-2">
						<div class="text-neutral-50 md:text-2xl"><!-- Column 1 -->
							<p class="uppercase leading-none lg:text-brand-blue-pale text-2xl md:text-4xl lg:tracking-[0.5rem]">You're invited to a</p>
							<h2 class="uppercase leading-none font-semibold text-6xl md:text-[6.5rem]">Lunch &amp; Learn</h2>
							<h3 class="px-3 py-1 rounded-full bg-neutral-50 text-brand-blue font-semibold uppercase text-center leading-none">Roundtable Discussion</h3>
							<div class="mt-12 *:leading-snug">
								<p class="mb-12">Join Ashley Byma in person for a Lunch & Learn conversation about "TOPIC" and earn one hour of CLE* credit.</p>
								<p class="text-brand-blue-pale font-semibold">Friday, August 9, 2024</p>
								<p class="text-brand-blue-pale font-semibold">11:30am to 1:00pm</p>
								<p class="text-brand-blue-pale font-semibold">BeachFleischman's Tucson Office</p>
								<p class="text-neutral-50 ">1985 E. River Road, Suite 201, Tucson, AZ 85718</p>
							</div>

							<div id="contact" class="container-contact-form not-prose mt-12 border-4 border-brand-blue-pale bg-neutral-50 text-neutral-800">
								<h3 class="text-brand-red text-center font-semibold">Register by August 1, 2024</h3>
								<p class="todo">FORM FORM FORM</p>
							</div>
						</div>

						<div class=""><!-- Column 2 -->
							<div class="max-w-[380px] mx-auto mb-32">
								<img class="rounded-full object-cover object-top w-[360px] h-[360px] ring-8 ring-neutral-50 mb-16" src="//peoplecptauthortest.local/wp-content/uploads/2024/03/bio_rect-abyma-jpg.webp" alt="photo of Ashley Byma" />
								<div class="px-4 py-2 mb-8 rounded-full bg-neutral-50 text-center">
									<h3 class="text-brand-blue font-semibold">Ashley T. Byma, CPA</h3>
									<p class="italic text-brand-blue leading-none">Director, Financial Forensics &amp; Valuation Services</p>
								</div>
							</div>

							<p class="text-md text-right text-neutral-200 leading-tight">* - The State Bar of Arizona does not approve or accredit CLE activities for the Mandatory Continuing Legal Education requirement. This activity may qualify for up to 1 hour toward your annual CLE requirement for the State Bar of Arizona.</p>
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
