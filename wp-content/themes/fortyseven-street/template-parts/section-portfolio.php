<?php
/**
 * 
 * Portfolio Section
 * 
 * @package FortySeven Street
 * 
 */
$portfolio_section_title = get_theme_mod('section_four_section_title', __('Portfolio','fortyseven-street'));
$portfolio_button_text = get_theme_mod('section_four_button_text',__('View All Work','fortyseven-street'));
$portfolio_category = get_theme_mod('section_four_page');

?>
<div class="street-wrapper">
    <div class="section-title"  data-wow-duration="2s">
        <div class="wow fadeInLeft"><h2 class="team_section_title main-title"><?php echo esc_html($portfolio_section_title); ?></h2></div>  
    </div>
    <?php 
    if($portfolio_category!=""){
        ?>
        <div class="portfolio-description-wrap">
            <div class="portfolio-description">
                <?php echo esc_html(get_theme_mod('section_four_section_desc')); ?>
            </div>
            <a target="_blank" href="<?php echo esc_url( get_category_link($portfolio_category) ); ?>"><?php echo esc_html($portfolio_button_text); ?></a>
        </div>
        <?php
        $args = array (
           'post_status' => 'publish',
           'posts_per_page' => 8,
           'cat' => $portfolio_category
           );
           $wp_query = new WP_Query($args);?>
           <div class="section-content">
            <?php
            while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
            
            <div class="portfolio-single">
                <a href="<?php the_permalink(); ?>">
                    <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail('fortyseven-street-home-portfolio');
                    }else{  ?>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/images/portfolio-fallback.png');?>"/>
                    <?php } ?>
                    <p class="portfolio-img-title"><?php the_title();?></p>
                </a>
            </div>
        <?php endwhile; ?>   
    </div>
    <?php 
}
?>
</div>
<?php wp_reset_postdata();?>