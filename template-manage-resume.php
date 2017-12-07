<?php 
/* 
Template Name: Manage Resume
*/ 
get_header(); 
global $user;
$current_user 	= 	wp_get_current_user();
$profile_image	=	get_user_meta($current_user->ID,'profile_image',true);

if(isset($_POST) && isset($_POST["submit"])){
	if(isset($_FILES['resume']) && ($_FILES['resume']['size'] > 0)) {
		$arr_file_type 		= 	wp_check_filetype(basename($_FILES['file']['name']));
        $uploaded_file_type = 	$arr_file_type['type'];
		$allowed_file_types = 	array('image/jpg','image/jpeg','image/gif','image/png');
		if(in_array($uploaded_file_type, $allowed_file_types)) {
			if ( ! function_exists( 'wp_handle_upload' ) ) 
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			$uploadedfile 		= 	$_FILES['file'];
			$upload_overrides 	= 	array( 'test_form' => false );
			$movefile 			= 	wp_handle_upload( $uploadedfile, $upload_overrides );
			if ( $movefile ) {
				if(!empty($profile_image)){
					update_user_meta( $current_user->ID, 'browse_resume', $movefile["url"]);
				}else{
					add_user_meta( $current_user->ID, 'browse_resume', $movefile["url"]);
				}				
				$success	=	"Resume has successfully uploaded!";
				$error		=	null;
			} else {
				$error 		= 'Upload failed! Please try again later!';
				$success	=	null;
			}
		}else{
			$error = 'Please select image..!';
			$success	=	null;
		} 
	} else { 
		$error = 'Please upload only image files (jpg, gif or png).';
		$success	=	null;
	}
}
?>
<div class="row padtb30">
	<div class="col-md-3">
		<?php echo do_shortcode('[jobseeker_menu]');?>
	</div>
	<div class="col-md-9">
		<div class="row">
			<h2 class="bb_orange">Resume <a href="javascript:void(0)" class="anchor" data-toggle="modal" data-target="#siteModal">Upload New Resume</a></h2>
			<?php
			$current_user 	= 	wp_get_current_user();
			$resumes		=	get_user_meta($current_user->ID,'browse_resume');
			um_fetch_user($current_user->ID);
			$display_name 	= 	um_user('browse_resume');
			echo $display_name;
			/* echo "<pre>";print_r($resumes); */
			?>
		</div>
	</div>
</div>
<div class="modal fade " id="siteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width:500px;">
        <div class="modal-content">
            <form id="siteForm" action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Upload Resume</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="file" name="resume" id="resume"/>
							</div>
							<input type="submit" class="btn btn-success" name="submit"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php get_footer(); ?>