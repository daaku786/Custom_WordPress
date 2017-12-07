<?php 
/* 
Template Name: Jobseeker Dashboard
*/ 
get_header(); 
?>
<div class="row padtb30 clearfix">
	<div class="col-md-3 clearfix">
		<?php echo do_shortcode('[jobseeker_menu]');?>
	</div>
	<div class="col-md-9 clearfix">
		<div class="row clearfix">
			<div class="col-md-12 clearfix">
				<?php echo do_shortcode('[AjaxWPQSF id=166]');?>
			</div>
			<?php 
			$current_user 	= 	wp_get_current_user();
			$skills			=	get_user_meta($current_user->ID,'js_skills',true);
			$terms			=	array();
			if(isset($skills) && count($skills)){
				foreach($skills as $key=>$value){
					$terms[]	=	strtolower($value)."-jobs";
				}
				/* echo "<pre>";print_r($terms);die; */
				$args = array(
					'post_type' => 'job',
					'posts_per_page'	=>	10,
					'paged' => get_query_var('paged'),
					'tax_query' => array(
						array(
							'taxonomy' => 'job-skill',
							'field'    => 'slug',
							'terms'    => $terms,
						),
					),
				); 
			}
			$loop = new WP_Query( $args ); 
			if ( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post(); 
					$saved			=	check_job(get_the_ID()) ? 'Saved' : 'Save';
					$class			=	($saved == 'Saved') ? 'disable_btn' : '';
					$location		=	get_post_meta(get_the_ID(),'address_for_the_job',true);
					$company_name	=	get_post_meta(get_the_ID(),'company_name',true);
					$term_list = wp_get_post_terms(get_the_ID(), 'job-sector', array("fields" => "all"));
				?>
					<div class="col-md-12 clearfix dcontent" id="dcontent">
						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h3>
						<p class="job_meta"><?=$company_name?></p>
						<p class="green_text job_meta"><?=$location?></p>
						<p class="blue_text job_meta">
							<?php
							if(count($term_list)){
								$list	=	'';
								foreach($term_list as $term){
									$list	=	$term->name.", ";
								}
								echo rtrim($list,", ");
							}
							?>
						</p>
						<div class="row">
							<div class="col-md-6">
								<a class="myButton <?=$class?>" href="javascript:void(0)" id="<?=get_the_ID()?>" onclick="autosave(this)"><?=$saved?></a>
							</div>
							<div class="col-md-6">
								<p>Posted by <?php echo get_the_author();?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></p>
							</div>
						</div>
					</div>
				<?php 
				endwhile;
				echo '<div class="col-md-12">';
				wp_pagenavi( array( 'query' => $loop ) );
				echo '</div>';
				wp_reset_postdata();
			}else{
				echo '<p>No job matched with your skills</p>';
			}
			?>
		</div>
	</div>
</div>
  

<?php get_footer(); ?>