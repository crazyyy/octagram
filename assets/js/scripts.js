// Avoid `console` errors in browsers that lack a console.
(function () {
  var method;
  var noop = function () {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
        console[method] = noop;
    }
}
}());


var cityes = {
  "almatyi": "Алматы",
  "belgorod": "Белгород",
  "vinnitsa": "Винница",
  "vladimir": "Владимир",
  "volgograd": "Волгоград",
  "ekaterinburg": "Екатеринбург",
  "ivanovo": "Иваново",
  "irkutsk": "Иркутск",
  "kazan": "Казань",
  "kaliningrad": "Калининград",
  "kemerovo": "Кемерово",
  "kiev": "Киев",
  "krasnoyarsk": "Красноярск",
  "moskva": "Москва",
  "novosibirsk": "Новосибирск",
  "orenburg": "Оренбург",
  "petrozavodsk": "Петрозаводск",
  "petushki": "Петушки",
  "pyatigorsk": "Пятигорск",
  "rostov-na-donu": "Ростов-на-Дону",
  "ryazan": "Рязань",
  "samara": "Самара",
  "sankt-peterburg": "Санкт-Петербург",
  "saratov": "Саратов",
  "tver": "Тверь",
  "tolyatti": "Тольятти",
  "tula": "Тула",
  "ulyanovsk": "Ульяновск",
  "ufa": "Уфа",
  "habarovsk": "Хабаровск",
  "himki": "Химки",
  "chelyabinsk": "Челябинск"
};

// search form in header
$( '.open-search' ).on( 'click', function() {
  $(this).toggleClass('open-search-opened');
  $('#searchform').toggleClass('searchform-show');
});

$( '.close-search' ).on( 'click', function() {
  $('.open-search').toggleClass('open-search-opened');
  $('#searchform').toggleClass('searchform-show');
});

// solution page and other - input type=numbers - pretty buttons
$('.quont-plus').click(function () {
  var $input = $(this).parent().find('input');
  var val = +$input[0].defaultValue;
  $input.val(parseInt($input.val()) + 1);
  $input.change();
  return false;
});

$('.quont-minus').click(function () {
  var $input = $(this).parent().find('input');
  var val = +$input[0].defaultValue;
  var count = parseInt($input.val()) - 1;
  count = count < 0 ? 0 : count;
  $input.val(count);
  $input.change();
  return false;
});

// build block with rating
function BuildRating(ratingValue) {
  var star = '<i class="fa fa-star"></i>';
  var ratingblock = '<!-- this block created in js --><span class="ovr-rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">';
  ratingblock = ratingblock + '<meta itemprop="worstRating" content = "' + ratingValue + '"><span itemprop="ratingValue">';
  if (ratingValue == 1) {
    ratingblock = ratingblock + star;
  } else if (ratingValue == 2) {
    ratingblock = ratingblock + star + star;
  } else if (ratingValue == 3) {
    ratingblock = ratingblock + star + star + star;
  } else if (ratingValue == 4) {
    ratingblock = ratingblock + star + star + star + star;
  } else if (ratingValue == 5) {
    ratingblock = ratingblock + star + star + star + star + star;
  };
  ratingblock = ratingblock + '</span><span class="hidden">' + ratingValue + '/</span><span itemprop="bestRating" class="hidden">5</span></span><!-- ovr-rating --><!-- this block created in js -->';
  return ratingblock;
}
// function to render tab content
function tabRenderAbout(data) {
  if ( data.acf.infofull.length > 0 ) {
    $( "#about" ).html( '<h4 class="tab-block-headline">' + data.title.rendered + ':' + '</h4>' + data.acf.infofull);
  } else {
    $( "#about" ).html( '<h4 class="tab-block-headline">' + data.title.rendered + ':' + '</h4>' + data.content.rendered);
  }
}

function tabRenderDoc(data) {
  if ( data.acf.doc.length > 0 ) {
    $('#doc').append('<h4 class="tab-block-headline">' + currTitle + ': ' + translDocumentation + '</h4><div class="row"></div><!-- /.row -->');
    for (var i = data.acf.doc.length - 1; i >= 0; i--) {
      $.get( currDomain + '/wp-json/wp/v2/doc/' + data.acf.doc[i].ID, function( doc ) {
        $('#doc .row').append('<div class="col-md-12"><h5>' + doc.title.rendered + '<a href="' + doc.link + ' " class="btn btn-gray" title="' + transDownloadPDF + '" target="_blank"><i class="fa fa-file-pdf-o"></i>'+ transDownloadPDF + '</a></h5></div><!-- /.col-md-12 -->');
      });
    };
  }
}

