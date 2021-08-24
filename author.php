<?php get_header(); ?>

<main class="container page section">

  <?php
    $author_id = get_queried_object()->data->ID;
    $author_name = get_queried_object()->data->display_name;
    $author_bio = get_the_author_meta('description', $author_id);
  ?>
  <h2 class="primary-text text-center">
    Author: <?php echo $author_name ?>
  </h2>

  <p class="text-justify">Bio: <?php echo $author_bio; ?></p>

  <?php get_template_part('template-parts/blog', 'loop') ?>
</main>

<?php get_footer(); ?>