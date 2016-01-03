  <div class="row order-aftercontent">
    <a href="#" title="<?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?>" class="btn btn-blue btn-order">
      <i class="fa fa-cart-plus"></i>
      <?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?>
    </a>

    <a href="tel:+<?php $oct_key6 = get_option('oct_key6'); echo preg_replace('/\D/', '', $oct_key6); ?>" class="phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></a>
  </div><!-- /.row order-aftercontent -->
