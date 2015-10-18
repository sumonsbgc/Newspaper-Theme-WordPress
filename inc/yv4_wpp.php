<?php
/*
 * Gets the excerpt using the post ID outside the loop.
 *
 * @author      Withers David
 * @link        http://uplifted.net/programming/wordpress-get-the-excerpt-automatically-using-the-post-id-outside-of-the-loop/
 * @param       int $post_id
 * @return      string
 */
function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if (count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '...');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';
    return $the_excerpt;
}


/*
 * Builds custom HTML
 *
 * With this function, I can alter WPP's HTML output from my theme's functions.php.
 * This way, the modification is permanent even if the plugin gets updated.
 *
 * @param   array   $mostpopular
 * @param   array   $instance
 * @return  string
 */
function my_custom_popular_posts_html_list( $mostpopular, $instance ){
    $output = '<ol class="wpp-list">';

    // loop the array of popular posts objects
    foreach( $mostpopular as $popular ) {

        $stats = array(); // placeholder for the stats tag

        // Comment count option active, display comments
        if ( $instance['thumbnail'] ) {
            $detect = new Mobile_Detect;
            if($detect->isMobile()){
                $size = 'thumbnail';
            }
            else if($detect->isTablet()){
                $size = 'square';
            }
            else{
                $size = 'thumbnail';
            }
            $thumbnail = "<div class = 'images-wrapper'>";
            $thumbnail .= get_the_post_thumbnail($popular->id,$size);
            $thumbnail .= "</div>";
        }
        if ( $instance['stats_tag']['comment_count'] ) {
            // display text in singular or plural, according to comments count
            $stats[] = '<span class="wpp-comments">' . sprintf(
                _n('1 comment', '%s comments', $popular->comment_count, 'wordpress-popular-posts'),
                number_format_i18n($popular->comment_count)
            ) . '</span>';
        }

        // Pageviews option checked, display views
        if ( $instance['stats_tag']['views'] ) {

            // If sorting posts by average views
            if ($instance['order_by'] == 'avg') {
                // display text in singular or plural, according to views count
                $stats[] = '<span class="wpp-views">' . sprintf(
                    _n('1 view per day', '%s views per day', intval($popular->pageviews), 'wordpress-popular-posts'),
                    number_format_i18n($popular->pageviews, 2)
                ) . '</span>';
            } else { // Sorting posts by views
                // display text in singular or plural, according to views count
                $stats[] = '<span class="wpp-views">' . sprintf(
                    _n('1 view', '%s views', intval($popular->pageviews), 'wordpress-popular-posts'),
                    number_format_i18n($popular->pageviews)
                ) . '</span>';
            }
        }

        // Author option checked
        if ($instance['stats_tag']['author']) {
            $author = get_the_author_meta('display_name', $popular->uid);
            $display_name = '<a href="' . get_author_posts_url($popular->uid) . '">' . $author . '</a>';
            $stats[] = '<span class="wpp-author">' . sprintf(__('by %s', 'wordpress-popular-posts'), $display_name). '</span>';
        }

        // Date option checked
        if ($instance['stats_tag']['date']['active']) {
            $date = date_i18n($instance['stats_tag']['date']['format'], strtotime($popular->date));
            $stats[] = '<span class="wpp-date">' . sprintf(__('posted on %s', 'wordpress-popular-posts'), $date) . '</span>';
        }

        // Category option checked
        if ($instance['stats_tag']['category']) {
            $post_cat = get_the_category($popular->id);
            $post_cat = (isset($post_cat[0]))
              ? '<a href="' . get_category_link($post_cat[0]->term_id) . '"><i class = "triangle '.yv4_category_top_parent_id($post_cat[0])->slug.'"></i>' . $post_cat[0]->cat_name . '</a>'
              : '';

            if ($post_cat != '') {
                $stats[] = '<span class="wpp-category">' . sprintf(__('%s', 'wordpress-popular-posts'), $post_cat) . '</span>';
            }
            else{
                $stats[] = "";
            }
        }

        // Build stats tag
        if ( !empty($stats) ) {
            $stats = '<div class="wpp-stats">' . join( ' | ', $stats ) . '</div>';
        }

        $excerpt = ''; // Excerpt placeholder

        // Excerpt option checked, build excerpt tag
        if ($instance['post-excerpt']['active']) {

            $excerpt = get_excerpt_by_id( $popular->id );
            if ( !empty($excerpt) ) {
                $excerpt = '<div class="wpp-excerpt">' . $excerpt . '</div>';
            }

        }
        $output .= "<li class = 'card-wrapper'>";
        $output .= $thumbnail;
        $output .= "<div class = 'card-content'><h4><a href=\"" . get_the_permalink( $popular->id ) . "\" title=\"" . esc_attr( $popular->title ) . "\">" . $popular->title . "</a></h4>";
        $output .= $stats;
        $output .= $excerpt;
        $output .= "</div></li>" . "\n";

    }

    $output .= '</ol>';

    return $output;
}

add_filter( 'wpp_custom_html', 'my_custom_popular_posts_html_list', 10, 2 );
?>
