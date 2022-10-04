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
				<h1 class="entry-title | ">Tucson CPA Firm</h1>
			</header>

			<!-- transform: translate3d(-50%, 0, 0); -->
			<section class="w-screen ml-[50%] -translate-x-1/2 relative h-[600px] overflow-hidden bg-brand-blue-pale not-prose">
				<div class="absolute inset-0">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.90727268908!2d-110.94434314844987!3d32.2874709159975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86d67236d49085cd%3A0xeebf5afa4f8dc671!2sBeachFleischman%20PLLC!5e0!3m2!1sen!2sus!4v1658530857801!5m2!1sen!2sus" width="100%" height="600" style="border: 0; filter: grayscale(1) contrast(1.2) opacity(0.4)" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
				<div class="container flex px-5 py-24 mx-auto">
					<div class="relative z-10 flex flex-col w-full p-8 mt-10 bg-white rounded-lg shadow-md lg:w-1/3 md:w-1/2 md:ml-auto md:mt-0">
						<h2 class="mb-1 text-brand-blue">Tucson AZ Office Location</h2>
						<p class="mb-5 leading-relaxed text-neutral-600">
							1985 E. River Road, Suite 201<br />
							Tucson, AZ 85718
						</p>
						<p><a href="tel:15203214600">1 (520) 321-4600</a> | fax: 1 (520) 321-4040</p>
					</div>
				</div>
			</section>

		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

</main><!-- #main -->

<?php
get_footer();
