<?php

namespace Connections_To_Directorist_Migrator\Controller\Hook;

class Listings_Importer_Template_Override {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {

        add_filter( 'directorist_listings_importer_body_template', [ $this, 'listings_importer_body_template_step_2' ], 20, 2 );

    }

    /**
     * Listings Importer Body Template ( Step 2 )
     * 
     * @param string $content
     * @param int $step
     * 
     * @return string $content
     */
    public function listings_importer_body_template_step_2( $content = '', $template_data = [] ) {

        if ( 2 !== $template_data['step'] ) {
            return $content;
        }
        
        $current_listing_import_source_type = $this->get_current_listing_import_source_type();

        if ( 'other' !== $current_listing_import_source_type ) {
            return $content;
        }

        $current_listing_import_source = $this->get_current_listing_import_source();

        $total_listings = apply_filters( 'directorist_migrator_total_importing_listings', 0, $current_listing_import_source );

        $listings_data_map = apply_filters( 'directorist_migrator_importing_listings_data_map', [
            'headers' => [],
            'fields'  => $template_data['controller']->importable_fields,
        ], $current_listing_import_source );

        if ( empty( $listings_data_map['headers'] ) || ! is_array( $listings_data_map['headers'] ) ) {
            $listings_data_map['headers'] = [];
        }

        if ( empty( $listings_data_map['fields'] ) || ! is_array( $listings_data_map['fields'] ) ) {
            $listings_data_map['fields'] = [];
        }

        $template_data['controller']         = $this;
        $template_data['total_listings']     = $total_listings;
        $template_data['documentation_link'] = 'https://directorist.com/documentation/extensions';
        $template_data['listings_data_map']  = $listings_data_map;

        return connections_to_directorist_migrator_get_view( 'listings-importer/body-templates/step-2', $template_data, false );
    }

    /**
     * Listings Importer Listings Data Map Table Template
     * 
     * @param array $template_data
     * @param bool $return
     * 
     * @return string $tempate
     */
    public function listings_importer_listings_data_map_table_template( $template_data = [] ) {

        $template_data['controller'] = $this;

        connections_to_directorist_migrator_get_the_view( 'listings-importer/tables/listings-data-map-table', $template_data, false );

    }

    /**
     * Get Current Listing Import Source Type
     * 
     * @return string
     */
    public function get_current_listing_import_source_type() {
        return isset( $_REQUEST['listing-import-source-type'] ) ? sanitize_text_field( $_REQUEST['listing-import-source-type'] ) : 'csv-file';
    }

    /**
     * Get Current Listing Import Source
     * 
     * @return string
     */
    public function get_current_listing_import_source() {
        return isset( $_REQUEST['listing-import-source'] ) ? sanitize_text_field( $_REQUEST['listing-import-source'] ) : '';
    }

}