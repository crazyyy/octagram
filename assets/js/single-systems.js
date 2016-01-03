$( document ).ready(function() {

  // renber tab block on solution page bottom
  $.get( currDomain + '/wp-json/wp/v2/systems/' + currID, function( data ) {
    tabRenderAbout(data);
    tabRenderDoc(data);
    tabRenderCustomers(data);
    tabRenderComments(data);
  });

})
