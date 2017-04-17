<?php

/**

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package Seller

 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>

<?php wp_head(); // http://192.168.1.80/xtreem/formula_growth/wp-content/uploads/2015/06/logo.png ?>

</head>



<?php

	if ( 'investment_fund' == get_post_type() ){

		$value1 = '';

		if(!isset( $_COOKIE['fg_accredited_canadian'])){

			$value1 = ' modal-open ';

		}

	}

?>



<body <?php body_class($value1); ?>>



	<?php

		if ( 'investment_fund' == get_post_type() ){

			$value = '';

			if(!isset($_COOKIE['fg_accredited_canadian'])){

				$value = '<div class="modal-backdrop fade in"></div>';

			}

			echo $value;

		}

	?>





	<?php global $option_setting; ?>

	<div id="page" class="hfeed site <?php echo ('home-template.php' != basename(get_page_template())) ? 'inner-page' : ''; ?>">





		<!--not home page -->

		<?php if(!is_front_page()){ ?>

			<div id="masthead" class="fixedheader">

				<div class="container">



					<div id="top-bar">

						<div class="container">

								<div class="col-md-6">

									<?php

										if (isset($option_setting['mail-id'])) :

											 get_template_part('top', 'left');

										else :

											get_template_part('defaults/top', 'left');

										endif;	  ?>

								</div>



								<?php if (isset($option_setting['enable-social-icons'])) :

										if($option_setting['enable-social-icons']) : ?>

											<!-- language switcher -->

											<div class="lang_right">

												<?php wp_nav_menu( array( 'theme_location' => 'language' ) ); ?>

												<!-- <ul class="other_lang">

													<li>

														<span>Other</span>

														<ul>

														  <li><a href="javascript:;">Lang 1</a></li>

														  <li><a href="javascript:;">Lang 2</a></li>

														  <li><a href="javascript:;">Lang 3</a></li>

														</ul>

													</li>

												</ul> -->

												<?php do_action('icl_language_selector'); ?>

											</div>

											<div id="social-icons">

												<?php get_template_part('social', 'fa'); ?>

											</div>

										<?php endif;

									  else : ?>

									  		<div id="social-icons" class="col-md-6">

												<?php get_template_part('defaults/social', 'default'); ?>

											</div>



									 <?php endif; ?>



						</div><!--.container-->

					</div><!--#top-bar-->



					<div class="page_container">

						<!-- logo -->

						<div class="site-branding">

							<?php if (isset($option_setting['logo']['url'])) : ?>

								<?php if( $option_setting['logo']['url'] != "" ) : ?>

									<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($option_setting['logo']['url']) ?>" alt="<?php bloginfo( 'name' ); ?>"></a>

								<?php else : ?>

									<!-- <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-hover="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->

									<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->

								<?php endif; ?>

							<?php else : ?>

								<!-- <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-hover="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> -->

								<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->

							<?php endif; ?>

						</div>

						<!-- nav -->

						<div id="top-nav">

							<nav id="site-navigation" class="main-navigation" role="navigation">

								<h1 class="menu-toggle"><?php _e( 'Menu', 'seller' ); ?></h1>

								<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'seller' ); ?></a>



								<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

							</nav><!-- #site-navigation -->

                            <!-- Jurisdiction cleanup menu -->

                            <script type="text/javascript">
                                //Call the hideMenuEn function after nav menu is loaded.

                                jQuery(document).ready(function() {
                                    //test set cookie first
                                    console.log( "Test for cookie:" );

                                    if(isCookie('fg_non-accredited')){
                                        //if cookie set, then hide elements

                                        console.log( "A cookie is there, lets remove the elements" );

                                        //TODO: if lang == EN then hideMenuEn ; else hideMenuFr()

                                        console.log('<?php echo constant("ICL_LANGUAGE_CODE"); ?>');

                                        <?php if ( ICL_LANGUAGE_CODE=='fr' ) : ?>
                                            hideMenuFr();
                                        <?php else: ?>
                                            hideMenuEn();
                                        <?php endif; ?>

                                        removeFundLinks();

                                    }
                                        else {
                                            console.log("Not the cookie")
                                        }

                                });

                                function hideMenuEn() {

                                    console.log( "Removing menu items." );
                                    //menu-item-3295 - US equity
                                    //menu-item-3296 - Asia Pacific equity
                                    //menu-item-16 - News
                                    document.getElementById('menu-item-3295').setAttribute("style", "display:none;");
                                    document.getElementById('menu-item-3296').setAttribute("style", "display:none;");
                                    document.getElementById('menu-item-16').setAttribute("style", "display:none;");
                                    console.log( "Done with menu items, good job." );
                                }

                                function hideMenuFr() {
                                    //menu-item-249 - nouvelles
                                    // 3299 - US equity
                                    // 3300 - Asia Pacific equity
                                    document.getElementById('menu-item-249').setAttribute("style", "display:none;");
                                    document.getElementById('menu-item-3299').setAttribute("style", "display:none;");
                                    document.getElementById('menu-item-3300').setAttribute("style", "display:none;");
                                }

                                function removeFundLinks() {
                                    jQuery('a[class="jurisdictionSensitive"]').contents().unwrap();
                                }

                                function getCookie(cname) {
                                    console.log("getCookie looking for = " + cname );
                                    var name = cname + "=";
                                    var decodedCookie = decodeURIComponent(document.cookie);
                                        var ca = decodedCookie.split(';');
                                        for(var i = 0; i <ca.length; i++) {
                                            var c = ca[i];
                                            while (c.charAt(0) == ' ') {
                                                c = c.substring(1);
                                            }
                                            if (c.indexOf(name) == 0) {
                                                return c.substring(name.length, c.length);
                                            }
                                        }
                                        return "";
                                    }

                                function isCookie(cname) {
                                    var cn = getCookie(cname);
                                    console.log( "isCookie looking for = "+ cname);

                                    if (cn != "") {
                                        console.log( "isCookie found your cookie!");
                                        return true;
                                    }
                                    else{
                                        console.log( "isCookie didnt find your cookie.");
                                        return false;
                                    }
                                }

                                function setCookie(cname, cvalue, exhours) {
                                    var d = new Date();
                                    d.setTime(d.getTime() + (exhours*60*60*	1000));
                                    var expires = "expires="+d.toUTCString();
                                    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
                                    console.log( "Ran set cookie for " + cname );

                                }

                            </script>


                            <!-- Jurisdiction cleanup menu -->

						</div>

					</div>

				</div>

			</div><!--.container-->

		<?php }else{ ?><!--home page -->



		<div class="my_home">

			<div class="container-fluid">

				<div class="row home_container">

					<!-- logo -->

					<div class="site-branding col-md-6 col-sm-6 logo_box">

						<!-- <div class="lang"><a href="#">FR</a></div> -->

						<!-- language switcher -->

						<?php do_action('icl_language_selector'); ?>

							<?php if (isset($option_setting['logo']['url'])) : ?>

								<?php if( $option_setting['logo']['url'] != "" ) : ?>

									<div id="site-logo">

										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($option_setting['logo']['url']) ?>" alt="<?php bloginfo( 'name' ); ?>"></a>

									</div>

								<?php else : ?>

									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-hover="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

									<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

								<?php endif; ?>

							<?php else : ?>

								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-hover="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

							<?php endif; ?>

							<div class="city_name">

								<?php

									if(strpos($_SERVER['REQUEST_URI'], '/fr/')){

										?>

											<div class="address_block">

												<a href="<?php echo get_site_url() . '/contact/'; ?>"><?php echo $option_setting['city_name_1_fr']; ?> </a>

												<address>

													<?php echo $option_setting['city_address_1_fr']; ?>

												</address>

											</div>

											<div class="address_block">

												<a href="<?php echo get_site_url() . '/contact/'; ?>"><?php echo $option_setting['city_name_2_fr']; ?></a>

												<address>

													<?php echo $option_setting['city_address_2_fr']; ?>

												</address>

											</div>

											<div class="address_block">

												<a href="<?php echo get_site_url() . '/contact/'; ?>"><?php echo $option_setting['city_name_3_fr']; ?> </a>

												<address>

													<?php echo $option_setting['city_address_3_fr']; ?>

												</address>

											</div>

										<?php

									}

									else{

										?>

											<div class="address_block">

												<a href="<?php echo get_site_url() . '/contact/'; ?>"><?php echo $option_setting['city_name_1_eng']; ?> </a>

												<address>

													<?php echo $option_setting['city_address_1_eng']; ?>

												</address>

											</div>

											<div class="address_block">

												<a href="<?php echo get_site_url() . '/contact/'; ?>"><?php echo $option_setting['city_name_2_eng']; ?></a>

												<address>

													<?php echo $option_setting['city_address_2_eng']; ?>

												</address>

											</div>

											<div class="address_block">

												<a href="<?php echo get_site_url() . '/contact/'; ?>"><?php echo $option_setting['city_name_3_eng']; ?> </a>

												<address>

													<?php echo $option_setting['city_address_3_eng']; ?>

												</address>

											</div>

										<?php

									}

								?>

							</div>

						</div>

					<!-- nav -->

					<div class="col-md-6 col-sm-6 menu_box">

						<nav id="site-navigation" class="my_menu" role="navigation">

							<!-- <h1 class="menu-toggle"><?php _e( 'Menu', 'seller' ); ?></h1> -->

							<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'seller' ); ?></a>



							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

						</nav><!-- #site-navigation -->

					</div>



					</div>

				</div><!--.container-->

		</div><!-- #masthead -->

		<?php } ?>

		<?php if(is_front_page()){ ?>

			<?php

				if (isset($option_setting['slider-enable-on-home'])) :

				 get_template_part('slider');

				 get_template_part('showcase');

				else :

				 get_template_part('defaults/slider','default');

				 get_template_part('defaults/showcase','default');

				endif;

		  	?>

		<?php } ?>

		<?php if(is_page_template('contact-page-template.php')){ echo do_shortcode('[wpgmza id="1"]'); } ?>





		<?php

			if(get_post_type() == "team" || get_post_type() == 'investment_fund' || get_post_type() == 'performance_page'){



			}

			else{

				?>

					<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

					 if(!empty($term->name)){

						?>
							<div class="inner_title"><span><?php echo $term->name;//echo get_category(get_query_var('cat'))->name; ?></span></div>

					<?php }else{ ?>

							<div class="inner_title"><span style="background:transparent"><?php echo get_field('title_on_image'); ?></span></div>

						<?php } ?>



				<?php

			}

		?>

