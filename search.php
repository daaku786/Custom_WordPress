<?php
get_header();
global $wp_query;
?>
<div id="container" class="col-md-8 main_content">
    <div id="content" class="pageContent">

		<h1 class="entry-title"> <?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>" </h1>
		<?php if ( have_posts() ) { ?>
			<ul class="search_items">
			<?php
			// TO SHOW THE PAGE CONTENTS
			while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				<li>
					<h3><a href="<?php echo get_permalink(); ?>"><?php the_title();  ?></a></h3>
					<?php  the_post_thumbnail('medium') ?>
					<?php echo substr(get_the_excerpt(), 0,200); ?>
					<div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
				</li>
			<?php
			endwhile; //resetting the page loop
			wp_reset_query(); //resetting the page query
			?>
			<?php paginate_links(); ?>
			</ul>
        <?php } ?>
    </div><!-- #content -->         
</div><!-- #container -->

<?php get_sidebar();?>
<?php get_footer();?>
