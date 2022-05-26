<!-- Where you can override and initiate differennt features of your theme inside Wordpress.-->

<?php

function basewebsite_register_styles() {

    // 
    wp_enqueue_style('basewebsite-bootstrap', get_template_directory_uri(), "/style.css", array(), '1.0', 'all')
}

add_action( 'wp_enqueue_scripts', 'basewebsite_register_styles' );

?>