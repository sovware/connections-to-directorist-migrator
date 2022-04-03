<section class="directorist-tab-content directorist-csv-import-tab<?php echo ( 'csv-file' === $data['current_listing_import_source_type'] ) ? ' --is-active' : ''; ?>">
    <div class="form-table directorist-importer-options">
        <h4 for="upload">
            <?php esc_html_e( 'Choose a CSV file from your computer:', 'directorist' ); ?>
        </h4>
        <div>
            <?php
            if ( ! empty( $data['upload_dir']['error'] ) ) { ?>
                <div class="inline error">
                    <p><?php esc_html_e( 'Before you can upload your import file, you will need to fix the following error:', 'directorist' ); ?></p>
                    <p><strong><?php echo esc_html( $data['upload_dir']['error'] ); ?></strong></p>
                </div>
                <?php
            } else {
                ?>
                <div class="csv-upload">
                    <input type="file" id="upload" name="import"<?php echo ( 'csv-file' === $data['current_listing_import_source_type'] ) ? ' required' : '' ?> size="25" />
                    <label for="upload"><span class="upload-btn"><i class="dashicons dashicons-upload"></i> <?php esc_html_e( 'Upload CSV', 'directorist' ); ?></span> <span class="file-name"><?php esc_html_e( 'No file chosen', 'directorist' ); ?></span></label>
                    <small>
                        <?php
                        printf(
                            /* translators: %s: maximum upload size */
                            esc_html__( 'Maximum size: %s', 'directorist' ),
                            esc_html( $data['size'] )
                        );
                        ?>
                    </small>
                </div>
                <input type="hidden" name="action" value="save" />
                <input type="hidden" name="max_file_size" value="<?php echo esc_attr( $bytes ); ?>" />
                <?php
            }
            ?>
        </div>

        <div class="csv-delimiter">
            <label><?php esc_html_e( 'CSV Delimiter', 'directorist' ); ?></label>
            <input type="text" name="delimiter-test" placeholder="," size="2" />
        </div>
    </div>
</section>