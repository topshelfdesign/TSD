$( function () {

	//insert_footer_menu_line_break();

	//center_home_page_buttons();

	contact_page_phone_mask();

	$( '#menu-site-menu > li' ).bind( 'mouseover', jsddm_open );
	$( '#menu-site-menu > li' ).bind( 'mouseout', jsddm_timer );

	adjust_home_page_header_dd_menu();

} );


$( '#menu-interior-menu > li' ).each( function () {
//	$( this ).addClass( 'small-2' );
} );

$( window ).resize( function () {
	center_home_page_buttons();
	adjust_home_page_header_dd_menu();
} );

function adjust_home_page_header_dd_menu() {
	var page = $( 'body.page-id-6' );
	if ( page.length ) {
		var dd = $( ".top-bar-section ul ul" );
		dd.each( function () {
			var parent = $( this ).parent();
			$(this ).css("top", parent.height() + 'px');
		} )
	}
}

function contact_page_phone_mask() {
	$( ".phone input" ).mask( "(999) 999-9999" );

	$( ".phone input" ).on( "blur", function () {
		var last = $( this ).val().substr( $( this ).val().indexOf( "-" ) + 1 );

		if ( last.length == 3 ) {
			var move = $( this ).val().substr( $( this ).val().indexOf( "-" ) - 1, 1 );
			var lastfour = move + last;

			var first = $( this ).val().substr( 0, 9 );

			$( this ).val( first + '-' + lastfour );
		}
	} );
}


function center_home_page_buttons() {
	if ( $( 'body' ).hasClass( "home" ) ) {
		var text1 = $( ".front_split_text:first" );
		var text2 = $( ".front_split_text:last" );
		text1.css( "margin-top", 0 ).css( "margin-bottom", 0 );
		text2.css( "margin-top", 0 ).css( "margin-bottom", 0 );
		var t1h = text1.height();
		var t2h = text2.height();
		var adj = Math.abs( (
		                    t1h - t2h
		                    ) / 2 );
		if ( t1h >= t2h ) {
			text2.css( "margin-top", adj + "px" ).css( "margin-bottom", adj + "px" );
		} else {
			text1.css( "margin-top", adj + "px" ).css( "margin-bottom", adj + "px" );
		}
	}
}

function insert_footer_menu_line_break() {
	$( "#footer-menu span:nth-child(3)" ).after( "<br class='show-for-medium-down' />" );
}

var timeout = 500;
var closetimer = 0;
var ddmenuitem = 0;

function jsddm_open() {
	jsddm_canceltimer();
	jsddm_close();
	ddmenuitem = $( this ).find( 'ul' ).css( 'visibility', 'visible' );
}

function jsddm_close() {
	if ( ddmenuitem ) {
		ddmenuitem.css( 'visibility', 'hidden' );
	}
}

function jsddm_timer() {
	closetimer = window.setTimeout( jsddm_close, timeout );
}

function jsddm_canceltimer() {
	if ( closetimer ) {
		window.clearTimeout( closetimer );
		closetimer = null;
	}
}

document.onclick = jsddm_close;
