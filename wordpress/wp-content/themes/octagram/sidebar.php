<aside id="left-menu" class="col-md-3">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?><?php }?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?><?php }?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?>

  <div id="headermenu" class="click-nav">
    <?php
      $walker = new mainMenuWalker ();
      wp_nav_menu ( array ('menu' => 'Страницы', 'walker' => $walker ) );
    ?>
  </div>

 <?php }?>

</aside><!-- left-menu -->
