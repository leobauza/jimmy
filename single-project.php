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
					<figure id="main-img" class="span8 l">
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
							<div class="<?php if(get_field('main_border')){ echo "border"; } ?>">
								<img src="<?php echo $main_image['url']; ?>" alt="" />
							</div>
							<?php if($main_image['caption']):?>
								<figcaption><p><?php echo $main_image['caption']; ?></p></figcaption>
							<?php endif;?>
						</div>
						<?php if($image_one):?>
						<div class="img-wrap <?php if(!$image_two && !$image_three && !$image_four && !$image_five){ echo "last"; }; ?>">
							<div class="<?php if(get_field('border_one')){ echo "border"; } ?>">
								<img src="<?php echo $image_one['url']; ?>" alt="" />
							</div>
							<?php if($image_one['caption']):?>
								<figcaption><p><?php echo $image_one['caption']; ?></p></figcaption>
							<?php endif;?>
						</div>
						<?php endif;?>
						<?php if($image_two):?>
						<div class="img-wrap <?php if(!$image_three && !$image_four && !$image_five){ echo "last"; }; ?>">
							<div class="<?php if(get_field('border_two')){ echo "border"; } ?>">
								<img src="<?php echo $image_two['url']; ?>" alt="" />
							</div>
							<?php if($image_two['caption']):?>
								<figcaption><p><?php echo $image_two['caption']; ?></p></figcaption>
							<?php endif;?>
						</div>
						<?php endif;?>
						<?php if($image_three):?>
						<div class="img-wrap <?php if(!$image_four && !$image_five){ echo "last"; }; ?>">
							<div class="<?php if(get_field('border_three')){ echo "border"; } ?>">
								<img src="<?php echo $image_three['url']; ?>" alt="" />
							</div>
							<?php if($image_three['caption']):?>
								<figcaption><p><?php echo $image_three['caption']; ?></p></figcaption>
							<?php endif;?>
						</div>
						<?php endif;?>
						<?php if($image_four):?>
						<div class="img-wrap <?php if(!$image_five){ echo "last"; }; ?>">
							<div class="<?php if(get_field('border_four')){ echo "border"; } ?>">
								<img src="<?php echo $image_four['url']; ?>" alt="" />
							</div>
							<?php if($image_four['caption']):?>
								<figcaption><p><?php echo $image_four['caption']; ?></p></figcaption>
							<?php endif;?>
						</div>
						<?php endif;?>
						<?php if($image_five):?>
						<div class="img-wrap last">
							<div class="<?php if(get_field('border_five')){ echo "border"; } ?>">
								<img src="<?php echo $image_five['url']; ?>" alt="" />
							</div>
							<?php if($image_five['caption']):?>
								<figcaption><p><?php echo $image_five['caption']; ?></p></figcaption>
							<?php endif;?>
						</div>
						<?php endif;?>

					</figure>
				</section>
			</div>
			<!-- end page content -->




		</section>
		<?php //edit_post_link('Edit this entry','','.'); ?>
	<?php endwhile; endif; ?>
	
	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->

<?php get_footer(); ?>




