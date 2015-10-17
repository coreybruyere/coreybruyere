<?php if( have_rows('tab_item') ): ?>
<ul class="tabs">
  <?php while( have_rows('tab_item') ): the_row(); ?>
  <?php
    $tab_text  = get_sub_field('tab_text');
    $tab_link  = get_sub_field('tab_link');
    $tab_img   = get_sub_field('tab_image');
  ?>
  <li>
    <a class="tabs__link" href="<?php echo $tab_link; ?>">
      <?php if ($tab_img): ?>
        <img class="tabs__media img--natural" src="<?php echo $tab_img['url']; ?>" alt="<?php echo $tab_text; ?>">
      <?php else: ?>
        <?php echo $tab_text; ?>
      <?php endif; ?>
    </a>
  </li>
  <?php endwhile; ?>
</ul><!-- /.tabs -->
<?php endif; ?>