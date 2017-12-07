<div id="sidebar" class="col-md-4">
	<?php if ( is_active_sidebar( 'sidebar-news' ) ) { dynamic_sidebar( 'sidebar-news' ); } ?>
</div>
<?php /* if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="secondary" class="sidebar-container" role="complementary">
        <div class="widget-area">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- .widget-area -->
    </div><!-- #secondary -->
<?php else : ?>
    <!-- Create some custom HTML or call the_widget().  It's up to you. Here we have created custom widget -->
    <aside id="archives" class="widget">
        <h3 class="widget-title"><?php _e( 'Categories', 'theme-slug' ); ?></h3>
        <div class="widget-content">
            <ul>
                <?php wp_list_categories( array(  ) ); ?>
            </ul>
        </div>
    </aside>
<?php endif; */
?>
<div id="sidebar" class="col-md-4">
	<?php if ( is_active_sidebar( 'left-sidebar' ) ) { dynamic_sidebar( 'left-sidebar' ); } ?>
</div>

					