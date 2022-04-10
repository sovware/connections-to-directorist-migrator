<?php

/**
 * Drectorist Migrator Connetions Get View
 * 
 * @return void|string Content
 */
function connections_to_directorist_migrator_connetions_get_view( $path = '', $data = [], $extract = true, $retutn = false ) {

    $base = dirname( dirname( __FILE__ ) ) . '/view/';
    $content = connections_to_directorist_migrator_get_view( $path, $data, $extract, true, $base );

    if ( $retutn ) {
        return $content;
    }

    wp_kses_post( $content );
}