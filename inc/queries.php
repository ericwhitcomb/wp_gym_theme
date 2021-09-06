<?php
// classes list query
function wp_gym_blog_entries_list($number_of_entries = -1) { ?>
  <ul class="blog-entries">
    <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number_of_entries
      );

      // Use WP_Query and append the results into $classes
      $posts = new WP_Query($args); 
      while ($posts->have_posts()): $posts->the_post();
    ?>

      <?php get_template_part('template-parts/blog', 'item') ?>

    <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php } ?>

<?php
// classes list query
function wp_gym_classes_list($number_of_classes = -1) { ?>
  <ul class="classes-list">
    <?php
      $args = array(
        'post_type' => 'wp_gym_classes',
        'posts_per_page' => $number_of_classes,
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

<?php
// instructors list query
function wp_gym_instructors_list($number_of_instructors = -1) { ?>
  <ul class="instructors-list">
    <?php 
      $args = array(
        'post_type' => 'wp_gym_instructors',
        'posts_per_page' => $number_of_instructors,
        'order' => 'ASC'
      );

      // Use WP_Query and append the results into $instructors
      $instructors = new WP_Query($args);
      while($instructors->have_posts()): $instructors->the_post();
    ?>

      <li class="instructor-item">
        <?php the_post_thumbnail('medium_size'); ?>
        
        <div class="content text-center">
          <h3><?php the_title(); ?></h3>
          <?php the_content(); ?>

          <div class="specialties">
            <?php $specialties = get_field('specialties'); ?>
            <?php foreach ($specialties as $specialty): ?>
              <span class="tag"><?php echo $specialty; ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </li>
    <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php } ?>

<?php
// testimonials list query
function wp_gym_testimonials_list($number_of_testimonials = -1) { ?>
  <ul class="testimonials-list">
    <?php 
      $args = array(
        'post_type' => 'wp_gym_testimonials',
        'posts_per_page' => $number_of_testimonials,
        'order' => 'ASC'
      );

      // Use WP_Query and append the results into $instructors
      $testimonials = new WP_Query($args);
      while($testimonials->have_posts()): $testimonials->the_post();
    ?>

      <li class="testimonial-item text-center">

        <blockquote>
          <?php the_content(); ?>
        </blockquote>
        
        <footer class="testimonial-footer">
          <?php the_post_thumbnail('thumbnail'); ?>
          <p><?php the_title(); ?></p>
        </footer>
      </li>
    <?php endwhile; wp_reset_postdata(); ?>
  </ul>
<?php } ?>