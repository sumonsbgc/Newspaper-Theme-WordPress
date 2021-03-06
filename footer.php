<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newspaper_Wordpress_Cjk508
 */

?>

	</main><!-- #content -->
	<footer id="colophon" role="contentinfo" class="footer" role="contentinfo">
	    <div class="footer-links">
	        <ul id = "aboutFooter">
	            <li><h3>Learn About Us</h3></li>
	            <li><a href="javascript:void(0)">Our Team</a></li>
	            <li><a href="javascript:void(0)">Advertising</a></li>
	            <li><a href="javascript:void(0)">Contact Us</a></li>
	        </ul>
	        <ul id = "legalFooter">
	            <li><h3>Legal Stuff</h3></li>
	            <li><a href="javascript:void(0)">Privacy Policy</a></li>
	            <li><a href="javascript:void(0)">Cookie Policy</a></li>
	            <li><a href="javascript:void(0)">Terms of Service</a></li>
	        </ul>
	        <ul id = "socialFooter">
	            <li><h3>Social Media</h3></li>
	            <li><a href="javascript:void(0)"><i class="fa fa-3x fa-twitter"></i>@Twitter Account</a></li>
	            <li><a href="javascript:void(0)"><i class="fa fa-3x fa-facebook"></i>Facebook Accoung</a></li>
	        </ul>
	    </div>
		<div class="site-info">
		    <p> <?php _e('This website uses cookies, by continuing to browse on this site you are agreeing to the use of the cookies. For more information see our cookie policy page above', 'news_cjk508');?></p>
			<p>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'news_cjk508' ), 'news_cjk508', '<a href="http://cjk508.com" rel="designer">Christopher King</a>' ); ?>
			</p>
		    <p>
		        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'news_cjk508' ) ); ?>"><?php printf( esc_html__( 'York Vision is powered by %s', 'news_cjk508' ), 'WordPress' ); ?></a>. All content © York Vision Newspaper. Maintained by the Vision Web Team.
		    </p>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
