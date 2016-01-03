<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="row">
    <?php get_sidebar('page-news'); ?>

    <article class="content-container col-md-9">
      <div id="right-content" class="singlesing clearfix">
        <h1 class="cat-title inner-title"><?php the_category(', '); ?></h1>

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>

          <div class="category-content-container">
            <h2 class="category-content-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <?php get_template_part('content-data'); ?>

            <p><?php echo excerpt(50); ?></p>
            <a href="<?php the_permalink() ?>" class="read-more" rel="bookmark"><?php _e('Read more', 'octa'); ?></a>
          </div>
          <!-- /.category-content-container -->

       <?php endwhile; else: ?>
       <?php endif; ?>

      </div><!-- singlesing -->
    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>

