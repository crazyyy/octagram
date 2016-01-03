<div class="nearby-diler">
  <select name="diler-name-list" id="diler-name-list" class="diler-name-list">
    <option value="diler-list-none">Выберите свой город</option>
    <?php $tags = get_tags(); if ($tags) {
      foreach ($tags as $tag) {
        echo "<option value='{$tag->term_id}'>{$tag->name} {$tag->count}</option>";
    }} ?>
  </select>

  <ul class="all-diler-list">
    <?php
      $tags = get_tags();
      if ($tags) { foreach ($tags as $tag) {
        query_posts( array(
          'post_type' => 'mydiler',
          'posts_per_page' => 100,
          'tag__in' => $tag->term_id ) );

        $posttagid = $tag->term_id;

        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <li class="tagid-<?php echo $posttagid; ?>">
            <a href="<?php the_permalink();?>" target="_blank">
              <img src="<?php the_field('фотодилера'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
              <h6><?php the_title(); ?></h6>
              <p><?php the_field('адрес'); ?></p>

              <?php include(TEMPLATEPATH.'/includes/include-rating.php'); ?>
              <span class="read-more-small"><?php _e('Read more', 'octa'); ?></span>
            </a>
          </li>

    <?php endwhile; endif; wp_reset_query(); }} ?>
  </ul><!-- /.all-diler-list -->
</div><!-- /.nearby-diler -->
