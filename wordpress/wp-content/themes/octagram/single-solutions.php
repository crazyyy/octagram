<?php 
get_header(); 
$current_fp = get_query_var('fpage');
?>
 <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
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

  }
  ?>


<ul id="moments">
<li class="left-block">
<h1><?php the_title(); ?></h1>

<img src="<?php the_field('images'); ?>" alt="<?php the_title(); ?>" width="280" height="220" style="padding: 15px 0" />
<p><?php the_field('shortinfo'); ?></p><br><br>
<span style="font-size:16px; font-weight:bold;color: #000;letter-spacing: -1px;"><?php $oct_k9 = get_option('oct_k9'); echo stripslashes($oct_k9); ?></span><br>
<?php echo do_shortcode('[ULWPQSF id=1447 button=0]') ?>



<span style="font-size:12px; font-weight:bold;color: #000;letter-spacing: -1px;"><?php $oct_k10 = get_option('oct_k10'); echo stripslashes($oct_k10); ?></span><br>
<div id="listdiller">
<div style="width: 300px; height: 170px; display: block; float: left; ">
<?php 
query_posts( array( 
'post_type' => 'mydiler',
'posts_per_page' => 1,
'meta_key'=>'rating', 
'orderby' => 'meta_value_num',
'order' => DESC 
) );
if (have_posts()) : while (have_posts()) : the_post();
?>
<br>
<span style="font-size:16px; font-weight:bold;color: #000;letter-spacing: 1px;"><?php _e('City is not specified', 'octa'); ?></span>
<br>
<div style="clear:both; height:1px; border-bottom: 1px solid #f4f4f4"></div>
<?php   endwhile; wp_reset_query(); endif;  ?>
</div>
</div>
</li>
</ul>


