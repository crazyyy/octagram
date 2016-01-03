<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="row">

    <?php get_sidebar('customers'); ?>

    <article class="content-container col-md-9">

      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

        <div id="right-content" class="singlesing customer-single clearfix">
          <h1 class="inner-title"><?php the_title(); ?></h1>

          <img src="<?php the_field('image'); ?>" class="featureimage" alt="<?php the_title(); ?>" />

          <?php the_content('Читать полностью &raquo;'); ?>

        </div><!-- singlesing -->
        <?php endwhile; else: ?>
      <?php endif; ?>

    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>
