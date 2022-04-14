<?php

namespace Connections_To_Directorist_Migrator\Helper;

class Links {

    /**
     * Get Listings Migration Mapping Page Url
     * 
     * @return string URL
     */
    public static function get_listings_migration_mapping_page_url() {

        return admin_url( 'edit.php?post_type=at_biz_dir&page=tools&step=2&file&delimiter=%2C&listing-import-source-type=other&listing-import-source=connections' );

    }

}