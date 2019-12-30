<?php

// Queries to reuse
require get_template_directory() . '/inc/queries.php';
require get_template_directory() . '/inc/shortcodes.php';

// When the theme is activated
function gymfitness_setup() {

  //Enable Featured images
  add_theme_support('post-thumbnails');

  // SEO Titles
  add_theme_support('title_tag');

  // Add custom size images
  add_image_size('square', '350', '350', true);
  add_image_size('portrait', '350', '724', true);
  add_image_size('boxes', '400', '375', true);
  add_image_size('mediumx', '700', '400', true);
  add_image_size('blog', '966', '644', true);
}

// Add Menu Functions
function gymfitness_menus() {
  register_nav_menus(array(
    'main-menu' => __( 'Main Menu', 'gymfitness' )
  ));
}

// Add Scripts and Styles
function gymfitness_scripts_styles() {

  // Normalize
  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

  //SlickNav CSS
  wp_enqueue_style('slicknavCSS', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css', array(), '1.0.0');

  // Google Fonts
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap',array(), '1.0.0');

  if (is_page('gallery')) {
    // Lightbox
    wp_enqueue_style('lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.1');
  }

  if (is_page('contact')) {
    // Leaflet
    wp_enqueue_style('leafletCSS', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css', array(), '1.6.0');
  }

  if (is_page('home')) {
    // BxSlider
    wp_enqueue_style('bxsliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
  }

  // Main Stylesheet
  wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'google-fonts', 'slicknavCSS'), '1.0.0');

  //JAVASCRIPT - Slick Nav JS
  wp_enqueue_script('slicknavJS', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);

  //Lightbox
  if (is_page('gallery')) {
    wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.1', true);
  }

  // Leaflet
  if (is_page('contact')) {
    wp_enqueue_script('leafletJS', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', array('jquery'), '2.11.1', true);
  }

  // BXSlider
  if (is_page('home')) {
    wp_enqueue_script('bxsliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
  }

  //JAVASCRIPT - Scripts
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true);
}

// Define Widgets Zone
function gymfitness_widgets() {

  register_sidebar(array(
    'name' => 'Sidebar 1',
    'id'   => 'sidebar_1',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="text-center texto-primario">',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
    'name' => 'Sidebar 2',
    'id'   => 'sidebar_2',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="text-center texto-primario">',
    'after_title' => '</h3>',
  ));

}


/** Image Hero */
function gymfitness_hero_image() {
  // Get Main Page ID
  $front_page_id = get_option( 'page_on_front' );
  // Get Image ID
  $id_imagen = get_field('image_hero', $front_page_id)['id'];
  // Get the Image
  $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];
  // Style CSS
  wp_register_style('custom', false);
  wp_enqueue_style('custom');

  $imagen_destacada_css = "
    body.home .site-header {
      background-image: linear-gradient( rgba(0,0,0,0.75),  rgba(0,0,0,0.75) ), url(".$imagen.") ;
    }
  ";

  wp_add_inline_style('custom', $imagen_destacada_css);

}

// Hooks
add_action('init', 'gymfitness_menus'); // When loading WordPress
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles'); // Load Scripts in Front-End
add_action('after_setup_theme', 'gymfitness_setup'); // Load after theme activation
add_action('widgets_init', 'gymfitness_widgets'); // Load Widgets at init
add_action('init', 'gymfitness_hero_image'); // Add Hero Image
?>