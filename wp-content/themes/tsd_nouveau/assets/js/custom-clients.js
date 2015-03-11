
//alert('re');

// init Isotope
var $container = $('.isotope').isotope({
  itemSelector: '.columns',
//  getSortData: {
//    name: '.name',
//    category: '[data-category]'
//  },
  // layout mode options
  masonry: {
    columnWidth: ".grid-sizer"
  }
  
});



//
//var $container = $('#main-content');
// init
//$container.isotope({
//  // options
//  itemSelector: '.columns',
//  layoutMode: 'fitRows'
//  masonry: { "columnWidth": ".grid-sizer" }
//});
//;
//
//
//
// filter items on button click
//$('#filters').on( 'click', 'button', function() {
//  var filterValue = $(this).attr('data-filter');
//  alert(filterValue)
//  $container.isotope({ filter: filterValue });
//});