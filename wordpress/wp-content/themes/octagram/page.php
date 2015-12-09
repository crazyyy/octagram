<?php get_header(); ?>
<div class="breadcrumbs">
<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Octagram." href="http://www.octagram.ru" class="home"><?php _e('Home','octa'); ?></a></span> &gt; 
<span typeof="v:Breadcrumb"><?php the_title(); ?></span></div>
<div id="left-menu">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?>
<div id="headermenu" class="click-nav">
<?php 
$walker = new mainMenuWalker ();
wp_nav_menu ( array ('menu' => 'Страницы', 'walker' => $walker ) );
?>
</div>
 
 <?php }?>
  
 

</div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="right-content">
<h1><?php the_title(); ?></h1>
<?php the_content('Читать полностью &raquo;'); ?>
</div>
<?php endwhile; else: ?>
<?php endif; ?>	<div class="clear"></div>
<?php get_footer(); ?>