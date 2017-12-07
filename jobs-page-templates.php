<?php /* Template Name: jobs-page-template */ ?>
<?php get_header(); ?>
<?php
/*
* Template Name:jobs-page-template
*/
get_header(); ?>

<div id="container">
    <div id="content" class="pageContent">

    <h1 class="entry-title"><?/*php the_title(); 
	*/?></h1> <!-- Page Title -->
    <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>

    <?php
    // TO SHOW THE POST CONTENTS
    ?>                        
        <?php
        $my_query = new WP_Query( 'Govt Jobs.' ); // I used a category id 1 as an example
        ?>
        <?php if ( $my_query->have_posts() ) : ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?/*php while ($my_query->have_posts()) : $my_query->the_post(); ?>

            <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Queried Post Title -->
            <div class="entry-content">
                <?php the_excerpt(); ?> <!-- Queried Post Excerpts -->
            </div><!-- .entry-content -->

        <?php endwhile; //resetting the post loop */?>

        </div><!-- #post-<?php the_ID(); ?> -->

        <?php
        wp_reset_postdata(); //resetting the post query
        endif;
        ?>
		<?php 
    query_posts(array( 
        'post_type' => 'job',
        'showposts' => 4 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <p><?php echo get_the_excerpt(); ?></p>
<?php endwhile;?>

    </div><!-- #content -->         
</div><!-- #container -->



<!--Display Category-->

	


<?php get_footer(); ?>


