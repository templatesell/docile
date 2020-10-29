<?php
/**
 * Docile highlights Unique
 * @since Docile 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $docile_theme_options;
$promo_cat = absint($docile_theme_options['docile-promo-select-category']);
$title = esc_html($docile_theme_options['docile_highlights_title']);

if( $promo_cat > 0 && is_home() )
{ ?>
    <section class="news__highlight__wrapper mb-4">
        <?php if ( is_front_page() && is_home() )
        {  ?>
            <div class="container-fluid">
                <div class="docile-promo-highlights">
                    <h2 class="title-highlight text-center mb-5">
                        <?php echo esc_html($title); ?>
                    </h2>
                </div>
                <div class="news__highlight">
                    <?php
                    $args = array(
                        'cat' => $promo_cat ,
                        'posts_per_page' => 5,
                        'ignore_sticky_posts' => true,
                    );
                    
                    $query = new WP_Query($args);
                    
                    if($query->have_posts()):                        
                        while($query->have_posts()):
                            $query->the_post();
                            ?>
                            <div class="highlights pr-3 pl-3">                            
                                <div class="card__post">
                                    <div class="card__post__body">
                                        <?php if(has_post_thumbnail()){ ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large'); ?>
                                        </a>
                                        <?php } else{ ?>
                                        <div class="no-image"></div>
                                        <?php } ?>
                                        <div class="card__post__content bg__post-cover">    
                                            <div class="card__post__category">
                                                <?php docile_list_category(get_the_ID()); ?>
                                            </div>

                                            <div class="card__post__title">
                                              <h3 class="mb-2">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                              </h3>
                                            </div>
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                  <li class="list-inline-item">
                                                    <a href="#">
                                                      <?php docile_posted_by(); ?>
                                                    </a>
                                                  </li>
                                                  <li class="list-inline-item">
                                                    <span>
                                                      <?php docile_posted_on(); ?>
                                                    </span>
                                                  </li>
                                                </ul>
                                            </div>
                                            <div class="card__post__text mb-2">
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php } ?>
    </section>
<?php   }