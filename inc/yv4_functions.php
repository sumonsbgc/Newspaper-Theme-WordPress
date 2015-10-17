<?php
function yv4_the_category() {
    $cats = get_the_category(); // category object
    $top_cat_obj = array();

    foreach($cats as $cat) {
        if ($cat->parent == 0) {
            $top_cat_obj[] = $cat;
        }
        else{
            $parents = get_category_parents($cat->term_id);
            foreach($parents as $parent) {
                if ($parent->parent == 0) {
                    $top_cat_obj[] = $parents;
                }
            }
        }
    }
    if (sizeof($top_cat_obj) >= 1 ){
        $top_cat_obj = $top_cat_obj[0];
        return $top_cat_obj->name;
    }
    else{

    }
    return "Uncategorised";
}
add_filter( 'jetpack_development_mode', '__return_true' );
?>
