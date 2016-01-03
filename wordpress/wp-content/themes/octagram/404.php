<?php get_header(); ?>

  <div class="row">
    <?php get_sidebar('page-news'); ?>

    <article class="content-container col-md-9">
      <div id="right-content" class="singlesing clearfix">
        <h1 class="cat-title inner-title"><?php the_category(', '); ?></h1>

          <div class="category-content-container">
            <h1 class="category-content-title"><?php _e('This page does not exist', 'octa'); ?> </h1>

            <h2><?php _e('Try to return to <a href="/">HOME</a> page', 'octa'); ?></h2>

          </div>
          <!-- /.category-content-container -->

      </div><!-- singlesing -->
    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>

