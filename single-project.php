<?php get_header(); ?>
<div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- page content -->
		<section class="page-wrap">

			<?php include (TEMPLATEPATH . '/inc/loadoverlay.php' ); ?>

			<div class="page-cont">
				<!-- featured content -->
				<section id="single-project" class="row-fluid">
					<aside class="span4">
						<article class="summary">
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
							<a href="#filter" class="more-btn">Back to work</a>
						</article>
					</aside>
					<figure id="main-img" class="span8">
						<?php
						
							$main_image = get_field('main_image');
							$image_one = get_field('image_one');
							$image_two = get_field('image_two');
							$image_three = get_field('image_three');
							$image_four = get_field('image_four');
							$image_five = get_field('image_five');
							//var_dump($main_image);
						?>
						<div class="img-wrap first">
							<img src="<?php echo $main_image['url']; ?>" alt="" />
						</div>
						<?php if($image_one):?>
						<div class="img-wrap <?php if(!$image_two && !$image_three && !$image_four && !$image_five){ echo "last"; }; ?>">
							<img src="<?php echo $image_one['url']; ?>" alt="" />
						</div>
						<?php endif;?>
						<?php if($image_two):?>
						<div class="img-wrap <?php if(!$image_three && !$image_four && !$image_five){ echo "last"; }; ?>">
							<img src="<?php echo $image_two['url']; ?>" alt="" />
						</div>
						<?php endif;?>
						<?php if($image_three):?>
						<div class="img-wrap <?php if(!$image_four && !$image_five){ echo "last"; }; ?>">
							<img src="<?php echo $image_three['url']; ?>" alt="" />
						</div>
						<?php endif;?>
						<?php if($image_four):?>
						<div class="img-wrap <?php if(!$image_five){ echo "last"; }; ?>">
							<img src="<?php echo $image_four['url']; ?>" alt="" />
						</div>
						<?php endif;?>
						<?php if($image_five):?>
						<div class="img-wrap last">
							<img src="<?php echo $image_five['url']; ?>" alt="" />
						</div>
						<?php endif;?>




					</figure>
				</section>
			</div>
			<!-- end page content -->

			<noscript>
				<div class="page-cont">
					<!-- featured content -->
					<section id="single-project" class="row-fluid">
						<aside class="span4">
							<article class="summary">
								<h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
								<a href="#filter" class="more-btn">Back to work</a>
							</article>
						</aside>
						<figure id="main-img" class="span8">
							<?php

								$main_image = get_field('main_image');
								//var_dump($main_image);
							?>
							<div class="img-wrap">
								<img src="<?php echo $main_image['url']; ?>" alt="" />
							</div>
						</figure>
					</section>
				</div>
			</noscript>


		</section>
		<?php //edit_post_link('Edit this entry','','.'); ?>
	<?php endwhile; endif; ?>
	
	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->

<?php get_footer(); ?>




