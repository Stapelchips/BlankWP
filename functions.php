<?php
/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
    array(
        'primary'	=>	'Hauptmenü' // Register the Primary menu
        // Copy and paste the line above right here if you want to make another menu,
        // just change the 'primary' to another name
    )
);

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function include_scripts()  {

    // get the theme directory style.css and link to it in the header
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), true );
    wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/js/script.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'include_scripts' );


add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );

add_theme_support( 'post-thumbnails' );

function ah_custom_post_type() {

    $labelsperson = array(
        'name' => 'Personen Einträge',
        'singular_name' => 'Person',
        'menu_name' => 'Personen',
        'parent_item_colon' => '',
        'all_items' => 'Alle Personen',
        'view_item' => 'Person ansehen',
        'add_new_item' => 'Neue Person',
        'add_new' => 'Hinzufügen',
        'edit_item' => 'Person bearbeiten',
        'update_item' => 'Person aktualisieren',
        'search_items' => '',
        'not_found' => '',
        'not_found_in_trash' => '',
    );
    $rewriteperson = array(
        'slug' => 'person',
        'with_front' => true,
        'pages' => true,
        'feeds' => true,
    );
    $argsperson = array(
        'labels' => $labelsperson,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'category', 'post_tag' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => $rewriteperson,
        'capability_type' => 'post',
    );

    add_theme_support( 'post-thumbnails' );

    register_post_type( 'person', $argsperson );
}

// Hook into the 'init' action
// Nächste Zeile unkommentieren, um custom posttype zu aktivieren
//add_action( 'init', 'ah_custom_post_type', 0 );