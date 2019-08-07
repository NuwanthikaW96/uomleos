<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package FortySeven Street
 */
global $post;
$fortyseven_street_post_id = "";
if(is_front_page()){
	$fortyseven_street_post_id = get_option('page_on_front');
}else{
	$fortyseven_street_post_id = $post->ID;
}
$fortyseven_street_post_class = get_post_meta( $fortyseven_street_post_id, 'fortyseven_street_sidebar_layout', true );
if(empty($fortyseven_street_post_class) && is_archive()){
	$fortyseven_street_post_class = "left-sidebar";
}elseif(is_single() || is_search()){
	$fortyseven_street_post_class = "right-sidebar";
}
if($fortyseven_street_post_class=='left-sidebar' || $fortyseven_street_post_class=='both-sidebar'){
    ?>
    <div id="secondary-left" class="widget-area left-sidebar sidebar">
        <?php if ( is_active_sidebar( 'fortyseven-street-left-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'fortyseven-street-left-sidebar' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}
?>
