<?php

namespace Directorist_Migrator\Controller\Asset;

use Directorist_Migrator\Helper;

class Init {
	
	/**
	 * Constuctor
	 * 
	 */
	function __construct() {

		// Register Enqueuers
        $enqueuers = $this->get_assets_enqueuers();
        Helper\Serve::register_services( $enqueuers );

	}

	private function get_assets_enqueuers() {
        return [
            AdminAsset::class,
            PublicAsset::class,
        ];
    }
}