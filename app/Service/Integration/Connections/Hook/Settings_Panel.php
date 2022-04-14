<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Hook;

use Connections_To_Directorist_Migrator\Helper\Links;

class Settings_Panel {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {

        add_filter( 'atbdp_listing_type_settings_field_list', [ $this, 'extend_settings_panel_fields' ] );
        add_filter( 'atbdp_tools_submenu', [ $this, 'extend_settings_panel_sections' ] );
        
    }

    /**
     * Extend Settings Panel Fields
     * 
     * @param $fields Fields
     * @return array Fields
     */
    public function extend_settings_panel_fields( $fields = [] ) {

        $fields[ 'new_field' ] = [
            'type'            => 'button',
            'label'           => __( 'Import Listings', 'directorist' ),
            'button-label'    => __( 'Run Migrator', 'directorist' ),
            'url'             => Links::get_listings_migration_mapping_page_url(),
            'open-in-new-tab' => true,
        ];

        return $fields;
    }

    /**
     * Extend Settings Panel Sections
     * 
     * @param $sections Sections
     * @return array $sections
     */
    public function extend_settings_panel_sections( $sections = [] ) {

        $sections['new_section'] = [
            'label' => __('Connections to Directorist Migration', 'directorist'),
            'icon' => '<i class="fas fa-sync-alt"></i>',
            'sections' => [
                'general_settings' => [
                    'fields' => [
                         'new_field'
                    ],
                ],
            ],
        ];
        
        return $sections;
    }

}