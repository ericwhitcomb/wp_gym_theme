
    <li class="blog-entry card gradient">
      <?php the_post_thumbnail('medium_size'); ?>

      <?php the_category(); ?>

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
          <?php 
            $year = get_the_time( 'Y' );
            $month = get_the_time( 'm' );
            $day = get_the_time( 'd' );
            $date_url = get_day_link($year, $month, $day);
          ?>
          <span>Date: 
            <a href="<?php echo esc_url($date_url); ?>">
              <?php the_time(get_option('date_format')) ?>
            </a>
          </span>
        </p>
      </div>
    </li>