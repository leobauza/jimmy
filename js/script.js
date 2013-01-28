/* 
 * =============================================================
 * v.awesome
 * =============================================================
 */
(function( $ ){
	//apply margins plugin
	$.fn.applyMargins = function(sideMar, imgH) {
		id = "#" + this.attr('id');
		//get the margins
		if(imgH < 200) {
			imgH = 200;
		}
		var $heightMargin = Math.ceil((imgH - $(id + ' .summary').height())/2);
		
		//set appropriate margins
		$(id + ' .summary').css({
			margin: $heightMargin + "px " + sideMar + "px " + "0px " + sideMar + "px"
		});
	};
})( jQuery );



jQuery(function(){
/* 
 * =============================================================
 * IE FIXES
 * =============================================================
 */

// Returns the version of Internet Explorer or a -1
// (indicating the use of another browser).
	function getInternetExplorerVersion() {
		var rv = -1; // Return value assumes failure.
		if (navigator.appName == 'Microsoft Internet Explorer') {
			var ua = navigator.userAgent;
			var re	= new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
			if (re.exec(ua) != null) {
				rv = parseFloat( RegExp.$1 );
			}
		}
		return rv;
	}
	//Sample Check Version Function
	function checkVersion() {
		var msg = "You're not using Internet Explorer.";
		var ver = getInternetExplorerVersion();
		if ( ver > -1 ) {
			if ( ver >= 8.0 ) {
				msg = "You're using a recent copy of Internet Explorer."
			}
			else {
				msg = "You should upgrade your copy of Internet Explorer.";
			}
		}
		console.log( msg );
	}

	//checkVersion();

	$('.row-fluid').each(function(){
		$(this).find("[class*=\"span\"]:last-child").addClass('l');
	});
	

/* 
 * =============================================================
 * Some Vars
 * =============================================================
 */


	//Window Width
	var $winSize = $(window).width();
	//iPad Check
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
	var ieVer = getInternetExplorerVersion();


/* 
 * =============================================================
 * BTN PULL DOWN
 * =============================================================
 */
	$('.btn-set-dropdown .drop').click(function(e){
		var $this = $(this);
		$this.closest('.btn-set-dropdown').find('ul').toggle();
		e.preventDefault();
	});
	
/* 
 * =============================================================
 * PAGE AREA (using applyMargins plugin so Hitory state change catches it)
 * =============================================================
 */

	if($('.page-cont').length && !$('.page-cont [data-margin]').length) {
		$('.page-cont').delay(500).slideDown(750, function(){
			$('.load-overlay').fadeOut();
		});
	}

	if($('.page-cont [data-margin]').length) {
		$('.page-cont').delay(500).slideDown(750, function(){
			$('.load-overlay').fadeOut();
			//call the margin set
			if($('.page-cont [data-margin]').length) {
				if($winSize < 980) {
					$('.page-cont [data-margin] .summary').attr('style','margin:20px 15px');
				} else {
					var 
						modMar = parseFloat($('.page-cont [data-margin]').attr('data-margin')),
						imgheight = $('.page-cont img').height()
					;
					$('.page-cont [data-margin]').applyMargins(modMar, imgheight);
				} 
			}
		});
	}



	//old page load set margins code
	// if($('.page [data-margin]').length && !$('#hero').length) {
	// 	console.log('not hero');
	// 	if($winSize >= 980) {
	// 		var modMar = parseFloat($('.page [data-margin]').attr('data-margin'));
	// 		$('.page [data-margin]').applyMargins(modMar)
	// 		
	// 	} else {
	// 		$('.page [data-margin] .summary').attr('style','margin:20px 15px');
	// 	}
	// }

	$('[href="#filter"]').live("click", function(e){
		$('.page-cont').slideUp(function(){
			$('.shadow').css('top',"190%");
		});
		
		$('.links-wrap').find('.active').removeClass('active');
		$(this).parent().addClass('active');
		e.preventDefault();
	});

/* 
 * =============================================================
 * Window Resize
 * =============================================================
 */

	$(window).resize(function(){
		$winSize = $(window).width();
		if($('.page-cont [data-margin]').length) {
			if($winSize < 980) {
				$('.page-cont [data-margin] .summary').attr('style','margin:20px 15px');
			} else {
				var 
					modMar = parseFloat($('.page-cont [data-margin]').attr('data-margin')),
					imgheight = $('.page-cont img').height()
				;
				
				$('.page-cont [data-margin]').applyMargins(modMar, imgheight);
			} 
		}
	});

/* 
 * =============================================================
 * form helpers
 * =============================================================
 */
	// $('input[type="text"]').focus(function(){
	// 	var value = $(this).val();
	// 	if(value == ""){
	// 		$(this).closest('.input-group').find('label').show();
	// 	}
	// });

	$('input[type="text"]').blur(function(){
		var value = $(this).val();
		if(value != ""){
			$(this).closest('.input-group').find('label').hide();
		} else {
			$(this).closest('.input-group').find('label').show();
		}
	});



/* 
 * =============================================================
 * isotope
 * =============================================================
 */
	//center
	$.Isotope.prototype._getCenteredMasonryColumns = function() {
		this.width = this.element.width();
		
		var parentWidth = this.element.parent().width();
		
									// i.e. options.masonry && options.masonry.columnWidth
		var colW = this.options.masonry && this.options.masonry.columnWidth ||
									// or use the size of the first item
									this.$filteredAtoms.outerWidth(true) ||
									// if there's no items, use size of container
									parentWidth;
		
		var cols = Math.floor( parentWidth / colW );
		cols = Math.max( cols, 1 );

		// i.e. this.masonry.cols = ....
		this.masonry.cols = cols;
		// i.e. this.masonry.columnWidth = ...
		this.masonry.columnWidth = colW;
	};
	
	$.Isotope.prototype._masonryReset = function() {
		// layout-specific props
		this.masonry = {};
		// FIXME shouldn't have to call this again
		this._getCenteredMasonryColumns();
		var i = this.masonry.cols;
		this.masonry.colYs = [];
		while (i--) {
			this.masonry.colYs.push( 0 );
		}
	};

	$.Isotope.prototype._masonryResizeChanged = function() {
		var prevColCount = this.masonry.cols;
		// get updated colCount
		this._getCenteredMasonryColumns();
		return ( this.masonry.cols !== prevColCount );
	};
	
	$.Isotope.prototype._masonryGetContainerSize = function() {
		var unusedCols = 0,
				i = this.masonry.cols;
		// count unused columns
		while ( --i ) {
			if ( this.masonry.colYs[i] !== 0 ) {
				break;
			}
			unusedCols++;
		}
		
		return {
					height : Math.max.apply( Math, this.masonry.colYs ),
					// fit container to columns that have been used;
					width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
				};
	};

	//container var
	$container = $('#projects');
	//call isotope
	$container.isotope({
		// options
		itemSelector : '.item',
		masonry: {
			columnWidth: 186 + 60
		}
	});
	//filtering stuff
	$('#filters a').click(function(e){
		var selector = $(this).attr('data-filter');
		$container.isotope({ filter: selector });
		e.preventDefault();
	});


}); //end ready function
