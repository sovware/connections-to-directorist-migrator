<?php defined( 'ABSPATH' ) || exit; ?>

<div class="csv-wrapper">
	<div class="csv-center">
		<form class="atbdp-progress-form-content directorist-importer" id="atbdp_csv_step_one" enctype="multipart/form-data" method="POST">
			<header>
				<h2><?php esc_html_e( 'Upload CSV file or Import Listings', 'connections-to-directorist-migrator' ); ?></h2>
				<p>
					<?php esc_html_e( 'This tool allows you to import listing data to your directory from a CSV file.', 'drectorist' ); ?>
					<?php esc_html_e( 'We strongly recommend reading our CSV import ', 'directorist' ); ?>
					<a target="_blank" href="https://directorist.com/documentation/directorist/gettings-started/csv-import/"><?php esc_html_e( 'documentation', 'directorist' ); ?></a>
					<?php esc_html_e( ' first to help you do things in the right way.', 'directorist' ); ?>
				</p>
			</header>

			<div class="form-content">
				<?php $data['controller']->listings_importer_listings_source_selection_template( $data ) ?>
			</div>

			<div class="atbdp-actions">
				<input type="hidden" class="listing-import-source-type" name="listing-import-source-type" value="<?php echo $data['controller']->get_current_listing_import_source_type(); ?>">
				<button type="submit" class="button" name="atbdp_save_csv_step"><?php esc_html_e( 'Continue', 'directorist' ); ?></button>
				<?php wp_nonce_field( 'directorist-csv-importer' ); ?>
			</div>
		</form>
	</div>
</div>