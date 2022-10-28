<?php
/**
 * Event Card Template.
 *
 * @param	array $block The block settings and attributes.
 * @param	string $content The block inner HTML (empty).
 * @param	bool $is_preview True during backend preview render.
 * @param 	int $post_id The post ID the block is rendering content against.
 * 			This is either the post ID currently being displayed inside a
 * 			query loop, or the post ID of the post hosting this block.
 * @param	array $context The context provided to the block by the post or
 * 			its parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'lleventcard';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$event_name 			= get_field( 'll_event_name' );
$event_date				= get_field( 'll_event_date' );
$event_time				= get_field( 'll_event_time' );
$event_format			= get_field( 'll_event_format' );
$event_image			= get_field( 'll_event_image' );
$event_desc				= get_field( 'll_event_desc' );
$event_cta_url			= get_field( 'll_event_cta_url' );
$event_cta_label		= get_field( 'll_event_cta_label' );

if ( $class_name != 'lleventcard is-style-compact' ) { ?>
	<div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?> | mb-8 lg:mb-12 overflow-hidden bg-white rounded shadow-lg not-prose w-fit text-neutral-500 shadow-neutral-400">
		<?php if( !empty( $event_image ) ): ?>
			<figure><img src="<?php echo esc_url($event_image['url']); ?>" alt="<?php echo esc_attr($event_image['alt']); ?>" class="aspect-video" /></figure>
		<?php endif; ?>
		<div class="p-6">
			<header class="mb-4">
				<h3 class="mb-4 text-brand-blue-dark"><?php echo $event_name; ?></h3>
				<p class="leading-tight text-neutral-600"><?php echo $event_date; ?> | <?php echo $event_format; ?></p>
				<p class="leading-tight text-neutral-500"><?php echo $event_time; ?></p>
			</header>
			<p><?php echo $event_desc; ?></p>
		</div>
		<!-- <div class="flex justify-end p-6 pt-0">
			<a href="<?php // esc_url( $event_cta_url ); ?>" class="inline-flex items-center justify-center w-full h-10 gap-2 px-4 py-1 text-sm tracking-wide transition duration-300 rounded text-brand-blue-faint focus-visible:outline-none whitespace-nowrap bg-brand-blue-dark hover:text-white hover:bg-brand-blue focus:bg-brand-blue"><i class="fa-regular fa-calendar-circle-plus"></i><?php // echo $event_cta_label; ?></a>
		</div> -->
		<p class="text-center">
			<a href="<?php esc_url( $event_cta_url ); ?>" class="inline-block px-4 py-2 mb-4 border-2 border-solid rounded-lg lg:mb-8 font-body text-brand-blue hover:text-brand-blue-dark border-brand-blue hover:border-brand-blue-pale hover:bg-brand-blue-pale"><?php echo $event_cta_label; ?></a>
		</p>
	</div>
<?php } else { ?>
	<div <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?> | not-prose mb-8 lg:mb-10 overflow-hidden bg-white rounded shadow-md text-neutral-500 shadow-neutral-200 hover:shadow-neutral-400 group">
		<a href="<?php esc_url( $event_cta_url ); ?>">
			<?php if( !empty( $event_image ) ): ?>
				<figure><img src="<?php echo esc_url($event_image['url']); ?>" alt="<?php echo esc_attr($event_image['alt']); ?>" class="aspect-video" /></figure>
			<?php endif; ?>
			<div class="p-6">
				<header>
					<h4 class="text-neutral-600 group-hover:text-neutral-800"><?php echo $event_name; ?></h4>
					<p class="text-sm text-neutral-400 group-hover:text-neutral-800"><?php echo $event_date; ?> | <?php echo $event_format; ?></p>
				</header>
			</div>
		</a>
	</div>
<?php } ?>
