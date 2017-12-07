<?php 
/* 
Template Name: Jobseeker Login
*/ 
get_header(); 
?>
<div id="container" class="col-md-8 main_content"> 
    <div id="content" class="pageContent">
		<div class="container">  
			<div class="row">
				<div class="col-md-6">
					<div class="login_box">
						<?php echo do_shortcode('[ultimatemember form_id=117]');?>
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1"> 
					<h2>Not a member as yet?</h2>
					<ul class="login_side_list">
						<li>Get searched by thousands of Recruiters</li>
						<li>Apply to hundreds of Jobs</li>
						<li>Get placement materials to prepare for Job interviews</li>
						<li>Gain access to Best jobs</li>
					</ul>
					<a class="btn btn-success btn-grey" href="<?=site_url('js_register')?>">Create your FREE Account now</a>
				</div>
			</div>
		</div>
	</div>
</div>
  

<?php get_footer(); ?>