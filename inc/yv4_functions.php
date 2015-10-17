<?php
function yv4_the_parent_category() {
    $cats = get_the_category(); // category object
    $top_cat_obj = array();

    foreach($cats as $cat) {
        if ($cat->parent == 0) {
            $top_cat_obj[] = $cat;
        }
        else{
            $top_cat_obj[] = yv4_category_top_parent_id($cat->term_id);
        }
    }
    if (sizeof($top_cat_obj) >= 1 ){
        $top_cat_obj = $top_cat_obj[0];
        return $top_cat_obj->name;
    }
    return "Uncategorised";
}
add_filter( 'jetpack_development_mode', '__return_true' );

function yv4_the_category() {
    $cats = get_the_category(); // category object
    $top_cat_obj = array();

    foreach($cats as $cat) {
        $top_cat_obj[] = $cat;
    }
    if (sizeof($top_cat_obj) >= 1 ){
        return $top_cat_obj;
    }
    return "Uncategorised";
}

/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param	string		$catid 		Category ID to be checked
* @return 	category	$catParent	 top-level parent category
*/

function yv4_category_top_parent_id ($catid) {

     while ($catid) {
          $cat = get_category($catid); // get the object for the catid
          $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
          // the while loop will continue whilst there is a $catid
          // when there is no longer a parent $catid will be NULL so we can assign our $catParent
          $catParent = $cat->cat_ID;
          $catParent =  get_category($cat->cat_ID) ;
     }

    return $catParent;
}

?>
