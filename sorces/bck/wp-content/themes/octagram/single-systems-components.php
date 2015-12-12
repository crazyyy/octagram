<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


<div id="product"  >
<h4><?php the_title(); ?>: <?php _e('mandatory elements', 'octa'); ?></h4>
<ul class="goods">
<?php 
$posts = get_field('needed');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<li>
<img src="<?php the_field('image', $p->ID); ?>" alt="<?php the_title(); ?>" width="85"/>
<b><a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></b>
<?php the_field('shortinfo', $p->ID); ?>
</li>
<?php endforeach; ?>
<?php endif; ?>
</ul>

<div class="clear"></div>
<h4><?php the_title(); ?>: <?php _e('additional elements', 'octa'); ?></h4>
<ul class="goods">
<?php 
$posts = get_field('buyed');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<li>
<img src="<?php the_field('image', $p->ID); ?>" alt="<?php the_title(); ?>"  width="85"/>
<b><a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></b>
<?php the_field('shortinfo', $p->ID); ?>
</li>
<?php endforeach; ?>
<?php endif; ?>
</ul><div class="clear"></div>
</div>
