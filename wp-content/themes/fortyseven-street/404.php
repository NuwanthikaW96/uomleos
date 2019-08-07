<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package FortySeven Street
 */

get_header(); ?>
<div class="street-wrapper"
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'fortyseven-street' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'fortyseven-street' ); ?></p>
				<div class="error-num"> 
					<span class="num"><?php esc_html_e( 'Error', 'fortyseven-street' );?></span>
					<span class="not_found"><?php esc_html_e( '404', 'fortyseven-street' );?></span>
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->
</div>

<?php get_footer(); ?>
