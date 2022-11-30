<?php
/**
 * Template part for displaying a single Job Opening
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$f_timestatus = get_field( 'time_status' );
$f_location = get_field( 'location' );
$f_location_str = implode( ', ', $f_location);
$f_openclosed = get_field( 'opening_status' );
$f_opening = get_the_title(); // for form field population
$f_openingid = get_the_ID(); // for form field population
$f_applylink = get_field( 'apply_link' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
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

				<div class="prose lg:prose-xl entry-content">
					<?php
					// Don't include the normal sharing display right after content
					// This lets us place it exactly where we want it later
					if ( function_exists( 'sharing_display') ) remove_filter( 'the_content', 'sharing_display', 19 );

					// Render the content
					the_content(); ?>

					<p class="mt-2"><a name="apply"></a>&nbsp;</p>

					<?php if ( ( $f_openclosed == '1' ) && ( $f_applylink ) ) { ?>

						<p class="text-center"><a href="<?php echo $f_applylink; ?>" class="text-brand-red hover:text-brand-red-pale"><i class="far fa-edit"></i> Apply today</a></p>

					<?php } else { ?>

						<p class="text-brand-red-dark"><em>Thank you for your interest but we are not accepting applications for this opening at this time.</em></p>

					<?php } ?>

					<p class="my-8 text-center"><a href="/career-opportunities/">Back to Career Opportunities</a></p>

					<div class="clear-both">&nbsp;</div>

				</div>
			</div>

			<aside class="grid__jobopening-c | md:mt-0 ">
				<?php
					// Now, include the sharing display
					if ( function_exists( 'sharing_display' ) ) echo sharing_display();
				?>
			</aside>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->

