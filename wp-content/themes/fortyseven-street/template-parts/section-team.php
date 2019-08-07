<?php

/**
 * 
 * Team Member Section
 * 
 * @package FortySeven Street
 * 
 */
$team_section_title = get_theme_mod('section_nine_section_title','');
$team_button_link = get_theme_mod('section_nine_button_link','#');
$team_button_text = get_theme_mod('section_nine_button_text','');
$team_section_desc = get_theme_mod('section_nine_section_desc','');
$team_category = get_theme_mod('section_nine_page','');
?>
<div class="street-wrapper">
    <div class="section-title"  data-wow-duration="2s">
        <div class="wow fadeInLeft"><h2 class="team_section_title main-title"><?php echo esc_html($team_section_title); ?></h2></div>  
    </div>
    <div class="section-description">
        <p><?php echo esc_html($team_section_desc); ?></p>
        <?php if(!empty($team_button_text) && !empty($team_button_link)){ ?>
        <a target="_blank" href="<?php echo esc_url($team_button_link); ?>"><?php echo esc_html($team_button_text);?></a>
        <?php } ?>
    </div>
    <?php 
    if($team_category!=""){
        $args = array (
           'cat' => $team_category,
           'post_status' => 'publish',
           'posts_per_page' => -1,
           );
        $wp_query = new WP_Query($args);
        ?>
        <div class="section-content">
            <ul class="team-slide">
                <?php
                while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        if(has_post_thumbnail()){
                            the_post_thumbnail('fortyseven-street-home-portfolio');
                        }else{  ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/images/portfolio-fallback.png');?>"/>
                        <?php } ?>
                    </a>
                    <div class="team-name">
                        <p class="team-title"><?php the_title();?></p>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>     
    </div>
    <?php 
} ?>
</div>
<?php wp_reset_postdata();?>