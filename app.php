<?php

use Directorist_Migrator\Controller;
use Directorist_Migrator\Module;
use Directorist_Migrator\Helper;

final class Directorist_Migrator {

    private static $instance;

    private function __construct() {

        // Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );

    }

    public static function get_instance() {
        if ( self::$instance === null ) {
            self::$instance = new Directorist_Migrator();
        }

        return self::$instance;
    }

    protected function get_controllers() {
        return [
            Controller\Init::class,
            Module\Init::class,
        ];
    }

    public function directorist_listings_import_template( $content, $step ) {
        return $content;
    }

    public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __('Cheatin&#8217; huh?', 'drectorist-migrator'), '1.0' );
	}

	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __('Cheatin&#8217; huh?', 'drectorist-migrator'), '1.0' );
	}

}