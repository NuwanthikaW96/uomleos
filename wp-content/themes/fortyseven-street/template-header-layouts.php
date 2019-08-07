<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Home Header Layouts 
 * @package FortySeven Street
 */
?>
<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package FortySeven Street
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

<body <?php body_class('home'); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fortyseven-street' ); ?></a>

		<?php
		$header_class = "";
		$es_logo_alignment = get_theme_mod('eightstore_pro_logo_alignment','left');
		global $post;
		$slug = get_post( $post )->post_name;
		$arr = explode('-',$slug);
		$es_logo_alignment = end($arr);
		$header_class .= " logo-menu-".$es_logo_alignment;
		
		?>
		<header id="masthead" class="site-header<?php echo esc_attr($header_class);?>" role="banner">
			<?php if(get_theme_mod('fortyseven_street_header_top','enable')=='enable'){ ?>
			<div class="top-header">
				<div class="street-wrapper">
					<?php do_action('fortyseven_street_social_links'); ?>
					<div class="header-search-form">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="main-header">
				<div class="street-wrapper">
					<div class="site-branding">
						<div class="site-logo">
							<?php
							if ( function_exists( 'the_custom_logo' ) ) {
								if ( has_custom_logo() ) : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php the_custom_logo(); ?>
								</a>
								<?php 
								endif;
							}
							?>
						</div>
						<div class="site-text">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
								<p class="site-description"><?php bloginfo( 'description' ); ?></p>
							</a>
						</div>
					</div><!-- .site-branding -->
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="toggle-bar toggle-bar-first"></span>
							<span class="toggle-bar toggle-bar-second"></span>
							<span class="toggle-bar toggle-bar-third"></span>
						</button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->

		<!-- site banner -->
		<section class="street-home-slider">
			<?php 
			//if(is_home() || is_front_page() ){
			do_action( 'fortyseven_street_slider' ); 
			//}?>
		</section>

		<!-- main container -->
		<?php
		if((is_home() || is_front_page()) && 'page' == get_option( 'show_on_front' )){	
			$fortyseven_street_content_id = "content";	
		}elseif(is_home() || is_front_page() ){
			$fortyseven_street_content_id = "home-content";
		}else{
			$fortyseven_street_content_id ="content";
		} ?>
		<div id="<?php echo esc_attr($fortyseven_street_content_id); ?>" class="site-content">
			<?php
			$template_choose = fortyseven_street_section_enable(); 
			foreach( $template_choose as $template_data => $value){
				?>
				<section id="section_<?php echo esc_attr($value['section-id']); ?>">
					<?php get_template_part( 'template-parts/section' , $value['template-part'] ); ?>    
				</section>
				<?php
			}
			get_footer();
			?>