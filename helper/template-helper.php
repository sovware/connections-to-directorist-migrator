<?php

/**
 * Drectorist Migrator Get Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract_data
 * @param string $base_path
 * 
 * @return void Prints Template
 */
function connections_to_directorist_migrator_get_the_template( $path = '', $data = [], $extract_data = true, $base_path = CONNECTIONS_TO_DIRECTORIST_MIGRATOR_TEMPLATE_PATH ) {

    $file = $base_path . $path . '.php';

    if ( ! file_exists( $file ) ) {
        return;
    }

    if ( $extract_data ) {
        extract( $data );
    }
    
    include $file;
}

/**
 * Drectorist Migrator Get Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract_data
 * @param string $base_path
 * 
 * @return string Template
 */
function connections_to_directorist_migrator_get_template( $path = '', $data = [], $extract_data = true, $base_path = CONNECTIONS_TO_DIRECTORIST_MIGRATOR_TEMPLATE_PATH ) {
    
    ob_start();
    
    connections_to_directorist_migrator_get_the_template( $path, $data, $extract_data, $base_path );

    return ob_get_clean();
}


/**
 * Drectorist Migrator Get View
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract_data
 * @param string $base_path
 * 
 * @return void Template
 */
function connections_to_directorist_migrator_get_the_view( $path = '', $data = [], $extract_data = true, $base_path = CONNECTIONS_TO_DIRECTORIST_MIGRATOR_VIEW_PATH ) {

    $file = $base_path . $path . '.php';

    if ( ! file_exists( $file ) ) {
        return 'jshds';
    }

    if ( $extract_data ) {
        extract( $data );
    }
    
    include $file;
}

/**
 * Drectorist Migrator Get View
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract_data
 * @param string $base_path
 * 
 * @return void|string Template
 */
function connections_to_directorist_migrator_get_view( $path = '', $data = [], $extract_data = true, $base_path = CONNECTIONS_TO_DIRECTORIST_MIGRATOR_VIEW_PATH ) {

    ob_start();
    
    connections_to_directorist_migrator_get_the_view( $path, $data, $extract_data, $base_path );

    return ob_get_clean();
}


/**
 * Include all files from a given directory
 * 
 * @param string $dir_path
 * @return void
 */
function connections_to_directorist_migrator_include_dir_files( $dir_path = '' ) {
    $files = scandir( $dir_path );

    if ( empty( $files ) ) {
        return;
    }

    $dir_path = $dir_path . '/';

    foreach( $files as $file ) {
        if ( ! preg_match( '/(\.php)$/', $file ) ) {
            continue;
        }

        if ( ! file_exists( $dir_path . $file ) ) {
            continue;
        }
        
        include $dir_path . $file;
    }
}

/**
 * Connections To Directorist Migrator Maybe Selected
 * 
 * @param mixed $value_1
 * @param mixed $value_2
 * @return string
 */
function c2dm_maybe_selected_importing_listings_map_field( $listing_field_key, $map_field_key ) {

    $map = [];

    $map['ts']             = 'publish_date';
    $map['categories']     = 'category';
    $map['listing_status'] = 'listing_status';
    $map['full_name']      = 'listing_title';
    $map['bio']            = 'listing_content';
    $map['social']         = 'social';
    $map['image']          = 'listing_img';
    
    $map['links_[item_0_key_address]'] = 'website';
    $map['email_[item_0_key_address]'] = 'email';

    $map['phone_numbers_[item_0_key_number]'] = 'phone';
    $map['phone_numbers_[item_1_key_number]'] = 'phone2';

    $map['addresses_[item_0_key_line_1]']    = 'address';
    $map['addresses_[item_0_key_zipcode]']   = 'zip';
    $map['addresses_[item_0_key_latitude]']  = 'manual_lat';
    $map['addresses_[item_0_key_longitude]'] = 'manual_lng';

    $map = apply_filters( 'connections_to_directorist_migrator_listings_field_map', $map, $listing_field_key, $map_field_key );


    if ( empty( $map[ $listing_field_key ] ) ) {
        return '';
    }

    $field_key = $map[ $listing_field_key ];

    echo ( $field_key === $map_field_key ) ? 'selected' : '';
}

/**
 * Connections To Directorist Migrator Maybe Selected
 * 
 * @param mixed $value_1
 * @param mixed $value_2
 * @return string
 */
function c2dm_maybe_selected( $value_1, $value_2 ) {
    echo ( $value_1 === $value_2 ) ? 'selected' : '';
}