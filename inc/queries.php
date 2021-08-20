<?php
function wp_gym_classes_list() { ?>
  <ul class="classes-list">
    <?php
      $args = array(
        'post_type' => 'wp_gym_classes'
      );

      // Use WP_Query and append the results into $classes
      $classes = new WP_Query($args);

      while ($classes->have_posts()): $classes->the_post();
    ?>

      <h3><?php the_title(); ?></h3>

    <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php } ?>