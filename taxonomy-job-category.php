<?php get_header();?>
<div class="col-md-8 main_content">
<?php $term 	=	get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
echo '<div class="cat_info"><h1 class="cat_title">'.$term->name.'</h1><div class="cat_desc"><p>'.$term->description.'</p></div></div>';
$paged 	= 	(get_query_var('page')) ? get_query_var('page') : 1; 
$args 	=  	array( 	
	'posts_per_page' 	=> 	10, 
	'tax_query' => array(
				array(
					'taxonomy' => $term->taxonomy,
					'field' => 'slug',
					'terms' => $term->slug
				)
	),
	'post_type'		 	=> 	'job',
	'orderby' 			=> 	'id',
	'order' 			=> 	'desc',
	'paged'				=>	$paged,
);
$custom_query = new WP_Query( $args );
echo '<table class="catposts_table">';
echo '<tr>
		<th>COMPANY NAME</th>
		<th>POST TITLE</th>
		<th>LAST DATE</th>
	</tr>';
if ( $custom_query->have_posts() ) :
	while ($custom_query->have_posts()) : $custom_query->the_post(); 
		$post_id		=	get_the_ID();
		$company_name	=	get_post_meta($post_id,'company_name',true);	
		$vacancy_name	=	get_post_meta($post_id,'vacancy_name',true);	
		$education		=	get_post_meta($post_id,'education_required',true);	
		$last_date		=	get_post_meta($post_id,'last_date_to_apply',true);	
		?>
		<tr class="catposts_tr">
			<td class="catposts_td"><a href="<?=get_the_permalink()?>"><?=$company_name?></a></td>
			<td class="catposts_td"><p class="vacancy"><?=$vacancy_name?></p><p class="education"><strong>Education : </strong><?=$education?></p></td>
			<td class="catposts_td"><?=$last_date?></td>
		</tr>
	<?php 
	endwhile;
	wp_reset_postdata(); 
else :
	echo '<tr><td colspan="3">No job found.</td></tr>';
endif;
echo '</table>';
if(function_exists( 'wp_pagenavi' )): wp_pagenavi(array( 'query' => $custom_query ));  endif; 
?>
</div>
<?php get_sidebar(); ?>		
<?php get_footer(); ?>