<?php get_header(); ?>
<?php get_template_part('breadcrumbs'); ?>

  <div class="row">

    <?php get_sidebar('archive-mydiler'); ?>

    <article class="content-container col-md-9">
      <div id="right-content">

        <h1 class="diler-title"><?php _e('OCTAGRAM BESIDE', 'octa'); ?></h1>
        <h2 class="diler-sub-title"><?php $oct_k11 = get_option('oct_k11'); echo stripslashes($oct_k11); ?></h2>
        <p><?php $oct_k12 = get_option('oct_k12'); echo stripslashes($oct_k12); ?></p>

        <div class="row content-tab-header">
          <div class="col-md-3 content-tab-left <?php if ($post->post_type == "install" ) { echo 'content-tab-active'; } ?>">
            <a href="<?php bloginfo('url'); ?>/install/">
              <?php _e('Installer', 'octa'); ?>
            </a>
          </div><!-- content-tab-left -->
          <div class="col-md-3 content-tab-right <?php if ($post->post_type == "mydiler" ) { echo 'content-tab-active'; } ?>">
            <a href="<?php bloginfo('url'); ?>/mydiler/"><?php _e('Dealers', 'octa'); ?></a>
          </div><!-- content-tab-right -->
        </div><!-- content-tab-header -->
        <div class="row content-tab-container">
          <h6 class="col-md-12"><?php _e('Cities', 'octa'); ?></h6>
          <div class="content-tab-cloud col-md-12">
            <?php wp_tag_cloud( 'smallest=16&largest=16&unit=px' ); ?>
          </div><!-- /.content-tab-cloud -->
        </div><!-- /.row content-tab-container -->

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="row dealer-loop">

          <div class="col-md-2 dealer-img">
            <a href="<?php the_permalink();?>">
              <img style="border-radius: 10px;" src="<?php the_field('фотодилера'); ?>" alt="<?php the_title(); ?>" />
            </a>
          </div><!-- /.col-md-2 dealer-img -->

          <div class="col-md-8 dealer-cont">
            <h3>
              <a href="<?php the_permalink();?>"><?php  the_title(); ?></a>
            </h3>
            <p class="dealer-adress"><?php the_field('адрес'); ?></p>
            <a href="tel:<?php the_field('телефон'); ?>" class="dealer-phone"><?php the_field('телефон'); ?></a>
            <?php include(TEMPLATEPATH.'/includes/include-rating.php'); ?>
          </div><!-- /.col-md-8 dealer-cont -->

          <div class="col-md-2 dealer-more">
            <a href="<?php the_permalink();?>"><?php _e('Read more', 'octa'); ?></a>
          </div><!-- /.col-md-2 dealer-more -->

        </div><!-- /.row dealer-loop -->

        <?php endwhile; endif;  ?>

      </div><!-- right-content -->

      <?php get_template_part('pagination'); ?>

    </article><!-- content-container -->
  </div><!-- row -->

<?php get_footer(); ?>
