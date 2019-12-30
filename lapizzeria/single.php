<?php get_header(); ?>
<?php 
    while(have_posts()): the_post(); 
        get_template_part('template-parts/loop', 'contenido');

        // Comment
        comments_template();
    endwhile; ?>
<?php get_footer(); ?>