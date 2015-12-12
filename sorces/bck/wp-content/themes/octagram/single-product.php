<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<ul id="moments">
<li class="left-block">

<img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" width="280" height="220" />
<b><?php _e('Documentation', 'octa'); ?></b>			
<?php  $posts = get_field('proddoc');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<span class="pdf-title"><?php echo get_the_title( $p->ID ); ?></span>
<a href="<?php the_field('link', $p->ID); ?>" download title="Download Pdf" class="pdf-link"><?php _e('Download Pdf', 'octa'); ?></a>
<a href="<?php the_field('link', $p->ID); ?>" target="_blank" title="View Online"><?php _e('View Online', 'octa'); ?></a>
<div class="clear" style="margin-bottom: 15px;"></div>
<?php endforeach; ?>
<?php endif; ?> 
</li>

<li class="middle-block">
<h1><?php the_title(); ?></h1>
<p class="mod"><?php _e('Modifications', 'octa'); ?> #<?php the_field('mod'); ?></p>

<p><?php the_field('shortinfo'); ?><div class="clear"></div>
<p><?php the_field('info'); ?><div class="clear"></div>
<?php if( get_field('spec') ): ?><h2 class="orangcolor"><?php the_field('spec'); ?></h1><?php else: ?><?php endif; ?>

 

<table >

<?php if( get_field('z1') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n1'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z1'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z2') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n2'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z2'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z3') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n3'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z3'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z4') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n4'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z4'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z5') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n5'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z5'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z6') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n6'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z6'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z7') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n7'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z7'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z8') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n8'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z8'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z9') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n9'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z9'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z10') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n10'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z10'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z11') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n11'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z11'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z12') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n12'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z12'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z13') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n13'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z13'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z14') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n14'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z14'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z15') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n15'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z15'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z16') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n16'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z16'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z17') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n17'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z17'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z18') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n18'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z18'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z19') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n19'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z19'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z20') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n20'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z20'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z21') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n21'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z21'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z22') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n22'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z22'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z23') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n23'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z23'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z24') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n24'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z24'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z25') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n25'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z25'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z26') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n26'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z26'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z27') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n27'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z27'); ?></td>
</tr><?php else: ?><?php endif; ?>

<?php if( get_field('z28') ): ?><tr class="border_bottom">
<td style="vertical-align:middle;width: 78%;margin-right: 2%;  overflow: hidden;"><?php the_field('n28'); ?></td>
<td style="vertical-align:middle;width: 20%;text-align: right;  overflow: hidden;""><?php the_field('z28'); ?></td>
</tr><?php else: ?><?php endif; ?>

</table>

</li>


<li class="right-block">
<h2 class="gray"><?php _e('Price for one', 'octa'); ?></h2>
<span class="price"><?php 
  // Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru 
  $content = get_content(); 
  // Разбираем содержимое, при помощи регулярных выражений 
  $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i"; 
  preg_match_all($pattern, $content, $out, PREG_SET_ORDER); 
  $dollar = ""; 
  foreach($out as $cur) 
  { 
    if($cur[2] == 840) $dollar = str_replace(",",".",$cur[4]); 
  } 
  function get_content()

  {

    $last = filemtime("cbrrates");

    if (abs(time() - $last) > 3600)

    {

      // Формируем сегодняшнюю дату

      $date = date("d/m/Y");

      // Формируем ссылку

      $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";

      // Загружаем HTML-страницу

      $fd = fopen($link, "r");   

      $text="";

      if ($fd)

      {

        // Чтение содержимого страницы в переменную $text

        while (!feof ($fd)) $text .= fgets($fd, 4096);

      }

      // Закрыть открытый файловый дескриптор

      fclose ($fd);

      if ($text != "")

      {

        file_put_contents("cbrrates", $text);

      }

      else

      {

        $text = file_get_contents("cbrrates");

      }

    }

    else

    {

      $text = file_get_contents("cbrrates");

    }

    return $text;

  }if ($dollar != "") {

  $A=get_post_meta($post->ID, "price", true);

  $C=$A*$dollar;

echo number_format($C,0, '', ' ').' руб';

  }

  else {

  echo 'нет данных';

  }
?></span>






<a href="#order" title="Order" class="order-btn blue button1" id="buy" onclick="getElementById('wpcf7-f197-o3').style.display = 'block'; getElementById('order').style.display = 'block'"><?php $oct_k7 = get_option('oct_k7'); echo stripslashes($oct_k7); ?></a>

<span id="contact-us"><?php _e('Connect with us', 'octa'); ?></span>
<span class="phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></span>
<a href="#callback" title="Request a call back" class="order-btn white backcall button2" id="backcall-right"onclick="getElementById('wpcf7-f1032-o1').style.display = 'block'; getElementById('callback').style.display = 'block'"><?php $oct_k8 = get_option('oct_k8'); echo stripslashes($oct_k8); ?></a>

</li>
</ul><div class="clear"></div>


<hr class="main-hr" /><h3><?php _e('With this product use:', 'octa'); ?></h3>
<div id="similar">
<?php 
$posts = get_field('prodprod');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<div>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><img src="<?php the_field('image', $p->ID); ?>" alt="<?php the_title(); ?>" width="85"/></a>
<a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
</div>
<?php endforeach; ?>
<?php endif; ?>
</div>

				<div class="clear"></div>

				<hr class="main-hr" />

				<h3><?php _e('In some systems there', 'octa'); ?></h3>

				<ul class="triple">
         		
					<?php 
$posts = get_field('prodsis');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<li><a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" width="53" height="53"/></div>
<span><?php echo get_the_title( $p->ID ); ?></span>
</a></li>
<?php endforeach; ?>
<?php endif; ?>
 
         		</ul>

         		<div class="clear"></div>

				<h3><?php _e('Which solution is right', 'octa'); ?></h3>

				<ul class="triple">
         							<?php 
$posts = get_field('prodsol');
if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
<li><a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>" class="moment-link">
<div class="moment-ico"><img src="<?php the_field('icon', $p->ID); ?>" alt="<?php the_title(); ?>" width="53" height="53"/></div>
<span><?php echo get_the_title( $p->ID ); ?></span>
</a></li>
<?php endforeach; ?>
<?php endif; ?>
         		</ul>

         		<div class="clear"></div>
<?php get_footer(); ?>


