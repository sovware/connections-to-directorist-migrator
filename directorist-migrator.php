<?php
/**
 * Directorist_Migrator
 *
 * @package           Directorist_Migrator
 * @author            wpWax
 * @copyright         2022 wpWax
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Directorist Migrator
 * Plugin URI:        https://github.com/sovware/drectorist-migrator
 * Description:       Directorist Migrator extension
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            wpWax
 * Author URI:        https://github.com/sovware
 * Text Domain:       drectorist-migrator
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://github.com/sovware/drectorist-migrator
 */

require dirname( __FILE__ ) . '/vendor/autoload.php';
require dirname( __FILE__ ) . '/app.php';

if ( ! function_exists( 'Directorist_Migrator' ) ) {
    function Directorist_Migrator() {
        return Directorist_Migrator::get_instance();
    }
}

add_action( 'directorist_loaded', 'Directorist_Migrator' );




