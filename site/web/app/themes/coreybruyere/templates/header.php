<header class="site-header l-container l-container--wide" role="banner">
  <a class="branding" href="<?= esc_url(home_url('/')); ?>">
    <svg class="branding__logo  icon" role="img" aria-labelledby="branding">
      <title id="branding"><?php echo get_bloginfo(); ?> <?php _e('Logo', 'sage'); ?></title>
      <use xlink:href="#icon-logo-small"></use>
    </svg>
  </a>
  <div class="u-float-right">
    <nav class="nav" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class'     => 'l-blank-list'
        ]);
      endif;
      ?>
    </nav>
    <a href="mailto:hello@coreybruyere.com" class="btn btn--ghost tooltip js-graceful-toggle js-tooltip" id="js-graceful-btn" data-tooltip="Email was copied to clipboard" data-placement="bottom bottom-right" data-trigger="click" data-copy="hello@coreybruyere.com" data-toggle="js-graceful-btn"><?php _e('Contact', 'sage'); ?></a>
  </div>
</header>
