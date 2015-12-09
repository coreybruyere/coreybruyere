
<?php $feat_img_lg    = get_field('full_display_featured_image'); ?>
<?php $feat_img_md    = get_field('medium_display_featured_image'); ?>
<?php $feat_img_sm    = get_field('small_display_featured_image'); ?>
<?php $feat_desc      = get_field('featured_item_description'); ?>
<?php $feat_site      = get_field('site_link_url'); ?>
<?php $feat_year      = get_field('year_completed'); ?>
<?php $feat_team      = have_rows('site_team'); ?>
<?php $feat_title     = get_the_title(); ?>

<article class="card" id="<?php echo sanitize_title_with_dashes($feat_title); ?>">
  <figure class="card__media l-intrinsic l-intrinsic--16x9">
    <img class="l-intrinsic__item" src="<?php echo $feat_img_lg['sizes']['featured-full-2x']; ?>" alt="<?php echo $feat_img_lg['alt']; ?>">
  </figure>
  <div class="card__content">
    <small class="u-h5 u-muted u-margin-b-none"><?php echo $feat_year; ?></small>
    <h3 class="card__title">
      <?php the_title(); ?>
    </h3>
    <div>
      <?php echo $feat_desc; ?>
    </div>
    <div class="l-inline-list u-clearfix">
      <?php if (have_rows('site_team')): ?>
        <?php get_template_part('templates/feature-team-list'); ?>
      <?php endif; ?>
      <?php if (have_rows('personal_role')): ?>
        <?php get_template_part('templates/feature-role'); ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="card__action">
    <?php if ($feat_site): ?>
      <a class="btn btn--small btn--secondary" href="<?php echo $feat_site; ?>">
        <svg class="icon icon--sm" role="img" aria-labelledby="go-to-icon">
          <title id="go-to-icon"><?php _e('Go To:', 'sage'); ?></title>
          <use xlink:href="#icon-link"></use>
        </svg>
        <span><?php _e('View Website', 'sage'); ?></span>
      </a>
    <?php endif; ?>
  </div>
</article>



