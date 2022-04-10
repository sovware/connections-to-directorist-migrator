<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Helper;

class Listings_Data_Helper {

    /**
     * Get importable fields
     * 
     * @param object $fields
     * @return array Fields
     */
    public static function get_importable_fields( $all_fields, $prefered_only_when_has_multiple_item = true ) {

        $importable_fields = [];

        if ( empty( $all_fields ) ) {
            return $importable_fields;
        }

        // Full Name
        $importable_fields[ 'full_name' ] = self::get_full_name( $all_fields );

        // Categories
        $importable_fields[ 'categories' ] = self::get_importable_categories( $all_fields->id );

        foreach( $all_fields as $field_key => $field_value ) {
            $field_value = directorist_migrator_maybe_json( $field_value );

            // Get Listing Status
            if ( 'visibility' === $field_key ) {

                $status = self::get_status_fields( $field_value, $all_fields );
                
                if ( ! empty( $status ) ) {
                    $importable_fields[ 'listing_status' ] = $status;
                }
            }

            // Extract Importable Fields From Options
            if ( 'options' === $field_key ) {
                // Logo
                $logo = self::get_logo_field( $field_value );

                if ( ! empty( $logo ) ) {
                    $importable_fields[ 'logo' ] = $logo;
                }

                // Image
                $image = self::get_image_field( $field_value );

                if ( ! empty( $image ) ) {
                    $importable_fields[ 'image' ] = $image;
                }

                continue;
            }

            // Get Social Fields
            if ( 'social' === $field_key ) {

                $social_fields = self::get_social_fields( $field_value );

                if ( ! empty( $social_fields ) ) {
                    $importable_fields[ 'social' ] = $social_fields;
                }

                continue;
            }

            // If has sub field
            if ( 'array' === gettype( $field_value ) ) {

                foreach( $field_value as $sub_field_1_key => $sub_field_1_value ) {

                    if ( ! self::is_sub_field_preferable( $field_value, $sub_field_1_value, $prefered_only_when_has_multiple_item ) ) {
                        continue;
                    }

                    $sub_field_1_value = directorist_migrator_maybe_json( $sub_field_1_value );

                    // If has sub field
                    if ( 'array' === gettype( $sub_field_1_value ) ) {

                        foreach( $sub_field_1_value as $sub_field_2_key => $sub_field_2_value ) {
                            
                            $sub_field_key = $field_key . '_[item_' . $sub_field_1_key . '_key_' . $sub_field_2_key .  ']';
                            $importable_fields[ $sub_field_key ] = $sub_field_2_value;

                        }

                        continue;
                    } 
                    
                    $field_key = $field_key . '_[item_' . $sub_field_1_key . ']';
                    $importable_fields[ $field_key ] = $sub_field_1_value;
                    
                }

                continue;
            }
            
            $importable_fields[ $field_key ] = $field_value;
        }

        $importable_fields = apply_filters( 'directorist_migrator_importable_fields', $importable_fields, $all_fields, DIRECTORIST_MIGRATOR_INTEGRATION_CONNECTIONS_ID );

        return $importable_fields;
    }

    /**
     * Is sub field preferable
     * 
     * @param array $main_field_value
     * @param array $sub_field_value
     * @param bool $prefered_only_when_has_multiple_item
     * 
     * @return bool is sub field preferable
     */
    public static function is_sub_field_preferable( $main_field_value, $sub_field_value, $prefered_only_when_has_multiple_item = true ) {
        $has_multiple_sub_fields = count( $main_field_value ) > 1;
        $is_prefered_field       = isset( $sub_field_value[ 'preferred' ] ) && empty( $sub_field_value[ 'preferred' ] ) ? false : true;

        if ( $has_multiple_sub_fields && $prefered_only_when_has_multiple_item && ! $is_prefered_field ) {
            return false;
        }

        return true;
    }

