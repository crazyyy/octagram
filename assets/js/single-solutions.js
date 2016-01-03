$( document ).ready(function() {
  // nearby diller select
  $.get( currDomain + '/wp-json/wp/v2/mydiler?per_page=100', function( diler ) {
    var allTagArray = [];
    var uniqueTagArray = [];
    // build diller block
    for (var i = diler.length - 1; i >= 0; i--) {
      var dilerBlock;
      var currRat = diler[i].acf.rating;
      dilerBlock = '<li class="tagid-' + diler[i].acf.city + '">';
      dilerBlock = dilerBlock + '<a href="' + diler[i].link + '" target="_blank">';
      dilerBlock = dilerBlock + '<img src="' + diler[i].acf.фотодилера + '" alt="' + diler[i].title.rendered + ' + " title="' + diler[i].title.rendered + '" />';
      dilerBlock = dilerBlock + '<h6>' + diler[i].title.rendered + '</h6>';
      dilerBlock = dilerBlock + '<p>' + diler[i].acf.адрес + '</p>';
      dilerBlock = dilerBlock + BuildRating(currRat);
      dilerBlock = dilerBlock + '<span class="read-more-small">' + transReadMore + '</span></a></li>';
      $('.all-diler-list').append(dilerBlock);
      // create array with citys
      allTagArray.push(diler[i].acf.city);
    };

    // remove dublicates from array
    $.each(allTagArray, function(i, el){
      if($.inArray(el, uniqueTagArray) === -1) uniqueTagArray.push(el);
    });
    // sort array by name
    uniqueTagArray.sort();
    // build select form with nornal city names
    for (var i = uniqueTagArray.length; i >=0; i--) {
      if ( uniqueTagArray[i] == undefined ) {
        // null
      } else {
        var cityTag = uniqueTagArray[i];
        $('.diler-name-list').append('<option value="tagid-' + cityTag + '">' + cityes[cityTag] + '</option>');
      }
    }
  });

  // renber tab block on solution page bottom
  $.get( currDomain + '/wp-json/wp/v2/solutions/' + currID, function( data ) {
    tabRenderAbout(data);
    tabRenderDoc(data);
    tabRenderCustomers(data);
    tabRenderComments(data);
  });


  $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s1')) {
      $(".ss1").show('5000');
    } else {
      $(".ss1").hide('5000');
    }
  }).change();

  $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s2')) {
      $(".ss2").show('5000');
    } else {
      $(".ss2").hide('5000');
    }
  }).change();

  $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s3')) {
        $(".ss3").show('5000');
    } else {
        $(".ss3").hide('5000');
    }
  }).change();

  $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s4')) {
        $(".ss4").show('5000');
    } else {
        $(".ss4").hide('5000');
    }
  }).change();

  $('select#select').change(function () {
    if ($('option:selected', this).hasClass('s5')) {
        $(".ss5").show('5000');
    } else {
        $(".ss5").hide('5000');
    }
  }).change();

  $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s11')) {
        $(".ss11").show('5000');
    } else {
        $(".ss11").hide('5000');
    }
  }).change();

  $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s22')) {
        $(".ss22").show('5000');
    } else {
        $(".ss22").hide('5000');
    }
  }).change();

  $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s33')) {
        $(".ss33").show('5000');
    } else {
        $(".ss33").hide('5000');
    }
  }).change();

  $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s44')) {
        $(".ss44").show('5000');
    } else {
        $(".ss44").hide('5000');
    }
  }).change();

  $('select#select2').change(function () {
    if ($('option:selected', this).hasClass('s55')) {
        $(".ss55").show('5000');
    } else {
        $(".ss55").hide('5000');
    }
  }).change();

  $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s111')) {
        $(".ss111").show('5000');
    } else {
        $(".ss111").hide('5000');
    }
  }).change();

  $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s222')) {
        $(".ss222").show('5000');
    } else {
        $(".ss222").hide('5000');
    }
  }).change();

  $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s333')) {
        $(".ss333").show('5000');
    } else {
        $(".ss333").hide('5000');
    }
  }).change();

  $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s444')) {
        $(".ss444").show('5000');
    } else {
        $(".ss444").hide('5000');
    }
  }).change();

  $('select#select3').change(function () {
    if ($('option:selected', this).hasClass('s555')) {
      $(".ss555").show('5000');
    } else {
      $(".ss555").hide('5000');
    }
  }).change();

  // hide table row WO visible content
  // ONLY for solution page
  $('td:has(span)').parent().addClass('visible');
});

