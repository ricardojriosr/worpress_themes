<?php get_header(); ?>

<main class="contenedor pagina seccion con-sidebar">
  <div class="contenido-principal">
    <?php get_template_part('template-parts/pages'); ?>
  </div>
  <?php get_sidebar('classes'); ?>
</main>

<?php get_footer(); ?>