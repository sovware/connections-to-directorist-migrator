<?php

function drectorist_migrator_get_template( string $path = '', array $data = [], bool $extract = true, $retutn = false ) {

    $file = DRECTORIST_MIGRATOR_TEMPLATE_PATH . $path . '.php';

    if ( ! file_exists( $file ) ) {
        return;
    }

    if ( $extract ) {
        extract( $data );
    }

    ob_start();
    
    include $file;

    $content = ob_get_clean();

    if ( $retutn ) {
        return $content;
    }

    echo $content;
}

function drectorist_migrator_get_view( string $path = '', array $data = [], bool $extract = true, $retutn = false ) {

    $file = DRECTORIST_MIGRATOR_VIEW_PATH . $path . '.php';

    if ( ! file_exists( $file ) ) {
        return;
    }

    if ( $extract ) {
        extract( $data );
    }

    ob_start();
    
    include $file;

    $content = ob_get_clean();

    if ( $retutn ) {
        return $content;
    }

    echo $content;
}