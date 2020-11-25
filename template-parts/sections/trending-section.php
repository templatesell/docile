<?php 
/**
 * Docile Trending Slide Function
 * @since Docile 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $docile_theme_options;
$trending_id = absint($docile_theme_options['docile-select-big-trending-category']);
      $args = array(
			'posts_per_page' => 9,
			'cat' => $trending_id,
      'ignore_sticky_posts' => true,
			'post_type' => 'post'
		);
?>	
    <!-- Tranding news  carousel-->
<section class="trending-news-two">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="marquee__inner">
          <div class="title">
              <i class="fa fa-bolt"></i>
              <strong><?php echo esc_html('Trending', 'docile'); ?></strong>
          </div>
          <div class="marquee-slide">
            <?php
            $trending_query = new WP_Query($args);
            if ( $trending_query->have_posts()):
            while($trending_query->have_posts())
            : $trending_query->the_post(); ?>
              
                <!-- Post Article -->
                  <?php if(has_post_thumbnail()){ ?>
                    <a href="<?php the_permalink();?>">
                      <?php the_post_thumbnail('thumbnail'); ?>
                      <?php the_title();?>
                    </a>
                  <?php }else{  ?>
                    <a href="<?php the_permalink();?>">
                      <div class="image-sm my-auto no-image-trending"></div>
                      <?php the_title();?>
                    </a>
                  <?php } ?>
            <?php endwhile; wp_reset_postdata(); endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Tranding news carousel -->