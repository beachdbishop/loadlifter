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

					<section class="container p-8 mx-auto mb-8 bg-white rounded-xl lg:p-16 lg:mb-16">
						<div class="flex flex-wrap -m-4">

							<div class="p-4 md:w-1/3">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://beachfleischman.sharefile.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2022/02/res__guide-sharefile.png" alt="logo: Citrix Sharefile" width="300" height="200"></a></div>
									<div class="p-6 ">
										<h2 class="mb-3 text-neutral-800 ">ShareFile</h2>
										<p class="mb-3 leading-relaxed">ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.sharefile.com/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0" target="_blank" rel="noopener">ShareFile <i class="fa-regular fa-right-to-bracket"></i></a></p>
									</div>
								</div>
							</div>

							<div class="p-4 md:w-1/3">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://taxcaddy.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-taxcaddy.png" alt="logo: TaxCaddy" width="300" height="200"></a></div>
									<div class="p-6 ">
										<h2 class="mb-3 text-neutral-800 ">TaxCaddy</h2>
										<p class="mb-3 leading-relaxed">TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze.</p>
										<p class="text-neutral-400"><a href="https://taxcaddy.com/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0" target="_blank" rel="noopener">TaxCaddy <i class="fa-regular fa-right-to-bracket"></i></a> | <a href="https://beachfleischman.com/resources/taxcaddy-guide/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0">TaxCaddy Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

							<div class="p-4 md:w-1/3">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://beachfleischman.com/resources/safesend-returns-guide/"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-safesend.png" alt="logo: SafeSend Returns" width="300" height="200"></a></div>
									<div class="p-6 ">
										<h2 class="mb-3 text-neutral-800 ">SafeSend Returns</h2>
										<p class="mb-3 leading-relaxed">SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.com/resources/safesend-returns-guide/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0">SafeSend Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

						</div>
					</section>

					<section class="py-4 full-bleed has-blue-gradient-background text-neutral-100 md:py-8 lg:py-12">
						<div class="flex flex-wrap items-center w-full px-5 py-24 mx-auto md:max-w-3xl">
							<div class="pb-10 mb-10 border-b md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 md:mb-0 border-brand-blue-faint">
								<h3 class="mb-2 ">Payment Options</h3>
								<p class="mb-2 leading-relaxed">Use the options <span class="sm:hidden">below</span><span class="hidden sm:inline">to the right</span> to pay an invoice or a deposit.</p>
								<h5 class="font-bold text-brand-blue-faint">Need Help?</h5>
								<p class="text-base ">Reach out to our Internal Accounting Team (Available 8am-5pm, M-F) &mdash; <strong>(520) 321-4600</strong></p>
								<p class="text-base"><a class="hover:text-white hover:decoration-brand-blue-pale" href="mailto:ccs@beachfleischman.com">Internal Accounting <i class="fa-regular fa-envelope"></i></a></p>
							</div>
							<div class="flex flex-col md:w-1/2 md:pl-12">
								<h2 class="mb-3 text-sm tracking-wider uppercase text-brand-blue-pale">OPTIONS</h2>
								<nav class="-mb-1 text-lg list-none md:columns-2">
									<li class="">
										<a class="hover:text-white hover:decoration-solid hover:decoration-brand-blue-pale" href=""><i class="fa-regular fa-file-invoice"></i> Pay Invoice(s)</a>
									</li>
									<li class="">
										<a class="hover:text-white hover:decoration-solid hover:decoration-brand-blue-pale" href=""><i class="fa-regular fa-file-invoice-dollar"></i> Pay Deposit</a>
									</li>
								</nav>
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
