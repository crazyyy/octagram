<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>



<div id="doc"  >
<h4><?php the_title(); ?>: <?php _e('documentation', 'octa'); ?></h4>
<ul class="goods">
<?php 
$posts = get_field('doc');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<li>
<span class="pdf-title"><?php echo get_the_title( $p->ID ); ?></span>
<a href="<?php the_field('link', $p->ID); ?>" title="View Online" target="_blank"><?php _e('View Online', 'octa'); ?></a>
<a href="<?php the_field('link', $p->ID); ?>" title="Download Pdf" class="pdf-link" download><?php _e('Download Pdf', 'octa'); ?></a>
</li>
<?php endforeach; ?>
<?php endif; ?>
</ul><div class="clear"></div>
</div>
