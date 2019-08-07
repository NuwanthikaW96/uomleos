<?php
/**
 * 
 * pricing Section
 * 
 * @package FortySeven Street
 * 
 */
$pricing_section_title = get_theme_mod('section_seven_section_title','');
$post_id = get_theme_mod('section_seven_page','');
$page = fortyseven_street_page_id( $post_id );
if (!empty($post_id)) {
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    ?>
    <div class="street-wrapper">
        <div class="section-title"  data-wow-duration="2s">
            <div class="wow fadeInLeft"><h2 class="pricing_section_title main-title"><?php echo esc_html($pricing_section_title); ?></h2></div>  
        </div>
        <div class="pricing-description">
            <?php echo esc_html(get_theme_mod('section_seven_section_desc')); ?>
        </div>
        <div class="section-content wow fadeInRight" data-wow-duration="5s">
            <div class="pricing-contents">
                <?php if(has_shortcode($page->post_content,'easy-pricing-table')){
                    echo do_shortcode($page->post_content);
                }else{
                    echo wp_kses_post($page->post_content);
                }
                ?>
            </div>
        </div>
    </div>
    <div class="pricing-image">
        <?php echo get_the_post_thumbnail( $post_id, 'full' );?>
    </div>
    <?php 
}
wp_reset_postdata();
?>