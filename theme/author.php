<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

get_header();

$author_id = 'user_' . get_the_author_meta('ID');
$author_user = get_userdata(get_the_author_meta('ID'));
$author_name = $author_user->display_name; // core field
$author_url = $author_user->user_url; // core field
$author_desc = $author_user->description; // core field
$author_desc_fb = "Review the comprehensive list of blog posts and insights on accounting, tax, and audit from {$author_name} - Phoenix Tucson AZ.";
/* Note re: SEO desc: https://yoast.com/video/ask-yoast-meta-descriptions-and-the-excerpt-field/ */
$author_desigs = get_field('ll_user_designations', $author_id);
$author_title = get_field('ll_user_title', $author_id);
$author_thumbnail = get_field('ll_user_headshot', $author_id);
$author_org = get_field('ll_user_organization', $author_id);
$author_department = get_field_object( 'll_user_department', $author_id );
$author_dept_value = $author_department['value'];
// $author_depts = $author_dept_value['label'];
// $author_location = get_field_object( 'll_user_location', $author_id );
// $author_loc_value = $author_location['value'];
// $author_loc = $author_loc_value['label'];
$author_industries = get_field('ll_user_industries', $author_id);
$author_services = get_field('ll_user_services', $author_id);
// $author_seotitle = get_user_meta( get_the_author_meta( 'ID' ), 'wpseo_title', true ); // Yoast SEO
if (!empty($author_thumbnail)) {
	$url = $author_thumbnail['url'];
	// $title = $author_thumbnail['title'];
	$alt = $author_thumbnail['alt'];
	$size = 'thumbnail';
	$thumb = $author_thumbnail['sizes'][$size];
	$width = $author_thumbnail['sizes'][$size . '-width'];
	$height = $author_thumbnail['sizes'][$size . '-height'];
}
?>
<main id="primary" class="bg-neutral-50">
	<div class="py-8 md:py-8 bg-gradient-to-l from-neutral-300 print:py-8">
		<div class="container md:mx-auto">
			<div class="flex flex-col sm:flex-row">
				<div class="text-center sm:w-1/3 sm:pr-8 sm:py-8">
					<div class="headshot | max-w-[80px] mx-auto mb-2 md:mb-4 rounded-full bg-brand-red-faint bg-cover" style="background-image: url('<?php echo esc_url($url) ?>');" aria-label="<?php echo esc_attr($alt); ?>">
						<div class="max-w-[80px] aspect-square">&nbsp;</div>
					</div>
					<div class="flex flex-col items-center justify-center text-center">
						<h2 class="mt-4 text-neutral-600">Articles by <span class="text-brand-red"><?php echo $author_name; ?></span></h2>
						<ul class="list__author--meta | list-none">
							<?php if (!empty($author_desigs)) {
								echo sprintf('<li class="font-bold font-head">%1$s</li>', $author_desigs);
							} ?>
							<?php if (!empty($author_title)) {
								echo sprintf('<li class="text-lg">%1$s</li>', $author_title);
							} ?>
							<?php if ( $author_org != 'BeachFleischman' ) {
								echo sprintf('<li><strong class="text-lg">%1$s</strong></li>', $author_org);
							} ?>
						</ul>
						<div class="w-12 h-2 mt-2 mb-4 rounded-tl-md rounded-br-md bg-brand-gray-dark"></div>

						<?php if ( $author_dept_value ) {
							ll_people_show_dept_list( $author_dept_value );
						} ?>

					</div>
				</div>
				<div class="pt-4 mt-4 text-center border-t sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-neutral-300 sm:border-t-0 sm:mt-0 sm:text-left">
					<?php /* User description or fallback */ ?>
					<?php if (!empty($author_desc)) {
						echo '<p class="mb-4 text-lg leading-relaxed">' . esc_html($author_desc) . '</p>';
					} else {
						echo '<p class="mb-4 text-lg leading-relaxed">' . esc_html($author_desc_fb) . '</p>';
					}
					?>
					<?php if (!empty($author_url)) {
						echo '<p class="text-right"><a class="inline-flex items-center text-brand-red-dark hover:text-brand-red" href="' . esc_attr($author_url) . '">Learn More <svg class="w-4 h-4 ml-1" aria-hidden="true"><use xlink:href="#arrow-right" /></svg></a></p>';
					} ?>
					<?php /* Featured industry experience */ ?>
					<?php if ($author_industries) : ?>
						<h6 class="mt-4 mb-1 text-base font-bold text-brand-blue"><?php esc_html_e('Industry Experience', 'rttheme18'); ?></h6>
						<p class="inline-flex items-start gap-1">
						<?php foreach ($author_industries as $industry) :
							$permalink 	= get_permalink( $industry->ID );
							$title 		= get_the_title( $industry->ID );
							$icon 		= get_field( 'icon', $industry->ID );
						?>
							<a class="inline-flex items-center gap-2 px-4 py-2 rounded-full group bg-neutral-100 hover:bg-brand-blue-faint" href="<?php echo esc_url($permalink); ?>">
								<i class="<?php echo $icon; ?> text-neutral-500 group-hover:text-brand-red-pale"></i>
								<span class="text-sm text-neutral-900 group-hover:text-brand-red-dark"> <?php echo esc_html($title); ?> </span>
							</a>
						<?php endforeach; ?>
						</p>
					<?php endif; ?>
					<?php /* Featured services */ ?>
					<?php if ($author_services) : ?>
						<h6 class="mt-4 mb-1 text-base font-bold text-brand-blue"><?php esc_html_e('Related Services', 'rttheme18'); ?></h6>
						<p class="inline-flex items-start gap-1">
						<?php foreach ($author_services as $service) :
							$permalink 	= get_permalink($service->ID);
							$title 		= get_the_title($service->ID);
						?>
							<a class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-neutral-100 text-neutral-900 hover:bg-brand-blue-faint hover:text-brand-blue-dark" href="<?php echo esc_url($permalink); ?>">
								<span class="text-sm "> <?php echo esc_html($title); ?> </span>
							</a>
						<?php endforeach; ?>
						</p>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>

	<div class="px-1 py-2 md:container md:mx-auto md:px-0">

		<?php if (function_exists('bcn_display') && !is_front_page()) { ?>
			<div class="breadcrumbs | font-head my-4 md:my-6" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<?php if (have_posts()) : ?>

			<div class="grid grid-cols-1 gap-8 -mx-4 md:grid-cols-2 lg:grid-cols-4">
				<?php /* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
					get_template_part('template-parts/content/content', 'card');

				endwhile;
				?>
			</div>
		<?php
			// the_posts_navigation();
			ll_paging_nav();

		else :

			get_template_part('template-parts/content/content', 'none');

		endif;
		?>

	</div>
</main><!-- #main -->

<?php
get_footer();
