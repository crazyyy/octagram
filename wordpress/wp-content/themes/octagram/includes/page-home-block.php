<?php query_posts('page_id=9'); ?>
  <?php if ( have_posts() ) : ?>
    <?php while (have_posts()) : the_post(); ?>

      <div class="block-triple row">
        <div class="col-md-4 left-block">
          <h2 class="block-triple-heading"><?php _e('Suitable for systems', 'octa'); ?></h2>
          <?php $posts = get_field('goodsistemleft'); if( $posts ): ?>
          <ul class="block-triple-loop block-triple-home">
            <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
              <li>
                <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                  <img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                  <h2 class="block-triple-loop-title"><?php echo get_the_title( $p->ID ); ?></h2>
                </a>
              </li>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
          </ul><!-- /.block-triple-loop block-triple-home -->
          <?php endif; ?>
        </div><!-- left-block -->

        <div class="col-md-4 middle-block">
          <?php $posts = get_field('homestore');
          if( $posts ): ?>
            <?php foreach( $posts as $post): setup_postdata($post); ?>
              <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" width="267" />
              <h1><?php the_title(); ?></h1>
              <p class="descr"><?php the_field('shortinfo'); ?></p>
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endif; ?>
        </div><!-- middle-block -->

        <div class="col-md-4 right-block">
          <h2 class="block-triple-heading"><?php _e('systems based on A1', 'octa'); ?></h2>
            <?php $posts = get_field('goodsistemright');
            if( $posts ): ?>
            <ul class="block-triple-loop block-triple-home">
              <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
                <li>
                  <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                    <img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                    <h2 class="block-triple-loop-title"><?php echo get_the_title( $p->ID ); ?></h2>
                  </a>
                </li>
              <?php endforeach; ?><?php wp_reset_postdata(); ?>
          </ul><!-- /.block-triple-loop block-triple-home-->
          <?php endif; ?>
        </div><!-- right-block -->

      </div><!-- block-triple /.row -->

    <?php endwhile; ?>
  <?php else : ?><?php endif; ?>
<?php wp_reset_query(); ?>