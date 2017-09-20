<?php

/**
 * The Template for displaying all single posts.
 *
 * @package Seller
 */

get_header('inner'); ?>

<!-- Legal Disclaimer -->
<!-- Button trigger modal -->

<button style="display:none;" id="disclaimer_box_button" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#disclaimer_box">

  	Disclaimer Button

</button>


<!-- Modal -->

<?php
	$in = '';
	$style = '';
	$area_hidden = '';
	if(!isset($_COOKIE['fg_accredited_canadian'])){
		$in = 'in';
		$style = 'display:block;';
		$area_hidden = 'aria-hidden="false"';
	}

?>

<!-- <div data-keyboard="false" data-backdrop="static" class="modal fade in" id="disclaimer_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="display: block;"> -->

<div data-keyboard="false" data-backdrop="static" class="modal fade <?php echo $in; ?>" id="disclaimer_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" <?php echo $area_hidden; ?> style="<?php echo $style; ?>">

  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel"><?php the_field('pop-up_title'); ?></h4>
      </div>

      <div class="modal-body">
      	<?php the_field('pop-up_content'); ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="accept-btn"><?php the_field('pop-up_accept_button_text'); ?></button>

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



<script>

	function PrintElem(elem)

    {
		   Popup(jQuery(elem).html());
    }

    function Popup(data)
    {

        var mywindow = window.open('', 'investment-fund');
        mywindow.document.write(data);
        mywindow.document.close();
        mywindow.focus();
        mywindow.print();
        mywindow.close();

        return true;
    }

</script>

<?php //echo do_shortcode( '[rev_slider investment]' ); ?>

<?php

	if(has_post_thumbnail()){

		$thumb_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		if(!empty($thumb_image)){
			?>
				<div class="inner_title2" style="background-image:url(<?php echo $thumb_image[0]; ?>)"><span><span><?php echo get_field('title_on_image'); ?></span></span></div>

			<?php
		}

    
	}



	if((get_the_ID() == 540) || (get_the_ID() == 542)){

		$cat_id = 60;
	}else if((get_the_ID() == 536) || (get_the_ID() == 538)){
		$cat_id = 61;
	}else if((get_the_ID() == 531) || (get_the_ID() == 532)){
		$cat_id = 58;
	}else if((get_the_ID() == 528) || (get_the_ID() == 533)){
		$cat_id = 57;
	}else if((get_the_ID() == 527) || (get_the_ID() == 534)){
		$cat_id = 56;
	}else if((get_the_ID() == 452) || (get_the_ID() == 465)){
		$cat_id = 59;
	}else if((get_the_ID() == 2618) || (get_the_ID() == 2622)){
		$cat_id = 87;
	}else if((get_the_ID() == 2623) || (get_the_ID() == 2625)){
		$cat_id = 123;
	}
?>

</div>
<div>

<!-- start for div  -->

