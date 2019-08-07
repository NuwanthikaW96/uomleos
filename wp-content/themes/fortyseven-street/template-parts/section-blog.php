<?php

/**
 * 
 * Latest Blog Section
 * 
 * @package FortySeven Street
 * 
 */

$blog_section_title = get_theme_mod('section_ten_section_title','');
$blog_section_desc = get_theme_mod('section_ten_section_desc','');
$blog_cat = get_theme_mod('section_ten_page','');
?>
<div class="street-wrapper">
  <div class="section-title"  data-wow-duration="2s">
    <div class="wow fadeInLeft"><h2 class="blog_section_title main-title"><?php echo esc_html($blog_section_title); ?></h2></div>  
  </div>
  <div class="section-description">
    <p><?php echo esc_html($blog_section_desc); ?></p>
  </div>
  <?php
  if(!empty($blog_cat)){
    $args = array (
     'post_type' => 'post',
     'post_status' => 'publish',
     'orderby' => 'post_date',
     'order' => 'DESC',
     'posts_per_page' => 5,
     'cat' => $blog_cat
     );
    $wp_query = new WP_Query($args);
    ?>
    <div class="section-content">
      <?php
      $i=0;
      while($wp_query->have_posts() ) : $wp_query->the_post();
      $i++;
      ?>
      <div class="latest-blog">
        <a href="<?php the_permalink(); ?>">
          <?php 
          if(has_post_thumbnail()){
            if($i==1){ the_post_thumbnail('fortyseven-street-blog-large'); }
            else{  the_post_thumbnail('fortyseven-street-blog-small'); }
          } 
          ?>
        </a>
        <span><?php echo esc_html(get_comments_number());?> <i class="fa fa-comments"></i></span>
        <div class="content-wrapper">
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <?php
}
?>
</div>
<?php wp_reset_postdata();?>