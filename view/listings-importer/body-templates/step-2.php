<?php defined( 'ABSPATH' ) || exit; ?>

<div class="csv-wrapper">
	<div class="csv-center csv-fields">
		<form class="atbdp-progress-form-content directorist-importer" id="atbdp_csv_step_two" method="post">
			<header>
                <h2><?php esc_html_e('Map fields to listings', 'directorist'); ?></h2>
				<p><?php esc_html_e('Select Directorist fields to map it against your listings fields, leave it as "Do not import" to skip certain fields.', 'directorist'); ?></p>

				<p>
					<a target="_blank" href="<?php echo esc_attr( $data['documentation_link'] ) ?>"><?php esc_html_e( 'Need Help?', 'connections-to-directorist-migrator' ); ?></a>
				</p>
			</header>

			<div class="form-content">
				<section class="atbdp-importer-mapping-table-wrapper">
					<h3><?php printf( __( 'Total %s item(s) found ', 'directorist' ), $data['total_listings']); ?></h3>
					<div class="directory_type_wrapper">
						<?php if ( count( directory_types() ) > 1 ) { ?>
                            <label for="directory_type"><?php esc_html_e('Select Directory', 'directorist'); ?></label>
                            <select name="directory_type" id="directory_type">
                                <option value="">--Select--</option>
                                <?php foreach( directory_types() as $term ) {
                                    $default = get_term_meta( $term->term_id, '_default', true ); ?>
                                        <option <?php echo ! empty( $default ) ? 'selected' : ''; ?> value="<?php echo esc_attr( $term->term_id); ?>"><?php echo esc_attr( $term->name ); ?></option>
                                <?php } ?>
                            </select>
						<?php }
                            // Listings Data Map
                            $data['controller']->listings_importer_listings_data_map_table_template( $data['listings_data_map'] );
                        ?>
					</div>
				</section>
			</div>

			<div class="atbdp-actions">
				<input type="hidden" class="directorist-listings-importer-config-field" name="total_post" value="<?php echo esc_attr( apply_filters( 'directorist_migrator_total_importing_listings', 0, $data['controller']->get_current_listing_import_source() ) ); ?>">
				<input type="hidden" class="directorist-listings-importer-config-field" name="listing_import_source" value="<?php echo esc_attr( $data['controller']->get_current_listing_import_source() ); ?>">
				<button type="submit" class="button btn-run-importer" value="<?php esc_attr_e('Run the importer', 'directorist'); ?>" name="save_step_two"><?php esc_html_e('Run the importer', 'directorist'); ?></button>
				<?php wp_nonce_field('directorist-csv-importer'); ?>
			</div>
		</form>

		<div id="directorist-type-preloader">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>

	<div class="csv-center">
		<div class="directorist-importer__importing" style="display: none;">
			<header>
				<span class="spinner is-active"></span>
				<h2><?php esc_html_e( 'Importing', 'directorist' );
					?></h2>
				<p><?php esc_html_e( 'Your listing are now being imported...', 'directorist' );
					?></p>
			</header>
			<section>
				<span class="importer-notice"><?php esc_html_e('Please don\'t reload the page', 'directorist')?></span>
				<div class="directorist-importer-wrapper">
					<progress class="directorist-importer-progress" max="100" value="0"></progress>
					<span class="directorist-importer-length"></span>
				</div>
				<span class="importer-details"></span>
			</section>
		</div>
	</div>
</div>