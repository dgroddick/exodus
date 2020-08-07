/* global wp, jQuery */
/**
 * File customizer.js.
 *
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
    } );
    
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'nidavellir_header_textcolor', function( value ) {
		value.bind( function( to ) {
            $( '.site-title a, .site-description' ).css( { color: to, } );
        } );
    } );
    
    // Hover color.
	wp.customize( 'nidavellir_hover_color', function( value ) {
		value.bind( function( to ) {
            var style, el;
 
            style = '<style class="link-hover-color">a:hover { background: ' + to + '; }</style>';
            el =  $( '.link-hover-color' );
            
            if ( el.length ) {
                el.replaceWith( style );
            } else {
                $( 'head' ).append( style );
            }
        } );
	} );
}( jQuery ) );
