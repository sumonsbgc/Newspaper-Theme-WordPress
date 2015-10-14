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
                Number of Articles Written: <?php echo  $numPosts; ?>
            </p>
        </div>
    </div>
    <div class = "card-row">
    <?php
    while (have_posts()) : the_post();
        get_template_part('template-parts/content','card');
    endwhile; ?>
    </div>
    <div class = "pagination">
	  <ul class="pager">
	    <li class="page-prev" style="float:left"><?php next_posts_link('&laquo; Older Entries'); ?></li>
	    <li class="page-next" style="float:right"><?php previous_posts_link('Newer Entries &raquo;'); ?></li>
	  </ul>
  </div>
</div>
<aside class = "sidebar-Column">
    <?php require_once('sidebar.php');?>
</aside>
<?php
get_footer();
?>
