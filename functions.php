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
?>