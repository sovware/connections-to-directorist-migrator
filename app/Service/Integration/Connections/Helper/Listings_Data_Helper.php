<?php

namespace Connections_To_Directorist_Migrator\Service\Integration\Connections\Helper;

use Connections_To_Directorist_Migrator\Service\Integration\Connections\Model\Listings_Model;

class Listings_Data_Helper {

    /**
     * Get importable fields map
     * 
     * @return array Fields
     */
    public static function get_importable_fields_map() {
        $fields_map = [];

        $fields_map['full_name']          = null;
        $fields_map['categories']         = null;
        $fields_map['id']                 = null;
        $fields_map['ts']                 = null;
        $fields_map['date_added']         = null;
        $fields_map['ordo']               = null;
        $fields_map['entry_type']         = null;
        $fields_map['listing_status']     = null;
        $fields_map['visibility']         = null;
        $fields_map['slug']               = null;
        $fields_map['family_name']        = null;
        $fields_map['honorific_prefix']   = null;
        $fields_map['first_name']         = null;
        $fields_map['middle_name']        = null;
        $fields_map['last_name']          = null;
        $fields_map['honorific_suffix']   = null;
        $fields_map['title']              = null;
        $fields_map['organization']       = null;
        $fields_map['department']         = null;
        $fields_map['contact_first_name'] = null;
        $fields_map['contact_last_name']  = null;
        $fields_map['social']             = [];
        $fields_map['birthday']           = null;
        $fields_map['anniversary']        = null;
        $fields_map['bio']                = null;
        $fields_map['notes']              = null;
        $fields_map['excerpt']            = null;
        $fields_map['logo']               = null;
        $fields_map['image']              = null;
        $fields_map['added_by']           = null;
        $fields_map['edited_by']          = null;
        $fields_map['owner']              = null;
        $fields_map['user']               = null;
        $fields_map['status']             = null;
        $fields_map['sort_column']        = null;

        self::attach_listings_addresses_fields( $fields_map );
        self::attach_listings_phone_numbers_fields( $fields_map );
        self::attach_listings_email_fields( $fields_map );
        self::attach_listings_im_fields( $fields_map );
        self::attach_listings_links_fields( $fields_map );
        self::attach_listings_dates_fields( $fields_map );
        
        return $fields_map;
    }

    /**
     * Attach listings addresses fields
     * 
     * @param array &$fields_map
     * @return void
     */
    public static function attach_listings_addresses_fields( &$fields_map ) {
        $count = Listings_Model::get_listings_max_repetitive_fields_count( 'addresses' );

        if ( empty( $count ) ) {
            return;
        }

        for( $i = 0; $i < $count; $i++ ) {
            $fields_map['addresses_[item_'. $i .'_key_id]']            = null;
            $fields_map['addresses_[item_'. $i .'_key_type]']          = null;
            $fields_map['addresses_[item_'. $i .'_key_visibility]']    = null;
            $fields_map['addresses_[item_'. $i .'_key_order]']         = null;
            $fields_map['addresses_[item_'. $i .'_key_preferred]']     = null;
            $fields_map['addresses_[item_'. $i .'_key_line_1]']        = null;
            $fields_map['addresses_[item_'. $i .'_key_line_2]']        = null;
            $fields_map['addresses_[item_'. $i .'_key_line_3]']        = null;
            $fields_map['addresses_[item_'. $i .'_key_line_4]']        = null;
            $fields_map['addresses_[item_'. $i .'_key_district]']      = null;
            $fields_map['addresses_[item_'. $i .'_key_county]']        = null;
            $fields_map['addresses_[item_'. $i .'_key_locality]']      = null;
            $fields_map['addresses_[item_'. $i .'_key_region]']        = null;
            $fields_map['addresses_[item_'. $i .'_key_postal_code]']   = null;
            $fields_map['addresses_[item_'. $i .'_key_country]']       = null;
            $fields_map['addresses_[item_'. $i .'_key_latitude]']      = null;
            $fields_map['addresses_[item_'. $i .'_key_longitude]']     = null;
            $fields_map['addresses_[item_'. $i .'_key_name]']          = null;
            $fields_map['addresses_[item_'. $i .'_key_address_line1]'] = null;
            $fields_map['addresses_[item_'. $i .'_key_address_line2]'] = null;
            $fields_map['addresses_[item_'. $i .'_key_line_one]']      = null;
            $fields_map['addresses_[item_'. $i .'_key_line_two]']      = null;
            $fields_map['addresses_[item_'. $i .'_key_line_three]']    = null;
            $fields_map['addresses_[item_'. $i .'_key_city]']     = null;
            $fields_map['addresses_[item_'. $i .'_key_state]']    = null;
            $fields_map['addresses_[item_'. $i .'_key_zipcode]']  = null;
        }

    }

