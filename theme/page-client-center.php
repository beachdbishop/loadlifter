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

<main id="primary" class="bg-neutral-100">

	<?php
	while (have_posts()) :
		the_post();
		// get_template_part( 'template-parts/content/content', 'page' );
	?>

		<article id="post-<?php the_ID(); ?>" <?php if (!is_front_page()) {
													post_class('py-4 lg:py-8');
												} ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if (function_exists('bcn_display')) { ?>
					<div class="breadcrumbs | font-head text-neutral-700 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>

				<header>
					<?php the_title('<h1 class="entry-title | ">', '</h1>'); ?>
				</header>

				<div class="entry-content not-prose">
					<?php // the_content();
					?>

					<section class="container p-2 mx-auto mb-8 bg-white md:p-4 lg:p-8 md:flex md:gap-4 lg:gap-8 rounded-xl lg:p-16 lg:mb-16">

						<div class="p-4 mb-10 border-2 border-orange-200 border-solid divide-y rounded-lg bg-orange-50 md:mb-0 divide-neutral-300 divide-solid lg:p-8 md:w-1/2 lg:w-1/4">
							<div class="pb-4 lg:pb-8">
								<h3 class="mb-2 text-brand-red">Payment Options</h3>
								<p class="mb-4">Use the options below to pay an invoice or a deposit.</p>
								<p class="mb-2 leading-loose"><a class="px-4 py-2 text-orange-600 border-2 border-orange-600 border-solid rounded-md hover:bg-orange-800 hover:border-orange-800 hover:text-orange-50" href="#"><i class="fa-regular fa-file-invoice"></i> Pay Invoice(s)</a></p>
								<p class="mb-2 leading-loose"><a class="px-4 py-2 text-orange-600 border-2 border-orange-600 border-solid rounded-md hover:bg-orange-800 hover:border-orange-800 hover:text-orange-50" href="#"><i class="fa-regular fa-file-invoice-dollar"></i> Pay Deposit</a></p>
								</ul>
							</div>
							<div class="pt-4 lg:pt-8">
								<h5 class="font-bold text-brand-blue-dark">Need Help?</h5>
								<p class="text-base ">Reach out to our Internal Accounting Team (Available 8am-5pm, M-F) &mdash; <strong>(520) 321-4600</strong></p>
								<p class="text-base"><a href="mailto:ccs@beachfleischman.com">Internal Accounting <i class="fa-regular fa-envelope"></i></a></p>
							</div>
						</div>

						<div class="space-y-4 md:w-1/2 lg:flex lg:flex-wrap lg:gap-8 lg:w-3/4">

							<div class="lg:basis-1/4 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://beachfleischman.sharefile.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2022/02/res__guide-sharefile.png" alt="logo: Citrix Sharefile" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">ShareFile</h3>
										<p class="mb-3 leading-relaxed">ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.sharefile.com/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0" target="_blank" rel="noopener">ShareFile <i class="fa-regular fa-right-to-bracket"></i></a></p>
									</div>
								</div>
							</div>

							<div class="lg:basis-1/4 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://taxcaddy.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-taxcaddy.png" alt="logo: TaxCaddy" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">TaxCaddy</h3>
										<p class="mb-3 leading-relaxed">TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze.</p>
										<p class="text-neutral-400"><a href="https://taxcaddy.com/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0" target="_blank" rel="noopener">TaxCaddy <i class="fa-regular fa-right-to-bracket"></i></a> | <a href="https://beachfleischman.com/resources/taxcaddy-guide/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0">TaxCaddy Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

							<div class="lg:basis-1/4 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://beachfleischman.com/resources/safesend-returns-guide/"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-safesend.png" alt="logo: SafeSend Returns" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">SafeSend Returns</h3>
										<p class="mb-3 leading-relaxed">SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.com/resources/safesend-returns-guide/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0">SafeSend Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

						</div>

					</section>

					<div class="px-2 my-4 md:my-8 md:px-0">
						<h2 class="leading-normal text-brand-blue">Recent Posts</h2>
						<?php echo do_shortcode('[display-posts posts_per_page="4" ignore_sticky_posts="true" orderby="date" order="DESC" wrapper="div" wrapper_class="grid grid-auto-fit gap-8 -mx-4" layout="card" /]'); ?>
						<div class="wp-block-buttons | text-center my-4">
							<div class="wp-block-button is-style-outline">
								<a class="wp-block-button__link" href="/blog/">See more</a>
							</div>
						</div>
					</div>

					<div class="">&nbsp;</div>

				</div>

				<?php get_template_part('template-parts/form/form', 'hubspot'); ?>

			</div>
		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
