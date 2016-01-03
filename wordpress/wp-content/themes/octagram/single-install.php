<?php get_header(); ?>
  <div class="row">
    <div class="breadcrumbs col-md-12" xmlns:v="http://rdf.data-vocabulary.org/#">
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Octagram." href="<?php echo home_url(); ?>" class="home"><?php _e('Home', 'octa'); ?></a></span> &gt;
      <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Установщик" href="<?php echo home_url(); ?>/install/"><?php _e('Installer', 'octa'); ?></a></span> &gt;
      <span typeof="v:Breadcrumb"><span property="v:title"><?php the_title(); ?></span></span>
    </div><!-- breadcrumbs -->
  </div><!-- row -->

  <div class="row">

    <?php get_sidebar('mydiler'); ?>

    <article class="content-container col-md-9">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

          <div id="right-content" class="mydiler-single">
            <h1 class="inner-title"><?php _e('OCTAGRAM BESIDE', 'octa'); ?></h1>

            <div class="mydiler-single-inside row">
              <div class="col-md-4 col-md-offset-8 mydiler-single-tag">
                <span class="btn btn-transparent-gray">
                  <?php
                    $field = get_field_object('city');
                    $value = get_field('city');
                    $label = $field['choices'][ $value ];
                    echo $label;
                  ?>
                </span><!-- btn btn-transparent-gray -->
              </div><!-- col-md-2 col-md-offset-10 -->

              <div class="col-md-5 mydiler-map">
                <?php
                  $val = get_field( "Iframe" );
                  if( $val ) { ?>
                    <iframe src="<?php the_field('Iframe'); ?>" width="320" height="350" frameborder="0" style="border:0"></iframe>
                  <?php } else { ?>
                    <img style="border-radius: 5px;" src="<?php the_field('фотодилера'); ?>" alt="">
                <?php } ?>
              </div><!-- /.col-md-5 mydiler-map -->

              <div class="col-md-7 mydiler-description">
                <h2 class="mydiler-title"><?php the_title(''); ?></h2>
                <?php the_content(''); ?>

                <table>
                  <tr>
                    <td>
                      <?php _e('Phone:', 'octa'); ?>
                    </td>
                    <td>
                      <a href="tel:<?php the_field('телефон'); ?>" class="mydiler-phone"><?php the_field('телефон'); ?></a>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <?php _e('Rating', 'octa'); ?>
                    </td>
                    <td>
                      <?php include(TEMPLATEPATH.'/includes/include-rating.php'); ?>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <?php _e('Address:', 'octa'); ?>
                    </td>
                    <td>
                      <?php the_field('адрес'); ?>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <?php _e('Site:', 'octa'); ?>
                    </td>
                    <td>
                      <a href="<?php the_field('сайтдилера'); ?>" rel="nofollow"><?php the_field('сайтдилера'); ?></a>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <?php _e('Status:', 'octa'); ?>
                    </td>
                    <td>
                      <a href="<?php echo home_url(); ?>/install/"><?php _e('installer', 'octa'); ?></a>
                    </td>
                  </tr>
                </table>

              </div><!-- /.col-md-7 mydiler-description -->

            </div><!-- /.mydiler-single-inside -->
          </div><!-- mydiler-single -->


        <?php endwhile; else: ?>
      <?php endif; ?>
    </article><!-- content-container -->

  </div><!-- row -->

<?php get_footer(); ?>



