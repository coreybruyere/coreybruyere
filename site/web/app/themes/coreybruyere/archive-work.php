<section class="section">
  <?php
    // Hero Block
    get_template_part('templates/hero', get_post_type());
  ?>
</section><!-- /.section -->

<section class="section">
  <div class="l-container">
    <?php if (!have_posts()) : ?>
      <div class="l-block l-block--top">
        <div class="alert alert--error">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      </div>
    <?php endif; ?>

    <?php $count = 0; ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="<?php echo (++$count % 2 == 0) ? 's-even' : 's-odd'; ?>">
        <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
      </div>
    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>
  </div>
</section><!-- /.section -->