// solution page
function dm(amount) {
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

// solution page
function calculate() {
  QtyA = 0; QtyB = 0; QtyC = 0; QtyD = 0; QtyE = 0;Qty1A = 0;  Qty1B = 0; Qty1C = 0; Qty1D = 0; Qty1E = 0; QtydopA = 0; QtydopB = 0; QtydopC = 0; QtydopD = 0; QtydopE = 0; Qtydop1A = 0; Qtydop1B = 0; Qtydop1C = 0; Qtydop1D = 0; Qtydop1E = 0; Qtyss1 = 0; Qtyss2 = 0;  Qtyss3 = 0; Qtyss4 = 0; Qtyss5 = 0; Qtyss11 = 0; Qtyss22 = 0; Qtyss33 = 0; Qtyss44 = 0; Qtyss55 = 0; Qtyss111 = 0; Qtyss222 = 0; Qtyss333 = 0; Qtyss444 = 0; Qtyss555 = 0;
  TotA = 0; TotB = 0; TotC = 0; TotD = 0; TotE = 0; Tot1A = 0; Tot1B = 0; Tot1C = 0; Tot1D = 0; Tot1E = 0; TotdopA = 0;  TotdopB = 0; TotdopC = 0; TotdopD = 0; TotdopE = 0; Totdop1A = 0; Totdop1B = 0; Totdop1C = 0; Totdop1D = 0; Totdop1E = 0; Totss1 = 0;  Totss2 = 0; Totss3 = 0; Totss4 = 0; Totss5 = 0;Totss11 = 0; Totss22 = 0; Totss33 = 0; Totss44 = 0; Totss55 = 0;Totss111 = 0; Totss222 = 0; Totss333 = 0; Totss444 = 0; Totss555 = 0;

  if (document.ofrm.qtyA.value > "") { QtyA = document.ofrm.qtyA.value }; document.ofrm.qtyA.value = eval(QtyA);
  if (document.ofrm.qtyB.value > "") { QtyB = document.ofrm.qtyB.value }; document.ofrm.qtyB.value = eval(QtyB);
  if (document.ofrm.qtyC.value > "") { QtyC = document.ofrm.qtyC.value }; document.ofrm.qtyC.value = eval(QtyC);
  if (document.ofrm.qtyD.value > "") { QtyD = document.ofrm.qtyD.value }; document.ofrm.qtyD.value = eval(QtyD);
  if (document.ofrm.qtyE.value > "") { QtyE = document.ofrm.qtyE.value }; document.ofrm.qtyE.value = eval(QtyE);
  if (document.ofrm.qty1A.value > "") { Qty1A = document.ofrm.qty1A.value }; document.ofrm.qty1A.value = eval(Qty1A);
  if (document.ofrm.qty1B.value > "") { Qty1B = document.ofrm.qty1B.value }; document.ofrm.qty1B.value = eval(Qty1B);
  if (document.ofrm.qty1C.value > "") { Qty1C = document.ofrm.qty1C.value }; document.ofrm.qty1C.value = eval(Qty1C);
  if (document.ofrm.qty1D.value > "") { Qty1D = document.ofrm.qty1D.value }; document.ofrm.qty1D.value = eval(Qty1D);
  if (document.ofrm.qty1E.value > "") { Qty1E = document.ofrm.qty1E.value }; document.ofrm.qty1E.value = eval(Qty1E);
  if (document.ofrm.qtydopA.value > "") { QtydopA = document.ofrm.qtydopA.value }; document.ofrm.qtydopA.value = eval(QtydopA);
  if (document.ofrm.qtydopB.value > "") { QtydopB = document.ofrm.qtydopB.value }; document.ofrm.qtydopB.value = eval(QtydopB);
  if (document.ofrm.qtydopC.value > "") { QtydopC = document.ofrm.qtydopC.value }; document.ofrm.qtydopC.value = eval(QtydopC);
  if (document.ofrm.qtydopD.value > "") { QtydopD = document.ofrm.qtydopD.value }; document.ofrm.qtydopD.value = eval(QtydopD);
  if (document.ofrm.qtydopE.value > "") { QtydopE = document.ofrm.qtydopE.value }; document.ofrm.qtydopE.value = eval(QtydopE);
  if (document.ofrm.qtydop1A.value > "") { Qtydop1A = document.ofrm.qtydop1A.value }; document.ofrm.qtydop1A.value = eval(Qtydop1A);
  if (document.ofrm.qtydop1B.value > "") { Qtydop1B = document.ofrm.qtydop1B.value }; document.ofrm.qtydop1B.value = eval(Qtydop1B);
  if (document.ofrm.qtydop1C.value > "") { Qtydop1C = document.ofrm.qtydop1C.value }; document.ofrm.qtydop1C.value = eval(Qtydop1C);
  if (document.ofrm.qtydop1D.value > "") { Qtydop1D = document.ofrm.qtydop1D.value }; document.ofrm.qtydop1D.value = eval(Qtydop1D);
  if (document.ofrm.qtydop1E.value > "") { Qtydop1E = document.ofrm.qtydop1E.value }; document.ofrm.qtydop1E.value = eval(Qtydop1E);
  if (document.ofrm.qtyss1.value > "") { Qtyss1 = document.ofrm.qtyss1.value }; document.ofrm.qtyss1.value = eval(Qtyss1);
  if (document.ofrm.qtyss2.value > "") { Qtyss2 = document.ofrm.qtyss2.value }; document.ofrm.qtyss2.value = eval(Qtyss2);
  if (document.ofrm.qtyss3.value > "") { Qtyss3 = document.ofrm.qtyss3.value }; document.ofrm.qtyss3.value = eval(Qtyss3);
  if (document.ofrm.qtyss4.value > "") { Qtyss4 = document.ofrm.qtyss4.value }; document.ofrm.qtyss4.value = eval(Qtyss4);
  if (document.ofrm.qtyss5.value > "") { Qtyss5 = document.ofrm.qtyss5.value }; document.ofrm.qtyss5.value = eval(Qtyss5);
  if (document.ofrm.qtyss11.value > "") { Qtyss11 = document.ofrm.qtyss11.value }; document.ofrm.qtyss11.value = eval(Qtyss11);
  if (document.ofrm.qtyss22.value > "") { Qtyss22 = document.ofrm.qtyss22.value }; document.ofrm.qtyss22.value = eval(Qtyss22);
  if (document.ofrm.qtyss33.value > "") { Qtyss33 = document.ofrm.qtyss33.value }; document.ofrm.qtyss33.value = eval(Qtyss33);
  if (document.ofrm.qtyss44.value > "") { Qtyss44 = document.ofrm.qtyss44.value }; document.ofrm.qtyss44.value = eval(Qtyss44);
  if (document.ofrm.qtyss55.value > "") { Qtyss55 = document.ofrm.qtyss55.value }; document.ofrm.qtyss55.value = eval(Qtyss55);
  if (document.ofrm.qtyss111.value > "") { Qtyss111 = document.ofrm.qtyss111.value }; document.ofrm.qtyss111.value = eval(Qtyss111);
  if (document.ofrm.qtyss222.value > "") { Qtyss222 = document.ofrm.qtyss222.value }; document.ofrm.qtyss222.value = eval(Qtyss222);
  if (document.ofrm.qtyss333.value > "") { Qtyss333 = document.ofrm.qtyss333.value }; document.ofrm.qtyss333.value = eval(Qtyss333);
  if (document.ofrm.qtyss444.value > "") { Qtyss444 = document.ofrm.qtyss444.value }; document.ofrm.qtyss444.value = eval(Qtyss444);
  if (document.ofrm.qtyss555.value > "") { Qtyss555 = document.ofrm.qtyss555.value }; document.ofrm.qtyss555.value = eval(Qtyss555);

  TotA = QtyA * PrcA; document.ofrm.totalA.value = dm(eval(TotA));
  TotB = QtyB * PrcB; document.ofrm.totalB.value = dm(eval(TotB));
  TotC = QtyC * PrcC; document.ofrm.totalC.value = dm(eval(TotC));
  TotD = QtyD * PrcD; document.ofrm.totalD.value = dm(eval(TotD));
  TotE = QtyE * PrcE; document.ofrm.totalE.value = dm(eval(TotE));
  Tot1A = Qty1A * Prc1A; document.ofrm.total1A.value = dm(eval(Tot1A));
  Tot1B = Qty1B * Prc1B; document.ofrm.total1B.value = dm(eval(Tot1B));
  Tot1C = Qty1C * Prc1C; document.ofrm.total1C.value = dm(eval(Tot1C));
  Tot1D = Qty1D * Prc1D; document.ofrm.total1D.value = dm(eval(Tot1D));
  Tot1E = Qty1E * Prc1E; document.ofrm.total1E.value = dm(eval(Tot1E));
  TotdopA = QtydopA * PrcdopA; document.ofrm.totalAdop.value = dm(eval(TotdopA));
  TotdopB = QtydopB * PrcdopB; document.ofrm.totalBdop.value = dm(eval(TotdopB));
  TotdopC = QtydopC * PrcdopC; document.ofrm.totalCdop.value = dm(eval(TotdopC));
  TotdopD = QtydopD * PrcdopD; document.ofrm.totalDdop.value = dm(eval(TotdopD));
  TotdopE = QtydopE * PrcdopE; document.ofrm.totalEdop.value = dm(eval(TotdopE));
  Totdop1A = Qtydop1A * Prcdop1A; document.ofrm.total1Adop.value = dm(eval(Totdop1A));
  Totdop1B = Qtydop1B * Prcdop1B; document.ofrm.total1Bdop.value = dm(eval(Totdop1B));
  Totdop1C = Qtydop1C * Prcdop1C; document.ofrm.total1Cdop.value = dm(eval(Totdop1C));
  Totdop1D = Qtydop1D * Prcdop1D; document.ofrm.total1Ddop.value = dm(eval(Totdop1D));
  Totdop1E = Qtydop1E * Prcdop1E; document.ofrm.total1Edop.value = dm(eval(Totdop1E));
  Totss1 = Qtyss1 * Prcss1; document.ofrm.totalss1.value = dm(eval(Totss1));
  Totss2 = Qtyss2 * Prcss2; document.ofrm.totalss2.value = dm(eval(Totss2));
  Totss3 = Qtyss3 * Prcss3; document.ofrm.totalss3.value = dm(eval(Totss3));
  Totss4 = Qtyss4 * Prcss4; document.ofrm.totalss4.value = dm(eval(Totss4));
  Totss5 = Qtyss5 * Prcss5; document.ofrm.totalss5.value = dm(eval(Totss5));
  Totss11 = Qtyss11 * Prcss11; document.ofrm.totalss11.value = dm(eval(Totss11));
  Totss22 = Qtyss22 * Prcss22; document.ofrm.totalss22.value = dm(eval(Totss22));
  Totss33 = Qtyss33 * Prcss33; document.ofrm.totalss33.value = dm(eval(Totss33));
  Totss44 = Qtyss44 * Prcss44; document.ofrm.totalss44.value = dm(eval(Totss44));
  Totss55 = Qtyss55 * Prcss55; document.ofrm.totalss55.value = dm(eval(Totss55));
  Totss111 = Qtyss111 * Prcss111; document.ofrm.totalss111.value = dm(eval(Totss111));
  Totss222 = Qtyss222 * Prcss222; document.ofrm.totalss222.value = dm(eval(Totss222));
  Totss333 = Qtyss333 * Prcss333; document.ofrm.totalss333.value = dm(eval(Totss333));
  Totss444 = Qtyss444 * Prcss444; document.ofrm.totalss444.value = dm(eval(Totss444));
  Totss555 = Qtyss555 * Prcss555; document.ofrm.totalss555.value = dm(eval(Totss555));

  Totamt = eval(TotA) + eval(TotB) + eval(TotC) + eval(TotD) + eval(TotE) + eval(Tot1A) + eval(Tot1B) + eval(Tot1C) + eval(Tot1D) + eval(Tot1E) + eval(TotdopA) + eval(TotdopB) + eval(TotdopC) + eval(TotdopD) + eval(TotdopE) + eval(Totdop1A) + eval(Totdop1B) + eval(Totdop1C) + eval(Totdop1D) + eval(Totdop1E) + eval(Totss1) + eval(Totss2) + eval(Totss3) + eval(Totss4) + eval(Totss5) + eval(Totss11) + eval(Totss22) + eval(Totss33) + eval(Totss44) + eval(Totss55) + eval(Totss111) + eval(Totss222) + eval(Totss333) + eval(Totss444) +eval(Totss555);

  document.ofrm.GrandTotal.value = Totamt.toLocaleString();

}

// solution page
function validNum(theForm) {
  calculate();
  return (true);
}
// solution page
window.onload = function () {
  document.getElementById('bigtotal').onchange();
  calculate();
};
$( document ).ready(function() {
  calculate();
});

