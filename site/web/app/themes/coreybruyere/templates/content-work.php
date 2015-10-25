
<?php $feat_img_full  = get_field('full_featured_image'); ?>
<?php $feat_img_clip  = get_field('clipped_feature_image'); ?>
<?php $feat_img_color = get_field('background_blend_color'); ?>
<?php $feat_desc      = get_field('featured_item_description'); ?>
<?php $feat_site      = get_field('site_link_url'); ?>
<?php $feat_year      = get_field('year_completed'); ?>
<?php $feat_team      = have_rows('site_team'); ?>
<?php $feat_title     = get_the_title(); ?>
<?php $feat_arch_link = get_post_type_archive_link('work') . '#' . sanitize_title_with_dashes($feat_title); ?>

<article class="feature<?php echo is_front_page() ?  ' u-margin-all-none' : ' post u-bg-color-none'; ?>" id="<?php echo sanitize_title_with_dashes($feat_title); ?>">
  <div class="feature__item">
    <div class="feature__text<?php echo is_front_page() ?  ' feature__text--positioned' : ''; ?>">
      <?php if (!is_front_page()): ?>
        <div class="u-h5 u-muted u-margin-b-none"><?php echo $feat_year; ?></div>
      <?php endif; ?>
      <h2 class="u-margin-b-sm">
        <?php if (is_front_page()): ?>
          <a class="alt-link" href="<?php echo $feat_arch_link; ?>"><?php the_title(); ?></a>
        <?php else: ?>
          <?php the_title(); ?>
        <?php endif; ?>
      </h2>
      <?php if (is_front_page()): ?>
        <a class="btn btn--ghost btn--small" href="<?php echo $feat_arch_link; ?>"><?php _e('View Project', 'sage'); ?></a>
      <?php endif; ?>
    </div>

    <figure class="u-margin-all-none">
      <picture class="<?php echo is_front_page() ?  'u-muted' : ''; ?>">
        <!--[if IE 9]><video style="display: none;"><![endif]-->
        <!-- img served to LRG & up viewports - standard and retina -->
        <source srcset="<?php echo $feat_img_full['sizes']['featured-full-1x']; ?>, <?php echo $feat_img_full['sizes']['featured-full-2x']; ?> 2x" sizes="50vw" media="(min-width: 48em)">

        <!-- img served to MED to LRG viewports - standard and retina -->
        <source srcset="<?php echo $feat_img_clip['sizes']['featured-clip-1x']; ?>, <?php echo $feat_img_clip['sizes']['featured-clip-2x']; ?> 2x" sizes="50vw" media="(min-width: 20em)">
        <!--[if IE 9]></video><![endif]-->

        <!--[if lt IE 9]>
        <img src="<?php echo $feat_img_full['sizes']['featured-full-1x']; ?>" class="img--natural" alt="Image Description">
        <![endif]-->

        <!--[if !lt IE 9]><!-->
        <img srcset="<?php echo $feat_img_full['sizes']['featured-full-1x']; ?>, <?php echo $feat_img_full['sizes']['featured-full-2x']; ?> 2x"  alt="<?php echo $feat_img_full['alt']; ?>"/>
        <!-- <![endif]-->
      </picture>
    </figure>

    <?php if (!is_front_page()) : ?>
      <div class="feature__info">
        <div>
          <?php echo $feat_desc; ?>
        </div>
        <div class="l-inline-list u-clearfix">
          <?php get_template_part('templates/feature-team-list'); ?>
          <?php get_template_part('templates/feature-role'); ?>
          <?php if ($feat_site): ?>
            <a class="btn btn--secondary u-float-right" href="<?php echo $feat_site; ?>">
              <svg class="icon icon--sm" role="img" aria-labelledby="go-to-icon">
                <title id="go-to-icon"><?php _e('Go To:', 'sage'); ?></title>
                <use xlink:href="#icon-link"></use>
              </svg>
              <span><?php echo the_title(); ?></span>
            </a>
          <?php endif; ?>
        </div>
      </div><!-- /.feature__info -->
    <?php endif; ?>
  </div><!-- /.feature__item -->

  <?php if (is_front_page()) : ?>
    <?php if ($feat_img_color) : ?>
    <?php
      $hex = $feat_img_color;
      $opacity = '1';
      list($r, $g, $b) = sscanf($hex, '#%02x%02x%02x');
    ?>
    <span class="feature__after" style="background-image: none; background-color: rgba(<?php echo $r .','. $g .','. $b .','. $opacity; ?>"></span>
    <?php endif; ?>
  <?php endif; ?>

</article><!-- /.feature -->




