<?php

	/*
	
	Template Name: Content -> Image
	
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
			<section id="about" class="group" data-margin="30">
				<aside class="feat-text">
					<article class="summary">
						<h2><?php print get_field('headline');?></h2>
						<?php the_content(); ?>
					</article>
				</aside>
				<figure class="feat-img">
					<?php
					$feat_image = get_field('feature_img');
					//var_dump($main_image);
					?>
					<img src="<?php echo $feat_image['url']; ?>" alt="" />
				</figure>
			</section> <!-- end data-margin -->
		</div>


		<noscript>
			<div class="page-cont noscript">
				<!-- content content -->
				<section id="about" class="group" data-margin="30">
					<aside class="feat-text">
						<article class="summary">
							<h2><?php print get_field('headline');?></h2>
							<?php the_content(); ?>
						</article>
					</aside>
					<figure class="feat-img">
						<?php
						$feat_image = get_field('feature_img');
						//var_dump($main_image);
						?>
						<img src="<?php echo $feat_image['url']; ?>" alt="" />
					</figure>
				</section> <!-- end data-margin -->
			</div>
		</noscript>


		<!-- end page content -->
	</section>

<?php endwhile; endif; ?>

	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->



<?php get_footer(); ?>








