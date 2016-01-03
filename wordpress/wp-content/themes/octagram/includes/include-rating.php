<span class="ovr-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
  <?php $value = get_field( "rating" );
    if( $value == 1 ) { ?>
      <meta itemprop="worstRating" content = "1">
      <span itemprop="ratingValue"><i class="fa fa-star"></i></span><span class="hidden">1/</span><span itemprop="bestRating" class="hidden">5</span>
    <?php } elseif( $value == 2 ) { ?>
      <meta itemprop="worstRating" content = "2">
      <span itemprop="ratingValue"><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span class="hidden">2/</span><span itemprop="bestRating" class="hidden">5</span>
    <?php } elseif( $value == 3 ) { ?>
      <meta itemprop="worstRating" content = "3">
      <span itemprop="ratingValue"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span class="hidden">3/</span><span itemprop="bestRating" class="hidden">5</span>
    <?php } elseif( $value == 4 ) { ?>
      <meta itemprop="worstRating" content = "4">
      <span itemprop="ratingValue"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span class="hidden">4/</span><span itemprop="bestRating" class="hidden">5</span>
    <?php } elseif( $value == 5 ) { ?>
      <meta itemprop="worstRating" content = "5">
      <span itemprop="ratingValue"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span><span class="hidden">5/</span><span itemprop="bestRating" class="hidden">5</span>
    <?php } else {
    }
  ?>
</span><!-- ovr-rating -->




