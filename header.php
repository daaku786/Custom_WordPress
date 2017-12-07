<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php is_front_page()?bloginfo('name'):wp_title( '|', true, 'right' ); ?></title>
    <!-- Le styles -->
    <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet"/>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>
<body>
	<div class="blog-masthead">
		<div class="container" id="header">
			<div class="col-md-12 padnone">
				<div class="col-md-6 mtb30">
					<?php /* lm_display_logo(); */ ?>
					<h1 class="site_title"><a href="<?php echo site_url();?>">Freshersearch</a></h1>
				</div>
				<div class="col-md-6 ptop10 prlnone mt30 text-right">
					<div class="col-md-12">
						<?php if ( is_active_sidebar( 'header-1' ) ) { dynamic_sidebar( 'header-1' ); } ?>
					</div>
					<div class="col-md-12">
						<?php if ( is_active_sidebar( 'header-2' ) ) { dynamic_sidebar( 'header-2' ); } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 padnone" id="primary-navigation">
			<div class="container">
				<div class="menu-primary-menu-container col-md-9">
					<nav class="navigation clearfix mobile-menu-wrapper">
						<?php wp_nav_menu( array('theme_location' => 'header-menu','menu_class'=>'menu clearfix toggle-menu','walker'=>new My_Walker_Nav_Menu())); ?>
					</nav>	
				</div>
				<div class="col-md-3 padnone text-right">
					<?php  get_search_form(); ?>
					
				</div>
				<!--div class="col-md-3 text-right"></div-->
			</div>
		</div>
	</div>
	<div class="container">
		<?php /* echo do_shortcode( '[breadcrumb]' ); */ ?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
    
	
	  