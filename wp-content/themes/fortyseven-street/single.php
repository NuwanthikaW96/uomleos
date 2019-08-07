<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package FortySeven Street
 */

get_header(); ?>
<div class="street-wrapper">
	<?php	
	global $post;
	$fortyseven_street_both_sidebar = get_post_meta($post->ID, 'fortyseven_street_sidebar_layout', true);
	if($fortyseven_street_both_sidebar=='both-sidebar'){
		?>
		<div class="left-sidbar-right">
			<?php
		}
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php the_post_navigation(); ?>

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
