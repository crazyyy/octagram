<aside id="left-menu" class="col-md-3">

  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Сайдбар клиентов') ) { ?>

  <div class="widget widget-customers">

    <h6><?php _e('Our clients', 'octa'); ?></h6>
    <ul>
    <?php $args = array( 'post_type' => 'customers', 'posts_per_page' => 10 ); ?>
      <?php $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <li>
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
          <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>"/>
        </a>
      </li>

      <?php endwhile; ?>
    <?php } ?>
    </ul>

  </div><!-- /.widget widget-customers -->



</aside><!-- left-menu -->





