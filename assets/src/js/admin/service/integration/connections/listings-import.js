document.addEventListener( 'DOMContentLoaded', init, false );

const $ = jQuery;

function Tasks() {
    return {
        init: function() {
            this.onImportListingsFromOtherSourcesChange();
        },

        onImportListingsFromOtherSourcesChange: function() {
            $('.directorist-listing-import-source').on( 'change', function( e ) {
                const value = $( this ).children("option:selected").val();

                if ( 'connections' === value ) {
                    $( '.directorist-migrator-connections-is-preferred-only-field' ).removeClass( '--is-hidden' );
                } else {
                    $( '.directorist-migrator-connections-is-preferred-only-field' ).addClass( '--is-hidden' );
                }
            });
        },
    }
}

function init() {
    const tasks = new Tasks();
    tasks.init();
}

