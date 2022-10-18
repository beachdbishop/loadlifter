<?php
/**
 * The sidebar containing the prefooter widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Load_Lifter
 */
if ( ! is_active_sidebar( 'sidebar-prefoot' ) ) {
	return;
} else {
	echo '<div class="ll__widget-area print:hidden">';
		dynamic_sidebar( 'sidebar-prefoot' );
	?>
	<!-- <div class="p-4 full-bleed md:py-8 lg:py-16">
		<div class="container text-center md:mx-auto">
			<p class="text-white "><span class="font-bold">&quot;Who planned this?&quot;</span> &mdash; Satisfied attendee of our December 25<sup>th</sup> cattle ranching webinar <a href="#" class="inline-block px-4 py-2 ml-2 border border-transparent border-solid rounded-md text-brand-red-dark bg-neutral-50 hover:bg-transparent hover:border-white hover:text-white hover:shadow-md hover:shadow-indigo-800/60"><i class="fa-solid fa-person-sign"></i> Learn More</a></p>
		</div>
	</div> -->
	<?php
	echo '</div>';
}
