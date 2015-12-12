<?php get_header(); ?>
  <?php get_template_part('breadcrumbs'); ?>

  <div class="row">

    <?php get_sidebar(); ?>

    <article>

      <h1 class="cat-title inner-title"><?php _e( 'Categories for', 'wpeasy' ); the_category(', '); ?></h1>
      <?php get_template_part('loop'); ?>
      <?php get_template_part('pagination'); ?>

    </article>

  </div><!-- row -->

<?php get_footer(); ?>
