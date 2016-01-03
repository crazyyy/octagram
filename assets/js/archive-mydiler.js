$( document ).ready(function() {

  $.get( currDomain + '/wp-json/wp/v2/mydiler?per_page=100', function( diler ) {
    var allTagArray = [];
    var uniqueTagArray = [];
    // build diller block
    for (var i = diler.length - 1; i >= 0; i--) {
      var dilerBlock;
      var currRat = diler[i].acf.rating;
      if ( diler[i].acf.city == 'moskva' ) {
        var displayPriorCity = 'dealer-loop-current';
      } else {
        var displayPriorCity = '';
      }
      dilerBlock = '<div class="row dealer-loop tagid-' + diler[i].acf.city + ' ' + displayPriorCity + '"><div class="col-md-2 dealer-img"><a href="' + diler[i].link + '"><img src="' + diler[i].acf.фотодилера + '" alt="' + diler[i].title.rendered + '" /></a></div><!-- /.col-md-2 dealer-img --><div class="col-md-8 dealer-cont"><h3><a href="' + diler[i].link + '">' + diler[i].title.rendered + '</a></h3><p class="dealer-adress">' + diler[i].acf.адрес + '</p><a href="tel:' + diler[i].acf.телефон + '" class="dealer-phone">' + diler[i].acf.телефон + '</a>' + BuildRating(currRat) + '</div><!-- /.col-md-8 dealer-cont --><div class="col-md-2 dealer-more"><a href="' + diler[i].link + '">' + transReadMore + '</a></div><!-- /.col-md-2 dealer-more --></div><!-- /.row dealer-loop -->'

      $('.dealer-loop-container').append(dilerBlock);
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
      } else if ( uniqueTagArray[i] == 'moskva' ) {
        var cityTag = uniqueTagArray[i];
        $('#taggest').append('<a class="diller-tag current-term" data-id="tagid-' + cityTag + '">' + cityes[cityTag] + '</a>');
      } else {
        var cityTag = uniqueTagArray[i];
        $('#taggest').append('<a class="diller-tag" data-id="tagid-' + cityTag + '">' + cityes[cityTag] + '</a>');
      }
    }
  });

})
