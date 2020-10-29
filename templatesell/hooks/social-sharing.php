<?php
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('docile_social_sharing')) :
    function docile_social_sharing($post_id)
    {
        $docile_url = get_the_permalink($post_id);
        $docile_title = get_the_title($post_id);
        $docile_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $docile_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $docile_title . '&url=' . $docile_url);
        $docile_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $docile_url);
        $docile_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $docile_url . '&media=' . $docile_image . '&description=' . $docile_title);
        $docile_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $docile_title . '&url=' . $docile_url);
        
        ?>
        <div class="meta_bottom">
            <div class="post-share">
                <a target="_blank" href="<?php echo $docile_facebook_sharing_url; ?>"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="<?php echo $docile_twitter_sharing_url; ?>"><i
                            class="fa fa-twitter"></i></a>
                <a target="_blank" href="<?php echo $docile_pinterest_sharing_url; ?>"><i
                            class="fa fa-pinterest"></i></a>
                <a target="_blank" href="<?php echo $docile_linkedin_sharing_url; ?>"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <?php
    }
endif;
add_action('docile_social_sharing', 'docile_social_sharing', 10);