<?php

	/*
	
	Template Name: Categories
	
	*/

?>

<?php get_header(); ?>

<div id="contentwrapper">
	
	<?php get_sidebar(); ?>
	<div id="content">
	<?php
		$categoriesCF = get_post_meta($post -> ID, 'categories', true);
		// gets the categories listed in the meta 
		
		$allCategories = explode(",", $categoriesCF);
		// creates the array of categories separating at the ","
		
		foreach ($allCategories as $category) { //loop to create categories title and link
			
			$pieces = explode("|", $category);
			//separates the post id from the category title to use in the page
			
			$link = get_permalink($pieces[1]); 
			//writes the title and permalink for the appropriate category
			echo "<div class='set-container group'>";
			echo "<h3><a href='$link'>" . $pieces[0] . "</a></h3>";
			
			//query to return the child pages of the category the loop is currently on
			query_posts("posts_per_page=-1&post_type=page&post_parent=$pieces[1]");
				// -1 means return all post, page means return only pages
			
			//start loop to make the boxes
			while(have_posts()) : the_post(); ?>
			
			<div class="box">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<p>$<?php echo get_post_meta($post -> ID, 'price', true); ?></p>
				<a href="<?php the_permalink(); ?>">Go To <?php the_title(); ?> Page</a>
			</div>
			
			<?php endwhile; wp_reset_query(); ?>
	<?php 
		echo "</div>";
		//close foreach loop
		};
	?>
	</div>
</div>




<?php get_footer(); ?>