    /**
     * Attach listings phone numbers fields
     * 
     * @param array &$fields_map
     * @return void
     */
    public static function attach_listings_phone_numbers_fields( &$fields_map ) {
        $count = Listings_Model::get_listings_max_repetitive_fields_count( 'phone_numbers' );

        if ( empty( $count ) ) {
            return;
        }

        for( $i = 0; $i < $count; $i++ ) {
            $fields_map['phone_numbers_[item_'. $i .'_key_id]']         = null;
            $fields_map['phone_numbers_[item_'. $i .'_key_type]']       = null;
            $fields_map['phone_numbers_[item_'. $i .'_key_name]']       = null;
            $fields_map['phone_numbers_[item_'. $i .'_key_visibility]'] = null;
            $fields_map['phone_numbers_[item_'. $i .'_key_order]']      = null;
            $fields_map['phone_numbers_[item_'. $i .'_key_preferred]']  = null;
            $fields_map['phone_numbers_[item_'. $i .'_key_number]']     = null;
        }

    }

    /**
     * Attach listings email fields
     * 
     * @param array &$fields_map
     * @return void
     */
    public static function attach_listings_email_fields( &$fields_map ) {
        $count = Listings_Model::get_listings_max_repetitive_fields_count( 'email' );

        if ( empty( $count ) ) {
            return;
        }

        for( $i = 0; $i < $count; $i++ ) {
            $fields_map['email_[item_'. $i .'_key_id]']         = null;
            $fields_map['email_[item_'. $i .'_key_type]']       = null;
            $fields_map['email_[item_'. $i .'_key_name]']       = null;
            $fields_map['email_[item_'. $i .'_key_visibility]'] = null;
            $fields_map['email_[item_'. $i .'_key_order]']      = null;
            $fields_map['email_[item_'. $i .'_key_preferred]']  = null;
            $fields_map['email_[item_'. $i .'_key_address]']    = null;
        }

    }

    /**
     * Attach listings messenger fields
     * 
     * @param array &$fields_map
     * @return void
     */
    public static function attach_listings_im_fields( &$fields_map ) {
        $count = Listings_Model::get_listings_max_repetitive_fields_count( 'im' );

        if ( empty( $count ) ) {
            return;
        }

        for( $i = 0; $i < $count; $i++ ) {
            $fields_map['im_[item_'. $i .'_key_id]']         = null;
            $fields_map['im_[item_'. $i .'_key_type]']       = null;
            $fields_map['im_[item_'. $i .'_key_name]']       = null;
            $fields_map['im_[item_'. $i .'_key_visibility]'] = null;
            $fields_map['im_[item_'. $i .'_key_order]']      = null;
            $fields_map['im_[item_'. $i .'_key_preferred]']  = null;
            $fields_map['im_[item_'. $i .'_key_uid]']       = null;
        }

    }

    /**
     * Attach listings links fields
     * 
     * @param array &$fields_map
     * @return void
     */
    public static function attach_listings_links_fields( &$fields_map ) {
        $count = Listings_Model::get_listings_max_repetitive_fields_count( 'links' );

        if ( empty( $count ) ) {
            return;
        }

        for( $i = 0; $i < $count; $i++ ) {
            $fields_map['links_[item_'. $i .'_key_id]']           = null;
            $fields_map['links_[item_'. $i .'_key_type]']         = null;
            $fields_map['links_[item_'. $i .'_key_name]']         = null;
            $fields_map['links_[item_'. $i .'_key_visibility]']   = null;
            $fields_map['links_[item_'. $i .'_key_order]']        = null;
            $fields_map['links_[item_'. $i .'_key_preferred]']    = null;
            $fields_map['links_[item_'. $i .'_key_title]']        = null;
            $fields_map['links_[item_'. $i .'_key_address]']      = null;
            $fields_map['links_[item_'. $i .'_key_url]']          = null;
            $fields_map['links_[item_'. $i .'_key_target]']       = null;
            $fields_map['links_[item_'. $i .'_key_follow]']       = null;
            $fields_map['links_[item_'. $i .'_key_followString]'] = null;
            $fields_map['links_[item_'. $i .'_key_image]']        = null;
            $fields_map['links_[item_'. $i .'_key_logo]']         = null;
        }

    }

    /**
     * Attach listings dates fields
     * 
     * @param array &$fields_map
     * @return void
     */
    public static function attach_listings_dates_fields( &$fields_map ) {
        $count = Listings_Model::get_listings_max_repetitive_fields_count( 'dates' );

        if ( empty( $count ) ) {
            return;
        }

        for( $i = 0; $i < $count; $i++ ) {
            $fields_map['dates_[item_'. $i .'_key_id]']         = null;
            $fields_map['dates_[item_'. $i .'_key_type]']       = null;
            $fields_map['dates_[item_'. $i .'_key_name]']       = null;
            $fields_map['dates_[item_'. $i .'_key_visibility]'] = null;
            $fields_map['dates_[item_'. $i .'_key_order]']      = null;
            $fields_map['dates_[item_'. $i .'_key_preferred]']  = null;
            $fields_map['dates_[item_'. $i .'_key_date]']       = null;
        }

    }

    /**
     * Get importable fields
     * 
     * @param object $fields
     * @return array Fields
     */
    public static function get_importable_fields( $all_fields, $prefered_only_when_has_multiple_item = false ) {

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