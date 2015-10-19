<?php
require_once '3rdParty/Mobile_Detect.php';
require_once  'yv4_triangle_marker.php';
require_once  'yv4_categories.php';
require_once  'yv4_wpp.php';

function get_sports_subCats(){
    $slug = "sports";
    $cat = get_category_by_slug($slug);
    $args = array('parent'=>$cat->term_id);
    $cats = get_categories($args);
    return $cats;
}
// require_once dirname( __FILE__ ) . 'TGMPA-TGM-Plugin-Activation/class-tgm-plugin-activation.php';
?>
