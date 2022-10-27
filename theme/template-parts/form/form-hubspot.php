<?php
if ( ( empty( get_field( 'll_normal_contact_form_location' ) ) ) || ( get_field( 'll_normal_contact_form_location' ) != false ) ) {
?>

	<a href="#contact" class="fixed flex justify-center w-12 h-12 transition duration-300 rounded-full shadow-md cursor-pointer text-neutral-300 shadow-brand-gray-dark/50 right-4 bottom-4 bg-brand-blue active:bg-brand-red-pale ease place-items-center hover:text-white print:hidden" title="Contact Us">
		<i class="fas fa-envelope"></i>
	</a>
	<!-- motion-safe:animate-bounce -->

	<footer class="p-4 my-4 bg-white md:p-8 lg:my-8 lg:p-16 print:hidden" id="contact">
		<h4 class="mb-4 text-brand-blue-dark">Contact Us</h4>
		<?php
		if ( is_category( 'construction' ) ) { ?>
			<!-- <script>
				hbspt.forms.create({
					region: "na1",
					portalId: "5578910",
					formId: "f0c0da7a-7a4a-4de3-98c3-167a4c726d76"
				});
			</script> -->
		<?php } else { ?>
			<!-- "Contact Us Short (no styles... but with styles turned back on)" -->
			<script>
				hbspt.forms.create({
					region: "na1",
					portalId: "5578910",
					formId: "c8675641-3e68-4ff7-9dc3-ae3636fbf1c8",
				});
			</script>
		<?php } ?>
	</footer>
	<?php
}
?>
