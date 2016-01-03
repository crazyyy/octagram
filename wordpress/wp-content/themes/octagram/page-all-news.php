<?php /* Template Name: Все News */ get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="row">
    <?php get_sidebar('page-news'); ?>

    <article class="content-container col-md-9">
      <div id="right-content" class="singlesing clearfix">
        <h1 class="inner-title"><?php the_title(); ?></h1>

        <?php $args = array( 'post_type' => 'news', 'posts_per_page' => 999 ); ?>
        <?php $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <div class="category-content-container">
            <h2 class="category-content-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <?php get_template_part('content-data'); ?>

            <p><?php echo excerpt(50); ?></p>
            <a href="<?php the_permalink() ?>" class="read-more" rel="bookmark"><?php _e('Read more', 'octa'); ?></a>
          </div>
          <!-- /.category-content-container -->
        <?php endwhile; ?>
      </div><!-- singlesing -->
    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>








