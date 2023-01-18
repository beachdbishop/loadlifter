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

	<main id="primary" class="pt-4 bg-white md:pt-6 lg:pt-8">
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

			<div class="entry-con">
				<h2 class=" text-brand-red font-body">Upcoming</h2>
				<?php echo do_shortcode( '[display-posts category="events" tag="upcoming" orderby="date" order="DESC" wrapper="div" wrapper_class="dps-grid-3max" layout="card-simple" no_posts_message="Check back for upcoming events." /]' ); ?>
				<div class="py-4 full-bleed not-prose bg-gradient-to-br from-neutral-100 to-neutral-300 md:py-8 2xl:py-12">
					<div class="px-1 md:container md:mx-auto md:px-0">
						<h4 class="tracking-wide uppercase font-body">Archived Events</h4>
						<?php echo do_shortcode( '[display-posts category="archived-events" orderby="date" order="DESC" wrapper="div" wrapper_class="dps-grid-4max" layout="card-simple" /]' ); ?>
					</div>
				</div>
			</div>

		</div>
	</main><!-- #main -->

<?php
get_footer();