<?php $oct_usekalkforsolution = get_option('oct_usekalkforsolution'); 
if( $oct_usekalkforsolution ) {  ?>


<form method="POST" action="" name="ofrm" accept-charset="utf-8" class="form_check form_style" id="form4">
<input type="hidden" name="title" value="<?php the_title(); ?>">
<table border="0" cellpadding="0" width="300" id="table1">
<tbody style="width: 265px;display: block;float: left;position: relative;">
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><h2 class="gray"><?php $oct_key1010 = get_option('oct_key1010'); echo stripslashes($oct_key1010); ?></h2></td></tr>
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><input type="text" readonly name="GrandTotal" tabindex="99" id="bigtotal"  onchange="calculate()" style="    display: block;    color: #00468c;    font-size: 35px;    margin: -10px 0 10px 0;    border: 0;    width: 200px;    float: left;    text-align: right;"><span style="    display: block;    color: #00468c;    font-size: 30px;    float: left;    clear: none;    width: 50px;"> руб</span><br><a href="#order" title="Order" class="button3" style="text-align: center;" onclick="getElementById('wpcf7-f197-o3').style.display = 'block'; getElementById('order').style.display = 'block'"><?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?></a>
</td></tr>
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><h2><?php _e('As ready solutions INCLUDED', 'octa'); ?></h2></td></tr>
<?php if( get_field('pr1') ): ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name1"></div>
<?php the_field('name1'); ?><input type="hidden" name="name1" value="<?php the_field('name1'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr1=get_post_meta($post->ID, "pr1", true); $Cpr1=$pr1*$dollar; echo number_format($Cpr1,0, '', ' ') ?> руб)</td>
<td style="width: 19%;display: block;float: right;position: relative;">
<input type="number" min="<?php the_field('kol1'); ?>" max="999" name="qtyA" size="5" readonly  tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
<input type="hidden" name="totalA" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyA" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="totalA" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>
<?php if( get_field('pr2') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name2"></div><?php the_field('name2'); ?><input type="hidden" name="name2" value="<?php the_field('name2'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr2=get_post_meta($post->ID, "pr2", true); $Cpr2=$pr2*$dollar;echo number_format($Cpr2,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol2new'); ?>" readonly max="999" name="qtyB" size="5" tabindex="5" value="<?php the_field('kol2new'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalB" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyB" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="totalB" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr3') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name3"></div><?php the_field('name3'); ?><input type="hidden" name="name3" value="<?php the_field('name3'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr3=get_post_meta($post->ID, "pr3", true); $Cpr3=$pr3*$dollar;echo number_format($Cpr3,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol3'); ?>" readonly max="999" name="qtyC" size="5" tabindex="5" value="<?php the_field('kol3'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalC" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyC" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="totalC" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr4') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name4"></div><?php the_field('name4'); ?><input type="hidden" name="name4" value="<?php the_field('name4'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr4=get_post_meta($post->ID, "pr4", true); $Cpr4=$pr4*$dollar; echo number_format($Cpr4,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol4'); ?>" readonly max="999" name="qtyD" size="5" tabindex="5" value="<?php the_field('kol4'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalD" size="12" tabindex="99" onchange="calculate()">
		</tr>
	<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyD" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="totalD" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>	
<?php if( get_field('pr5') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name5"></div><?php the_field('name5'); ?><input type="hidden" name="name5" value="<?php the_field('name5'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr5=get_post_meta($post->ID, "pr5", true); $Cpr5=$pr5*$dollar; echo number_format($Cpr5,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol5'); ?>" max="999" readonly name="qtyE" size="5" tabindex="5" value="<?php the_field('kol5'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalE" size="12" tabindex="99" onchange="calculate()">
		</tr>
	<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyE" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="totalE" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>	
<?php if( get_field('pr6') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name6"></div><?php the_field('name6'); ?><input type="hidden" name="name6" value="<?php the_field('name6'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr6=get_post_meta($post->ID, "pr6", true); $Cpr6=$pr6*$dollar; echo number_format($Cpr6,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol6'); ?>" readonly max="999" name="qty1A" size="5" tabindex="5" value="<?php the_field('kol6'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1A" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1A" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="total1A" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>
<?php if( get_field('pr7') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name7"></div><?php the_field('name7'); ?><input type="hidden" name="name7" value="<?php the_field('name7'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr7=get_post_meta($post->ID, "pr7", true); $Cpr7=$pr7*$dollar; echo number_format($Cpr7,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol7'); ?>" readonly max="999" name="qty1B" size="5" tabindex="5" value="<?php the_field('kol7'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1B" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1B" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="total1B" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr8') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name8"></div><?php the_field('name8'); ?><input type="hidden" name="name8" value="<?php the_field('name8'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr8=get_post_meta($post->ID, "pr8", true); $Cpr8=$pr8*$dollar; echo number_format($Cpr8,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol8'); ?>" readonly max="999" name="qty1C" size="5" tabindex="5" value="<?php the_field('kol8'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1C" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1C" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="total1C" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr9') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name9"></div><?php the_field('name9'); ?><input type="hidden" name="name9" value="<?php the_field('name9'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr9=get_post_meta($post->ID, "pr9", true); $Cpr9=$pr9*$dollar; echo number_format($Cpr9,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" readonly min="<?php the_field('kol9'); ?>" max="999" name="qty1D" size="5" tabindex="5" value="<?php the_field('kol9'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1D" size="12" tabindex="99" onchange="calculate()">
		</tr>
	<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1D" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="total1D" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>	
<?php if( get_field('pr10') ): ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name10"></div><?php the_field('name10'); ?><input type="hidden" name="name10" value="<?php the_field('name10'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr10=get_post_meta($post->ID, "pr10", true); $Cpr10=$pr10*$dollar; echo number_format($Cpr10,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" readonly min="<?php the_field('kol10'); ?>" max="999" name="qty1E" size="5" tabindex="5" value="<?php the_field('kol10'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1E" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1E" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
					<input type="hidden" name="total1E" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>
</tbody>
</table>

<table border="0" cellpadding="0" width="240" id="table2">
<tbody style="width: 265px;display: block;float: left;position: relative;">
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><h2><?php _e('Additional options', 'octa'); ?></h2></td></tr>
<?php
if(get_field('sel1') == "1")
{
   ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<select name="select" id="select" class="select" style="width:265px;">
<?php if( get_field('sspr1') ): ?><option value="<?php the_field('sspr1'); ?>" class="s1"><?php the_field('ssna1'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr2') ): ?><option value="<?php the_field('sspr2'); ?>" class="s2" ><?php the_field('ssna2'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr3') ): ?><option value="<?php the_field('sspr3'); ?>" class="s3"><?php the_field('ssna3'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr4') ): ?><option value="<?php the_field('sspr4'); ?>" class="s4"><?php the_field('ssna4'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr5') ): ?><option value="<?php the_field('sspr5'); ?>" class="s5"><?php the_field('ssna5'); ?></option><?php else: ?><?php	endif; ?>
</select>
<?php if( get_field('sspr1') ): ?>
<div class="ss1">
<div class="ssin"><?php the_field('ssna1'); ?><input type="hidden" name="ssna1" value="<?php the_field('ssna1'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr1=get_post_meta($post->ID, "sspr1", true); $Csspr1=$sspr1*$dollar; echo number_format($Csspr1,0, '', ' ') ?> руб)</span> </div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss1" size="5" tabindex="5" value="<?php the_field('sskol1'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss1" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss1" size="5" tabindex="5" value="<?php the_field('sskol1'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss1" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr2') ): ?>
<div class="ss2">
<div class="ssin"><?php the_field('ssna2'); ?><input type="hidden" name="ssna2" value="<?php the_field('ssna2'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr2=get_post_meta($post->ID, "sspr2", true); $Csspr2=$sspr2*$dollar; echo number_format($Csspr2,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss2" size="5" tabindex="5" value="<?php the_field('sskol2'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss2" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss2" size="5" tabindex="5" value="<?php the_field('sskol2'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss2" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr3') ): ?>
<div class="ss3">
<div class="ssin"><?php the_field('ssna3'); ?><input type="hidden" name="ssna3" value="<?php the_field('ssna3'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr3=get_post_meta($post->ID, "sspr3", true); $Csspr3=$sspr3*$dollar; echo number_format($Csspr3,0, '', ' ') ?> руб)</span> </div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss3" size="5" tabindex="5" value="<?php the_field('sskol3'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss3" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss3" size="5" tabindex="5" value="<?php the_field('sskol3'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss3" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr4') ): ?>
<div class="ss4">
<div class="ssin"><?php the_field('ssna4'); ?><input type="hidden" name="ssna4" value="<?php the_field('ssna4'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr4=get_post_meta($post->ID, "sspr4", true); $Csspr4=$sspr4*$dollar; echo number_format($Csspr4,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss4" size="5" tabindex="5" value="<?php the_field('sskol4'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss4" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss4" size="5" tabindex="5" value="<?php the_field('sskol4'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss4" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr5') ): ?>
<div class="ss5">
<div class="ssin"><?php the_field('ssna5'); ?><input type="hidden" name="ssna5" value="<?php the_field('ssna5'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr5=get_post_meta($post->ID, "sspr5", true); $Csspr5=$sspr5*$dollar; echo number_format($Csspr5,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss5" size="5" tabindex="5" value="<?php the_field('sskol5'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss5" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss5" size="5" tabindex="5" value="<?php the_field('sskol5'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss5" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
</tr>
<?php }
else
{ ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss1" size="5" tabindex="5" value="<?php the_field('sskol1'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss1" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss2" size="5" tabindex="5" value="<?php the_field('sskol2'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss2" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss3" size="5" tabindex="5" value="<?php the_field('sskol3'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss3" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss4" size="5" tabindex="5" value="<?php the_field('sskol4'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss4" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss5" size="5" tabindex="5" value="<?php the_field('sskol5'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss5" size="12" tabindex="99" onchange="calculate()"></div>
<?php }
?>
<?php
if(get_field('sel2') == "1")
{
   ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">

<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<select name="select2" id="select2" class="select2" style="width:265px;">
    <?php if( get_field('sspr11') ): ?><option value="<?php the_field('sspr11'); ?>" class="s11"><?php the_field('ssna11'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr22') ): ?><option value="<?php the_field('sspr22'); ?>" class="s22" ><?php the_field('ssna22'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr33') ): ?><option value="<?php the_field('sspr33'); ?>" class="s33"><?php the_field('ssna33'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr44') ): ?><option value="<?php the_field('sspr44'); ?>" class="s44"><?php the_field('ssna44'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr55') ): ?><option value="<?php the_field('sspr55'); ?>" class="s55"><?php the_field('ssna55'); ?></option><?php else: ?><?php	endif; ?>
</select>

<?php if( get_field('sspr11') ): ?><div class="ss11">
<div class="ssin"><?php the_field('ssna11'); ?><input type="hidden" name="ssna11" value="<?php the_field('ssna11'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr11=get_post_meta($post->ID, "sspr11", true); $Csspr11=$sspr11*$dollar; echo number_format($Csspr11,0, '', ' ') ?> руб)</span> </div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss11" size="5" tabindex="5" value="<?php the_field('sskol11'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss11" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss11" size="5" tabindex="5" value="<?php the_field('sskol11'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss11" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr22') ): ?><div class="ss22">
<div class="ssin"><?php the_field('ssna22'); ?><input type="hidden" name="ssna22" value="<?php the_field('ssna22'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr22=get_post_meta($post->ID, "sspr22", true); $Csspr22=$sspr22*$dollar;  echo number_format($Cssp22,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss22" size="5" tabindex="5" value="<?php the_field('sskol22'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss22" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss22" size="5" tabindex="5" value="<?php the_field('sskol22'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss22" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr33') ): ?><div class="ss33">
<div class="ssin"><?php the_field('ssna33'); ?><input type="hidden" name="ssna33" value="<?php the_field('ssna33'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr33=get_post_meta($post->ID, "sspr33", true); $Csspr33=$sspr33*$dollar;  echo number_format($Csspr33,0, '', ' ') ?> руб)</span> </div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss33" size="5" tabindex="5" value="<?php the_field('sskol33'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss33" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss33" size="5" tabindex="5" value="<?php the_field('sskol33'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss33" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr44') ): ?><div class="ss44">
<div class="ssin"><?php the_field('ssna44'); ?><input type="hidden" name="ssna44" value="<?php the_field('ssna44'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr44=get_post_meta($post->ID, "sspr44", true); $Csspr44=$sspr44*$dollar;  echo number_format($Csspr44,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss44" size="5" tabindex="5" value="<?php the_field('sskol44'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss44" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss44" size="5" tabindex="5" value="<?php the_field('sskol44'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss44" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr55') ): ?><div class="ss55">
<div class="ssin"><?php the_field('ssna55'); ?><input type="hidden" name="ssna55" value="<?php the_field('ssna55'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr55=get_post_meta($post->ID, "sspr55", true); $Csspr55=$sspr55*$dollar;  echo number_format($Csspr55,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss55" size="5" tabindex="5" value="<?php the_field('sskol55'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss55" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss55" size="5" tabindex="5" value="<?php the_field('sskol55'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss55" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
</tr>
<?php }
else
{ ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss11" size="5" tabindex="5" value="<?php the_field('sskol11'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss11" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss22" size="5" tabindex="5" value="<?php the_field('sskol22'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss22" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss33" size="5" tabindex="5" value="<?php the_field('sskol33'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss33" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss44" size="5" tabindex="5" value="<?php the_field('sskol44'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss44" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss55" size="5" tabindex="5" value="<?php the_field('sskol55'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss55" size="12" tabindex="99" onchange="calculate()"></div>
<?php }
?>
<?php
if(get_field('sel3') == "1")
{
   ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<select name="select3" id="select3" class="select3" style="width:265px;">
    <?php if( get_field('sspr111') ): ?><option value="<?php the_field('sspr111'); ?>" class="s111"><?php the_field('ssna111'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr222') ): ?><option value="<?php the_field('sspr222'); ?>" class="s222" ><?php the_field('ssna222'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr333') ): ?><option value="<?php the_field('sspr333'); ?>" class="s333"><?php the_field('ssna333'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr444') ): ?><option value="<?php the_field('sspr444'); ?>" class="s444"><?php the_field('ssna444'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr555') ): ?><option value="<?php the_field('sspr555'); ?>" class="s555"><?php the_field('ssna555'); ?></option><?php else: ?><?php	endif; ?>
</select>
<?php if( get_field('sspr111') ): ?><div class="ss111">
<div class="ssin"><?php the_field('ssna111'); ?><input type="hidden" name="ssna111" value="<?php the_field('ssna111'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr111=get_post_meta($post->ID, "sspr111", true); $Csspr111=$sspr111*$dollar;  echo number_format($Csspr111,0, '', ' ') ?> руб)</span> </div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss111" size="5" tabindex="5" value="<?php the_field('sskol111'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss111" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss111" size="5" tabindex="5" value="<?php the_field('sskol111'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss111" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr222') ): ?><div class="ss222">
<div class="ssin"><?php the_field('ssna222'); ?><input type="hidden" name="ssna222" value="<?php the_field('ssna222'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr222=get_post_meta($post->ID, "sspr222", true); $Csspr222=$sspr222*$dollar; echo number_format($Csspr222,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss222" size="5" tabindex="5" value="<?php the_field('sskol222'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss222" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss222" size="5" tabindex="5" value="<?php the_field('sskol222'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss222" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr333') ): ?><div class="ss333">
<div class="ssin"><?php the_field('ssna333'); ?><input type="hidden" name="ssna333" value="<?php the_field('ssna333'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr333=get_post_meta($post->ID, "sspr333", true); $Csspr333=$sspr333*$dollar; echo number_format($Csspr333,0, '', ' ') ?> руб)</span> </div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss333" size="5" tabindex="5" value="<?php the_field('sskol333'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss333" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss333" size="5" tabindex="5" value="<?php the_field('sskol333'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss333" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr444') ): ?><div class="ss444">
<div class="ssin"><?php the_field('ssna444'); ?><input type="hidden" name="ssna444" value="<?php the_field('ssna444'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr444=get_post_meta($post->ID, "sspr444", true); $Csspr444=$sspr444*$dollar; echo number_format($Csspr444,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss444" size="5" tabindex="5" value="<?php the_field('sskol444'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss444" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss444" size="5" tabindex="5" value="<?php the_field('sskol444'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss444" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr555') ): ?><div class="ss555">
<div class="ssin"><?php the_field('ssna555'); ?><input type="hidden" name="ssna555" value="<?php the_field('ssna555'); ?>"><span style="font-style: italic; font-size: 12px;clear:top;">(<?php  $sspr555=get_post_meta($post->ID, "sspr555", true); $Csspr555=$sspr555*$dollar; echo number_format($Csspr555,0, '', ' ') ?> руб)</span></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss555" size="5" tabindex="5" value="<?php the_field('sskol555'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss555" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss555" size="5" tabindex="5" value="<?php the_field('sskol555'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss555" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
</tr>
<?php }
else
{ ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss111" size="5" tabindex="5" value="<?php the_field('sskol111'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss111" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss222" size="5" tabindex="5" value="<?php the_field('sskol222'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss222" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss333" size="5" tabindex="5" value="<?php the_field('sskol333'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss333" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss444" size="5" tabindex="5" value="<?php the_field('sskol444'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss444" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss555" size="5" tabindex="5" value="<?php the_field('sskol555'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss555" size="12" tabindex="99" onchange="calculate()"></div>
<?php }
?>
<?php if( get_field('pr1d') ): ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name1d'); ?><input type="hidden" name="name1d" value="<?php the_field('name1d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr1d=get_post_meta($post->ID, "pr1d", true); $Cpr1d=$pr1d*$dollar;echo number_format($Cpr1d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopA" size="5" tabindex="5" value="<?php the_field('kol1d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalAdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopA" size="5" tabindex="5" value="<?php the_field('kol1d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalAdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr2d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name2d'); ?><input type="hidden" name="name2d" value="<?php the_field('name2d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr2d=get_post_meta($post->ID, "pr2d", true); $Cpr2d=$pr2d*$dollar; echo number_format($Cpr2d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopB" size="5" tabindex="5" value="<?php the_field('kol2d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalBdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopB" size="5" tabindex="5" value="<?php the_field('kol2d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalBdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr3d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name3d'); ?><input type="hidden" name="name3d" value="<?php the_field('name3d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr3d=get_post_meta($post->ID, "pr3d", true); $Cpr3d=$pr3d*$dollar; echo number_format($Cpr3d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopC" size="5" tabindex="5" value="<?php the_field('kol3d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalCdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopC" size="5" tabindex="5" value="<?php the_field('kol3d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalCdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr4d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name4d'); ?><input type="hidden" name="name4d" value="<?php the_field('name4d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr4d=get_post_meta($post->ID, "pr4d", true); $Cpr4d=$pr4d*$dollar; echo number_format($Cpr4d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopD" size="5" tabindex="5" value="<?php the_field('kol4d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalDdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopD" size="5" tabindex="5" value="<?php the_field('kol4d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalDdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr5d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name5d'); ?><input type="hidden" name="name5d" value="<?php the_field('name5d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr5d=get_post_meta($post->ID, "pr5d", true); $Cpr5d=$pr5d*$dollar; echo number_format($Cpr5d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopE" size="5" tabindex="5" value="<?php the_field('kol5d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalEdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopE" size="5" tabindex="5" value="<?php the_field('kol5d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalEdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr6d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name6d'); ?><input type="hidden" name="name6d" value="<?php the_field('name6d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr6d=get_post_meta($post->ID, "pr6d", true); $Cpr6d=$pr6d*$dollar; echo number_format($Cpr6d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1A" size="5" tabindex="5" value="<?php the_field('kol6d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Adop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1A" size="5" tabindex="5" value="<?php the_field('kol6d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Adop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr7d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name7d'); ?><input type="hidden" name="name7d" value="<?php the_field('name7d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr7d=get_post_meta($post->ID, "pr7d", true); $Cpr7d=$pr7d*$dollar; echo number_format($Cpr7d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1B" size="5" tabindex="5" value="<?php the_field('kol7d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Bdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1B" size="5" tabindex="5" value="<?php the_field('kol7d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Bdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr8d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name8d'); ?><input type="hidden" name="name8d" value="<?php the_field('name8d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr8d=get_post_meta($post->ID, "pr8d", true); $Cpr8d=$pr8d*$dollar; echo number_format($Cpr8d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1C" size="5" tabindex="5" value="<?php the_field('kol8d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Cdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1C" size="5" tabindex="5" value="<?php the_field('kol8d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Cdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr9d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name9d'); ?><input type="hidden" name="name9d" value="<?php the_field('name9d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr9d=get_post_meta($post->ID, "pr9d", true); $Cpr9d=$pr9d*$dollar;echo number_format($Cpr9d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1D" size="5" tabindex="5" value="<?php the_field('kol9d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Ddop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1D" size="5" tabindex="5" value="<?php the_field('kol9d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Ddop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr10d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;cursor: pointer;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name10d'); ?><input type="hidden" name="name10d" value="<?php the_field('name10d'); ?>"><span style="font-style: italic; font-size: 12px;">(<?php  $pr10d=get_post_meta($post->ID, "pr10d", true); $Cpr10d=$pr10d*$dollar; echo number_format($Cpr10d,0, '', ' ') ?> руб)</td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1E" size="5" tabindex="5" value="<?php the_field('kol10d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Edop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1E" size="5" tabindex="5" value="<?php the_field('kol10d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Edop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		</tbody>

	</table>
</form>
  
<?php  } else { ?>

 
<form method="POST" action="" name="ofrm" accept-charset="utf-8" class="form_check form_style" id="form4">
<input type="hidden" name="title" value="<?php the_title(); ?>">
<table border="0" cellpadding="0" width="300" id="table1">
<tbody style="width: 265px;display: block;float: left;position: relative;">
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"></td></tr>
<tr style="width: 265px;display: none;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><input type="text" name="GrandTotal" tabindex="99" id="bigtotal"  onchange="calculate()" style="display: block;      color: #00468c;  font-size: 45px;  ont-weight: 300;      margin: -10px 0 10px 0;    max-width: 100%;    border: 0;    background: transparent;"></td></tr>
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><a href="#order" title="Order" class="button3" onclick="getElementById('wpcf7-f197-o3').style.display = 'block'; getElementById('order').style.display = 'block'"><?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?></a><br><h2><?php _e('As ready solutions INCLUDED', 'octa'); ?></h2></td></tr>
<?php if( get_field('pr1') ): ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name1"></div>
<?php the_field('name1'); ?><input type="hidden" name="name1" value="<?php the_field('name1'); ?>"></td>
<td style="width: 19%;display: block;float: right;position: relative;">
<input type="number" min="<?php the_field('kol1'); ?>" max="999" name="qtyA" size="5" readonly  tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
<input type="hidden" name="totalA" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyA" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalA" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>
<?php if( get_field('pr2') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name2"></div><?php the_field('name2'); ?><input type="hidden" name="name2" value="<?php the_field('name2'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol2new'); ?>" readonly max="999" name="qtyB" size="5" tabindex="5" value="<?php the_field('kol2new'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalB" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyB" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalB" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr3') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name3"></div><?php the_field('name3'); ?><input type="hidden" name="name3" value="<?php the_field('name3'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol3'); ?>" readonly max="999" name="qtyC" size="5" tabindex="5" value="<?php the_field('kol3'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalC" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyC" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalC" size="12" tabindex="99" onchange="calculate()">
</tr><?php	endif; ?>		
<?php if( get_field('pr4') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name4"></div><?php the_field('name4'); ?><input type="hidden" name="name4" value="<?php the_field('name4'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol4'); ?>" readonly max="999" name="qtyD" size="5" tabindex="5" value="<?php the_field('kol4'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalD" size="12" tabindex="99" onchange="calculate()">
		</tr>
	<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyD" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalD" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>	
<?php if( get_field('pr5') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name5"></div><?php the_field('name5'); ?><input type="hidden" name="name5" value="<?php the_field('name5'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol5'); ?>" max="999" readonly name="qtyE" size="5" tabindex="5" value="<?php the_field('kol5'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="totalE" size="12" tabindex="99" onchange="calculate()">
		</tr>
	<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtyE" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalE" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>	
<?php if( get_field('pr6') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name6"></div><?php the_field('name6'); ?><input type="hidden" name="name6" value="<?php the_field('name6'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol6'); ?>" readonly max="999" name="qty1A" size="5" tabindex="5" value="<?php the_field('kol6'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1A" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1A" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1A" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>
<?php if( get_field('pr7') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name7"></div><?php the_field('name7'); ?><input type="hidden" name="name7" value="<?php the_field('name7'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol7'); ?>" readonly max="999" name="qty1B" size="5" tabindex="5" value="<?php the_field('kol7'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1B" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1B" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1B" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr8') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name8"></div><?php the_field('name8'); ?><input type="hidden" name="name8" value="<?php the_field('name8'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="<?php the_field('kol8'); ?>" readonly max="999" name="qty1C" size="5" tabindex="5" value="<?php the_field('kol8'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1C" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1C" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1C" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>		
<?php if( get_field('pr9') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name9"></div><?php the_field('name9'); ?><input type="hidden" name="name9" value="<?php the_field('name9'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" readonly min="<?php the_field('kol9'); ?>" max="999" name="qty1D" size="5" tabindex="5" value="<?php the_field('kol9'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1D" size="12" tabindex="99" onchange="calculate()">
		</tr>
	<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1D" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1D" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>	
<?php if( get_field('pr10') ): ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><div id="psevdoradio"><input style="z-index:998; display: none;" type="radio" checked disabled name="name10"></div><?php the_field('name10'); ?><input type="hidden" name="name10" value="<?php the_field('name10'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" readonly min="<?php the_field('kol10'); ?>" max="999" name="qty1E" size="5" tabindex="5" value="<?php the_field('kol10'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="quont-plus btn">+</button><button class="quont-minus btn">-</button></td>
		<input type="hidden" name="total1E" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qty1E" size="5" tabindex="5" value="<?php the_field('kol1'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1E" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php	endif; ?>
</tbody>
</table>

<table border="0" cellpadding="0" width="240" id="table2">
<tbody style="width: 265px;display: block;float: left;position: relative;">
<tr style="width: 265px;display: block;float: left;position: relative;"><td style="width: 265px;display: block;float: left;position: relative;"><h2>Additional options</h2></td></tr>
<?php
if(get_field('sel1') == "1")
{ ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<select name="select" id="select" class="select" style="width:265px;">
<?php if( get_field('sspr1') ): ?><option value="<?php the_field('sspr1'); ?>" class="s1"><?php the_field('ssna1'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr2') ): ?><option value="<?php the_field('sspr2'); ?>" class="s2" ><?php the_field('ssna2'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr3') ): ?><option value="<?php the_field('sspr3'); ?>" class="s3"><?php the_field('ssna3'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr4') ): ?><option value="<?php the_field('sspr4'); ?>" class="s4"><?php the_field('ssna4'); ?></option><?php else: ?><?php	endif; ?>
<?php if( get_field('sspr5') ): ?><option value="<?php the_field('sspr5'); ?>" class="s5"><?php the_field('ssna5'); ?></option><?php else: ?><?php	endif; ?>
</select>
<?php if( get_field('sspr1') ): ?>
<div class="ss1">
<div class="ssin"><?php the_field('ssna1'); ?><input type="hidden" name="ssna1" value="<?php the_field('ssna1'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss1" size="5" tabindex="5" value="<?php the_field('sskol1'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss1" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss1" size="5" tabindex="5" value="<?php the_field('sskol1'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss1" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr2') ): ?>
<div class="ss2">
<div class="ssin"><?php the_field('ssna2'); ?><input type="hidden" name="ssna2" value="<?php the_field('ssna2'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss2" size="5" tabindex="5" value="<?php the_field('sskol2'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss2" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss2" size="5" tabindex="5" value="<?php the_field('sskol2'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss2" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr3') ): ?>
<div class="ss3">
<div class="ssin"><?php the_field('ssna3'); ?><input type="hidden" name="ssna3" value="<?php the_field('ssna3'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss3" size="5" tabindex="5" value="<?php the_field('sskol3'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss3" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss3" size="5" tabindex="5" value="<?php the_field('sskol3'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss3" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr4') ): ?>
<div class="ss4">
<div class="ssin"><?php the_field('ssna4'); ?><input type="hidden" name="ssna4" value="<?php the_field('ssna4'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss4" size="5" tabindex="5" value="<?php the_field('sskol4'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss4" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss4" size="5" tabindex="5" value="<?php the_field('sskol4'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss4" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr5') ): ?>
<div class="ss5">
<div class="ssin"><?php the_field('ssna5'); ?><input type="hidden" name="ssna5" value="<?php the_field('ssna5'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss5" size="5" tabindex="5" value="<?php the_field('sskol5'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss5" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss5" size="5" tabindex="5" value="<?php the_field('sskol5'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss5" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
</tr>
<?php }
else
{ ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss1" size="5" tabindex="5" value="<?php the_field('sskol1'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss1" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss2" size="5" tabindex="5" value="<?php the_field('sskol2'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss2" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss3" size="5" tabindex="5" value="<?php the_field('sskol3'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss3" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss4" size="5" tabindex="5" value="<?php the_field('sskol4'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss4" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss5" size="5" tabindex="5" value="<?php the_field('sskol5'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss5" size="12" tabindex="99" onchange="calculate()"></div>
<?php }
?>
<?php
if(get_field('sel2') == "1")
{
   ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<select name="select2" id="select2" class="select2" style="width:265px;">
    <?php if( get_field('sspr11') ): ?><option value="<?php the_field('sspr11'); ?>" class="s11"><?php the_field('ssna11'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr22') ): ?><option value="<?php the_field('sspr22'); ?>" class="s22" ><?php the_field('ssna22'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr33') ): ?><option value="<?php the_field('sspr33'); ?>" class="s33"><?php the_field('ssna33'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr44') ): ?><option value="<?php the_field('sspr44'); ?>" class="s44"><?php the_field('ssna44'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr55') ): ?><option value="<?php the_field('sspr55'); ?>" class="s55"><?php the_field('ssna55'); ?></option><?php else: ?><?php	endif; ?>
</select>
<?php if( get_field('sspr11') ): ?><div class="ss11">
<div class="ssin"><?php the_field('ssna11'); ?><input type="hidden" name="ssna11" value="<?php the_field('ssna11'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss11" size="5" tabindex="5" value="<?php the_field('sskol11'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss11" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss11" size="5" tabindex="5" value="<?php the_field('sskol11'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss11" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr22') ): ?><div class="ss22">
<div class="ssin"><?php the_field('ssna22'); ?><input type="hidden" name="ssna22" value="<?php the_field('ssna22'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss22" size="5" tabindex="5" value="<?php the_field('sskol22'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss22" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss22" size="5" tabindex="5" value="<?php the_field('sskol22'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss22" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr33') ): ?><div class="ss33">
<div class="ssin"><?php the_field('ssna33'); ?><input type="hidden" name="ssna33" value="<?php the_field('ssna33'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss33" size="5" tabindex="5" value="<?php the_field('sskol33'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss33" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss33" size="5" tabindex="5" value="<?php the_field('sskol33'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss33" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr44') ): ?><div class="ss44">
<div class="ssin"><?php the_field('ssna44'); ?><input type="hidden" name="ssna44" value="<?php the_field('ssna44'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss44" size="5" tabindex="5" value="<?php the_field('sskol44'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss44" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss44" size="5" tabindex="5" value="<?php the_field('sskol44'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss44" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr55') ): ?><div class="ss55">
<div class="ssin"><?php the_field('ssna55'); ?><input type="hidden" name="ssna55" value="<?php the_field('ssna55'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss55" size="5" tabindex="5" value="<?php the_field('sskol55'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss55" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss55" size="5" tabindex="5" value="<?php the_field('sskol55'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss55" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
</tr>
<?php }
else
{ ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss11" size="5" tabindex="5" value="<?php the_field('sskol11'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss11" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss22" size="5" tabindex="5" value="<?php the_field('sskol22'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss22" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss33" size="5" tabindex="5" value="<?php the_field('sskol33'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss33" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss44" size="5" tabindex="5" value="<?php the_field('sskol44'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss44" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss55" size="5" tabindex="5" value="<?php the_field('sskol55'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss55" size="12" tabindex="99" onchange="calculate()"></div>
<?php }
?>
<?php
if(get_field('sel3') == "1")
{
   ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;">
<select name="select3" id="select3" class="select3" style="width:265px;">
    <?php if( get_field('sspr111') ): ?><option value="<?php the_field('sspr111'); ?>" class="s111"><?php the_field('ssna111'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr222') ): ?><option value="<?php the_field('sspr222'); ?>" class="s222" ><?php the_field('ssna222'); ?></option><?php else: ?><?php	endif; ?>
    <?php if( get_field('sspr333') ): ?><option value="<?php the_field('sspr333'); ?>" class="s333"><?php the_field('ssna333'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr444') ): ?><option value="<?php the_field('sspr444'); ?>" class="s444"><?php the_field('ssna444'); ?></option><?php else: ?><?php	endif; ?>
	<?php if( get_field('sspr555') ): ?><option value="<?php the_field('sspr555'); ?>" class="s555"><?php the_field('ssna555'); ?></option><?php else: ?><?php	endif; ?>
</select>
<?php if( get_field('sspr111') ): ?><div class="ss111">
<div class="ssin"><?php the_field('ssna111'); ?><input type="hidden" name="ssna111" value="<?php the_field('ssna111'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss111" size="5" tabindex="5" value="<?php the_field('sskol111'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss111" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss111" size="5" tabindex="5" value="<?php the_field('sskol111'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss111" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr222') ): ?><div class="ss222">
<div class="ssin"><?php the_field('ssna222'); ?><input type="hidden" name="ssna222" value="<?php the_field('ssna222'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss222" size="5" tabindex="5" value="<?php the_field('sskol222'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss222" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss222" size="5" tabindex="5" value="<?php the_field('sskol222'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss222" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr333') ): ?><div class="ss333">
<div class="ssin"><?php the_field('ssna333'); ?><input type="hidden" name="ssna333" value="<?php the_field('ssna333'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss333" size="5" tabindex="5" value="<?php the_field('sskol333'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss333" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss333" size="5" tabindex="5" value="<?php the_field('sskol333'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss333" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr444') ): ?><div class="ss444">
<div class="ssin"><?php the_field('ssna444'); ?><input type="hidden" name="ssna444" value="<?php the_field('ssna444'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss444" size="5" tabindex="5" value="<?php the_field('sskol444'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss444" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss444" size="5" tabindex="5" value="<?php the_field('sskol444'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss444" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
<?php if( get_field('sspr555') ): ?><div class="ss555">
<div class="ssin"><?php the_field('ssna555'); ?><input type="hidden" name="ssna555" value="<?php the_field('ssna555'); ?>"></div>
<div class="ssk"><input type="number" min="0" max="999" name="qtyss555" size="5" tabindex="5" value="<?php the_field('sskol555'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></div>
<input type="hidden" name="totalss555" size="12" tabindex="99" onchange="calculate()"></div>
<?php else: ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss555" size="5" tabindex="5" value="<?php the_field('sskol555'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss555" size="12" tabindex="99" onchange="calculate()"></div>
<?php	endif; ?>
</tr>
<?php }
else
{ ?>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss111" size="5" tabindex="5" value="<?php the_field('sskol111'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss111" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss222" size="5" tabindex="5" value="<?php the_field('sskol222'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss222" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss333" size="5" tabindex="5" value="<?php the_field('sskol333'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss333" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss444" size="5" tabindex="5" value="<?php the_field('sskol444'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss444" size="12" tabindex="99" onchange="calculate()"></div>
<div class="ssk" STYLE="display:none;"><input type="number" min="0" max="999" name="qtyss555" size="5" tabindex="5" value="<?php the_field('sskol555'); ?>"  onchange="return validNum(document.ofrm)"></div>
<input type="hidden" name="totalss555" size="12" tabindex="99" onchange="calculate()"></div>
<?php }
?>
<?php if( get_field('pr1d') ): ?>
<tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name1d'); ?><input type="hidden" name="name1d" value="<?php the_field('name1d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopA" size="5" tabindex="5" value="<?php the_field('kol1d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalAdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopA" size="5" tabindex="5" value="<?php the_field('kol1d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalAdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr2d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name2d'); ?><input type="hidden" name="name2d" value="<?php the_field('name2d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopB" size="5" tabindex="5" value="<?php the_field('kol2d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalBdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopB" size="5" tabindex="5" value="<?php the_field('kol2d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalBdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr3d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name3d'); ?><input type="hidden" name="name3d" value="<?php the_field('name3d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopC" size="5" tabindex="5" value="<?php the_field('kol3d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalCdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopC" size="5" tabindex="5" value="<?php the_field('kol3d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalCdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr4d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name4d'); ?><input type="hidden" name="name4d" value="<?php the_field('name4d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopD" size="5" tabindex="5" value="<?php the_field('kol4d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalDdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopD" size="5" tabindex="5" value="<?php the_field('kol4d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalDdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr5d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name5d'); ?><input type="hidden" name="name5d" value="<?php the_field('name5d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydopE" size="5" tabindex="5" value="<?php the_field('kol5d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="totalEdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydopE" size="5" tabindex="5" value="<?php the_field('kol5d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="totalEdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr6d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name6d'); ?><input type="hidden" name="name6d" value="<?php the_field('name6d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1A" size="5" tabindex="5" value="<?php the_field('kol6d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Adop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1A" size="5" tabindex="5" value="<?php the_field('kol6d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Adop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr7d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name7d'); ?><input type="hidden" name="name7d" value="<?php the_field('name7d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1B" size="5" tabindex="5" value="<?php the_field('kol7d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Bdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1B" size="5" tabindex="5" value="<?php the_field('kol7d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Bdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr8d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name8d'); ?><input type="hidden" name="name8d" value="<?php the_field('name8d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1C" size="5" tabindex="5" value="<?php the_field('kol8d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Cdop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1C" size="5" tabindex="5" value="<?php the_field('kol8d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Cdop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr9d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name9d'); ?><input type="hidden" name="name9d" value="<?php the_field('name9d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1D" size="5" tabindex="5" value="<?php the_field('kol9d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Ddop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1D" size="5" tabindex="5" value="<?php the_field('kol9d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Ddop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		<?php if( get_field('pr10d') ): ?><tr style="width: 265px;display: block;float: left;position: relative;margin-bottom: 10px;">
		<td style="width: 80%;display: block;float: left;position: relative; position: relative;font-size: 14px;color: #4b4b4b;font-weight: 600;display: inline-block;"><?php the_field('name10d'); ?><input type="hidden" name="name10d" value="<?php the_field('name10d'); ?>"></td>
		<td style="width: 19%;display: block;float: right;position: relative;"><input type="number" min="0" max="999" name="qtydop1E" size="5" tabindex="5" value="<?php the_field('kol10d'); ?>"  onchange="return validNum(document.ofrm)" class="solutionsinput"><button class="minus"></button><button class="plus"></button></td>
		<input type="hidden" name="total1Edop" size="12" tabindex="99" onchange="calculate()">
		</tr>
		<?php else: ?>
<tr style="width: 265px;display: block;float: left;position: relative;">
<td><input type="hidden" min="0" max="999" name="qtydop1E" size="5" tabindex="5" value="<?php the_field('kol10d'); ?>"  onchange="return validNum(document.ofrm)" ></td>
<input type="hidden" name="total1Edop" size="12" tabindex="99" onchange="calculate()">
</tr>
<?php endif; ?>
		</tbody>
	</table>
</form>

<?php  } ?>

<div class="clear"></div>
<ul id="moments" style="margin-top:-40px;">
<li class="middle-block" style="background: none;    display: none;">
</li>
<li class="right-block" style="text-align: left; margin-top: -120px;    float: right;">
<h3 style="text-align: left; font-size:16px;text-transform: uppercase;"><?php _e('Call us', 'octa'); ?></h3><br>
<span id="order-phone-l2" class="phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></span><br>
<span style="font-size:12px; color: #000;"><?php _e('We work from 09:00 to 18:00, Mon-Fri', 'octa'); ?></span><br>
<span style="font-size: 25px;	color: #00468c; padding-left: 100px; line-height: 34px;"><?php _e('or', 'octa'); ?></span><br>
<a href="#callback" title="Order обратный звонок" class="button4" onclick="getElementById('wpcf7-f1032-o1').style.display = 'block'; getElementById('callback').style.display = 'block'"><?php $oct_k2 = get_option('oct_k2'); echo stripslashes($oct_k2); ?></a>
</li>
</ul>
<div class="clear"></div>
<div class="tab-menu five-links">
 <a class="menu-item tab-link one <?php if ($current_fp == '') { echo ' active'; } ?>" href="<?php echo get_permalink(); ?>#about"><?php _e('Description', 'octa'); ?></a> 
 <a class="menu-item tab-link two<?php if ($current_fp == 'components') { echo ' active'; } ?>" href="<?php echo get_permalink() ?>components/#product"><?php _e('Elements', 'octa'); ?></a> 
 <a class="menu-item tab-link three<?php if ($current_fp == 'documents') { echo ' active'; } ?>" href="<?php echo get_permalink() ?>documents/#doc"><?php _e('Documentation', 'octa'); ?></a> 
 <a class="menu-item tab-link four<?php  if ($current_fp == 'clients') { echo ' active'; }  ?>" href="<?php echo get_permalink() ?>clients/#customers"><?php _e('Who Uses', 'octa'); ?></a> 
 <a class="menu-item tab-link five<?php if ($current_fp == 'feedback') { echo ' active'; } ?>" href="<?php echo get_permalink() ?>feedback/#comments"><?php _e('Reviews', 'octa'); ?></a> 
<div class="clear"></div>
<?php while ( have_posts() ) : the_post(); ?>

		<?php 
		if (!$current_fp) {
				get_template_part( 'single', 'solutions-index' );
			} else if ($current_fp == 'components') {
				get_template_part( 'single', 'solutions-components' );
			} else if ($current_fp == 'documents') {
				get_template_part( 'single', 'solutions-documents' );
				} else if ($current_fp == 'clients') {
				get_template_part( 'single', 'solutions-clients' );
			} else if ($current_fp == 'feedback') {
				get_template_part( 'single', 'solutions-feedback' );
			}; ?>
<?php endwhile; // end of the loop. ?>
</div>
<a href="#order" title="Order" class="button5" onclick="getElementById('wpcf7-f197-o3').style.display = 'block'; getElementById('order').style.display = 'block'"><?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?></a>
<span class="phone" id="phone-bottom"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></span>
<div class="clear"></div>

<script>
$(document).ready(function () {
    $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s1')) {
        $(".ss1").show('5000');
    } else {
        $(".ss1").hide('5000');
    }
  }).change();
});
</script>

<script>
$(document).ready(function () {
    $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s2')) {
        $(".ss2").show('5000');
    } else {
        $(".ss2").hide('5000');
    }
  }).change();
});
</script>

<script>
$(document).ready(function () {
    $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s3')) {
        $(".ss3").show('5000');
    } else {
        $(".ss3").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s4')) {
        $(".ss4").show('5000');
    } else {
        $(".ss4").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s5')) {
        $(".ss5").show('5000');
    } else {
        $(".ss5").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s11')) {
        $(".ss11").show('5000');
    } else {
        $(".ss11").hide('5000');
    }
  }).change();
});
</script>

<script>
$(document).ready(function () {
    $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s22')) {
        $(".ss22").show('5000');
    } else {
        $(".ss22").hide('5000');
    }
  }).change();
});
</script>

<script>
$(document).ready(function () {
    $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s33')) {
        $(".ss33").show('5000');
    } else {
        $(".ss33").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s44')) {
        $(".ss44").show('5000');
    } else {
        $(".ss44").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s55')) {
        $(".ss55").show('5000');
    } else {
        $(".ss55").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s111')) {
        $(".ss111").show('5000');
    } else {
        $(".ss111").hide('5000');
    }
  }).change();
});
</script>

<script>
$(document).ready(function () {
    $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s222')) {
        $(".ss222").show('5000');
    } else {
        $(".ss222").hide('5000');
    }
  }).change();
});
</script>

<script>
$(document).ready(function () {
    $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s333')) {
        $(".ss333").show('5000');
    } else {
        $(".ss333").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s444')) {
        $(".ss444").show('5000');
    } else {
        $(".ss444").hide('5000');
    }
  }).change();
});
</script>
<script>
$(document).ready(function () {
    $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s555')) {
        $(".ss555").show('5000');
    } else {
        $(".ss555").hide('5000');
    }
  }).change();
});
</script>
<script language=javascript>
function dm(amount) 
{
  string = "" + amount;
  dec = string.length - string.indexOf('.');
  if (string.indexOf('.') == -1)
  return string + ' руб';
  if (dec > 1)
  return string + ' руб';
  if (dec == 2)
  return string + ' руб';
  if (dec > 3)
  return string.substring(0,string.length-dec+3);
  return string;
}

function calculate()
{
QtyA = 0;  QtyB = 0;  QtyC = 0; QtyD = 0; QtyE = 0;Qty1A = 0;  Qty1B = 0;  Qty1C = 0; Qty1D = 0; Qty1E = 0; QtydopA = 0;  QtydopB = 0;  QtydopC = 0; QtydopD = 0; QtydopE = 0;Qtydop1A = 0;  Qtydop1B = 0;  Qtydop1C = 0; Qtydop1D = 0; Qtydop1E = 0; Qtyss1 = 0;  Qtyss2 = 0;  Qtyss3 = 0; Qtyss4 = 0; Qtyss5 = 0; Qtyss11 = 0;  Qtyss22 = 0;  Qtyss33 = 0; Qtyss44 = 0; Qtyss55 = 0;Qtyss111 = 0;  Qtyss222 = 0;  Qtyss333 = 0; Qtyss444 = 0; Qtyss555 = 0;

TotA = 0;  TotB = 0;  TotC = 0; TotD = 0; TotE = 0;Tot1A = 0;  Tot1B = 0;  Tot1C = 0; Tot1D = 0; Tot1E = 0; TotdopA = 0;  TotdopB = 0;  TotdopC = 0; TotdopD = 0; TotdopE = 0;Totdop1A = 0;  Totdop1B = 0;  Totdop1C = 0; Totdop1D = 0; Totdop1E = 0; Totss1 = 0;  Totss2 = 0;  Totss3 = 0; Totss4 = 0; Totss5 = 0;Totss11 = 0;  Totss22 = 0;  Totss33 = 0; Totss44 = 0; Totss55 = 0;Totss111 = 0;  Totss222 = 0;  Totss333 = 0; Totss444 = 0; Totss555 = 0;

<?php if( get_field('pr1') ): ?>
PrcA =  <?php echo  round($Cpr1, 0)  ; ?> ; <?php else:   ?>
PrcA = 0; <?php	endif; ?>
<?php if( get_field('pr2') ): ?>
PrcB = <?php echo  round($Cpr2, 0)  ; ?> ;  <?php else:   ?>
PrcB = 0; <?php	endif; ?>
<?php if( get_field('pr3') ): ?>
PrcC = <?php echo  round($Cpr3, 0)  ; ?> ;  <?php else:   ?>
PrcC = 0; <?php	endif; ?>
<?php if( get_field('pr4') ): ?>
PrcD = <?php echo  round($Cpr4, 0)  ; ?> ;  <?php else:   ?>
PrcD = 0; <?php	endif; ?>
<?php if( get_field('pr5') ): ?>
PrcE = <?php echo  round($Cpr5, 0)  ; ?> ;  <?php else:   ?>
PrcE = 0; <?php	endif; ?>
<?php if( get_field('pr6') ): ?>
Prc1A = <?php echo  round($Cpr6, 0)  ; ?> ;  <?php else:   ?>
Prc1A = 0; <?php	endif; ?>
<?php if( get_field('pr7') ): ?>
Prc1B = <?php echo  round($Cpr7, 0)  ; ?> ;  <?php else:   ?>
Prc1B = 0; <?php	endif; ?>
<?php if( get_field('pr8') ): ?>
Prc1C = <?php echo  round($Cpr8, 0)  ; ?> ;  <?php else:   ?>
Prc1C = 0; <?php	endif; ?>
<?php if( get_field('pr9') ): ?>
Prc1D = <?php echo  round($Cpr9, 0)  ; ?> ;  <?php else:   ?>
Prc1D = 0; <?php	endif; ?>
<?php if( get_field('pr10') ): ?>
Prc1E = <?php echo  round($Cpr10, 0)  ; ?> ;  <?php else:   ?>
Prc1E = 0; <?php	endif; ?>
<?php if( get_field('pr1d') ): ?>
PrcdopA = <?php echo  round($Cpr1d, 0)  ; ?> ;  <?php else:   ?>
PrcdopA = 0; <?php	endif; ?>
<?php if( get_field('pr2d') ): ?>
PrcdopB = <?php echo  round($Cpr2d, 0)  ; ?> ;  <?php else:   ?>
PrcdopB = 0; <?php	endif; ?>
<?php if( get_field('pr3d') ): ?>
PrcdopC = <?php echo  round($Cpr3d, 0)  ; ?> ;  <?php else:   ?>
PrcdopC = 0; <?php	endif; ?>
<?php if( get_field('pr4d') ): ?>
PrcdopD = <?php echo  round($Cpr4d, 0)  ; ?> ;  <?php else:   ?>
PrcdopD = 0; <?php	endif; ?>
<?php if( get_field('pr5d') ): ?>
PrcdopE = <?php echo  round($Cpr5d, 0)  ; ?> ;  <?php else:   ?>
PrcdopE = 0; <?php	endif; ?>
<?php if( get_field('pr6d') ): ?>
Prcdop1A = <?php echo  round($Cpr6d, 0)  ; ?> ;  <?php else:   ?>
Prcdop1A = 0; <?php	endif; ?>
<?php if( get_field('pr7d') ): ?>
Prcdop1B = <?php echo  round($Cpr7d, 0)  ; ?> ;  <?php else:   ?>
Prcdop1B = 0; <?php	endif; ?>
<?php if( get_field('pr8d') ): ?>
Prcdop1C = <?php echo  round($Cpr8d, 0)  ; ?> ;  <?php else:   ?>
Prcdop1C = 0; <?php	endif; ?>
<?php if( get_field('pr9d') ): ?>
Prcdop1D = <?php echo  round($Cpr9d, 0)  ; ?> ;  <?php else:   ?>
Prcdop1D = 0; <?php	endif; ?>
<?php if( get_field('pr10d') ): ?>
Prcdop1E = <?php echo  round($Cpr10d, 0)  ; ?> ;  <?php else:   ?>
Prcdop1E = 0; <?php	endif; ?>
<?php if( get_field('sspr1') ): ?>
Prcss1 = <?php echo  round($Csspr1, 0)  ; ?> ;  <?php else:   ?>
Prcss1 = 0; <?php	endif; ?>
<?php if( get_field('sspr2') ): ?>
Prcss2 = <?php echo  round($Csspr2, 0)  ; ?> ;  <?php else:   ?>
Prcss2 = 0; <?php	endif; ?>
<?php if( get_field('sspr3') ): ?>
Prcss3 = <?php echo  round($Csspr3, 0)  ; ?> ;  <?php else:   ?>
Prcss3 = 0; <?php	endif; ?>
<?php if( get_field('sspr4') ): ?>
Prcss4 = <?php echo  round($Csspr4, 0)  ; ?> ;  <?php else:   ?>
Prcss4 = 0; <?php	endif; ?>
<?php if( get_field('sspr5') ): ?>
Prcss5 = <?php echo  round($Csspr5, 0)  ; ?> ;  <?php else:   ?>
Prcss5 = 0; <?php	endif; ?>
<?php if( get_field('sspr11') ): ?>
Prcss11 = <?php echo  round($Csspr11, 0)  ; ?> ;  <?php else:   ?>
Prcss11 = 0; <?php	endif; ?>
<?php if( get_field('sspr22') ): ?>
Prcss22 = <?php echo  round($Csspr22, 0)  ; ?> ;  <?php else:   ?>
Prcss22 = 0; <?php	endif; ?>
<?php if( get_field('sspr33') ): ?>
Prcss33 = <?php echo  round($Csspr33, 0)  ; ?> ;  <?php else:   ?>
Prcss33 = 0; <?php	endif; ?>
<?php if( get_field('sspr44') ): ?>
Prcss44 = <?php echo  round($Csspr44, 0)  ; ?> ;  <?php else:   ?>
Prcss44 = 0; <?php	endif; ?>
<?php if( get_field('sspr55') ): ?>
Prcss55 = <?php echo  round($Csspr55, 0)  ; ?> ;  <?php else:   ?>
Prcss55 = 0; <?php	endif; ?>
<?php if( get_field('sspr111') ): ?>
Prcss111 = <?php echo  round($Csspr111, 0)  ; ?> ;  <?php else:   ?>
Prcss111 = 0; <?php	endif; ?>
<?php if( get_field('sspr222') ): ?>
Prcss222 = <?php echo  round($Csspr222, 0)  ; ?> ;  <?php else:   ?>
Prcss222 = 0; <?php	endif; ?>
<?php if( get_field('sspr333') ): ?>
Prcss333 = <?php echo  round($Csspr333, 0)  ; ?> ;  <?php else:   ?>
Prcss333 = 0; <?php	endif; ?>
<?php if( get_field('sspr444') ): ?>
Prcss444 = <?php echo  round($Csspr444, 0)  ; ?> ;  <?php else:   ?>
Prcss444 = 0; <?php	endif; ?>
<?php if( get_field('sspr555') ): ?>
Prcss555 = <?php echo  round($Csspr555, 0)  ; ?> ;  <?php else:   ?>
Prcss555 = 0; <?php	endif; ?>

if (document.ofrm.qtyA.value > "")
     { QtyA = document.ofrm.qtyA.value };
  document.ofrm.qtyA.value = eval(QtyA);  
   if (document.ofrm.qtyB.value > "")
     { QtyB = document.ofrm.qtyB.value };
  document.ofrm.qtyB.value = eval(QtyB);  
   if (document.ofrm.qtyC.value > "")
     { QtyC = document.ofrm.qtyC.value };
  document.ofrm.qtyC.value = eval(QtyC);
  if (document.ofrm.qtyD.value > "")
     { QtyD = document.ofrm.qtyD.value };
  document.ofrm.qtyD.value = eval(QtyD);
  if (document.ofrm.qtyE.value > "")
     { QtyE = document.ofrm.qtyE.value };
  document.ofrm.qtyE.value = eval(QtyE);
   if (document.ofrm.qty1A.value > "")
     { Qty1A = document.ofrm.qty1A.value };
  document.ofrm.qty1A.value = eval(Qty1A);  
   if (document.ofrm.qty1B.value > "")
     { Qty1B = document.ofrm.qty1B.value };
  document.ofrm.qty1B.value = eval(Qty1B);  
   if (document.ofrm.qty1C.value > "")
     { Qty1C = document.ofrm.qty1C.value };
  document.ofrm.qty1C.value = eval(Qty1C);
  if (document.ofrm.qty1D.value > "")
     { Qty1D = document.ofrm.qty1D.value };
  document.ofrm.qty1D.value = eval(Qty1D);
  if (document.ofrm.qty1E.value > "")
     { Qty1E = document.ofrm.qty1E.value };
  document.ofrm.qty1E.value = eval(Qty1E);
 if (document.ofrm.qtydopA.value > "")
     { QtydopA = document.ofrm.qtydopA.value };
  document.ofrm.qtydopA.value = eval(QtydopA);  
  if (document.ofrm.qtydopB.value > "")
     { QtydopB = document.ofrm.qtydopB.value };
  document.ofrm.qtydopB.value = eval(QtydopB);  
  if (document.ofrm.qtydopC.value > "")
     { QtydopC = document.ofrm.qtydopC.value };
  document.ofrm.qtydopC.value = eval(QtydopC);
 if (document.ofrm.qtydopD.value > "")
     { QtydopD = document.ofrm.qtydopD.value };
  document.ofrm.qtydopD.value = eval(QtydopD);
 if (document.ofrm.qtydopE.value > "")
     { QtydopE = document.ofrm.qtydopE.value };
  document.ofrm.qtydopE.value = eval(QtydopE);
  if (document.ofrm.qtydop1A.value > "")
     { Qtydop1A = document.ofrm.qtydop1A.value };
  document.ofrm.qtydop1A.value = eval(Qtydop1A);  
  if (document.ofrm.qtydop1B.value > "")
     { Qtydop1B = document.ofrm.qtydop1B.value };
  document.ofrm.qtydop1B.value = eval(Qtydop1B);  
  if (document.ofrm.qtydop1C.value > "")
     { Qtydop1C = document.ofrm.qtydop1C.value };
  document.ofrm.qtydop1C.value = eval(Qtydop1C);
  if (document.ofrm.qtydop1D.value > "")
     { Qtydop1D = document.ofrm.qtydop1D.value };
  document.ofrm.qtydop1D.value = eval(Qtydop1D);
  if (document.ofrm.qtydop1E.value > "")
     { Qtydop1E = document.ofrm.qtydop1E.value };
  document.ofrm.qtydop1E.value = eval(Qtydop1E);
 if (document.ofrm.qtyss1.value > "")
     { Qtyss1 = document.ofrm.qtyss1.value };
  document.ofrm.qtyss1.value = eval(Qtyss1);  
   if (document.ofrm.qtyss2.value > "")
     { Qtyss2 = document.ofrm.qtyss2.value };
  document.ofrm.qtyss2.value = eval(Qtyss2);  
   if (document.ofrm.qtyss3.value > "")
     { Qtyss3 = document.ofrm.qtyss3.value };
  document.ofrm.qtyss3.value = eval(Qtyss3);
  if (document.ofrm.qtyss4.value > "")
     { Qtyss4 = document.ofrm.qtyss4.value };
  document.ofrm.qtyss4.value = eval(Qtyss4);
  if (document.ofrm.qtyss5.value > "")
     { Qtyss5 = document.ofrm.qtyss5.value };
  document.ofrm.qtyss5.value = eval(Qtyss5);
  if (document.ofrm.qtyss11.value > "")
     { Qtyss11 = document.ofrm.qtyss11.value };
  document.ofrm.qtyss11.value = eval(Qtyss11);  
   if (document.ofrm.qtyss22.value > "")
     { Qtyss22 = document.ofrm.qtyss22.value };
  document.ofrm.qtyss22.value = eval(Qtyss22);  
   if (document.ofrm.qtyss33.value > "")
     { Qtyss33 = document.ofrm.qtyss33.value };
  document.ofrm.qtyss33.value = eval(Qtyss33);
  if (document.ofrm.qtyss44.value > "")
     { Qtyss44 = document.ofrm.qtyss44.value };
  document.ofrm.qtyss44.value = eval(Qtyss44);
  if (document.ofrm.qtyss55.value > "")
     { Qtyss55 = document.ofrm.qtyss55.value };
  document.ofrm.qtyss55.value = eval(Qtyss55);
  if (document.ofrm.qtyss111.value > "")
     { Qtyss111 = document.ofrm.qtyss111.value };
  document.ofrm.qtyss111.value = eval(Qtyss111);  
   if (document.ofrm.qtyss222.value > "")
     { Qtyss222 = document.ofrm.qtyss222.value };
  document.ofrm.qtyss222.value = eval(Qtyss222);  
   if (document.ofrm.qtyss333.value > "")
     { Qtyss333 = document.ofrm.qtyss333.value };
  document.ofrm.qtyss333.value = eval(Qtyss333);
  if (document.ofrm.qtyss444.value > "")
     { Qtyss444 = document.ofrm.qtyss444.value };
  document.ofrm.qtyss444.value = eval(Qtyss444);
  if (document.ofrm.qtyss555.value > "")
     { Qtyss555 = document.ofrm.qtyss555.value };
  document.ofrm.qtyss555.value = eval(Qtyss555);

  TotA = QtyA * PrcA;
  document.ofrm.totalA.value = dm(eval(TotA));
  TotB = QtyB * PrcB;
  document.ofrm.totalB.value = dm(eval(TotB));
  TotC = QtyC * PrcC;
  document.ofrm.totalC.value = dm(eval(TotC));
  TotD = QtyD * PrcD;
  document.ofrm.totalD.value = dm(eval(TotD));
  TotE = QtyE * PrcE;
  document.ofrm.totalE.value = dm(eval(TotE));
  Tot1A = Qty1A * Prc1A;
  document.ofrm.total1A.value = dm(eval(Tot1A));
  Tot1B = Qty1B * Prc1B;
  document.ofrm.total1B.value = dm(eval(Tot1B));
  Tot1C = Qty1C * Prc1C;
  document.ofrm.total1C.value = dm(eval(Tot1C));
  Tot1D = Qty1D * Prc1D;
  document.ofrm.total1D.value = dm(eval(Tot1D));
  Tot1E = Qty1E * Prc1E;
  document.ofrm.total1E.value = dm(eval(Tot1E));
  TotdopA = QtydopA * PrcdopA;
  document.ofrm.totalAdop.value = dm(eval(TotdopA));
  TotdopB = QtydopB * PrcdopB;
  document.ofrm.totalBdop.value = dm(eval(TotdopB));
  TotdopC = QtydopC * PrcdopC;
  document.ofrm.totalCdop.value = dm(eval(TotdopC));
  TotdopD = QtydopD * PrcdopD;
  document.ofrm.totalDdop.value = dm(eval(TotdopD));
  TotdopE = QtydopE * PrcdopE;
  document.ofrm.totalEdop.value = dm(eval(TotdopE));
  Totdop1A = Qtydop1A * Prcdop1A;
  document.ofrm.total1Adop.value = dm(eval(Totdop1A));
  Totdop1B = Qtydop1B * Prcdop1B;
  document.ofrm.total1Bdop.value = dm(eval(Totdop1B));
  Totdop1C = Qtydop1C * Prcdop1C;
  document.ofrm.total1Cdop.value = dm(eval(Totdop1C));
  Totdop1D = Qtydop1D * Prcdop1D;
  document.ofrm.total1Ddop.value = dm(eval(Totdop1D));
  Totdop1E = Qtydop1E * Prcdop1E;
  document.ofrm.total1Edop.value = dm(eval(Totdop1E));
  Totss1 = Qtyss1 * Prcss1;
  document.ofrm.totalss1.value = dm(eval(Totss1));
  Totss2 = Qtyss2 * Prcss2;
  document.ofrm.totalss2.value = dm(eval(Totss2));
  Totss3 = Qtyss3 * Prcss3;
  document.ofrm.totalss3.value = dm(eval(Totss3));
  Totss4 = Qtyss4 * Prcss4;
  document.ofrm.totalss4.value = dm(eval(Totss4));
  Totss5 = Qtyss5 * Prcss5;
  document.ofrm.totalss5.value = dm(eval(Totss5));
  Totss11 = Qtyss11 * Prcss11;
  document.ofrm.totalss11.value = dm(eval(Totss11));
  Totss22 = Qtyss22 * Prcss22;
  document.ofrm.totalss22.value = dm(eval(Totss22));
  Totss33 = Qtyss33 * Prcss33;
  document.ofrm.totalss33.value = dm(eval(Totss33));
  Totss44 = Qtyss44 * Prcss44;
  document.ofrm.totalss44.value = dm(eval(Totss44));
  Totss55 = Qtyss55 * Prcss55;
  document.ofrm.totalss55.value = dm(eval(Totss55));
  Totss111 = Qtyss111 * Prcss111;
  document.ofrm.totalss111.value = dm(eval(Totss111));
  Totss222 = Qtyss222 * Prcss222;
  document.ofrm.totalss222.value = dm(eval(Totss222));
  Totss333 = Qtyss333 * Prcss333;
  document.ofrm.totalss333.value = dm(eval(Totss333));
  Totss444 = Qtyss444 * Prcss444;
  document.ofrm.totalss444.value = dm(eval(Totss444));
  Totss555 = Qtyss555 * Prcss555;
  document.ofrm.totalss555.value = dm(eval(Totss555));
  
  Totamt = 
     eval(TotA) +
     eval(TotB) +
     eval(TotC) +
	 eval(TotD) +
	 eval(TotE) +
	 eval(Tot1A) +
     eval(Tot1B) +
     eval(Tot1C) +
	 eval(Tot1D) +
	 eval(Tot1E) +
	 eval(TotdopA) +
     eval(TotdopB) +
     eval(TotdopC) +
	 eval(TotdopD) +
	 eval(TotdopE) +
	 eval(Totdop1A) +
     eval(Totdop1B) +
     eval(Totdop1C) +
	 eval(Totdop1D) +
	 eval(Totdop1E) +
	 eval(Totss1) +
     eval(Totss2) +
     eval(Totss3) +
	 eval(Totss4) +
	 eval(Totss5) +
	 eval(Totss11) +
     eval(Totss22) +
     eval(Totss33) +
	 eval(Totss44) +
	 eval(Totss55) +
	 eval(Totss111) +
     eval(Totss222) +
     eval(Totss333) +
	 eval(Totss444) +
	 eval(Totss555);

  document.ofrm.GrandTotal.value = Totamt.toLocaleString();

 } 

function validNum(theForm)
{
  calculate();
  return (true);
} 
</script>
<script>
window.onload = function () {
    document.getElementById('bigtotal').onchange();
};
</script>
 
<?php get_footer(); ?>