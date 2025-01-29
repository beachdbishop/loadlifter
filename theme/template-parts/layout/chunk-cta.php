<?php
/*
 * This is the template part for the CTA section.
 *
 * @package: Load_Lifter
 * @since 2.16.4
 *
 */

// Set defaults.
$args = wp_parse_args(
	$args,
	[
		'class'	=> '',
		'part_data' => [
			'cta_heading' => 'Partner with our team',
			'cta_body' => 'We are here to help. Contact us for more information or to schedule a consultation.',
			'cta_button_text' => 'Contact Us',
			'cta_button_url' => '#contact',
		]
	]
);
?>

<section class="<?php echo esc_attr( $args['class'] ); ?> cta | full-bleed ll-equal-vert-padding not-prose bg-orient-800 text-neutral-50 break-inside-avoid print:hidden">

	<svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden h-[100vh] border-0 shadow-none max-w-none max-h-none object-cover absolute top-0 right-0 bottom-0 left-0 z-0  |  md:block motion-safe:md:animate-move-bg print:hidden">
		<defs>
			<linearGradient id="blue" gradientTransform="rotate(10)">
				<stop offset="50%" stop-color="rgb(9 47 66 / 1)" />
				<stop offset="80%" stop-color="rgb(0 102 142 / 1)" />
			</linearGradient>
		</defs>
		<rect x="0" y="0" width="400" height="400" fill="url(#blue)" />
	</svg>

	<div class="px-2 z-10  |  lg:px-[16px]">
		<div class="flex flex-col items-start gap-8  |  sm:flex-row sm:items-center lg:gap-24">

			<div class="prose grow  |  lg:prose-xl ">
				<h2 class="mb-2 text-orient-200 text-shadow shadow-orient-950  |  print:text-shadow-none">
					<?php echo esc_html( $args['part_data']['cta_heading'] ); ?>
				</h2>
				<?php if ( $args['part_data']['cta_body'] ) :
					echo '<p class="text-neutral-100 text-shadow shadow-orient-950  |  print:text-shadow-none">' . esc_html( $args['part_data']['cta_body'] ) . '</p>';
				endif; ?>
				<p class="hidden  |  print:mt-8 print:block">Email info@beachfleischman.com</p>
			</div>

			<div class="w-full  |  md:max-w-fit">
				<a href="<?php echo esc_html( $args['part_data']['cta_button_url'] ); ?>" class="px-5 py-4 font-head font-semibold border-2 border-orient-950 bg-orient-950 rounded-lg text-orient-200  |  hover:text-white hover:border-orient-200">
				<?php echo $args['part_data']['cta_button_text']; ?>
				</a>
			</div>

		</div>
	</div>
</section>
