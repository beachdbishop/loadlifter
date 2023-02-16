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

$easedGradient = 'linear-gradient(
    to right,
    hsla(0, 0%, 0%, 0.97) 0%,
    hsla(210, 50%, 0.78%, 0.959) 8.1%,
    hsla(210, 66.67%, 2.35%, 0.928) 15.5%,
    hsla(206.25, 61.54%, 5.1%, 0.88) 22.5%,
    hsla(206.67, 62.79%, 8.43%, 0.817) 29%,
    hsla(207, 62.5%, 12.55%, 0.744) 35.3%,
    hsla(207.78, 61.36%, 17.25%, 0.664) 41.2%,
    hsla(207.43, 62.5%, 21.96%, 0.578) 47.1%,
    hsla(208.24, 62.04%, 26.86%, 0.492) 52.9%,
    hsla(207.92, 62.73%, 31.57%, 0.406) 58.8%,
    hsla(208.17, 62.16%, 36.27%, 0.326) 64.7%,
    hsla(208.13, 62.14%, 40.39%, 0.253) 71%,
    hsla(208.06, 62.33%, 43.73%, 0.19) 77.5%,
    hsla(207.76, 62.03%, 46.47%, 0.142) 84.5%,
    hsla(207.84, 62.45%, 48.04%, 0.111) 91.9%,
    hsla(207.87, 62.25%, 48.82%, 0.1) 100%
)';
$exampleImage = 'https://res.cloudinary.com/beachfleischman/image/upload/dpr_auto,f_auto/v1676492725/feat__careers-college-grads--social_jlh5qx.jpg';



get_header();
?>

<style>
    <?php // We're setting inline styles here because we need to include the responsive gradient AND dynamic image URL in the same background-image declaration;
    ?>.sg-gradient-img { background-image: <?php echo $easedGradient; ?>, url('<?php echo esc_url($exampleImage); ?>'); }
    .sg-gradient-img-blue { background-image: linear-gradient(to right, rgb(9 47 66 / 1) 0%, rgb(9 47 66 / .9) 45%, rgb(9 47 66 / .7) 60%, rgb(9 47 66 / .4) 75%, rgb(9 47 66 / 0) 90%, transparent 100%), url('<?php echo esc_url($exampleImage); ?>'); }
</style>

<!-- <main id="primary" class="bg-gradient-to-r from-white via-amber-50 to-amber-100"> -->
<main id="primary" class="bg-fixed bg-white bg-no-repeat bg-cover">
	<?php
	while (have_posts()) :
		the_post();
		$gradient = 'linear-gradient(to right, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.8) 30%, rgba(0,0,0,0.1) 70%, rgba(0,0,0,0) 100%)';
	?>
		<article id="post-<?php the_ID(); ?>" <?php if (!is_front_page()) {
													post_class('py-4 md:py-6 lg:py-8');
												} ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">
				<?php if (function_exists('bcn_display')) { ?>
					<div class="breadcrumbs | font-head text-neutral-700 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>
				<header>
					<?php the_title('<h1 class="entry-title | ">', '</h1>'); ?>
				</header>
				<div class="prose entry-content">
					<?php the_content(); ?>
					<div class="clear-both">&nbsp;</div>

                    <h3>Typography</h3>
                    <div>
                        <div class="grid max-w-xl grid-cols-2 gap-8 not-prose">
                            <div class="">
                                <p class="sample | font-head font-light text-5xl">Aa</p>
                                <p class="font-mono text-sm">Serenity Light</p>
                            </div>
                            <div class="">
                                <p class="sample | font-head font-bold text-5xl">Aa</p>
                                <p class="font-mono text-sm">Serenity Bold</p>
                            </div>
                            <div class="">
                                <p class="sample | font-body font-normal text-5xl">Aa</p>
                                <p class="font-mono text-sm">Work Sans Regular</p>
                            </div>
                            <div class="">
                                <p class="sample | font-body font-bold text-5xl">Aa</p>
                                <p class="font-mono text-sm">Work Sans Bold</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm font-bold uppercase text-brand-gray-pale">Samples:</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed repudiandae sit modi qui veniam at, voluptates officiis libero? Veniam dolore sequi dignissimos amet dolorem eaque iure fuga voluptate facere inventore. Esse deleniti sapiente eum architecto aspernatur asperiores tempore, repudiandae dicta aliquam quibusdam a numquam voluptate aperiam rerum!</p>
                    <p class="text-4xl font-head">Meteors created a sky-symphony of light.</p>
                    <p>&hellip;</p>
                    <hr>

                    <h3>Colors</h3>
                    <div class="grid grid-cols-4 gap-8 not-prose">
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-red-faint border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Red Faint</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-red-pale border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Red Pale</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-red border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Red</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-red-dark border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Red Dark</p>
                        </div>

                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-blue-faint border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Blue Faint</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-blue-pale border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Blue Pale</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-blue border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Blue</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-blue-dark border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Blue Dark</p>
                        </div>

                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-gray-faint border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Gray Faint</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-gray-pale border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Gray Pale</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-gray border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Gray</p>
                        </div>
                        <div class="sg-colorchip">
                            <div class="border st-color aspect-video bg-brand-gray-dark border-neutral-100">&nbsp;</div>
                            <p class="font-mono text-sm">Brand Gray Dark</p>
                        </div>
                    </div>
                    <hr>

                    <h3>Gradients</h3>
                    <section class="full-bleed not-prose">
                        <div class="container grid grid-cols-3 gap-8 ">
                            <div class="sg-gradient ">
                                <div class="border border-neutral-100 bg-center bg-no-repeat bg-cover sg-gradient-img aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Hero Gradient</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 bg-center bg-no-repeat bg-cover sg-gradient-img-blue aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Hero Gradient - Blue</p>
                            </div>
                            <div>&nbsp;</div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 has-red-gradient-background aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Gradient - Red</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 has-blue-gradient-background aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Gradient - Blue</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 has-gray-gradient-background aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Gradient - Gray</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 has-red-split-gradient-background aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Split Gradient - Red</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 has-blue-split-gradient-background aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Split Gradient - Blue</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 has-gray-split-gradient-background aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Split Gradient - gray</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 bg-gradient-to-t from-brand-red-faint via-white to-white aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Faint Gradient - Red</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 bg-gradient-to-t from-brand-blue-faint via-white to-white aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Faint Gradient - Blue</p>
                            </div>
                            <div class="sg-gradient">
                                <div class="border border-neutral-100 bg-gradient-to-t from-brand-gray-faint via-white to-white aspect-[3/1]">&nbsp;</div>
                                <p class="font-mono text-sm">Faint Gradient - gray</p>
                            </div>
                        </div>
                    </section>
                    <hr>


					<div class="wp-block-spacer">&nbsp;</div>

				</div>
				<?php // get_template_part( 'template-parts/form/form', 'hubspot' );
				?>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->
	<?php
	endwhile; // End of the loop.
	?>
</main><!-- #main -->
<?php
get_footer();
