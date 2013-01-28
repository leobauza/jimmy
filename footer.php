	<footer id="site-footer">
		<p class="copy">&copy; <?php echo date("Y"); echo " "; bloginfo('name'); ?> | <span class="leo">developed by <a href="http://leobauza.com" target="_blank">the fine people of fairfax</a></span></p>
	</footer>

	<?php wp_footer(); ?>
	
	<!-- Don't forget analytics -->
	
	
	<script src="<?php bloginfo('template_url'); ?>/js/script.js"></script> 
	
	<script>
	(function(window,undefined){

		var $winSize = $(window).width();


		// Prepare
		var History = window.History; // Note: We are using a capital H instead of a lower h
		if ( !History.enabled ) {
				 // History.js is disabled for this browser.
				 // This is because we can optionally choose to support HTML4 browsers or not.
				return false;
		}

		//set up some vars
		var 
			rootUrl = History.getRootUrl(),
			iniState = History.getState(),
			iniUrl = iniState.url,
			activeClass = 'active',
			activeSelector = '.active',
			menuChildrenSelector = '> li,> ul > li, > div',
			$menu = $('.links-wrap')
		;


		// Bind to StateChange Event
		History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
			var 
				State = History.getState(); // Note: We are using History.getState() instead of event.state
		});


		// HTML Helper
		var documentHtml = function(html){
			// Prepare
			var result = String(html)
				.replace(/<\!DOCTYPE[^>]*>/i, '')
				.replace(/<(html|head|body|title|meta|script)([\s\>])/gi,'<div class="document-$1"$2')
				.replace(/<\/(html|head|body|title|meta|script)\>/gi,'</div>')
			;
			// Return
			return result;
		};

		//check internals
		$("a").each(function(){
			var
				$this = $(this),
				url = $this.attr('href')||''
			;
			//check links
			if(url.substring(0,rootUrl.length) === rootUrl) {//|| url.indexOf(':') === -1) {
				$this.addClass('internal')
			}

			if(iniUrl === url) {
				$this.parent().addClass('active');
			}

		});


		//navigation click
		$("a.internal").live("click",function(e){
			
			scroll(0,0); scrollTo(0,0);
			
			$('.load-overlay').fadeIn();
			$('.page-cont').slideUp();
			var 
				url = $(this).attr('href'),
				relativeUrl = url.replace(rootUrl,'');
			;
			//request that page, greg style
			var pageRequest = $.ajax({
				url: url,
				success: function(data){
					//prepare
					var
						$data = $(documentHtml(data)),
						$title = $data.find('.document-title:first').text(),
						$newPage = $data.find(".page-cont").html(),
						$menuChildren
					;
					// Update the menu
					$menuChildren = $menu.find(menuChildrenSelector);
					$menuChildren.filter(activeSelector).removeClass(activeClass);
					$menuChildren = $menuChildren.has('a[href^="'+relativeUrl+'"],a[href^="/'+relativeUrl+'"],a[href^="'+url+'"]');
					if ( $menuChildren.length === 1 ) { $menuChildren.addClass(activeClass); }

					$('.page-cont').html($newPage);

					// update google analytics here
					// if ( typeof window.pageTracker !== 'undefined' ) {
					// 	window.pageTracker._trackPageview(relativeUrl);
					// 	//or for the newer tracking code
					// 	_gaq.push(['_trackPageview', relativeUrl]);
					// }

					History.pushState(null, $title, url); // uh? change title and update url



				}
			}); //end ajax
			//after a succesful page request rock out
			pageRequest.done(function(msg){
				$('.shadow').css('top','100%');
				$('.page-cont').delay(500).slideDown(750, function(){
					$('.load-overlay').fadeOut();
					//add approrpiate centering for page area
					if($winSize >= 980) {
						if($('.page-cont [data-margin]').length) {
							var
								modMar = parseFloat($('.page-cont [data-margin]').attr('data-margin')),
								imgheight = $('.page-cont img').height()
							;
							$('.page-cont [data-margin]').applyMargins(modMar, imgheight);
						}
					} else {
						$('.page-cont [data-margin] .summary').attr('style','margin:20px 15px');
					}
				});

				//check internals after ajax
				$(".more-btn").each(function(){
					var
						$this = $(this),
						url = $this.attr('href')||''
					;
					//check links
					if(url.substring(0,rootUrl.length) === rootUrl) {//|| url.indexOf(':') === -1) {
						$this.addClass('internal')
					}
				}); //end each function
			}); //end page request
			e.preventDefault();
		}); //end click

		//old only on landing page
		// if($('#hero').length) {
		// 	$('.home .page').delay(500).slideDown(750, function(){
		// 		$('.home .load-overlay').fadeOut();
		// 		//call the margin set
		// 		if($('.page [data-margin]').length) {
		// 			if($winSize < 980) {
		// 				$('.page [data-margin] .summary').attr('style','margin:20px 15px');
		// 			} else {
		// 				var modMar = parseFloat($('.page [data-margin]').attr('data-margin'));
		// 				$('.page [data-margin]').applyMargins(modMar);
		// 			} 
		// 		}
		// 	});
		// }
	})(window);

	</script>

</body>
</html>
