<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">

  <title><?php wp_title(); ?></title>

  <link href="<?php echo get_template_directory_uri(); ?>/favicon.png" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
  <![endif]-->

  <?php wp_head(); ?>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch">

</head>
<body>
<div class="wrapper">
  <header>
    <div class="inner">
      <div id="logo">
        <?php if ( is_front_page() && is_home() ){ } else { ?>
          <a href="<?php echo home_url(); ?>">
            <?php  } ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
            <?php if ( is_front_page() && is_home() ){
            } else { ?>
          </a>
        <?php } ?>
      </div><!-- /logo -->

      <nav class="nav" role="navigation">
        <?php wp_nav_menu(array( 'theme_location' => 'pmenu' )); ?>
      </nav><!-- nav -->

      <button class="open-search">
        <i class="fa fa-search"></i>Поиск
      </button>

      <div id="searchformed">
        <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
          <input type="text" name="s" placeholder="Введите поисковый запрос..." class="text" />
          <button><i class="fa fa-search"></i></button>
          <span class="close-search"><i class="fa fa-times"></i></span>
        </form>
      </div><!-- #searchformed -->

      <ul class="language-select">
        <li class="lang-ru">
          <a title="Русский" href="<?php $Path=$_SERVER['REQUEST_URI']; $URI='http://test.octagram.ru'.$Path; echo $URI; ?>"></a>
        </li>
        <li title="English" class="lang-en">
          <a href="<?php $Path=$_SERVER['REQUEST_URI']; $URI='http://en.octagram.ru'.$Path; echo $URI; ?>"></a>
        </li>
        <li title="Español" class="lang-es">
          <a href="<?php $Path=$_SERVER['REQUEST_URI']; $URI='http://es.octagram.ru'.$Path; echo $URI; ?>"></a>
        </li>
      </ul><!-- /.language-select -->

      <div class="phone-block">
        <a href="tel:+74955803026">+7 (495) 580-30-26</a>
        <?php _e('work hours', 'octa'); ?> <span>9:00 - 18:00</span>
      </div><!-- phone-block -->
    </div><!-- phone-block -->
    <!-- /.inner -->
  </header>

  <section role="main">
    <div class="inner">