function tabRenderCustomers(data) {
  // #customers
  if ( data.acf.customers.length > 0 ) {
    $('#customers').append('<h4 class="tab-block-headline">' + currTitle + ': ' + translTheClientList + '</h4><div class="row"></div><!-- /.row -->');
    for (var i = data.acf.customers.length - 1; i >= 0; i--) {
      $.get( currDomain + '/wp-json/wp/v2/customers/' + data.acf.customers[i].ID, function( customers ) {
        $('#customers .row').append('<div class="col-md-4"><a href="' + customers.link + '" title="' + customers.title.rendered + '"><img src="' + customers.acf.image + '" alt="' + customers.title.rendered + '" title="' + customers.title.rendered + '" /></a></div><!-- /.col-md-4 -->');
      });
    };
  }
}
function tabRenderComments(data) {
  if ( data.acf.reviews1name.length > 0 || data.acf.reviews2name.length > 0 || data.acf.reviews3name.length > 0 || data.acf.reviews4name.length > 0 || data.acf.reviews5name.length > 0 ) {

    $('#comments').append('<h4 class="tab-block-headline">' + currTitle + ': ' + transCustomerReviewsAndDealers + '</h4><div class="row"></div><!-- /.row -->');

    if ( data.acf.reviews1name ) {
      $('#comments .row').append('<div class="tab-content-review"><img src="' + data.acf.reviews1img + '" alt="' + data.acf.reviews1name + '- ' + data.acf.reviews1named + '" /><span class="reviews-author">' + data.acf.reviews1name + '<span>' + data.acf.reviews1named + '</span></span><p>' + data.acf.reviews1text + '</p></div><!-- /.tab-content-review -->' );
    }

    if ( data.acf.reviews2name ) {
      $('#comments .row').append('<div class="tab-content-review"><img src="' + data.acf.reviews2img + '" alt="' + data.acf.reviews2name + '- ' + data.acf.reviews2named + '" /><span class="reviews-author">' + data.acf.reviews2name + '<span>' + data.acf.reviews2named + '</span></span><p>' + data.acf.reviews2text + '</p></div><!-- /.tab-content-review -->' );
    }

    if ( data.acf.reviews3name ) {
      $('#comments .row').append('<div class="tab-content-review"><img src="' + data.acf.reviews3img + '" alt="' + data.acf.reviews3name + '- ' + data.acf.reviews3named + '" /><span class="reviews-author">' + data.acf.reviews3name + '<span>' + data.acf.reviews3named + '</span></span><p>' + data.acf.reviews3text + '</p></div><!-- /.tab-content-review -->' );
    }

    if ( data.acf.reviews4name ) {
      $('#comments .row').append('<div class="tab-content-review"><img src="' + data.acf.reviews4img + '" alt="' + data.acf.reviews4name + '- ' + data.acf.reviews4named + '" /><span class="reviews-author">' + data.acf.reviews4name + '<span>' + data.acf.reviews4named + '</span></span><p>' + data.acf.reviews4text + '</p></div><!-- /.tab-content-review -->' );
    }

    if ( data.acf.reviews5name ) {
      $('#comments .row').append('<div class="tab-content-review"><img src="' + data.acf.reviews5img + '" alt="' + data.acf.reviews5name + '- ' + data.acf.reviews5named + '" /><span class="reviews-author">' + data.acf.reviews5name + '<span>' + data.acf.reviews5named + '</span></span><p>' + data.acf.reviews5text + '</p></div><!-- /.tab-content-review -->' );
    }
  };
}

// display diller block when selected city
function displayVals() {
  // get selected id
  var singleValues = $( "#diler-name-list" ).val();
  var currDiler = 'li.' + singleValues;
  $('.nearby-diler-display').removeClass('nearby-diler-display');
  // add display block to blocks with same id with selected
  $(currDiler).addClass('nearby-diler-display');
}
$( "select#diler-name-list" ).change( displayVals );

// video lightbox
$( '#presentation a' ).on( 'click', function() {
  $('#bg-black').css({ 'display': "block" });
  $('#video-div').css({ 'display': "block" });
});

