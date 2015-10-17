<?php
function yv4_the_category() {
    $cats = get_the_category(); // category object
    $top_cat_obj = array();

    foreach($cats as $cat) {
        if ($cat->parent == 0) {
            $top_cat_obj[] = $cat;
        }
    }
    if (sizeof($top_cat_obj) >= 1 ){
        $top_cat_obj = $top_cat_obj[0];
        return $top_cat_obj->name;
    }
    return "Uncategorised";
}
add_filter( 'jetpack_development_mode', '__return_true' );
?>
