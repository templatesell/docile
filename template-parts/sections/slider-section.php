<?php 
/**
 * Docile Slider Function
 * @since Docile 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $docile_theme_options;
$slide_id = absint($docile_theme_options['docile-select-category']);
$slide_right_id = absint($docile_theme_options['docile-select-category-slider-right']);      
    $args = array(
			'posts_per_page' => 3,
			'paged' => 1,
			'cat' => $slide_id,
      'ignore_sticky_posts' => true,
			'post_type' => 'post'
		);
		$slider_query = new WP_Query($args);
		if ($slider_query->have_posts()): ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row no-gutters">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="modern-slider">
        				<?php while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                <div class="slider-items">
                  <div class="slide-wrap">
                  <?php if(has_post_thumbnail()){ ?>
                  <div class="img-cover">
                    <?php docile_post_thumbnail('docile-promo-post'); ?>
                  </div>
                <?php } else{ ?>
                  <div class="img-cover no-image-slider">
                  </div>
                <?php } ?>                
                      <div class="caption bg__post-cover">
                            <?php
                               $categories = get_the_category();
                               if ( ! empty( $categories ) ) {
                                  echo '<a class="post-category" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                              }                                 
                            ?>
                            <h2 class="mb-2">
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-meta">
                                <?php docile_posted_by(); ?>
                                <?php docile_posted_on(); ?>
                            </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="popular__news-right row no-gutters">
              <?php
              $r_args = array(
              'posts_per_page' => 4,
              'cat' => $slide_right_id,
              'ignore_sticky_posts' => true,
              'post_type' => 'post'
            );
            $slider_r_query = new WP_Query($r_args);
            if ($slider_r_query->have_posts()): while($slider_r_query->have_posts()) : $slider_r_query->the_post(); 
              $r_image_id = get_post_thumbnail_id();
                  $r_image_url = wp_get_attachment_image_src( $r_image_id,'',true );
              ?>

              <!-- Post Article -->
              <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card__post">
                  <div class="card__post__body card__post__right">
                       <?php if(has_post_thumbnail()){ ?>
                      <a href="<?php the_permalink();?>">
                          <?php the_post_thumbnail(); ?>
                      </a>
                    <?php }else{ ?> 
                        <div class="no-image-slider-right"></div>
                      <?php } ?>
                      <div class="card__post__content bg__post-cover">
                          <div class="card__post__category">
                              <?php
                               $categories = get_the_category();
                               if ( ! empty( $categories ) ) {
                                  echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                              }                                 
                            ?>
                          </div>
                          <div class="card__post__title">
                              <h5 class="mb-1">
                                  <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                              </h5>
                          </div>
                          <div class="card__post__author-info">
                              <ul class="list-inline">
                                  <li class="list-inline-item">
                                      <a href="#">
                                         <?php docile_posted_by();?>
                                      </a>
                                  </li>
                                  <li class="list-inline-item">
                                      <span>
                                          <?php docile_posted_on();?>
                                      </span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
              <!-- Post Article -->
             <?php endwhile; wp_reset_postdata();  endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>