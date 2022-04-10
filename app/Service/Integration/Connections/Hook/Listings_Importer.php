<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Hook;

use Connections_To_Directorist_Migrator\Service\Integration\Connections\Helper\Listings_Data_Helper;
use Connections_To_Directorist_Migrator\Service\Integration\Connections\Model\Listings_Model;

class Listings_Importer {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {
        add_filter( 'directorist_listings_importing_posts', [ $this, 'listings_importing_posts' ], 20, 4 );
    }


    /**
     * Listings Importing Posts
     * 
     * @param int $total_listings
     * @param string $current_listing_import_source
     * 
     * @return int Total Listings
     */
    public function listings_importing_posts( $posts = [], $position = 0, $limit = 20, $request = [] ) {

        $current_listing_import_source = ( isset( $request['listing_import_source'] ) ) ? $request['listing_import_source'] : '';

        if ( DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID !== $current_listing_import_source ) {
            return $posts;
        }

        $atts = [
            'offset' => $position,
            'limit'  => $limit,
        ];

        $posts = Listings_Model::get_listings( $atts );

        if ( empty( $posts ) ) {
            return $posts;
        }

        $importable_posts = [];

        foreach( $posts as $post ) {
            $importable_posts[] = Listings_Data_Helper::get_importable_fields( $post );
        }

        return $importable_posts;
    }

}