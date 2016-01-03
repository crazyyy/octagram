<?php /* Template Name: Дистрибутив */get_header(); ?><div class="breadcrumbs">
<div class="row">
  <div class="breadcrumbs col-md-12">
    <span typeof="v:Breadcrumb">
      <a rel="v:url" property="v:title" title="Octagram." href="<?php echo home_url(); ?>" class="home">
        <?php _e('Home','octa'); ?>
      </a>
    </span> &gt;
    <span typeof="v:Breadcrumb">
      <?php the_title(); ?>
    </span>
  </div><!-- breadcrumbs -->
</div><!-- row -->

  <div class="row">

    <?php get_sidebar('archive-mydiler'); ?>

    <article class="content-container col-md-9">
      <div id="right-content">

        <h1 class="diler-title"><?php the_title(); ?></h1>
        <p><?php the_content('Читать полностью &raquo;'); ?></p>

        <?php echo apply_filters('the_content', $page_data->post_content); ?>

        <div class="row content-tab-header" id="tabs">
          <div class="col-md-3 content-tab-left content-tab-headline content-tab-active">
            <a href="#tab-utilities" class="tab-link active">
              <?php _e('Utilities', 'octa'); ?>
            </a>
          </div><!-- content-tab-left -->

          <div class="col-md-3 content-tab-middle content-tab-headline">
            <a href="#tab-base-software" class="tab-link">
              <?php _e('Base software', 'octa'); ?>
            </a>
          </div><!-- content-tab-left -->

          <div class="col-md-3 content-tab-right content-tab-headline">
            <a href="#tab-additional-software" class="tab-link">
              <?php _e('Additional software', 'octa'); ?>
            </a>
          </div><!-- content-tab-right -->
        </div><!-- content-tab-header #tabs -->

        <div class="row tabs-container content-tab-container">
          <div class="tabContent content-tab-cloud col-md-12" id="tab-utilities">
            <!-- this tab clean -->
          </div>
          <div class="tabContent content-tab-cloud col-md-12" id="tab-base-software">
            <!-- this tab clean -->
          </div><!-- /.content-tab-cloud -->
          <div class="tabContent content-tab-cloud col-md-12" id="tab-additional-software">
            <!-- this tab clean -->
          </div><!-- /.content-tab-cloud -->
        </div><!-- /.row content-tab-container продукты -->


        <div class="mydoc-loop-container row mydoc-loop-container-products">

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'IP концентраторы, пульты управления', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Адресные микромодули и датчики', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Дополнительное оборудование', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Источники питания', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Комплекты оборудования', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Микропрограммы для A1', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Платформа A1', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Software Octagram Flex', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Считыватели', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array(  'post_type' => 'distr', 'meta_key' => 'продукты', 'meta_value' => 'Ход Тест', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

          <div class="row">
            <?php global $wp_query; query_posts( array( 'post_type' => 'distr', 'meta_key' => 'раздел', 'meta_value' => 'Products', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

        </div><!-- /.mydoc-loop-container row mydoc-loop-container-products -->


        <div class="mydoc-loop-container row mydoc-loop-container-systems">

          <div class="row">
            <?php global $wp_query; query_posts( array( 'post_type' => 'distr', 'meta_key' => 'раздел', 'meta_value' => 'Системы', 'posts_per_page' =>999) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

        </div><!-- mydoc-loop-container row mydoc-loop-container-systems -->

        <div class="mydoc-loop-container row mydoc-loop-container-solutions">

          <div class="row">
            <?php global $wp_query; query_posts( array( 'post_type' => 'distr', 'meta_key' => 'раздел', 'meta_value' => 'Решения', 'posts_per_page' =>999) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydistr-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row -->

        </div><!-- mydoc-loop-container row mydoc-loop-container-systems -->

      </div><!-- right-content -->

    </article><!-- content-container -->
  </div><!-- row -->

<!-- <script src="<?php echo get_template_directory_uri(); ?>/js/page-mydoc.js"></script> -->
<?php get_footer(); ?>
