<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<?php 
/* 
Template Name: User Registration
*/ 
get_header(); 
?>
<div class="tml tml-register" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'register' ); ?>
	<?php $template->the_errors(); ?>
	<form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
		
		<p class="tml-user-login-wrap">
			<label for="first_name<?php $template->the_instance(); ?>"><?php _e( 'Name', 'theme-my-login' ) ?></label>
			<input type="text" name="first_name" id="first_name<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'first_name' ); ?>" size="20" tabindex="20" />
		</p>
		
		
<?php if ( 'email' != $theme_my_login->get_option( 'login_type' ) ) : ?>
		<p class="tml-user-email-wrap">
			<label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail Address', 'theme-my-login' ); ?></label>
			<input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
		</p>
<?php endif; ?>
		<?php do_action( 'register_form' ); ?>

		<p class="tml-registration-confirmation" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>
		<p class="tml-user-login-wrap">
			<label for="country<?php $template->the_instance(); ?>"><?php _e( 'Country', 'theme-my-login' ) ?></label>
		<select id="country" name="country<?php $template->the_instance(); ?>"class="input" value="<?php $template->the_posted_value( 'country' ); ?>" ></select>
		</p>
		<p class="tml-user-login-wrap">
			<label for="state<?php $template->the_instance(); ?>"><?php _e( 'State', 'theme-my-login' ) ?></label>
		<select id="state" name="state<?php $template->the_instance(); ?>"class="input" value="<?php $template->the_posted_value( 'state' ); ?>" ></select>
		</p>
		<p class="tml-user-login-wrap">
			<label for="location<?php $template->the_instance(); ?>"><?php _e( 'Location', 'theme-my-login' ) ?></label>
		<select id="location" name="location<?php $template->the_instance(); ?>"class="input" value="<?php $template->the_posted_value( 'location' ); ?>" ></select>
		</p>
		<p class="tml-user-login-wrap">
			<label for="number<?php $template->the_instance(); ?>"><?php _e( ' Mobile Number', 'theme-my-login' ) ?></label>
			<input type="text" name="number" id="number<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'number' ); ?>" size="20" tabindex="20" />
		</p>
		<h3> Education Details </h3>
		
			<p class="tml-user-login-wrap">
				<label for="skill<?php $template->the_instance(); ?>"><?php _e( 'Your Skill', 'theme-my-login' ) ?></label>
				<input type="text" name="skill" id="skill<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'skill' ); ?>" (separate by ',') />
			</p>
		
			
			<p class="tml-user-login-wrap">
				<label for="heading<?php $template->the_instance(); ?>"><?php _e( ' Resume Headline', 'theme-my-login' ) ?></label>
				<input type="text" name="heading" id="heading<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'heading' ); ?>" size="20" tabindex="20" />
			</p>
			
			<p class="tml-user-login-wrap">
				<label for="fileupload<?php $template->the_instance(); ?>"><?php _e( ' Upload Resume', 'theme-my-login' ) ?></label>
				<input type="file" name="fileupload" id="fileupload<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'fileupload' ); ?>" size="20" tabindex="20" />
			</p>
			
	
		<p class="tml-submit-wrap">
			<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="register" />
		</p>
	</form>
	<?php $template->the_action_links( array( 'register' => false ) ); ?>
</div>


