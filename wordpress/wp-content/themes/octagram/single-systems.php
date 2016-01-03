<?php get_header(); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>
<?php include(TEMPLATEPATH.'/includes/includes-cbrrates.php'); ?>


  <div class="block-triple block-triple-systems row">

    <div class="col-md-4 left-block">
      <h2 class="block-triple-heading"><?php $oct_k1777 = get_option('oct_k1777'); echo stripslashes($oct_k1777); ?></h2>


      <?php $goodsolutionsleft = get_field('goodsolutionsleft'); if( $goodsolutionsleft ): ?>
      <ul class="block-triple-loop block-triple-home">
        <?php foreach( $goodsolutionsleft as $goodsolutionsleft ): ?>
          <li>
            <a href="<?php echo get_permalink( $goodsolutionsleft->ID ); ?>" title="<?php echo get_the_title( $goodsolutionsleft->ID ); ?>">
              <img src="<?php the_field('icon', $goodsolutionsleft->ID); ?>" alt="<?php echo get_the_title( $goodsolutionsleft->ID ); ?>" title="<?php echo get_the_title( $goodsolutionsleft->ID ); ?>"/>
              <h2 class="block-triple-loop-title"><?php echo get_the_title( $goodsolutionsleft->ID ); ?></h2>
            </a>
          </li>
        <?php endforeach; ?>
      </ul><!-- /.block-triple-loop block-triple-home -->
      <?php endif; ?>

      <a href="tel:+<?php $oct_key6 = get_option('oct_key6'); echo preg_replace('/\D/', '', $oct_key6); ?>" class="single-phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></a>

    </div><!-- left-block -->

    <div class="col-md-4 middle-block">
      <img src="<?php the_field('images'); ?>" alt="<?php the_title(); ?>"/>
      <h1><?php the_title(); ?></h1>
      <p><?php the_field('shortinfo'); ?></p>

      <a href="#" title="<?php $oct_k4 = get_option('oct_k4'); echo stripslashes($oct_k4); ?>" class="btn btn-blue btn-order">
        <i class="fa fa-cart-plus"></i>
        <?php $oct_k4 = get_option('oct_k4'); echo stripslashes($oct_k4); ?>
      </a>

    </div><!-- middle-block -->

    <div class="col-md-4 right-block">

      <h2 class="block-triple-heading"><?php $oct_k27777 = get_option('oct_k27777'); echo stripslashes($oct_k27777); ?></h2>
      <?php $goodsolutionsright = get_field('goodsolutionsright'); if( $goodsolutionsright ): ?>
      <ul class="block-triple-loop block-triple-home">
        <?php foreach( $goodsolutionsright as $goodsolutionsright ): ?>
          <li>
            <a href="<?php echo get_permalink( $goodsolutionsright->ID ); ?>" title="<?php echo get_the_title( $goodsolutionsright->ID ); ?>">
              <img src="<?php the_field('icon', $goodsolutionsright->ID); ?>" alt="<?php echo get_the_title( $goodsolutionsright->ID ); ?>" title="<?php echo get_the_title( $goodsolutionsright->ID ); ?>"/>
              <h2 class="block-triple-loop-title"><?php echo get_the_title( $goodsolutionsright->ID ); ?></h2>
            </a>
          </li>
        <?php endforeach; ?>
      </ul><!-- /.block-triple-loop block-triple-home -->
      <?php endif; ?>

      <a href="#" title="<?php $oct_k5 = get_option('oct_k5'); echo stripslashes($oct_k5); ?>" class="btn btn-gray btn-two-blocks btn-question">
        <i class="fa fa-phone-square"></i>
        <?php $oct_k5 = get_option('oct_k5'); echo stripslashes($oct_k5); ?>
      </a>

      </div><!-- right-block -->
    </div><!-- block-triple /.row -->

    <div class="row tab-block">

      <div class="row tabs-header" id="tabs">
        <div class="col-md-2">
          <a href="#about"><?php _e('Description', 'octa'); ?></a>
        </div>
        <div class="col-md-2">
          <a href="#product"><?php _e('Elements', 'octa'); ?></a>
        </div>
        <div class="col-md-3">
          <a href="#doc"><?php _e('Documentation', 'octa'); ?></a>
        </div>
        <div class="col-md-3">
          <a href="#customers"><?php _e('Who Uses', 'octa'); ?></a>
        </div>
        <div class="col-md-2">
          <a href="#comments"><?php _e('Reviews', 'octa'); ?></a>
        </div>
      </div><!-- row tabs-header -->

      <div class="row tabs-container">
        <div class="tabContent col-md-12" id="about"></div><!-- tabContent col-md-12 -->
        <div class="tabContent col-md-12" id="product">

          <!-- not ready -->
          <?php $posts = get_field('needed'); if( $posts ): ?>
          <h4 class="tab-block-headline"><?php the_title(); ?>: <?php _e('mandatory elements', 'octa'); ?></h4>
            <div class="row">
            <?php foreach( $posts as $p ):?>
              <div class="col-md-4">
                <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                  <img src="<?php the_field('image', $p->ID); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
                  <?php echo get_the_title( $p->ID ); ?>
                  <p><?php the_field('shortinfo', $p->ID); ?></p>
                </a>
              </div>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <?php $posts = get_field('buyed'); if( $posts ): ?>
          <h4 class="tab-block-headline"><?php the_title(); ?>: <?php _e('additional elements', 'octa'); ?></h4>
            <div class="row">
            <?php foreach( $posts as $p ):?>
              <div class="col-md-4">
                <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                  <img src="<?php the_field('image', $p->ID); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
                  <?php echo get_the_title( $p->ID ); ?>
                  <p><?php the_field('shortinfo', $p->ID); ?></p>
                </a>
              </div>
            <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <!-- not ready -->
        </div><!-- tabContent col-md-12 -->

        <div class="tabContent col-md-12" id="doc"></div><!-- tabContent col-md-12 -->
        <div class="tabContent col-md-12" id="customers"></div><!-- tabContent col-md-12 -->
        <div class="tabContent col-md-12" id="comments"></div><!-- tabContent col-md-12 -->
      </div><!-- /.row tabs-container -->
    </div><!-- tab-block -->

  <?php include(TEMPLATEPATH.'/includes/after-content-button.php'); ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/single-systems.js"></script>
<?php get_footer(); ?>
