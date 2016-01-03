<?php get_header(); ?>
<?php include(TEMPLATEPATH.'/includes/includes-cbrrates.php'); ?>
<?php get_template_part('breadcrumbs-bcn'); ?>

  <div class="block-triple block-triple-solution row">

    <div class="col-md-4 left-block">
      <h2 class="block-triple-heading"><?php the_title(); ?></h2>
      <img src="<?php the_field('images'); ?>" alt="<?php the_title(); ?>"/>
      <p><?php the_field('shortinfo'); ?></p>

      <div class="nearby-diler">
        <span><?php $oct_k9 = get_option('oct_k9'); echo stripslashes($oct_k9); ?></span>
        <select name="diler-name-list" id="diler-name-list" class="diler-name-list">
          <option value="diler-list-none">Выберите свой город</option>
        </select>
        <ul class="all-diler-list"></ul><!-- /.all-diler-list -->
      </div><!-- /.nearby-diler -->
    </div><!-- left-block -->


    <div class="col-md-4 middle-block">
      <h1><?php the_title(); ?></h1>

      <?php $oct_usekalkforsolution = get_option('oct_usekalkforsolution'); if( $oct_usekalkforsolution ) {  ?>
        <form method="POST" name="ofrm" id="form4">

          <label for="bigtotal" class="bigtotal">
            <input type="text" readonly name="GrandTotal" id="bigtotal"> руб
          </label>

          <a href="#" title="<?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?>" class="btn btn-blue btn-order">
            <i class="fa fa-cart-plus"></i>
            <?php $oct_k1 = get_option('oct_k1'); echo stripslashes($oct_k1); ?>
          </a>

          <h5 class="block-triple-heading"><?php $oct_key1010 = get_option('oct_key1010'); echo stripslashes($oct_key1010); ?></h5>
          <h6 class="block-triple-subheading"><?php _e('As ready solutions INCLUDED', 'octa'); ?></h6>

          <table id="table1">

            <?php if( get_field('pr1') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name1'); ?>
                  <span>(<?php $pr1=get_post_meta($post->ID, "pr1", true); $Cpr1=$pr1*$dollar; echo number_format($Cpr1,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol1'); ?>" max="999" name="qtyA" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalA" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtyA" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalA" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr2') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name2'); ?>
                  <span>(<?php  $pr2=get_post_meta($post->ID, "pr2", true); $Cpr2=$pr2*$dollar;echo number_format($Cpr2,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol2new'); ?>" max="999" name="qtyB" value="<?php the_field('kol2new'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalB" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtyB" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalB" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr3') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name3'); ?>
                  <span>(<?php  $pr3=get_post_meta($post->ID, "pr3", true); $Cpr3=$pr3*$dollar;echo number_format($Cpr3,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol3'); ?>" max="999" name="qtyC" value="<?php the_field('kol3'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalC" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtyC" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="totalC" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr4') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name4'); ?>
                  <span>(<?php  $pr4=get_post_meta($post->ID, "pr4", true); $Cpr4=$pr4*$dollar; echo number_format($Cpr4,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol4'); ?>" max="999" name="qtyD" value="<?php the_field('kol4'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalD" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtyD" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="totalD" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr5') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name5'); ?>
                  <span>(<?php  $pr5=get_post_meta($post->ID, "pr5", true); $Cpr5=$pr5*$dollar; echo number_format($Cpr5,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol5'); ?>" max="999" readonly name="qtyE" value="<?php the_field('kol5'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalE" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtyE" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="totalE" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr6') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name6'); ?>
                  <span>(<?php  $pr6=get_post_meta($post->ID, "pr6", true); $Cpr6=$pr6*$dollar; echo number_format($Cpr6,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol6'); ?>" max="999" name="qty1A" value="<?php the_field('kol6'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="total1A" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qty1A" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="total1A" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr7') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name7'); ?>
                  <span>(<?php  $pr7=get_post_meta($post->ID, "pr7", true); $Cpr7=$pr7*$dollar; echo number_format($Cpr7,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol7'); ?>" max="999" name="qty1B" value="<?php the_field('kol7'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="total1B" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qty1B" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="total1B" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr8') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name8'); ?>
                  <span>(<?php  $pr8=get_post_meta($post->ID, "pr8", true); $Cpr8=$pr8*$dollar; echo number_format($Cpr8,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" min="<?php the_field('kol8'); ?>" max="999" name="qty1C" value="<?php the_field('kol8'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="total1C" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qty1C" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="total1C" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr9') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name9'); ?>
                  <span>(<?php  $pr9=get_post_meta($post->ID, "pr9", true); $Cpr9=$pr9*$dollar; echo number_format($Cpr9,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" readonly min="<?php the_field('kol9'); ?>" max="999" name="qty1D" value="<?php the_field('kol9'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="total1D" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qty1D" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="total1D" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

            <?php if( get_field('pr10') ): ?>
              <tr>
                <td>
                  <i class="psevdoradio fa fa-check-square"></i>
                  <?php the_field('name10'); ?>
                  <span>(<?php  $pr10=get_post_meta($post->ID, "pr10", true); $Cpr10=$pr10*$dollar; echo number_format($Cpr10,0, '', ' ') ?> руб)</span>
                </td>
                <td>
                  <input type="number" readonly min="<?php the_field('kol10'); ?>" max="999" name="qty1E" value="<?php the_field('kol10'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="total1E" onchange="calculate()">
                </td>
              </tr>
            <?php else: ?>
              <tr class="testlemenet">
                <td>
                  <input type="hidden" min="0" max="999" name="qty1E" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
                  <input type="hidden" name="total1E" onchange="calculate()">
                </td>
              </tr>
            <?php endif; ?>

          </table>


    </div><!-- middle-block -->

    <div class="col-md-4 right-block">

        <h4 class="block-triple-heading"><?php _e('Price for one', 'octa'); ?></h4>
        <h5 class="block-triple-subheading"><?php _e('Additional options', 'octa'); ?></h5>

        <table id="table2">

          <?php if(get_field('sel1') == "1") { ?>
            <tr>
              <td>

              <select name="select" id="select" class="select">
                <?php if( get_field('sspr1') ): ?>
                  <option value="<?php the_field('sspr1'); ?>" class="s1"><?php the_field('ssna1'); ?></option>
                <?php endif; ?>
                <?php if( get_field('sspr2') ): ?>
                  <option value="<?php the_field('sspr2'); ?>" class="s2"><?php the_field('ssna2'); ?></option>
                <?php endif; ?>
                <?php if( get_field('sspr3') ): ?>
                  <option value="<?php the_field('sspr3'); ?>" class="s3"><?php the_field('ssna3'); ?></option>
                <?php endif; ?>
                <?php if( get_field('sspr4') ): ?>
                  <option value="<?php the_field('sspr4'); ?>" class="s4"><?php the_field('ssna4'); ?></option>
                <?php endif; ?>
                <?php if( get_field('sspr5') ): ?>
                  <option value="<?php the_field('sspr5'); ?>" class="s5"><?php the_field('ssna5'); ?></option>
                <?php endif; ?>
                </select>

                <?php if( get_field('sspr1') ): ?>
                  <div class="ss1">
                    <div class="ssin">
                      <?php the_field('ssna1'); ?>
                      <span>(<?php  $sspr1=get_post_meta($post->ID, "sspr1", true); $Csspr1=$sspr1*$dollar; echo number_format($Csspr1,0, '', ' ') ?> руб)</span>
                    </div><!-- ssin -->

                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss1" value="<?php the_field('sskol1'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss1" onchange="calculate()">
                    </div><!-- ssk -->
                  </div><!-- ss1 -->
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss1" value="<?php the_field('sskol1'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss1" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr2') ): ?>
                  <div class="ss2">
                    <div class="ssin">
                      <?php the_field('ssna2'); ?>
                      <span>(<?php  $sspr2=get_post_meta($post->ID, "sspr2", true); $Csspr2=$sspr2*$dollar; echo number_format($Csspr2,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss2" value="<?php the_field('sskol2'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss2" onchange="calculate()">
                    </div>
                  </div><!-- ss2 -->
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss2" value="<?php the_field('sskol2'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss2" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr3') ): ?>
                  <div class="ss3">
                    <div class="ssin">
                    <?php the_field('ssna3'); ?>
                      <span>(<?php  $sspr3=get_post_meta($post->ID, "sspr3", true); $Csspr3=$sspr3*$dollar; echo number_format($Csspr3,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss3" value="<?php the_field('sskol3'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss3" onchange="calculate()">
                    </div>
                  </div><!-- sspr3 -->
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss3" value="<?php the_field('sskol3'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss3" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr4') ): ?>
                  <div class="ss4">
                    <div class="ssin">
                      <?php the_field('ssna4'); ?>
                      <span>(<?php  $sspr4=get_post_meta($post->ID, "sspr4", true); $Csspr4=$sspr4*$dollar; echo number_format($Csspr4,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss4" value="<?php the_field('sskol4'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss4" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss4" value="<?php the_field('sskol4'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss4" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr5') ): ?>
                  <div class="ss5">
                    <div class="ssin">
                      <?php the_field('ssna5'); ?>
                      <span>(<?php  $sspr5=get_post_meta($post->ID, "sspr5", true); $Csspr5=$sspr5*$dollar; echo number_format($Csspr5,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss5" value="<?php the_field('sskol5'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss5" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss5" value="<?php the_field('sskol5'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss5" onchange="calculate()">
                  </div>
                <?php endif; ?>

              </td>
            </tr>

          <?php } else { ?>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss1" value="<?php the_field('sskol1'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss1" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss2" value="<?php the_field('sskol2'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss2" onchange="calculate()"></div>
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss3" value="<?php the_field('sskol3'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss3" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss4" value="<?php the_field('sskol4'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss4" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss5" value="<?php the_field('sskol5'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss5" onchange="calculate()">
            </div>


          <?php } ?>

          <?php if(get_field('sel2') == "1") { ?>
            <tr>
              <td>

                <select name="select2" id="select2">
                  <?php if( get_field('sspr11') ): ?>
                    <option value="<?php the_field('sspr11'); ?>" class="s11"><?php the_field('ssna11'); ?></option>
                  <?php endif; ?>

                  <?php if( get_field('sspr22') ): ?>
                    <option value="<?php the_field('sspr22'); ?>" class="s22"><?php the_field('ssna22'); ?></option>
                  <?php endif; ?>

                  <?php if( get_field('sspr33') ): ?>
                    <option value="<?php the_field('sspr33'); ?>" class="s33"><?php the_field('ssna33'); ?></option>
                  <?php endif; ?>

                  <?php if( get_field('sspr44') ): ?>
                    <option value="<?php the_field('sspr44'); ?>" class="s44"><?php the_field('ssna44'); ?></option>
                  <?php endif; ?>

                  <?php if( get_field('sspr55') ): ?>
                    <option value="<?php the_field('sspr55'); ?>" class="s55"><?php the_field('ssna55'); ?></option>
                  <?php endif; ?>
                </select>

                <?php if( get_field('sspr11') ): ?>
                  <div class="ss11">
                    <div class="ssin">
                      <?php the_field('ssna11'); ?>
                      <span>(<?php  $sspr11=get_post_meta($post->ID, "sspr11", true); $Csspr11=$sspr11*$dollar; echo number_format($Csspr11,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss11" value="<?php the_field('sskol11'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss11" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss11" value="<?php the_field('sskol11'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss11" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr22') ): ?>
                  <div class="ss22">
                    <div class="ssin">
                      <?php the_field('ssna22'); ?>
                      <span>(<?php  $sspr22=get_post_meta($post->ID, "sspr22", true); $Csspr22=$sspr22*$dollar;  echo number_format($Cssp22,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss22" value="<?php the_field('sskol22'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss22" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss22" value="<?php the_field('sskol22'); ?>" onchange="return validNum(document.ofrm)">
                    <input type="hidden" name="totalss22" onchange="calculate()"></div>
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr33') ): ?>
                  <div class="ss33">
                    <div class="ssin">
                      <?php the_field('ssna33'); ?>
                      <span>(<?php  $sspr33=get_post_meta($post->ID, "sspr33", true); $Csspr33=$sspr33*$dollar;  echo number_format($Csspr33,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss33" value="<?php the_field('sskol33'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss33" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss33" value="<?php the_field('sskol33'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss33" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr44') ): ?>
                  <div class="ss44">
                    <div class="ssin">
                      <?php the_field('ssna44'); ?>
                      <span>(<?php  $sspr44=get_post_meta($post->ID, "sspr44", true); $Csspr44=$sspr44*$dollar;  echo number_format($Csspr44,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss44" value="<?php the_field('sskol44'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss44" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss44" value="<?php the_field('sskol44'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss44" onchange="calculate()"></div>
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr55') ): ?>
                  <div class="ss55">
                    <div class="ssin">
                      <?php the_field('ssna55'); ?>
                      <span>(<?php  $sspr55=get_post_meta($post->ID, "sspr55", true); $Csspr55=$sspr55*$dollar;  echo number_format($Csspr55,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss55" value="<?php the_field('sskol55'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss55" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss55" value="<?php the_field('sskol55'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss55" onchange="calculate()">
                  </div>
                <?php endif; ?>

              </td>
            </tr>

          <?php } else { ?>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss11" value="<?php the_field('sskol11'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss11" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss22" value="<?php the_field('sskol22'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss22" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss33" value="<?php the_field('sskol33'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss33" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss44" value="<?php the_field('sskol44'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss44" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss55" value="<?php the_field('sskol55'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss55" onchange="calculate()">
            </div>

          <?php } ?>

          <?php if(get_field('sel3') == "1") { ?>

            <tr>
              <td>

                <select name="select3" id="select3" class="select3">
                  <?php if( get_field('sspr111') ): ?>
                    <option value="<?php the_field('sspr111'); ?>" class="s111"><?php the_field('ssna111'); ?></option>
                  <?php endif; ?>
                  <?php if( get_field('sspr222') ): ?>
                    <option value="<?php the_field('sspr222'); ?>" class="s222"><?php the_field('ssna222'); ?></option>
                  <?php endif; ?>
                  <?php if( get_field('sspr333') ): ?>
                    <option value="<?php the_field('sspr333'); ?>" class="s333"><?php the_field('ssna333'); ?></option>
                  <?php endif; ?>
                  <?php if( get_field('sspr444') ): ?>
                    <option value="<?php the_field('sspr444'); ?>" class="s444"><?php the_field('ssna444'); ?></option>
                  <?php endif; ?>
                  <?php if( get_field('sspr555') ): ?>
                    <option value="<?php the_field('sspr555'); ?>" class="s555"><?php the_field('ssna555'); ?></option>
                  <?php endif; ?>
                </select>

                <?php if( get_field('sspr111') ): ?>
                  <div class="ss111">
                    <div class="ssin"><?php the_field('ssna111'); ?>
                      <span>(<?php  $sspr111=get_post_meta($post->ID, "sspr111", true); $Csspr111=$sspr111*$dollar;  echo number_format($Csspr111,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss111" value="<?php the_field('sskol111'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss111" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss111" value="<?php the_field('sskol111'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss111" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr222') ): ?>
                  <div class="ss222">
                    <div class="ssin">
                      <?php the_field('ssna222'); ?>
                      <span>(<?php  $sspr222=get_post_meta($post->ID, "sspr222", true); $Csspr222=$sspr222*$dollar; echo number_format($Csspr222,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss222" value="<?php the_field('sskol222'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss222" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss222" value="<?php the_field('sskol222'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss222" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr333') ): ?>
                  <div class="ss333">
                    <div class="ssin">
                      <?php the_field('ssna333'); ?>
                      <span>(<?php  $sspr333=get_post_meta($post->ID, "sspr333", true); $Csspr333=$sspr333*$dollar; echo number_format($Csspr333,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss333" value="<?php the_field('sskol333'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss333" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss333" value="<?php the_field('sskol333'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss333" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr444') ): ?>
                  <div class="ss444">
                    <div class="ssin">
                      <?php the_field('ssna444'); ?>
                      <span>(<?php  $sspr444=get_post_meta($post->ID, "sspr444", true); $Csspr444=$sspr444*$dollar; echo number_format($Csspr444,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss444" value="<?php the_field('sskol444'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss444" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss444" value="<?php the_field('sskol444'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss444" onchange="calculate()">
                  </div>
                <?php endif; ?>

                <?php if( get_field('sspr555') ): ?>
                  <div class="ss555">
                    <div class="ssin">
                      <?php the_field('ssna555'); ?>
                      <input type="hidden" name="ssna555" value="<?php the_field('ssna555'); ?>">
                      <span>(<?php  $sspr555=get_post_meta($post->ID, "sspr555", true); $Csspr555=$sspr555*$dollar; echo number_format($Csspr555,0, '', ' ') ?> руб)</span>
                    </div>
                    <div class="ssk">
                      <input type="number" min="0" max="999" name="qtyss555" value="<?php the_field('sskol555'); ?>" onchange="return validNum(document.ofrm)">
                      <button class="quont-plus">+</button><button class="quont-minus">-</button>
                      <input type="hidden" name="totalss555" onchange="calculate()">
                    </div>
                  </div>
                <?php else: ?>
                  <div class="ssk" STYLE="display:none;">
                    <input type="number" min="0" max="999" name="qtyss555" value="<?php the_field('sskol555'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss555" onchange="calculate()">
                  </div>
                <?php endif; ?>

              </td>
            </tr>

          <?php } else { ?>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss111" value="<?php the_field('sskol111'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss111" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss222" value="<?php the_field('sskol222'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss222" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss333" value="<?php the_field('sskol333'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss333" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss444" value="<?php the_field('sskol444'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss444" onchange="calculate()">
            </div>

            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss555" value="<?php the_field('sskol555'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss555" onchange="calculate()">
            </div>

          <?php } ?>

          <?php if( get_field('pr1d') ): ?>
            <tr>
              <td>
                <?php the_field('name1d'); ?>
                <span>(<?php  $pr1d=get_post_meta($post->ID, "pr1d", true); $Cpr1d=$pr1d*$dollar;echo number_format($Cpr1d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopA" value="<?php the_field('kol1d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalAdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopA" value="<?php the_field('kol1d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalAdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr2d') ): ?>
            <tr>
              <td>
                <?php the_field('name2d'); ?>
                <span>(<?php  $pr2d=get_post_meta($post->ID, "pr2d", true); $Cpr2d=$pr2d*$dollar; echo number_format($Cpr2d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopB" value="<?php the_field('kol2d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalBdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopB" value="<?php the_field('kol2d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalBdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr3d') ): ?>
            <tr>
              <td>
                <?php the_field('name3d'); ?>
                <span>(<?php  $pr3d=get_post_meta($post->ID, "pr3d", true); $Cpr3d=$pr3d*$dollar; echo number_format($Cpr3d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopC" value="<?php the_field('kol3d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalCdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopC" value="<?php the_field('kol3d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalCdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr4d') ): ?>
            <tr>
              <td>
                <?php the_field('name4d'); ?>
                <span>(<?php  $pr4d=get_post_meta($post->ID, "pr4d", true); $Cpr4d=$pr4d*$dollar; echo number_format($Cpr4d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopD" value="<?php the_field('kol4d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalDdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtydopD" value="<?php the_field('kol4d'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalDdop" onchange="calculate()">
                </td>
              </tr>
          <?php endif; ?>

          <?php if (get_field('pr5d')): ?>
            <tr>
              <td>
                <?php the_field('name5d'); ?>
                <span>(<?php $pr5d = get_post_meta($post->ID, "pr5d", true); $Cpr5d = $pr5d * $dollar; echo number_format($Cpr5d, 0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopE" value="<?php the_field('kol5d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalEdop" onchange="calculate()">
              </td>
            </tr>
            <?php else: ?>
              <tr>
                <td>
                  <input type="hidden" min="0" max="999" name="qtydopE" value="<?php the_field('kol5d'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalEdop" onchange="calculate()">
                </td>
              </tr>
          <?php endif; ?>

          <?php if( get_field('pr6d') ): ?>
            <tr>
              <td>
                <?php the_field('name6d'); ?>
                <span>(<?php  $pr6d=get_post_meta($post->ID, "pr6d", true); $Cpr6d=$pr6d*$dollar; echo number_format($Cpr6d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1A" value="<?php the_field('kol6d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Adop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1A" value="<?php the_field('kol6d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Adop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr7d') ): ?>
            <tr>
              <td>
                <?php the_field('name7d'); ?>
                <span>(<?php  $pr7d=get_post_meta($post->ID, "pr7d", true); $Cpr7d=$pr7d*$dollar; echo number_format($Cpr7d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1B" value="<?php the_field('kol7d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Bdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1B" value="<?php the_field('kol7d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Bdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr8d') ): ?>
            <tr>
              <td>
                <?php the_field('name8d'); ?>
                <span>(<?php  $pr8d=get_post_meta($post->ID, "pr8d", true); $Cpr8d=$pr8d*$dollar; echo number_format($Cpr8d,0, '', ' ') ?> руб)</span>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1C" value="<?php the_field('kol8d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Cdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtydop1C" value="<?php the_field('kol8d'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1Cdop" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr9d') ): ?>
          <tr>
            <td>
              <?php the_field('name9d'); ?>
              <span>(<?php  $pr9d=get_post_meta($post->ID, "pr9d", true); $Cpr9d=$pr9d*$dollar;echo number_format($Cpr9d,0, '', ' ') ?> руб)</span>
            </td>
            <td>
              <input type="number" min="0" max="999" name="qtydop1D" value="<?php the_field('kol9d'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1Ddop" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtydop1D" value="<?php the_field('kol9d'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1Ddop" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr10d') ): ?>
          <tr>
            <td>
              <?php the_field('name10d'); ?>
              <span>(<?php  $pr10d=get_post_meta($post->ID, "pr10d", true); $Cpr10d=$pr10d*$dollar; echo number_format($Cpr10d,0, '', ' ') ?> руб)</span>
            </td>
            <td>
              <input type="number" min="0" max="999" name="qtydop1E" value="<?php the_field('kol10d'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1Edop" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtydop1E" value="<?php the_field('kol10d'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1Edop" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

      </table>
    </form>

  <?php  } else { ?>

    <form method="POST" name="ofrm" id="form4">

      <input type="hidden" name="title" value="<?php the_title(); ?>">

      <table id="table1">

        <tr>
          <td>
            <input type="text" name="GrandTotal" id="bigtotal" onchange="calculate()">
          </td>
        </tr>
        <tr>
          <td>
            <a href="#" title="<?php $oct_k7 = get_option('oct_k1'); echo stripslashes($oct_k1); ?>" class="btn btn-blue btn-order">
              <i class="fa fa-cart-plus"></i>
              <?php $oct_k7 = get_option('oct_k1'); echo stripslashes($oct_k1); ?>
            </a>
            <h2><?php _e('As ready solutions INCLUDED', 'octa'); ?></h2>
          </td>
        </tr>

        <?php if( get_field('pr1') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name1'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol1'); ?>" max="999" name="qtyA" readonly  value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalA" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtyA" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="totalA" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr2') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name2'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol2new'); ?>" max="999" name="qtyB" value="<?php the_field('kol2new'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalB" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtyB" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="totalB" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr3') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name3'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol3'); ?>" max="999" name="qtyC" value="<?php the_field('kol3'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalC" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtyC" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="totalC" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr4') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name4'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol4'); ?>" max="999" name="qtyD" value="<?php the_field('kol4'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalD" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtyD" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="totalD" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr5') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name5'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol5'); ?>" max="999" readonly name="qtyE" value="<?php the_field('kol5'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalE" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qtyE" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="totalE" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr6') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name6'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol6'); ?>" max="999" name="qty1A" value="<?php the_field('kol6'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1A" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qty1A" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="total1A" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr7') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name7'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol7'); ?>" max="999" name="qty1B" value="<?php the_field('kol7'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1B" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qty1B" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="total1B" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr8') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name8'); ?>
            </td>
            <td>
              <input type="number" min="<?php the_field('kol8'); ?>" max="999" name="qty1C" value="<?php the_field('kol8'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1C" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qty1C" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="total1C" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

        <?php if( get_field('pr9') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name9'); ?>
            </td>
            <td>
              <input type="number" readonly min="<?php the_field('kol9'); ?>" max="999" name="qty1D" value="<?php the_field('kol9'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1D" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qty1D" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="total1D" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>


        <?php if( get_field('pr10') ): ?>
          <tr>
            <td>
              <i class="psevdoradio fa fa-check-square"></i>
              <?php the_field('name10'); ?>
            </td>
            <td>
              <input type="number" readonly min="<?php the_field('kol10'); ?>" max="999" name="qty1E" value="<?php the_field('kol10'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="total1E" onchange="calculate()">
            </td>
          </tr>
        <?php else: ?>
          <tr>
            <td>
              <input type="hidden" min="0" max="999" name="qty1E" value="<?php the_field('kol1'); ?>" onchange="return validNum(document.ofrm)">
              <input type="hidden" name="total1E" onchange="calculate()">
            </td>
          </tr>
        <?php endif; ?>

      </table>
    </div><!-- middle-block -->


    <div class="col-md-4 right-block">

      <h4 class="block-triple-heading"><?php _e('Price for one', 'octa'); ?></h4>
      <h5 class="block-triple-subheading">Additional options</h5>

      <table id="table2">

      <?php if(get_field('sel1') == "1") { ?>
        <tr>
          <td>

          <select name="select" id="select" class="select">
            <?php if( get_field('sspr1') ): ?>
              <option value="<?php the_field('sspr1'); ?>" class="s1"><?php the_field('ssna1'); ?></option>
            <?php endif; ?>
            <?php if( get_field('sspr2') ): ?>
              <option value="<?php the_field('sspr2'); ?>" class="s2"><?php the_field('ssna2'); ?></option>
            <?php endif; ?>
            <?php if( get_field('sspr3') ): ?>
              <option value="<?php the_field('sspr3'); ?>" class="s3"><?php the_field('ssna3'); ?></option>
            <?php endif; ?>
            <?php if( get_field('sspr4') ): ?>
              <option value="<?php the_field('sspr4'); ?>" class="s4"><?php the_field('ssna4'); ?></option>
            <?php endif; ?>
            <?php if( get_field('sspr5') ): ?>
              <option value="<?php the_field('sspr5'); ?>" class="s5"><?php the_field('ssna5'); ?></option>
            <?php endif; ?>
          </select>

          <?php if( get_field('sspr1') ): ?>
            <div class="ss1">
              <div class="ssin">
                <?php the_field('ssna1'); ?>
                <input type="hidden" name="ssna1" value="<?php the_field('ssna1'); ?>">
              </div>
              <div class="ssk">
                <input type="number" min="0" max="999" name="qtyss1" value="<?php the_field('sskol1'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss1" onchange="calculate()">
              </div>
            </div>
          <?php else: ?>
            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss1" value="<?php the_field('sskol1'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss1" onchange="calculate()">
            </div>
          <?php endif; ?>

          <?php if( get_field('sspr2') ): ?>
            <div class="ss2">
              <div class="ssin">
                <?php the_field('ssna2'); ?>
                <input type="hidden" name="ssna2" value="<?php the_field('ssna2'); ?>">
              </div>
              <div class="ssk">
                <input type="number" min="0" max="999" name="qtyss2" value="<?php the_field('sskol2'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss2" onchange="calculate()">
              </div>
            </div>
          <?php else: ?>
            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss2" value="<?php the_field('sskol2'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss2" onchange="calculate()">
            </div>
          <?php endif; ?>

          <?php if( get_field('sspr3') ): ?>
            <div class="ss3">
              <div class="ssin">
                <?php the_field('ssna3'); ?>
                <input type="hidden" name="ssna3" value="<?php the_field('ssna3'); ?>">
              </div><!-- ssin -->
              <div class="ssk">
                <input type="number" min="0" max="999" name="qtyss3" value="<?php the_field('sskol3'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss3" onchange="calculate()">
              </div><!-- ssk -->
            </div><!-- ss3 -->
          <?php else: ?>
            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss3" value="<?php the_field('sskol3'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss3" onchange="calculate()">
            </div>
          <?php endif; ?>

          <?php if( get_field('sspr4') ): ?>
            <div class="ss4">
              <div class="ssin">
                <?php the_field('ssna4'); ?>
                <input type="hidden" name="ssna4" value="<?php the_field('ssna4'); ?>">
              </div><!-- ssin -->
              <div class="ssk">
                <input type="number" min="0" max="999" name="qtyss4" value="<?php the_field('sskol4'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss4" onchange="calculate()">
              </div><!-- ssk -->
            </div><!-- ss4 -->
          <?php else: ?>
            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss4" value="<?php the_field('sskol4'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss4" onchange="calculate()">
            </div><!-- ssk -->
          <?php endif; ?>

          <?php if( get_field('sspr5') ): ?>
            <div class="ss5">
              <div class="ssin">
                <?php the_field('ssna5'); ?>
              </div><!-- ssin -->
              <div class="ssk">
                <input type="number" min="0" max="999" name="qtyss5" value="<?php the_field('sskol5'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss5" onchange="calculate()">
              </div><!-- ssk -->
            </div><!-- ss5 -->
          <?php else: ?>
            <div class="ssk" STYLE="display:none;">
              <input type="number" min="0" max="999" name="qtyss5" value="<?php the_field('sskol5'); ?>" onchange="return validNum(document.ofrm)">
              <button class="quont-plus">+</button><button class="quont-minus">-</button>
              <input type="hidden" name="totalss5" onchange="calculate()">
            </div><!-- ssk -->
          <?php endif; ?>
        </tr>

      <?php } else { ?>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss1" value="<?php the_field('sskol1'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss1" onchange="calculate()">
        </div><!-- ssk -->

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss2" value="<?php the_field('sskol2'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss2" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss3" value="<?php the_field('sskol3'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss3" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss4" value="<?php the_field('sskol4'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss4" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss5" value="<?php the_field('sskol5'); ?>" onchange="return validNum(document.ofrm)">
          <input type="hidden" name="totalss5" onchange="calculate()">
        </div>

      <?php } ?>


      <?php if(get_field('sel2') == "1") { ?>
        <tr>
          <td>

            <select name="select2" id="select2">
              <?php if( get_field('sspr11') ): ?>
                <option value="<?php the_field('sspr11'); ?>" class="s11"><?php the_field('ssna11'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr22') ): ?>
                <option value="<?php the_field('sspr22'); ?>" class="s22"><?php the_field('ssna22'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr33') ): ?>
                <option value="<?php the_field('sspr33'); ?>" class="s33"><?php the_field('ssna33'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr44') ): ?>
                <option value="<?php the_field('sspr44'); ?>" class="s44"><?php the_field('ssna44'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr55') ): ?><option value="<?php the_field('sspr55'); ?>" class="s55"><?php the_field('ssna55'); ?></option>
              <?php endif; ?>
            </select>

            <?php if( get_field('sspr11') ): ?>
              <div class="ss11">
                <div class="ssin">
                  <?php the_field('ssna11'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss11" value="<?php the_field('sskol11'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss11" onchange="calculate()">
                </div>
              </div>
            <?php else: ?>
              <div class="ssk" STYLE="display:none;">
                <input type="number" min="0" max="999" name="qtyss11" value="<?php the_field('sskol11'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss11" onchange="calculate()">
              </div>
            <?php endif; ?>

            <?php if( get_field('sspr22') ): ?>
              <div class="ss22">
                <div class="ssin">
                  <?php the_field('ssna22'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss22" value="<?php the_field('sskol22'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss22" onchange="calculate()">
                </div>
              </div>
            <?php else: ?>
              <div class="ssk" STYLE="display:none;">
                <input type="number" min="0" max="999" name="qtyss22" value="<?php the_field('sskol22'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss22" onchange="calculate()">
              </div>
            <?php endif; ?>

            <?php if( get_field('sspr33') ): ?>
              <div class="ss33">
                <div class="ssin">
                  <?php the_field('ssna33'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss33" value="<?php the_field('sskol33'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss33" onchange="calculate()">
                </div>
              </div>
            <?php else: ?>
              <div class="ssk" STYLE="display:none;">
                <input type="number" min="0" max="999" name="qtyss33" value="<?php the_field('sskol33'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss33" onchange="calculate()">
              </div>
            <?php endif; ?>

            <?php if( get_field('sspr44') ): ?>
              <div class="ss44">
                <div class="ssin">
                  <?php the_field('ssna44'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss44" value="<?php the_field('sskol44'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss44" onchange="calculate()">
                </div>
              </div>
            <?php else: ?>
              <div class="ssk" STYLE="display:none;">
                <input type="number" min="0" max="999" name="qtyss44" value="<?php the_field('sskol44'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss44" onchange="calculate()">
              </div>
            <?php endif; ?>

            <?php if( get_field('sspr55') ): ?>
              <div class="ss55">
                <div class="ssin">
                  <?php the_field('ssna55'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss55" value="<?php the_field('sskol55'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss55" onchange="calculate()">
                </div>
              </div>
            <?php else: ?>
              <div class="ssk" STYLE="display:none;">
                <input type="number" min="0" max="999" name="qtyss55" value="<?php the_field('sskol55'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss55" onchange="calculate()">
              </div>
            <?php endif; ?>

          </td>
        </tr>

      <?php } else { ?>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss11" value="<?php the_field('sskol11'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss11" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss22" value="<?php the_field('sskol22'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss22" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss33" value="<?php the_field('sskol33'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss33" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss44" value="<?php the_field('sskol44'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss44" onchange="calculate()">
        </div>

        <div class="ssk" STYLE="display:none;">
          <input type="number" min="0" max="999" name="qtyss55" value="<?php the_field('sskol55'); ?>" onchange="return validNum(document.ofrm)">
          <button class="quont-plus">+</button><button class="quont-minus">-</button>
          <input type="hidden" name="totalss55" onchange="calculate()">
        </div>

      <?php } ?>

      <?php if(get_field('sel3') == "1") { ?>

        <tr>
          <td>

            <select name="select3" id="select3" class="select3">
              <?php if( get_field('sspr111') ): ?>
                <option value="<?php the_field('sspr111'); ?>" class="s111"><?php the_field('ssna111'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr222') ): ?>
                <option value="<?php the_field('sspr222'); ?>" class="s222"><?php the_field('ssna222'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr333') ): ?>
                <option value="<?php the_field('sspr333'); ?>" class="s333"><?php the_field('ssna333'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr444') ): ?>
                <option value="<?php the_field('sspr444'); ?>" class="s444"><?php the_field('ssna444'); ?></option>
              <?php endif; ?>
              <?php if( get_field('sspr555') ): ?>
                <option value="<?php the_field('sspr555'); ?>" class="s555"><?php the_field('ssna555'); ?></option>
              <?php endif; ?>
            </select>

            <?php if( get_field('sspr111') ): ?>
              <div class="ss111">
                <div class="ssin">
                  <?php the_field('ssna111'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss111" value="<?php the_field('sskol111'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss111" onchange="calculate()">
                </div>
              </div>
            <?php else: ?>
              <div class="ssk" STYLE="display:none;">
                <input type="number" min="0" max="999" name="qtyss111" value="<?php the_field('sskol111'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalss111" onchange="calculate()">
              </div>
            <?php endif; ?>

            <?php if( get_field('sspr222') ): ?>
              <div class="ss222">
                <div class="ssin">
                  <?php the_field('ssna222'); ?>
                </div>
                <div class="ssk">
                  <input type="number" min="0" max="999" name="qtyss222" value="<?php the_field('sskol222'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss222" onchange="calculate()">
                </div>
              <?php else: ?>
                <div class="ssk" STYLE="display:none;">
                  <input type="number" min="0" max="999" name="qtyss222" value="<?php the_field('sskol222'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss222" onchange="calculate()">
                </div>
              <?php endif; ?>

              <?php if( get_field('sspr333') ): ?>
                <div class="ss333">
                  <div class="ssin">
                    <?php the_field('ssna333'); ?>
                  </div>
                  <div class="ssk">
                    <input type="number" min="0" max="999" name="qtyss333" value="<?php the_field('sskol333'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss333" onchange="calculate()">
                  </div>
                </div>
              <?php else: ?>
                <div class="ssk" STYLE="display:none;">
                  <input type="number" min="0" max="999" name="qtyss333" value="<?php the_field('sskol333'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss333" onchange="calculate()">
                </div>
              <?php endif; ?>

              <?php if( get_field('sspr444') ): ?>
                <div class="ss444">
                  <div class="ssin">
                    <?php the_field('ssna444'); ?>
                  </div>
                  <div class="ssk">
                    <input type="number" min="0" max="999" name="qtyss444" value="<?php the_field('sskol444'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss444" onchange="calculate()">
                  </div>
                </div>
              <?php else: ?>
                <div class="ssk" STYLE="display:none;">
                  <input type="number" min="0" max="999" name="qtyss444" value="<?php the_field('sskol444'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss444" onchange="calculate()">
                </div>
              <?php endif; ?>

              <?php if( get_field('sspr555') ): ?>
                <div class="ss555">
                  <div class="ssin">
                    <?php the_field('ssna555'); ?>
                  </div>
                  <div class="ssk">
                    <input type="number" min="0" max="999" name="qtyss555" value="<?php the_field('sskol555'); ?>" onchange="return validNum(document.ofrm)">
                    <button class="quont-plus">+</button><button class="quont-minus">-</button>
                    <input type="hidden" name="totalss555" onchange="calculate()">
                  </div>
                </div>
              <?php else: ?>
                <div class="ssk" STYLE="display:none;">
                  <input type="number" min="0" max="999" name="qtyss555" value="<?php the_field('sskol555'); ?>" onchange="return validNum(document.ofrm)">
                  <button class="quont-plus">+</button><button class="quont-minus">-</button>
                  <input type="hidden" name="totalss555" onchange="calculate()">
                </div>
              <?php endif; ?>

            </td>
          </tr>

        <?php } else { ?>

          <div class="ssk" STYLE="display:none;">
            <input type="number" min="0" max="999" name="qtyss111" value="<?php the_field('sskol111'); ?>" onchange="return validNum(document.ofrm)">
            <button class="quont-plus">+</button><button class="quont-minus">-</button>
            <input type="hidden" name="totalss111" onchange="calculate()">
          </div>

          <div class="ssk" STYLE="display:none;">
            <input type="number" min="0" max="999" name="qtyss222" value="<?php the_field('sskol222'); ?>" onchange="return validNum(document.ofrm)">
            <button class="quont-plus">+</button><button class="quont-minus">-</button>
            <input type="hidden" name="totalss222" onchange="calculate()">
          </div>

          <div class="ssk" STYLE="display:none;">
            <input type="number" min="0" max="999" name="qtyss333" value="<?php the_field('sskol333'); ?>" onchange="return validNum(document.ofrm)">
            <button class="quont-plus">+</button><button class="quont-minus">-</button>
            <input type="hidden" name="totalss333" onchange="calculate()">
          </div>

          <div class="ssk" STYLE="display:none;">
            <input type="number" min="0" max="999" name="qtyss444" value="<?php the_field('sskol444'); ?>" onchange="return validNum(document.ofrm)">
            <button class="quont-plus">+</button><button class="quont-minus">-</button>
            <input type="hidden" name="totalss444" onchange="calculate()">
          </div>

          <div class="ssk" STYLE="display:none;">
            <input type="number" min="0" max="999" name="qtyss555" value="<?php the_field('sskol555'); ?>" onchange="return validNum(document.ofrm)">
            <button class="quont-plus">+</button><button class="quont-minus">-</button>
            <input type="hidden" name="totalss555" onchange="calculate()">
          </div>

        <?php } ?>

          <?php if( get_field('pr1d') ): ?>
            <tr>
              <td>
                <?php the_field('name1d'); ?>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopA" value="<?php the_field('kol1d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalAdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopA" value="<?php the_field('kol1d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="totalAdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr2d') ): ?>
            <tr>
              <td>
                <?php the_field('name2d'); ?>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopB" value="<?php the_field('kol2d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalBdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopB" value="<?php the_field('kol2d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="totalBdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr3d') ): ?>
            <tr>
              <td>
              <?php the_field('name3d'); ?>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopC" value="<?php the_field('kol3d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalCdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopC" value="<?php the_field('kol3d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="totalCdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr4d') ): ?>
            <tr>
              <td>
                <?php the_field('name4d'); ?>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopD" value="<?php the_field('kol4d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalDdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopD" value="<?php the_field('kol4d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="totalDdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr5d') ): ?>
            <tr>
              <td>
                <?php the_field('name5d'); ?>
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydopE" value="<?php the_field('kol5d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="totalEdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydopE" value="<?php the_field('kol5d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="totalEdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr6d') ): ?>
            <tr>
              <td>
                <?php the_field('name6d'); ?>
                <input type="hidden" name="name6d" value="<?php the_field('name6d'); ?>">
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1A" value="<?php the_field('kol6d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Adop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1A" value="<?php the_field('kol6d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="total1Adop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr7d') ): ?>
            <tr>
              <td>
                <?php the_field('name7d'); ?>
                <input type="hidden" name="name7d" value="<?php the_field('name7d'); ?>">
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1B" value="<?php the_field('kol7d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Bdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1B" value="<?php the_field('kol7d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="total1Bdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr8d') ): ?>
            <tr>
              <td>
                <?php the_field('name8d'); ?>
                <input type="hidden" name="name8d" value="<?php the_field('name8d'); ?>">
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1C" value="<?php the_field('kol8d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Cdop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1C" value="<?php the_field('kol8d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="total1Cdop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr9d') ): ?>
            <tr>
              <td>
                <?php the_field('name9d'); ?>
                <input type="hidden" name="name9d" value="<?php the_field('name9d'); ?>">
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1D" value="<?php the_field('kol9d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Ddop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1D" value="<?php the_field('kol9d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="total1Ddop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

          <?php if( get_field('pr10d') ): ?>
            <tr>
              <td>
                <?php the_field('name10d'); ?>
                <input type="hidden" name="name10d" value="<?php the_field('name10d'); ?>">
              </td>
              <td>
                <input type="number" min="0" max="999" name="qtydop1E" value="<?php the_field('kol10d'); ?>" onchange="return validNum(document.ofrm)">
                <button class="quont-plus">+</button><button class="quont-minus">-</button>
                <input type="hidden" name="total1Edop" onchange="calculate()">
              </td>
            </tr>
          <?php else: ?>
            <tr>
              <td>
                <input type="hidden" min="0" max="999" name="qtydop1E" value="<?php the_field('kol10d'); ?>" onchange="return validNum(document.ofrm)">
                <input type="hidden" name="total1Edop" onchange="calculate()">
              </td>
            </tr>
          <?php endif; ?>

        </table>
      </form>

    <?php  } ?>


      <span class="title-blue"><?php _e('Call us', 'octa'); ?></span>

      <a href="tel:+<?php $oct_key6 = get_option('oct_key6'); echo preg_replace('/\D/', '', $oct_key6); ?>" class="single-phone"><?php $oct_key6 = get_option('oct_key6'); echo stripslashes($oct_key6); ?></a>

      <p class="work-time"><?php _e('We work from 09:00 to 18:00, Mon-Fri', 'octa'); ?><span class="work-time-or"><?php _e('or', 'octa'); ?></span></p>

      <a href="#" title="<?php $oct_k2 = get_option('oct_k2'); echo stripslashes($oct_k2); ?>" class="btn btn-gray btn-two-blocks btn-callback">
        <i class="fa fa-phone-square"></i>
        <?php $oct_k8 = get_option('oct_k2'); echo stripslashes($oct_k2); ?>
      </a>

    </div><!-- right-block -->
  </div><!-- block-triple /.row -->

  <div class="row tab-block">

    <div class="row tabs-header" id="tabs">
      <div class="col-md-2">
        <a href="#about"><?php _e('Description', 'octa'); ?></a>
      </div>
      <div class="col-md-2">
        <a href="#product"><?php _e('Elements', 'octa'); ?></a>
      </div>
      <div class="col-md-3">
        <a href="#doc"><?php _e('Documentation', 'octa'); ?></a>
      </div>
      <div class="col-md-3">
        <a href="#customers"><?php _e('Who Uses', 'octa'); ?></a>
      </div>
      <div class="col-md-2">
        <a href="#comments"><?php _e('Reviews', 'octa'); ?></a>
      </div>
    </div><!-- row tabs-header -->

    <div class="row tabs-container">

      <div class="tabContent col-md-12" id="about"></div><!-- tabContent col-md-12 -->

      <div class="tabContent col-md-12" id="product">
        <!-- not ready -->
        <?php $posts = get_field('needed'); if( $posts ): ?>
        <h4 class="tab-block-headline"><?php the_title(); ?>: <?php _e('mandatory elements', 'octa'); ?></h4>
          <div class="row">
          <?php foreach( $posts as $p ):?>
            <div class="col-md-4">
              <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                <img src="<?php the_field('image', $p->ID); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
                <?php echo get_the_title( $p->ID ); ?>
                <p><?php the_field('shortinfo', $p->ID); ?></p>
              </a>
            </div>
          <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php $posts = get_field('buyed'); if( $posts ): ?>
        <h4 class="tab-block-headline"><?php the_title(); ?>: <?php _e('additional elements', 'octa'); ?></h4>
          <div class="row">
          <?php foreach( $posts as $p ):?>
            <div class="col-md-4">
              <a href="<?php echo get_permalink( $p->ID ); ?>" title="<?php echo get_the_title( $p->ID ); ?>">
                <img src="<?php the_field('image', $p->ID); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"/>
                <?php echo get_the_title( $p->ID ); ?>
                <p><?php the_field('shortinfo', $p->ID); ?></p>
              </a>
            </div>
          <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <!-- not ready -->
        <!-- not ready -->
      </div><!-- tabContent col-md-12 -->

      <div class="tabContent col-md-12" id="doc"></div><!-- tabContent col-md-12 -->
      <div class="tabContent col-md-12" id="customers"></div><!-- tabContent col-md-12 -->
      <div class="tabContent col-md-12" id="comments"></div><!-- tabContent col-md-12 -->


    </div><!-- /.row tabs-container -->
  </div><!-- tab-block -->

  <?php include(TEMPLATEPATH.'/includes/after-content-button.php'); ?>


  <script>
    // single solution variables
    PrcA = <?php if( get_field('pr1') ): echo round($Cpr1, 0); else: echo '0'; endif;?>;
    PrcB = <?php if( get_field('pr2') ): echo round($Cpr2, 0); else: echo '0'; endif;?>;
    PrcC = <?php if( get_field('pr3') ): echo round($Cpr3, 0); else: echo '0'; endif;?>;
    PrcD = <?php if( get_field('pr4') ): echo round($Cpr4, 0); else: echo '0'; endif;?>;
    PrcE = <?php if( get_field('pr5') ): echo round($Cpr5, 0); else: echo '0'; endif;?>;
    Prc1A = <?php if( get_field('pr6') ): echo round($Cpr6, 0); else: echo '0'; endif;?>;
    Prc1B = <?php if( get_field('pr7') ): echo round($Cpr7, 0); else: echo '0'; endif;?>;
    Prc1C = <?php if( get_field('pr8') ): echo round($Cpr8, 0); else: echo '0'; endif;?>;
    Prc1D = <?php if( get_field('pr9') ): echo round($Cpr9, 0); else: echo '0'; endif;?>;
    Prc1E = <?php if( get_field('pr10') ): echo round($Cpr10, 0); else: echo '0'; endif;?>;
    PrcdopA = <?php if( get_field('pr1d') ): echo round($Cpr1d, 0); else: echo '0'; endif;?>;
    PrcdopB = <?php if( get_field('pr2d') ): echo round($Cpr2d, 0); else: echo '0'; endif;?>;
    PrcdopC = <?php if( get_field('pr3d') ): echo round($Cpr3d, 0); else: echo '0'; endif;?>;
    PrcdopD = <?php if( get_field('pr4d') ): echo round($Cpr4d, 0); else: echo '0'; endif;?>;
    PrcdopE = <?php if( get_field('pr5d') ): echo round($Cpr5d, 0); else: echo '0'; endif;?>;
    Prcdop1A = <?php if( get_field('pr6d') ): echo round($Cpr6d, 0); else: echo '0'; endif;?>;
    Prcdop1B = <?php if( get_field('pr7d') ): echo round($Cpr7d, 0); else: echo '0'; endif;?>;
    Prcdop1C = <?php if( get_field('pr8d') ): echo round($Cpr8d, 0); else: echo '0'; endif;?>;
    Prcdop1D = <?php if( get_field('pr9d') ): echo round($Cpr9d, 0); else: echo '0'; endif;?>;
    Prcdop1E = <?php if( get_field('pr10d') ): echo round($Cpr10d, 0); else: echo '0'; endif;?>;
    Prcss1 = <?php if( get_field('sspr1') ): echo round($Csspr1, 0); else: echo '0'; endif;?>;
    Prcss2 = <?php if( get_field('sspr2') ): echo round($Csspr2, 0); else: echo '0'; endif;?>;
    Prcss3 = <?php if( get_field('sspr3') ): echo round($Csspr3, 0); else: echo '0'; endif;?>;
    Prcss4 = <?php if( get_field('sspr4') ): echo round($Csspr4, 0); else: echo '0'; endif;?>;
    Prcss5 = <?php if( get_field('sspr5') ): echo round($Csspr5, 0); else: echo '0'; endif;?>;
    Prcss11 = <?php if( get_field('sspr11') ): echo round($Csspr11, 0); else: echo '0'; endif;?>;
    Prcss22 = <?php if( get_field('sspr22') ): echo round($Csspr22, 0); else: echo '0'; endif;?>;
    Prcss33 = <?php if( get_field('sspr33') ): echo round($Csspr33, 0); else: echo '0'; endif;?>;
    Prcss44 = <?php if( get_field('sspr44') ): echo round($Csspr44, 0); else: echo '0'; endif;?>;
    Prcss55 = <?php if( get_field('sspr55') ): echo round($Csspr55, 0); else: echo '0'; endif;?>;
    Prcss111 = <?php if( get_field('sspr111') ): echo round($Csspr111, 0); else: echo '0'; endif;?>;
    Prcss222 = <?php if( get_field('sspr222') ): echo round($Csspr222, 0); else: echo '0'; endif;?>;
    Prcss333 = <?php if( get_field('sspr333') ): echo round($Csspr333, 0); else: echo '0'; endif;?>;
    Prcss444 = <?php if( get_field('sspr444') ): echo round($Csspr444, 0); else: echo '0'; endif;?>;
    Prcss555 = <?php if( get_field('sspr555') ): echo round($Csspr555, 0); else: echo '0'; endif;?>;
  </script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/single-solutions.js"></script>

<?php get_footer(); ?>
