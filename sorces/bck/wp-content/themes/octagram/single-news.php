<?php get_header(); ?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<div id="left-menu">
<?php 

$val = get_field( "виджеты" );
if( $val == 1 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?><?php 

}
elseif( $val == 2 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?><?php 

}
elseif( $val == 3 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?><?php 

}
elseif( $val == 4 )
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?><?php 

}
else
{ ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?><?php }?> <?php 

}
 ?>
</div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="right-content" class="singlesing">
<h1><?php the_title(); ?></h1>
<span style="font-size:14px;font-weight:bold;color: #383737; "><?php the_author(); ?></span> &bull; <a href="http://www.octagram.ru/all-news" style="font-size:14px;font-weight:bold;color: #24aa98; "><?php _e('News', 'octa'); ?></a> &bull; <time style="font-size:14px;font-weight:bold;color: #b4bbc2; " class="sPost-time" datetime="<?php the_time('d-m-Y') ?>"><?php the_time('d.m.Y'); ?></time><div class="clear" style="height:15px;"></div>
<?php the_content('Читать полностью &raquo;'); ?>
<div id="comments" style="max-width: 100%; display: none; "><?php comments_template(); ?></div><div class="clear"></div></div>

<?php endwhile; else: ?>
<?php endif; ?>	<div class="clear"></div>
<?php get_footer(); ?>


