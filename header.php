<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css">
	
	<script type="text/javascript" src="//use.typekit.net/bsz3zdn.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="site-header">
		<div class="inner group">
			<h1 id="brand"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a><div class="loading"></div></h1>
			<nav id="site-nav" class="links-wrap">
				<?php
					//create "main menu" in wordpress backend
					wp_nav_menu( array(
					'menu' => 'main menu',
					'container' =>false,
					'menu_class' => 'group',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'depth' => 0,
					'walker' => new description_walker())
					 );
				;?>
			</nav>
			<nav id="social-top">
				<ul class="group">
					<li><a href="http://dribbble.com/billyfrench" target="_blank" class="dribbble">dribbble</a></li>
					<li><a href="https://twitter.com/billehfrench" target="_blank" class="twitter">twitter</a></li>
				</ul>
			</nav>
			<i class="shadow"></i>
		</div>
	</header>

	

		<!-- <div class="description"><?php //bloginfo('description'); ?></div> -->
		
		
		
		