(function( $ ) {

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

	wp.customize( 'primary_color', function( setting ) {
		wp.customize.control( 'primary_color_hue', function( control ) {
			var visibility = function() {
				if ( 'custom' === setting.get() ) {
					control.container.slideDown( 180 );
				} else {
					control.container.slideUp( 180 );
				}
			};

			visibility();
			setting.bind( visibility );
		});
	});

})( jQuery );
