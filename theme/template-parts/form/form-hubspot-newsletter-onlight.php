<?php
// form - HubSpot - Newsletter Subscription (on light bg)
$hs_form_id = 'e9f9a025-96c0-4a18-b642-17a605422edf';
?>
<div class="p-4 md:p-8 bg-neutral-50 text-neutral-800 sticky z-10 top-[104px] print:hidden">
	<?php // echo ( wp_get_environment_type() == 'local' ) ? '<p class="italic">form-hubspot-newsletter-onlight.php</p>' : ''; ?>
	<h3 class="mb-4 text-brand-red">Stay up-to-date</h3>
	<p class="mb-8">Get a collection of our latest blog posts in your inbox every 3-4 weeks.</p>
	<div id="llhsform"></div>
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
	<!-- <script>hbspt.forms.create({region: "na1", portalId: "5578910", formId: "e9f9a025-96c0-4a18-b642-17a605422edf"});</script> -->
	<noscript>
		<div class="wp-block-buttons is-content-justification-left is-layout-flex wp-block-buttons-is-layout-flex print:hidden">
			<div class="wp-block-button is-style-outline"><a href="mailto:info@beachfleischman.com?subject=Newsletter%20opt-in from:%20<?php echo esc_attr( get_the_title() ); ?>" class="wp-block-button__link has-brand-red-color has-text-color wp-element-button "><i class="fa-solid fa-envelope"></i> Email us</a></div>
		</div>
	</noscript>
</div>
