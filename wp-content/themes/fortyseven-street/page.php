<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FortySeven Street
 */

get_header(); ?>
<?php
global $post;
$fortyseven_street_both_sidebar = get_post_meta($post->ID, 'fortyseven_street_sidebar_layout', true);
?>
<div id="header-banner-image" class="header-nobanner_image">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>
<div class="street-wrapper">
	<?php	
	if($fortyseven_street_both_sidebar=='both-sidebar'){
		?>
		<div class="left-sidbar-right">
			<?php
		}
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php 
		get_sidebar('left');
		if($fortyseven_street_both_sidebar=='both-sidebar'){
			?>
		</div>
		<?php
	} 
	get_sidebar('right');
	?>
</div>
<?php get_footer(); ?>
