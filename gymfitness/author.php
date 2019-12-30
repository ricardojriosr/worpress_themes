<?php get_header(); ?>

  <main class="pagina seccion no-sidebars contenedor">
  <?php
  $autor = get_queried_object(); 
  ?>
    <h2 class="text-center texto-primario">
      Author: 
      <?php 
      echo $autor->data->display_name;
      ?>
    </h2>
    <p class="text-center">
      <?php 
      echo get_the_author_meta('description', $autor->data->ID); 
      ?>
    </p>
    <?php get_sidebar(); ?>
  </main>

<?php get_footer(); ?>