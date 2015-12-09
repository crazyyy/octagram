<?php get_header(); ?>
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
 
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="right-content">
<h1 class="zip-title"><?php the_title(); ?></h1>
<?php the_content('Читать полностью &raquo;'); ?>
<a href="<?php $link = get_field('external_link', $p->ID); if (empty($link)) { $link = get_field('link', $p->ID); } echo $link; ?>" style="font-size:14px; color: #fff; font-weight: bold; border-radius: 10px; background: #00468c; padding: 5px 20px; text-decoration: none;margin-right:20px;" download><?php _e('Download', 'octa'); ?></a> <a style="font-size:14px; color: #00468c; font-weight: bold; text-decoration: none;" target=_blank href="<?php the_field('link', $p->ID); ?>"></a>
</div>
<?php endwhile; else: ?>
<?php endif; ?>	<div class="clear"></div>
<?php get_footer(); ?>

