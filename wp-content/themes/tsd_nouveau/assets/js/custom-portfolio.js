



$(window).load(function(){
 			// init Isotope
 			var $container = $('.portfolio.isotope').isotope({
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
 			
 			// filter items on button click
 			$('#filters').on( 'click', 'button', function() {
 			  var filterValue = $(this).attr('data-filter');
 			  $container.isotope({ filter: filterValue });
 			});
 			
})