<section class="section">
  <?php
    // Hero Block
    get_template_part('templates/hero', get_post_type());
  ?>
</section>

<section class="section">
  <div class="l-container">
    <div class="l-block l-block--top">
      <img class="l-figure l-block" src="<?php echo get_bloginfo('template_directory');?>/assets/images/Milhouse.png">
      <div class="alert alert--error">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    </div>
  </div>
</section>
