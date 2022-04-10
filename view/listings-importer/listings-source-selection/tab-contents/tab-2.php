<section class="directorist-tab-content directorist-directory-import-tab<?php echo ( 'other' === $data['current_listing_import_source_type'] ) ? ' --is-active' : ''; ?>">

    <?php do_action( 'directorist_migrator_before_listing_source_selection_other_import_tab_content', $data ); ?>

    <h4 class="directorist-headline-4"><?php esc_html_e( 'Import listings from other sources', 'directorist-migrator' ); ?></h4>
    
    <div class="directorist-mb-20 directorist-select directorist-migrator-listing-import-source-field">
        <select class="directorist-listing-import-source" name="listing-import-source"<?php echo ( 'other' === $data['current_listing_import_source_type'] ) ? ' required' : '' ?>>
            <option value="">Select Source...</option>
            <?php foreach( $data['get_listings_importer_directory_source_list'] as $option ) {
                echo '<option value="'. esc_attr( $option['value'] ) .'">'. esc_html( $option['label'] ) .'</option>';
            } ?>
        </select>
    </div>
    
    <?php do_action( 'directorist_migrator_after_listing_source_selection_other_import_tab_content', $data ); ?>

</section>