
<?php
  // Hero Block
  get_template_part('templates/hero', get_post_type());
?>
<div class="l-container">
  <?php if (!have_posts()) : ?>
    <div class="l-block l-block--top">
      <div class="alert alert--error">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    </div>
  <?php endif; ?>

  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'search'); ?>
  <?php endwhile; ?>

  <?php the_posts_navigation(); ?>
</div>


