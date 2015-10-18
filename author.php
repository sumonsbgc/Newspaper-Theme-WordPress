<?php
get_header();
?>
<div class = "article-Column">
    <?php get_template_part("template-parts/author", "box"); ?>
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
    <?php get_sidebar();?>
</aside>
<?php
get_footer();
?>
