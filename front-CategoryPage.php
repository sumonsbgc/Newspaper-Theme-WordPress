<?php
/*
* Template Name: Category Front Page
*/
    get_header();
?>
<div class = "article-Column">
    <?php
        $slug = get_post($post)->post_name;
        $cat = get_category_by_slug($slug);
        $args = array(
            'child_of' => $cat->term_id,
        );
        $cats = get_categories($args);
        if(empty($cats)){
            get_template_part("template-parts/category","singular");
        }
        else{
            get_template_part("template-parts/category","subCats");
        }
    ?>
</div>
<aside class = "sidebar-Column">
    <?php get_sidebar();?>
</aside>

<?php
    get_footer();
?>
