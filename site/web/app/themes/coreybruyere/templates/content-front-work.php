
<?php $feat_img_lg    = get_field('full_display_featured_image'); ?>
<?php $feat_img_md    = get_field('medium_display_featured_image'); ?>
<?php $feat_img_sm    = get_field('small_display_featured_image'); ?>
<?php $feat_desc      = get_field('featured_item_description'); ?>
<?php $feat_site      = get_field('site_link_url'); ?>
<?php $feat_year      = get_field('year_completed'); ?>
<?php $feat_team      = have_rows('site_team'); ?>
<?php $feat_title     = get_the_title(); ?>
<?php $feat_arch_link = get_post_type_archive_link('work') . '#' . sanitize_title_with_dashes($feat_title); ?>

<article class="feature feature--decor">
  <div class="l-container l-container--wide">
    <div class="l-block u-clearfix">
      <div class="u-float-left">
        <h3 class="feature__title">
          <a class="alt-link" href="<?php echo $feat_arch_link; ?>"><?php the_title(); ?></a>
        </h3>
        <a class="btn btn--small btn--secondary" href="<?php echo $feat_arch_link; ?>"><?php _e('View Project', 'sage'); ?></a>
      </div>
    </div>
    <div class="display">
      <div class="display__item display__item--lg">
        <div class="display__view">
          <img src="<?php echo $feat_img_lg['url']; ?>" srcset="<?php echo $feat_img_lg['sizes']['featured-full-3x']; ?> 3x" sizes="13vw" alt="<?php echo $feat_img_lg['url']; ?>">
        </div>
      </div>
      <div class="display__item display__item--md">
        <div class="display__view display__view--pull">
          <img src="<?php echo $feat_img_md['url']; ?>" srcset="<?php echo $feat_img_md['sizes']['featured-full-3x']; ?> 3x" sizes="23vw" alt="<?php echo $feat_img_md['url']; ?>">
        </div>
      </div>
      <div class="display__item display__item--sm">
        <div class="display__view display__view--pull">
          <img src="<?php echo $feat_img_sm['url']; ?>" srcset="<?php echo $feat_img_sm['sizes']['featured-full-3x']; ?> 3x" sizes="(min-width: 34.375em) 64vw, 100vw" alt="<?php echo $feat_img_sm['url']; ?>">
        </div>
      </div>
    </div>
  </div><!-- /.l-container -->
</article><!-- /.feature -->




