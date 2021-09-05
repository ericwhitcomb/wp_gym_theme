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

  <!-- Areas Section -->
  <?php
    // This may seem like overkill, but this allows for new areas
    // to be added and only the css would need to be updated.
    $areas = Array();
    $i = 1;
    echo get_field('area_5');
    while (true) {
      $area = get_field('area_' . $i);
      if ($area === null) break;
      array_push($areas, $area);
      $i++;
    }
  ?>
  <section class="areas">
    <ul class="areas-list">
      <?php foreach ($areas as $area): ?>
      <li class="area-item">
        <img src="<?php echo wp_get_attachment_image_src(
              $area['area_image'], 
              'medium_size')[0]; ?>">
        <p><?php echo $area['area_name']; ?>
      </li>
      <?php endforeach; ?>
    </ul>
  </section>

  <!-- Classes Section -->
  <?php
    $classes_title = get_field('classes_title');
    $classes_button_label = get_field('classes_button_label');
    $classes_url = get_permalink(get_page_by_title('Classes'));
  ?>
  <section class="classes">
    <div class="container section">
      <h2 class="text-center"><?php echo $classes_title; ?></h2>
      
      <?php wp_gym_classes_list(4); ?>
      
      <div class="button-container align-right">
        <a class="button" href="<?php echo $classes_url; ?>">
          <?php echo $classes_button_label; ?>
        </a>
      </div>
    </div>
  </section>

  <!-- Instructors Section -->
  <?php 
    $instructors_title = get_field('instructors_title');
    $instructors_blurb = get_field('instructors_blurb');
  ?>
  <section class="instructors">
    <div class="container section">
      <h2 class="text-center"><?php echo $instructors_title; ?></h2>
      <p class="text-center"><?php echo $instructors_blurb; ?></p>
      
      <?php wp_gym_instructors_list(4); ?>
    </div>
  </section>

  <!-- Testimonials Section -->
  <?php
    $testimonials_title = get_field('testimonials_title');
  ?>
  <section class="testimonials">
    <div class="container">
      <h2 class="text-center"><?php echo $testimonials_title; ?></h2>

      <?php wp_gym_testimonials_list(3); ?>
    </div>
  </section>

  <?php endwhile; ?>
<?php get_footer(); ?>