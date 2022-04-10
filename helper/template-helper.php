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