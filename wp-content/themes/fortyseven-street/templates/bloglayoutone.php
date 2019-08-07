<?php
/**
 * 
 * Template Name: Blog Large Image
 * @package Street
 * 
 */
?>
<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FortySeven Street
 */

get_header(); ?>
<div class="street-wrapper">
    <?php
    $sidebar_option = 'left-sidebar';
    ?>
    <div id="primary" class="content-area <?php echo esc_attr($sidebar_option);?>">
        <main id="main" class="site-main" role="main">

            <?php 
            $archive_layout = 'blog_layout1';
            $blog_args = array(
              'post_type' => 'post',
              'post_per_page' => -1,
              'cat' => '4'
              );
            $blog_query = new WP_Query($blog_args);
            if ( $blog_query->have_posts() ) : ?>

            <div class="archive-wrap <?php echo esc_attr($archive_layout); ?>">
                <?php /* Start the Loop */ ?>
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

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
                        //$archive_layout = get_theme_mod( 'fortyseven_street_archive_post_layout','blog_layout1');
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


                    <?php endwhile; wp_reset_query(); ?>

                    <?php the_posts_navigation(); ?>
                </div>
            <?php else : ?>

                <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php 

    if($sidebar_option!='no-sidebar'){
        $option_value = explode('-',$sidebar_option); 
        get_sidebar($option_value[0]);
    }
    ?>
</div>
<?php get_footer(); ?>
