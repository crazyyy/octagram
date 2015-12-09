<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Защищено паролем;(</p>
	<?php
		return;
	}
?>

	


<?php if ( have_comments() ) : ?>
<a name="comments"></a>
<h3><?php comments_number(__('Нет комментариев'), __('1 комментарий'), __('% комментариев')); ?></h3>
<ol class="commentlist"><?php wp_list_comments('type=comment&avatar_size=42');?></ol>

<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
	

	<?php endif; ?>
<?php endif; ?>
 
	  
<?php if ('open' == $post->comment_status) : ?>
          <!-- comment form --> 
 
<div id="respond">

<h3><?php comment_form_title( 'Оставить комментарий' ); ?></h3> 
 
<div class="cancel-comment-reply">
	<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('Вам нужно', 'octa'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('войти на сайт', 'octa'); ?></a>, <?php _e('чтоб оставить отзыв.', 'octa'); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<p><textarea class="field" name="comment" id="comment" tabindex="4" placeholder="Введите ваш комментарий"></textarea></p>

<p style="float: left; display: block; width: 30%;"><input class="field" type="text" name="author" id="author" placeholder="Имя" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p  style="float: left; display: block; width: 30%;"><input class="field" type="text" name="email" id="email" placeholder="Email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p  style="float: left; display: block; width: 30%;"><input name="submit" type="submit" class="bgCH submit btn" tabindex="5" value="" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

</div>    <!-- /comment form -->

<?php endif; // if you delete this the sky will fall on your head ?>