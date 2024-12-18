<?php
/**
 * The template for displaying Category archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

 if ( is_archive() ) {
		$cat = get_category( get_query_var( 'cat' ) );
		$cat_id = $cat->term_id;
		$cat_title = $cat->name;
		$cat_description = $cat->description ? $cat->description : "Review our comprehensive {$cat_title} archive which covers a variety of topics including accounting, audit, and tax issues.";

		$rel_industry               = get_field( 'cat_featured_industry', 'category_' . $cat_id );
		$rel_services               = get_field( 'cat_featured_services', 'category_' . $cat_id );
}

get_header();
?>

<main id="primary" class="py-4 bg-white dark:bg-neutral-900 md:py-6 lg:py-8">
	<div class="px-2 md:container lg:px-[16px] ">
		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs  |  font-head text-neutral-600 pb-4  | md:pb-6 lg:pb-8 dark:text-neutral-400" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<?php if ( have_posts() ) : ?>

			<header class="mb-2">
				<?php the_archive_title( '<h2 class="mb-2 entry-title dark:text-neutral-200">', '</h2>' ); ?>
				<?php if ( get_the_archive_description() ) {
					the_archive_description( '<h3 class="">', '</h3>' );
				} ?>
			</header>

			<div class="mt-4 ll-page-grid md:gap-8 md:mt-8 md:grid md:auto-rows-auto lg:mt-16 lg:gap-16">

				<div class="ll-page-grid-area-a">
					<?php // <div class="grid grid-cols-1 gap-8 -mx-4 md:grid-cols-2 lg:grid-cols-3"> ?>
					<ul class="cards-ic grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
							<?php /* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content/content', 'card-ic' );

							endwhile;
							?>
					<?php // </div> ?>
					</ul>

					<div class="mt-8">
						<?php // ll_paging_nav();
						if ( function_exists( 'wpgb_render_facet' ) ) {
							wpgb_render_facet( ['id' => 11, 'grid' => 'wpgb-content' ] );
						} ?>
					</div>
				</div>

				<div class="ll-page-grid-area-b">
						<?php // BBB ?>
				</div>

				<div class="ll-page-grid-area-c">
					<?php if ( ( $rel_industry ) || ( $rel_services ) ) {
							echo '<div class="p-4 my-8 border lg:my-0 lg:p-8 border-neutral-400">';
					}

					if ( $rel_industry ): ?>

						<h3 class="font-normal text-brand-blue"><?php echo ( ( ll_is_plural( $rel_industry ) ) ? 'Related Industries' : 'Related Industry' ); ?></h3>
						<ul class="cat-industries | list-none fa-ul mt-4 mb-8" style="--fa-li-margin: 2em">
						<?php foreach ( $rel_industry as $ind ) {
							$ind_permalink = get_permalink( $ind->ID );
							$ind_title = get_the_title( $ind->ID );
							$ind_icon = get_field( 'll_page_icon', $ind->ID );
							?>
							<li class="mb-2">
								<span class="!mt-0 fa-li text-brand-red">
									<i class="fa-regular <?php echo $ind_icon; ?>"></i>
								</span>
								<a class="underline decoration-neutral-400 hover:underline hover:decoration-brand-red" href="<?php echo esc_url( $ind_permalink ); ?>"><?php echo esc_html( $ind_title ); ?></a>
							</li>
						<?php } ?>
						</ul><?php
					endif;
					?>

					<?php
					if ( $rel_services ): ?>
						<h3 class="font-normal text-brand-blue"><?php echo ( ( ll_is_plural( $rel_services ) ) ? 'Related Services' : 'Related Service' ); ?></h3>
						<ul class="cat-services | list-none fa-ul mt-4 mb-8" style="--fa-li-margin: 2em">
						<?php foreach ( $rel_services as $svc ) {
							$svc_permalink = get_permalink( $svc->ID );
							$svc_title = get_the_title( $svc->ID );
							?>
							<li class="mb-2">
								<span class="!mt-0 fa-li text-neutral-500">
									<i class="fa-regular fa-memo-circle-info"></i>
								</span>
								<a class="underline decoration-neutral-400 hover:underline hover:decoration-brand-blue" href="<?php echo esc_url( $svc_permalink ); ?>"><?php echo esc_html( $svc_title ); ?></a>
							</li>
						<?php } ?>
						</ul><?php
					endif;

					if ( ( $rel_industry ) || ( $rel_services ) ) {
						echo '</div>';
					}
					?>

					<?php // get_template_part( 'template-parts/form/form', 'webshare' ); ?>
				</div>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>

	</div>
</main>

<?php
get_footer();
