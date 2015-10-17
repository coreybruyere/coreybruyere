<?php if (have_rows('site_team')): ?>
  <div class="u-margin-r-xxl">
    <h3 class="u-h4 u-margin-all-none"><?php _e('Team', 'sage'); ?></h3>
    <ul class="l-blank-list">
      <?php while (have_rows('site_team')): the_row(); ?>
        <?php
          $feat_name = get_sub_field('site_name');
          $feat_role = get_sub_field('optional_team_role');
        ?>
        <li>
          <?php echo $feat_name; ?>
          <?php if($feat_role) : ?>
            <span class="u-muted"><?php echo $feat_role; ?></span>
          <?php endif; ?>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>