<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<header id="masthead" class="bg-white print:bg-white print:shadow-none sticky top-0 z-[39] ">
	<div class="flex items-center justify-between px-1 py-3 mx-auto md:container md:px-0 xlg:px-8 ">
		<div class="text-center sm:text-left">
			<div class="w-[240px] lg:w-[320px]">
				<a href="<?php bloginfo('url'); ?>" title="<?php echo bloginfo('name'); ?>">
					<?php get_template_part('template-parts/svg/svg', 'logonewbrandsimple'); ?>
				</a>
			</div>
		</div>

		<!--
			Inspired by: https://www.tailwindtoolbox.com/components/megamenu
		-->
		<ul class="nav-primary | hidden md:flex print:hidden">
			<li class="hoverable | hover:bg-white">
				<a href="/blog/" class="relative block px-3 py-4 text-sm font-bold font-head lg:text-base lg:p-6 hover:text-brand-blue">A-Z Blog</a>
				<div class="z-40 mb-16 bg-white border-t border-solid shadow-xl border-brand-blue mega-menu sm:mb-0">
					<div class="container grid grid-flow-col mx-auto auto-cols-fr">

						<div class="p-4 lg:p-8">
							<h6 class="mb-2">Latest</h6>
							<?php echo do_shortcode( '[display-posts posts_per_page="1" ignore_sticky_posts="true" wrapper="div" wrapper_class="derp -mx-4 " layout="card-single" /]' ); ?>
						</div>

						<div class="p-4 lg:p-8">
							<h6 class="mb-2 text-brand-blue">Other Recent Posts</h6>
							<?php echo do_shortcode( '[display-posts offset="1" posts_per_page="5" ignore_sticky_posts="true" wrapper="ul" wrapper_class="other-recent-posts | space-y-6" /]' ); ?>
						</div>

						<div class="p-4 lg:p-8">
							<h6 class="mb-2 text-brand-blue">Categories</h6>
							<ul class="text-base ">
								<?php
								wp_list_categories( array(
									'orderby'		=> 'name',
									'depth'			=> 1,
									'show_count'	=> false,
									'exclude'		=> array( 7 ),
									'title_li' 		=> '',
								) );
								?>
							</ul>
						</div>

					</div>
				</div>
			</li>
			<li class="hoverable | group hover:bg-white">
				<a href="#" class="relative block px-3 py-4 text-sm font-bold font-head lg:text-base lg:p-6 hover:text-brand-blue">Services</a>
				<div class="nav__panel--services | z-40 mb-16 border-t border-solid shadow-xl border-brand-blue mega-menu sm:mb-0">
					<div class="container grid grid-flow-col mx-auto auto-cols-fr">
						<div class="p-4 lg:p-8 bg-neutral-50">
							<h6 class="text-brand-red"><a href="/assurance/">Accounting &amp; Assurance</a></h6>
							<?php echo do_shortcode( '[display-posts post_type="page" orderby="title" order="ASC" post_parent="2311" /]' ); ?>
						</div>
						<div class="p-4 bg-white lg:p-8">
							<h6 class="text-brand-red"><a href="/tax/">Tax</a></h6>
							<?php echo do_shortcode( '[display-posts post_type="page" orderby="title" order="ASC" post_parent="2313" /]' ); ?>
						</div>
						<div class="p-4 lg:p-8 bg-neutral-50 ">
							<h6 class="text-brand-red"><a href="/consulting/">Consulting</a></h6>
							<?php echo do_shortcode( '[display-posts post_type="page" orderby="title" order="ASC" post_parent="2315" /]' ); ?>
						</div>
						<div class="hidden p-4 lg:block bg-neutral-700 lg:p-8 ">
							<p class="todo">Featured Service of the Month? Could be:</p>
							<ul class="list-inside todo list-square">
								<li>ERC</li>
								<li>Compiled Financial Statements</li>
								<li>Cost Segregation</li>
								<li>etc.</li>
							</ul>

						</div>
					</div>
				</div>
			</li>
			<li class="hoverable | group hover:bg-white">
				<a href="/industries/" class="relative block px-3 py-4 text-sm font-bold font-head lg:text-base lg:p-6 hover:text-brand-blue">Industries</a>
				<div class="z-40 py-4 mb-16 bg-white border-t border-solid shadow-xl border-brand-blue mega-menu lg:py-6 sm:mb-0">
					<div class="container mx-auto mb-4 lg:mb-8">
						<h6 class="text-center text-brand-blue">Our Industry Expertise</h6>
					</div>
					<div class="container flex flex-wrap mx-auto place-content-center">

						<?php echo do_shortcode( '[display-posts post_type="industries" post_parent="0" orderby="title" order="ASC" posts_per_page="-1" wrapper="ul" wrapper_class="icon-flexgrid--w-label text-brand-blue-dark" layout="li-fa-large-circle" /]' ); ?>
					</div>
				</div>
			</li>
			<li class="hoverable | group hover:bg-white">
				<a href="/about/" class="relative block px-3 py-4 text-sm font-bold font-head lg:text-base lg:p-6 hover:text-brand-blue">About Us</a>
				<div class="z-40 mb-16 bg-white border-t border-solid shadow-xl border-brand-blue mega-menu sm:mb-0">
				<div class="container grid grid-flow-col mx-auto auto-cols-fr">
						<div class="p-4 lg:p-8">
							<ul>
								<li><a href="">Mission, Vision, and Core Values</a></li>
								<li><a href="">Culture</a></li>
								<li><a href="">Our People</a></li>
								<li><a href="">Community Involvement</a></li>
								<li><a href="">Trade and Professional Involvement</a></li>
								<li><a href="">Women RISE</a></li>
								<li><a href="">Leading Edge Alliance</a></li>
							</ul>
						</div>
						<div class="p-4 lg:p-8 bg-brand-blue-dark text-brand-blue-faint">
							<h2 class="leading-loose ">We passionately believe in the power of collaboration and what it can accomplish.</h2>
						</div>
						<div class="p-4 lg:p-8 bg-brand-blue-dark text-brand-blue-faint">
							<img class="mx-auto" src="https://res.cloudinary.com/beachfleischman/image/upload/f_auto/v1542220717/ArizonasLargest_2x_r1y0cr.png" alt="One of Arizona's largest locally-owned public accounting firms">
						</div>
					</div>
				</div>
			</li>
			<li class="hoverable | group hover:bg-white">
				<a href="/careers/" class="relative block px-3 py-4 text-sm font-bold font-head lg:text-base lg:p-6 hover:text-brand-blue">Careers</a>
				<div class="z-40 mb-16 bg-white border-t border-solid shadow-xl border-brand-blue mega-menu sm:mb-0">
					<div class="container grid grid-flow-col mx-auto auto-cols-fr">
						<div class="p-4 lg:p-8 sm:break-inside-avoid bg-gradient-to-r from-white to-brand-blue-pale">
							<blockquote class="p-6 shadow bg-neutral-50 rounded-xl">
								<p class="leading-relaxed text-neutral-700">I love the benefits, health care, vision, dental &ndash; including orthodontics, 401(k), profit-sharing, disability, dry cleaning pick-up, gym memberships, cell phone reimbursements&hellip;and there's even a service that will come and take care of my kids in an emergency.</p>
							</blockquote>
							<div class="flex items-center gap-4 mt-4">
								<img
									src="https://www.hyperui.dev/photos/woman-1.jpeg"
									class="object-cover w-12 h-12 bg-pink-500 rounded-full"
									alt=""
								/>
								<div class="text-sm">
									<p class="font-bold">Tori Meyer</p>
									<p class="mt-1">Senior A&amp;A Manager</p>
								</div>
							</div>
						</div>
						<div class="p-4 lg:p-8 bg-brand-blue-pale text-brand-blue-dark">
							<ul>
								<li><a href="">Internships</a></li>
								<li><a href="">Recent College Graduates</a></li>
								<li><a href="">Experienced Professionals</a></li>
							</ul>
						</div>
						<div class="p-4 lg:p-8 bg-brand-blue text-brand-blue-faint">
							<ul>
								<li class="font-bold"><a href="">Current Openings</a></li>
								<li><a href="">Professional Development/Training</a></li>
								<li><a href="">Benefits</a></li>
								<li><a href="">Staff Testimonials</a></li>
							</ul>
						</div>
					</div>
				</div>
			</li>
			<li class="hoverable | group hover:bg-white">
				<a href="/client-center/" class="relative block px-3 py-4 text-sm font-bold font-head lg:text-base lg:p-6 hover:text-brand-blue">Client Center</a>
			</li>
		</ul>

		<ul class="flex print:hidden">
			<li class="toggleable | group hover:bg-white ">
        		<input type="checkbox" value="selected" id="toggle-search" class="toggle-input peer">
          		<label for="toggle-search" class="block px-6 py-4 text-sm font-bold cursor-pointer lg:text-base lg:py-6 hover:text-brand-blue peer-checked:text-brand-blue peer-checked:bg-white">
					<i class="fa-solid fa-magnifying-glass"></i>
				</label>
          		<div role="toggle" class="z-40 py-2 mb-16 border-t border-solid shadow-xl md:py-4 border-brand-blue mega-menu lg:py-6 sm:mb-0 bg-brand-blue-dark ">
            		<div class="container px-2 mx-auto text-white md:px-0">
						<?php get_search_form(); ?>
					</div>
		  		</div>
			</li>
		</ul>

	</div>
</header>
