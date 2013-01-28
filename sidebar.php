<div id="aside">
	
		<!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

		<?php get_search_form(); ?>
	
		<?php wp_nav_menu(array('menu' => 'main menu'))?>
		
	
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

	<?php endif; ?>

</div>