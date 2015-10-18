<?php
get_header();
            // Set author data.
$curauth = (isset($_GET['author_name'])) ?
        get_user_by('slug', $author_name) : get_userdata(intval($author));
$numPosts = count_user_posts($curauth->ID);
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
