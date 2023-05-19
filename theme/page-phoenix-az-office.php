<?php
/**
 * The template for displaying specific page - tucson-office
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();
?>

<main id="primary" class="bg-white">

	<article id="post-<?php the_ID(); ?>" <?php post_class('pt-4 md:pt-6 lg:pt-8'); ?>>
		<div class="px-1 md:container md:mx-auto md:px-0">
			<?php if (function_exists('bcn_display')) { ?>
				<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<header>
				<h1 class="entry-title | ">Phoenix CPA Firm</h1>
			</header>

			<!-- transform: translate3d(-50%, 0, 0); -->
			<section class="w-screen ml-[50%] -translate-x-1/2 relative h-[600px] overflow-hidden bg-brand-blue not-prose">
				<div class="absolute inset-0">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3326.7213013333408!2d-112.03599804843473!3d33.508627453532156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x872b70e1e8ae4183%3A0x7856696b87545622!2sBeachFleischman%20PLLC!5e0!3m2!1sen!2sus!4v1658534473665!5m2!1sen!2sus" width="100%" height="600" style="border: 0; filter: grayscale(1) contrast(1.2) opacity(0.4)" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="container flex px-5 py-24 mx-auto">
					<div class="relative z-10 flex flex-col w-full p-8 mt-10 bg-white rounded-lg shadow-md lg:w-1/3 md:w-1/2 md:mt-0">
						<h2 class="mb-1 text-brand-blue">Phoenix AZ Office Location</h2>
						<p class="mb-5 leading-relaxed text-neutral-600">
							2201 E Camelback Road, Suite 200<br />
							Phoenix, AZ 85016
						</p>
						<p><a href="tel:16022657011">1 (602) 265-7011</a> | fax: 1 (602) 265-7060</p>
					</div>
				</div>
			</section>

		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php
get_footer();
