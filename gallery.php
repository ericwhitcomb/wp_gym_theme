<?php
/*
 * Template Name: Gallery
 */
?>

<?php get_header(); ?>

<main class="container page section">
  <?php while(have_posts()): the_post(); ?>
  
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    
    <?php 
      $gallery = get_post_gallery(get_the_ID(), false);

      $image_ids = explode(",", $gallery['ids']);
    ?>

    <ul class="gallery-images">
      <?php 
        $i = 0;
        foreach ($image_ids as $id):
          $size = ($i === 3) || ($i === 6) ? 'portrait' : 'square';
          $image = wp_get_attachment_image_src($id, $size);
      ?>

      <img src="<?php echo $image[0]; ?>" />

      <?php $i++; endforeach; ?>
    </ul>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>