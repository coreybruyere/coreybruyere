<form role="search" method="get" class="form search-form" action="<?= esc_url(home_url('/')); ?>">
  <label class="u-hide-visually"><?php _e('Search for:', 'sage'); ?></label>
  <div class="form__group u-clearfix">
    <input type="search" value="<?= get_search_query(); ?>" name="s" placeholder="<?php _e('Search', 'sage'); ?> <?php bloginfo('name'); ?>" required>
    <button type="submit" class="btn"><?php _e('Search', 'sage'); ?></button>
  </div>
</form>
