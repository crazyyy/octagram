<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="row">
    <?php get_sidebar('page-news'); ?>

    <article class="content-container col-md-9">
      <div id="right-content" class="singlesing clearfix">
        <h1 class="cat-title inner-title"><?php the_category(', '); ?></h1>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <div class="category-content-container">
            <h2 class="category-content-title"><?php _e('Results for', 'octa'); ?> <strong><?php the_search_query(); ?></strong></h2>

            <?php get_template_part('content-data'); ?>

            <p><?php echo excerpt(50); ?></p>
            <a href="<?php the_permalink() ?>" class="read-more" rel="bookmark"><?php _e('Read more', 'octa'); ?></a>
          </div><!-- /.category-content-container -->

       <?php endwhile; ?>
       <?php else : ?>
          <div class="category-content-container">
            <h1><?php _e('Unfortunately, your search did not match. Try to repeat the search, or use the navigation.', 'octa'); ?></h1>
          </div><!-- /.category-content-container -->
       <?php endif; ?>

      </div><!-- singlesing -->
    </article><!-- content-container -->

    <?php get_template_part('pagination'); ?>

  </div><!-- row -->

<?php get_footer(); ?>

