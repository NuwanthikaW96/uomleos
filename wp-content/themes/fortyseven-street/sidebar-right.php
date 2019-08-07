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
	if($post)
	$fortyseven_street_post_id = $post->ID;
}
$fortyseven_street_post_class = get_post_meta( $fortyseven_street_post_id, 'fortyseven_street_sidebar_layout', true );
if(!empty($fortyseven_street_post_id) && empty($fortyseven_street_post_class)){
	$fortyseven_street_post_class = 'right-sidebar';
}
if(empty($fortyseven_street_post_class) && is_archive()){
	$fortyseven_street_post_class = "right-sidebar";
}elseif(is_single() || is_search()){
	$fortyseven_street_post_class = "right-sidebar";
}
if($fortyseven_street_post_class=='right-sidebar' || $fortyseven_street_post_class=='both-sidebar'){
    ?>
    <div id="secondary-right" class="widget-area right-sidebar sidebar">
        <?php if ( is_active_sidebar( 'fortyseven-street-right-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'fortyseven-street-right-sidebar' ); ?>
		<?php elseif(is_active_sidebar('sidebar-1')) : ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}    
?>