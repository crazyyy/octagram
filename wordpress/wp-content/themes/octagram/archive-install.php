<?php get_header(); ?>
<div class="row">
  <div class="breadcrumbs col-md-12">
    <span typeof="v:Breadcrumb">
      <a rel="v:url" property="v:title" title="Octagram." href="<?php echo home_url(); ?>" class="home">
        <?php _e('Home','octa'); ?>
      </a>
    </span> &gt;
    <span typeof="v:Breadcrumb">
      <?php _e('Installer', 'octa'); ?>
    </span>
  </div><!-- breadcrumbs -->
</div><!-- row -->

  <div class="row">

    <?php get_sidebar('archive-mydiler'); ?>

    <article class="content-container col-md-9">
      <div id="right-content">

        <?php
          $page_id = 2228;
          $page_data = get_page( $page_id );
        ?>
        <h1 class="diler-title"><?php echo $page_data->post_title ?></h1>
        <?php echo apply_filters('the_content', $page_data->post_content); ?>

        <div class="row content-tab-header">
          <div class="col-md-3 content-tab-left content-tab-active">
            <a href="<?php bloginfo('url'); ?>/install/">
              <?php _e('Installer', 'octa'); ?>
            </a>
          </div><!-- content-tab-left -->
          <div class="col-md-3 content-tab-right">
            <a href="<?php bloginfo('url'); ?>/mydiler/"><?php _e('Dealers', 'octa'); ?></a>
          </div><!-- content-tab-right -->
        </div><!-- content-tab-header -->
        <div class="row content-tab-container">
          <h6 class="col-md-12"><?php _e('Cities', 'octa'); ?></h6>
          <div class="content-tab-cloud col-md-12">
            <div id="taggest" class="cloud-simulation cloud-simulation-diller"></div>
          </div><!-- /.content-tab-cloud -->
        </div><!-- /.row content-tab-container -->

        <div class="dealer-loop-container row"></div><!-- /.dealer-loop-container -->

      </div><!-- right-content -->

    </article><!-- content-container -->
  </div><!-- row -->

  <script src="<?php echo get_template_directory_uri(); ?>/js/archive-install.js"></script>
<?php get_footer(); ?>

