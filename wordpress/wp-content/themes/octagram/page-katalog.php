<?php /* Template Name: Каталог */ get_header(); ?>


<ul id="moments">
<li class="left-block"><h2><?php _e('Suitable for systems', 'octa'); ?></h2>
<?php
$posts = get_field('goodsistemleft');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" width="53" height="53"/></div>
<h2><?php echo get_the_title( $p->ID ); ?></h2>
</a>
<?php endforeach; ?>
<?php endif; ?>
</li>

<li class="middle-block">
<?php
$posts = get_field('homestore');
if( $posts ): ?>
<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
<?php setup_postdata($post); ?>
<img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" width="267" />
<h1><?php the_title(); ?></h1>

<p><?php the_field('shortinfo'); ?></p>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>
<?php endforeach; ?>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</li>

<li class="right-block">
<h2><?php _e('Suitable for systems', 'octa'); ?></h2>
<?php
$posts = get_field('goodsistemright');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" width="53" height="53"/></div>
<h2><?php echo get_the_title( $p->ID ); ?></h2>
</a>
<?php endforeach; ?>
<?php endif; ?>
</li>
</ul>
<div class="clear"></div>



  <?php include(TEMPLATEPATH.'/includes/home-tabcontainer.php'); ?>

  <?php include(TEMPLATEPATH.'/includes/page-footer-block.php'); ?>

<?php get_footer(); ?>
