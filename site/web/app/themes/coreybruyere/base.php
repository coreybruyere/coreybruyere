<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class('site'); ?>>
    <div id="svg" aria-hidden="true">
      <?php include_once("dist/images/svg/svgsprite.svg"); ?>
    </div>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="site-document" role="document">
      <main class="site-main" role="main" itemprop="mainContentOfPage">
        <?php include Wrapper\template_path(); ?>
      </main><!-- /.site-main -->
      <?php if (Config\display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include Wrapper\sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /role[document] -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>

