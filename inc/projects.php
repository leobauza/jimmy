<!-- selector -->
<nav id="filters">
	<ul>
		<li><a href="#" data-filter="*">All</a></li>
		<li><a href="#" data-filter=".poster">Posters</a></li>
		<li><a href="#" data-filter=".multimedia">Multimedia</a></li>
		<li><a href="#" data-filter=".print">Print/Packaging</a></li>
		<li class="l"><a href="#" data-filter=".other">Other</a></li>
	</ul>
</nav>

	<?php
	$args = array( 'post_type' => 'project', 'posts_per_page' => 100, 'order'=>'ASC' );
	$my_query = new WP_Query( $args );
	// See links provided by alchymyth for more info on query parameters
	// What amount of posts/thumbnails (whatever) to show before closing the element and opening another
	?>
	<?php if( $my_query->have_posts() ) : ?>
		<!-- open starting div before loop -->
		<section id="projects" class="links-wrap"> 
			<noscript>
				please enable javascript to see projects
			</noscript>

		<?php while( $my_query->have_posts() ) : $my_query->the_post();
			//add the correct class
			$projectType = get_field('project_type');
			echo "<div class=\"item ". $projectType. "\">";
			$main_image = get_field('main_image');
			$custom_thumb = get_field('custom_thumb');
			?>
			<a href="<?php the_permalink(); ?>">
				<?php if(!$custom_thumb ) :?>
				<img src="<?php echo $main_image['sizes']['sorter-size']; ?>" alt="" />
				<?php else: ?>
				<img src="<?php echo $custom_thumb['url']; ?>" alt="" />
				<?php endif; ?>
					
				<div class="item-overlay">
					<h3><?php the_title();?></h3>
				</div>
			</a>
			<?php echo "</div>";?>
		<?php endwhile; ?>
		</section>
	<?php endif;
	wp_reset_query();?>

