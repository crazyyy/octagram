<?php get_header(); ?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<div id="left-menu">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Сайдбар новостей') ) { ?> 
<h2><?php _e('News', 'octa'); ?></h2>
<?php
$args = array( 'post_type' => 'news', 'posts_per_page' => 10 ); ?>
<?php $loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><span class="newsdate"><?php the_time('d.M.Y'); ?></span>: <?php the_title(); ?></a>
<?php endwhile; ?>
<?php ?>
<?php }?>
</div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="right-content">
<h1><?php the_title(); ?></h1>
<time  class="sPost-time" datetime="<?php the_time('d-m-Y') ?>"><?php the_time('d.m.Y'); ?></time>
<?php the_content('Читать полностью &raquo;'); ?>
</div>
<?php endwhile; else: ?>
<?php endif; ?>	<div class="clear"></div>
<?php get_footer(); ?>