<?php
get_header();
            // Set author data.
$curauth = (isset($_GET['author_name'])) ?
        get_user_by('slug', $author_name) : get_userdata(intval($author));
$numPosts = count_user_posts($curauth->ID);
?>
<div class = "article-Column">
    <div class = "card-row author-box">
        <div class = "avatar">
            <?php echo get_avatar( get_the_author_meta("email"), '128', '/images/no_images.jpg', get_the_author() ); ?>
        </div>
        <div class = "author-meta">
            <h1><?php the_author(); ?></h1>
            <div class = "author-description">
                <?php the_author_meta('description');?>
            </div>
            <p>
                Number of Articles Written: <?php $numPosts; ?>
            </p>
        </div>
    </div>
</div>
<aside class = "sidebar-Column">
    <?php require_once('sidebar.php');?>
</aside>
<?php
get_footer();
?>
