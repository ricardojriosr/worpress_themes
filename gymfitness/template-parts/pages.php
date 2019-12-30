<?php while(have_posts()) : the_post(); ?>
      <h1 class="text-center texto-primario"><?php the_title(); ?></h1>
        <?php 
        if (has_post_thumbnail()) :
          the_post_thumbnail('blog', array('class' => 'imagen-des'));   
        endif;
        ?>

        <?php
        // Check if Custom Type is Classes
        if (get_post_type() === 'gymfitness_clases' ) {

          $hora_inicio = get_field('starting_hour');
          $hora_fin = get_field('endin  g_time');
        ?>
          <p class="informacion-clase"><?php the_field('class_day'); ?> - <?php echo $hora_inicio . ' to ' . $hora_fin; ?></p>
        <?php
        }
        ?>

        <?php the_content(); ?>


<?php endwhile; ?>