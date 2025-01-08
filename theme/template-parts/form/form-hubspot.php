<?php
if ( ( in_category( 'construction' ) ) || ( is_page( 'Construction' ) ) ) {
	$hs_form_id = 'fd7acd56-f9ce-4b38-863b-20cb2530a493';
} else {
	$hs_form_id = 'c8675641-3e68-4ff7-9dc3-ae3636fbf1c8';
}

if ( get_field( 'll_normal_contact_form_location' ) !== false ) {
?>

	<a href="#contact" class="fixed z-40 flex justify-center w-12 h-12 transition duration-300 rounded-full shadow-md cursor-pointer text-neutral-300 shadow-brand-gray-dark/50 right-4 bottom-4 bg-brand-blue active:bg-brand-red-pale ease place-items-center hover:text-white print:hidden" title="Contact Us">
		<i class="fas fa-envelope"></i>
	</a>
	<!-- motion-safe:animate-bounce -->

	<footer class="page-content | mx-auto !mb-8 p-4 bg-white md:p-8 lg:p-12 print:hidden" id="contact">

		<?php // echo ( wp_get_environment_type() == 'local' ) ? '<p class="italic">form-hubspot.php</p>' : ''; ?>

		<h4 class="mb-4 text-brand-blue-dark dark:text-orient-400">Contact us</h4>
		<div class="not-prose hbspt-form max-w-prose" id="llhsform"></div>
		<script>
			// Function to load the HubSpot form
			function loadHubSpotForm() {
				var formContainer = document.getElementById('llhsform');
				var rect = formContainer.getBoundingClientRect();

				// Check if the form is within the viewport
				if(rect.top < window.innerHeight && rect.bottom >= 0) {
						// Create and append the HubSpot script
						var hsScript = document.createElement('script');
						hsScript.async = true; // Load script asynchronously
						hsScript.src='//js.hsforms.net/forms/v2.js';
						hsScript.onload = function() {
								hbspt.forms.create({
										region: "na1",
										portalId: "5578910",
										target: '#llhsform',
										formId: "<?php echo $hs_form_id; ?>"

								});
						};
						document.body.appendChild(hsScript);

						// Remove the event listener once the script is loaded
						window.removeEventListener('scroll', loadHubSpotForm);
				}
			}

			// Add scroll event listener to load the form
			window.addEventListener('scroll', loadHubSpotForm);

			// Also check immediately in case the form is already in view on the initial page load
			loadHubSpotForm();
		</script>

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
