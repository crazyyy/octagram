    </div><!-- /.inner -->
  </section><!-- /section -->
</div><!-- /.wrapper -->

<footer>
  <div class="inner">
    <div class="row">

      <div id="copy" class="col-md-6">
        <?php $oct_key4 = get_option('oct_key4'); echo stripslashes($oct_key4); ?>
      </div><!-- /#copy.col-md-6 -->

      <div class="footer-mobile col-md-2">
        <a href="tel:+74955803026"><i class="fa fa-mobile"></i>+7 (495) 580-30-26</a>
      </div><!-- /.footer-mobile col-md-2 -->

      <div class="footer-phone col-md-2">
        <a href="tel:88005551146"><i class="fa fa-phone"></i>8 (800) 555-11-46</a>
      </div><!-- /.footer-phone col-md-2 -->

      <div class="footer-mail col-md-2">
        <a href="mailto:info@octagram.ru"><i class="fa fa-envelope-o"></i>info@octagram.ru</a>
      </div><!-- /.footer-mail col-md-2 -->

    </div>
  </div><!-- inner -->
</footer>

  <script>
    // global variables
    var currDomain = '<?php echo home_url(); ?>';
    var currID = <?php echo get_the_ID(); ?>;
    var currTitle = '<?php the_title(); ?>';

    var translDocumentation = "<?php _e('documentation', 'octa'); ?>";
    var translTheClientList = "<?php _e('the client list', 'octa'); ?>";
    var transDownloadPDF = "<?php _e('Download Pdf', 'octa'); ?>";
    var transCustomerReviewsAndDealers = "<?php _e('customer reviews and dealers', 'octa'); ?>";
    var transReadMore = "<?php _e('Read more', 'octa'); ?>";
  </script>

  <?php wp_footer(); ?>
  <script src="<?php echo get_template_directory_uri(); ?>/js/tabscontent.js"></script>

  <div id="bg-black"></div>

  <div id="video-div">
    <?php $oct_key12 = get_post_meta($post->ID, 'oct_key12', true); if ($oct_key12) { ?>
      <?php echo $oct_key12; ?>
    <?php } else { ?>
      <iframe src="//www.youtube.com/embed/7bZwr2FeC_Q" frameborder="0" allowfullscreen=""></iframe>
    <?php } ?>
  </div>

  <?php echo do_shortcode('[contact-form-7 id="197" html_class="use-floating-validation-tip"]') ?>
  <?php echo do_shortcode('[contact-form-7 id="1032" html_class="use-floating-validation-tip"]') ?>
  <?php echo do_shortcode('[contact-form-7 id="1034" html_class="use-floating-validation-tip"]') ?>

<div id="overlay-bg"></div>
<div class="backpopup"></div>


<div class="form-modal form-modal-thanx">
  <div class="form-modal-bgc"></div><!-- /.form-modal-bgc -->
  <div class="form-modal-container">
    <h6 class="form-title"><?php _e('We have received your request', 'octa'); ?><br><?php _e('and get back to you as soon as possible', 'octa'); ?></h6>
    <h6 class="form-title-big"><?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></h6>
    <span class="form-modal-logo"></span>
    <span class="form-modal-close"><i class="fa fa-times-circle"></i></span>
  </div><!-- form-modal-container -->
</div><!-- form-modal form-modal-thanx -->

<div id="callback-thx">
  <div id="backformnew"></div>
  <div class="myformnew3">
    <div class="titled1"><?php _e('We have received your request', 'octa'); ?><br> <?php _e('to call back,<br> wait for call our phone  +7 495 580-30-25', 'octa'); ?></div>
    <div class="titled2">
    <?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></div>
    <img style="display: block;float: center; margin: auto;" src="http://www.octagram.ru/wp-content/themes/octagram/img/logotnx.png" width="160" height="40" border="0" alt=""><a class="closset1" onclick="getElementById('callback-thx').style.display='none'"><img src="http://www.octagram.ru/wp-content/themes/octagram/img/closet.png" width="12" height="12" border="0" alt=""></a>
  </div>
</div>



<div id="answer-thx"><div id="backformnew"></div><div class="myformnew3"><div class="titled1"><?php _e('We have received your question', 'octa'); ?><br> <?php _e('and respond to it as soon as possible', 'octa'); ?></div><div class="titled2"><?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></div><img style="display: block;float: center; margin: auto;" src="http://www.octagram.ru/wp-content/themes/octagram/img/logotnx.png" width="160" height="40" border="0" alt=""><a class="closset1" onclick="getElementById('answer-thx').style.display='none'"><img src="http://www.octagram.ru/wp-content/themes/octagram/img/closet.png" width="12" height="12" border="0" alt=""></a></div></div>


<?php $oct_key5 = get_option('oct_key5'); echo stripslashes($oct_key5); ?>



</body>
</html>
