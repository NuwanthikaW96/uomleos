<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FortySeven Street
 */

get_header(); ?>
<?php
$sidebar_option = get_theme_mod('archive_page_sidebar_option','right-sidebar');
?>
<div class="street-wrapper <?php echo esc_attr($sidebar_option);?>">
	<header class="page-header">
		<div class="archive-page-title">
			<?php
			if ( is_category() ) :
				?>
			<h1 class="page-title"><?php single_cat_title();?></h1>
			<?php 
			else :
				the_archive_title( '<h1 class="page-title">', '</h1>' );
			endif;?>
		</div>
		<?php the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
	</header>
	<div id="primary" class="content-area <?php echo esc_attr($sidebar_option);?>">
		<main id="main" class="site-main" role="main">

			<?php 
			$archive_layout = get_theme_mod( 'fortyseven_street_archive_post_layout','blog_layout1');
			if ( have_posts() ) : ?>

			<div class="archive-wrap <?php echo esc_attr($archive_layout); ?>">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
					?>

				<?php endwhile; wp_reset_query(); ?>

				<?php the_posts_navigation(); ?>
			</div>
		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php 
$sidebar_option = get_theme_mod('archive_page_sidebar_option','right-sidebar');
if($sidebar_option!='no-sidebar'){
	$option_value = explode('-',$sidebar_option); 
	get_sidebar($option_value[0]);
}
?>
</div>
<?php get_footer(); ?>
