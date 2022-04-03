<section class="directorist-tab-content directorist-directory-import-tab<?php echo ( 'other' === $data['current_listing_import_source_type'] ) ? ' --is-active' : ''; ?>">
    <h4 class="directorist-headline-4"><?php esc_html_e( 'Import listings from other sources', 'directorist-migrator' ); ?></h4>
    
    <div class="directorist-select">
        <select class="directorist-listing-import-source" name="listing-import-source"<?php echo ( 'other' === $data['current_listing_import_source_type'] ) ? ' required' : '' ?>>
            <option value="">Select Source...</option>
            <?php foreach( $data['get_listings_importer_directory_source_list'] as $option ) {
                echo '<option value="'. $option['value'] .'">'. $option['label'] .'</option>';
            } ?>
        </select>
    </div>
    
</section>