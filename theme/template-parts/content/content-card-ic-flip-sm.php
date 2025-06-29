<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

$title                          = get_the_title();
$title_is_long                  = ( ( iconv_strlen( get_the_title(), 'UTF-8' ) > 30 ) ? 'text-lg' : '' );
$icon                           = get_field( 'll_page_icon' );
$message                        = get_field( 'll_brand_message', $post->ID );
$feat_image_url                 = wp_get_attachment_image_src( get_post_thumbnail_id(), ['675', '220'] );

?>

<li class="card-<?php echo $icon; ?>">
	<div class="card card-ic card-ic-flip  |  group relative inline-block float-left">
		<div class="card-content  |  absolute w-full h-full rounded-lg shadow-lg shadow-neutral-300 transition-transform ease-out duration-700  |  dark:shadow-none">

			<div class="card-front  |  text-center absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 [backface-visibility:hidden]">

				<?php if ( $icon ) : ?>
					<div class="card-icon">
						<span class="fa-stack fa-2x">
							<i class="text-white fa-solid fa-circle fa-stack-2x  |  dark:text-neutral-900"></i>
							<i class="fa-duotone <?php echo $icon; ?> fa-stack-1x "></i>
						</span>
					</div>
				<?php endif; ?>

				<h3 class="mt-2 font-light leading-none text-current text-xl <?php // echo $title_is_long; ?>">
					<?php echo $title; ?>
				</h3>
			</div>

			<div
				class="card-back  |  absolute w-full h-full flex flex-col items-center justify-center rounded-lg px-4 bg-no-repeat bg-cover bg-blend-overlay shadow-neutral-900/50"
				style="background-image: url('<?php echo $feat_image_url[0]; ?>')"
			>
				<h3 class="text-xl my-2 leading-none tracking-wide text-center text-current uppercase text-shadow">
					<a
						class=""
						href="<?php echo esc_url( get_permalink() ); ?>"
						rel="bookmark"
					>
						<?php echo $title; ?>
					</a>
				</h3>
				<p class="text-center text-pretty text-shadow">
					<?php echo $message['label']; ?>
				</p>
			</div>

		</div>
	</div>
</li>
