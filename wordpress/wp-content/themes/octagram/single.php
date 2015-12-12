<?php get_header(); ?>
  <?php get_template_part('breadcrumbs'); ?>

  <div class="row">

    <?php get_sidebar(); ?>

    <article class="content-container col-md-9">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <div id="right-content">
            <h1><?php the_title(); ?></h1>
            <?php the_content('Читать полностью &raquo;'); ?>
          </div><!-- right-content -->

        <?php endwhile; else: ?>
      <?php endif; ?>
    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>
