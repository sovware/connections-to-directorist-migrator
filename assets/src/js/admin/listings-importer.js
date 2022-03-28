// CSS
import './../../scss/admin/listings-importer.scss';

// JS
import './admin-main';

document.addEventListener( 'DOMContentLoaded', init, false );

const $ = jQuery;

function Tasks() {
    return {
        init: function() {
            this.handleListingsImportSourceNavLink();
        },

        handleListingsImportSourceNavLink: function() {
            const listingsImportSourceNavLinks = document.querySelectorAll( '.directorist-listings-import-nav-link' );

            if ( ! listingsImportSourceNavLinks ) {
                return;
            }

            [ ...listingsImportSourceNavLinks ].forEach( item => {
                item.addEventListener( 'click', function() {
                    const query_var_value = this.getAttribute( 'data-query-var-value' );

                    // Upldate Listing import source type
                    const listing_import_source_type = document.querySelector( '.listing-import-source-type' );
                    if ( listing_import_source_type ) {
                        listing_import_source_type.setAttribute( 'value', query_var_value );
                    }

                    // Update File Upload Required Status
                    const file_upload_field = document.querySelector( '#upload' );

                    if ( file_upload_field ) {
                        if ( 'other' === query_var_value ) {
                            file_upload_field.removeAttribute( 'required' );
                        } else {
                            file_upload_field.setAttribute( 'required', true );
                        }
                    }
                    
                    // Update Listings Import Sources Required Status
                    // const listings_import_sources = document.querySelector( '.directorist-listings-import-source' );
                    // const listings_import_sources = document.querySelector( '.directorist-listings-import-source' );

                    // const listings_import_sources = $( '.directorist-listings-import-sources' );

                    // console.log( 'log', { listings_import_sources } );

                    // if ( listings_import_sources ) {
                    //     if ( 'other' === query_var_value ) {
                    //         listings_import_sources.setAttr( 'required' ).trigger("change");
                    //         // listings_import_sources.setAttribute( 'required' );
                    //     } else {
                    //         // listings_import_sources.removeAttribute( 'required', true );
                    //         listings_import_sources.removeAttr( 'required' ).trigger("change");
                    //     }
                    // }
                });
            });
        },
    }
}

function init() {
    const tasks = new Tasks();
    tasks.init();
}