    /**
     * Get Logo Field
     * 
     * @param array $field_value
     * @return string Logo Field
     */
    public static function get_logo_field( $field_value = [] ) {
        if ( empty( $field_value ) ) {
            return '';
        }

        if ( empty( $field_value['logo'] ) ) {
            return '';
        }

        if ( empty( $field_value['logo']['meta'] ) ) {
            return '';
        }

        if ( empty( $field_value['logo']['meta']['url'] ) ) {
            return '';
        }

        return $field_value['logo']['meta']['url'];
    }

    /**
     * Get Image Field
     * 
     * @param array $field_value
     * @return string Image Field
     */
    public static function get_image_field( $field_value = [] ) {
        if ( empty( $field_value ) ) {
            return '';
        }

        if ( empty( $field_value['image'] ) ) {
            return '';
        }

        if ( empty( $field_value['image']['meta'] ) ) {
            return '';
        }

        if ( empty( $field_value['image']['meta']['original'] ) ) {
            return '';
        }

        if ( empty( $field_value['image']['meta']['original']['url'] ) ) {
            return '';
        }

        return $field_value['image']['meta']['original']['url'];
    }

    /**
     * Get Social Fields
     * 
     * @param array $field_value
     * @return array Social Field
     */
    public static function get_social_fields( $field_value = [] ) {
        $social_fields = [];

        if ( empty( $field_value ) ) {
            return $social_fields;
        }

        foreach( $field_value as $field_item ) {

            if ( empty( $field_item[ 'type' ] ) &&  $field_item[ 'url' ] ) {
                continue;
            }

            $social_fields[] = [
                'id'  => $field_item[ 'type' ],
                'url' => $field_item[ 'url' ],
            ];
        }

        return $social_fields;
    }

    /**
     * Get Status Field
     * 
     * @param string $field_value
     * @param object $all_fields
     * @return string Status Field
     */
    public static function get_status_fields( $field_value = '', $all_fields = [] ) {

        if ( empty( $field_value ) ) {
            return '';
        }

        $status_map = apply_filters( 'directorist_migrator_connections_listing_status_map', [
            'public'   => 'publish',
            'private'  => 'private',
            'unlisted' => 'pending',
        ] );

        $status = '';
            
        if ( array_key_exists( $field_value, $status_map ) ) {
            $status = $status_map[ $field_value ];
        }

        $is_approved  = ! empty( $all_fields->status ) && 'approved' === $all_fields->status;
        $is_published = 'publish' === $status;

        if ( $is_published && ! $is_approved ) {
            $status = 'pending';
        }

        return apply_filters( 'directorist_migrator_connections_importable_listing_status', $status, $status_map, $all_fields );
    }

    /**
     * Get importable categories
     * 
     * @param int $listing_id
     * @return string Importable Categories
     */
    public static function get_importable_categories( $listing_id ) {

        $instance = Connections_Directory();
        $categories = $instance->retrieve->entryCategories( $listing_id );

        $importable_categories = [];

        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $importable_categories[] = $category->name;
            }
        }

        if ( empty( $importable_categories ) ) {
            return '';
        }

        return implode( ',', $importable_categories );
    }

    /**
     * Get Full Name
     * 
     * @param object $fields
     * @return string Full Name
     */
    public static function get_full_name( $fields = [] ) {
        // Full Name
        $full_name = '';

        if ( ! empty( $fields->honorific_prefix ) ) {
            $full_name .= $fields->honorific_prefix;
        }

        if ( ! empty( $fields->first_name ) ) {
            $full_name .= ' ' . $fields->first_name;
        }

        if ( ! empty( $fields->middle_name ) ) {
            $full_name .= ' ' . $fields->middle_name;
        }

        if ( ! empty( $fields->last_name ) ) {
            $full_name .= ' ' . $fields->last_name;
        }

        if ( ! empty( $fields->honorific_suffix ) ) {
            $full_name .= ' ' . $fields->honorific_suffix;
        }

        return $full_name;
    }

}