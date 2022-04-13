<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Hook;

class Settings_Panel {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {

        add_filter( 'atbdp_listing_type_settings_field_list', [ $this, 'extend_settings_panel_fields' ] );
        add_filter( 'atbdp_extension_settings_submenu', [ $this, 'extend_settings_panel_sections' ] );
        
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
            'button-label'    => __( 'Run Importer', 'directorist' ),
            'url'             => admin_url( 'edit.php?post_type=at_biz_dir&page=tools&step=2&file&delimiter=%2C&listing-import-source-type=other&listing-import-source=connections' ),
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
            'icon' => '<i class="fa fa-home"></i>',
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