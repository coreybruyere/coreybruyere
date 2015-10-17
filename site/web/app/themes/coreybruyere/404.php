


<?php
  // Hero Block
  get_template_part('templates/hero', get_post_type());
?>
<div class="l-container">

  <div class="l-block l-block--top">
    <div class="alert alert--error">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
  </div>

</div>
