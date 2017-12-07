<?php get_header(); ?>
	<div id="container" class="col-md-8 main_content">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
		</article>	
		<?php endwhile;?>		
<h4 style="text-decoration:underline;color:#993300;">
Key Highlight About the Recruitment Notification:</h4>	
</br>	
<table class="table table-striped"> 
<tbody>
<!-- Let's show our custom fields here -->					
<?php 
    $company_name			= get_post_meta( get_the_ID(), 	'company_name', true);
	$vacancy_name			= get_post_meta( get_the_ID(), 	'vacancy_name', true);
	$total_vacancy_to_be_filled = get_post_meta( get_the_ID(),'total_vacancy_to_be_filled', true);
	$salary_range			= get_post_meta( get_the_ID(), 	'salary_range', true);
	//$job_location			= get_post_term( get_the_ID(), 	'job_location', true);
	$last_date_to_apply 	= get_post_meta( get_the_ID(), 	'last_date_to_apply', true);
	$address_for_the_job	= get_post_meta( get_the_ID(), 	'address_for_the_job', true);

	if( ! empty( $company_name ) ) {
		
		echo '<td>Company Name				</td> <td>' . $company_name 				. '	</td></tr>';
		echo '<tr><td>Vacancy Name 				</td> <td>' . $vacancy_name 			 	. '	</td></tr>';
		echo '<tr><td>Total Vacancy to be filled</td> <td>' . $total_vacancy_to_be_filled	. ' </td></tr>';
		echo '<tr><td>Salary Range				</td> <td>' . $salary_range 				. '	</td></tr>';
		echo '<tr><td>Job Location 				</td> <td>' . $job_location 				. '	</td></tr>';
		echo '<tr><td>Last Date To Apply		</td> <td>' . $last_date_to_apply 			. '	</td></tr>';
		echo '<tr><td>Address For The Job		</td> <td>' . $address_for_the_job 			. '	</td></tr>';
		
		
	}
 
?>

</tbody>
</table>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>




