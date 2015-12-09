<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div id="customers">
<h4><?php the_title(); ?>: <?php _e('the client list', 'octa'); ?></h4>
<ul class="goods1">
<?php 
$posts = get_field('customers');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<li><a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><img src="<?php the_field('image', $p->ID); ?>" alt="<?php the_title(); ?>" width="150" height="150" /></a></li>
<?php endforeach; ?>
<?php endif; ?>
</ul><div class="clear"></div>
</div>
