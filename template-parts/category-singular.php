<?php
$slug = get_post($post)->post_name;
$cat = get_category_by_slug($slug);
$count = 0;
    if ($cat !== null):
    $args = array(
        'category' => $cat->term_id,
        'posts_per_page'   => 4,
        'post_type'        => 'post',
    );
    $posts = get_posts($args);
    ?>
    <div class = "card-row">
        <div class = "category-title">
            <h2><span class = "<?php echo $cat->slug; ?>"><?php echo $cat->name;?></span></h2>
        </div>
    <?php
    foreach($posts as $post){
        setup_postdata($post);
        get_template_part('template-parts/content','card');
        $count++;
        if ($count & 4){?>
            <div class = "AdvertBlock" style = "height:150px; width:100%; background-color:green;">

            </div>
    <?php
        }
    }?>
</div>
<?php
endif;
?>
