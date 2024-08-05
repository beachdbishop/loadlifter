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

			<div class="full-bleed not-prose bg-neutral-950 text-neutral-50 text-center py-2 m-0">
				<p class="text-sm">Dev Version: You're currently using the temporary Event Mock-up template. This is all hard-coded. No Block Editor content here.</p>
			</div>

			<section class="full-bleed ll-equal-vert-padding not-prose bg-brand-blue print:bg-transparent">
				<svg viewBox="0 0 1200 800" class=" z-0 border-0 absolute top-0 right-0 " style="width:75vw"><path fill="#CE182D" d="M819 63.04 1181.04-299l362.04 362.04-362.04 362.04z"/><path fill="#67E8F9" fill-opacity=".8" d="M998 422.04 1360.04 60l362.04 362.04-362.04 362.04zm-630-271L730.04-211l362.04 362.04-362.04 362.04z"/><path fill="#ECFEFF" fill-opacity=".8" d="M428-210.96 790.04-573l362.04 362.04-362.04 362.04z"/></svg>

				<div class="relative z-10 px-2 md:container lg:px-[16px]">
					<div class="grid gap-24 lg:gap-16 lg:grid-cols-2">
						<div class="text-neutral-50 space-y-8 md:text-2xl"><!-- Column 1 -->
							<p class="leading-none text-xl md:text-3xl -mb-4">BeachFleischman's complimentary</p>
							<h1 class="uppercase leading-none font-semibold text-5xl md:text-8xl lg:text-9xl"><small class="text-brand-blue-pale">Family Law</small><br />
								Lunch <br />&amp; Learn</h1>
							<h2 class="font-semibold text-4xl leading-none lg:text-5xl">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque iusto, omnis recusandae vero libero aliquam quasi.</h2>
							<p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur quia, aut debitis enim nam inventore tenetur! Accusamus aperiam eum facilis nam, dolorem assumenda obcaecati nemo quod, ad culpa, amet possimus.</p>

							<p class="text-3xl text-brand-blue-pale font-semibold">Thursday, November 21, 2024<br />
							11:30am - 1:00pm</p>

							<p class="text-3xl"><span class="font-semibold">BeachFleischman</span><br />
							1985 E. River Road, Suite 201<br />
							Tucson, AZ 85718</p>

							<p class="font-semibold text-pretty">Lunch will be provided, and attendees can earn one hour of *CLE credit.</p>
							<p class="">Contact <a class="underline decoration-2 decoration-brand-blue-pale hover:decoration-white" href="mailto:hmurray@beachfleischman.com">Heather Murray</a> with any questions.</p>
							<p class="text-base text-neutral-200 leading-tight">* The State Bar of Arizona does not approve or accredit CLE activities for the Mandatory Continuing Legal Education requirement. This activity may qualify for up to 1 hour toward your annual CLE requirement for the State Bar of Arizona.</p>

						</div>

						<div class=""><!-- Column 2 -->

							<div class="md:grid md:grid-cols-2">

								<div class="mx-auto" style="max-width:316px">
									<img class="rounded-full object-cover object-top ring-8 ring-neutral-50 " src="https://beachfleischman.com/wp-content/uploads/2023/06/elizabeth-willson.jpg" style="width:316px;height:316px" alt="photo of Elizabeth Willson" />
									<div class="-mt-1 px-4 py-2 mb-8 rounded-full bg-neutral-50 text-center z-20">
										<h3 class="text-brand-red font-semibold leading-none">Elizabeth A. Willson<br /><small>CFE</small></h3>
										<p class="italic text-brand-blue leading-none">Financial Forensics &amp; Valuation Senior Analyst</p>
									</div>
								</div>

								<div class="mx-auto" style="max-width:316px">
									<img class="rounded-full object-cover object-top ring-8 ring-neutral-50 " src="https://beachfleischman.com/wp-content/uploads/2022/10/bio_rect-jmiessner.jpg" style="width:316px;height:316px" alt="photo of Julia Miessner" />
									<div class="-mt-1 px-4 py-2 mb-8 rounded-full bg-neutral-50 text-center z-20">
										<h3 class="text-brand-red font-semibold leading-none">Julia Allen Miessner<br /><small>CPA, ABV, CFF, CGMA</small></h3>
										<p class="italic text-brand-blue leading-none">Principal <br />&nbsp;</p>
									</div>
								</div>

							</div>

							<div id="contact" class="container-contact-for not-prose p-8 mt-12 border-2 border-brand-blue-pale bg-neutral-50 text-neutral-800 ">
								<h3 class="text-brand-red text-center font-semibold mb-6">Register by August 7<sup>th</sup> to secure your spot.</h3>

								<p class="text-center">
									<button class="font-head rounded-md text-2xl font-semibold text-neutral-100 px-4 py-2 bg-brand-red-dark hover:bg-brand-red hover:text-white  dark:text-brand-blue-pale dark:border-brand-blue-pale" aria-label="Reserve your spot at our table" aria-expanded="false" popovertarget="popform202411ffvs"
									>Register today</button>
								</p>

								<div id="popform202411ffvs" popover class="prose p-4 border-2 border-brand-blue max-h-[90vh] md:max-w-2xl md:p-8 dark:bg-neutral-800 dark:text-neutral-100 dark:border-neutral-500" role="tooltip">

									<div class="absolute top-0 right-0 size-8 text-center">
										<button popovertarget="popform202411ffvs" popovertargetaction="hide" class="text-brand-blue dark:text-neutral-300">
											<span><i class="fa-regular fa-circle-xmark"></i></span>
											<span class="sr-only">Close</span>
										</button>
									</div>

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
				</div>
			</section>

		</article>

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
