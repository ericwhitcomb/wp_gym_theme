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

  <ul class="blog-entries">
    <?php while (have_posts()): the_post(); ?>
      <li class="blog-entry card gradient">
        <?php the_post_thumbnail('medium_size'); ?>
        <div class="card-content">
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>

          <p class="meta">
            <?php 
              // saved these in variables just for easier reading
              $author_id = get_the_author_meta('ID');
              $author_name = get_the_author_meta('display_name');
              $author_url = get_author_posts_url($author_id);
            ?>
            <span>By: 
              <a href="<?php echo $author_url; ?>">
                <?php echo $author_name; ?></span>
              </a>
            </span>
          </p>

          <p class="date-published meta">
            <span>Date: 
              <a href="">
                <?php the_time(get_option('date_format')) ?>
              </a>
            </span>
          </p>
        </div>
      </li>
    <?php endwhile; ?>
  </ul>
</main>

<?php get_footer(); ?>