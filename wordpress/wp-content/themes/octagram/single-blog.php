<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="row">

    <?php get_sidebar('page-news'); ?>

    <article class="content-container col-md-9">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div id="right-content" class="singlesing clearfix">
          <h1 class="inner-title"><?php the_title(); ?></h1>

          <?php get_template_part('content-data'); ?>

          <?php the_content('Читать полностью &raquo;'); ?>

          <div id="comments"  style="max-width: 100%;"><?php comments_template(); ?></div>

        </div><!-- singlesing -->
        <?php endwhile; else: ?>
      <?php endif; ?>

    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>
