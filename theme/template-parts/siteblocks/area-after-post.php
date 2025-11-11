<?php
/**
 * Area Afer Post
 */
// $target_category = 'construction';
// // $target_slug = 'webinar-big-tax-changes-construction-companies-2025';
// $target_date = new DateTime( '2025-11-20' );
// $current_date = new DateTime( 'today' );
// $tracking_link = 'https://beachfleischman.com/events/webinar-big-tax-changes-construction-2025/?utm_campaign=169751254-2025%2011%20Construction%20Webinar&utm_source=beach&utm_medium=after_post_banner';
?>

<?php if ( ( $current_date < $target_date ) && ( in_category( $target_category ) ) ) { ?>
	<!-- section class="p-4 mb-8 border-2 border-orient-800 bg-orient-800 bg-[url(https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto,q_50/v1762447333/2025_1002_Construction_Webinar_Invite_Image_blue_jjgrx7.jpg)] bg-cover bg-center bg-no-repeat text-white  |  lg:p-8 lg:mb-16">
		<div class="space-y-2">
			<h6 class="text-orient-100">Coming November 20, 2025!</h6>
			<h2 class="font-semibold">Big Tax Changes for Construction Companies in 2025</h2>
			<p>Join us for a <em>live webinar</em> and learn what’s been extended, expanded, or made permanent and how to <strong>capture new tax savings before year-end</strong>.</p>
			<p class="mt-8 mb-6 text-center  |  lg:text-left">
				<a class="px-5 py-4 font-head font-semibold border-2 border-white bg-white rounded-lg text-orient-800  |  hover:text-mahogany-700" href="<?php // echo $tracking_link; ?>">
					<i class="fa-regular fa-calendar-clock"></i> Save my spot!
				</a>
			</p>
		</div>
</section -->
<?php } ?>


<?php if ( ll_is_local_environment() ) { ?>
<section class="p-8 lg:p-12 bg-amber-100 mb-8 lg:mb-16">
	<p>Area After Post</p>
</section>
<?php } ?>
