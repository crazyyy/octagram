<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div id="about" style="display: block;">

<?php if( get_field('infofull') ): ?>
<h4><?php the_title(); ?>: <?php _e('a detailed description of the system', 'octa'); ?></h4>
<div class="infofull"><?php the_field('infofull'); ?></div>
<?php else: ?>
<div class="infofull"><?php the_content();?></div>
<?php endif; ?>
<div style="clear:both;"></div>
</div>
