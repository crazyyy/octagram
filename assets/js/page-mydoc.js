// on page mydoc change tab headline background and other
$(document).on('click','.content-tab-headline a',function(e){
  $('.content-tab-active').removeClass('content-tab-active');
  $(this).parent().addClass('content-tab-active');
});
// first tab operate
$(document).on('click','.cloud-simulation-object',function(e){
  $('.current-term').removeClass('current-term');
  $('.tagid-current').removeClass('tagid-current');
  $( this ).addClass('current-term');

  var currentDoc = $( this ).attr( "data-id" );
  currentDoc = '.' + currentDoc
  $(currentDoc).addClass('tagid-current');
});
// first tab products
$(document).on('click','.content-tab-left',function(e){
  $('.mydoc-loop-container-systems').removeClass('hidden');
  $('.mydoc-loop-container-products').addClass('display');
  $('.mydoc-loop-container-systems').removeClass('display');
  $('.mydoc-loop-container-systems').addClass('hidden');
  $('.content-tab-container').removeClass('hidden');
  $('.content-tab-container').addClass('display');
});
// second tab system witout cloud tab
// hide all elements except docs in loop
$(document).on('click','.content-tab-middle',function(e){
  $('.mydoc-loop-container-systems').removeClass('display');
  $('.mydoc-loop-container-products').addClass('hidden');
  $('.mydoc-loop-container-systems').removeClass('hidden');
  $('.mydoc-loop-container-systems').addClass('display');
  $('.content-tab-container').removeClass('display');
  $('.content-tab-container').addClass('hidden');

});
// last tab solution witout cloud tab nd without loop
// hide all elements except docs in loop
$(document).on('click','.content-tab-right',function(e){
  $('.mydoc-loop-container-systems').removeClass('display');
  $('.mydoc-loop-container-systems').addClass('hidden');
  $('.content-tab-container').addClass('hidden');
});

