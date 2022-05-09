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

    /**
     * Get Listings Max Repetitive Fields Count
     * 
     * @param string $field_name
     * @return int Max Repetitive Fields Count
     */
    public static function get_listings_max_repetitive_fields_count( $field_name = '' ) {
        global $wpdb;

        $repetitive_field_map = [
            'addresses'     => 'address',
            'dates'         => 'date',
            'email'         => 'email',
            'links'         => 'link',
            'im'            => 'messenger',
            'phone_numbers' => 'phone',
        ];

        if ( ! isset( $repetitive_field_map[ $field_name ] ) ) {
            return 0;
        }

        $table_name = $repetitive_field_map[ $field_name ];

        $sql = $wpdb->prepare( 
            "SELECT MAX(entry_count) max_entry 
            FROM ( 
                SELECT entry_id, COUNT(id) entry_count 
                FROM {$wpdb->prefix}connections_{$table_name}
                GROUP BY entry_id
            ) dt"
        );
        
        $result = $wpdb->get_results( $sql );

        if ( empty( $result ) ) {
            return 0;
        }

        return $result[0]->max_entry;
    }
}