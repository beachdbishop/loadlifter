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

<main id="primary" class="">
	<div class="py-4 md:py-6 lg:py-8 print:py-8">
		<div class="container md:mx-auto">
			<?php if (function_exists('bcn_display') && !is_front_page()) { ?>
				<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
			<?php } ?>

			<div class="peepgrid peep-<?php echo $peep_class; ?> | md:grid md:grid-cols-3 gap-4 lg:grid-cols-4 lg:gap-16">

				<div class="peepgrid-a | pb-8 md:pt-2 md:pb-0 md:order-2">
				<?php if ( $author_thumbnail ) { ?>
                    <div class="headshot | max-w-[380px] mb-2 md:mb-4 bg-brand-red-faint bg-cover" style="background-image: url('<?php echo esc_url($url) ?>');" aria-label="<?php echo esc_attr($alt); ?>">
						<div class="aspect-headshot">&nbsp;</div>
					</div>
                <?php } ?>
				</div>

				<div class="peepgrid-b | md:col-span-2 md:row-span-2 md:order-1 lg:col-span-3">
                    <header class="mb-4">
                        <h1 class="entry-title | mb-0 text-brand-blue">Articles by <span class="text-brand-red"><?php echo $author_name; ?></span></h1>
                        <?php if (!empty($author_desigs)) {
                            echo sprintf('<h2 class="leading-normal tracking-tight text-neutral-500">%1$s</h2>', $author_desigs);
                        } ?>
                        <?php if (!empty($author_title)) {
                            echo sprintf('<h2 class="text-neutral-900">%1$s</h2>', $author_title);
                        } ?>

                    <?php if ( $peep_class === 'internal' ) { ?>
                        <?php if ( $author_dept_value ) {
                            echo '<div class="py-4 my-4 text-neutral-400">';
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
                    <div class="mb-4 prose lg:prose-xl lg:mb-8">
					<?php if (!empty($author_desc)) {
						echo '<p>' . esc_html($author_desc) . '</p>';
					} else {
						echo '<p>' . esc_html($author_desc_fb) . '</p>';
					}
					?>
					<?php if ( (!empty($author_url)) && ( $peep_class === 'internal' ) ) {
						echo '<p class="text-right"><a class="inline-flex items-center text-brand-red-dark hover:text-brand-red" href="' . esc_attr($author_url) . '">Learn More <svg class="w-4 h-4 ml-1" aria-hidden="true"><use xlink:href="#arrow-right" /></svg></a></p>';
					} ?>
                    </div>

					<?php if (have_posts()) : ?>

						<div class="grid grid-cols-1 gap-8 -mx-4 md:grid-cols-2 lg:grid-cols-3">
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

					endif; ?>
				</div>

                <aside class="peepgrid-c | md:mt-0 md:order-3">
                    <?php /* Featured industry experience */ ?>
                    <?php if ($author_industries) : ?>
                        <h6 class="mt-4 mb-1 text-base font-bold text-brand-blue"><?php esc_html_e('Industry Experience', 'rttheme18'); ?></h6>
                        <p class="inline-flex flex-wrap items-start gap-1">
                        <?php foreach ($author_industries as $industry) :
                            $permalink 	= get_permalink( $industry->ID );
                            $title 		= get_the_title( $industry->ID );
                            $icon 		= get_field( 'll_page_icon', $industry->ID );
                        ?>
                            <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full group bg-neutral-100 hover:bg-brand-blue-dark" href="<?php echo esc_url($permalink); ?>">
                                <i class="fa-regular <?php echo $icon; ?> text-neutral-500 group-hover:text-brand-red-pale"></i>
                                <span class="text-sm text-neutral-900 group-hover:text-brand-gray-pale"> <?php echo esc_html($title); ?> </span>
                            </a>
                        <?php endforeach; ?>
                        </p>
                    <?php endif; ?>
                    <?php /* Featured services */ ?>
                    <?php if ($author_services) : ?>
                        <h6 class="mt-4 mb-1 text-base font-bold text-brand-blue"><?php esc_html_e('Related Services', 'rttheme18'); ?></h6>
                        <p class="inline-flex flex-wrap items-start gap-1">
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
                </aside>
			</div>

		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
