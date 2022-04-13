<?php
/**
 * Connections_To_Directorist_Migrator
 *
 * @package           Connections_To_Directorist_Migrator
 * @author            wpWax
 * @copyright         2022 wpWax
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Connections to Directorist Migrator
 * Plugin URI:        https://github.com/sovware/connections-to-directorist-migrator
 * Description:       Connections to Directorist Migrator is a migrator plugin that moves your listings data from Connections Business Directory to Directorist.
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            wpWax
 * Author URI:        https://github.com/sovware
 * Text Domain:       connections-to-directorist-migrator
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

require dirname( __FILE__ ) . '/vendor/autoload.php';
require dirname( __FILE__ ) . '/app.php';

if ( ! function_exists( 'Connections_To_Directorist_Migrator' ) ) {
    function Connections_To_Directorist_Migrator() {
        return Connections_To_Directorist_Migrator::get_instance();
    }
}

add_action( 'directorist_loaded', 'Connections_To_Directorist_Migrator' );




