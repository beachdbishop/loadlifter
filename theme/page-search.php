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

<main id="primary" class="bg-white dark:bg-neutral-900">
	<?php
	while (have_posts()) :
		the_post();
		// $gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
	    ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('py-4 md:py-6 lg:py-8'); ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if (function_exists('bcn_display')) { ?>
					<div class="breadcrumbs | font-head text-neutral-600 pb-4 md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>
				<header>
					<?php the_title('<h1 class="entry-title | dark:text-neutral-200">', '</h1>'); ?>
				</header>
				<div class="entry-content">

                    <?php get_search_form(); ?>

                    <div class="w-[10px] bg-transparent h-[64px]">&nbsp;</div>

                    <?php the_content(); ?>

				</div>
				<?php // get_template_part( 'template-parts/form/form', 'hubspot' );
				?>
			</div>
		</article>

    <?php endwhile; ?>

</main><!-- #main -->
<?php
get_footer();
