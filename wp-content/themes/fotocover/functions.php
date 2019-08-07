<?php
/**
 * Describe child theme functions
 *
 * @package Fotogenic
 * @subpackage Fotocover
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'fotocover_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fotocover_setup() {

    $fotocover_theme_info = wp_get_theme();
    $GLOBALS['fotocover_version'] = $fotocover_theme_info->get( 'Version' );

}
endif;

add_action( 'after_setup_theme', 'fotocover_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Register Google fonts
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'fotocover_fonts_url' ) ) :
    function fotocover_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by PT Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'fotocover' ) ) {
            $font_families[] = 'PT Serif:300,400,400i,500,700';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the customizer filed
 */
function fotocover_customize_register( $wp_customize ) {

    global $wp_customize;

    //$wp_customize->get_setting( 'fotogenic_theme_color' )->default = '#f07f13';

}

add_action( 'customize_register', 'fotocover_customize_register', 20 );

/**
 * Kirki Customizer additions.
 */

require get_stylesheet_directory() . '/inc/kirki-added-fields.php';
 
/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'fotocover_scripts', 20 );

function fotocover_scripts() {
    
    global $fotocover_version;

    wp_enqueue_style( 'fotocover-google-font', fotocover_fonts_url(), array(), null );
    
    wp_dequeue_style( 'fotogenic-style' );
    wp_dequeue_style( 'fotogenic-responsive-style' );
    
	wp_enqueue_style( 'fotogenic-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $fotocover_version ) );
    
    wp_enqueue_style( 'fotogenic-parent-responsive', get_template_directory_uri() . '/assets/css/fotogenic-responsive.css', array(), esc_attr( $fotocover_version ) );
    
    wp_enqueue_style( 'fotocover', get_stylesheet_uri(), array(), esc_attr( $fotocover_version ) );
    
    $fotocover_theme_color = esc_attr( get_theme_mod( 'fotogenic_theme_color', '#f07f13' ) );
    
    $output_css = '';
    
    $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.reply .comment-reply-link,.widget_search .search-submit,.mt-search-social-wrapper .fotogenic-form-wrap .search-form .search-submit:hover,.hero_image_btn:hover,.masonary-view-all-btn a,.blog-btn:hover,.mt-scroll-up,div.wpforms-container-full .wpforms-form button[type='submit'], div.wpforms-container-full .wpforms-form button[type='submit']:hover,.hero_image_btn, .cta-btn.btn { background: ". esc_attr( $fotocover_theme_color ) ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.site-title a:hover,#site-navigation ul li.current-menu-item>a,#site-navigation ul li:hover>a,#site-navigation ul li.current_page_ancestor>a,#site-navigation ul li.current_page_item>a,#masthead .social-icons ul li a:hover,#masthead .fotogenic-search-icon:hover,.masonry-content-wrapper .masonry_title a:hover,.blog-title a:hover,#colophon .widget_archive a:hover, #colophon .widget_categories a:hover, #colophon .widget_recent_entries a:hover, #colophon .widget_meta a:hover, #colophon .widget_recent_comments li:hover, #colophon .widget_rss li:hover, #colophon .widget_pages li a:hover, #colophon .widget_nav_menu li a:hover,.entry-title a:hover{ color: ". esc_attr( $fotocover_theme_color ) ."}\n";

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.mt-search-social-wrapper .fotogenic-form-wrap .search-form .search-submit:hover,.hero_image_btn:hover,.masonary-view-all-btn a,.blog-btn:hover,.error-404.not-found,div.wpforms-container-full .wpforms-form button[type='submit'], div.wpforms-container-full .wpforms-form button[type='submit']:hover,.hero_image_btn, .cta-btn.btn { border-color: ". esc_attr( $fotocover_theme_color ) ."}\n";

        $output_css .= ".comment-list .comment-body { border-top-color: ". esc_attr( $fotocover_theme_color ) ."}\n";
        
    $refine_output_css = fotogenic_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'fotocover', $refine_output_css );
    
}

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'fotocover_homepage_cta_sec' ) ) :
    /*
     * Frontpage Call To Action Section Function
     *
     */
    function fotocover_homepage_cta_sec() {

        $fotocover_cta_enable_opt = get_theme_mod( 'fotocover_enable_cta_sec', true );

        if( false == ( $fotocover_cta_enable_opt ) ) {
            return;
        }

        $fotocover_cta_subtitle = get_theme_mod( 'fotocover_cta_subtitle_setting', '' );
        $fotocover_cta_maintitle = get_theme_mod( 'fotocover_cta_main_title_setting', '' );
        $fotocover_cta_btn_label = get_theme_mod( 'fotocover_cta_button_label_setting', '' );
        $fotocover_cta_btn_url = get_theme_mod( 'fotocover_cta_button_url_setting', '' );

        $fotocover_cta_bg_img = get_theme_mod( 'fotocover_cta_bg_image_setting', '' ); ?>

            <section class="fotocover_cta_content" <?php if( ! empty( $fotocover_cta_bg_img ) ) { ?>style="background: url( <?php echo esc_url( $fotocover_cta_bg_img ); ?> ) no-repeat fixed center top;" <?php } ?>>
                <div class="section-wrapper">
                    <div class="mt-container">
                        <div class="cta-content">
                            <div class="cta_subtitle">
                                <?php echo esc_html( $fotocover_cta_subtitle ); ?>
                            </div>
                            <?php if( ! empty( $fotocover_cta_maintitle ) ) { ?>
                                    <h2 class="cta-section-title">
                                        <?php echo esc_html( $fotocover_cta_maintitle ); ?>
                                    </h2>
                            <?php } ?>

                            <?php if( !empty( $fotocover_cta_btn_url ) ) { ?>
                                    <a class="cta-btn btn" href="<?php echo esc_url( $fotocover_cta_btn_url ); ?>">
                                        <?php echo esc_html( $fotocover_cta_btn_label ); ?>
                                    </a>
                            <?php } ?>
                        </div><!-- -->
                    </div>
                </div>
            </section>

<?php
    }

endif;

add_action( 'fotogenic_homepage_sections', 'fotocover_homepage_cta_sec', 60 );