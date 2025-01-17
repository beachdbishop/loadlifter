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
if (!empty($author_department)) {
		$author_dept_value = $author_department['value'];
}
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

if ( $author_org === 'BeachFleischman' ) {
	$peep_class = 'internal';
} else {
	$peep_class = 'external';
}
?>

<main id="primary" class="bg-white  |  dark:bg-neutral-900">

	<div class="px-2 container  |  lg:px-[16px]">
		<?php get_template_part( 'template-parts/layout/chunk', 'breadcrumbs' ); ?>

		<div class="peepgrid peep-<?php echo $peep_class; ?>  |  md:grid md:grid-cols-3 gap-4 lg:grid-cols-4 lg:gap-16">

			<div class="peepgrid-a  |  pb-8 md:pt-2 md:pb-0 md:order-2">
				<?php if ( $author_thumbnail ) { ?>
					<div class="headshot  |  max-w-[380px] mb-2 md:mb-4 bg-brand-red-faint bg-cover" style="background-image: url('<?php echo esc_url($url) ?>');" aria-label="<?php echo esc_attr($alt); ?>" role="img">
						<div class="aspect-headshot">&nbsp;</div>
					</div>
				<?php } ?>
			</div>

			<div class="peepgrid-b  |  md:col-span-2 md:row-span-2 md:order-1 lg:col-span-3">
				<header class="mb-4">
					<h1 class="entry-title  |  mb-0 text-orient-800  |  dark:text-orient-400">Articles by <span class="text-brand-red font-semibold"><?php echo $author_name; ?></span></h1>
					<?php if (!empty($author_desigs)) {
						echo sprintf('<h2 class="leading-normal tracking-tight text-neutral-500">%1$s</h2>', $author_desigs);
					} ?>
					<?php if (!empty($author_title)) {
						echo sprintf('<h2 class="text-neutral-900  |  dark:text-neutral-200">%1$s</h2>', $author_title);
					} ?>

				<?php if ( $peep_class === 'internal' ) { ?>
					<?php if ( $author_dept_value ) {
						echo '<div class="py-4 my-4 text-neutral-500">';
						ll_people_show_dept_list( $author_dept_value );
						echo '</div>';
					} ?>
				<?php } else { ?>
					<?php if ( $author_org != 'BeachFleischman' ) {
						echo sprintf('<h3><strong class="">%1$s</strong></h3>', $author_org);
					} ?>
				<?php } ?>
				</header>

				<?php /* User description or fallback */ ?>
				<div class="mb-4 prose  |  dark:text-neutral-300 lg:prose-xl lg:mb-8">
				<?php if (!empty($author_desc)) {
					echo '<p>' . $author_desc . '</p>';
				} else {
					echo '<p>' . $author_desc_fb . '</p>';
				}
				?>
				<?php if ( (!empty($author_url)) && ( $peep_class === 'internal' ) ) {
					echo '<p class="text-right">
						<a class="inline-flex items-center text-brand-red-dark  |  hover:text-brand-red dark:text-brand-red dark:hover:text-brand-pale" href="' . esc_attr($author_url) . '">Read more about ' . esc_html($author_name) . ' <i class="ml-1 fa-regular fa-arrow-right"></i></a>
					</p>';
				} ?>
				</div>

				<?php if (have_posts()) : ?>

					<ul class="grid grid-cols-1 gap-4  |  lg:grid-cols-3 lg:gap-8">
						<?php /* Start the Loop */
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content/content', 'card-ic');

						endwhile;
						?>
					</ul>

					<div class="mt-8">
						<?php // ll_paging_nav();
						if ( function_exists( 'wpgb_render_facet' ) ) {
							wpgb_render_facet( ['id' => 11, 'grid' => 'wpgb-content' ] );
						} ?>
					</div>

					<?php

				else :

					get_template_part('template-parts/content/content', 'none');

				endif; ?>
			</div>

			<aside class="peepgrid-c  |  md:mt-0 md:order-3">
				<?php /* Featured industry experience */ ?>
				<?php if ($author_industries) : ?>
					<h3 class="font-normal text-brand-blue dark:text-orient-600"><?php esc_html_e('Industry Experience', 'rttheme18'); ?></h3>
					<ul class="mt-4 mb-8 list-none fa-ul" style="--fa-li-margin: 2em">
					<?php foreach ($author_industries as $ind ) :
						$ind_permalink = get_permalink( $ind->ID );
						$ind_title = get_the_title( $ind->ID );
						$ind_icon = get_field( 'll_page_icon', $ind->ID );
					?>
						<li class="mb-2">
							<span class="!mt-0 fa-li text-brand-red">
								<i class="fa-regular <?php echo $ind_icon; ?>"></i>
							</span>
							<a class="underline decoration-neutral-400  |  hover:underline hover:decoration-brand-red" href="<?php echo esc_url( $ind_permalink ); ?>"><?php echo esc_html( $ind_title ); ?></a>
						</li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
				<?php /* Featured services */ ?>
				<?php if ($author_services) : ?>
					<h3 class="font-normal text-brand-blue"><?php esc_html_e('Related Services', 'rttheme18'); ?></h3>
					<ul class="mt-4 mb-8 list-none fa-ul" style="--fa-li-margin: 2em">
					<?php foreach ($author_services as $svc) :
						$svc_permalink = get_permalink( $svc->ID );
						$svc_title = get_the_title( $svc->ID );
					?>
						<li class="mb-2">
							<span class="!mt-0 fa-li text-neutral-500">
								<i class="fa-regular fa-memo-circle-info"></i>
							</span>
							<a class="underline decoration-neutral-400  |  hover:underline hover:decoration-brand-blue" href="<?php echo esc_url( $svc_permalink ); ?>"><?php echo esc_html( $svc_title ); ?></a>
						</li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</aside>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
