<?php

use Connections_To_Directorist_Migrator\Controller;
use Connections_To_Directorist_Migrator\Service;
use Connections_To_Directorist_Migrator\Helper;

final class Connections_To_Directorist_Migrator {

    private static $instance;

    private function __construct() {

        // Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );

    }

    public static function get_instance() {
        if ( self::$instance === null ) {
            self::$instance = new Connections_To_Directorist_Migrator();
        }

        return self::$instance;
    }

    protected function get_controllers() {
        return [
            Controller\Init::class,
            Service\Init::class,
        ];
    }

    public function directorist_listings_import_template( $content, $step ) {
        return $content;
    }

    public function __clone() {
		// Cloning instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __('Cheatin&#8217; huh?', 'connections-to-directorist-migrator'), '1.0' );
	}

	public function __wakeup() {
		// Unserializing instances of the class is forbidden.
		_doing_it_wrong( __FUNCTION__, __('Cheatin&#8217; huh?', 'connections-to-directorist-migrator'), '1.0' );
	}

}