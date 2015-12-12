<?php 
/* Template Name: Home - News */
get_header(); ?>
<?php
 include(TEMPLATEPATH.'/page-home-block.php');
?>

 
				<div class="tab-menu">

		     	  		<a href="<?php bloginfo('url'); ?>/#homeinfo" title="About company" class="tab-link one "><?php _e('About company', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/news#homenews" title="NEWS" class="tab-link two active"><?php _e('NEWS', 'octa'); ?></a>
		     		<a href="<?php bloginfo('url'); ?>/product#homeprod" title="SYSTEMS AND SOLUTIONS" class="tab-link three "><?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?></a>


				<div class="clear"></div>

<div id="mask">
<div id="homenews">
<div class="tab-two open" style="display: block;">
<?php
$args = array( 'post_type' => 'news', 'posts_per_page' => 3 ); ?>
<ul id="news">
<?php $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<li>
<span class="name"><?php the_title(); ?></span>
<span class="date"><?php the_time('d.M.Y'); ?></span>
<p><?php echo excerpt(30); ?></p>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php _e('Read more', 'octa'); ?> </a>
</li>
<?php endwhile; ?>
</ul>
<div class="clear"></div>
<a href="<?php bloginfo('url'); ?>/all-news" title="All news" class="all-news"><?php _e('All news', 'octa'); ?></a>
<div class="clear"></div>
<?php ?>
</div>
</div>
</div>
</div>
<?php
 include(TEMPLATEPATH.'/page-footer-block.php');
?>
			  </div>

 <?php get_footer(); ?>