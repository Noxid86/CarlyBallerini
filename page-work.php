<?php get_header(); ?>

<div class="videos">
    <?php
      $args =  array( 'post_type' => 'video', 'posts_per_page' => 8);
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ): $loop->the_post();
      the_content();
      endwhile;
    ?>
</div>

<?php get_footer(); ?>
