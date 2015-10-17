<section class="section">
  <?php
    // Hero Block
    get_template_part('templates/hero', get_post_type());
  ?>
</section><!-- /.section -->

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
