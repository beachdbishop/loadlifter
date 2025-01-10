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

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
		 $page_title                = get_field('ll_page_title_override');
} else {
		 $page_title                = get_the_title();
}

if ( get_field( 'll_custom_subheader' ) ) {
	$page_message 								= get_field( 'll_custom_subheader' );
} else {
	$brand_message								= get_field( 'll_brand_message' );
	$page_message									= $brand_message['label'];
}

$page_excerpt                   = get_the_excerpt();
$hs_form_id 										= 'c8675641-3e68-4ff7-9dc3-ae3636fbf1c8';
?>

	<main id="primary" class="bg-white  |  dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page' );
			?>

				<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
					echo ll_better_page_hero( $page_title, $page_message );
				endif; ?>

				<article id="post-<?php the_ID(); ?>" <?php if ( !is_front_page() ) { post_class( 'py-8' ); } ?>>
					<div class="px-2  |  md:container lg:px-[16px]">

						<?php if ( get_field( 'll_hide_featured_image' ) === true ) { ?>
							<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

							<header class="mb-4">
								<?php the_title( '<h1 class="entry-title  |  text-orient-800  |  dark:text-orient-400">', '</h1>' ); ?>
							</header>
						<?php } ?>

						<div <?php ll_content_class( 'entry-content' ); ?>>

							<?php the_content(); ?>

							<div class="not-prose hbspt-form max-w-prose" id="llhsform"></div>
							<script>
								// Function to load the HubSpot form
								// via: https://community.hubspot.com/t5/CRM/Hubspot-web-form-integration-scripts-slowing-WordPress-website/m-p/332393
								function loadHubSpotForm() {
									var formContainer = document.getElementById('llhsform');
									var rect = formContainer.getBoundingClientRect();

									// Check if the form is within the viewport
									if(rect.top < window.innerHeight && rect.bottom >= 0) {
											// Create and append the HubSpot script
											var hsScript = document.createElement('script');
											hsScript.async = true; // Load script asynchronously
											hsScript.src='//js.hsforms.net/forms/v2.js';
											hsScript.onload = function() {
													hbspt.forms.create({
															region: "na1",
															portalId: "5578910",
															target: '#llhsform',
															formId: "<?php echo $hs_form_id; ?>"

													});
											};
											document.body.appendChild(hsScript);

											// Remove the event listener once the script is loaded
											window.removeEventListener('scroll', loadHubSpotForm);
									}
								}

								// Add scroll event listener to load the form
								window.addEventListener('scroll', loadHubSpotForm);

								// Also check immediately in case the form is already in view on the initial page load
								loadHubSpotForm();
							</script>
							<!-- <script>hbspt.forms.create({region: "na1", portalId: "5578910", formId: "<?php // echo $hs_form_id; ?>"});</script> -->
							<noscript>
								<p class="my-4">Let us know what you need.</p>
								<div class="wp-block-buttons is-content-justification-left is-layout-flex wp-block-buttons-is-layout-flex print:hidden">
									<div class="wp-block-button is-style-outline"><a href="mailto:info@beachfleischman.com?subject=Inquiry%20from:%20<?php echo esc_attr( get_the_title() ); ?>" class="wp-block-button__link has-brand-red-color has-text-color wp-element-button "><i class="fa-solid fa-envelope"></i> Email us</a></div>
								</div>
							</noscript>

							<div class="clear-both">&nbsp;</div>

							<?php
							wp_link_pages(
								array(
									'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
									'after'  => '</div>',
								)
							);
							?>
						</div>

						<?php get_template_part( 'template-parts/form/form', 'hubspot' ); ?>

					</div>
				</article>

				<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
