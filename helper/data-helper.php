<?php

/**
 * Maybe JSON
 * 
 * @param mixed $data
 * @return mixed Data
 */
function directorist_migrator_maybe_json( $data ) {

    $data = maybe_unserialize( $data );

    if ( ! is_string( $data ) ) {
        return $data;
    }
    
    $maybe_joson = json_decode( $data, true ); 

    if ( is_null( $maybe_joson ) ) {
        return $data;
    }

    return $maybe_joson;
}