<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
 <?php 
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
        // Чтение содержимого файла в переменную $text 
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
  }  ?>
<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div><div id="catalog"> 

<div class="tab-menu1 five-links">
<?php wp_nav_menu(array( 'menu' => 'Каталог' )); ?>
<div class="clear"></div>

<div id="mask1">
<div class="tab-one open" style="display: block;">
<?php 
global $wp_query;
// get the query object
$cat_obj = $wp_query->get_queried_object();

if($cat_obj)    {
    $category_name = $cat_obj->name;
    $category_desc = $cat_obj->description;
    $category_ID  = $cat_obj->term_id;
}
if ($cat_obj !== 0 && $cat_obj !== null)  {
?>
<h1 style="width:46%;height: 40px;"><?php echo $category_name; ?></h1>
<?php } else {  ?> 
       <h1 style="width:46%;height: 40px;"><?php _e('Product catalog Octagram', 'octa'); ?></h1>
  <?php     }
  ?> 


<a href="http://www.octagram.ru/pravila-otgruzki/" title="Terms of shipment" id="rules"><?php _e('Terms of shipment', 'octa'); ?></a>
<a href="http://www.octagram.ru/wp-content/uploads/2014/10/Price-list-ru.pdf" title="See price list" class="order-btn white" id="price-list"><?php _e('See price list', 'octa'); ?></a>
<div class="clear"></div>
	<div id="catalog-table">
<div id="t-head">
<div class="ferst-td"><?php _e('Image', 'octa'); ?></div>
<div class="second-td"><?php _e('Title', 'octa'); ?></div>
<div class="third-td"><?php _e('Modification', 'octa'); ?></div>
<div class="fourth-td"><?php _e('Price', 'octa'); ?></div>
<div class="fifth-td"><?php _e('Order', 'octa'); ?></div>
<div class="sixth-td"><?php _e('Documentation', 'octa'); ?></div>
</div>
<div class="t-body"><hr /></div>
<?php 

global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts( array_merge( $wp_query->query, array( 
'cat' => $end,
'posts_per_page' => 5,
'paged' => $paged 
) ) );
if (have_posts()) : while ( have_posts() ) : the_post();

 ?>
<div class="t-body">

<div class="ferst-td"><a href="<?php the_permalink();?>"><img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>"  width="110"  /></a></div>

<div class="second-td"><h2><a href="<?php the_permalink();?>"><?php  the_title(); ?></a></h2><p><?php the_field('shortinfo'); ?></p></div>

<div class="third-td">#<?php the_field('mod'); ?></div>

<div class="fourth-td"><span class="price">
<?php
  if ($dollar != "") {
  $A=get_field('price');
  $C=$A*$dollar;
   echo number_format($C,0, '', ' ').' руб';
  }
  else {
  echo 'нет данных';
  }
?></span>
</div> 

<div class="fifth-td">
<a href="<?php the_permalink();?>" title="<?php _e('Order', 'octa'); ?>" class="order-btn blue"><?php _e('Order', 'octa'); ?></a>
<a href="#answer" title="<?php _e('Consultc', 'octa'); ?>" onclick="getElementById('wpcf7-f1034-o2').style.display = 'block'; getElementById('answer').style.display = 'block'"><?php _e('Consultc', 'octa'); ?></a> </div>
<div class="sixth-td">
<?php  $proddoc = get_field('proddoc');
if( $proddoc ): 
foreach( $proddoc as $prod ): ?>
<a href="<?php the_field('link', $prod->ID); ?>" title="<?php _e('Download documentation', 'octa'); ?>" class="get-doc" download><?php _e('Download documentation', 'octa'); ?></a>
<?php endforeach; endif; ?>
</div></div><div class="t-body"><hr /></div>
<?php endwhile; endif;  ?>

</div></div>
</div></div><div class="clear"><div id="pagination"><?php wp_pagenavi(); ?></div></div></div>
<?php get_footer(); ?>