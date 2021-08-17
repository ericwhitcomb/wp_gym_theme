<?php 

// Creates the Menus
function wp_gym_theme_menus() {
  // WordPress Function
  register_nav_menus(array(
    'main-menu' => 'Main Menu'
  ));
}

// Hook
add_action('init', 'wp_gym_theme_menus');

// Adds Stylesheets and JS Files
function wp_gym_theme_scripts() {

  // Normalize CSS
  wp_enqueue_style(
    'normalize_css',
    get_template_directory_uri() . "/css/normalize.css",
    array(),
    '8.0.1' 
  );

  // Google Fonts
  wp_enqueue_style(
    'google_fonts',
    'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Raleway:wght@400;700;900&family=Staatliches&display=swap',
    array(),
    null
  );

  // SlickNav CSS
  wp_enqueue_style(
    'slicknav_css',
    get_template_directory_uri() . "/css/slicknav.min.css",
    array(),
    '1.0.10'
  );

  // Main Stylesheet
  wp_enqueue_style(
    'theme_style',
    get_stylesheet_uri(),
    array('normalize_css', 'google_fonts'),
    '1.0.0'
  );

  // JQuery
  wp_enqueue_script('jquery');

  // SlickNav JS
  wp_enqueue_script(
    'slicknav_js',
    get_template_directory_uri() . "/js/jquery.slicknav.min.js",
    array('jquery'),
    '1.0.10',
    True // loads script in the footer
  );

  // Main Script JS
  wp_enqueue_script(
    'theme_script',
    get_template_directory_uri() . "/js/scripts.js",
    array('jquery'),
    '1.0.0',
    True // loads script in the footer
  );

}

add_action('wp_enqueue_scripts', 'wp_gym_theme_scripts');

?>