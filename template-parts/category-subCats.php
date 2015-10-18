<?php
/**
 * Very important to note that the slug of the page must match the slug of the category
 */
$slug = get_post($post)->post_name;
$mainCategory = get_category_by_slug($slug);
$count = -1;
$childCats = yv4_get_child_categories_to_display($mainCategory);
foreach ($childCats as $ChildCat) {
    $count++;
    if ($count & 1){?>
        <div class = "AdvertBlock" style = "height:150px; width:100%; background-color:green;">

        </div>
<?php
    }
    if ($ChildCat !== null):
    $args = array(
        'category' => $ChildCat->term_id,
        'posts_per_page'   => 4,
        'post_type'        => 'post',
    );
    $posts = get_posts($args);
    $catURL = get_category_link($ChildCat->term_id);
    ?>
    <div class = "card-row">
        <div class = "category-title">
            <h2><span class = "<?php echo $mainCategory->slug; ?>"><a href = "<?php echo esc_url($catURL); ?>"><?php echo $ChildCat->name;?></a></span></h2>
        </div>
    <?php
    foreach($posts as $post){
        setup_postdata($post);
        get_template_part('template-parts/content','card');
    }?>
</div>
<?php
endif;
}
?>
