/**
 * FastClick
 */

if ( 'addEventListener' in document ) {
    document.addEventListener('DOMContentLoaded', function () {
        FastClick.attach( document.body );
    }, false );
}


( function ( $ ) {
      $( function () {
        var controller = new slidebars();
        controller.init();

        $( '.js-toggle-sb-left' ).on( 'click', function ( event ) {
          event.stopPropagation();
          event.preventDefault();
          controller.toggle( 'sb-left' );
        } );


        $( '.js-toggle-sb-right' ).on( 'click', function ( event ) {
          event.stopPropagation();
          event.preventDefault();
          controller.toggle( 'sb-right' );
        } );

        // Close any
        $( controller.events ).on( 'opened', function () {
            $( '[canvas="container"]' ).addClass( 'js-close-any-slidebar' );
        } );

        $( 'body' ).on( 'click', '.js-close-any-slidebar', function ( event ) {
          event.stopPropagation();
          controller.close();
        } );
        $( '.js-close-sb-left' ).on( 'click', function ( event ) {
          event.preventDefault();
          event.stopPropagation();
          controller.close( 'sb-left' );
        } );

      } )
      } ) ( jQuery );