<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>
  <div class="row">

    <?php get_sidebar('page-news'); ?>
    <article class="content-container col-md-9">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div id="right-content" class="singlesing clearfix">

          <h1 class="inner-title"><?php the_title(); ?></h1>
          <?php the_content('Читать полностью &raquo;'); ?>
          <a href="<?php $link = get_field('external_link', $p->ID); if (empty($link)) { $link = get_field('link', $p->ID); } echo $link; ?>" class="btn btn-blue"><?php _e('Download', 'octa'); ?></a>

        </div><!-- singlesing -->

        <?php endwhile; else: ?>
      <?php endif; ?>

    </article><!-- content-container -->

  </div><!-- row -->
<?php get_footer(); ?>
