
        <li class="card gradient">
          <?php the_post_thumbnail('mediumx'); ?>
          <?php the_category(); ?>
          <div class="contenido">
            <a href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            <p class="meta">
              <span>By: </span>
              <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                <?php echo get_the_author_meta('display_name'); ?>
              </a>
              
              <p class="meta">
                <span>Date:</span>
                <?php the_time(get_option('date_format')); ?>
              </p>
            </p>
           
          </div>
        </li>
      