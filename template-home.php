<?php 
/* 
Template Name: Homepage
*/ 
get_header(); 
?>

<div id="container" class="col-md-8 main_content"> 
    <div id="content" class="pageContent">
	
		<?php
		// TO SHOW THE PAGE CONTENTS
	
		while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
			<div class="entry-content-page">
				<?php the_content(); ?> <!-- Page Content -->
			</div><!-- .entry-content-page -->

		<?php
		endwhile; //resetting the page loop
		echo '<div class="cat_list_wrapper">';
		$args = array( 
			'taxonomy'     => 'job-category',
			'orderby'      => 'name',
			'show_count'   => 1,
			'pad_counts'   => 1, 
			'hierarchical' => 1,
			'echo'         => 0
		);
		$allcats = get_categories($args); 
		if(isset($allcats) && count($allcats)){
			foreach($allcats as $cat){
				echo '<div class="cat_list_item"><h2 class="cat_title">'.$cat->name.'</h2>';
				$argsp =  array( 
					'posts_per_page' 	=> 	5, 
					'tax_query' => array(
								array(
									'taxonomy' => $cat->taxonomy,
									'field' => 'slug',
									'terms' => $cat->slug
								)
					),
					'post_type'		 	=> 	'job',
					'orderby' 			=> 	'id',
					'order' 			=> 	'desc',
				);
				$custom_query = new WP_Query( $argsp );
				if ( $custom_query->have_posts() ) :
					echo '<ul class="job_item_list">';
					while ( $custom_query->have_posts() ) : $custom_query->the_post();
						echo '<li class="job_item"><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
					endwhile;
					wp_reset_postdata();
					echo '</ul>';
					echo '<div class="mybtn"><a href="'.site_url().'/job-category/'.$cat->slug.'"/>View all Jobs</a></div>';
				else :
					echo '<p>No job found.</p>';
				endif;
				echo '</div>';
			}
		}
		echo '</div>';
		?>
    </div><!-- #content -->         
</div><!-- #container -->



<!--Display Category-->

	


<?php get_sidebar(); ?>
<?php get_footer(); ?>


