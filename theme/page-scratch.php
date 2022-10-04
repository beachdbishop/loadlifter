<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */
get_header();
?>
<main id="primary" class="bg-gradient-to-r from-white via-amber-50 to-amber-100">
	<?php
	while (have_posts()) :
		the_post();
		$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
	?>
		<article id="post-<?php the_ID(); ?>" <?php if (!is_front_page()) {
													post_class('py-4 md:py-6 lg:py-8');
												} ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if (function_exists('bcn_display')) { ?>
					<div class="breadcrumbs | font-head text-neutral-700 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>
				<header>
					<?php the_title('<h1 class="entry-title | ">', '</h1>'); ?>
				</header>
				<div class="entry-content">
					<?php the_content(); ?>
					<div class="clear-both">&nbsp;</div>

					<section class="not-prose group bg-gray-500 md:rounded-lg bg-[url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1595894445/feat__20200727--opportunity-zones_hdzthd.jpg')] text-white bg-blend-multiply lg:mx-auto lg:max-w-5xl">
						<a href="#" class="decoration-none">
							<div class="container px-5 py-16 mx-auto">
								<div class="flex flex-col items-start mx-auto sm:flex-row sm:items-center lg:w-2/3">
									<span class="flex-grow text-white [text-shadow:_1px_0_10px_rgb(0_0_0_/_70%)] sm:pr-16">Slow-carb next level shoindxgoitch ethical authentic, scenester sriracha forage.</span>
									<div class="flex-shrink-0 px-8 py-2 mt-10 text-lg text-white bg-transparent border border-white border-solid rounded-tl-lg rounded-br-lg focus:outline-none group-hover:bg-white group-hover:text-gray-800 sm:mt-0">Button</div>
								</div>
							</div>
						</a>
					</section>

					<div class="wp-block-spacer">&nbsp;</div>

					<section class="not-prose group full-bleed bg-gray-500 bg-[url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1595894445/feat__20200727--opportunity-zones_hdzthd.jpg')] text-white bg-blend-multiply">
						<a href="#">
							<div class="container px-5 py-16 mx-auto">
								<div class="flex flex-col items-start mx-auto sm:flex-row sm:items-center lg:w-2/3">
									<span class="flex-grow text-white [text-shadow:_1px_0_10px_rgb(0_0_0_/_70%)] sm:pr-16">Slow-carb next level shoindxgoitch ethical authentic, scenester sriracha forage.</span>
									<div class="flex-shrink-0 px-8 py-2 mt-10 text-lg text-white bg-transparent border border-white border-solid rounded-tl-lg rounded-br-lg focus:outline-none group-hover:bg-white group-hover:text-gray-800 sm:mt-0">Button</div>
								</div>
							</div>
						</a>
					</section>

					<div class="wp-block-spacer">&nbsp;</div>

					<section class="not-prose group full-bleed bg-brand-red bg-center bg-cover bg-[url('https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1595894445/feat__20200727--opportunity-zones_hdzthd.jpg')] text-white bg-blend-multiply is-style-brand-red">
						<a href="#">
							<div class="container px-5 py-16 mx-auto">
								<div class="flex flex-col items-start mx-auto sm:flex-row sm:items-center lg:w-2/3">
									<span class="flex-grow text-white [text-shadow:_1px_0_10px_rgb(0_0_0_/_70%)] sm:pr-16">Slow-carb next level shoindxgoitch ethical authentic, scenester sriracha forage.</span>
									<div class="flex-shrink-0 px-8 py-2 mt-10 text-sm font-bold text-white uppercase bg-transparent border border-white border-solid rounded-tl-lg rounded-br-lg focus:outline-none group-hover:bg-white group-hover:text-gray-800 sm:mt-0">Button</div>
								</div>
							</div>
						</a>
					</section>

					<div class="wp-block-spacer">&nbsp;</div>


					<!-- <div class="callout callout-info | text-blue-900 bg-blue-100 px-8 py-4 mb-4 leading-5 rounded w-full md:max-w-xl lg:max-w-2xl xl:max-w-4xl"><span class="label | text-blue-800/70 mr-2 font-bold uppercase font-head after:content-['_//']">Note</span><span class="desc">This is a callout box of the <em>info</em> type. It can blah blah really smooth.</span></div> -->

					<!-- <div class="callout callout-warning | text-amber-900 bg-amber-100 px-8 py-4 mb-4 leading-5 rounded w-full md:max-w-xl lg:max-w-2xl xl:max-w-4xl"><span class="label | text-amber-800/70 mr-2 font-bold uppercase font-head after:content-['_//']">Warning</span><span class="desc">This is a callout box of the <em>warning</em> type. It can blah blah really smooth.</span></div>

						<div class="callout callout-success | text-green-900 bg-green-100 px-8 py-4 mb-4 leading-5 rounded w-full md:max-w-xl lg:max-w-2xl xl:max-w-4xl"><span class="label | text-green-800/70 mr-2 font-bold uppercase font-head after:content-['_//']">Success</span><span class="desc">This is a callout box of the <em>success</em> type. It can blah blah really smooth.</span></div>

						<div class="callout callout-danger | text-red-900 bg-red-100 px-8 py-4 mb-4 leading-5 rounded w-full md:max-w-xl lg:max-w-2xl xl:max-w-4xl"><span class="label | text-red-800/70 mr-2 font-bold uppercase font-head after:content-['_//']">Danger</span><span class="desc">This is a callout box of the <em>danger</em> type. It can blah blah really smooth.</span></div>

						<div class="callout callout-warning | text-amber-900 bg-amber-100 px-8 py-4 mb-4 leading-snug rounded w-full md:max-w-xl lg:max-w-2xl xl:max-w-4xl"><span class="label | text-amber-800/70 mr-2 font-bold uppercase font-head after:content-['_//']">Sea Otters</span><span class="desc">This is a test for long length. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis minima obcaecati ab, odit ad fuga dignissimos sunt, qui, repellat esse eveniet temporibus sequi! Quas aperiam reiciendis sequi aliquid praesentium porro. </span></div> -->

					<div class="p-4 rounded-tl rounded-br md:p-8 bg-brand-red-faint md:rounded-tl-lg md:rounded-br-lg">Nothing. WP overriding safe classes experiment.</div>

				</div>
				<?php // get_template_part( 'template-parts/form/form', 'hubspot' );
				?>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->
	<?php
	endwhile; // End of the loop.
	?>
</main><!-- #main -->
<?php
get_footer();
