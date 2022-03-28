<?php

namespace Directorist_Migrator\Module\Integration\Connections\Model;

class Listings_Model {

    /**
     * Get total listings
     * 
     * @return int total listings
     */
    public static function get_total_listings() {

        return 10;

    }

    /**
     * Get Listings Fields
     * 
     * @return array Listings Fields
     */
    public static function get_listings() {

        $fields = [];
        $fields['title'] = 'Listing Title';
        $fields['description'] = 'Listing Description';
        

        return $fields;

    }
}