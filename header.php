<?php
/**
* The header for our theme.
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package York_Vision_4
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'yv4' ); ?></a>
		<div id="masthead" role="banner" class='yvMenuContainer site-header'>

			<header class='yvBrand'>
				<a href = '#' class = "hamburger" id = "toggle">
					<s class = "bar"></s>
					<s class = "bar"></s>
				</a>
				<a href = "<?php echo esc_html(site_url()); ?>" >
					<img class='mobileLogo' src='<?php echo get_template_directory_uri() ."/images/vision-logo-mobile.png";?>'/>
					<img class='desktopLogo' src='<?php echo get_template_directory_uri()."/images/vision-logo-desktop.png";?>'/>
				</a>

				<a href  = ""  class = "advert">
					<img src = "http://usercontent2.hubimg.com/4129243_f520.jpg"/>
				</a>
				<!-- <span class='logo'>Logo</span> -->
			</header>

		</header><!-- #masthead -->
		<div class = "navWrapper">
			<nav class='mainMenu tucked' id = "tuckedMenu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary',  'container' => 'false', 'items_wrap' => '<ul>%3$s</ul>', ) ); ?>
				<span></span>
			</nav>
		</div>
	</div>
	<script type="text/javascript">
	(function (window, document) {
	    document.getElementById('toggle').addEventListener('click', function (e) {
	        document.getElementById('tuckedMenu').classList.toggle('tucked');
	        document.getElementById('main').classList.toggle('tucked');
	        document.getElementById('toggle').classList.toggle('x');
	    });
	})(this, this.document);
	</script>
	<main id="main" class="site-content">
