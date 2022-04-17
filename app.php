<?php

use Connections_To_Directorist_Migrator\Controller;
use Connections_To_Directorist_Migrator\Service;
use Connections_To_Directorist_Migrator\Helper;

final class Connections_To_Directorist_Migrator {

    private static $instance;

    private function __construct() {

        // Check Compatibility
        if ( version_compare( ATBDP_VERSION, '7.2.1', '<' ) ) {
            add_action( 'admin_notices', [ $this, 'show_incompatibility_notice' ], 1, 1 );
            return;
        }

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

    /**
	 * Show Incompatibility Notice
	 * 
     * @return void
	 */
    public function show_incompatibility_notice() {
        $title   = __( 'Directorist Update is Incomplete', 'connections-to-directorist-migrator' );
        $message = __( '<b>Connections to Directorist Migrator</b> extension requires <b>Directorist 7.2.1</b> or higher to work', 'connections-to-directorist-migrator' );

        ?>
        <div class="notice notice-error">
            <h3><?php echo $title; ?></h3>
            <p><?php echo $message; ?></p>
        </div>
        <?php
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