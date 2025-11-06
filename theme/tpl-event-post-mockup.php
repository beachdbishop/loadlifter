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
				<p class="text-sm text-yellow-300">Dev Version: You're currently using the temporary Event Mock-up template. This is all hard-coded. No Block Editor content here.</p>
			</div>

			<!-- link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
			<style>
				.font-abril {
					font-family: "Abril Fatface", serif;
					font-weight: 400;
					font-style: normal;
				}
			</style -->
			<!-- section class="full-bleed" style="background-image: linear-gradient(var(--color-orient-900), var(--color-orient-500)), url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,e_grayscale,f_auto,q_50/v1762447345/2025_1002_Construction_Webinar_Invite_Image_uh6g3n.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat; background-blend-mode: overlay;" -->
			<section class="full-bleed" style="background-color: var(--color-orient-900); background-image: url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto,q_50/v1762447333/2025_1002_Construction_Webinar_Invite_Image_blue_jjgrx7.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				<div class="not-prose px-2 pb-16 text-white space-y-8  |  md:container lg:space-y-16 lg:px-4">

					<header class="full-bleed bg-orient-800">
						<div class="px-2 py-8  |  md:container  lg:px-4 lg:py-12">
							<h1 class="font-semibold text-orient-300 leading-tight">Big Tax Changes for Construction Companies in 2025</h1>
							<h2 class="text-white leading-tight tracking-tight">Construction Industry Tax Update - Live Webinar</h2>
						</div>
					</header>

					<div class="flex flex-col gap-2 items-center h-full  |  sm:flex-row lg:gap-4">
						<div class="shrink-0">
							<span class="fa-stack fa-2x">
								<i class="fa-solid fa-circle fa-stack-2x"></i>
								<i class="fa-regular fa-calendar-clock fa-stack-1x text-orient-900"></i>
							</span>
						</div>
						<div class="grow">
							<h2 class="font-semibold">Thursday, November 20, 2025<br />7:30 - 9:00AM (MST)</h2>
							<h3>Complimentary | CPE Credit: 1.8 hours</h3>
						</div>
					</div>
					<div class=" grid gap-16  |  lg:grid-cols-2">

						<div class="entry-content">
							<p>The One Big Beautiful Bill Act introduced significant tax changes that could impact how construction companies plan, invest, and manage their cash flow.</p>
							<p>Join us for a live webinar and learn what's been extended, expanded, or made permanent and how to capture new tax savings before year-end.</p>
							<h3 class="font-semibold">We'll cover these key topics and more during the session:</h3>
							<ul class="fa-ul">
								<li><span class="fa-li"><i class="fa-solid fa-check"></i></span>Depreciation and expensing of fixed assets</li>
								<li><span class="fa-li"><i class="fa-solid fa-check"></i></span>Research and experimental deductions</li>
								<li><span class="fa-li"><i class="fa-solid fa-check"></i></span>QBI 20% deduction</li>
								<li><span class="fa-li"><i class="fa-solid fa-check"></i></span>Business interest expense limits</li>
								<li><span class="fa-li"><i class="fa-solid fa-check"></i></span>Expiring green energy credits</li>
								<li><span class="fa-li"><i class="fa-solid fa-check"></i></span>New exception to POC method for residential construction contracts</li>
							</ul>
						</div>
						<div class="bg-white/70 text-orient-900 rounded-3xl p-8  |  lg:p-12 lg:rounded-[3rem]">
							<h3 class="font-semibold">Speakers:</h3>
							<ul class="list-none mt-4 grid grid-cols-1 gap-8 ">
								<li class="person-card card-ic | group @container">
									<div class="flex flex-col @2xs:flex-row gap-2 items-center h-full">
										<div class="card-text | grow order-1">
											<h3 class="!leading-none font-semibold">Bryan S. Eto, <small>CPA, CCIFP, CFE, CGMA</small></h3>
											<p class="leading-tight">Principal/Construction Practice Leader<br />BeachFleischman</p>
										</div>
										<div class="card-img  |  shrink-0 object-cover object-center rounded-full border-3 border-orient-800 bg-neutral-100 bg-no-repeat bg-[center_top]" style="background-image: url('https://beachfleischman.com/wp-content/uploads/2022/10/bio_rect-beto.jpg'); background-size: 128px 171px;">
											<div class="size-32 aspect-square">&nbsp;</div>
										</div>
									</div>
								</li>
								<li class="person-card card-ic | group @container">
									<div class="flex flex-col @2xs:flex-row gap-2 items-center h-full">
										<div class="card-text | grow order-1">
											<h3 class="!leading-none font-semibold">Christine Ulibarri, <small>CPA, CCIFP</small></h3>
											<p class="leading-tight">Principal<br />BeachFleischman</p>
										</div>
										<div class="card-img  |  shrink-0 object-cover object-center rounded-full border-3 border-orient-800 bg-neutral-100 bg-no-repeat bg-[center_top]" style="background-image: url('https://beachfleischman.com/wp-content/uploads/2022/10/bio_rect-culibarri.jpg'); background-size: 128px 171px;">
											<div class="size-32 aspect-square">&nbsp;</div>
										</div>
									</div>
								</li>
								<li class="person-card card-ic | group @container">
									<div class="flex flex-col @2xs:flex-row gap-2 items-center h-full">
										<div class="card-text | grow order-1">
											<h3 class="!leading-none font-semibold">Lauren M. Pierson, <small>CPA</small></h3>
											<p class="leading-tight">Tax Senior Manager<br />BeachFleischman</p>
										</div>
										<div class="card-img  |  shrink-0 object-cover object-center rounded-full border-3 border-orient-800 bg-neutral-100 bg-no-repeat bg-[center_top]" style="background-image: url('https://beachfleischman.com/wp-content/uploads/2023/02/bio_rect-lpierson.jpg'); background-size: 128px 171px;">
											<div class="size-32 aspect-square">&nbsp;</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="w-full mt-8 min-h-32">
						<h3 class="text-center font-bold">Registration now to ensure you don't miss this timely update!</h3>
						<p class="text-center mt-8">
							<a href="https://attendee.gotowebinar.com/register/1093509844948043359" class="text-2xl px-5 py-4 font-head font-semibold border-2 border-white bg-white rounded-lg text-orient-800  |  hover:bg-mahogany-700 hover:text-white hover:border-mahogany-700"><i class="fa-solid fa-user-circle-plus"></i> Register</a>
						</p>
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
