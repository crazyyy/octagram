<?php 
/* Template Name: Home - About company */
get_header(); ?>
<?php
 include(TEMPLATEPATH.'/page-home-block.php');
?>


				<div class="tab-menu">

		     		<a href="<?php bloginfo('url'); ?>/#homeinfo" title="About company" class="tab-link one active"><?php _e('About company', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/news#homenews" title="NEWS" class="tab-link two"><?php _e('NEWS', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/product#homeprod" title="SYSTEMS AND SOLUTIONS" class="tab-link three"><?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?></a>

 
				<div class="clear"></div>

				<div id="mask">
<div id="homeinfo">
			       <div class="tab-one open" style="display: block;">
<?php
query_posts('page_id=47');
?>
<?php if ( have_posts() ) : ?>
<?php    
while (have_posts()) : the_post(); 
?>
<?php the_content('Читать полностью &raquo;'); ?>
<?php endwhile; //  ?>
<?php else : ?><?php endif; ?>
<?php wp_reset_query(); ?>

			       </div>
       </div>

			  </div>

			  </div>
<?php
 include(TEMPLATEPATH.'/page-footer-block.php');
?>
			  </div>

 <?php get_footer(); ?>