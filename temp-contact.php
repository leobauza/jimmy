<?php

	/*
	
	Template Name: temp-contact-form
	
	*/

?>
<?php get_header(); ?>

<div class="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- page content -->
	<section class="page-wrap">

		<?php include (TEMPLATEPATH . '/inc/loadoverlay.php' ); ?>

		<div class="page-cont">
			<!-- content content -->
			<section id="hero" class="group" data-margin="30">
				<figure class="feat-img">
					<?php
					$feat_image = get_field('feature_img');
					//var_dump($main_image);
					?>
					<img src="<?php echo $feat_image['url']; ?>" alt="" />
				</figure>
				<aside class="feat-text">
					<article class="summary">
						<h2><?php print get_field('headline');?></h2>
						
						<?print the_content();?>
						
					</article>
				</aside>
			</section> <!-- end data-margin -->
		</div>


		<!-- end page content -->
	</section>

<?php endwhile; endif; ?>

	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->



<?php get_footer(); ?>








