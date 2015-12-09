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


	$('.placeholder').each(function(){if($(this).val() != '') $(this).prev().addClass('hide');var that = this;$(this).prev().click(function(){$(that).focus();})});
	$('.placeholder').blur(function() {if ($(this).val() == '') $(this).prev().removeClass('hide');});
	$('.placeholder').focus(function() {$(this).prev().addClass('hide');});
	$('.placeholder').mouseover(function() {if ($(this).val() != '') $(this).prev().addClass('hide');});

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

 
        $('.quont-minus').click(function () {
            var $input = $(this).parent().find('input');
            var val = +$input[0].defaultValue;
            var count = parseInt($input.val()) - 1;
            count = count < 0 ? 0 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.quont-plus').click(function () {
            var $input = $(this).parent().find('input');
            var val = +$input[0].defaultValue;
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

  $(".prodlink").click(function()
{
  $("a").removeClass("selected");
               
  $(this).addClass("selected");
});

});

