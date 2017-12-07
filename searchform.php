

<form method="get" id="search" action="<?php bloginfo('siteurl'); ?>">
	<input type="text" name="s" value="<?php echo get_search_query(); ?>"/>
	<button type="submit"><i class="fa fa-search"></i></button>
</form>
