<?php

function gymfitness_lista_clases($cantidad = -1) {
?>
  <ul class="lista-clases">
    <?php
      $args = array(
        'post_type' => 'gymfitness_clases',
        'posts_per_page' => $cantidad,
        'orderby'  => 'title',
        'order' => 'ASC'
      );
      $clases = new WP_Query($args);
      while($clases->have_posts()): $clases->the_post();
    ?>
      <li class="clase card gradient">
        <?php the_post_thumbnail('mediumx'); ?>
        <div class="contenido">
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          <?php
          $hora_inicio = get_field('starting_hour');
          $hora_fin = get_field('ending_time');
          ?>
          <p><?php the_field('class_day'); ?> - <?php echo $hora_inicio . ' to ' . $hora_fin; ?></p>
        </div>
      </li>
    <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </ul>
<?php
}

?>