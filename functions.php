<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

function my_bb_custom_fonts ( $system_fonts ) {

  $system_fonts[ 'Bitstream Vera Sans' ] = array(
    'fallback' => 'Verdana, Arial, sans-serif',
    'weights' => array(
      '400',
    ),
  );

return $system_fonts;

}

function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}

function load_css() {
    wp_enqueue_style( 'book', get_stylesheet_directory_uri() . '/css/book.css', array(), 0.256, 'all');
}

add_action( 'wp_print_styles', 'load_css', 99 );


add_filter('upload_mimes', 'add_file_types_to_uploads');

//Add to Beaver Builder Theme Customizer
add_filter( 'fl_theme_system_fonts', 'my_bb_custom_fonts' );

//Add to Beaver Builder modules
add_filter( 'fl_builder_font_families_system', 'my_bb_custom_fonts' );

// Function to conditionally load book.css on the /book page
function enqueue_book_css_on_book_page() {
    if ( is_page('book') ) {
        wp_enqueue_style('book-style', get_stylesheet_directory_uri() . '/css/book.css');
    }
}

// Modifying the existing wp_enqueue_scripts hook to include the new function
add_action('wp_enqueue_scripts', 'enqueue_book_css_on_book_page', 1001);  // Setting priority to 1001 to ensure it runs after the existing scripts
