<?php
/*
Template Name: Contact Page
*/

get_header('inner'); ?>
</div>
<div>

<!-- JAV news modal -->
<!-- Legal Disclaimer -->

<!-- Button trigger modal -->

<button style="display:none;" id="disclaimer_box_button" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#disclaimer_box">

  	Disclaimer Button

</button>



<!-- Modal -->

<div data-keyboard="false" data-backdrop="static" class="modal fade" id="disclaimer_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->

        <h4 class="modal-title" id="myModalLabel"><?php the_field('pop-up_title'); ?></h4>

      </div>

      <div class="modal-body">

      	<?php the_field('pop-up_content'); ?>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal" id=""><?php the_field('pop-up_accept_button_text'); ?></button>

        <a type="button" class="btn btn-default" href="<?php echo do_shortcode(get_field('pop-up_cancel_button_url')); ?>" onclick="return setNonAccredited();"><?php the_field('pop-up_cancel_button_text'); ?></a>

          <script type="text/javascript">
              function setNonAccredited() {
                  //When the user selects non-accredited-canadian, set a cookie to validate when to hide the links and menu items.
                  setCookie('fg_non-accredited', '<?php echo $post->ID; ?>', 1);
                  return true;
              }

          </script>

      </div>

    </div>

  </div>

</div>

<!-- Legal Disclaimer -->

<?php
	global $post;
	if(get_field('show_pop-up')){
		?>

			<script type="text/javascript">
				jQuery(function($){
					if(!isCookie('fg_accredited_canadian')){
						$('#disclaimer_box_button').trigger('click');
					}
					$(document).on('click', '[data-dismiss="modal"]', function(){
						// Create Cookie
						setCookie('fg_accredited_canadian', '<?php echo $post->ID; ?>', 1);
						window.location.reload(true);
					});
				});

				function setCookie(cname, cvalue, exhours) {
				    var d = new Date();
				    d.setTime(d.getTime() + (exhours*60*60*1000));
				    var expires = "expires="+d.toUTCString();
				    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
				}

				function getCookie(cname) {
				    var name = cname + "=";
				    var ca = document.cookie.split(';');
				    for(var i=0; i<ca.length; i++) {
				        var c = ca[i];
				        while (c.charAt(0)==' ') c = c.substring(1);
				        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
				    }
				    return "";
				}

				function isCookie(cname) {
				    var cn = getCookie(cname);
				    if (cn != "") {
				        return true;
				    }
				    else{
				      	return false;
				    }
				}
			</script>
		<?php
	}
?>
<!-- JAV modal -->


<div id="primary-mono" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="contact-page">
			<div class="container">
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
		<?php /*if(strstr($_SERVER['REQUEST_URI'], '/fr/')){ ?>
		<div class="newsletter_section">
		    <div class="container">
			<?php if ( is_active_sidebar( 'footer-6-fr' ) ) : ?>
		    	<?php dynamic_sidebar( 'footer-6-fr' ); ?>
			<?php endif; ?>
		    </div>
		</div>
		<?php }else{ ?>
		<div class="newsletter_section">
		    <div class="container">
		        <?php if ( is_active_sidebar( 'footer-6' ) ) : ?>
		            <?php dynamic_sidebar( 'footer-6' ); ?>
		        <?php endif; ?>
		    </div>
		</div>
		<?php }*/ ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>


<script type="text/javascript">
	var markers1 = [];
	function open_marker_location(id){
        google.maps.event.trigger(markers1[id], 'click');
        jQuery('html, body').animate({scrollTop: 0}, 500);
    }
</script>

<script type="text/javascript">
	jQuery(function($){
		$('.contact_address .row .col-md-4:nth-child(1) address strong').on('click', function(){
			open_marker_location(0);
		});
		$('.contact_address .row .col-md-4:nth-child(2) address strong').on('click', function(){
			open_marker_location(1);
		});
		$('.contact_address .row .col-md-4:nth-child(3) address strong').on('click', function(){
			open_marker_location(2);
		});


		setTimeout(function(){
			<?php
				if(isset($_GET['show']) && $_GET['show'] != ''){
					if($_GET['show'] == 'c'){
						?>
							$('.contact_address .row .col-md-4:nth-child(1) address strong').trigger('click');
						<?php
					}

					if($_GET['show'] == 'n'){
						?>
							$('.contact_address .row .col-md-4:nth-child(2) address strong').trigger('click');
						<?php
					}

					if($_GET['show'] == 'h'){
						?>
							$('.contact_address .row .col-md-4:nth-child(3) address strong').trigger('click');
						<?php
					}
				}
			?>
		}, 1000);

	});
</script>

<?php get_footer(); ?>
