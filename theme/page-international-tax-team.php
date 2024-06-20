<?php
/*
 * Template Name: Basic Landing Page
 *
 * This is the template that displays a simplified, distraction-free page. Please note that most internal site links and menus are not shown.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$page_id                        = get_the_ID();
if (get_field('ll_page_title_override')) {
		$page_title                 = get_field('ll_page_title_override');
} else {
		$page_title                 = get_the_title();
}
$page_message                   = get_field( 'll_brand_message' );
$page_excerpt                   = get_the_excerpt();
$page_form                      = get_field( 'll_hs_form_html' );
$page_below_fold_content        = get_field( 'll_below_fold' );
$page_gmap                      = get_field( 'll_page_gmap_url' );
$page_city                      = get_field( 'll_page_city' );
$page_state                     = get_field( 'll_page_state' );

?>

	<main id="primary" class="landing-page | bg-white dark:bg-neutral-900">

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content/content', 'page-lp' );
			?>

			<?php if ( get_field( 'll_hide_featured_image' ) === false ) :
					echo ll_better_page_hero( $page_title, $page_message['label'] );
			endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'lp ' ); ?>>
				<div class="px-2 md:container lg:px-[16px]">
					<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

						<div <?php ll_content_class( 'entry-content ll-page-grid-area-a md:col-span-2' ); ?>>

							<?php the_content(); ?>

							<?php // if( have_rows('ll_lp_team_member')): ?>
							<!-- <ul class="not-prose list-none dps-grid-4max"> -->
								<?php // foreach( $team as $card ) {
								// while( have_rows('ll_lp_team_member') ) : the_row();

									// Load sub field value.
									// $full_name 		= get_sub_field( 'll_lp_member_full_name' );
									// $first_name 	= get_sub_field( 'll_lp_member_first_name' );
									// $last_name 		= get_sub_field( 'll_lp_member_last_name' );
									// $desigs				= get_sub_field( 'll_lp_member_designations' );
									// $title 				= get_sub_field( 'll_lp_member_title' );
									// $headshot 		= get_sub_field( 'll_lp_member_headshot' );
									// $phone 				= get_sub_field( 'll_lp_member_phone_number' );
									// $email 				= get_sub_field( 'll_lp_member_email' );
									// $shortbio 		= get_sub_field( 'll_lp_member_short_bio' );
									// $slug 				= strtolower( $first_name . '-' . $last_name );
									// Do something, but make sure you escape the value if outputting directly...
									?>

									<!-- <li class="person-card popcard | @container">
										<div class="flex flex-col @2xs:flex-row gap-2 items-center h-full p-4 border rounded-lg bg-white border-neutral-200 dark:border-neutral-600 dark:bg-neutral-800">

											<div class="card-text | flex-grow order-1 md:text-center">
												<h3 class="text-2xl lg:text-3xl !leading-none text-brand-blue dark:text-brand-blue-pale"><?php // echo $full_name; ?> <?php // if ( $desigs ) { echo ' <small>' . $desigs . '</small>'; } ?></h3>
												<p class="text-lg leading-tight text-neutral-600 font-head dark:text-neutral-500"><?php // echo $title; ?></p>
											</div>

											<div class="card-button | order-last">
												<button class="font-head rounded-md text-brand-blue px-3 py-1 border border-brand-blue bg-transparent dark:text-brand-blue-pale dark:border-brand-blue-pale" aria-label="Read more about <?php // echo $first_name . ' ' . $last_name; ?>" aria-expanded="false" popovertarget="popbio-<?php // echo esc_attr( $slug ); ?>">More</button>
												<div id="popbio-<?php // echo esc_attr( $slug ); ?>" popover class="prose p-4 border-2 border-brand-blue max-h-[90vh] md:max-w-2xl md:p-8 dark:bg-neutral-800 dark:text-neutral-100 dark:border-neutral-500" role="tooltip">

													<div class="absolute top-0 right-0 size-8 text-center">
														<button popovertarget="popbio-<?php // echo esc_attr( $slug ); ?>" popovertargetaction="hide" class="text-brand-blue dark:text-neutral-300">
															<span><i class="fa-regular fa-circle-xmark"></i></span>
															<span class="sr-only">Close</span>
														</button>
													</div>

													<h3 class="text-brand-red dark:text-brand-blue-pale"><?php // echo $first_name . ' ' . $last_name; ?></h3>
													<div class="float-right ml-4 mb-4 bg-red-400 max-w-32 aspect-headshot md:max-w-48">
														<img src="<?php // echo esc_attr( $headshot ); ?>" alt="<?php // echo $first_name . ' ' . $last_name; ?>" class="object-cover" width="200" height="267" />
													</div>
													<?php // echo $shortbio; ?>
												</div>
											</div>

											<div class="card-img | flex-shrink-0 order-0 object-cover object-center rounded-full bg-neutral-100 bg-no-repeat bg-cover" style="background-image: url(<?php // echo esc_attr( $headshot ); ?>); background-position: center top;">
												<div class="w-16 h-16 lg:w-32 lg:h-32 aspect-square">&nbsp;</div>
											</div>

										</div>
									</li> -->
								<?php
								// End loop.
								// endwhile; ?>
							<ul>
							<?php // endif; ?>

						</div>

						<div class="my-16 ll-page-grid-area-b md:my-0 md:col-span-3">

							<?php // BBBBB  ?>

						</div>

						<div class="ll-page-grid-area-c">
							<div id="contact" class="container-contact-form not-prose">
								<h3>Contact Our Team</h3>
								<p class="text-base my-4">FORM?</p>
							</div>
							<div>&nbsp;</div>
						</div>

					</div>
				</div>
			</article>

			<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();
