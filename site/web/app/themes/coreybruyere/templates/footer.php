<footer class="site-footer" role="contentinfo">
  <div class="l-container l-container--wide">
    <div class="l-flag l-flag--bottom">
      <div class="l-flag__image">
        <a class="branding u-shim-b-none" href="<?= esc_url(home_url('/')); ?>">
          <svg class="branding__logo  icon" role="img" aria-labelledby="branding">
            <title id="branding"><?php echo get_bloginfo(); ?> <?php _e('Logo', 'sage'); ?></title>
            <use xlink:href="#icon-logo-small"></use>
          </svg><!-- /.branding__logo -->
        </a><!-- /.branding -->
      </div><!-- /.l-flag__image -->

      <div class="l-flag__body">
        <div class="site-footer__wrap">
          <div><small>&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo(); ?></small></div>
          <div>
            <ul class="l-inline-list l-blank-list">
              <?php
                $groupID='91';
                $custom_field_keys = get_post_custom_keys($groupID);
              ?>
              <?php foreach ( $custom_field_keys as $key => $fieldkey ) : ?>
                <?php if (stristr($fieldkey,'field_')) : ?>
                  <?php
                    $field      = get_field_object($fieldkey, $groupID);
                    $field_name = $field['name'];
                    $field_val  = get_field($field_name, 'option');
                  ?>

                  <li class="u-shim-r-sm">
                    <a class="alt-link" href="<?php echo $field_val; ?>">
                      <svg class="icon icon--md" role="img" aria-labelledby="<?php echo $field_name; ?>-icon">
                        <title id="<?php echo $field_name; ?>-icon"><?php echo $field_name; ?> <?php _e('Icon', 'sage'); ?></title>
                        <use xlink:href="#icon-<?php echo $field_name; ?>"></use>
                      </svg>
                    </a>
                  </li>

                <?php endif; ?>
              <?php endforeach; ?>

            </ul>
          </div>
        </div>
      </div><!-- /.l-flag__body -->
    </div><!-- /.l-flag -->
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div><!-- /.l-container -->
</footer><!-- /.site-footer -->
