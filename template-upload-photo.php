<?php 
/* 
Template Name: Upload Photo
*/ 
get_header(); 
global $user;
$current_user 	= 	wp_get_current_user();
$profile_image	=	get_user_meta($current_user->ID,'profile_image',true);

if(isset($_POST) && isset($_POST["submit"])){
	if(isset($_FILES['file']) && ($_FILES['file']['size'] > 0)) {
		$arr_file_type = wp_check_filetype(basename($_FILES['file']['name']));
                 $uploaded_file_type = $arr_file_type['type'];
		$allowed_file_types = array('image/jpg','image/jpeg','image/gif','image/png');
		if(in_array($uploaded_file_type, $allowed_file_types)) {
			if ( ! function_exists( 'wp_handle_upload' ) ) 
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			$uploadedfile 		= 	$_FILES['file'];
			$upload_overrides 	= 	array( 'test_form' => false );
			$movefile 			= 	wp_handle_upload( $uploadedfile, $upload_overrides );
			if ( $movefile ) {
				echo "File is valid, and was successfully uploaded.\n";
				/* echo "<pre>";print_r($movefile); */
				if(!empty($profile_image)){
					update_user_meta( $current_user->ID, 'profile_image', $movefile["url"]);
				}else{
					add_user_meta( $current_user->ID, 'profile_image', $movefile["url"]);
				}				
				$success	=	"Picture Uploaded!";
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
			<div class="col-md-6">
				<?php			
				if(!empty($error)){
					echo '<div class="alert alert-danger">'.$error.'</div>';
				}if(!empty($success)){
					echo '<div class="alert alert-success">'.$success.'</div>';
				}
				?>
				<h3>Upload Profile Image</h3>
				<form action="" method="post" class="form-inline" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" name="file" id="file" class="form-control" /> 
					</div>
					<input class="btn btn-success"type="submit" name="submit" value="Upload" id="uploadimage"/>
				</form>
			</div>
			<div class="col-md-6">
				<div class="profile_image_wrapper">
					<?php
					$profile_image	=	get_user_meta($current_user->ID,'profile_image',true);
					if(!empty($profile_image)){
						echo '<img class="img-fluid" src="'.$profile_image.'"/>';
					}else{
						echo '<img class="img-fluid" src="'.get_template_directory_uri().'/images/default.jpg"/>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
  

<?php get_footer(); ?>


           


