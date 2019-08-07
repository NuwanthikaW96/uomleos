<?php
/**
 * 
 * client Section
 * 
 * @package FortySeven Street
 * 
 */
$client_section_title = get_theme_mod('section_six_section_title','');
$client_section_desc = get_theme_mod('section_six_section_desc','');
$post_id = get_theme_mod('section_six_page','');
if (!empty($post_id)) {
    ?>
    <div class="street-wrapper">
        <div class="section-title"  data-wow-duration="2s">
            <div class="wow fadeInLeft"><h2 class="client_section_title main-title"><?php echo esc_html($client_section_title); ?></h2></div>  
        </div>
        <div class="section-description">
            <p><?php echo esc_html($client_section_desc); ?></p>
        </div>
        <?php 
        $args = array (
         'post_status' => 'publish',
         'posts_per_page' => -1,
         'cat' => $post_id
         );
        $wp_query = new WP_Query($args);
        ?>
        <div class="section-content">
         <ul class="clients-logos">
            <?php
            while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            <li class="client-single">
                <a href="<?php the_permalink(); ?>">
                    <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail('fortyseven-street-home-portfolio');
                    }else{  ?>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/portfolio-fallback.png');?>"/>
                    <?php } ?>
                </a>
            </li>
        <?php endwhile; ?>   
    </ul>
</div>
</div>
<?php 
}
wp_reset_postdata();
?>