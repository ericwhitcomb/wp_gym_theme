<?php get_header(); ?>

<main class="container page section">
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

          <p class="date-published">
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