<?php
/*
* Template Name: Template for Galleries
*/
?>

<?php get_header(); ?>

<main class="contenedor pagina seccion">
  <div class="contenido-principal">
  <?php while(have_posts()) : the_post(); ?>
      <h1 class="text-center texto-primario"><?php the_title(); ?></h1>
        
        <?php
          // Get the Image IDs From the Gallery Page
          $galeria = get_post_gallery(get_the_ID(), false);
          $galeria_imagenes_id = explode(",", $galeria['ids']);
          
        ?>
        <ul class="galeria-imagenes">
          <?php
          $i = 1;
          foreach($galeria_imagenes_id as $id) {
            $size = ($i == 4 || $i == 6) ? 'portrait' : 'square'; 
            $imagenThumb = wp_get_attachment_image_src($id, $size)[0];
            $imagen = wp_get_attachment_image_src($id, 'full')[0];
            // echo "<pre>",print_r($imagenThumb),"</pre>";
          ?>
            <li>
              <a href="<?php echo $imagen; ?>" data-lightbox="galeria">
                <img src="<?php echo $imagenThumb; ?>" alt="Image">
              </a>
            </li>
          <?php
            $i++;
          }
          ?>
        </ul>

<?php endwhile; ?>
  </div>
  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>