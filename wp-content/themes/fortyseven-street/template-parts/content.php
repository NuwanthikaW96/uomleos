<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FortySeven Street
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php fortyseven_street_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php
	$image_id = get_post_thumbnail_id();
	$image_path = wp_get_attachment_image_src( $image_id, 'full' ,true );
	$archive_layout = get_theme_mod( 'fortyseven_street_archive_post_layout','blog_layout1');
	if($archive_layout == 'blog_layout4' || $archive_layout == 'blog_layout5'){
		$image_path = wp_get_attachment_image_src( $image_id, 'fortyseven-street-circular' ,true );
	}
	$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	if(has_post_thumbnail()): ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink();?>">
			<img src="<?php echo esc_url( $image_path[0] );?>" alt="<?php echo esc_attr( $image_alt );?>" /></a>
		</div>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fortyseven-street' ),
			'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php fortyseven_street_entry_footer('<footer class="entry-footer">','</footer>'); ?><!-- .entry-footer -->
	</article><!-- #post-## -->
