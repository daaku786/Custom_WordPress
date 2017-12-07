<?php
/**
 * TPortal functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Portal only works in WordPress 4.4 or later.
 */
 // Our custom post type function
 $format_in = 'Ymd'; // the format your value is saved in (set in the field options)
 $format_out = 'd-m-Y';
function my_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
	/* wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' ); */
	wp_enqueue_style( 'fa', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/css/custom.css' );
	wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/upload.js' );
	wp_localize_script( 'custom-script', 'postmah', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}

add_action( 'wp_enqueue_scripts', 'my_scripts' ); 
 //Register Custom Post
function my_custom_post_job() {
  $labels = array(
    'name'               => _x( 'Job', 'post type general name' ),
    'singular_name'      => _x( 'Job', 'post type singular name' ),
    'add_new'            => _x( 'Add new job', 'book' ),
    'add_new_item'       => __( 'Add New Job' ),
    'edit_item'          => __( 'Edit Job' ),
    'new_item'           => __( 'New Job' ),
    'all_items'          => __( 'All Jobs' ),
    'view_item'          => __( 'View Job' ),
    'search_items'       => __( 'Search Job' ),
    'not_found'          => __( 'No Job' ),
    'not_found_in_trash' => __( 'No Job found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Jobs'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Jobs and job specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
	/* 'rewrite' 		=> array( 'slug' => '%job-category%', 'with_front' => false ), */
  );
  register_post_type( 'job', $args ); 
}
add_action( 'init', 'my_custom_post_job' );
//
function my_custom_post_mock_test() {
  $labels = array(
    'name'               => _x( 'Mock Test', 'post type general name' ),
    'singular_name'      => _x( 'Mock Test', 'post type singular name' ),
    'add_new'            => _x( 'Add new test', 'book' ),
    'add_new_item'       => __( 'Add new test' ),
    'edit_item'          => __( 'Edit Mock Test' ),
    'new_item'           => __( 'New Mock Test' ),
    'all_items'          => __( 'All Mock Tests' ),
    'view_item'          => __( 'View Mock Test' ),
    'search_items'       => __( 'Search Mock Test' ),
    'not_found'          => __( 'No Mock Test' ),
    'not_found_in_trash' => __( 'No Mock Test found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Mock Tests'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Jobs and job specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'mock_test', $args ); 
}
add_action( 'init', 'my_custom_post_mock_test' );

function my_custom_post_paper() {
  $labels = array(
    'name'               => _x( 'Placement Paper', 'post type general name' ),
    'singular_name'      => _x( 'Placement Paper', 'post type singular name' ),
    'add_new'            => _x( 'Add new paper', 'book' ),
    'add_new_item'       => __( 'Add New Paper' ),
    'edit_item'          => __( 'Edit Paper' ),
    'new_item'           => __( 'New Paper' ),
    'all_items'          => __( 'All Paper' ),
    'view_item'          => __( 'View Paper' ),
    'search_items'       => __( 'Search Paper' ),
    'not_found'          => __( 'No Paper' ), 
    'not_found_in_trash' => __( 'No Paper found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Papers'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our Jobs and job specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'paper', $args ); 
}
add_action( 'init', 'my_custom_post_paper' );
// Register  Taxonomy
function my_taxonomies_job() {
  $labels = array(
    'name'              => _x( 'Job Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'job Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Categories' ),
    'all_items'         => __( 'All Job Categories' ),
    'parent_item'       => __( 'Parent Job Category' ),
    'parent_item_colon' => __( 'Parent Job Category:' ),
    'edit_item'         => __( 'Edit Job Category' ), 
    'update_item'       => __( 'Update Job Category' ),
    'add_new_item'      => __( 'Add New Job Category' ),
    'new_item_name'     => __( 'New Job Category' ),
    'menu_name'         => __( 'Job Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  $labels2 = array(
    'name'              => _x( 'Job Locations', 'taxonomy general name' ),
    'singular_name'     => _x( 'job Location', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Locations' ),
    'all_items'         => __( 'All Job Locations' ),
    'parent_item'       => __( 'Parent Job Location' ),
    'parent_item_colon' => __( 'Parent Job Location:' ),
    'edit_item'         => __( 'Edit Job Location' ), 
    'update_item'       => __( 'Update Job Location' ),
    'add_new_item'      => __( 'Add New Job Location' ),
    'new_item_name'     => __( 'New Job Location' ),
    'menu_name'         => __( 'Job Locations' ),
  );
  $args2 = array(
    'labels' => $labels2,
    'hierarchical' => true,
  );
  
  $labels3 = array(
    'name'              => _x( 'Job Sectors', 'taxonomy general name' ),
    'singular_name'     => _x( 'job Sector', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Sectors' ),
    'all_items'         => __( 'All Job Sectors' ),
    'parent_item'       => __( 'Parent Job Sector' ),
    'parent_item_colon' => __( 'Parent Job Sector:' ),
    'edit_item'         => __( 'Edit Job Sector' ), 
    'update_item'       => __( 'Update Job Sector' ),
    'add_new_item'      => __( 'Add New Job Sector' ),
    'new_item_name'     => __( 'New Job Sector' ),
    'menu_name'         => __( 'Job Sectors' ),
  );
  $args3 = array(
    'labels' => $labels3,
    'hierarchical' => true,
  );
    $labels4 = array(
    'name'              => _x( 'Job Skills', 'taxonomy general name' ),
    'singular_name'     => _x( 'job Skill', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Skill' ),
    'all_items'         => __( 'All Job Skill' ),
    'parent_item'       => __( 'Parent Job Skill' ),
    'parent_item_colon' => __( 'Parent Job Skill:' ),
    'edit_item'         => __( 'Edit Job Skill' ), 
    'update_item'       => __( 'Update Job Skill' ),
    'add_new_item'      => __( 'Add New Job Skill' ),
    'new_item_name'     => __( 'New Job Skill' ),
    'menu_name'         => __( 'Job Skills' ),
  );
  $args4 = array(
    'labels' => $labels4,
    'hierarchical' => true,
  );
      $labels5 = array(
    'name'              => _x( 'Job Company', 'taxonomy general name' ),
    'singular_name'     => _x( 'job Company', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Job Company' ),
    'all_items'         => __( 'All Job Company' ),
    'parent_item'       => __( 'Parent Job Company' ),
    'parent_item_colon' => __( 'Parent Job Company:' ),
    'edit_item'         => __( 'Edit Job Company' ), 
    'update_item'       => __( 'Update Job Company' ),
    'add_new_item'      => __( 'Add New Job Company' ),
    'new_item_name'     => __( 'New Job Company' ),
    'menu_name'         => __( 'Job Companies' ),
  );
  $args5 = array(
    'labels' => $labels5,
    'hierarchical' => true,
  );
  register_taxonomy( 'job-category', 'job', $args );
  register_taxonomy( 'job-location', 'job', $args2 );
  register_taxonomy( 'job-sector', 'job', $args3 );
  register_taxonomy( 'job-skill', 'job', $args4 );
  register_taxonomy( 'job-company', 'job', $args5 );
 
}
add_action( 'init', 'my_taxonomies_job', 0 );


//Register Menu


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'primary-menu' => __( 'Primary Menu' ),
	  'footer-menu' => __( 'Footer Menu' ),
	  
    )
  );
}
add_action( 'init', 'register_my_menus' );
//Register widget

// Add Google Fonts
function startwordpress_google_fonts() {
				wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
				wp_enqueue_style( 'OpenSans');
		}

add_action('wp_print_styles', 'startwordpress_google_fonts');

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'theme-slug' ),
		'id' => 'sidebar-news',
		'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Footer 1', 'theme-slug' ),
		'id' => 'footer-1',
		'description' => __( 'Widgets in this area will be shown in footer.', 'theme-slug' ),
		'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name' => __( 'Footer 2', 'theme-slug' ),
		'id' => 'footer-2',
		'description' => __( 'Widgets in this area will be shown in footer.', 'theme-slug' ),
		'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name' => __( 'Footer 3', 'theme-slug' ),
		'id' => 'footer-3',
		'description' => __( 'Widgets in this area will be shown in footer.', 'theme-slug' ),
		'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name' => __( 'Footer About Text', 'theme-slug' ),
		'id' => 'footer-4',
		'description' => __( 'Widgets in this area will be shown in footer.', 'theme-slug' ),
		'before_widget' => '<div class="footer_widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name' => __( 'Header 1', 'theme-slug' ),
		'id' => 'header-1',
		'description' => __( 'Widgets in this area will be shown in header.', 'theme-slug' ),
		'before_widget' => '<div class="header-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name' => __( 'Header 2', 'theme-slug' ),
		'id' => 'header-2',
		'description' => __( 'Widgets in this area will be shown in header.', 'theme-slug' ),
		'before_widget' => '<div class="header-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	));
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'theme-slug' ),
		'id' => 'left-sidebar',
		'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

  /*
   * THE REST OF THE SIDEBAR REGISTRATION CODE FROM twentyten_widgets_init() GOES HERE
   */
}
/* Term data*/


function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'job' ){
        $terms = wp_get_object_terms( $post->ID, 'job-category' );
        if( $terms ){
            return str_replace( '%job_category%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );

/* function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'job')
        return $link;

    if ($cats = get_the_terms($post->ID, 'job-category'))
    {
        $link = str_replace('%taxonomy_name%', get_taxonomy_parents(array_pop($cats)->term_id, 'job-category', false, '/', true), $link); // see custom function defined below
    }
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2); */




//REDIRECT SUBSCRIBERS AUTOMATICALLY TO A CUSTOM URL

function tml_new_user_registered( $user_id ) {

	global $theme_my_login;

	$redirect = $theme_my_login->options->get_option( array( 'redirection', 'subscriber' ) );

	if ($redirect['login_type'] == 'custom') {

		if (ICL_LANGUAGE_CODE == 'es') $redirect_url = trailingslashit(get_bloginfo('url')).'mimcl-tablero/';

		else $redirect_url = $redirect['login_url'];

	}

	else $redirect_url = admin_url( 'profile.php' );

	wp_set_auth_cookie( $user_id, false, is_ssl() );

	wp_redirect( $redirect_url );

	exit;
}


class My_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropDown sub-menu\">\n";
	}
}


add_action( 'wp_ajax_nopriv_save_job', 'save_job' );
add_action( 'wp_ajax_save_job', 'save_job' );

function save_job()
{
	if(is_user_logged_in()){
		global $wpdb;
		global $current_user;
		wp_get_current_user();
		$user_id	=	$current_user->ID;
		$job_id		=	$_POST["job_id"];
		$date_saved	=	date("y-m-d h:i:s");
		//add insert query here
		
		$wpdb->insert($wpdb->prefix . 'saved_jobs', array(
							'user_id' 			=> 	$user_id,
							'job_id' 			=> 	$job_id,
							'date_saved' 		=> 	$date_saved, 
						));
		echo '1';die;
	}else{
		echo '0';die;
	}
	
}

function check_job($job_id){
	global $wpdb;
	global $current_user;
	wp_get_current_user();
	$user_id	=	$current_user->ID;
	$table		=	$wpdb->prefix . 'saved_jobs';
	$mylink 	= 	$wpdb->get_row( "SELECT * FROM $table WHERE user_id = $user_id and job_id=$job_id" );
	return (isset($mylink)) ? true : false;
}


add_shortcode('jobseeker_menu','jobseeker_menu_callback');

function jobseeker_menu_callback()
{
	ob_start();
	$current_user 	= 	wp_get_current_user();
    ?>
	<ul id="jb_menu">
		<li class="jb_menu_header"><h3 class="jb_list_header">Inbox</h3></li>
		<li><a href="javascript:void(0)">Improve Your Profile</a></li>
		<li><a href="javascript:void(0)">Recruiter Messages</a></li>
		<li class="jb_menu_header"><h3 class="jb_list_header">Profile</h3></li>
		<li><a href="<?=site_url('update-profile/'.$current_user->user_login.'/?profiletab=main&um_action=edit')?>">Update Profile</a></li>
		<li><a href="<?=site_url('manage-resume')?>">Manage Cover Letters </a></li>
		<li><a href="<?=site_url('upload-photo')?>">Upload Photo</a></li>
		<li class="jb_menu_header"><h3 class="jb_list_header">Jobs & Applications</h3></li>
		<li><a href="<?=site_url('saved-job')?>">Saved Jobs</a></li>
	</ul>
	<?php
    return ob_get_clean();   
}

