<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="format-detection" content="telephone=no">
<title><?php wp_title(); ?></title>
<link rel="stylesheet" href="/wp-content/themes/octagram/style.css">
<link rel="stylesheet" href="/wp-content/themes/octagram/adaptive.css">
<link href="/wp-content/themes/octagram/css/cakeform.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/wp-content/themes/octagram/img/favicon.png" type="image/png">
<link rel="canonical" href="/wp-content/themes/octagram/js/accounting.min.js" />
<style type="text/css" media="screen">
<?php $oct_key89995 = get_option('oct_key89995'); echo stripslashes($oct_key89995); ?>
<?php $oct_button13 = get_option('oct_button13'); echo stripslashes($oct_button13); ?>
<?php $oct_button12 = get_option('oct_button12'); echo stripslashes($oct_button12); ?>
<?php $oct_button11 = get_option('oct_button11'); echo stripslashes($oct_button11); ?>
<?php $oct_button10 = get_option('oct_button10'); echo stripslashes($oct_button10); ?>
<?php $oct_button9 = get_option('oct_button9'); echo stripslashes($oct_button9); ?>
<?php $oct_button8 = get_option('oct_button8'); echo stripslashes($oct_button8); ?>
<?php $oct_button7 = get_option('oct_button7'); echo stripslashes($oct_button7); ?>
<?php $oct_button6 = get_option('oct_button6'); echo stripslashes($oct_button6); ?>
<?php $oct_button5 = get_option('oct_button5'); echo stripslashes($oct_button5); ?>
<?php $oct_button4 = get_option('oct_button4'); echo stripslashes($oct_button4); ?>
<?php $oct_button3 = get_option('oct_button3'); echo stripslashes($oct_button3); ?>
<?php $oct_button2 = get_option('oct_button2'); echo stripslashes($oct_button2); ?>
<?php $oct_button1 = get_option('oct_button1'); echo stripslashes($oct_button1); ?>
#langu {text-transform: uppercase; float: left; display: block; color: #fff; font-size: 17px; width: 40px; }
#langu a {color: #fff;display:block; margin-top:-4px}
#langu .it, #langu .es {display: none !important}
</style>

<?php wp_head(); ?>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '916591555115085');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=916591555115085&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
</head>
<body >
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NBZRPB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NBZRPB');</script>
<!-- End Google Tag Manager -->
<header>
<div class="content">
<a href="<?php bloginfo('url'); ?>" title="<?php wp_title(); ?>" id="logo"><img src="<?php $oct_key8 = get_option('oct_key8'); echo stripslashes($oct_key8); ?>" width="160" height="40"  alt="<?php wp_title(); ?>"></a>
<nav>
<?php wp_nav_menu(array(
'theme_location' => 'pmenu'
));
?> 
</nav>
<a style="width: 85px;height: 40px;cursor: pointer;float: left;color:#fff" onclick="getElementById('searchformed').style.display = 'block'"><img src="/wp-content/themes/octagram/img/search.png" style="padding-top: 12px;vertical-align: bottom;padding-right: 6px;" width="20" height="30" border="0" alt="">Поиск</a>
<div id="searchformed">

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input type="text" name="s" id="se" size="35"  onblur="if (this.value == 'Введите поисковый запрос...') {this.value = 'Введите поисковый запрос...';}" onfocus="if (this.value == 'Введите поисковый запрос...') {this.value = '';}" value="Введите поисковый запрос..." class="text" />
<input type="submit" id="searchsubmit" class="submit" value="<?php _e('', 'buffet') ?>" />
</form>

</div>
<div id="langu" style="width: 65px;margin-top: 23px;margin-left: -19px;">

<div id="lang_sel" style="">
<ul>
<li style="    width: 70px;">
<a href="<?php
$Path=$_SERVER['REQUEST_URI'];
$URI='http://test.octagram.ru'.$Path; echo $URI; ?>" class="lang_sel_sel icl-ru" style="color: #fff; border-color: rgba(255, 255, 255, 0); background-color: rgba(255, 255, 255, 0)">
<img style="" class="iclflag" src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/ru.png" alt="ru" title="">
&nbsp;<span class="icl_lang_sel_current icl_lang_sel_native" style="color: #fff">RU</span></a>

<ul style="border-color: rgb(205, 205, 205, 0);border-top: 0px solid">
<li class="icl-en" style="background: #00468C;width: 70px;">
<a href="<?php
$Path=$_SERVER['REQUEST_URI'];
$URI='http://en.octagram.ru'.$Path; echo $URI; ?>" style="color: #fff; border-color: rgba(255, 255, 255, 0); background-color:rgba(255, 255, 255, 0)">
<img style="" class="iclflag" src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png" alt="en" title="English">
&nbsp;<span class="icl_lang_sel_native" style="color: #fff;">EN</span></a></li> <br>
<li class="icl-es" style="background: #00468C;width: 70px;margin-top: -1px !important;">
<a href="<?php
$Path=$_SERVER['REQUEST_URI'];
$URI='http://es.octagram.ru'.$Path; echo $URI; ?>" style="color: #fff; border-color: rgba(255, 255, 255, 0); background-color:rgba(255, 255, 255, 0)">
<img style="" class="iclflag" src="/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="en" title="English">
&nbsp;<span class="icl_lang_sel_native" style="color: #fff;">ES</span></a></li></ul></li></ul></div>
							</div>
<div id="phone-block" style="float: left;width: 170px;">
<span id="phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></span>
<span id="mode"><span style="color: #fff"><?php _e('work hours', 'octa'); ?></span> <?php $oct_key7 = get_option('oct_key7'); echo stripslashes($oct_key7); ?></span>
</div>

<div class="clear"></div></div></header>
<div id="sub-menu">
<?php include(TEMPLATEPATH.'/page-home-submenu.php'); ?>
</div>
<div id="page"><div id="up-buffer"></div>