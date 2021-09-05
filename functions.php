<?php 

// Link to the queries file
require get_template_directory() . '/inc/queries.php';

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

  // Lightbox CSS (only load in gallery template)
  if (basename(get_page_template()) === "gallery.php") {
    wp_enqueue_style(
      'lightbox2_css',
      get_template_directory_uri() . "/css/lightbox.min.css",
      array(),
      '2.11.3'
    );
  }

  // bxSlider CSS
  if (is_front_page()) {
    wp_enqueue_style(
      'bxslider_css',
      'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css',
      array(),
      '4.2.12'
    );
  }

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

  // Lightbox2 JS (only load in gallery template)
  if (basename(get_page_template()) === "gallery.php") {
    wp_enqueue_script(
      'lightbox2_script',
      get_template_directory_uri() . "/js/lightbox.min.js",
      array('jquery'),
      '2.11.3',
      True // loads script in the footer
    );
  }

  // bxSlider JS
  if (is_front_page()) {
    wp_enqueue_script(
      'bxslider_js',
      "https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js",
      array('jquery'),
      '4.2.12',
      True // loads script in the footer
    );
  }

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

// Enable Feature Images and other stuff
function wp_gym_theme_setup() {

  // Register new image sizes
  add_image_size('square', 350, 350, true);
  add_image_size('portrait', 350, 724, true);
  add_image_size('box', 400, 375, true); 
  add_image_size('medium_size', 700, 400, true);
  add_image_size('blog', 966, 644, true);

  // Add feature image
  add_theme_support('post-thumbnails');

}

add_action('after_setup_theme', 'wp_gym_theme_setup');

// Create Widget Zone
function wp_gym_theme_widgets() {
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<ul class="widget">',
    'after_widget' => '</ul>',
    'before_title' => '<h3 class="text-primary text-center sidebar-blog-entries-header">',
    'after_title' => '</h3>'
  ));
}

add_action('widgets_init', 'wp_gym_theme_widgets');

// Display hero image as background of header on the front page
function wp_gym_hero_image() {
  $front_page_id = get_option('page_on_front');
  $image_data = get_field('hero_image', $front_page_id);
  $image_url = $image_data['url'];

  $featured_image_css = "
    body.home .site-header {
      background-image: linear-gradient(
                          rgba(0, 0, 0, 0.75),
                          rgba(0, 0, 0, 0.75)
                        ), 
                        url($image_url);
    }
  ";

  // Create false stylesheet
  wp_register_style('custom', false);
  wp_enqueue_style('custom');
  wp_add_inline_style('custom', $featured_image_css);
}

add_action('init', 'wp_gym_hero_image');

?>