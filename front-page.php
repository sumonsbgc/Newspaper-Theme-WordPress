<?php
    get_header();
?>
<div class = "card-row first">
    <?php
    /* Get all Sticky Posts */
    $sticky = get_option( 'sticky_posts' );

    /* Sort Sticky Posts, newest at the top */
    rsort( $sticky );

    /* Get top 3 Sticky Posts */
    $sticky = array_slice( $sticky, 0, 3 );

    /* Query Sticky Posts */
    $query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
    if ($query->have_posts()){
        while($query->have_posts() ){
            $query->the_post();
            get_template_part('template-parts/content','card');
        }
    }
    wp_reset_postdata();
    ?>
</div>
<div class = "article-Column">
    <?php
    $catSlugs = ['news','sports','features','scene', 'opinion','columns'];
    foreach ($catSlugs as $catSlug) {
        $cat = get_category_by_slug($catSlug);
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
                <h2><span><?php echo $cat->slug;?></span></h2>
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
    <?php require_once('sidebar.php');?>
</aside>

<?php
    get_footer();
?>
