<?php

namespace Directorist_Migrator\Controller\Asset;

class PublicAsset extends AssetEnqueuer {
	
	/**
	 * Constuctor
	 * 
	 */
	function __construct() {
		$this->asset_group = 'public';
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
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

		// $scripts['drectorist-migrator-public-main-style'] = [
		// 	'file_name' => 'public-main',
		// 	'base_path' => DRECTORIST_MIGRATOR_CSS_PATH,
		// 	'deps'      => [],
		// 	'ver'       => $this->script_version,
		// 	'group'     => 'public',
		// ];

		$scripts['drectorist-migrator-public-main-style'] = [
			'file_name' => 'public-main',
			'base_path' => DRECTORIST_MIGRATOR_CSS_PATH,
			'deps'      => [],
			'ver'       => $this->script_version,
			'group'     => 'public',
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

		// $scripts['drectorist-migrator-public-script'] = [
		// 	'file_name'     => 'public-main',
		// 	'base_path'     => DRECTORIST_MIGRATOR_JS_PATH,
		// 	'deps'          => '',
		// 	'ver'           => $this->script_version,
		// 	'group'         => 'public',
		// ];

		$scripts['drectorist-migrator-public-script'] = [
			'file_name'     => 'public-main',
			'base_path'     => DRECTORIST_MIGRATOR_JS_PATH,
			'deps'          => '',
			'ver'           => $this->script_version,
			'group'         => 'public',
		];

		$scripts = array_merge( $this->js_scripts, $scripts);
		$this->js_scripts = $scripts;
	}
}