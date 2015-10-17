<ul class="l-blank-list l-block">
  <?php
    $cat = array(
      'orderby' => 'name',
      'order' => 'ASC',
      'number' => 20
    );
  ?>
  <?php $categories = get_categories($cat); ?>
  <?php foreach($categories as $category): ?>
    <li class="cat-tag cat-tag--<?php echo $category->category_nicename; ?>">
      <a class="cat-tag__link" href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
    </li>
  <?php endforeach; ?>
</ul>
