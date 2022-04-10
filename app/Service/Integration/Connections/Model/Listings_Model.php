<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Model;

class Listings_Model {

    /**
     * Get Listings
     * 
     * @param array $atts
     * @return array Listings
     */
    public static function get_listings( $atts = [] ) {

        $default = [
            'status' => [ 'approved, pending' ],
            'limit'  => 10,
        ];

        $atts = array_merge( $default, $atts );

        $atts = apply_filters( 'directorist_migrator_listings_query_args', $atts, DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID );

        $instance = Connections_Directory();
        $results  = $instance->retrieve->entries( $atts );
        
        return $results;
    }
}