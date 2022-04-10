<?php

/**
 * Drectorist Migrator Get Template
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract_data
 * @param bool $retutn
 * @param string $base_path
 * 
 * @return void|string Template
 */
function connections_to_directorist_migrator_get_template( $path = '', $data = [], $extract_data = true, $retutn = false, $base_path = CONNECTIONS_TO_DIRECTORIST_MIGRATOR_TEMPLATE_PATH ) {

    $file = $base_path . $path . '.php';

    if ( ! file_exists( $file ) ) {
        return;
    }

    if ( $extract_data ) {
        extract( $data );
    }

    ob_start();
    
    include $file;

    $content = ob_get_clean();

    if ( $retutn ) {
        return $content;
    }

    wp_kses_post( $content );
}

/**
 * Drectorist Migrator Get View
 * 
 * @param string $path
 * @param array $data
 * @param bool $extract_data
 * @param bool $retutn
 * @param string $base_path
 * 
 * @return void|string Template
 */
function connections_to_directorist_migrator_get_view( $path = '', $data = [], $extract_data = true, $retutn = false, $base_path = CONNECTIONS_TO_DIRECTORIST_MIGRATOR_VIEW_PATH ) {

    $file = $base_path . $path . '.php';

    if ( ! file_exists( $file ) ) {
        return;
    }

    if ( $extract_data ) {
        extract( $data );
    }

    ob_start();
    
    include $file;

    $content = ob_get_clean();

    if ( $retutn ) {
        return $content;
    }

    wp_kses_post( $content );
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