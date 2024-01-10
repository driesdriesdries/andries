<div class="blog">
  <div class="top">
    <h5 class="text-accent">BLOG</h5>
    <h3>Read About </br><span class="text-accent">Insights and Learnings</span></h3>
  </div>  
  <div class="bottom">
    <?php
      $args = array(
        'posts_per_page' => 1,
        'post_status'    => 'publish',
      );
      $latest_post_query = new WP_Query($args);

      if ($latest_post_query->have_posts()) {
        while ($latest_post_query->have_posts()) {
          $latest_post_query->the_post();
          $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
          $categories = get_the_category();
          $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
          $post_title = get_the_title();
          $post_link = get_permalink();
          $post_date = get_the_date();
    ?>
    <div class="left">
      <?php if ($featured_image_url) : ?>
        <div class="featured_image" style="
          background: url('<?php echo esc_url($featured_image_url); ?>');
				  background-position: center;
				  background-size: cover;
        "></div>
      <?php endif; ?>
    </div>
    <div class="right">
      <div class="content-box">
        <p class="post-meta"><a href="<?php echo esc_url($post_link); ?>"><?php echo $category_name; ?></a> | 4 MINUTE READ</p>
        <h3 class="post-title"><a href="<?php echo esc_url($post_link); ?>"><?php echo $post_title; ?></a></h3>
        <p class="date"><?php echo $post_date; ?></p>
      </div>
    </div>
    <?php
        }
      }
      wp_reset_postdata();
    ?>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var blogContainer = document.querySelector('.blog');

  if (blogContainer) {
    blogContainer.addEventListener('mouseover', function (event) {
      if (event.target.closest('.post-title a')) {
        var featuredImage = blogContainer.querySelector('.featured_image');
        if (featuredImage) {
          featuredImage.style.transform = 'scale(1.1)';
        }
      }
    });

    blogContainer.addEventListener('mouseout', function (event) {
      if (event.target.closest('.post-title a')) {
        var featuredImage = blogContainer.querySelector('.featured_image');
        if (featuredImage) {
          featuredImage.style.transform = 'scale(1)';
        }
      }
    });
  }
});
</script>
