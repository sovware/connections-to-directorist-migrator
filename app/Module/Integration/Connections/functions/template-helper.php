<?php

/**
 * Drectorist Migrator Connetions Get View
 * 
 * @return void|string Content
 */
function drectorist_migrator_connetions_get_view( $path = '', $data = [], $extract = true, $retutn = false ) {

    $base = dirname( dirname( __FILE__ ) ) . '/view/';
    $content = drectorist_migrator_get_view( $path, $data, $extract, true, $base );

    if ( $retutn ) {
        return $content;
    }

    echo $content;

}