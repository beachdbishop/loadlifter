<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Load_Lifter
 */

?>

<?php ll_featured_image(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-4 md:py-6 lg:py-8' ); ?>>
	<div class="px-1 md:container md:mx-auto md:px-0 ">

		<?php if ( function_exists( 'bcn_display' ) ) { ?>
			<div class="breadcrumbs | font-head text-neutral-500 pb-4 md:pb-6 lg:pb-8" typeof="BreadcrumbList" vocab="https://schema.org"><?php bcn_display(); ?></div>
		<?php } ?>

		<header>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title | ">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title | "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
		</header>

		<div class="md:flex md:gap-4 lg:gap-8">
			<div class="md:order-last md:w-2/3 lg:w-3/4">
				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span> "%s"</span>', 'loadlifter' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
					?>
					<div class="clear-both">&nbsp;</div>
					<?php
					wp_link_pages(
						array(
							'before' => '<div>' . esc_html__( 'Pages:', 'loadlifter' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>

				<footer class="p-4 my-4 rounded-lg bg-brand-blue-faint lg:my-8 lg:p-8 print:hidden">
					<h4 class="mb-4 text-center text-brand-blue-dark">Contact Us</h4>
					<p class="mb-4 todo">The following form is just an example of a HubSpot form w/ all property types included. This won't submit anywhere.</p>
					<?php // HTML produced by the Dev All Field Types (no styles) form ?>
<!-- <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>hbspt.forms.create({ region: "na1", portalId: "5578910", formId: "df89d099-55ed-45e1-aa9b-1e81e2943e8d" });</script> -->
					<div class="hbspt-form" id="hbspt-form-1656525990079-5013101266"><form novalidate="" accept-charset="UTF-8" action="" enctype="multipart/form-data" id="hsForm_df89d099-55ed-45e1-aa9b-1e81e2943e8d" method="" class="hs-form stacked hs-form-private hsForm_df89d099-55ed-45e1-aa9b-1e81e2943e8d hs-form-df89d099-55ed-45e1-aa9b-1e81e2943e8d hs-form-df89d099-55ed-45e1-aa9b-1e81e2943e8d_b5b548de-84ec-472f-8de8-9e91cc1d9c73" data-form-id="df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-portal-id="5578910" target="target_iframe_df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0"><fieldset class="form-columns-2" data-reactid=".hbspt-forms-0.1:$0"><div class="hs_firstname hs-firstname hs-fieldtype-text field hs-form-field" data-reactid=".hbspt-forms-0.1:$0.1:$firstname"><label id="label-firstname-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your First name" for="firstname-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.0"><span data-reactid=".hbspt-forms-0.1:$0.1:$firstname.0.0">First name</span><span class="hs-form-required" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.0.1">*</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.$firstname"><input id="firstname-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input invalid error" type="text" name="firstname" required="" value="" placeholder="" autocomplete="given-name" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.$firstname.0" inputmode="text"></div><ul class="no-list hs-error-msgs inputs-list" style="display:block;" role="alert" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.3"><li data-reactid=".hbspt-forms-0.1:$0.1:$firstname.3.$0"><label class="hs-error-msg" data-reactid=".hbspt-forms-0.1:$0.1:$firstname.3.$0.0">Please complete this required field.</label></li></ul></div><div class="hs_lastname hs-lastname hs-fieldtype-text field hs-form-field" data-reactid=".hbspt-forms-0.1:$0.1:$lastname"><label id="label-lastname-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Last name" for="lastname-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$0.1:$lastname.0"><span data-reactid=".hbspt-forms-0.1:$0.1:$lastname.0.0">Last name</span><span class="hs-form-required" data-reactid=".hbspt-forms-0.1:$0.1:$lastname.0.1">*</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$0.1:$lastname.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$0.1:$lastname.$lastname"><input id="lastname-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" type="text" name="lastname" required="" value="" placeholder="" autocomplete="family-name" data-reactid=".hbspt-forms-0.1:$0.1:$lastname.$lastname.0" inputmode="text"></div></div></fieldset><fieldset class="form-columns-2" data-reactid=".hbspt-forms-0.1:$1"><div class="hs_email hs-email hs-fieldtype-text field hs-form-field" data-reactid=".hbspt-forms-0.1:$1.1:$email"><label id="label-email-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Email" for="email-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$1.1:$email.0"><span data-reactid=".hbspt-forms-0.1:$1.1:$email.0.0">Email</span><span class="hs-form-required" data-reactid=".hbspt-forms-0.1:$1.1:$email.0.1">*</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$1.1:$email.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$1.1:$email.$email"><input id="email-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" type="email" name="email" required="" placeholder="" value="" autocomplete="email" data-reactid=".hbspt-forms-0.1:$1.1:$email.$email.0" inputmode="email"></div></div><div class="hs_phone hs-phone hs-fieldtype-text field hs-form-field" data-reactid=".hbspt-forms-0.1:$1.1:$phone"><label id="label-phone-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Phone number" for="phone-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$1.1:$phone.0"><span data-reactid=".hbspt-forms-0.1:$1.1:$phone.0.0">Phone number</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$1.1:$phone.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$1.1:$phone.$phone"><input id="phone-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" type="tel" name="phone" value="" placeholder="" autocomplete="tel" data-reactid=".hbspt-forms-0.1:$1.1:$phone.$phone.0" inputmode="tel"></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$2"><div class="hs_company hs-company hs-fieldtype-text field hs-form-field" data-reactid=".hbspt-forms-0.1:$2.1:$company"><label id="label-company-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Company name" for="company-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$2.1:$company.0"><span data-reactid=".hbspt-forms-0.1:$2.1:$company.0.0">Company name</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$2.1:$company.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$2.1:$company.$company"><input id="company-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" type="text" name="company" value="" placeholder="" autocomplete="organization" data-reactid=".hbspt-forms-0.1:$2.1:$company.$company.0" inputmode="text"></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$3"><div class="hs_message hs-message hs-fieldtype-textarea field hs-form-field" data-reactid=".hbspt-forms-0.1:$3.1:$message"><label id="label-message-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Message" for="message-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$3.1:$message.0"><span data-reactid=".hbspt-forms-0.1:$3.1:$message.0.0">Message</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$3.1:$message.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$3.1:$message.$message"><textarea id="message-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" name="message" placeholder="" data-reactid=".hbspt-forms-0.1:$3.1:$message.$message.0"></textarea></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$4"><div class="hs_subscribe_to_our_newsletter hs-subscribe_to_our_newsletter hs-fieldtype-booleancheckbox field hs-form-field" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter"><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.$subscribe_to_our_newsletter"><ul class="inputs-list" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.$subscribe_to_our_newsletter.0"><li class="hs-form-booleancheckbox" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.$subscribe_to_our_newsletter.0.0"><label for="subscribe_to_our_newsletter-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-booleancheckbox-display" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.$subscribe_to_our_newsletter.0.0.0"><input id="subscribe_to_our_newsletter-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" type="checkbox" name="subscribe_to_our_newsletter" value="true" data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.$subscribe_to_our_newsletter.0.0.0.0"><span data-reactid=".hbspt-forms-0.1:$4.1:$subscribe_to_our_newsletter.$subscribe_to_our_newsletter.0.0.0.1">Subscribe to our Newsletter</span></label></li></ul></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$5"><div class="hs_birthdate hs-birthdate hs-fieldtype-date field hs-form-field" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate"><label id="label-birthdate-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Birthday" for="birthdate-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.0"><span data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.0.0">Birthday</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.$birthdate"><div class="hs-dateinput " data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.$birthdate.0"><input id="birthdate-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input" type="text" value="" readonly="" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.$birthdate.0.0"><input name="birthdate" class="hs-input" type="hidden" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.$birthdate.0.1"><div class="hs-datepicker" style="position:absolute;z-index:10000;" data-reactid=".hbspt-forms-0.1:$5.1:$birthdate.$birthdate.0.2"><div class="pika-single fn-date-picker is-hidden is-bound" style="position: static; left: auto; top: auto;"></div></div></div></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$6"><div class="hs_hs_buying_role hs-hs_buying_role hs-fieldtype-checkbox field hs-form-field" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role"><label id="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Buying Role" for="hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.0.0">Buying Role</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role"><ul role="checkbox" class="inputs-list multi-container" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0"><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BLOCKER"><label for="hs_buying_role0-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BLOCKER.0"><input id="hs_buying_role0-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="BLOCKER" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BLOCKER.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BLOCKER.0.1">Blocker</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BUDGET_HOLDER"><label for="hs_buying_role1-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BUDGET_HOLDER.0"><input id="hs_buying_role1-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="BUDGET_HOLDER" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BUDGET_HOLDER.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$BUDGET_HOLDER.0.1">Budget Holder</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$CHAMPION"><label for="hs_buying_role2-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$CHAMPION.0"><input id="hs_buying_role2-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="CHAMPION" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$CHAMPION.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$CHAMPION.0.1">Champion</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$DECISION_MAKER"><label for="hs_buying_role3-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$DECISION_MAKER.0"><input id="hs_buying_role3-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="DECISION_MAKER" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$DECISION_MAKER.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$DECISION_MAKER.0.1">Decision Maker</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$END_USER"><label for="hs_buying_role4-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$END_USER.0"><input id="hs_buying_role4-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="END_USER" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$END_USER.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$END_USER.0.1">End User</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$EXECUTIVE_SPONSOR"><label for="hs_buying_role5-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$EXECUTIVE_SPONSOR.0"><input id="hs_buying_role5-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="EXECUTIVE_SPONSOR" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$EXECUTIVE_SPONSOR.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$EXECUTIVE_SPONSOR.0.1">Executive Sponsor</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$INFLUENCER"><label for="hs_buying_role6-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$INFLUENCER.0"><input id="hs_buying_role6-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="INFLUENCER" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$INFLUENCER.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$INFLUENCER.0.1">Influencer</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$LEGAL_AND_COMPLIANCE"><label for="hs_buying_role7-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$LEGAL_AND_COMPLIANCE.0"><input id="hs_buying_role7-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="LEGAL_AND_COMPLIANCE" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$LEGAL_AND_COMPLIANCE.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$LEGAL_AND_COMPLIANCE.0.1">Legal &amp; Compliance</span></label></li><li class="hs-form-checkbox" role="checkbox" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$OTHER"><label for="hs_buying_role8-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-checkbox-display" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$OTHER.0"><input id="hs_buying_role8-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="checkbox" name="hs_buying_role" value="OTHER" aria-labelledby="label-hs_buying_role-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$OTHER.0.0"><span data-reactid=".hbspt-forms-0.1:$6.1:$hs_buying_role.$hs_buying_role.0.$OTHER.0.1">Other</span></label></li></ul></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$7"><div class="hs_i_represent hs-i_represent hs-fieldtype-radio field hs-form-field" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent"><label id="label-i_represent-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your I represent" for="i_represent-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.0"><span data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.0.0">I represent</span><span class="hs-form-required" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.0.1">*</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent"><ul required="" role="checkbox" class="inputs-list multi-container" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0"><li class="hs-form-radio" role="radio" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$individual"><label for="i_represent0-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-radio-display" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$individual.0"><input id="i_represent0-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="radio" name="i_represent" value="individual" aria-labelledby="label-i_represent-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$individual.0.0"><span data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$individual.0.1">An individual</span></label></li><li class="hs-form-radio" role="radio" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$bizorg"><label for="i_represent1-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-radio-display" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$bizorg.0"><input id="i_represent1-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="radio" name="i_represent" value="bizorg" aria-labelledby="label-i_represent-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$bizorg.0.0"><span data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$bizorg.0.1">A business/organization</span></label></li><li class="hs-form-radio" role="radio" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$both"><label for="i_represent2-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-form-radio-display" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$both.0"><input id="i_represent2-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input " type="radio" name="i_represent" value="both" aria-labelledby="label-i_represent-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$both.0.0"><span data-reactid=".hbspt-forms-0.1:$7.1:$i_represent.$i_represent.0.$both.0.1">Both</span></label></li></ul></div></div></fieldset><fieldset class="form-columns-1" data-reactid=".hbspt-forms-0.1:$8"><div class="hs_office_location hs-office_location hs-fieldtype-select field hs-form-field" data-reactid=".hbspt-forms-0.1:$8.1:$office_location"><label id="label-office_location-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="" placeholder="Enter your Office Location" for="office_location-df89d099-55ed-45e1-aa9b-1e81e2943e8d" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.0"><span data-reactid=".hbspt-forms-0.1:$8.1:$office_location.0.0">Office Location</span></label><legend class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.1"></legend><div class="input" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.$office_location"><select id="office_location-df89d099-55ed-45e1-aa9b-1e81e2943e8d" class="hs-input is-placeholder" name="office_location" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.$office_location.0"><option value="" disabled="" selected="" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.$office_location.0.0">Please Select</option><option value="Tucson" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.$office_location.0.1:$Tucson">Tucson</option><option value="Phoenix" data-reactid=".hbspt-forms-0.1:$8.1:$office_location.$office_location.0.1:$Phoenix">Phoenix</option></select></div></div></fieldset><noscript data-reactid=".hbspt-forms-0.2"></noscript><div class="hs_submit hs-submit" data-reactid=".hbspt-forms-0.5"><div class="hs-field-desc" style="display:none;" data-reactid=".hbspt-forms-0.5.0"></div><div class="actions" data-reactid=".hbspt-forms-0.5.1"><input type="submit" value="Submit" class="hs-button primary large" data-reactid=".hbspt-forms-0.5.1.0"></div></div><noscript data-reactid=".hbspt-forms-0.6"></noscript><input name="hs_context" type="hidden" value="{&quot;rumScriptExecuteTime&quot;:3521,&quot;rumServiceResponseTime&quot;:3978,&quot;rumFormRenderTime&quot;:1,&quot;rumTotalRenderTime&quot;:3979,&quot;rumTotalRequestTime&quot;:454,&quot;renderRawHtml&quot;:&quot;true&quot;,&quot;lang&quot;:&quot;en&quot;,&quot;clonedFromForm&quot;:&quot;c8675641-3e68-4ff7-9dc3-ae3636fbf1c8&quot;,&quot;embedType&quot;:&quot;REGULAR&quot;,&quot;embedAtTimestamp&quot;:&quot;1656525990453&quot;,&quot;formDefinitionUpdatedAt&quot;:&quot;1656525518417&quot;,&quot;pageUrl&quot;:&quot;http://localhost:3000/block-button/&quot;,&quot;pageTitle&quot;:&quot;Block: Button – People CPT – Author test&quot;,&quot;source&quot;:&quot;FormsNext-static-5.508&quot;,&quot;sourceName&quot;:&quot;FormsNext&quot;,&quot;sourceVersion&quot;:&quot;5.508&quot;,&quot;sourceVersionMajor&quot;:&quot;5&quot;,&quot;sourceVersionMinor&quot;:&quot;508&quot;,&quot;timestamp&quot;:1656525990453,&quot;userAgent&quot;:&quot;Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0&quot;,&quot;referrer&quot;:&quot;http://localhost:3000/category/block/&quot;,&quot;originalEmbedContext&quot;:{&quot;region&quot;:&quot;na1&quot;,&quot;portalId&quot;:&quot;5578910&quot;,&quot;formId&quot;:&quot;df89d099-55ed-45e1-aa9b-1e81e2943e8d&quot;,&quot;target&quot;:&quot;#hbspt-form-1656525990079-5013101266&quot;},&quot;dateFields&quot;:&quot;birthdate&quot;,&quot;formValidity&quot;:{&quot;firstname&quot;:{&quot;valid&quot;:false,&quot;errors&quot;:[&quot;Please complete this required field.&quot;],&quot;errorTypes&quot;:[&quot;REQUIRED_FIELD&quot;]}},&quot;renderedFieldsIds&quot;:[&quot;firstname&quot;,&quot;lastname&quot;,&quot;email&quot;,&quot;phone&quot;,&quot;company&quot;,&quot;message&quot;,&quot;subscribe_to_our_newsletter&quot;,&quot;birthdate&quot;,&quot;hs_buying_role&quot;,&quot;i_represent&quot;,&quot;office_location&quot;],&quot;formTarget&quot;:&quot;#hbspt-form-1656525990079-5013101266&quot;,&quot;correlationId&quot;:&quot;8ef7e4c0-5356-44cb-819e-7af0b39c5dda&quot;,&quot;captchaStatus&quot;:&quot;NOT_APPLICABLE&quot;}" data-reactid=".hbspt-forms-0.7"><iframe name="target_iframe_df89d099-55ed-45e1-aa9b-1e81e2943e8d" style="display:none;" data-reactid=".hbspt-forms-0.8"></iframe></form></div>

					<!-- HubSpot Form -->
					<!-- <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script> -->
					<?php // if ( is_category( 'construction' ) ) { ?>
						<!-- <script>
							hbspt.forms.create({
								region: "na1",
								portalId: "5578910",
								formId: "f0c0da7a-7a4a-4de3-98c3-167a4c726d76"
							});
						</script> -->
					<?php // } else { ?>
						<!-- "Contact Us Short (no styles)" -->
						<!-- <script>
							hbspt.forms.create({
								region: "na1",
								portalId: "5578910",
								formId: "c8675641-3e68-4ff7-9dc3-ae3636fbf1c8",
								cssRequired: ""
							});
						</script> -->
					<?php // } ?>
					<!-- / HubSpot Form -->
				</footer>

				<?php get_sidebar( 'after-post' ); ?>
			</div>

			<aside class="mt-4 md:mt-0 md:order-first md:w-1/3 lg:w-1/4">
				<?php
				if ( 'post' === get_post_type() ) :
				?>
				<div class="post-meta | text-sm text-neutral-600 ">
					<?php
					ll_posted_by( array(
						'show_thumb' => true,
					) );
					?>

					<?php ll_posted_on(); ?>

					<h4 class="mt-8 mb-2 text-lg">Related topics</h4>
					<?php ll_entry_footer(); ?>
					<p class="my-4"><?php ll_social_shares(); ?></p>

					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span>%s</span>', 'loadlifter' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="text-pink-600">',
						'</span>'
					);
					?>
				</div>
				<!-- <div class="p-4 text-sm bg-brand-blue-faint md:mt-4 ">
					<h5 class="mb-2">Categories</h5>
					<ul class="list-none">
						<?php
						// wp_list_categories( array(
						// 	'orderby'    	=> 'name',
						// 	'show_count' 	=> true,
						// 	'title_li' 		=> '',
						// ) );
						?>
					</ul>
				</div> -->
				<?php get_sidebar(); ?>
			<?php endif; ?>
			</aside>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
