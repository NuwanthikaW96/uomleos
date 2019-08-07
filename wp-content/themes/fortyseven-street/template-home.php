<?php
/**
 * 
 * Template Name: Homepage
 * 
 * This is the template that displays home pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package FortySeven Street
 * 
 */
 get_header();
 
 $template_choose = fortyseven_street_section_enable(); 
 foreach( $template_choose as $template_data => $value){
    ?>
        <section id="section_<?php echo esc_attr($value['section-id']); ?>">
            <?php get_template_part( 'template-parts/section' , $value['template-part'] ); ?>    
        </section>
    <?php
    }
 get_footer();
?>