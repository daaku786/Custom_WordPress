</div> <!-- /container -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-widgets col-md-12 clearfix">
				<div class="col-md-4 col-xs-4"><?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); } ?></div>
				<div class="col-md-4 col-xs-4"><?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } ?></div>
				<div class="col-md-4 col-xs-4"><?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); } ?></div>
			</div>
			<div class="footer-widgets col-md-12 footer_text">
				<?php if ( is_active_sidebar( 'footer-4' ) ) { dynamic_sidebar( 'footer-4' ); } ?>
			</div>
			<!--div class="footer-widget-bottom col-md-12"></div-->
		</div>
		<!--div class="row">
			<div class="blog-footer-text">
				<div class="container">
					<div class="row">
						<div class="col-md-12 ptop10">
							<div class="col-md-12">
								<p class="footer-copyright">&copy; Portal 2016</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p>
				<a href="#">Back to top</a>
			</p>
		</div-->
	</div>
</footer>	
<?php wp_footer(); ?>
</body>
</html>