<?php if(isset($_COOKIE['fg_accredited_canadian'])): ?>
	<div id="primary-mono" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="investment-fund" id="investment-fund-print">
				<div class="container">
                    <div class="pull-right">
							<a class="btn btn-default viewmore dwnld_pdf" target="_blank" href="<?php the_field('download_pdf_file');  ?>"><?php the_field('download_pdf_button_text');  ?></a>

							<!--<button onclick="PrintElem('#investment-fund-print')" class="btn btn-default viewmore dwnld_pdf"><i class="fa fa-print"></i></button>-->


				    </div>
					<div class="profile-box">
						<div class="pull-left">
							<div class="afhead-title"><?php the_field('title_after_header');  ?></div>
							<div class="afhead-content"><?php the_field('content_after_header');  ?></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="isotope fund_page">
						<div class="profile-pic clearfix setcol">
							<?php
								$first = true;
								for($i = 1; $i <= 4; $i++){
									if($i == 4){
										?>

									<div class="profile-box profile-box-<?php echo $i; ?>">
					                    <div class="pull-right img_block monthly_returns graph_heigh"><?php //echo get_the_post_thumbnail(get_the_ID(),'medium'); ?>

					                        <div class="profiletext">

					                        	<h1 style="min-height: 67px"><?php the_field('tab_5_title');  ?></h1>

					                        	<?php
					                        		echo the_field('tab_5_content');
					                        	?>
					                        </div>
					                    </div>
					                </div>

					                <?php	}else if($i ==2){ ?>

									<div class="profile-box profile-box-<?php echo $i; ?>">
				                    	<div class="img_block monthly_returns">
				                        	<div class="profiletext">

				                        		<h1><?php the_field('monthly_returns_title');  ?></h1>

				                        		<div class="dwnld-historical"><a class="btn btn-default viewmore" href="<?php the_field('download_historical_performace_excel');  ?>"><?php the_field('download_historical_performace_title');  ?></a></div>

				                        		<?php

				                        			$count = 1;

												    $loop = new WP_Query( array( 'post_type' => 'monthly_return', 'tax_query' => array( array('taxonomy' => 'all_investment_fund','terms'    => $cat_id)),'orderby' => 'menu_order', 'order' => 'ASC' ) );

												    if ( $loop->have_posts() ) :

												    	echo '<div class="mon_return_title">';

												    	echo 'Series : ';

												        while ( $loop->have_posts() ) : $loop->the_post();

												    		echo '<span class="return_title return_title'.$count.'">';

												    		echo '<a href="javascript::void(0);">'.get_the_title().'</a>';

												    		echo '</span> ';

												    		$count++;

												        endwhile;

												        echo '</div>';

												    endif;

												    wp_reset_postdata();

												    $count = 1;
//if($cat_id == 123 && ICL_LANGUAGE_CODE == 'en')  {$cat_id =124 }
												    $loop = new WP_Query( array( 'post_type' => 'monthly_return', 'tax_query' => array( array('taxonomy' => 'all_investment_fund','terms'    => $cat_id)),'orderby' => 'menu_order', 'order' => 'ASC' ) );

												    if ( $loop->have_posts() ) :

												    	echo '<div class="mon_return_table dev">';

												        while ( $loop->have_posts() ) : $loop->the_post();

												    		echo '<div class="table-custom-invest investment_'.$count.'">';

												    		the_content();

												    		echo '</div>';

												    		$count++;

												        endwhile;

												        echo '</div>';

												    endif;

												    wp_reset_postdata();

				                        		?>

				                        	</div>

				                        </div>

				                    </div>

				                    <?php }else{

				                    		$css=67;

				                    		if($first){

												$first = false;

												$css = '93';

											}

				                    	?>

									<div class="profile-box profile-box-<?php echo $i; ?>">

				                    	<div class="img_block">

				                        	<div class="profiletext">

				                        		<h1 style="min-height: <?php echo $css; ?>px;"><?php the_field('tab_'.$i.'_title');  ?></h1>

				                        		<?php the_field('tab_'.$i.'_content');  ?>

				                        	</div>

				                        </div>

				                    </div>

					                <?php } ?>

									<?php
									if($i%2 == 0){ echo '</div><div class="profile-pic clearfix setcol">'; }
								} ?>
						</div>
					</div>
				</div>

				<div class="isotope fund_page third_info">
					<div class="container">
					<?php
						for($i = 7; $i <= 9; $i++){
							?>
								<div class="quarterly_reports_<?php echo $i; ?>">
			    					<div class="profile-box">

					                    	<div class="img_block"><?php //echo get_the_post_thumbnail(get_the_ID(),'medium'); ?>

					                        	<div class="profiletext">

					                        		<h1 class="text-left"><?php the_field('tab_'.$i.'_title');  ?></h1>

					                        		<?php if($i==9){ $news_sec = 'news_sec';}else{$news_sec = '';}?>

					                        		<div class="<?php echo $news_sec ?>"><?php the_field('tab_'.$i.'_content'); ?></div>

					                        	</div>
				                        	</div>
			                    	</div>
			                    </div>
							<?php
							//if($i%7 == 0){ echo '</div><div class="profile-pic clearfix">'; }
						}
					?>
					</div>
					<div class="container">

					<?php
						//for($i = 7; $i <= 9; $i++){
							?>

			    					<div class="profile-box">

					                    	<div class="img_block"><?php //echo get_the_post_thumbnail(get_the_ID(),'medium'); ?>

					                        	<div class="profiletext">

					                        		<!--<h1 class="text-left"><?php the_field('tab_'.$i.'_title');  ?></h1>-->


					                        		<div class=""><?php the_field('tab_10_content'); ?></div>

					                        	</div>
				                        	</div>
			                    	</div>
							<?php
							//if($i%7 == 0){ echo '</div><div class="profile-pic clearfix">'; }
						//}
					?>
					</div>
	            </div>
			</div>



