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
      <div class="col-md-12 col-sm-12 align-self-center">
        <div class="trending-news">
          <div class="trending-news-inner">
                    <div class="title">
                        <i class="fa fa-bolt"></i>
                        <strong><?php echo esc_html('Trending', 'docile'); ?></strong>
                    </div>
                    <div class="trending-news-slider">
                        <?php 
                        $args = array(
                  'post_type' => 'post',
                  'orderby' => 'comment_count',
                  'post_per_page'=> 10,
                  'cat' => $trending_id,
              
              );
              // the query
              $the_query = new WP_Query( $args ); 
              if ( $the_query->have_posts()):
              while($the_query->have_posts())
                : $the_query->the_post(); ?>

                        <div class="item-single">
                            <a href="javascript:void(0)">
                              <?php the_title(); ?>
                            </a>
                        </div>
                        <?php endwhile; wp_reset_postdata(); endif; ?>
                      </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<!-- End Tranding news carousel -->