<?php use Roots\Sage\Titles; ?>

<?php $hero_bg_color = get_field('hero_background_color') ? : 'hero--primary'; ?>
<?php $hero_desc     = get_field('hero_description'); ?>
<?php $hero_sub      = get_field('hero_sub_title'); ?>

<div class="hero <?php echo $hero_bg_color; ?>">
  <?php if (get_field('hero_background') && !is_archive()) : ?>
  <div class="hero__media">
    <picture>
      <!--[if IE 9]><video style="display: none;"><![endif]-->
      <?php if (get_field('enable_webp')) : ?>
      <?php
        $hero_webp_1 = get_field('hero_webp_image_1x');
        $hero_webp_2 = get_field('hero_webp_image_2x');
        $hero_webp_3 = get_field('hero_webp_image_3x');
      ?>
      <!-- img served to LRG & up viewports - standard and retina with webp support -->
      <source srcset="<?php echo $hero_webp_2['url']; ?> 2x, <?php echo $hero_webp_3['url']; ?> 3x" sizes="100vw"  media="(min-width: 64em)" type="image/webp">
      <!-- img served to MED to LRG viewports - standard and retina with webp support -->
      <source srcset="<?php echo $hero_webp_1['url']; ?> 1x, <?php echo $hero_webp_3['url']; ?> 3x" sizes="100vw"  media="(min-width: 48em)" type="image/webp">
      <!-- img served to 0 to MED viewports - standard and retina with webp support -->
      <source srcset="<?php echo $hero_webp_1['url']; ?> 1x, <?php echo $hero_webp_2['url']; ?> 2x" sizes="100vw" type="image/webp">
      <?php endif; ?>

      <?php $hero_image = get_field('hero_background'); ?>
      <!-- img served to LRG & up viewports - standard and retina -->
      <source srcset="<?php echo $hero_image['sizes']['hero-2x'] ?> 2x, <?php echo $hero_image['sizes']['hero-3x'] ?> 3x" sizes="100vw"  media="(min-width: 64em)">
      <!-- img served to MED to LRG viewports - standard and retina -->
      <source srcset="<?php echo $hero_image['sizes']['hero-1x'] ?> 1x, <?php echo $hero_image['sizes']['hero-3x']; ?> 3x" sizes="100vw"  media="(min-width: 48em)">
      <!-- img served to 0 to MED viewports - standard and retina -->
      <source srcset="<?php echo $hero_image['sizes']['hero-1x'] ?> 1x, <?php echo $hero_image['sizes']['hero-2x']; ?> 2x" sizes="100vw">
      <!--[if IE 9]></video><![endif]-->

      <!--[if lt IE 9]>
      <img src="<?php echo $hero_image['sizes']['hero-2x']; ?>" alt="<?php echo $hero_image['alt']; ?>">
      <![endif]-->

      <!--[if !lt IE 9]><!-->
      <img srcset="<?php echo $hero_image['sizes']['hero-1x']; ?> 1x, <?php echo $hero_image['sizes']['hero-2x']; ?> 2x"  alt="<?php echo $hero_image['alt']; ?>"/>
      <!-- <![endif]-->
    </picture>
  </div><!-- /.hero__media -->
  <?php endif; ?>

  <div class="l-container l-container--wide">
    <h1 class="u-margin-b-none">
      <div class="hero__title"><?php echo is_front_page() ? get_bloginfo() : Titles\title() ?></div>
      <?php if (!is_archive()): ?>
      <div class="hero__sub"><?php echo $hero_sub; ?></div>
      <?php endif; ?>
    </h1>
    <?php if (!is_archive()): ?>
    <?php
      // Get markdown field and parse
      // $parse_down  = new Parsedown();
      // $hero_parsed = get_field('hero_description');
    ?>
    <div class="hero__desc"><?php echo $hero_desc; ?></div>
    <?php endif; ?>
  </div><!-- /.l-container -->
</div><!-- /.hero -->

<div class="slant" aria-hidden="true">
  <svg class="slant__upper" width="100%" viewBox="0 0 1080 60" preserveAspectRatio="none" role="presentation">
    <polygon fill="#acacac" points="1080,60 0,60 0,40 1080,0"></polygon>
  </svg>
  <svg class="slant__lower" width="100%" viewBox="0 0 1080 60" preserveAspectRatio="none" role="presentation">
    <polygon fill="#f1f1f1" points="1080,60 0,60 0,40 1080,0"></polygon>
  </svg>
</div><!-- /.slant -->

