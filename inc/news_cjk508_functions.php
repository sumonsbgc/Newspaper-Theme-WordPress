<?php
require_once '3rdParty/Mobile_Detect.php';
require_once  'news_cjk508_triangle_marker.php';
require_once  'news_cjk508_categories.php';
require_once  'news_cjk508_wpp.php';

function get_sports_subCats(){
    $slug = "sports";
    $cat = get_category_by_slug($slug);
    $args = array('parent'=>$cat->term_id);
    $cats = get_categories($args);
    return $cats;
}

function news_cjk508_sports_child($slug){
    $slug = "sports";
    $cat = get_category_by_slug($slug);
    $args = array('child_of'=>$cat->term_id);
    $cats = get_categories($args);
    $currentCat = get_category_by_slug($slug);

}
/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}
// require_once dirname( __FILE__ ) . 'TGMPA-TGM-Plugin-Activation/class-tgm-plugin-activation.php';
?>
