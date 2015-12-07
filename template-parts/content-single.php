<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Newspaper_Wordpress_Cjk508
 */

?>
<header class = "articleHeader">
    <h1 class = "articleTitle"><?php the_title(); ?> </h1>
    <div class = "article-meta">
        <span id = 'author'><i class="fa fa-2x fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php the_author(); ?></a>
		</span>
        <span id = "date"><i class="fa fa-2x fa-clock-o"></i><?php news_cjk508_posted_on();?></span>
        <span id = "social">
            <i class="fa fa-2x fa-twitter"></i>
            <i class="fa fa-2x fa-facebook"></i>
        </span>
    </div>
</header>


<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'articleImage' );
  	if($image[1] >= 1050 && ($image[2] > 300 && $image[2]<500 )):
  ?>
	<div class = "fullImageWrapper">
		<img class = "full-size" src = "<?php echo $image[0] ?>">
	</div>
<?php endif;
endif; ?>
<div class = "article-Column">

	<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	    <aside class = "excerpt">
	        <i class = "triangle large news"></i>
	        <p class = "excerpt-content">
	            <?php the_excerpt(); ?>
	        </p>
	    </aside>
		<?php the_content();?>
		<footer>
			<i class="fa fa-3x fa-twitter"></i>
			<i class="fa fa-3x fa-facebook"></i>
		</footer>
	</article>
	<div id="comments" class="comments-area">
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
</div>
<aside class = "sidebar-Column">
    <?php get_sidebar();?>
</aside>
