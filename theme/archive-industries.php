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

	<main id="primary" class="page-industries | ">

		<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
			<div class="px-1 md:container md:mx-auto md:px-0">

				<header class="hidden">
					<?php the_title( '<h1 class="entry-title | ">', '</h1>' ); ?>
				</header>

				<section class="py-4 mb-4 full-bleed bg-brand-blue-faint md:py-8 2xl:py-12">
					<div class="px-1 md:px-0 md:container md:mx-auto md:flex md:space-x-4">
						<div class="w-full md:w-1/3 lg:1/4">
							<h2 class="entry-title | text-brand-blue font-light ">Industry Expertise</h2>
							<p class="my-4">We work collaboratively with your business to take it to the next level. Whether you want to bring your dreams to fruition, solve problems, or get needed support when the stakes are the highest, we work with you to navigate change and prepare your organization for the future.</p>
							<div class="wp-block-buttons | text-center my-4">
								<div class="wp-block-button is-style-outline">
									<a class="wp-block-button__link has-brand-red-color has-text-color">Send us a request for proposal</a>
								</div>
							</div>
						</div>
						<div class="w-full mt-8 md:mt-0 md:w-2/3 lg:3/4">
							<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label text-brand-blue" layout="li-fa-large-circle" /]' ); ?>
						</div>
					</div>
				</section>

				<?php if ( function_exists( 'bcn_display' ) && !is_front_page() ) { ?>
					<div class="breadcrumbs | font-head text-neutral-500 py-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
				<?php } ?>

				<div class="entry-content">
					<h3>Shortcode tests</h3>
					<h4>Inline, comma-separated list</h4>
					<p>Risus nec feugiat in fermentum posuere urna. Our areas of expertise include: <?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" posts_per_page="-1" order="ASC" include_link="false" wrapper="span" /]' ); ?>. Arcu dictum varius duis at consectetur lorem. Sapien faucibus et molestie ac feugiat sed lectus vestibulum. Dictumst quisque sagittis purus sit amet volutpat consequat mauris. Quam quisque id diam vel. Sed arcu non odio euismod lacinia at quis risus. Ultricies mi quis hendrerit dolor magna eget est lorem ipsum. Faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Posuere urna nec tincidunt praesent.</p>
					<p>Risus nec feugiat in fermentum posuere urna. Our areas of expertise include: <?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" posts_per_page="-1" order="ASC" wrapper="span" /]' ); ?>. Arcu dictum varius duis at consectetur lorem. Sapien faucibus et molestie ac feugiat sed lectus vestibulum. Dictumst quisque sagittis purus sit amet volutpat consequat mauris. Quam quisque id diam vel. Sed arcu non odio euismod lacinia at quis risus. Ultricies mi quis hendrerit dolor magna eget est lorem ipsum. Faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Posuere urna nec tincidunt praesent.</p>
					<hr>
					<h4>Ordered List, alpha sort</h4>
					<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ol" wrapper_class="" /]' ); ?>
					<hr>
					<h4>Unordered List, alpha sort</h4>
					<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="" /]' ); ?>
					<hr>
					<h4>Unordered List, with FA icons</h4>
					<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="not-prose list-none pl-1" layout="li-fa" /]' ); ?>
					<hr>
					<h4>Split Circle List, with FA icons</h4>
					<div class="not-prose">
					<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="is-style-split-circle-blue" layout="li-fa-icon-only" /]' ); ?>

					<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="is-style-circle" layout="li-fa-icon-only" /]' ); ?>
					</div>
					<hr>
					<h4>Cards</h4>
					<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="div" wrapper_class="flex flex-wrap -m-4 " layout="card-simple" /]' ); ?>
					<hr>
					<h4>Icon Grid</h4>
					<div class="not-prose min-w-[300px] mb-8 md:max-w-[1000px] md:mx-auto bg-brand-blue-faint text-brand-blue-dark px-8 py-4 md:py-8 papercorners-36">
						<div class="">
							<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label " layout="li-fa-large" /]' ); ?>
						</div>
					</div>
					<hr>
					<div class="gap-8 mb-8 md:divide-x md:divide-neutral-400 md:divide-dashed md:grid md:grid-cols-2 not-prose">
						<div class="">
							<h4 class="text-5xl">Filler</h4>
							<p>Lorem filler text bingo.</p>
							<p>Even more lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nibh mauris cursus mattis molestie. In fermentum et sollicitudin ac orci phasellus egestas. Diam donec adipiscing tristique risus nec feugiat. Purus faucibus ornare suspendisse sed nisi lacus sed viverra tellus. Fringilla urna porttitor rhoncus dolor purus non.</p>
						</div>
						<div class="">
							<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label " layout="li-fa-large-circle" /]' ); ?>
						</div>
					</div>
					<div class="py-8">
						<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label text-brand-blue" layout="li-fa-large-circle" /]' ); ?>
					</div>
					<hr>
					<h4>Featured Image Grid?</h4>
					<p></p>
					<hr>
				</div>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
