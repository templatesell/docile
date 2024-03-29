<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Docile
 */
global $docile_theme_options;
$show_content_from = esc_attr($docile_theme_options['docile-content-show-from']);
$read_more = esc_html($docile_theme_options['docile-read-more-text']);
$social_share = absint($docile_theme_options['docile-show-hide-share']);
$date = absint($docile_theme_options['docile-show-hide-date']);
$category = absint($docile_theme_options['docile-show-hide-category']);
$author = absint($docile_theme_options['docile-show-hide-author']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php docile_post_thumbnail(); ?>
                <?php 
                if( 1 == $social_share ){
                    do_action( 'docile_social_sharing' ,get_the_ID() );
                }
                ?>
            </div>
        <?php } ?>
        <div class="post-content">
            <?php if($category == 1 ){ ?>
                <div class="post-cats">
                    <?php docile_entry_meta(); ?>
                </div>
            <?php } ?>
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h5 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h5>');
                    ?>
                <?php endif; ?>
            </div>
            <div class="post-meta">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="post-date">
                        <div class="entry-meta">
                            <?php
                            if($date == 1 ){
                                docile_posted_on();
                            }
                            if($author == 1 ){
                                docile_posted_by();
                            }
                            ?>
                        </div><!-- .entry-meta -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'docile'),
                    'after' => '</div>',
                ));
                ?>
                <!-- read more -->
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i
                                class="fa fa-long-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article><!-- #post- -->