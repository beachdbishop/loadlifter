<?php
// intended partial to be used in sidebar of pages / posts
if ( ( in_category( 'construction' ) ) || ( is_page( 'Construction' ) ) ) {
    $hs_form_id = 'fd7acd56-f9ce-4b38-863b-20cb2530a493';
} else {
    $hs_form_id = 'c8675641-3e68-4ff7-9dc3-ae3636fbf1c8';
}
// echo ( wp_get_environment_type() == 'local' ) ? '<p class="italic">partial: ' . __FILE__ . '</p>' : '';
?>
<h3 class="mb-4 text-brand-blue-dark dark:text-brand-blue-pale">Contact us</h3>
<script>hbspt.forms.create({region: "na1", portalId: "5578910", formId: "<?php echo $hs_form_id; ?>"});</script>
