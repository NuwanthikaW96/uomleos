<?php
/**
 * 
 * About Section
 * 
 * @package FortySeven Street
 * 
 */
$about_section_title = get_theme_mod('section_one_section_title',__('About Us','fortyseven-street'));
$post_id = get_theme_mod('section_one_page');
$page = fortyseven_street_page_id( $post_id );
$about_button_link = get_theme_mod('section_one_button_link');
$about_button_text = get_theme_mod('section_one_button_text',__('View More','fortyseven-street'));
if (!empty($post_id)) {
    ?>
    <div class="section-title"  data-wow-duration="2s">
        <div class="street-wrapper">
            <div class="wow fadeInLeft"><h2 class="about_section_title main-title"><?php echo esc_html($about_section_title); ?></h2></div>  
        </div>
    </div>
    <div class="about-image">
        <?php echo get_the_post_thumbnail( $post_id, 'fortyseven-street-home-fullwidth' );?>
    </div>
    <div class="street-wrapper">
        <div class="section-content wow fadeInRight" data-wow-duration="5s">
            <div class="about-contents">
                <?php echo esc_html(wp_trim_words($page->post_content,'80')); ?>
            </div>
            <a target="_blank" href="<?php echo esc_url($about_button_link); ?>"><?php echo esc_html($about_button_text) ?></a>
        </div>
    </div>
    
    <?php 
}
wp_reset_postdata();
?>