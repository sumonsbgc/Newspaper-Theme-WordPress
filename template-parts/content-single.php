<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package York_Vision_4
 */

?>
	<header class = "articleHeader">
	    <h1 class = "articleTitle"><?php the_title(); ?> </h1>
	    <div class = "article-meta">
	        <span id = 'author'><i class="fa fa-2x fa-user"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
					<?php the_author(); ?></a>
			</span>
	        <span id = "date"><i class="fa fa-2x fa-clock-o"></i><?php yv4_posted_on();?></span>
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


	<div class = "article-column">
	    <article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	        <aside class = "excerpt">
	            <i class = "triangle large news"></i>
	            <p class = "excerpt-content">
	                <?php the_excerpt(); ?>
	            </p>
	        </aside>
			<?php the_content();?>
		</article>
	</div>

	<footer class="entry-footer">
		<?php yv4_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
