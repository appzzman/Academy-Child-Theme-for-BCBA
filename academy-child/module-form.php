<form action="<?php echo themex_url(true, ThemexCore::getURL('register')); ?>" method="POST">
	<?php if(!ThemexCourse::isSubscriber()) { ?>
	<a href="#" class="button medium submit-button left"><?php _e('Subscribe Now', 'academy'); ?></a>
	<input type="hidden" name="course_action" value="subscribe_user" />
	<input type="hidden" name="user_redirect" value="<?php echo intval(reset(ThemexCourse::$data['plans'])); ?>" />
	<?php } else if(!ThemexCourse::isMember()) { ?>
		<?php if(ThemexCourse::$data['status']!='private') { ?>
		<a href="#" class="button medium price-button submit-button left">		
			<?php if(ThemexCourse::$data['status']=='premium' && ThemexCourse::$data['product']!=0) { ?>
			<span class="caption"><?php _e('Purchase this course from CCBS', 'academy'); ?></span>
			<span class="price"><?php echo ThemexCourse::$data['price']['text']; ?></span>
			<?php } else { ?>
			<?php _e('Purchase this course from CCBS', 'academy'); ?>
			<?php } ?>
		</a>
		<input type="hidden" name="course_action" value="add_user" />
		<input type="hidden" name="user_redirect" value="<?php echo ThemexCourse::$data['ID']; ?>" />
		<?php } ?>
	<?php } else { ?>
		<?php if(!ThemexCore::checkOption('course_retake')) { ?>
		<a href="#" class="button secondary medium submit-button left"><?php _e('Unsubscribe Now', 'academy'); ?></a>
		<input type="hidden" name="course_action" value="remove_user" />
		<?php } ?>
		<?php if(ThemexCourse::hasCertificate()) { ?>
         <a href="<?php echo get_page_link(14); ?>&userid=<?php echo ThemexUser::$data['user']['ID']; ?>&post_id=<?php echo ThemexCourse::$data['ID']; ?>" target="_blank" class="button medium certificate-button"><?php _e('Course Evaluation', 'academy'); ?></a>
        <?php 
		$post_id_evaluate=ThemexCourse::$data['ID'];
		$evaluation_count=get_user_meta(ThemexUser::$data['user']['ID'],$post_id_evaluate.'_evaluation_count'); 	
		$user=	get_user_by( 'email', 'jchudzynski@uwf.edu');
		if(is_course_certified(ThemexCourse::$data['ID'], ThemexUser::$data['user']['ID'])){
?>
			
			 <a href="<?php echo ThemexCore::getURL('certificate', themex_encode(ThemexCourse::$data['ID'], ThemexUser::$data['user']['ID'])); ?>" target="_blank" class="button medium certificate-button"><?php _e('View Certificate', 'academy'); ?></a>	
		<?php
        }
		
		
		?> 
	
				<?php } ?>
	<?php } ?>
	<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
	<input type="hidden" name="plan_id" value="<?php echo intval(reset(ThemexCourse::$data['plans'])); ?>" />	
	<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
	<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_course" />
</form>