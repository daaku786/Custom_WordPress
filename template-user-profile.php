<?php 
/* 
Template Name: User Profile
*/ 
get_header(); 
?>
<div class="row padtb30">
	<div class="col-md-3">
		<?php echo do_shortcode('[jobseeker_menu]');?>
	</div>
	<div class="col-md-9 padtb30  ">
		<?php
		echo do_shortcode('[ultimatemember form_id=118]');
		?>
	</div>
</div>
  

<?php get_footer(); ?>