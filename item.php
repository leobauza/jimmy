<?php

	/*
	
	Template Name: Item
	
	*/

?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<div id="contentwrapper">
	
	<?php get_sidebar(); ?>
	
	<div id="content">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<p>$<?php echo get_post_meta($post -> ID, 'price', true); ?></p>
	</div>
</div>


<?php endwhile; endif; ?>

<?php get_footer(); ?>