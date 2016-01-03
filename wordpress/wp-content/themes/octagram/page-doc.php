<?php
/* Template Name: Documentation */
get_header(); ?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<div id="left-menu">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?>
</div>
<div id="right-content" class="singlesing">
<h1 class="inner-title"><?php the_title(); ?></h1>
<p><?php the_content('Читать полностью &raquo;'); ?></p>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
