<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FortySeven Street
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
	$footer_style = '4'; 
	?>
	<div class="top-footer column-<?php echo esc_attr($footer_style);?>">
		<div class="street-wrapper">
			<?php if ( is_active_sidebar( 'fortyseven-street-footer-one' ) ) : ?>
				<?php dynamic_sidebar( 'fortyseven-street-footer-one' ); ?>
			<?php endif; ?>	
		</div>
	</div>
	<div class="site-info">
		<div class="street-wrapper">
			<?php
			if(get_theme_mod('social_link_footer','1')=='1'){
				?>
				<div class="footer-socials">
					<?php do_action('fortyseven_street_social_links'); ?>
				</div>
				<?php
			}
			?>
			<div class="street-footer">
				<?php echo wp_kses_post(get_theme_mod('footer_copyright_text',''));?>
				<div class="site-info">
					<?php esc_html_e( 'WordPress Theme : ', 'fortyseven-street' );  ?><a  title="<?php esc_attr_e('Free WordPress Theme','fortyseven-street');?>" href="<?php echo esc_url( __( 'https://8degreethemes.com/wordpress-themes/fortyseven-street/', 'fortyseven-street' ) ); ?>"><?php esc_html_e( 'FortySeven Street', 'fortyseven-street' ); ?> </a>
					<span><?php esc_html_e(' by 8Degree Themes','fortyseven-street');?></span>
				</div><!-- .site-info -->
			</div>
			<div class="street-wrapper">
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<div id="back-top">
			<a href="#top"><i class="fa fa-level-up"></i> <span> <?php esc_html_e('Top', 'fortyseven-street') ;?> </span></a>
		</div>
	</div><!-- #page -->

	<?php wp_footer(); ?>

</body>
</html>