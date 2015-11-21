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
    <a href="mailto:hello@coreybruyere.com" class="btn btn--ghost tooltip js-graceful-toggle" data-tooltip="Copy email to clipboard" data-placement="bottom" data-trigger="hover"><?php _e('Contact', 'sage'); ?></a>
  </div>
</header>
