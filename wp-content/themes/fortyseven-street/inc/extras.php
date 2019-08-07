<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package FortySeven Street
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function fortyseven_street_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'fortyseven_street_body_classes' );

/**
 * Enqueue scripts and styles.
 */
function fortyseven_street_scripts_enqueue() {
	$query_args = array(
		'family' => 'Open+Sans:400,400italic,300italic,300,600,600italic|Lato:400,100,100italic,300,300italic,400italic,700,700italic,900italic,900|Signika:400,300,600,700|Droid+Sans:400,700');
	
	wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'bx-slider', get_template_directory_uri() . '/css/jquery.bxslider.css' );
	wp_enqueue_style( 'wow', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'fortyseven-street-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fortyseven-street-responsive', get_template_directory_uri().'/css/responsive.css');

	if(is_rtl()){
		wp_enqueue_style( 'fortyseven-street-rtl', get_template_directory_uri().'/css/rtl.css');		
	}

	wp_enqueue_script( 'jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), '4.1', true );
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), false );
	wp_enqueue_script( 'jquery-classyloader', get_template_directory_uri() . '/js/jquery.classyloader.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-waypoint', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'fortyseven-street-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fortyseven-street-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Register the script
	wp_register_script( 'fortyseven-street-custom-script', get_template_directory_uri() . '/js/custom-script.js' );
	wp_enqueue_script( 'fortyseven-street-custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), '20170416', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fortyseven_street_scripts_enqueue' );

/**
 * 
 * FortySeven Street slider callback function 
 * 
 */ 
function fortyseven_street_slider_cb(){
	global $post;
	$read_more = get_theme_mod('slider_callto_action_text' , __('Learn More','fortyseven-street'));
	(get_theme_mod('slider_pager_option','yes') == 'yes') ? ($a='true') : ($a='false');
	(get_theme_mod('slider_control_option','yes') == 'yes') ? ($b='true') : ($b='false');
	(get_theme_mod('slider_transition','slide') == 'slide') ? ($c='horizontal') : ($c='fade');
	(get_theme_mod('slider_auto_transition','yes') == 'yes') ? ($d='true') : ($d='false');
	(get_theme_mod('slider_speed') != '') ? ($e = get_theme_mod('slider_speed')) : ($e = '3000');
	(get_theme_mod('slider_pause') != '') ? ($f = get_theme_mod('slider_pause')) : ($f = '4000' );
	if( get_theme_mod('slider_option') != '1') { 
		if((get_theme_mod('slider_category') != '')) {		
			// Localize the script with new data
			$translation_array = array(
				'pager' => esc_attr($a),
				'controls' => esc_attr($b),
				'mode' => esc_attr($c),
				'auto' => esc_attr($d),
				'speed' => esc_attr($e),
				'pause' => esc_attr($f),
				);
			wp_localize_script( 'fortyseven-street-custom-script', 'fsSlider', $translation_array );
			?>
			<div class="bx-slider">
				<?php
				$loop = new WP_Query(array(
					'cat' => absint(get_theme_mod('slider_category')),
					'posts_per_page' => -1
					));
				if($loop->have_posts()){ 
					while($loop->have_posts()) : $loop-> the_post(); 
					?>
					<div class="slides">
						<?php if(has_post_thumbnail()){
							the_post_thumbnail('fortyseven-street-home-slider');
						} ?>
						<?php if(get_theme_mod('slider_captions' , 'show')=='show'):?>
							<div class="slider-caption">
								<div class="street-wrapper">
									<div class="street-container-slider">
										<h1 class="caption-title"><?php the_title();?></h1>
										<div class="caption-description"><?php the_excerpt();?></div>
										<a href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?></a> 
									</div>
								</div>
							</div>
						<?php  endif; ?>

					</div>
				<?php endwhile;
			} ?>
		</div>
		<?php
	}
}
wp_reset_postdata();
}//fortyseven_street_slider_cb end
add_action('fortyseven_street_slider','fortyseven_street_slider_cb', 10);


function fortyseven_street_social_cb(){ 
	$facebook = get_theme_mod('facebook');
	$twitter = get_theme_mod('twitter');
	$instagram = get_theme_mod('instagram');
	$google_plus = get_theme_mod('google_plus');
	$youtube = get_theme_mod('youtube');
	$pinterest = get_theme_mod('pinterest');
	$linkedin = get_theme_mod('linkedin');
	$flickr = get_theme_mod('flickr');
	$vimeo = get_theme_mod('vimeo');
	$stumbleupon = get_theme_mod('stumbleupon');
	$skype = get_theme_mod('skype');
	?>
	<div class="socials">
		<?php if($facebook != ''){ ?>
		<a href="<?php echo esc_url($facebook); ?>" class="facebook" title="<?php esc_attr_e('Facebook','fortyseven-street');?>" target="_blank"><i class="fa fa-facebook"></i></a>
		<?php } ?>

		<?php if($twitter != ''){ ?>
		<a href="<?php echo esc_url($twitter); ?>" class="twitter" title="<?php esc_attr_e('Twitter','fortyseven-street');?>" target="_blank"><i class="fa fa-twitter"></i></a>
		<?php } ?>

		<?php if($instagram != ''){ ?>
		<a href="<?php echo esc_url($instagram); ?>" class="instagram" title="<?php esc_attr_e('Instagram','fortyseven-street');?>" target="_blank"><i class="fa fa-instagram"></i></a>
		<?php } ?>

		<?php if($google_plus != ''){ ?>
		<a href="<?php echo esc_url($google_plus); ?>" class="gplus" title="<?php esc_attr_e('Google Plus','fortyseven-street');?>" target="_blank"><i class="fa fa-google-plus"></i></span></a>
		<?php } ?>

		<?php if($youtube != ''){ ?>
		<a href="<?php echo esc_url($youtube); ?>" class="youtube" title="<?php esc_attr_e('Youtube','fortyseven-street');?>" target="_blank"><i class="fa fa-youtube"></i></span></a>
		<?php } ?>

		<?php if($pinterest != ''){ ?>
		<a href="<?php echo esc_url($pinterest); ?>" class="pinterest" title="<?php esc_attr_e('Pinterest','fortyseven-street');?>" target="_blank"><i class="fa fa-pinterest"></i></a>
		<?php } ?>

		<?php if($linkedin != ''){ ?>
		<a href="<?php echo esc_url($linkedin); ?>" class="linkedin" title="<?php esc_attr_e('Linkedin','fortyseven-street');?>" target="_blank"><i class="fa fa-linkedin"></i></a>
		<?php } ?>

		<?php if($flickr){ ?>
		<a href="<?php echo esc_url($flickr); ?>" class="flickr" title="<?php esc_attr_e('Flickr','fortyseven-street');?>" target="_blank"><i class="fa fa-flickr"></i></a>
		<?php } ?>

		<?php if($vimeo != ''){ ?>
		<a href="<?php echo esc_url($vimeo); ?>" class="vimeo" title="<?php esc_attr_e('Vimeo','fortyseven-street');?>" target="_blank"><i class="fa fa-vimeo"></i></span></a>
		<?php } ?>

		<?php if($stumbleupon != ''){ ?>
		<a href="<?php echo esc_url($stumbleupon); ?>" class="stumbleupon" title="<?php esc_attr_e('Stumbleupon','fortyseven-street');?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
		<?php } ?>

		<?php if($skype != ''){ ?>
		<a href="<?php echo "skype:".esc_attr($skype); ?>" class="skype" title="<?php esc_attr_e('Skype','fortyseven-street');?>"><i class="fa fa-skype"></i></a>
		<?php } ?>
	</div>
	<?php } 

	add_action( 'fortyseven_street_social_links', 'fortyseven_street_social_cb', 10 );