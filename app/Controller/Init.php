<?php

namespace Directorist_Migrator\Controller;

use Directorist_Migrator\Helper;

class Init {
    
    public function __construct() {
        // Register Controllers
        $controllers = $this->get_controllers();
        Helper\Serve::register_services( $controllers );
    }

    protected function get_controllers() {
        return [
            Asset\Init::class,
            Hook\Init::class,
        ];
    }

}