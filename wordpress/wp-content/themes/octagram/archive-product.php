<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author     WooThemes
 * @package   WooCommerce/Templates
 * @version     2.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<?php include(TEMPLATEPATH.'/includes/includes-cbrrates.php'); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>


  <div class="product-table row">
    <div class="col-md-4 product-table-nav">
      <?php wp_nav_menu(array( 'menu' => 'Каталог' )); ?>
    </div><!-- product-table-nav -->
    <div class="col-md-8 product-descr">
      <h1 class="inner-title">
        <?php global $wp_query; $cat_obj = $wp_query->get_queried_object();
          if($cat_obj) {
            $category_name = $cat_obj->name;
            $category_desc = $cat_obj->description;
            $category_ID  = $cat_obj->term_id;
          }
          if ($cat_obj !== 0 && $cat_obj !== null)  {
            echo $category_name;
            } else {
            _e('Product catalog Octagram', 'octa');
          }
        ?>
      </h1>
      <?php woocommerce_category_image(); ?>
      <?php echo category_description( $category_id ); ?>

      <a href="<?php echo home_url(); ?>/pravila-otgruzki/" title="<?php _e('See price list', 'octa'); ?>" class="btn btn-gray"><i class="fa fa-truck"></i><?php _e('Terms of shipment', 'octa'); ?></a>
      <a href="<?php echo home_url(); ?>/wp-content/uploads/2014/10/Price-list-ru.pdf" title="<?php _e('See price list', 'octa'); ?>" class="btn btn-gray" target="_blank"><i class="fa fa-file-pdf-o"></i><?php _e('See price list', 'octa'); ?></a>
    </div><!-- /.product-descr -->

  </div><!-- product-table -->

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

        <?php global $wp_query;
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          query_posts( array_merge( $wp_query->query, array(
            'cat' => $end,
            'posts_per_page' => 5,
            'paged' => $paged
            ))
          );
          if (have_posts()) : while ( have_posts() ) : the_post();
        ?>

          <?php include(TEMPLATEPATH.'/includes/product-table-row-loop.php'); ?>

        <?php endwhile; endif;  ?>

      </table>
    </div><!-- product-table-inner -->
  </div><!-- product-table -->

  <?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
