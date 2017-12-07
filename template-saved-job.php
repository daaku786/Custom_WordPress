<?php 
/* 
Template Name: Saved Job
*/ 
get_header(); 
?>
<div class="row padtb30">
	<div class="col-md-3">
		<?php echo do_shortcode('[jobseeker_menu]');?>
	</div>
	<div class="col-md-9">
		<?php 
		global $wpdb;
		global $current_user;
		wp_get_current_user();
		$table		=	$wpdb->prefix . 'saved_jobs';
		$user_id	=	$current_user->ID;
		$results 	= 	$wpdb->get_results("SELECT * FROM $table where user_id=$user_id");
		$include	=	array();
		if(count($results)){
			foreach($results as $result){
				$include[]	=	$result->job_id;
			}
		}
		/* echo "<pre>";print_r($include);die; */
		$loop 		= 	new WP_Query( array( 'post_type' => 'job', 'post__in'  => $include , 'posts_per_page' => 10, 'paged' => get_query_var('paged') ) ); 
		while ( $loop->have_posts() ) : $loop->the_post(); 
			$saved	=	check_job(get_the_ID()) ? 'Saved' : 'Save';
			$class	=	($saved == 'Saved') ? 'disable_btn' : '';
		?>
			<div class="col-md-12">
				<h3><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h3>
			</div>
			
		<?php 
			endwhile;
			echo '<div class="col-md-12">';
			wp_pagenavi( array( 'query' => $loop ) );
			echo '</div>';
			wp_reset_postdata();
			?>
	</div>
</div>
  

<?php get_footer(); ?>