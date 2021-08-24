<?php get_header(); ?>

<main class="container page section">
  <?php
    $year = get_query_var('year');
    $monthnum = get_query_var('monthnum');
    $day = get_query_var('day');
    $month = $GLOBALS['wp_locale']->get_month($monthnum);

    $date = $month . " " . $day . ", " . $year;
    if ($day === 0 && $monthnum === 0) {
      $date = $year;
    } elseif ($day === 0) {
      $date = $month . " " . $year;
    }
  ?>

  <h2 class="primary-text text-center">
    Date: <?php echo $date; ?>
  </h2>

  <?php get_template_part('template-parts/blog', 'loop') ?>
</main>

<?php get_footer(); ?>