<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>
  <div class="row">
    <?php get_sidebar('page-news'); ?>

    <article class="content-container col-md-9">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div id="right-content" class="singlesing clearfix">

          <h1 class="inner-title"><i class="fa fa-file-pdf-o"></i><?php the_title(); ?></h1>
          <?php the_content('Читать полностью &raquo;'); ?>

          <a href="<?php the_field('link', $p->ID); ?>" class="btn btn-blue"><?php _e('Download', 'octa'); ?></a>
          <a href="<?php the_field('link', $p->ID); ?>" class="btn btn-transparent" target="_blank"><?php _e('Read more', 'octa'); ?></a>

        </div><!-- singlesing -->

        <?php endwhile; else: ?>
      <?php endif; ?>

    </article><!-- content-container -->

  </div><!-- row -->
<?php get_footer(); ?>
