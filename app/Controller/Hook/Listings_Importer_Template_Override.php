<?php

namespace Connections_To_Directorist_Migrator\Controller\Hook;

class Listings_Importer_Template_Override {

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct() {

        add_filter( 'directorist_listings_importer_header_nav_menu', [ $this, 'listings_importer_header_nav_menu' ], 20, 2 );
        add_filter( 'directorist_listings_importer_body_template', [ $this, 'listings_importer_body_template_step_1' ], 20, 2 );
        add_filter( 'directorist_listings_importer_body_template', [ $this, 'listings_importer_body_template_step_2' ], 20, 2 );
        add_filter( 'directorist_listings_import_form_submit_redirect_params', [ $this, 'listings_import_form_submit_redirect_params' ], 20, 2 );

    }

    /**
     * Listings Import Form Submit Redirect Params
     * 
     * @param array $params
     * 
     * @return array $params
     */
    public function listings_import_form_submit_redirect_params( $params = [] ) {

        $params['listing-import-source-type'] = $this->get_current_listing_import_source_type();
        $params['listing-import-source'] = $this->get_current_listing_import_source();
        
        return $params;
    }

    /**
     * listings_importer_header_nav_menu
     * 
     * @param array $nav_menu
     * 
     * @return array $nav_menu
     */
    public function listings_importer_header_nav_menu( $nav_menu = [] ) {

        if ( empty( $nav_menu ) ) {
            return $nav_menu;
        }

        $nav_menu[ 0 ][ 'label' ] = __( 'Import Listings or Upload CSV file', 'connections-to-directorist-migrator' );

        return $nav_menu;
    }
    
    /**
     * Listings Importer Body Template ( Step 1 )
     * 
     * @param string $content
     * 
     * @return string $content
     */
    public function listings_importer_body_template_step_1( $content = '', $template_data = [] ) {

        if ( 1 !== $template_data['step'] ) {
            return $content;
        }

        $template_data['controller'] = $this;

        $bytes = apply_filters('import_upload_size_limit', wp_max_upload_size());
        $template_data['size'] = size_format( $bytes );
        $template_data['upload_dir'] = wp_upload_dir();
        $template_data['current_listing_import_source_type'] = $this->get_current_listing_import_source_type();
        $template_data['listing_import_source_navigation'] = $this->get_listings_importer_source_navigation();
        $template_data['get_listings_importer_directory_source_list'] = $this->get_listings_importer_directory_source_list();

        return connections_to_directorist_migrator_get_view( 'listings-importer/body-templates/step-1', $template_data, false );
    }

    /**
     * Listings Importer Body Template ( Step 2 )
     * 
     * @param string $content
     * @param int $step
     * 
     * @return string $content
     */
    public function listings_importer_body_template_step_2( $content = '', $template_data = [] ) {

        if ( 2 !== $template_data['step'] ) {
            return $content;
        }
        
        $current_listing_import_source_type = $this->get_current_listing_import_source_type();

        if ( 'other' !== $current_listing_import_source_type ) {
            return $content;
        }

        $current_listing_import_source = $this->get_current_listing_import_source();

        $total_listings = apply_filters( 'directorist_migrator_total_importing_listings', 0, $current_listing_import_source );

        $listings_data_map = apply_filters( 'directorist_migrator_importing_listings_data_map', [
            'headers' => [],
            'fields'  => $template_data['controller']->importable_fields,
        ], $current_listing_import_source );

        if ( empty( $listings_data_map['headers'] ) || ! is_array( $listings_data_map['headers'] ) ) {
            $listings_data_map['headers'] = [];
        }

        if ( empty( $listings_data_map['fields'] ) || ! is_array( $listings_data_map['fields'] ) ) {
            $listings_data_map['fields'] = [];
        }

        $template_data['controller']        = $this;
        $template_data['total_listings']    = $total_listings;
        $template_data['listings_data_map'] = $listings_data_map;

        return connections_to_directorist_migrator_get_view( 'listings-importer/body-templates/step-2', $template_data, false );
    }

    /**
     * Listings Importer Listings Source Selection Template
     * 
     * @param array $template_data
     * @param bool $return
     * 
     * @return string $tempate
     */
    public function listings_importer_listings_source_selection_template( $template_data = [] ) {

        $template_data['controller'] = $this;
        $template_data['listing_source_tab_contents'] = $this->get_listings_importer_listing_source_tab_contents();

        connections_to_directorist_migrator_get_the_view( 'listings-importer/listings-source-selection/listings-source-selection', $template_data, false );

    }

