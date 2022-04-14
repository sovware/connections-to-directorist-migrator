<?php

namespace Connections_To_Directorist_Migrator\Controller\Asset;

use Connections_To_Directorist_Migrator\Service;

class AdminAsset extends AssetEnqueuer {
	
	/**
	 * Constuctor
	 * 
	 */
	function __construct() {
		$this->asset_group = 'admin';
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

    /**
	 * Load Admin CSS Scripts
	 *
	 * @return void
	 */
	public function load_scripts() {
        $this->add_css_scripts();
        $this->add_js_scripts();
    }

	/**
	 * Load Admin CSS Scripts
	 *
	 * @return void
	 */
	public function add_css_scripts() {
		$scripts = [];

		// $scripts['connections-to-directorist-migrator-admin-main-style'] = [
		// 	'file_name' => 'admin-main',
		// 	'base_path' => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_CSS_PATH,
		// 	'deps'      => [],
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'admin',
		// ];

		// $scripts['connections-to-directorist-migrator-admin-main-style'] = [
		// 	'file_name' => 'admin-main',
		// 	'base_path' => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_CSS_PATH,
		// 	'deps'      => [],
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'admin',
		// ];

		$scripts['connections-to-directorist-migrator-listings-importer-style'] = [
			'file_name' => 'listings-importer',
			'base_path' => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_CSS_PATH,
			'deps'      => [],
			'ver'       => $this->script_version,
			'group'     => 'admin',
			'page'      => [ 'posts_page_tools', 'at_biz_dir_page_tools' ],
		];

		$scripts = array_merge( $this->css_scripts, $scripts);
		$this->css_scripts = $scripts;
	}

	/**
	 * Load Admin JS Scripts
	 *
	 * @return void
	 */
	public function add_js_scripts() {
		$scripts = [];

		// $scripts['connections-to-directorist-migrator-admin-main-script'] = [
		// 	'file_name'     => 'admin-main',
		// 	'base_path'     => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_JS_PATH,
		// 	'deps'          => '',
		// 	'ver'           => $this->script_version,
		// 	'group'         => 'admin',
		// ];

		// $scripts['connections-to-directorist-migrator-admin-main-script'] = [
		// 	'file_name' => 'admin-main',
		// 	'base_path' => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_JS_PATH,
		// 	'deps'      => '',
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'admin',
		// ];

		$scripts['connections-to-directorist-migrator-listings-importer'] = [
			'file_name' => 'listings-importer',
			'base_path' => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_JS_PATH,
			'ver'       => $this->script_version,
			'group'     => 'admin',
			'page'      => [ 'posts_page_tools', 'at_biz_dir_page_tools' ],
		];

		$scripts['connections-to-directorist-migrator-service-integration-connections-all-listings-page'] = [
			'file_name' => 'service-integration-connections-all-listings-page',
			'base_path' => CONNECTIONS_TO_DIRECTORIST_MIGRATOR_JS_PATH,
			'ver'       => $this->script_version,
			'group'     => 'admin',
			'enqueue'   => false,
		];

		$scripts = array_merge( $this->js_scripts, $scripts);
		$this->js_scripts = $scripts;
	}
}