// old site js loads
$(document).ready(function() {
  $( "#presentation a" ).click(function() {
    $( "#bg-black" ).fadeIn( "fast" );
    $( "#video-div" ).fadeIn( "fast" );
    return false;
  });

  $( "#bg-black, #close" ).click(function() {
    $( "#bg-black" ).fadeOut( "fast" );
    $( "#video-div" ).fadeOut( "fast" );
    $( "#order-form" ).fadeOut( "fast" );
    return false;
  });

  $(".checkbox-row").change(function() {
    if($(this).is(':checked'))
      $(this).parent().addClass('selected');
    else
      $(this).parent().removeClass('selected');
  });

  $("#presentation")
  .mouseenter(function() {
    $('#hover-presentation').stop();
    $('#hover-presentation').fadeIn(200);
  })
  .mouseleave(function() {
    $('#hover-presentation').stop();
    $('#hover-presentation').fadeOut(200);
  });

  $('.slct').click(function(){
    var dropBlock = $(this).parent().find('.drop');
    if( dropBlock.is(':hidden') ) {
      dropBlock.slideDown();
      $(this).addClass('active');
    } else {
      $(this).removeClass('active');
      dropBlock.slideUp();
    }
    return false;
  });

  $('.drop li').click(function(){
    var selectResult = $(this).html();
    var dropBlock = $(this).parent();
    $(this).parent().parent().find('input').val(selectResult);
    $(this).parent().parent().find('.slct').removeClass('active').html(selectResult);
    dropBlock.slideUp();
  });

  $('body').on('click', '.minus', function(){
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 0 ? 0 : count;
    $input.val(count);
    $input.change();
    return false;
  });

  $('body').on('click', '.plus', function(){
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });

  $('.children').click(function() {
    $(this).toggleClass('use').next().slideToggle('slow');
    return false;
  });

  $( "#menu-item-2227" ).click(function() {
    $('#sub-menu').stop();
    $( '#sub-menu' ).slideToggle(600);
    return false;
  });

  $('.click-nav .menu .menu-item-depth-0').click(function(e) {
    $(this).closest('li').find('.menu-depth-1').slideToggle(200);
    $('.clicker').toggleClass('use');
    e.stopPropagation();
  });

  $('.click-nav .menu .menu-item-depth-1').click(function(e) {
    $(this).closest('li').find('.menu-depth-2').slideToggle(200);
    $('.clicker').toggleClass('use');
    e.stopPropagation();
  });

  $('.click-nav .menu .menu-item-depth-2').click(function(e) {
    $(this).closest('li').find('.menu-depth-3').slideToggle(200);
    $('.clicker').toggleClass('use');
    e.stopPropagation();
  });

  $('.click-nav .menu .menu-item-depth-3').click(function(e) {
    $(this).closest('li').find('.menu-depth-4').slideToggle(200);
    $('.clicker').toggleClass('use');
    e.stopPropagation();
  });

  $('.click-nav .menu .menu-item-depth-4').click(function(e) {
    $(this).closest('li').find('.menu-depth-5').slideToggle(200);
    $('.clicker').toggleClass('use');
    e.stopPropagation();
  });

  $(".prodlink").click(function() {
    $("a").removeClass("selected");
    $(this).addClass("selected");
  });

});
/*
  mydiller page
 */
$(document).on('click','.diller-tag',function(e){
  $('.current-term').removeClass('current-term');
  $('.dealer-loop-current').removeClass('dealer-loop-current');
  $( this ).addClass('current-term');
  var currentDiller = $( this ).attr( "data-id" );
  currentDiller = '.' + currentDiller
  $(currentDiller).addClass('dealer-loop-current');
});

/*
  modal forms
 */
$(document).on('click','.btn-order',function(e){
  $('.form-modal-order').addClass('display');
  $('.form-modal-order .form-title').html(currTitle);
});
$(document).on('click','.btn-callback',function(e){
  $('.form-modal-callback').addClass('display');
  $('.form-modal-callback .form-title').html(currTitle);
});
$(document).on('click','.btn-question',function(e){
  $('.form-modal-question').addClass('display');
  $('.form-modal-question .form-title').html(currTitle);
});
// close modal window
$(document).on('click','.form-modal-bgc',function(e){
  $(this).parent().removeClass('display');
});
$(document).on('click','.form-modal-close',function(e){
  $(this).closest('.form-modal').removeClass('display');
});
