<?php get_header(); ?>


<div class="container">
	<!-- page content -->
	<section class="page-wrap">

		<?php include (TEMPLATEPATH . '/inc/loadoverlay.php' ); ?>


		<div class="page-cont">
			<!-- featured content -->
			<?php
			$args = array( 'post_type' => 'project', 'posts_per_page' => 100, 'order'=>'DESC', 'orderby'=> 'modified');
			$my_query = new WP_Query( $args );
			// See links provided by alchymyth for more info on query parameters
			// What amount of posts/thumbnails (whatever) to show before closing the element and opening another
			?>
			<?php if( $my_query->have_posts() ) : ?>
				<!-- open starting div before loop -->
				<section id="hero" class="group" data-margin="60">
				<?php while( $my_query->have_posts() ) : $my_query->the_post();?>
					<?php
					if( get_field('feature_this') && !isset($done)):
					?>
					<figure class="feat-img">
						<?php
						if(get_field('featured_image')):
							$feature_image = get_field('featured_image');
						else:
							echo "no-image";
						endif;
						?>
						<img src="<?php echo $feature_image['url']; ?>" alt="" />
					</figure>
					<aside class="feat-text">
						<article class="summary">
							<h2><?php the_title();?></h2>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="more-btn">More</a>
						</article>
					</aside>
					<?php
					$done = true;
					else:
						//nothing
					endif;
					?>
					
				<?php endwhile; ?>
				</section>
			<?php 
			endif;
			wp_reset_query();
			?>



		</div>
		<!-- end page content -->

		<noscript>
			<div class="page-cont noscript">
				<!-- featured content -->
				<?php
				$args = array( 'post_type' => 'project', 'posts_per_page' => 100, 'order'=>'DESC', 'orderby'=> 'modified');
				$my_query = new WP_Query( $args );
				// See links provided by alchymyth for more info on query parameters
				// What amount of posts/thumbnails (whatever) to show before closing the element and opening another
				?>
				<?php if( $my_query->have_posts() ) : ?>
					<!-- open starting div before loop -->
					<section id="hero" class="group" data-margin="60">
					<?php while( $my_query->have_posts() ) : $my_query->the_post();?>
						<?php
						if( get_field('feature_this') && !isset($done2)):
						?>
						<figure class="feat-img">
							<?php
							if(get_field('featured_image')):
								$feature_image = get_field('featured_image');
							else:
								echo "no-image";
							endif;
							?>
							<img src="<?php echo $feature_image['url']; ?>" alt="" />
						</figure>
						<aside class="feat-text">
							<article class="summary">
								<h2><?php the_title();?></h2>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="more-btn">More</a>
							</article>
						</aside>
						<?php
						$done2 = true;
						else:
							//nothing
						endif;
						?>

					<?php endwhile; ?>
					</section>
				<?php 
				endif;
				wp_reset_query();
				?>
			</div>
		</noscript>


	</section>


	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->

<?php get_footer(); ?>








