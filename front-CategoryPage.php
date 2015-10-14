<?php
/*
* Template Name: Category Front Page
*/
    get_header();
    $slug = get_post($post)->post_name;
    $cat = get_category_by_slug($slug);
?>
<div class = "article-Column">
    <?php
    $count = -1;
    $args = array(
        'child_of' => $cat->term_id,
    );
    $cats = get_categories($args);
    foreach ($cats as $ChildCat) {
        $catSlug = $cat->slug;
        $count++;
        if ($count & 1){?>
            <div class = "AdvertBlock" style = "height:150px; width:100%; background-color:green;">

            </div>
    <?php
        }
        if ($cat !== null):
        $args = array(
            'category' => $ChildCat->term_id,
            'posts_per_page'   => 4,
            'post_type'        => 'post',
        );
        $posts = get_posts($args);
        ?>
        <div class = "card-row">
            <div class = "category-title">
                <h2><span class = "<?php echo $cat->slug; ?>"><?php echo $ChildCat->name;?></span></h2>
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
</div>
<aside class = "sidebar-Column">
    <?php get_sidebar();?>
</aside>

<?php
    get_footer();
?>
