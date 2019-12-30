<?php

/** CSS Y JS **/
function lapizzeria_styes() {

    // Add Normalize
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), '8.0.1');

    //SlickNav CSS
    wp_enqueue_style('slicknavCSS', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css', array(), '1.0.10');

    // Add Google fonts
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900&display=swap', array(), '1.0.0');

    // Add Stylesheet
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','googlefonts'), '1.0.0');

    //JAVASCRIPT - Slick Nav JS
    wp_enqueue_script('slicknavJS', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

    // JS - Scripts
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'lapizzeria_styes');

/** MENUS **/
function lapizzeria_menu() {
    register_nav_menus(array(
        'header-menu' => 'Header Menu',
        'redes-sociales' => 'Redes Sociales'
    ));
}
add_action('init', 'lapizzeria_menu');


/** Featured Image **/
function lapizzeria_setup() {

    // Titulos para SEO
    add_theme_support('title-tag');
    
    /** Gutenberg **/

    // Gutenberg Style Support
    add_theme_support('wp-block-styles');

    // Colores
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => 'Rojo',
            'slug'  => 'rojo',
            'color' => '#a61206'
        ),
        array(
            'name'  => 'Naranja',
            'slug'  => 'naranja',
            'color' => '#f19f30'
        ),
        array(
            'name'  => 'Verde',
            'slug'  => 'verde',
            'color' => '#127427'
        ),
        array(
            'name'  => 'Blanco',
            'slug'  => 'blanco',
            'color' => '#ffffff'
        ),
        array(
            'name'  => 'Negro',
            'slug'  => 'negro',
            'color' => '#000000'
        ),
    ));
    // Disable Custom Colors
    add_theme_support('disable-custom-colors');

    // Featured Images
    add_theme_support('post-thumbnails');
    // Images sizes
    add_image_size('nosotros', 437, 291, true);
    add_image_size('especialidades', 768, 515, true);
    add_image_size('especialidades_portrait', 435, 526, true);
}
add_action('after_setup_theme', 'lapizzeria_setup');

/** Widget Zone **/
function lapizzeria_widgets() {
    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'lapizzeria_widgets');

/** Add buttons to paginator **/
function lapizzeria_botones_paginador() {
    return 'class="boton boton-secundario"';
}
add_filter('next_posts_link_attributes', 'lapizzeria_botones_paginador');
add_filter('previous_posts_link_attributes', 'lapizzeria_botones_paginador');
?>