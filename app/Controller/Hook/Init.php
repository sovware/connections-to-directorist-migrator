<?php

namespace Connections_To_Directorist_Migrator\Controller\Hook;

use Connections_To_Directorist_Migrator\Helper;

class Init {
    
    public function __construct() {
        // Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );
    }

    protected function get_controllers() {
        return [
            Listings_Importer_Template_Override::class,
        ];
    }

}