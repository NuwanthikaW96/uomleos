<?php

/**
 * 
 * Testimonials Section
 * 
 * @package FortySeven Street
 * 
 */

$testimonial_section_title = get_theme_mod('section_three_section_title','');
$testimonial_button_text = get_theme_mod('section_three_button_text','');
$testimonial_category = get_theme_mod('section_three_page','');

?>
<div class="street-wrapper">
    <div class="section-title"  data-wow-duration="2s">
        <div class="wow fadeInLeft"><h2 class="team_section_title main-title"><?php echo esc_html($testimonial_section_title); ?></h2></div>  
    </div>
    <div class="testimonial-description">
        <?php echo esc_html(get_theme_mod('section_three_section_desc')); ?>
    </div>
    <?php 
    if($testimonial_category!=""){
        $args = array (
         'post_status' => 'publish',
         'posts_per_page' => 3,
         'cat' => $testimonial_category
         );
         $wp_query = new WP_Query($args);?>
         <div class="section-content">
            <ul class="testimonial-slide">
                <?php
                while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        if(has_post_thumbnail()){
                            the_post_thumbnail('thumbnail');
                        }else{  ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/images/portfolio-fallback.png');?>"/>
                        <?php 
                    } ?>
                </a>
                <div class="testimonial-contents">
                    <?php the_excerpt();?>
                </div>
                <div class="testimonial-name">
                    <p class="testimonial-title"><?php the_title();?></p>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>     
</div>
<?php 
}?>
</div>
<?php wp_reset_postdata();?>