<!--

			<div class="owner_section">

                <div class="container">

            		<div class="widget widget_text owner-content" id="text-3">

            			<h1 class="widget-title"><?php //the_field('funds_performance_title'); ?></h1>

            			<div class="textwidget">

            				<?php //the_field('funds_performance_content'); ?>

            			</div>

            			<a class="readmore" href="<?php //echo do_shortcode(get_field('funds_performance_legal_disclaimer_url')); ?>"><?php //the_field('funds_performance_legal_disclaimer_button_text'); ?></a>

					</div>

                </div>

            </div>

 -->

			<?php //if(strstr($_SERVER['REQUEST_URI'], '/fr/')){ ?>



	            <!--<div class="owner_section">

	                <div class="container">

	            	<?php /*if ( is_active_sidebar( 'footer-5-fr' ) ) : ?>

	                	<?php dynamic_sidebar( 'footer-5-fr' ); ?>

	            	<?php endif;*/ ?>

	                </div>

	            </div>-->



	            <!-- <div class="newsletter_section">

	                <div class="container">

	            	<?php /*if ( is_active_sidebar( 'footer-6-fr' ) ) : ?>

	                	<?php dynamic_sidebar( 'footer-6-fr' ); ?>

	            	<?php endif;*/ ?>

	                </div>

	            </div> -->

	        <?php // }else{ ?>

	            <!--<div class="owner_section">

	                <div class="container">

	                <?php /*if ( is_active_sidebar( 'footer-5' ) ) : ?>

	                    <?php dynamic_sidebar( 'footer-5' ); ?>

	                <?php endif;*/ ?>

	                </div>

	            </div>-->





	            <!-- <div class="newsletter_section">

	                <div class="container">

	                    <?php /*if ( is_active_sidebar( 'footer-6' ) ) : ?>

	                        <?php dynamic_sidebar( 'footer-6' ); ?>

	                    <?php endif;*/ ?>

	                </div>

	            </div> -->

	        <?php //} ?>

		</main>
	</div>

<?php endif; ?>

<!-- endif for div  -->



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
				    d.setTime(d.getTime() + (exhours*60*60*	1000));
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

<script>
jQuery(document).ready(function(){

	jQuery('div.table-custom-invest').not(':eq(0)').hide();
	//jQuery('.return_title a').not(':eq(0)').attr('class','active');

	jQuery('.return_title a').eq(0).attr('class','active');

	//jQuery('div.table-custom-invest').eq(0).hide();

	jQuery('.return_title a').on('click', function(){
		jQuery('.return_title a').attr('class','');
		jQuery(this).attr('class', 'active');
		jQuery('div.table-custom-invest').hide();
		var tmp_div = jQuery(this).parent().index();
		 jQuery('div.table-custom-invest').eq(tmp_div).show();
	});
	/*if(jQuery('.quarterly_reports_8 .pdf_list').length != ''){

		if((jQuery('.quarterly_reports_8 .pdf_list').eq(0).find('a').attr('href')).length !== 0){

			jQuery('a.dwnld_pdf').attr('href', (jQuery('.quarterly_reports_8 .pdf_list').eq(0).find('a').attr('href')));
<
		}
	}*/
});
</script>

<?php get_footer(); ?>