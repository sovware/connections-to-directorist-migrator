<?php defined( 'ABSPATH' ) || exit; ?>

<?php do_action( 'directorist_before_listings_importer_data_map_table' ) ; ?> 

<table class="widefat atbdp-importer-mapping-table">
    <thead>
        <tr>
            <th><?php esc_html_e('Column name', 'directorist'); ?></th>
            <th><?php esc_html_e('Map to field', 'directorist'); ?></th>
        </tr>
    </thead>
    
    <tbody>
        <?php if ( is_array( $data['headers'] ) ) :
            foreach ( $data['headers'] as $header_label => $header_sample ) : ?>
                <tr>
                    <td class="atbdp-importer-mapping-table-name">
                        <p><?php echo esc_html( $header_label ); ?></p>

                        <?php if ( ! empty( $header_sample ) ) : ?>
                        <span class="description">
                            <?php esc_html_e( 'Sample:', 'directorist' ); ?> 
                            <code><?php echo esc_html( $header_sample ); ?></code>
                        </span>
                        <?php endif; ?>
                    </td>

                    <td class="atbdp-importer-mapping-table-field">
                        <input type="hidden" name="map_from[<?php echo esc_attr( $header_label ); ?>]" value="<?php echo esc_attr( $header_sample ); ?>" />
                        
                        <select class="atbdp_map_to" name="<?php echo esc_attr( $header_label ); ?>">
                            <option value=""><?php esc_html_e('Do not import', 'directorist'); ?></option>
                            <?php foreach ( $data['fields'] as $key => $value ) : ?>
                                <option value="<?php echo esc_attr( $key ); ?>" <?php c2dm_maybe_selected_importing_listings_map_field( $header_label, $key ); ?>>
                                    <?php echo esc_html( $value ); ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
            <?php endforeach;
        endif; ?>
    </tbody>
</table>

<?php do_action( 'directorist_after_listings_importer_data_map_table' ) ; ?> 