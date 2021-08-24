<?php get_header(); ?>

<main class="container page section">
  <?php
    $category_id = get_queried_object()->ID;
    $category_name = get_queried_object()->name;
    // $category_description = category_description($category_id);
    $category_description = get_queried_object()->description;
  ?>

  <h2 class="primary-text text-center">
    Category: <?php echo $category_name; ?>
  </h2>

  <p class="text-center"><?php echo $category_description; ?></p>

  <?php get_template_part('template-parts/blog', 'loop') ?>
</main>

<?php get_footer(); ?>