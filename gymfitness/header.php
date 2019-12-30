<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>
<body <?php if (is_page('home')) { body_class(); } ?>>
  
<header class="site-header">
  <div class="contenedor <?php if (is_page('home')) { echo "header-grid"; } ?>">
    <div class="barra-navegacion">
      <div class="logo">
        <a href="<?php echo site_url('/'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Site Logo">
        </a>
      </div>
      
      <?php
        $args = array(
          'theme_location' => 'main-menu',
          'container' => 'nav',
          'container-class' => 'menu-principal'
        );
        wp_nav_menu($args);
      ?>
      
    </div> <!-- .barra-navegacion -->
    
    <?php if (is_page('home')) { ?>
      <div class="tagline text-center">
        <h1><?php the_field('header_hero'); ?></h1>
        <p><?php the_field('content_hero'); ?></p>
      </div>
    <?php } ?>
  </div> 

</header>