    /**
     * Listings Importer Listings Data Map Table Template
     * 
     * @param array $template_data
     * @param bool $return
     * 
     * @return string $tempate
     */
    public function listings_importer_listings_data_map_table_template( $template_data = [] ) {

        $template_data['controller'] = $this;

        connections_to_directorist_migrator_get_the_view( 'listings-importer/tables/listings-data-map-table', $template_data, false );

    }

    /**
     * Listings Importer Source Navigation Item Template
     * 
     * @param array $template_data
     * @param bool $return
     * 
     * @return string $tempate
     */
    public function listings_importer_source_navigation_item_template( $template_data = [] ) {

        $template_data['controller'] = $this;
        
        connections_to_directorist_migrator_get_the_view( 'listings-importer/listings-source-selection/tab-navigation/nav-item', $template_data, false );

    }

    /**
     * Listings Importer Source Tab Item Template
     * 
     * @param array $template_data
     * @param bool $return
     * 
     * @return string Tempate
     */
    public function listings_importer_source_tab_item_template( $template_data = [] ) {

        $template_data['controller'] = $this;

        $path = ( $template_data['path'] ) ? $template_data['path'] : '';

        connections_to_directorist_migrator_get_the_view( "listings-importer/listings-source-selection/tab-contents/${path}", $template_data, false );

    }

    /**
     * Get listings importer directory source list
     * 
     * @return array $directory_source_list
     */
    public function get_listings_importer_directory_source_list() {
        $directory_source_list = [];
        $directory_source_list = apply_filters( 'directorist_migrator_directory_source_list', $directory_source_list );

        return $directory_source_list;
    }

    /**
     * Get Listings Importer Source Navigation
     * 
     * @return array $nav
     */
    public function get_listings_importer_source_navigation() {
        $nav = [];

        $current_listing_import_source_type = $this->get_current_listing_import_source_type();

        // Item 1
        $nav_item = [];

        $nav_item['active_class']    = ( 'csv-file' === $current_listing_import_source_type ) ? ' --is-active' : '';
        $nav_item['icon']            = '<span class="fas fa-file-csv"></span>';
        $nav_item['label']           = __( 'Select CSV file', 'directorist-migrator' );
        $nav_item['tab']             = 'directorist-csv-import-tab';
        $nav_item['query_var_value'] = 'csv-file';

        $nav [] = $nav_item;

        // Item 2
        $nav_item = [];

        $nav_item['active_class']    = ( 'other' === $current_listing_import_source_type ) ? ' --is-active' : '';
        $nav_item['icon']            = '<span class="fas fa-file-import"></span>';
        $nav_item['label']           = __( 'Import listings from other source', 'directorist-migrator' );
        $nav_item['tab']             = 'directorist-directory-import-tab';
        $nav_item['query_var_value'] = 'other';

        $nav [] = $nav_item;

        $nav = apply_filters( 'directorist_migrator_listings_import_source_navigation', $nav, $current_listing_import_source_type );

        return $nav;
    }

    /**
     * Get Listings Importer Listing Source Tab Contents
     * 
     * @return string Tab Contents
     */
    public function get_listings_importer_listing_source_tab_contents() {
        $contents = [];

        $current_listing_import_source_type = $this->get_current_listing_import_source_type();

        // Item 1
        $content_item = [];
        $content_item['path'] = 'tab-1';
        $content_item['active_class'] = ( 'csv-file' === $current_listing_import_source_type ) ? ' --is-active' : '';
        $contents [] = $content_item;

        // Item 2
        $content_item = [];
        $content_item['path'] = 'tab-2';
        $content_item['active_class'] = ( 'other' === $current_listing_import_source_type ) ? ' --is-active' : '';
        $contents [] = $content_item;

        return $contents;
    }

    /**
     * Get Current Listing Import Source Type
     * 
     * @return string
     */
    public function get_current_listing_import_source_type() {
        return isset( $_REQUEST['listing-import-source-type'] ) ? esc_attr( $_REQUEST['listing-import-source-type'] ) : 'csv-file';
    }

    /**
     * Get Current Listing Import Source
     * 
     * @return string
     */
    public function get_current_listing_import_source() {
        return isset( $_REQUEST['listing-import-source'] ) ? esc_attr( $_REQUEST['listing-import-source'] ) : '';
    }

}