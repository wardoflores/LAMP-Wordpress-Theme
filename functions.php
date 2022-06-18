<?php

function basewebsite_theme_support(){

    // Adds dunamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

}

add_action('after_setup_theme', 'basewebsite_theme_support');

function basewebsite_menus() {

    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'basewebsite_menus');

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

function basewebsite_widget_areas(){

    register_sidebar(
        
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
        
    );

    register_sidebar(
        
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '</ul>',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
        
    );

}

add_action( 'widgets_init', 'basewebsite_widget_areas' )

?>