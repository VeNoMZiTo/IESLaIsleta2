/**
 *
 * @summary     jPaginate
 * @description Paginate an html elements
 * @version     2017.03.09
 * Rrepository  https://github.com/asirokas/jPaginate
 *
 * @author      Athanasios Sirokas (www.asirokas.com)
 * Contact      asirokas@gmail.com
 *
 */
( function( $ ) {
	$.fn.paginate = function( options ) {
		var defaults = {
			pagination_class: "pagination",
			items_per_page: 5,
			prev_next: true,
			prev_text: '',
			next_text: ''
		};

		// Merge deafults into options
		var options = $.extend( defaults, options );

		obj = $( this );

		// Count entries in block for pagination
		var n = obj.children().size();

		// Calculate number of pages
		var pages = Math.ceil( n / options.items_per_page );

		// Add a div after the #slideshow to put the navigation controls in
		obj.append(
			$( '<nav/>' ).addClass( options.pagination_class + "__controls text-center w-100" ).append(
				$( '<ul/>' ).addClass( options.pagination_class + " list-inline d-inline") )
		);

		function createPaginationControls( pages ) {

			// Add Previous button
			if ( options.prev_next == true ) {
				obj.find( "." + options.pagination_class ).append( '<li class="prev list-inline-item float-left g-hidden-xs-down"><a href="#" class="u-pagination-v1__item u-pagination-v1-4 g-brd-gray-light-v3 g-brd-primary--hover g-rounded-50 g-pa-7-16"><span aria-hidden="true"><i class="fa fa-angle-left g-mr-5"></i>Atrás</span>' + options.prev_text + '</a></li>' );
			}
			// For each div (slide) add a link in span for controls
			for ( var i = 0; i < pages; i++ ) {
				obj.find( "." + options.pagination_class ).append( '<li class="list-inline-item"><a class="u-pagination-v1__item g-rounded-50 g-pa-7-14" href="#' + ( i + 1 ) + '" >' + ( i + 1 ) + '</a></li>' );
			};

			// Add Next Button
			if ( options.prev_next == true ) {
				obj.find( "." + options.pagination_class ).append( '<li class="next list-inline-item float-right g-hidden-xs-down"><a href="#" class="u-pagination-v1__item u-pagination-v1-4 g-brd-gray-light-v3 g-brd-primary--hover g-rounded-50 g-pa-7-16"><span aria-hidden="true">Siguiente<i class="fa fa-angle-right g-ml-5"></i></span>' + options.next_text + '</a></li>' );
			}
		}

		function showPage( page_number ) {
			var start_from = ( page_number * options.items_per_page );
			var end_on = ( ( page_number + 1 ) * options.items_per_page );
			obj.children().not( '.pagination__controls' ).css( 'display', 'none' ).slice( start_from, end_on ).css( 'display', 'block' );
		}

		createPaginationControls( pages );
		showPage( 0 );

		obj.find( '.pagination li' ).not( ".prev,.next" ).first().addClass( 'active' );

		// Navigate to the coresponding slide when clicking on a nav-control
		obj.find( '.pagination li' ).not( ".prev,.next" ).click( function() {

			// Reset the obj element to match the current pagination element
			obj = $(this).parent().parent().parent();

			if ( options.prev_next == true ) {
				var pageIndex = $( this ).index() - 1;
			} else {
				var pageIndex = $( this ).index();
			};

			// remove active class from all elements
			$( this ).parent().children().removeClass( 'active' );
			$( this ).addClass( 'active' );
			showPage( pageIndex );
		} );

		// Navigate to the previous slide when clicking on the prev button
		obj.find( '.pagination li.prev' ).click( function() {

			// Reset the obj element to match the current pagination element
			obj = $(this).parent().parent().parent();

			pageIndex = $( this ).parent().find( 'li.active' ).index() - 2;
			if ( pageIndex < 0 ) pageIndex = 0;

			$( this ).parent().find( 'li.active' ).removeClass( 'active' );
			$( this ).parent().find( 'li:nth-child(' + ( pageIndex + 2 ) + ')' ).addClass( 'active' );
			showPage( pageIndex );
		} );

		// Navigate to the next slide when clicking on the next button
		obj.find( '.pagination li.next' ).click( function() {

			// Reset the obj element to match the current pagination element
			obj = $(this).parent().parent().parent();

			pageIndex = $( this ).parent().find( 'li.active' ).index();
			if ( pageIndex > pages - 1 ) pageIndex = pages - 1;

			$( this ).parent().find( 'li.active' ).removeClass( 'active' );
			$( this ).parent().find( 'li:nth-child(' + ( pageIndex + 2 ) + ')' ).addClass( 'active' );
			showPage( pageIndex );
		} );

	};
} )( jQuery );
