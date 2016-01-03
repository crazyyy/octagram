<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author     WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<?php include(TEMPLATEPATH.'/includes/includes-cbrrates.php'); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="block-triple block-triple-sinle row">
    <div class="col-md-4 left-block">
      <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>"/>
      <h2 class="block-triple-heading"><?php _e('Documentation', 'octa'); ?></h2>

        <ul class="block-triple-loop moment-block-product">
          <?php $posts = get_field('proddoc'); if( $posts ): foreach( $posts as $p ): ?>
            <li>
              <a href="<?php the_field('link', $p->ID); ?>" target="_blank" title="<?php _e('Download Pdf', 'octa'); ?>">
                <i class="fa fa-file-pdf-o"></i>
                <?php echo get_the_title( $p->ID ); ?>
              </a>
            </li>
          <?php endforeach; endif; ?>
        </ul><!-- /.block-triple-loop moment-block-product -->

        <p class="info-pdf"><i class="fa fa-info-circle"></i>Документация предоставлена в формате PDF. Скорей всего он у вас уже установлен. Если нет - бесплатно скачать можно на <a href="https://get.adobe.com/ua/reader/" target="_blank" rel="nofollow">официальном сайте.</a></p>

    </div><!-- left-block -->

    <div class="col-md-4 middle-block">
      <h1><?php the_title(); ?></h1>
      <p><?php _e('Modifications', 'octa'); ?> #<?php the_field('mod'); ?></p>
      <p><?php the_field('shortinfo'); ?></p>
      <p><?php the_field('info'); ?></p>
      <?php if( get_field('spec') ): ?>
        <h3 class="title-orange"><?php the_field('spec'); ?></h3>
      <?php endif; ?>

      <table>
        <?php if( get_field('z1') ): ?>
          <tr>
            <td><?php the_field('n1'); ?></td>
            <td><?php the_field('z1'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z2') ): ?>
          <tr>
            <td><?php the_field('n2'); ?></td>
            <td><?php the_field('z2'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z3') ): ?>
          <tr>
            <td><?php the_field('n3'); ?></td>
            <td><?php the_field('z3'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z4') ): ?>
          <tr>
          <td><?php the_field('n4'); ?></td>
          <td><?php the_field('z4'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z5') ): ?>
          <tr>
            <td><?php the_field('n5'); ?></td>
            <td><?php the_field('z5'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z6') ): ?>
          <tr>
            <td><?php the_field('n6'); ?></td>
            <td><?php the_field('z6'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z7') ): ?>
          <tr>
            <td><?php the_field('n7'); ?></td>
            <td><?php the_field('z7'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z8') ): ?>
          <tr>
            <td><?php the_field('n8'); ?></td>
            <td><?php the_field('z8'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z9') ): ?>
          <tr>
            <td><?php the_field('n9'); ?></td>
            <td><?php the_field('z9'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z10') ): ?>
          <tr>
            <td><?php the_field('n10'); ?></td>
            <td><?php the_field('z10'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z11') ): ?>
          <tr>
            <td><?php the_field('n11'); ?></td>
            <td><?php the_field('z11'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z12') ): ?>
          <tr>
            <td><?php the_field('n12'); ?></td>
            <td><?php the_field('z12'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z13') ): ?>
          <tr>
            <td><?php the_field('n13'); ?></td>
            <td><?php the_field('z13'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z14') ): ?>
          <tr>
            <td><?php the_field('n14'); ?></td>
            <td><?php the_field('z14'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z15') ): ?>
          <tr>
            <td><?php the_field('n15'); ?></td>
            <td><?php the_field('z15'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z16') ): ?>
          <tr>
            <td><?php the_field('n16'); ?></td>
            <td><?php the_field('z16'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z17') ): ?>
          <tr>
            <td><?php the_field('n17'); ?></td>
            <td><?php the_field('z17'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z18') ): ?>
          <tr>
            <td><?php the_field('n18'); ?></td>
            <td><?php the_field('z18'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z19') ): ?>
          <tr>
            <td><?php the_field('n19'); ?></td>
            <td><?php the_field('z19'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z20') ): ?>
          <tr>
            <td><?php the_field('n20'); ?></td>
            <td><?php the_field('z20'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z21') ): ?>
          <tr>
            <td><?php the_field('n21'); ?></td>
            <td><?php the_field('z21'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z22') ): ?>
          <tr>
            <td><?php the_field('n22'); ?></td>
            <td><?php the_field('z22'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z23') ): ?>
          <tr>
            <td><?php the_field('n23'); ?></td>
            <td><?php the_field('z23'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z24') ): ?>
          <tr>
            <td><?php the_field('n24'); ?></td>
            <td><?php the_field('z24'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z25') ): ?>
          <tr>
            <td><?php the_field('n25'); ?></td>
            <td><?php the_field('z25'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z26') ): ?>
          <tr>
            <td><?php the_field('n26'); ?></td>
            <td><?php the_field('z26'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z27') ): ?>
          <tr>
            <td><?php the_field('n27'); ?></td>
            <td><?php the_field('z27'); ?></td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('z28') ): ?>
          <tr>
            <td><?php the_field('n28'); ?></td>
            <td><?php the_field('z28'); ?></td>
          </tr>
        <?php endif; ?>
      </table>

    </div><!-- middle-block -->

    <div class="col-md-4 right-block">
      <h2 class="block-triple-heading"><?php _e('Price for one', 'octa'); ?></h2>

      <a href="#" title="<?php $oct_k7 = get_option('oct_k7'); echo stripslashes($oct_k7); ?>" class="btn btn-blue btn-order">
        <i class="fa fa-cart-plus"></i>
        <?php $oct_k7 = get_option('oct_k7'); echo stripslashes($oct_k7); ?>
      </a>

      <span class="title-blue"><?php _e('Connect with us', 'octa'); ?></span>

      <a href="tel:+<?php $oct_key6 = get_option('oct_key6'); echo preg_replace('/\D/', '', $oct_key6); ?>" class="single-phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></a>

      <a href="#" title="<?php $oct_k8 = get_option('oct_k8'); echo stripslashes($oct_k8); ?>" class="btn btn-gray btn-two-blocks btn-callback">
        <i class="fa fa-phone-square"></i>
        <?php $oct_k8 = get_option('oct_k8'); echo stripslashes($oct_k8); ?>
      </a>
    </div><!-- right-block -->
  </div><!-- block-triple /.row -->

  <?php $posts = get_field('prodprod'); if( $posts ): ?>
    <div class="row prodprod-container">
      <h5 class="col-md-12"><?php _e('With this product use:', 'octa'); ?></h5>
      <div class="row loop-similar">
        <?php foreach( $posts as $p ): ?>
          <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="col-md-3">
            <img src="<?php the_field('image', $p->ID); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
            <h4><?php echo get_the_title( $p->ID ); ?></h4>
          </a>
        <?php endforeach;  ?>
      </div><!-- loop-similar -->
    </div><!-- /.row prodprod-container -->
  <?php endif; ?>

  <?php $posts = get_field('prodsis'); if( $posts ): ?>
    <div class="row prodsis-container">
      <h5 class="col-md-12"><?php _e('In some systems there', 'octa'); ?></h5>
      <div class="row loop-similar">
        <?php foreach( $posts as $p ): ?>
          <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="col-md-2">
            <img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>"/>
            <h4><?php echo get_the_title( $p->ID ); ?></h4>
          </a>
        <?php endforeach;  ?>
      </div><!-- /.row loop-similar -->
    </div><!-- /.row prodsis-container -->
  <?php endif; ?>

  <?php $posts = get_field('prodsol'); if( $posts ): ?>
    <div class="row prodsol-container">
      <h5 class="col-md-12"><?php _e('Which solution is right', 'octa'); ?></h5>
      <div class="row loop-similar">
        <?php foreach( $posts as $p ): ?>
          <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="col-md-3">
            <img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>"/>
            <h4><?php echo get_the_title( $p->ID ); ?></h4>
          </a>
        <?php endforeach;  ?>
      </div><!-- /.row loop-similar -->
    </div><!-- /.row prodsol-container -->
  <?php endif; ?>

<?php get_footer(); ?>


