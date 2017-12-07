<?php 
/* 
Template Name: Mock Test
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
		$args =  array('posts_per_page'=>10,'post_type'=>'test','orderby'=>'id','order'=>'desc');
		$custom_query = new WP_Query( $args );
		if ( $custom_query->have_posts() ) :
			echo '<ul class="search_list">';
			while ( $custom_query->have_posts() ) : $custom_query->the_post();
				$post_id				=	get_the_ID();
				echo '<li class="search_list_item col-md-12">
						<div class="job_title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>
						<div class="job_info">
							<div class="col-md-9">
								<div class="job_field col-md-12">
									<div class="job_field_name"><strong>Name of Post:</strong></div>    
									<div class="job_field_value"></div>
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
			echo '<p>No paper found.</p>';
		endif;
		
		?>
	</div>
</div>



<!--Display Category-->

	


<?php get_sidebar(); ?>
<?php get_footer(); ?>


