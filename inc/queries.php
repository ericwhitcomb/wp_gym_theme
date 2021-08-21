<?php
function wp_gym_classes_list() { ?>
  <ul class="classes-list">
    <?php
      $args = array(
        'post_type' => 'wp_gym_classes',
        'order' => 'ASC'
      );

      // Use WP_Query and append the results into $classes
      $classes = new WP_Query($args); 
      while ($classes->have_posts()): $classes->the_post();
    ?>

      <li class="gym-class card gradient">
        <?php the_post_thumbnail('medium_size'); ?>

        <div class="card-content">
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          
          <?php 
            $class_days = get_field('class_days');
            $start_time = get_field('start_time');
            $end_time = get_field('end_time');
          ?>
          <p><?php echo $class_days . ' - ' . $start_time . ' to ' . $end_time;?></p>
        </div>
      </li>

    <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php } ?>