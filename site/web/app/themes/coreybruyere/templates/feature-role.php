<div class="u-margin-r-xxl">
  <h3 class="u-h4 u-margin-all-none"><?php _e('Role', 'sage'); ?></h3>
  <ul class="l-blank-list">
    <?php while (have_rows('personal_role')): the_row(); ?>
      <?php
        $feat_role_title = get_sub_field('role_title');
      ?>
      <li>
        <?php echo $feat_role_title; ?>
      </li>
    <?php endwhile; ?>

  </ul>
</div>
