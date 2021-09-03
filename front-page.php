<?php get_header('front'); ?>
  <?php while(have_posts()): the_post(); ?>

  <!-- Welcome Section -->
  <?php
    $welcome_heading = get_field('welcome_heading');
    $welcome_text = get_field('welcome_text');
  ?>
  <section class="welcome section text-center">
    <h2><?php echo $welcome_heading; ?></h2>
    <p><?php echo $welcome_text; ?></p>
  </section>

  <?php endwhile; ?>
<?php get_footer(); ?>