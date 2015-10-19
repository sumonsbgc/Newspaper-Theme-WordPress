<?php
get_header();
$cur_cat_id = get_cat_id( single_cat_title("",false) );
?>
<div class = "article-Column">
    <div class="category-title">
        <h2><span class = "<?php echo strtolower(yv4_the_parent_category());?>"><?php  echo get_category($cur_cat_id)->cat_name ;?></span></h2>
	</div><!-- .entry-header -->
    <div class = "card-row">
    <?php
    while (have_posts()) : the_post();
        get_template_part('template-parts/content','card');
    endwhile; ?>
    </div>
    <?php
        get_template_part("template-parts/util", "pagination");
    ?>
</div>
<aside class = "sidebar-Column">
    <?php
    $slug = get_category_by_slug('sports');
    if(in_category('Sports')){
        get_template_part('template-parts/sports','sidebar');
    }
    else{
        get_sidebar();
    }
    ?>
</aside>
<?php
get_footer();
?>
