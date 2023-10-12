<?php
// Contact us form w/ added option to subscribe to Construction newsletter
?>

<?php echo ( wp_get_environment_type() == 'local' ) ? '<p class="todo">form-hubspot-contact-sidebar-construction.php</p>' : ''; ?>
<h3 class="mb-4 text-brand-blue">Contact us</h3>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "5578910",
    formId: "fd7acd56-f9ce-4b38-863b-20cb2530a493"
  });
</script>
