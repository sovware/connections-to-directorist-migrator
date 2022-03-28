<?php defined( 'ABSPATH' ) || exit; ?>

<div class="csv-wrapper">
	<div class="csv-center">
		<form class="atbdp-progress-form-content directorist-importer" id="atbdp_csv_step_one" enctype="multipart/form-data" method="POST">
			<header>
				<h2><?php esc_html_e( 'Upload CSV file or Import Listings', 'drectorist-migrator' ); ?></h2>
				<p>
					<?php esc_html_e( 'This tool allows you to import listing data to your directory from a CSV file.', 'drectorist' ); ?>
					<?php esc_html_e( 'We strongly recommend reading our CSV import ', 'directorist' ); ?>
					<a target="_blank" href="https://directorist.com/documentation/directorist/gettings-started/csv-import/"><?php esc_html_e( 'documentation', 'directorist' ); ?></a>
					<?php esc_html_e( ' first to help you do things in the right way.', 'directorist' ); ?>
				</p>
			</header>

			<div class="form-content">
				<h4 class="directorist-headline-4"><?php esc_html_e( 'Upload CSV file or import listings from other sources', 'directorist-migrator' ); ?></h4>

				<ul class="directorist-tab-navigation">
					<?php foreach( $data['listing_import_source_navigation'] as $index => $nav_item ) :
						$nav_item['index'] = $index;
						$data['controller']->listings_importer_source_navigation_item_template( $nav_item );
					endforeach; ?>
				</ul>

				
				<div class="directorist-listings-importer-tab-contents">
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
				</div>
			</div>

			<div class="atbdp-actions">
				<input type="hidden" class="listing-import-source-type" name="listing-import-source-type" value="<?php echo $data['controller']->get_current_listing_import_source_type(); ?>">
				<button type="submit" class="button" name="atbdp_save_csv_step"><?php esc_html_e( 'Continue', 'directorist' ); ?></button>
				<?php wp_nonce_field( 'directorist-csv-importer' ); ?>
			</div>
		</form>
	</div>
</div>