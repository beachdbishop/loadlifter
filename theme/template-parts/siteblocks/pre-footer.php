<?php
/**
 * Pre-Footer
 */
?>

<?php // if ( ll_is_local_environment() ) { ?>
<?php if ( in_array( get_post_type(), [] ) ) { ?>
<section class="full-bleed p-8  |  lg:p-16">
	<div class="entry-content px-2  |  lg:px-4">
		<h3 class="wp-block-heading">Our awards and recognition</h3>
		<?php block_template_part( 'img-grid-awards' ); ?>
	</div>
</section>
<?php } ?>
