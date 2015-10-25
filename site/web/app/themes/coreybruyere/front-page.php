

<section class="section">
  <?php
    // Hero Block
    get_template_part('templates/hero', get_post_type());
  ?>
</section><!-- /.section -->

<section class="section">
  <?php
    // Front Page Promo Block
    get_template_part('templates/front-promo');
  ?>
</section><!-- /.section -->

<section class="section">
  <?php
    // Tabs
    get_template_part('templates/tabs');
  ?>

  <div class="l-block">
    <div class="l-grid l-grid--trim l-two-up@md u-bg-color-light">

      <?php
        // Set up custom post WP_query
        $custom_query = new WP_Query(array(
          'post_type'      => 'work',
          'posts_per_page' => 4
        ));
      ?>
      <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        <div class="l-grid__item">
          <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        </div>
      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>


    </div><!-- /.l-grid -->
  </div><!-- /.l-block -->

  <div class="l-block l-block--top u-text-center">
    <a class="btn" href="<?php echo get_post_type_archive_link('work'); ?>"><?php _e('View All Work', 'sage'); ?></a>
  </div><!-- /.l-block-top -->
</section><!-- /.section -->

<section class="section">
  <div class="l-container l-container--wide">
    <div class="l-block l-block--top">
      <div class="l-media callout">
        <svg class="l-media__left callout__icon icon" role="img" aria-labelledby="pencil-icon">
          <title id="pencil-icon"><?php _e('Pencil', 'sage'); ?></title>
          <use xlink:href="#icon-pencil2"></use>
        </svg>
        <div class="l-media__body">
          <h2 class="u-margin-all-none"><?php _e('Latest Writing', 'sage'); ?></h2>
          <?php
            // Category Tags
            get_template_part('templates/cat-tag', get_post_type() != 'post' ? get_post_type() : get_post_format());
          ?>
        </div>
      </div><!-- /.media /.callout -->
    </div><!-- /.l-block-top -->

    <div class="l-container">

      <article class="post" id="post-placehold">
        <h3>'Hello World' + more post coming soon...</h3>
      </article>
<!--       <?php
        // Set up WP_query
        $wp_query = new WP_Query(array(
          'order'          => 'DESC',
          'posts_per_page' => 2,
          'paged' => $paged
        ));
      ?>
      <?php $count = 0; ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="<?php echo (++$count % 2 == 0) ? 's-even' : 's-odd'; ?>">
          <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        </div>
      <?php endwhile; ?> -->

    </div><!-- /.l-container -->
  </div><!-- /.l-container -->

  <?php wp_reset_postdata(); ?>



<!--   <div class="l-block l-block--top u-text-center">
    <a class="btn" href="<?php echo get_page_link(9); ?>"><?php _e('View More Posts', 'sage'); ?></a>
  </div> --><!-- /.l-block-ends -->

</section><!-- /.section -->

