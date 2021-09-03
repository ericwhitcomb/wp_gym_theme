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

  <?php endwhile; ?>
<?php get_footer(); ?>