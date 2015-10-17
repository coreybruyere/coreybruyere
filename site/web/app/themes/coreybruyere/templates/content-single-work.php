<section class="section">
  <?php
    // Hero Block
    get_template_part('templates/hero', get_post_type());
  ?>
</section><!-- /.section -->

<section class="section">
  <div class="l-container">
    <div class="l-block l-block--top">
      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
          <div class="entry-content">
            <?php $feat_desc = get_field('featured_item_description'); ?>
            <?php echo $feat_desc; ?>
          </div>
          <footer>
            <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
          </footer>
          <?php comments_template('/templates/comments.php'); ?>
        </article>
      <?php endwhile; ?>
    </div>
  </div>
</section><!-- /.section -->