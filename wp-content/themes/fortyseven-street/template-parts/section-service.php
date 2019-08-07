<?php

/**
 * 
 * Service Section
 * 
 * @package FortySeven Street
 * 
 */

$service_section_title = get_theme_mod('section_two_section_title','');
$service_section_desc = get_theme_mod('section_two_section_desc','');
$service_category = absint(get_theme_mod('section_two_page',''));
$service_args = array('post_type' => 'post', 'cat' => $service_category, 'order' => 'DESC');
$service_query = new WP_Query($service_args);
?>
<div class="street-wrapper">
    <div class="section-title"  data-wow-duration="2s">
        <div class="wow fadeInLeft"><h2 class="service_section_title main-title"><?php echo esc_html($service_section_title); ?></h2></div>  
    </div>
    <div class="section-description">
        <p><?php echo esc_html($service_section_desc); ?></p>
    </div>

    <div class="service-posts">
        <?php while ($service_query->have_posts()) : $service_query->the_post(); ?>
            <div class="service-posts-wrapper wow fadeInUp">
                <?php
                ?>
                <figure class="service_image">
                    <?php if (has_post_thumbnail()) :
                    the_post_thumbnail('thumbnail');
                    else : 
                        $thumbnail_id = get_post_thumbnail_id( $post_id );
                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        ?>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/fallback-service.png'); ?>" title="<?php the_title_attribute(); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    <?php 
                    endif; ?>
                </figure>
                <h3 class="service_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="services-excerpt-content">
                    <?php the_excerpt(); ?>
                </div>

            </div>

        <?php endwhile; ?>
    </div>

</div>
<?php wp_reset_postdata();?>