<?php get_header(); ?>
 
     <!--Breadcrumb Section-->
		<section id="breadcrumb-section" data-bg-img="../img/breadcrumb.jpg">
			<div class="inner-container container">
				<div class="ravis-title">
					<div class="inner-box">
						<div class="title">Page Not Found</div>
						<div class="sub-title">Some description about your hotel</div>
					</div>
				</div>


				<div class="not-found-container">
					<div class="desc">Would you like to go to <a href="#">homepage</a> instead?</div>
					<!-- Search Box -->
					<div class="search-box">
						<form class="search-form">
							<label>
								<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
							</label>
							<input type="submit" class="search-submit" value="Search ... ">
						</form>
					</div>
				</div>

				<div class="breadcrumb">
					<ul class="list-inline">
						<li><a href="../index.html">Home</a></li>
						<li class="current"><a href="#">Page Not Found</a></li>
					</ul>
				</div>
			</div>
		</section>
		<!--End of Breadcrumb Section-->
<?php get_footer(); ?>