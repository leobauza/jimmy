<?php

	/*
	
	Template Name: contact-form
	
	*/

?>
<?php get_header(); ?>

<div class="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<!-- page content -->
	<section class="page-wrap">

		<?php include (TEMPLATEPATH . '/inc/loadoverlay.php' ); ?>

		<div class="page-cont">
			<!-- content content -->
			<section id="hero" class="group" data-margin="30">
				<figure class="feat-img">
					<?php
					$feat_image = get_field('feature_img');
					//var_dump($main_image);
					?>
					<img src="<?php echo $feat_image['url']; ?>" alt="" />
				</figure>
				<aside class="feat-text">
					<article class="summary">
						<h2><?php print get_field('headline');?></h2>
						
						<form name='contact' id='contact' class='contact-form' method='post'>
							<div class="input-group">
								<label for='fullname'>Full name</label>
								<input type='text' id="fullname" name='fullname' value='' />
							</div>
							<div class="input-group">
								<label for='email'>Email address</label>
								<input type='text' id="email" name='email' value='' />
							</div>
							<div class="input-group">
								<label for='type'>Project type</label>
								<input type='text' id="type" name='type' value='' />
							</div>
							<div>
								<input class="btn-secondary small" type='submit' id="submit" value='Submit' />
							</div>
							<input type="hidden" name="submitted" id="submitted" value="true" />
						</form>

						
						
					</article>
				</aside>
			</section> <!-- end data-margin -->
		</div>


		<noscript>
			no
		</noscript>


		<!-- end page content -->
	</section>

<?php endwhile; endif; ?>

	<?php include (TEMPLATEPATH . '/inc/projects.php' ); ?>
</div> <!-- end container -->

<script>

	//apply LV with valid message 'Thank You'
	var $fullname = new LiveValidation("fullname", { validMessage: 'Thank You', wait: 500} );
	//Simple Presence Validation
	$fullname.add(Validate.Presence, {failureMessage: "Required"});

	//apply LV with valid message 'Thank You'
	var $email = new LiveValidation("email", { validMessage: 'Thank You', wait: 500} );
	//Simple Presence Validation
	$email.add(Validate.Presence, {failureMessage: "Required"});
	$email.add(Validate.Email, {failureMessage: "Not a valid Email"});

	//apply LV with valid message 'Thank You'
	var $type = new LiveValidation("type", { validMessage: 'Thank You', wait: 500} );
	//Simple Presence Validation
	$type.add(Validate.Presence, {failureMessage: "Required"});


	var error_log = 0;
	$("form").on("submit", function(){
		if( $(this).find(".LV_invalid").length ) {
			if(error_log == 0) {
				$(".error_log").remove();
				$('input[type="submit"]').before("<span class=\"error_log\">there are errors</span>");
				error_log = 1;
			} else if(error_log == 1) {
				$(".error_log").html('Some errors remain');
				error_log = 2;
			} else if(error_log == 2) {
				$(".error_log").html('Still have a few erros up there');
				error_log = 3;
			} else if(error_log == 3) {
				$(".error_log").html('I am afraid I can\'t do that dave, there are some errors.');
				error_log = 0;
			}
		}
		return false;
	});


	$("#submit").on("click",function(e) {
		console.log("click");
		if($(this).closest('form').find(".LV_valid").length && !$(this).closest('form').find(".LV_invalid").length) {
			e.preventDefault();
			var url = "http://wp.jimmy.localhost/contactprocess"<?php //print addslashes(get_bloginfo('url') . '/contactprocess' ); ?>; // the script where you handle the form input.
			$.ajax({
				type: "POST",
				url: url,
				data: $("#contact").serialize(), // serializes the form's elements.
				success: function(data) {
					console.log(data);
					// $("#contact").remove();
					// $("#thankyou").show();
				 }
			});
			return false; // avoid to execute the actual submit of the form.
		}
	});

</script>


<?php get_footer(); ?>








