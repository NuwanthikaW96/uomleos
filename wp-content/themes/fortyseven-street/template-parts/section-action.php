<?php

/**
 * 
 * Call To Action Section
 * 
 * @package FortySeven Street
 * 
 */

$cta_section_title = get_theme_mod('section_eight_section_title','');
$cta_section_desc = get_theme_mod('section_eight_section_desc','');
$cta_button_link = get_theme_mod('section_eight_button_link','');
$cta_button_text = get_theme_mod('section_eight_button_text','');
?>
<div class="street-wrapper">
	<div class="section-title"  data-wow-duration="2s">
		<div class="wow fadeInLeft"><h2 class="team_section_title main-title"><?php echo esc_html($cta_section_title); ?></h2></div>  
	</div>
	
	<div class="callto-description">
		<p><?php if(has_shortcode($cta_section_desc,'ufbl')){
			echo do_shortcode($cta_section_desc); 
		}else{
			echo esc_html($cta_section_desc);
		}
		?></p>
		<?php if(!empty($cta_button_text) && !empty($cta_button_link)){ ?>
		<a target="_blank" href="<?php echo esc_url($cta_button_link) ?>"><?php echo esc_html($cta_button_text) ?></a>
		<?php } ?>
	</div>
</div>