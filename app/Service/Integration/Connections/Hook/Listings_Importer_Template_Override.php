<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Hook;

use Connections_To_Directorist_Migrator\Service\Integration\Connections\Helper\Listings_Data_Helper;
use Connections_To_Directorist_Migrator\Service\Integration\Connections\Model\Listings_Model;

class Listings_Importer_Template_Override {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {

        add_filter( 'directorist_migrator_total_importing_listings', [ $this, 'total_importing_listings' ], 20, 2 );
        add_filter( 'directorist_migrator_importing_listings_data_map', [ $this, 'importing_listings_data_map' ], 20, 2 );

    }


    /**
     * Total Importing Listings
     * 
     * @param int $total_listings
     * @param string $current_listing_import_source
     * 
     * @return int Total Listings
     */
    public function total_importing_listings( $total_listings = 0, $current_listing_import_source = '' ) {

        if ( DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID !== $current_listing_import_source ) {
            return $total_listings;
        }

        $atts = [ 'limit' => null ];
        $atts = apply_filters( 'directorist_migrator_total_listings_query_args', $atts, DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID );

        $listings = Listings_Model::get_listings( $atts );
        $total_listings = count( $listings );
        
        return $total_listings;
        
    }

    /**
     * Importing Listings Data Map
     * 
     * @param array $listings_data_map
     * @param string $current_listing_import_source
     * 
     * @return array Listings data map
     */
    public function importing_listings_data_map( $listings_data_map = [], $current_listing_import_source = '' ) {

        if ( DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID !== $current_listing_import_source ) {
            return $listings_data_map;
        }

        $atts = [ 'limit' => 1 ];
        $atts = apply_filters( 'directorist_migrator_listings_data_map_query_args', $atts, DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID );

        $listings = Listings_Model::get_listings( $atts );

        if ( empty( $listings ) ) {
            return [];
        }
        
        $importable_fields_map = Listings_Data_Helper::get_importable_fields_map();
        $listings_data_map['headers'] = $importable_fields_map;
        
        return $listings_data_map;

    }

    /**
     * Is preferred only
     * 
     * 
     */
    public function get_var_is_preferred_only() {

        return ( ! empty( $_REQUEST['is-preferred-only'] ) ) ? '1' : '0';

    }

}