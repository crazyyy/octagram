<?php /* Template Name: Store */ get_header(); ?>
<?php include(TEMPLATEPATH.'/includes/includes-cbrrates.php'); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="product-catalog row">
    <div class="col-md-4 product-table-nav">
      <?php wp_nav_menu(array( 'menu' => 'Каталог' )); ?>
    </div><!-- col-md-4 product-table-nav -->

    <div class="col-md-8 product-descr">

    </div><!-- /.product-descr -->

  </div><!-- product-catalog row -->


  <div class="product-catalog-service-row row">

    <div class="col-md-6 product-catalog-title">
      <h1 class="inner-title">
        <?php $thisCat = get_category(get_query_var('cat'),false); $end = $thisCat->cat_ID;
        if ($end !== 0 && $end !== null)  { ?>
          <?php echo $thisCat->cat_name; ?>
        <?php } else {  ?>
          <?php _e('Product catalog Octagram', 'octa'); ?>
        <?php } ?>
      </h1>
    </div><!-- /.col-md-6 product-catalog-title -->

    <div class="col-md-3">
      <a href="<?php echo home_url(); ?>/pravila-otgruzki/" title="<?php _e('See price list', 'octa'); ?>" class="btn btn-gray" target="_blank"><i class="fa fa-truck"></i><?php _e('Terms of shipment', 'octa'); ?></a>
    </div>

    <div class="col-md-3">
      <a href="<?php $oct_key898 = get_option('oct_key898'); echo stripslashes($oct_key898); ?>" title="<?php _e('See price list', 'octa'); ?>" class="btn btn-orange " target="_blank"><?php _e('See price list', 'octa'); ?></a>
    </div>

  </div><!-- /.product-catalog-service-row -->

  <div class="product-table product-table-second row">
    <div class="col-md-12 product-table-inner">

      <table>
        <tr>
          <th><?php _e('Image', 'octa'); ?></th>
          <th><?php _e('Title', 'octa'); ?></th>
          <th><?php _e('Modification', 'octa'); ?></th>
          <th><?php _e('Price', 'octa'); ?></th>
          <th><?php _e('Order', 'octa'); ?></th>
          <th><?php _e('Documentation', 'octa'); ?></th>
        </tr>

        <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1; global $wp_query; query_posts( array(
          'cat' => $end,
          'post_type' => 'product',
          'paged' => $paged,
          'posts_per_page' => 5
          ));
          if (have_posts()) : while ( have_posts() ) : the_post();
        ?>

          <?php include(TEMPLATEPATH.'/includes/product-table-row-loop.php'); ?>

        <?php endwhile; endif;  ?>

      </table>
    </div><!-- product-table-inner -->
  </div><!-- product-table -->

  <?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
