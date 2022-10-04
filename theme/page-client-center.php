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

		<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-4 lg:py-8' ); } ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if ( function_exists( 'bcn_display' ) ) { ?>
					<div class="breadcrumbs | font-head text-neutral-700 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>

				<header>
					<?php the_title( '<h1 class="entry-title | ">', '</h1>' ); ?>
				</header>

				<div class="entry-content">
					<?php // the_content(); ?>

					<section class="container p-8 mx-auto mb-8 bg-white rounded-xl not-prose lg:p-16 lg:mb-16">
						<div class="flex flex-wrap -m-4">

							<div class="p-4 md:w-1/3">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://beachfleischman.sharefile.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2022/02/res__guide-sharefile.png" alt="logo: Citrix Sharefile"></a></div>
									<div class="p-6 ">
										<h2 class="mb-3 text-neutral-800 ">ShareFile</h2>
										<p class="mb-3 leading-relaxed">ShareFile is a secure collaboration and file sharing platform that supports document-centric tasks and workflow needs.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.sharefile.com/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0" target="_blank" rel="noopener">ShareFile <i class="fa-regular fa-right-to-bracket"></i></a></p>
									</div>
								</div>
							</div>

							<div class="p-4 md:w-1/3">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://taxcaddy.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-taxcaddy.png" alt="logo: TaxCaddy"></a></div>
									<div class="p-6 ">
										<h2 class="mb-3 text-neutral-800 ">TaxCaddy</h2>
										<p class="mb-3 leading-relaxed">TaxCaddy is a secure, cloud-based platform that makes gathering and sharing your tax documents a breeze.</p>
										<p class="text-neutral-400"><a href="https://taxcaddy.com/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0" target="_blank" rel="noopener">TaxCaddy <i class="fa-regular fa-right-to-bracket"></i></a> | <a href="https://beachfleischman.com/resources/taxcaddy-guide/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0">TaxCaddy Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

							<div class="p-4 md:w-1/3">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100">
									<div class="w-full bg-white"><a href="https://beachfleischman.com/resources/safesend-returns-guide/"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-safesend.png" alt="logo: SafeSend Returns"></a></div>
									<div class="p-6 ">
										<h2 class="mb-3 text-neutral-800 ">SafeSend Returns</h2>
										<p class="mb-3 leading-relaxed">SafeSend Returns is a digital platform that facilitates the delivering and signing of a tax return.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.com/resources/safesend-returns-guide/" class="text-brand-blue hover:text-brand-blue-pale md:mb-2 lg:mb-0">SafeSend Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

						</div>
					</section>

					<!-- wp:group {"align":"full","backgroundColor":"brand-blue","className":"p-4 full-bleed "} -->
					<div class="p-4 wp-block-group alignfull full-bleed has-brand-blue-background-color has-background" id="pay"><!-- wp:group {"align":"wide"} -->
					<div class="wp-block-group alignwide"><!-- wp:heading {"textAlign":"center","level":3} -->
					<h2 class="has-text-align-center" id="payment-options">Payment Options</h2>
					<!-- /wp:heading -->

					<!-- wp:columns -->
					<div class="wp-block-columns"><!-- wp:column -->
					<div class="wp-block-column"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons"><!-- wp:button {"textColor":"teal-normal","className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-teal-normal-color has-text-color" href="https://secure.cpacharge.com/pages/beachfleischman/payments">Pay Invoice(s)</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons -->

					<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
					<p class="has-text-align-center has-small-font-size">Choose this option if you have an invoice or multiple invoices to pay.</p>
					<!-- /wp:paragraph --></div>
					<!-- /wp:column -->

					<!-- wp:column -->
					<div class="wp-block-column"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons"><!-- wp:button {"textColor":"teal-normal","className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-teal-normal-color has-text-color" href="https://secure.cpacharge.com/pages/beachfleischman/retainer">Pay Deposit</a></div>
					<!-- /wp:button --></div>
					<!-- /wp:buttons -->

					<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
					<p class="has-text-align-center has-small-font-size">Choose this option to pay a deposit, retainer, or other payment.</p>
					<!-- /wp:paragraph --></div>
					<!-- /wp:column --></div>
					<!-- /wp:columns -->

					<!-- wp:heading {"textAlign":"center","level":4,"textColor":"orange-normal"} -->
					<h4 class="has-text-align-center has-orange-normal-color has-text-color">Need Help?</h4>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
					<p class="has-text-align-center has-small-font-size">Reach out to our Internal Accounting Team (<em>Available 8am-5pm, M-F</em>) - <strong>(520) 321-4600</strong></p>
					<!-- /wp:paragraph -->

					<!-- wp:html -->
					<p class="text-center"><a href="mailto:ccs@beachfleischman.com"><i class="fa fa-envelope"></i> Internal Accounting</a></p>
					<!-- /wp:html --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->

					<div class="px-2 my-4 md:my-8 md:px-0">
						<h2 class="leading-normal text-brand-blue">Recent Posts</h2>
						<?php echo do_shortcode( '[display-posts posts_per_page="4" ignore_sticky_posts="true" orderby="date" order="DESC" wrapper="div" wrapper_class="grid grid-auto-fit gap-8 -mx-4" layout="card" /]' ); ?>
						<div class="wp-block-buttons | text-center my-4">
							<div class="wp-block-button is-style-outline">
								<a class="wp-block-button__link" href="/blog/">See more</a>
							</div>
						</div>
					</div>

					<div class="">&nbsp;</div>

				</div>

				<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

			</div>
		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

</main><!-- #main -->

<?php
get_footer();
