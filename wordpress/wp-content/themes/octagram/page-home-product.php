<?php 
/* Template Name: Home - Products */
get_header(); ?>
<?php
 include(TEMPLATEPATH.'/page-home-block.php');
?>
 

				<div class="tab-menu">

		     		<a href="<?php bloginfo('url'); ?>/#homeinfo" title="About company" class="tab-link one "><?php _e('About company', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/news#homenews" title="NEWS" class="tab-link two"><?php _e('NEWS', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/product#homeprod" title="SYSTEMS AND SOLUTIONS" class="tab-link three active"><?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?></a>


				<div class="clear"></div>

				<div id="mask">
	<div id="homeprod">
			       <div class="tab-three open" style="display: block;">
<?php
query_posts('page_id=53');
?>
<?php if ( have_posts() ) : ?>
<?php    
while (have_posts()) : the_post(); 
?>

<b><?php _e('Complete systems', 'octa'); ?></b>
<?php 
$posts = get_field('sist');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="system-link"><?php echo get_the_title( $p->ID ); ?></a>
<?php endforeach; ?>
<?php endif; ?>

<b><?php _e('Complete solutions', 'octa'); ?></b>
<?php 
$posts = get_field('sol');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="system-link"><?php echo get_the_title( $p->ID ); ?></a>
<?php endforeach; ?>
<?php endif; ?>


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