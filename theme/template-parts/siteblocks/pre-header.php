<?php
/**
 * Pre-Header
 */
$target_slug = 'webinar-big-tax-changes-construction-2025';
$target_date = new DateTime( '2025-11-20' );
$current_date = new DateTime( 'today' );

if ( ( $current_date < $target_date ) && ( !is_single( $target_slug ) ) ) { ?>
	<section class="bg-linear-to-r from-orient-700 from-10% via-orient-900 via-60% to-orient-700 to-90% full-bleed">
		<div class="py-2 mx-auto md:py-4">
			<p class="text-lg text-center text-neutral-100 animate-fade-in">
				<i class="fa-regular fa-calendar-clock"></i>
				<strong>Upcoming Webinar:</strong>
				<span class="hidden md:inline">Register today for BeachFleischman's </span><a href="<?php echo '/events/' . $target_slug . '/'; ?>" class="underline underline-offset-2 decoration-orient-200 hover:underline hover:text-orient-300 hover:decoration-orient-300 dark:decoration-orient-600">Construction Industry Tax Update on November 20, 2025</a>.
			</p>
		</div>
	</section>
<?php } ?>
