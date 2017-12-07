<?php get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php/* wp_get_post_categories ?>" <?php post_class(); */?>>
			<?php $post_categories = wp_get_post_categories( $post->ID, **array('orderby' => 'term_order', 'order' => 'ASC')**);
					<header class="entry-header">
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					</header><!-- .entry-header -->
				<div class="entry-content">
				<?php the_content(); ?>
	<?php
	
    $company_name			= get_post_meta( get_the_ID(), 	'company_name', true);
	$vacancy_name			= get_post_meta( get_the_ID(), 	'vacancy_name', true);
	$last_date_to_apply 	= get_post_meta( get_the_ID(), 	'last_date_to_apply', true);
	
	if( ! empty( $vacancy_name ) ) {
		
		echo '<h3>Company Name: ' . $company_name . '</h3>';
		echo '<h3>Name of  Post: ' . $vacancy_name . '</h3>';
	    echo '<h3>Last Date To Apply: ' . $last_date_to_apply . '</h3>';
	}
 
?>
		
		
		<?php endwhile;*/?>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>

