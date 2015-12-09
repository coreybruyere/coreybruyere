
<?php if( have_rows('promo_content') ): ?>

  <div class="l-container l-container--wide">

    <div class="l-grid l-two-up@md">
    <?php while( have_rows('promo_content') ): the_row(); ?>
    <?php
      $promo_title = get_sub_field('promo_title');
      $promo_desc  = get_sub_field('promo_description');
      $promo_icon  = get_sub_field('promo_icon');
    ?>
      <div class="l-grid__item">
        <article class="l-media callout">
          <svg class="l-media__left callout__icon" role="img" aria-labelledby="<?php echo $promo_title; ?>-icon">
            <title id="<?php echo $promo_title; ?>-icon"><?php echo $promo_title; ?> <?php _e('Icon', 'sage'); ?></title>
            <use xlink:href="#icon-<?php echo $promo_icon; ?>"></use>
          </svg>
          <div class="l-media__body">
            <h3 class="u-h2"><?php echo $promo_title; ?></h3>
            <?php echo $promo_desc; ?>
          </div>
        </article>
      </div>
    <?php endwhile; ?>
    </div><!-- /.l-grid -->

    <?php if( have_rows('promo_buttons') ): ?>
      <div class="l-block l-block--top">
        <div class="l-this-or-this">
          <?php $i = 0; ?>
          <?php while( have_rows('promo_buttons') ): the_row(); ?>
            <?php
              $promo_btn_text = get_sub_field('button_text');
              $promo_btn_link = get_sub_field('button_link');
            ?>
            <div class="l-this-or-this__this">
              <a href="<?php echo $promo_btn_link; ?>" class="btn btn--secondary"><?php echo $promo_btn_text; ?></a>
            </div>
            <?php if (!$i++): ?>
              <span class="l-this-or-this__or"><?php _e('Or', 'sage'); ?></span>
            <?php endif; ?>
          <?php endwhile; ?>
        </div>
      </div><!-- /.l-block-top -->
    <?php endif; ?>

  </div><!-- /.l-container -->
<?php endif; ?>
