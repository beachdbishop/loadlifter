<?php
/**
 * Template part for displaying a single Job Opening
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$f_timestatus                   = get_field( 'time_status' );
$f_location                     = get_field( 'location' );
$f_location_str                 = implode( ', ', $f_location);
$f_openclosed                   = get_field( 'opening_status' );
$f_opening                      = get_the_title(); // for form field population
$f_openingid                    = get_the_ID(); // for form field population
$f_applylink                    = get_field( 'apply_link' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-2 md:container lg:px-[16px]">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-600 pb-4 md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<div class="grid__jobopening | md:grid md:grid-rows-[200px_auto] md:grid-cols-3 md:gap-4 lg:grid-cols-4 lg:gap-8">

			<div class="grid__jobopening-a | pb-8 overflow-x-auto">
				<table class="jobopening_meta | min-w-full divide-y divide-solid divide-neutral-200 lg:max-w-fit">
					<?php if ( $f_openclosed == '0' ) : ?>
					<tr>
						<th width="33%" class="py-2 text-left whitespace-nowrap ">Opening</th>
						<td width="67%" class="py-2 text-left text-brand-red-dark whitespace-nowrap "><strong><?php echo ( $f_openclosed == '0' ? 'Closed' : 'Open' ); ?></strong></td>
					</tr>
					<?php endif; ?>
					<?php if ( $f_timestatus ) : ?>
					<tr>
						<th width="33%" class="py-2 text-left whitespace-nowrap ">Time/Status</th>
						<td width="67%" class="py-2 text-left whitespace-nowrap "><strong><?php echo ( $f_timestatus == 'fulltime' ? 'Full-Time' : 'Part-Time' ); ?></strong></td>
					</tr>
					<?php endif; ?>
					<?php if ( $f_location ) : ?>
					<tr>
						<th class="py-2 text-left whitespace-nowrap ">Location</th>
						<td class="py-2 text-left uppercase whitespace-nowrap"><?php echo $f_location_str; ?></td>
					</tr>
					<?php endif; ?>
				</table>
			</div>

			<div class="grid__jobopening-b | md:col-span-2 md:row-span-2 lg:col-span-3">
				<header class="mb-4">
					<?php the_title( '<h1 class="entry-title | mb-0 text-brand-blue font-bold">', '</h1>' ); ?>
				</header>

				<div <?php ll_content_class( 'entry-content' ); ?>>
					<?php
					// Render the content
					the_content(); ?>

					<p class="mt-2"><a name="apply"></a>&nbsp;</p>

					<?php if ( ( $f_openclosed == '1' ) && ( $f_applylink ) ) { ?>

						<div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
							<a href="<?php echo $f_applylink; ?>" class="px-5 py-3 font-bold text-base no-underline border-2 rounded-lg font-head border-brand-red bg-brand-red !text-neutral-100 hover:text-white dark:bg-brand-red dark:border-brand-red dark:hover:text-brand-red-faint dark:hover:border-brand-red-faint shadow-neutral-800 hover:shadow-xl focus:outline-none focus:ring focus:ring-orient-400/80 sm:w-auto lg:text-lg dark:shadow-brand-red-pale" target="_blank" rel="noopener"><i class="mr-1 fa-solid fa-edit"></i>  Apply today</a>

							<a href="/career-opportunities/" class="px-5 py-3 font-bold text-base no-underline border-2 rounded-lg font-head border-brand-blue !text-brand-blue hover:text-brand-blue-dark hover:border-brand-blue-dark dark:text-brand-blue dark:border-brand-blue dark:hover:text-orient-200 dark:hover:border-orient-200 shadow-neutral-800 hover:shadow-xl focus:outline-none focus:ring focus:ring-orient-400/80 sm:w-auto lg:text-lg dark:shadow-orient-400" target="_blank" rel="noopener"><i class="mr-1 fa-regular fa-angle-left"></i> Back to Careers</a>
						</div>



					<?php } else { ?>

						<p class="text-brand-red-dark"><em>Thank you for your interest but we are not accepting applications for this opening at this time.</em></p>

						<div class="mt-8 wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
							<a href="/career-opportunities/" class="px-5 py-3 font-bold text-base no-underline border-2 rounded-lg font-head border-brand-blue !text-brand-blue hover:text-brand-blue-dark hover:border-brand-blue-dark dark:text-brand-blue dark:border-brand-blue dark:hover:text-orient-200 dark:hover:border-orient-200 shadow-neutral-800 hover:shadow-xl focus:outline-none focus:ring focus:ring-orient-400/80 sm:w-auto lg:text-lg dark:shadow-orient-400" target="_blank" rel="noopener"><i class="mr-1 fa-regular fa-angle-left"></i> Back to Careers</a>
						</div>

					<?php } ?>

					<div class="clear-both">&nbsp;</div>

				</div>
			</div>

			<aside class="grid__jobopening-c | md:mt-0 ">
				<?php
					// Now, include the sharing display
					// get_template_part( 'template-parts/form/form', 'webshare' );
				?>
			</aside>
		</div>

	</div>

</article>
