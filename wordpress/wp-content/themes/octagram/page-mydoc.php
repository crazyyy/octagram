<?php /* Template Name: Documentation */ get_header(); ?>
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
            <a href="#tab-products" class="tab-link active">
              <?php _e('Products', 'octa'); ?>
            </a>
          </div><!-- content-tab-left -->

          <div class="col-md-3 content-tab-middle content-tab-headline">
            <a href="#tab-systems" class="tab-link">
              <?php _e('System', 'octa'); ?>
            </a>
          </div><!-- content-tab-left -->

          <div class="col-md-3 content-tab-right content-tab-headline">
            <a href="#tab-solutions" class="tab-link">
              <?php _e('Solutions', 'octa'); ?>
            </a>
          </div><!-- content-tab-right -->
        </div><!-- content-tab-header #tabs -->

        <div class="row tabs-container content-tab-container">

          <div class="tabContent content-tab-cloud col-md-12" id="tab-products">
            <div id="taggest" class="cloud-simulation cloud-simulation-products">

              <a href="#" class="cloud-simulation-object current-term" data-id="tagid-ipconcentr">
                <span><?php _e('IP концентраторы, пульты управления', 'octa'); ?></span>
              </a><!-- tagid-ipconcentr -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-adressmicromod">
                <span><?php _e('Адресные микромодули и датчики', 'octa'); ?></span>
              </a><!-- tagid-adressmicromod -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-dopolnitelno">
                <span><?php _e('Дополнительное оборудование', 'octa'); ?></span>
              </a><!-- tagid-dopolnitelno -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-istochniki">
                <span><?php _e('Источники питания', 'octa'); ?></span>
              </a><!-- tagid-istochniki -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-complects">
                <span><?php _e('Комплекты оборудования', 'octa'); ?></span>
              </a><!-- tagid-complects -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-microprogs">
                <span><?php _e('Микропрограммы для A1', 'octa'); ?></span>
              </a><!-- tagid-microprogs -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-platformaa1">
                <span><?php _e('Платформа A1', 'octa'); ?></span>
              </a><!-- tagid-platformaa1 -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-software">
                <span><?php _e('Software Octagram Flex', 'octa'); ?></span>
              </a><!-- tagid-software -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-schitivateli">
                <span><?php _e('Считыватели', 'octa'); ?></span>
              </a><!-- tagid-schitivateli -->

              <a href="#" class="cloud-simulation-object" data-id="tagid-khodtest">
                <span><?php _e('Ход Тест', 'octa'); ?></span>
              </a><!-- tagid-khodtest -->

            </div><!-- taggest -->
          </div><!-- /.content-tab-cloud -->

          <div class="tabContent content-tab-cloud col-md-12" id="tab-systems">
            <!-- this tab clean -->
          </div><!-- /.content-tab-cloud -->

          <div class="tabContent content-tab-cloud col-md-12" id="tab-solutions">
            <!-- this tab clean -->
          </div><!-- /.content-tab-cloud -->

        </div><!-- /.row content-tab-container продукты -->

        <div class="mydoc-loop-container row mydoc-loop-container-products">

          <div class="row tagid-container tagid-ipconcentr tagid-current">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'IP концентраторы, пульты управления', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-ipconcentr -->

          <div class="row tagid-container tagid-adressmicromod">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Адресные микромодули и датчики', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-adressmicromod"> -->

          <div class="row tagid-container tagid-dopolnitelno">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Дополнительное оборудование', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-dopolnitelno"> -->

          <div class="row tagid-container tagid-istochniki">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Источники питания', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-istochniki"> -->

          <div class="row tagid-container tagid-complects">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Комплекты оборудования', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-complects"> -->

          <div class="row tagid-container tagid-microprogs">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Микропрограммы для A1', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-microprogs"> -->

          <div class="row tagid-container tagid-platformaa1">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Платформа A1', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-platformaa1"> -->

          <div class="row tagid-container tagid-software">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Software Octagram Flex', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-software"> -->

          <div class="row tagid-container tagid-schitivateli">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Считыватели', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-schitivateli"> -->

          <div class="row tagid-container tagid-khodtest">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'продукты', 'meta_value' => 'Ход Тест', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-khodtest"> -->

          <div class="row tagid-container tagid-products">
            <?php global $wp_query; query_posts( array(  'post_type' => 'doc', 'meta_key' => 'раздел', 'meta_value' => 'Products', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
              <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
            <?php endwhile; endif;  ?>
          </div><!-- row tagid-products"> -->

        </div><!-- /.mydoc-loop-container row mydoc-loop-container-products -->


        <div class="mydoc-loop-container row mydoc-loop-container-systems">

          <?php global $wp_query; query_posts( array( 'post_type' => 'doc', 'meta_key' => 'раздел', 'meta_value' => 'Системы', 'posts_per_page' =>999) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
          <?php endwhile; endif;  ?>

        </div><!-- mydoc-loop-container row mydoc-loop-container-systems -->

        <div class="mydoc-loop-container row mydoc-loop-container-solutions">

          <?php global $wp_query; query_posts( array( 'post_type' => 'doc', 'meta_key' => 'раздел', 'meta_value' => 'Решения', 'posts_per_page' =>999 ) ); if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <?php include(TEMPLATEPATH.'/includes/mydoc-loop.php'); ?>
          <?php endwhile; endif;  ?>

        </div><!-- mydoc-loop-container row mydoc-loop-container-systems -->

      </div><!-- right-content -->

    </article><!-- content-container -->
  </div><!-- row -->

<script src="<?php echo get_template_directory_uri(); ?>/js/page-mydoc.js"></script>
<?php get_footer(); ?>
