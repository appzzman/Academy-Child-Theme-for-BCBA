<div class="user-image">
	<div class="bordered-image thick-border">
		<?php echo get_avatar(ThemexUser::$data['user']['ID'], 200); ?>
	</div>
	<div class="user-image-uploader">
		<form action="<?php echo themex_url(); ?>" enctype="multipart/form-data" method="POST">
			<label for="avatar" class="button"><span class="button-icon upload"></span><?php _e('Upload','academy'); ?></label>
			<input type="file" class="shifted" id="avatar" name="avatar" />
			<input type="hidden" name="user_action" value="update_avatar" />
			<input type="hidden" name="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
		</form>
	</div>
</div>
<div class="user-description">
  <p>Please fill the form fields below. We will use this data to provide you a certificate of completion. </p>
  <p>Go to the <a href="http://behavior.uwf.edu">homepage </a> to get access to the courses.</p>
	<form action="<?php echo themex_url(); ?>" class="formatted-form" method="POST">
		<div class="message">
			<?php ThemexInterface::renderMessages(); ?>
		</div>
			<?php $bcba_no = get_user_meta(ThemexUser::$data['user']['ID'],'_themex_bcba_no');  ?>
			<div class="field-wrapper">
					BCBA Number:
				<input type="text" name="user_bcba"  value="<?php echo $bcba_no[0]; ?>" placeholder="<?php _e('BCBA No.','academy'); ?>" />
			</div>


        <div class="sixcol column">
			<div class="field-wrapper">
				First Name:
				<input type="text" name="first_name" size="30" value="<?php echo ThemexUser::$data['user']['profile']['first_name']; ?>" placeholder="<?php _e('First Name','academy'); ?>" />
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				Last Name:
				<input type="text" name="last_name" size="30" value="<?php echo ThemexUser::$data['user']['profile']['last_name']; ?>" placeholder="<?php _e('Last Name','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<?php if(!ThemexCore::checkOption('profile_signature')) { ?>
		<div class="field-wrapper">

			<input type="text" name="signature" value="<?php echo ThemexUser::$data['user']['profile']['signature']; ?>" placeholder="<?php _e('Signature','academy'); ?>" />
		</div>
		<?php } ?>
		<div class="user-fields">
			<?php ThemexForm::renderData('profile', array(), ThemexUser::$data['user']['profile']); ?>
		</div>
		<?php if(!ThemexCore::checkOption('profile_description')) { ?>
		<?php ThemexInterface::renderEditor('description', ThemexUser::$data['user']['profile']['description']); ?>
		<?php } ?>
		<?php if(!ThemexCore::checkOption('profile_links')) { ?>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="text" name="facebook" value="<?php echo ThemexUser::$data['user']['profile']['facebook']; ?>" placeholder="<?php _e('Facebook','academy'); ?>" />
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="text" name="twitter" value="<?php echo ThemexUser::$data['user']['profile']['twitter']; ?>" placeholder="<?php _e('Twitter','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="text" name="google" value="<?php echo ThemexUser::$data['user']['profile']['google']; ?>" placeholder="<?php _e('Google +','academy'); ?>" />
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="text" name="tumblr" value="<?php echo ThemexUser::$data['user']['profile']['tumblr']; ?>" placeholder="<?php _e('Tumblr','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="text" name="linkedin" value="<?php echo ThemexUser::$data['user']['profile']['linkedin']; ?>" placeholder="<?php _e('LinkedIn','academy'); ?>" />
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="text" name="flickr" value="<?php echo ThemexUser::$data['user']['profile']['flickr']; ?>" placeholder="<?php _e('Flickr','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<div class="sixcol column">
			<div class="field-wrapper">
				<input type="text" name="youtube" value="<?php echo ThemexUser::$data['user']['profile']['youtube']; ?>" placeholder="<?php _e('YouTube','academy'); ?>" />
			</div>
		</div>
		<div class="sixcol column last">
			<div class="field-wrapper">
				<input type="text" name="vimeo" value="<?php echo ThemexUser::$data['user']['profile']['vimeo']; ?>" placeholder="<?php _e('Vimeo','academy'); ?>" />
			</div>
		</div>
		<div class="clear"></div>
		<?php } ?>
		<div class="sixcol column">

			<div class="field-wrapper">
            	<?php
                $email_optin = get_user_meta(ThemexUser::$data['user']['ID'],'email_communication',true);
	   	   	  if(strlen($email_optin)>0) {
			  ?>
					<input type="checkbox" name="email_communication" value="optin" checked="checked"/> I want to receive news and updates
                      <?php
				 }
				 else{
					 ?>
	 			 	<input type="checkbox" name="email_communication" value="optin" /> I want to receive news and updates
                 <?php
				 }
				 ?>


			</div>
		</div>
	<div class="clear"></div>

		<a href="#" class="button submit-button"><span class="button-icon save"></span><?php _e('Save Changes','academy'); ?></a>
		<input type="hidden" name="user_action" value="update_profile" />
		<input type="hidden" name="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
	</form>
	<br><br><br>
		<div style="text-align:center;">
		<a class="button dark" style="margin:auto !important;"  href="<?php echo site_url();?>"><?php _e('Get Started','academy'); ?></a>
		</div>
</div>
