<?php

namespace Directorist_Migrator\Module\Integration\Connections;

use Directorist_Migrator\Helper;
use Directorist_Migrator\Module\Integration\Connections;

class Init {
    
    public function __construct() {
        add_action( 'plugins_loaded', [ $this, 'setup' ] );
    }

    /**
     * Setup
     */
    public function setup() {
        if ( ! is_plugin_active( 'connections/connections.php' ) ) {
            return;
        }

        $this->Init();
    }

    /**
     * Init
     * 
     * @return void
     */
    public function Init() {

        // Define Const
        $this->define_const();

        // Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );

    }

    /**
     * Get Controllers
     * 
     * @return array $controllers
     */
    protected function get_controllers() {
        return [
            Connections\Hook\Init::class,
        ];
    }

    /**
     * Define Const
     * 
     * @return void
     */
    protected function define_const() {
        
        defined( 'DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID' ) || define( 'DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID', 'connections' );
        
    }

}