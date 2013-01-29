<?php get_header(); ?>

<div class="container">
	<!-- page content -->
	<section class="page-wrap">
		<?php include (TEMPLATEPATH . '/inc/loadoverlay.php' ); ?>
		<div class="page-cont">
			<section id="hero" class="group" data-margin="60">
				<figure class="feat-img">
					<img src="<?php bloginfo('template_url'); ?>/img/error_404.jpg" alt="Error 404">
				</figure>
				<aside class="feat-text">
					<article class="summary">
						<h2>Error 404 - Page Not Found</h2>
						<p>You've made a terrible mistake coming here...please go away. Hopefully this Image makes Billy come up with a real 404 page error image.</p>
						<a href="#filter" class="more-btn">Close this terrible error</a>
					</article>
				</aside>
			</section>
		</div>
		<!-- end page content -->
	</section>
	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->


<?php get_footer(); ?>














