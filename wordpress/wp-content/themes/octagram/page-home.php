<?php /* Template Name: Home */ get_header(); ?>

  <div id="moments" class="row">
    <div class="col-md-4 left-block">
      <h2 class="moments-heading"><?php $oct_home1777 = get_option('oct_home1777'); echo stripslashes($oct_home1777); ?></h2>
        <?php $posts = get_field('goodsistemleft');
        if( $posts ): ?>
        <ul class="moment-block">
          <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
            <li>
              <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                <img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                <h2 class="moment-block-title"><?php echo get_the_title( $p->ID ); ?></h2>
              </a>
            </li>
          <?php endforeach; ?>
        </ul><!-- /.moment-block -->
      <?php endif; ?>
    </div><!-- left-block -->

    <div class="col-md-4 middle-block">
      <?php $posts = get_field('homestore');
      if( $posts ): ?>
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
          <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" width="267" />
          <h1><?php the_title(); ?></h1>
          <p><?php the_field('shortinfo'); ?></p>
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="more-link"><?php _e('Read more', 'octa'); ?></a>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php endif; ?>
    </div><!-- middle-block -->

    <div class="col-md-4 right-block">
      <h2 class="moments-heading"><?php $oct_home27777 = get_option('oct_home27777'); echo stripslashes($oct_home27777); ?></h2>
        <?php $posts = get_field('goodsistemright');
        if( $posts ): ?>
        <ul class="moment-block">
          <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
            <li>
              <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                <img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                <h2 class="moment-block-title"><?php echo get_the_title( $p->ID ); ?></h2>
              </a>
            </li>
          <?php endforeach; ?>
      </ul><!-- /.moment-block -->
      <?php endif; ?>
    </div><!-- right-block -->
  </div><!-- #moments /.row -->


  <div class="tab-menu">
    <div class="row tab-headline">

      <a href="#homeinfo" title="<?php _e('About company', 'octa'); ?>" class="col-md-4 tab-link active">
        <?php _e('About company', 'octa'); ?>
      </a>
      <a href="#homenews" title="<?php _e('NEWS', 'octa'); ?>" class="col-md-4 tab-link">
        <?php _e('NEWS', 'octa'); ?>
      </a>
      <a href="#homeprod" title="<?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?>" class="col-md-4 tab-link">
        <?php _e('SYSTEMS AND SOLUTIONS', 'octa'); ?>
      </a>

    </div><!-- /.row tab-headline -->


    <div id="mask" class="row">

      <div id="homeinfo" class="tab-one open col-md-12">
        <?php the_field('home'); ?>
      </div><!-- homeinfo -->

      <div id="homenews" class="tab-two col-md-12">
        <ul>
          <li>
            <span class="name"><?php _e('Новый офис в Петербурге', 'octa'); ?></span>
            <span class="date"><?php _e('14.05.2015', 'octa'); ?></span>
            <p><?php _e('В июне 1989 года был создан МЦ "Контур".   К сентябрю 1991 года, когда в рамках госзаказа для НПО «Научный центр» была разработана первая адресная панель ОПС «Пост 50» с 50-ми адресами.', 'octa'); ?></p>
            <a href="" title=""><?php _e('Read more', 'octa'); ?> </a>
          </li>
        </ul>
        <a href="" title="" class="all-news"><?php _e('All news', 'octa'); ?></a>
      </div><!-- homenews -->

      <div id="homeprod" class="tab-three col-md-12">
        <ul>
          <li>
            <b><?php _e('Complete systems', 'octa'); ?></b>
            <a href="" title="" class="system-link"><?php _e('Комплексные системы безопасности', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Система контроля и управления доступом', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Система охранно пожарной сигнализации', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Управление инженерным оборудованием', 'octa'); ?></a>
            <br>
            <b><?php _e('Complete solutions', 'octa'); ?></b>
            <a href="" title="" class="system-link"><?php _e('Система безопасности школы', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Система безопасности в гостиницах', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Системы безопасности банка', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Система платной парковки', 'octa'); ?></a>
          </li>

          <li>
            <a href="" title="" class="system-link"><?php _e('Системы автоматического пожаротушения', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Системы охранной сигнализации', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Система контроля рабочего времени', 'octa'); ?></a><br /><br />
            <a href="" title="" class="system-link"><?php _e('Пожарная безопасность школы', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Для депозитарных ячеек', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Медицинский центр', 'octa'); ?></a>
          </li>

          <li>
            <a href="" title="" class="system-link"><?php _e('Система умный дом', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Система контроля охраны', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Системы видеонаблюдения', 'octa'); ?></a><br /><br />
            <a href="" title="" class="system-link"><?php _e('Для Автоцентра', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Для склада', 'octa'); ?></a>
            <a href="" title="" class="system-link"><?php _e('Для завода', 'octa'); ?></a>
          </li>
        </ul>
      </div><!-- homeprod -->

    </div><!-- mask -->

  </div><!-- tab-menu -->

  <?php get_template_part('page-footer-block'); ?>

<?php get_footer(); ?>
