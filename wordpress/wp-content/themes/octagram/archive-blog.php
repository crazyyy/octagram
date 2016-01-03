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



<div id="right-content" class="singlesing">
<?php
$args = array( 'post_type' => 'blog', 'posts_per_page' => 999 ); ?>
<?php $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<h2><a style="font-size:19px;color:#383737;text-decoration: none;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<span style="font-size:14px;font-weight:bold;color: #383737; "><?php the_author(); ?></span> &bull; <a href="http://www.octagram.ru/blog" style="font-size:14px;font-weight:bold;color: #24aa98; "><?php _e('Blog', 'octa'); ?></a> &bull; <time style="font-size:14px;font-weight:bold;color: #b4bbc2; " class="sPost-time" datetime="<?php the_time('d-m-Y') ?>"><?php the_time('d.m.Y'); ?></time><div style="height:15px;"></div>
<?php echo excerpt(50); ?><br><br>
<a style="background: #00468c; padding: 5px 15px; font-size: 11px; color: #fff; border-radius: 5px;text-decoration: none;" href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read more', 'octa'); ?></a><br><br><br>
<?php endwhile; ?>
</div>



<div class="clear"></div>
<?php get_footer(); ?>
