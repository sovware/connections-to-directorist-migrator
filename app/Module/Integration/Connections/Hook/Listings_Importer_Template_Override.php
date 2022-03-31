<?php

namespace Directorist_Migrator\Module\Integration\Connections\Hook;

use Directorist_Migrator\Module\Integration\Connections\Helper\Listings_Data_Helper;
use Directorist_Migrator\Module\Integration\Connections\Model\Listings_Model;

class Listings_Importer_Template_Override {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {
        add_filter( 'directorist_migrator_directory_source_list', [ $this, 'migrator_directory_source_list' ], 20, 1 );
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

        $importable_fields = Listings_Data_Helper::get_importable_fields( $listings[0] );
        $listings_data_map['headers'] = $importable_fields;
        
        return $listings_data_map;
    }


    /**
     * Migrator Directory Source List
     * 
     * @param array $source_list
     * @return array $source_list
     */
    public function migrator_directory_source_list( $directory_source_list = [] ) {

        $directory_source = [];
        $directory_source['value'] = DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID; 
        $directory_source['label'] = __( 'Connections', 'directorist-migrator' ); 
        $directory_source_list[] = $directory_source;

        return $directory_source_list;
    }

}