<div class="row tab-block">

  <div class="row tabs-header" id="tabs">
    <div class="col-md-4">
      <a href="#homeinfo" title="<?php _e('About company', 'octa'); ?>" class="col-md-4 tab-link active">
        <?php _e('About company', 'octa'); ?>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#homenews" title="<?php _e('NEWS', 'octa'); ?>" class="col-md-4 tab-link">
        <?php _e('NEWS', 'octa'); ?>
      </a>
    </div>
    <div class="col-md-4">
      <a href="#homeprod" title="<?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?>" class="col-md-4 tab-link">
        <?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?>
      </a>
    </div>
  </div><!-- row tabs-header -->

  <div class="row tabs-container">

    <div class="tabContent col-md-12" id="homeinfo">

      <?php if( get_field('home') ): ?>
        <?php the_field('home'); ?>
      <?php else: ?>
        <?php query_posts('page_id=47'); ?>
          <?php if ( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php the_content('Читать полностью &raquo;'); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php wp_reset_query(); ?>
      <?php endif; ?>

    </div><!-- tabContent col-md-12 -->

    <div class="tabContent col-md-12" id="homenews">
      <ul class="row">

        <?php
          $args = array( 'post_type' => 'news', 'posts_per_page' => 3 );
          $loop = new WP_Query( $args ); while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <li class="col-md-4">
            <span class="name"><?php the_title(); ?></span>
            <span class="date"><?php the_time('d.M.Y'); ?></span>
            <p><?php echo excerpt(30); ?></p>
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php _e('Read more', 'octa'); ?> </a>
          </li>
        <?php endwhile; ?>

      </ul>
      <div class="row">
        <span class="col-md-12 all-news">
          <a href="<?php bloginfo('url'); ?>/all-news"><?php _e('All news', 'octa'); ?></a>
        </span>
      </div>
    </div><!-- tabContent col-md-12 -->

    <div class="tabContent col-md-12" id="homeprod">
      <div class="row">

        <?php query_posts('page_id=53'); ?>
          <?php if ( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>

              <?php $posts = get_field('sist'); if( $posts ): ?>
                <ul class="col-md-6">
                  <li><h3><?php _e('Complete systems', 'octa'); ?></h3></li>
                  <?php foreach( $posts as $p ): ?>
                    <li>
                      <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

              <?php $posts = get_field('sol'); if( $posts ): ?>
                <ul class="col-md-6">
                  <li><h3><?php _e('Complete solutions', 'octa'); ?></h3></li>
                  <?php foreach( $posts as $p ): ?>
                    <li>
                      <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>

            <?php endwhile; //  ?>
          <?php endif; ?>
        <?php wp_reset_query(); ?>

      </div><!-- row -->
    </div><!-- tabContent col-md-12 -->


  </div><!-- /.row tabs-container -->
</div><!-- tab-block -->
