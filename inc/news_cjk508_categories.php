<?php
/**
 * Returns a list of categories that should be shown based on the slug of the page
 * @param  category Object $cat From the slug of the category page
 * @return list of Wordpress Category objects under the to category
 */
function news_cjk508_get_child_categories_to_display($cat){
    $slug = $cat->slug;

    $childCatSlugs = news_cjk508_get_categories_children($slug);

    if (is_null($childCatSlugs)){
        $args = array(
            'child_of' => $cat->term_id,
        );
        $cats = get_categories($args);
    }
    else{
        foreach ($childCatSlugs as $children) {
            $cats[] = get_category_by_slug($children);
        }
    }
    return $cats;
}
/**
 * returns the list of categories to iterate through
 * @access
 * @param  [type] $slug [description]
 * @return [type] [description]
 */
function news_cjk508_get_categories_children($slug){
    switch ($slug) {
        case 'sports':
            $childCatSlugs= array('Football', 'American-Football');
            break;

        default:
            $childCatSlugs = null;
            break;
    }
    return $childCatSlugs;
}
?>
