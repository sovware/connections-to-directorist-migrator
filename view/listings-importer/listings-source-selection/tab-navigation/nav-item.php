<li class="directorist-tab-navigation-list-item">
    <a href="#" class="directorist-tab-navigation-list-item-link directorist-listings-import-nav-link<?php echo esc_attr( $data['active_class'] ); ?> directorist-toggle-tab" data-nav-container="directorist-tab-navigation" data-tab-container="directorist-listings-importer-tab-contents" data-tab="<?php echo esc_attr( $data['tab'] ); ?>" data-query-var-key="listing-import-source-type" data-query-var-value="<?php echo esc_attr( $data['query_var_value'] ) ?>">
        <span class="directorist-label">
            <span class="directorist-label-addon-prepend">
                <?php echo wp_kses_post( $data['icon'] ) ; ?>
            </span>

            <?php echo esc_html( $data['label'] ); ?>
        </span>
    </a>
    
</li>