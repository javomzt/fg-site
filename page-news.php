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