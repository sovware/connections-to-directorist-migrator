<h4 class="directorist-headline-4"><?php esc_html_e( 'Upload CSV file or import listings from other sources', 'directorist-migrator' ); ?></h4>

<ul class="directorist-tab-navigation">
    <?php 

        
    
    foreach( $data['listing_import_source_navigation'] as $index => $nav_item ) :
        $nav_item['index'] = $index;
        $data['controller']->listings_importer_source_navigation_item_template( $nav_item );
    endforeach; ?>
</ul>


<div class="directorist-listings-importer-tab-contents">
    
    
</div>