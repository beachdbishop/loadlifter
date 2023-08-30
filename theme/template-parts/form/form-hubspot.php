<?php
if ( get_field( 'll_normal_contact_form_location' ) !== false ) {

?>

	<a href="#contact" class="fixed z-40 flex justify-center w-12 h-12 transition duration-300 rounded-full shadow-md cursor-pointer text-neutral-300 shadow-brand-gray-dark/50 right-4 bottom-4 bg-brand-blue active:bg-brand-red-pale ease place-items-center hover:text-white print:hidden" title="Contact Us">
		<i class="fas fa-envelope"></i>
	</a>
	<!-- motion-safe:animate-bounce -->

	<footer class="page-content | mx-auto !mb-8 p-4 bg-white md:p-8 lg:p-12 print:hidden" id="contact">
		<h4 class="mb-4 font-bold text-brand-blue-dark">Contact us</h4>
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

		<?php
		/* Include disclaimer text after form if this is the main Cybersecurity page or any of its children */
		$cyber_page = ( wp_get_environment_type() == 'local' ) ? '2325' : '23978' ;
		if ( ll_is_tree( $cyber_page ) ) : ?>
			<p class="my-8 text-sm italic text-neutral-600">Disclaimer: BeachFleischman PLLC and Silent Sector, LLC are separate independent legal entities and are not joint ventures, partners or members of a formal business organization. Neither BeachFleischman PLLC nor Silent Sector, LLC has the authority to bind, act for or incur liability on behalf of the other.</p>
		<?php endif; ?>
	</footer>
	<?php
}
?>
