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

if ( get_field( 'll_page_title_override' ) ) {
	$page_title = get_field( 'll_page_title_override' );
} else {
	$page_title = get_the_title();
}
$page_message = get_field( 'll_brand_message' );
$page_featimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
if ( $page_featimg == true ) {
	$page_featimg_url = $page_featimg[0];
} else {
	$page_featimg_url = '';
}

get_header();
?>

<main id="primary" class="bg-white">

	<?php
	while (have_posts()) :
		the_post();
		// get_template_part( 'template-parts/content/content', 'page' );
	?>

    <?php ll_page_hero( $page_title, $page_message['label'], $page_featimg_url ); ?>

		<article id="post-<?php the_ID(); ?>" <?php if (!is_front_page()) { post_class('py-4 lg:py-8'); } ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">

				<div class="not-prose entry-cont">
					<?php // the_content(); ?>

                    <div class="prose">
                        <h2 class="todo">Elements to include on page:</h2>
                        <ul class="mb-24 todo">
                            <li>AuditDashboard</li>
                            <li>ShareFile</li>
                            <li>TaxCaddy</li>
                            <li>SafeSend Returns</li>
                            <li>Payment Options (Invoice + Deposit)</li>
                            <li>Payment Help info</li>
                        </ul>
                    </div>

					<section class="mb-8 lg:mb-16">
                        <div class="p-4 mb-10 border-2 border-solid divide-y rounded-lg border-neutral-200 bg-neutral-50 md:mb-0 divide-neutral-200 divide-solid lg:p-8 hover:bg-white">
							<div class="pb-4 lg:pb-8">
								<h3 class="mb-2 text-brand-red">Payment Options</h3>
								<p class="mb-4">Use the options below to pay an invoice or a deposit.</p>
                                <div class="wp-block-buttons is-layout-flex">
                                    <div class="wp-block-button is-style-outline">
                                        <a class="border-2 wp-block-button__link has-brand-red-color has-text-color wp-element-button" href="#"><i class="mr-1 fa-solid fa-file-invoice"></i> Pay Invoice(s)</a>
                                    </div>
								    <div class="wp-block-button is-style-outline">
                                        <a class="border-2 wp-block-button__link has-brand-red-color has-text-color wp-element-button" href="#"><i class="mr-1 fa-solid fa-file-invoice-dollar"></i> Pay Deposit</a>
                                    </div>
                                </div>
							</div>
							<div class="pt-4 lg:pt-8">
								<h5 class="font-bold text-brand-blue-dark">Need Help?</h5>
								<p class="text-base ">Reach out to our Internal Accounting Team (Available 8am-5pm, M-F) &mdash; <strong>(520) 321-4600</strong> or <a href="mailto:ccs@beachfleischman.com">Internal Accounting <i class="fa-regular fa-envelope"></i></a></p>
							</div>
						</div>
                    </section>

                    <section class="mb-8 lg:mb-16">

						<div class="flex flex-col gap-8 lg:flex-row lg:items-start">

							<div class="lg:basis-1/3 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100 hover:bg-white">
									<div class="w-full bg-white"><a href="https://beachfleischman.sharefile.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2022/02/res__guide-sharefile.png" alt="logo: Citrix Sharefile" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">ShareFile</h3>
										<p class="mb-3 leading-relaxed">ShareFile is a <strong>secure collaboration and file sharing platform</strong> that supports document-centric tasks and workflow needs.</p>
										<p class="text-neutral-400"><a href="https://beachfleischman.sharefile.com/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0" target="_blank" rel="noopener">ShareFile <i class="fa-regular fa-right-to-bracket"></i></a></p>
									</div>
								</div>
							</div>

							<div class="lg:basis-1/3 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100 hover:bg-white">
									<div class="w-full bg-white"><a href="https://taxcaddy.com/" target="_blank" rel="noopener"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-taxcaddy.png" alt="logo: TaxCaddy" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">TaxCaddy</h3>
										<p class="mb-3 leading-relaxed">TaxCaddy is a secure, cloud-based platform that makes <strong>gathering and sharing your tax documents</strong> a breeze.</p>
										<p class="text-neutral-400"><a href="https://taxcaddy.com/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0" target="_blank" rel="noopener">TaxCaddy <i class="fa-regular fa-right-to-bracket"></i></a> | <a href="/client-center/taxcaddy-guide/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0">TaxCaddy Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

							<div class="lg:basis-1/3 lg:grow">
								<div class="h-full overflow-hidden border-2 rounded-lg bg-neutral-100 border-neutral-100 hover:bg-white">
									<div class="w-full bg-white"><a href="/client-center/safesend-returns-guide/"><img class="mx-auto" src="https://beachfleischman.com/wp-content/uploads/2021/06/res__guide-safesend.png" alt="logo: SafeSend Returns" width="240" height="160"></a></div>
									<div class="p-6 ">
										<h3 class="mb-3 text-neutral-800 ">SafeSend Returns</h3>
										<p class="mb-3 leading-relaxed">SafeSend Returns is a digital platform that facilitates the <strong>delivering and signing of a tax return</strong>.</p>
										<p class="text-neutral-400"><a href="/client-center/safesend-returns-guide/" class="text-brand-blue hover:text-brand-blue-dark md:mb-2 lg:mb-0">SafeSend Guide <i class="fa-regular fa-map"></i></a></p>
									</div>
								</div>
							</div>

						</div>

					</section>

					<div class="">&nbsp;</div>

				</div>

				<?php get_template_part('template-parts/form/form', 'hubspot'); ?>

			</div>
		</article><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

</main>

<?php
get_footer();
