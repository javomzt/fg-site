<?php


get_header('inner'); 
echo do_shortcode('[rev_slider news-slider]');


$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array(
				'post_type' => 'post',
				'posts_per_page' => get_option( 'posts_per_page', 10 ),
				'paged' => $paged,
			);
query_posts($args);

?>

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

        <a type="button" class="btn btn-default" href="<?php echo do_shortcode(get_field('pop-up_cancel_button_url')); ?>"><?php the_field('pop-up_cancel_button_text'); ?></a>

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

					if(!isCookie('fg_performance_accepted')){

						$('#disclaimer_box_button').trigger('click');

					}

					$(document).on('click', '[data-dismiss="modal"]', function(){

						// Create Cookie

						setCookie('fg_performance_accepted', '<?php echo $post->ID; ?>', 1);

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

<!-- -->

</div>
<div class="news_page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div class="news_page">
					<div class="news_content">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php	
								if (isset($option_setting['logo'])) : 
									get_template_part( 'content', 'grid3' );
								else :
									get_template_part( 'defaults/content', 'grid3-d' );	
								endif;
								
								$count++;
							?>
							<?php endwhile; ?>			
							<?php seller_pagination(); ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</div>

					<?php wp_reset_query(); ?>

					<?php get_sidebar(); ?>
				</div><!-- #news_page -->
			</div><!-- container -->
		</main><!-- #main -->
	</div><!-- #primary --> 

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

<?php /*if ( is_active_sidebar( 'footer-6' ) ) : ?>
    <p><?php dynamic_sidebar( 'footer-6' ); ?></p>
<?php endif;*/ ?>	
<?php get_footer(); ?>
