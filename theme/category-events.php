<?php
/**
 * The template for displaying Event posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

	<main id="primary" class="py-4 bg-emerald-50 md:py-6 lg:py-8">
		<div class="px-1 md:container md:mx-auto md:px-0 ">
			<?php if ( function_exists( 'bcn_display' ) ) { ?>
				<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<header class="flex gap-4 mb-4">
				<div class="basis-2/3">
					<h1 class="text-brand-blue head-last-bold">Events</h1>
					<p class="my-4 font-light lg:my-8">Here our our latest events and yada yada.</p>
				</div>
			</header>

			<h2 class="text-brand-red font-body">Upcoming</h2>
			<?php echo do_shortcode( '[display-posts category="events" tag="upcoming" orderby="date" order="DESC" wrapper="div" wrapper_class="grid grid-cols-3 -mx-4" layout="card-simple" no_posts_message="Check back for upcoming events." /]' ); ?>

			<div class="py-4 full-bleed not-prose md:py-8 2xl:py-12 has-brand-gray-pale-background-color has-background">
				<div class="px-1 md:container md:mx-auto md:px-0">
					<h2 class="font-body">Archived Events</h2>
					<?php echo do_shortcode( '[display-posts category="archived-events" orderby="date" order="DESC" wrapper="div" wrapper_class="grid grid-cols-4 -mx-4" layout="card-simple" /]' ); ?>
				</div>
			</div>

		</div>
	</main><!-- #main -->

<?php
get_footer();
