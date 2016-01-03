<aside id="left-menu" class="col-md-3">

  <?php $val = get_field( "виджеты" ); if( $val == 1 ) { ?>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?>
  <?php }?>
  <?php } elseif( $val == 2 ) { ?>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?>
  <?php }?>
  <?php } elseif( $val == 3 ) { ?>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?>
  <?php }?>
  <?php } elseif( $val == 4 ) { ?>
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 1-3') ) { ?>
  <?php }?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 2-3') ) { ?>
  <?php }?>
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Диллер\установщик 3-3') ) { ?>
  <?php }?>
  <?php } else { ?>
    <?php } ?>

</aside><!-- left-menu -->
