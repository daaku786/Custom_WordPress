<?php 
/* 
Template Name: Searchpage
*/ 
get_header(); 
?>


<div id="container" class="col-md-8 main_content">
    <div id="content" class="pageContent">
		<h1><?php the_title();?></h1>
		<?php
		while ( have_posts() ) : the_post(); ?>
			<div class="entry-content-page">
				<?php the_content(); ?> 
			</div>
		<?php endwhile;?>
	</div><!-- #content --> 	
	<div class="search_grid"> 
		<?php
		$args =  array('posts_per_page'=>10,'post_type'=>'job','orderby'=>'id','order'=>'desc');
		$custom_query = new WP_Query( $args );
		if ( $custom_query->have_posts() ) :
			echo '<ul class="search_list">';
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				$post_id				=	get_the_ID();
				$company_name			= 	get_post_meta( $post_id,'company_name', true);
				$vacancy_name			= 	get_post_meta( $post_id,'vacancy_name', true);
				$total_vacancy			= 	get_post_meta( $post_id,'total_vacancy_to_be_filled', true);
				$education				= 	get_post_meta( $post_id,'education_required', true);
				$job_location			= 	get_post_meta( $post_id,'job_location', true);
				$last_date_to_apply 	= 	get_post_meta( $post_id,'last_date_to_apply', true);
				echo '<li class="search_list_item col-md-12">
						<div class="job_title"><a href="'.get_the_permalink().'">'.$company_name.'</a></div>
						<div class="job_info">
							<div class="col-md-9">
								<div class="job_field col-md-12">
									<div class="job_field_name"><strong>Name of Post:</strong></div>    
									<div class="job_field_value">'.$vacancy_name.'</div>
								</div>
								<div class="job_field col-md-12">
									<div class="job_field_name"><strong>Eligibility:</strong></div>    
									<div class="job_field_value">'.$education.'</div>
								</div>
								<div class="job_field col-md-12">
									<div class="job_field_name"><strong>Job Location:</strong></div>    
									<div class="job_field_value">'.$job_location.'</div>
								</div>	
								<div class="job_field col-md-12">
									<div class="job_field_name"><strong>Last Date to apply:</strong></div>    
									<div class="job_field_value">'.$last_date_to_apply.'</div>
								</div>
								<div class="job_field col-md-12">								
									<p class="job_posted">Posted on : '.get_the_date().'</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="myButton"><a href="'.get_the_permalink().'">Job Details</a></div>
							</div>
						</div>
					</li>';
			endwhile;
			wp_reset_postdata();
			echo '</ul>';
            if(function_exists( 'wp_pagenavi' )): wp_pagenavi(array( 'query' => $custom_query ));  endif;
		else :
			echo '<p>No job found.</p>';
		endif;
		
		?>
	</div>
</div>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>