<?php

if ( ! defined( 'DRECTORIST_MIGRATOR_VERSION' ) ) {
    define( 'DRECTORIST_MIGRATOR_VERSION', '1.0.0' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_SCRIPT_VERSION' ) ) {
    define( 'DRECTORIST_MIGRATOR_SCRIPT_VERSION', DRECTORIST_MIGRATOR_VERSION );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_FILE' ) ) {
    define( 'DRECTORIST_MIGRATOR_FILE', dirname( dirname( __FILE__ ) ) . '/drectorist-migrator.php' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_BASE' ) ) {
    define( 'DRECTORIST_MIGRATOR_BASE', dirname( dirname( __FILE__ ) ) . '/' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_POST_TYPE' ) ) {
    define( 'DRECTORIST_MIGRATOR_POST_TYPE', 'drectorist-migrator' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_TEMPLATE_PATH' ) ) {
    define( 'DRECTORIST_MIGRATOR_TEMPLATE_PATH', DRECTORIST_MIGRATOR_BASE . 'template/' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_VIEW_PATH' ) ) {
    define( 'DRECTORIST_MIGRATOR_VIEW_PATH', DRECTORIST_MIGRATOR_BASE . 'view/' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_URL' ) ) {
    define( 'DRECTORIST_MIGRATOR_URL', plugin_dir_url( DRECTORIST_MIGRATOR_FILE ) );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_ASSET_URL' ) ) {
    define( 'DRECTORIST_MIGRATOR_ASSET_URL', DRECTORIST_MIGRATOR_URL . 'assets/dist/' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_JS_PATH' ) ) {
    define( 'DRECTORIST_MIGRATOR_JS_PATH',  DRECTORIST_MIGRATOR_ASSET_URL . 'js/' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_CSS_PATH' ) ) {
    define( 'DRECTORIST_MIGRATOR_CSS_PATH', DRECTORIST_MIGRATOR_ASSET_URL . 'css/' );
}

if ( ! defined( 'DRECTORIST_MIGRATOR_LOAD_MIN_FILES' ) ) {
    define( 'DRECTORIST_MIGRATOR_LOAD_MIN_FILES', ! SCRIPT_DEBUG );
}