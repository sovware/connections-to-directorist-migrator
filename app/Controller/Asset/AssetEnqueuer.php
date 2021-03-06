<?php

namespace Connections_To_Directorist_Migrator\Controller\Asset;

use Connections_To_Directorist_Migrator\Utility\Enqueuer;

abstract class AssetEnqueuer extends Enqueuer {

	public $asset_group = 'public';

	/**
	 * Load Scripts
	 *
	 * @return void
	 */
	abstract public function load_scripts();

	/**
	 * Enqueue Scripts
	 *
	 * @return void
	 */
	public function enqueue_scripts( $page = '' ) {

		// Set Script Version
		$this->setup_load_min_files();

		// Set Script Version
		$this->setup_script_version();

		// Load Script
		$this->load_scripts();

		// Apply Hook to Scripts
		$this->apply_hook_to_scripts();

		// CSS
		$this->register_css_scripts();
		$this->enqueue_css_scripts_by_group( [ 'group' => $this->asset_group, 'page' => $page ] );

		// JS
		$this->register_js_scripts();
		$this->enqueue_js_scripts_by_group( [ 'group' => $this->asset_group, 'page' => $page ] );
	}

	/**
	 * Load min files
	 *
	 * @return void
	 */
	public function setup_load_min_files() {
		$this->load_min = apply_filters( 'CONNECTIONS_TO_DIRECTORIST_MIGRATOR_load_min_files',  CONNECTIONS_TO_DIRECTORIST_MIGRATOR_LOAD_MIN_FILES );
	}

	/**
	 * Set Script Version
	 *
	 * @return void
	 */
	public function setup_script_version() {
		$script_version = ( $this->load_min ) ? CONNECTIONS_TO_DIRECTORIST_MIGRATOR_SCRIPT_VERSION : md5( time() );
		$this->script_version = apply_filters( 'CONNECTIONS_TO_DIRECTORIST_MIGRATOR_script_version', $script_version );
	}

	/**
	 * Apply Hook to Scripts
	 *
	 * @return void
	 */
	public function apply_hook_to_scripts() {
		$this->css_scripts = apply_filters( 'CONNECTIONS_TO_DIRECTORIST_MIGRATOR_css_scripts', $this->css_scripts );
		$this->js_scripts = apply_filters( 'CONNECTIONS_TO_DIRECTORIST_MIGRATOR_js_scripts', $this->js_scripts );
	}
}