<?php get_header(); ?>
<div id="left-menu">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?>
</div>
<div id="right-content" class="singlesing">
<?php if (have_posts()) : ?>
<center><h1><?php _e('Results for', 'octa'); ?> <strong><?php the_search_query(); ?></strong></h1></center>
<?php while (have_posts()) : the_post(); ?>
<h2><a style="font-size:19px;color:#383737;text-decoration: none;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div style="height:15px;"></div>
<?php echo excerpt(50); ?><br><br>
<?php endwhile; ?>
<div id="pagination"><?php wp_pagenavi(); ?></div>
<?php else : ?>
<center><h1><?php _e('Unfortunately, your search did not match. Try to repeat the search, or use the navigation.', 'octa'); ?></h1></center>
<?php endif; ?>
</div> 
<div class="clear"></div>
<?php get_footer(); ?>