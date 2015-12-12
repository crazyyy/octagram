<div id="down-buffer"></div></div>
<footer><div class="content">
<div id="copy"><?php $oct_key4 = get_option('oct_key4'); echo stripslashes($oct_key4); ?></div>
<div id="contact-block">
<span id="mob-ico"><?php $oct_key1 = get_option('oct_key1'); echo stripslashes($oct_key1); ?></span>
<span><?php $oct_key2 = get_option('oct_key2'); echo stripslashes($oct_key2); ?></span>
<a href="mailto:<?php $oct_key3 = get_option('oct_key3'); echo stripslashes($oct_key3); ?>" title="<?php $oct_key3 = get_option('oct_key3'); echo stripslashes($oct_key3); ?>"><?php $oct_key3 = get_option('oct_key3'); echo stripslashes($oct_key3); ?></a>
</div></div>
</footer>
<div id="bg-black"></div><div class="backpopup"></div><div id="video-div"><?php $oct_key12 = get_post_meta($post->ID, 'oct_key12', true); if ($oct_key12) { ?><?php echo $oct_key12; ?><?php } else { ?><iframe width="640" height="360" src="//www.youtube.com/embed/7bZwr2FeC_Q" frameborder="0" allowfullscreen=""></iframe><?php } ?></div>


<?php echo do_shortcode('[contact-form-7 id="1032" title="Обратный звонок"]') ?>
<?php echo do_shortcode('[contact-form-7 id="1034" title="Обратный вопросик" html_class="use-floating-validation-tip"]') ?>
<?php echo do_shortcode('[contact-form-7 id="197" title="Заказ системы" html_class="use-floating-validation-tip"]') ?>


<div id="order-thx"><div id="backformnew"></div><div class="myformnew3"><div class="titled1"><?php _e('We have received your request', 'octa'); ?><br> <?php _e('and get back to you as soon as possible', 'octa'); ?></div><div class="titled2"><?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></div><img style="display: block;float: center; margin: auto;" src="http://www.octagram.ru/wp-content/themes/octagram/img/logotnx.png" width="160" height="40" border="0" alt=""><a class="closset1" onclick="getElementById('order-thx').style.display='none'"><img src="http://www.octagram.ru/wp-content/themes/octagram/img/closet.png" width="12" height="12" border="0" alt=""></a></div></div>

<div id="order2-thx"><div id="backformnew"></div><div class="myformnew3"><div class="titled1"><?php _e('We have received your request', 'octa'); ?><br> <?php _e('and get back to you as soon as possible', 'octa'); ?></div><div class="titled2"><?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></div><img style="display: block;float: center; margin: auto;" src="http://www.octagram.ru/wp-content/themes/octagram/img/logotnx.png" width="160" height="40" border="0" alt=""><a class="closset1" onclick="getElementById('order2-thx').style.display='none'"><img src="http://www.octagram.ru/wp-content/themes/octagram/img/closet.png" width="12" height="12" border="0" alt=""></a></div></div>


<div id="callback-thx"><div id="backformnew"></div><div class="myformnew3"><div class="titled1"><?php _e('We have received your request', 'octa'); ?><br> <?php _e('to call back,<br> wait for call our phone  +7 495 580-30-25', 'octa'); ?></div><div class="titled2"><?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></div><img style="display: block;float: center; margin: auto;" src="http://www.octagram.ru/wp-content/themes/octagram/img/logotnx.png" width="160" height="40" border="0" alt=""><a class="closset1" onclick="getElementById('callback-thx').style.display='none'"><img src="http://www.octagram.ru/wp-content/themes/octagram/img/closet.png" width="12" height="12" border="0" alt=""></a></div></div>
<div id="answer-thx"><div id="backformnew"></div><div class="myformnew3"><div class="titled1"><?php _e('We have received your question', 'octa'); ?><br> <?php _e('and respond to it as soon as possible', 'octa'); ?></div><div class="titled2"><?php _e('Thank you for<br>having chosen the company ', 'octa'); ?></div><img style="display: block;float: center; margin: auto;" src="http://www.octagram.ru/wp-content/themes/octagram/img/logotnx.png" width="160" height="40" border="0" alt=""><a class="closset1" onclick="getElementById('answer-thx').style.display='none'"><img src="http://www.octagram.ru/wp-content/themes/octagram/img/closet.png" width="12" height="12" border="0" alt=""></a></div></div>


<?php $oct_key5 = get_option('oct_key5'); echo stripslashes($oct_key5); ?>
 
<?php wp_footer(); ?>
<script src="/wp-content/themes/octagram/js/script.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
            var tabs = $(".tab-menu").accessibleTabs({
                tabhead:'h2',
                fx:"fadeIn",
                syncheights:true,
                saveState:true
            });
        });
	</script>
</body>
</html>