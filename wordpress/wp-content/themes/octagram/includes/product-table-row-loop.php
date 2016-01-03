<tr>
  <td>
    <a href="<?php the_permalink();?>"><img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" /></a>
  </td>
  <td>
    <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
    <p><?php the_field('shortinfo'); ?></p>
  </td>
  <td>
    #<?php the_field('mod'); ?>
  </td>
  <td>
    <?php if ($dollar != "") { $A=get_field('price'); $C=$A*$dollar; echo number_format($C,0, '', ' ').' руб'; } else { echo 'нет данных'; } ?>
  </td>
  <td>
    <a href="<?php the_permalink();?>" title="<?php _e('Order', 'octa'); ?>" class="btn btn-blue"><i class="fa fa-shopping-cart"></i><?php _e('Order', 'octa'); ?></a>
    <a href="#" title="<?php $oct_k5 = get_option('oct_k5'); echo stripslashes($oct_k5); ?>" class="btn btn-gray btn-two-blocks btn-question">
      <i class="fa fa-phone-square"></i>
      <?php $oct_k5 = get_option('oct_k5'); echo stripslashes($oct_k5); ?>
    </a>
  </td>
  <td>
    <?php  $proddoc = get_field('proddoc'); if( $proddoc ): foreach( $proddoc as $prod ): ?>
      <a href="<?php the_field('link', $prod->ID); ?>" class="btn btn-gray" title="<?php _e('Download documentation', 'octa'); ?>"><i class="fa fa-file-pdf-o"></i><?php _e('Download documentation', 'octa'); ?></a>
    <?php endforeach; endif; ?>
  </td>
</tr>
