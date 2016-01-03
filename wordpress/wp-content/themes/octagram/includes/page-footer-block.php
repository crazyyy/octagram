<?php query_posts('page_id=9'); ?>
<?php if ( have_posts() ) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <div id="main-bottom" class="row">

      <div id="presentation" class="col-md-8">

        <a href="#" title="<?php _e('Presentation of the company', 'octa'); ?>">

          <?php $oct_key9 = get_post_meta($post->ID, 'oct_key9', true); if ($oct_key9) { ?>
            <img src="<?php the_field('oct_key9'); ?>" alt="<?php echo get_post_meta($post->ID, 'oct_key10', true); ?>"/>
          <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/presentation.jpg" alt="<?php echo get_post_meta($post->ID, 'oct_key10', true); ?>" />
          <?php } ?>

          <div class="play">
            <b><?php $oct_key10 = get_post_meta($post->ID, 'oct_key10', true); if ($oct_key10) { ?><?php echo $oct_key10; ?><?php } else { ?><?php _e('Presentation of the company', 'octa'); ?><?php } ?></b>
            <hr />
            <span><?php $oct_key11 = get_post_meta($post->ID, 'oct_key11', true); if ($oct_key11) { ?><?php echo $oct_key11; ?><?php } else { ?><?php _e('Learn more about how to develop our unique solutions', 'octa'); ?><?php } ?></span>
          </div><!-- play -->
        </a>

      </div><!-- presentation -->

      <div id="products" class="col-md-4">

        <div class="product">

          <?php $oct_key13 = get_post_meta($post->ID, 'oct_key13', true); if ($oct_key13) { ?>
            <img src="<?php the_field('oct_key13'); ?>" alt="<?php echo get_post_meta($post->ID, 'oct_key14', true); ?>"/>
          <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/product1.jpg" alt="<?php _e('Software', 'octa'); ?>" />
          <?php } ?>

          <h3 class="product-title"><?php $oct_key14 = get_post_meta($post->ID, 'oct_key14', true); if ($oct_key14) { ?><?php echo $oct_key14; ?><?php } else { ?><?php _e('Software', 'octa'); ?><?php } ?></h3>
          <a href="<?php echo get_post_meta($post->ID, 'oct_key15', true); ?>" title="<?php echo get_post_meta($post->ID, 'oct_key14', true); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>

        </div><!-- product -->

        <div class="product">

          <?php $oct_key16 = get_post_meta($post->ID, 'oct_key16', true); if ($oct_key16) { ?>
            <img src="<?php the_field('oct_key16'); ?>" alt="<?php echo get_post_meta($post->ID, 'oct_key17', true); ?>"/>
          <?php } else { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/product2.jpg" alt="<?php _e('Other products', 'octa'); ?>" />
          <?php } ?>

          <h3 class="product-title"><?php $oct_key17 = get_post_meta($post->ID, 'oct_key17', true); if ($oct_key17) { ?><?php echo $oct_key17; ?><?php } else { ?><?php _e('Other products', 'octa'); ?><?php } ?></h3>
          <a href="<?php echo get_post_meta($post->ID, 'oct_key18', true); ?>" title="<?php echo get_post_meta($post->ID, 'oct_key17', true); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>

        </div><!-- product -->

      </div><!-- products -->

    </div><!-- main-bottom -->
  <?php endwhile; //  ?>
  <?php else : ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
