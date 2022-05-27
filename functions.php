<!-- Where you can override and initiate differennt features of your theme inside Wordpress.-->

<?php

function basewebsite_register_styles() {

    $version = wp_get_theme() -> get( ' Version' );

    // PARAMETERS = internalstylesheetname, stylesheeturl . pathtostylesheet, emptyarray, version, whichstylesheetisthisfor
    // on style we added bootstrap to the dependency array to load the bootstrap first before fontawesome.
    wp_enqueue_style('basewebsite-style', get_template_directory_uri() . "/style.css", array('basewebsite-bootstrap'), $version, 'all');
    wp_enqueue_style('basewebsite-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('basewebsite-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

// When wordpress runs 1st parameter which is a hook, 
// execute 2nd parameter which is the above function.
add_action( 'wp_enqueue_scripts', 'basewebsite_register_styles' );

function basewebsite_register_scripts() {

    // PARAMETERS = name, scriptlink, dependency array, version, boolean for header or footer, default is false for header.
    wp_enqueue_script('basewebsite-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('basewebsite-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.1', true);
    wp_enqueue_script('basewebsite-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('basewebsite-main', get_template_directory_uri() . "/assets/js/main.js", array(), '3.4.1', true);

}

// When wordpress runs 1st parameter which is a hook, 
// execute 2nd parameter which is the above function.
add_action( 'wp_enqueue_scripts', 'basewebsite_register_scripts' );

?>