<?php

/**
 * Drectorist Migrator Connetions Get The View
 * 
 * @return void Content
 */
function connections_to_directorist_migrator_connetions_get_the_view( $path = '', $data = [], $extract = true ) {
    
    $base = dirname( dirname( __FILE__ ) ) . '/view/';

    connections_to_directorist_migrator_get_the_view( $path, $data, $extract, $base );

}

/**
 * Drectorist Migrator Connetions Get View
 * 
 * @return string Content
 */
function connections_to_directorist_migrator_connetions_get_view( $path = '', $data = [], $extract = true ) {

    ob_start();

    connections_to_directorist_migrator_connetions_get_the_view( $path, $data, $extract );

    return ob_get_clean();
}


