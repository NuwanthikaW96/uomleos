<?php
/**
 * 
 * Custom metabox
 * 
 * @package FortySeven Street
 * 
 */
function fortyseven_street_metabox(){
    add_meta_box(
                 'fortyseven_street_sidebar_layout', // $id
                 __('Sidebar Layout','fortyseven-street'), // $title
                 'fortyseven_street_sidebar_layout_callback', // $callback
                 'post', // $page
                 'normal', // $context
                 'high'); // $priority

    add_meta_box(
                 'fortyseven_street_sidebar_layout', // $id
                 __('Sidebar Layout','fortyseven-street'), // $title
                 'fortyseven_street_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
}
add_action('add_meta_boxes', 'fortyseven_street_metabox');

$fortyseven_street_sidebar_layout = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'label'     => __( 'Left sidebar', 'fortyseven-street' ),
        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
    ), 
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'label' => __( 'Right sidebar<br/>(default)', 'fortyseven-street' ),
        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
    ),
    'both-sidebar' => array(
        'value'     => 'both-sidebar',
        'label'     => __( 'Both Sidebar', 'fortyseven-street' ),
        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
    ),
    
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'label'     => __( 'No sidebar', 'fortyseven-street' ),
        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
    )   

);

function fortyseven_street_sidebar_layout_callback()
{ 
    global $post , $fortyseven_street_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'fortyseven_street_sidebar_layout_nonce' ); 
    ?>
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e('Choose Sidebar Template','fortyseven-street'); ?></em></td>
        </tr>
        
        <tr>
            <td>
                <?php  
                foreach ($fortyseven_street_sidebar_layout as $field) {  
                    $fortyseven_street_sidebar_metalayout = get_post_meta( $post->ID, 'fortyseven_street_sidebar_layout', true ); ?>
                    
                    <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                        <label class="description">
                            <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" /></span><br/>
                            <input type="radio" name="fortyseven_street_sidebar_layout" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $fortyseven_street_sidebar_metalayout ); if(empty($fortyseven_street_sidebar_metalayout) && $field['value']=='right-sidebar'){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html($field['label']); ?>
                        </label>
                    </div>
                    <?php 
                    } // end foreach 
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
        </table>
    <?php } 

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function fortyseven_street_save_sidebar_layout( $post_id ) { 
    global $fortyseven_street_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'fortyseven_street_sidebar_layout_nonce' ] ) || !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST[ 'fortyseven_street_sidebar_layout_nonce' ])), basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    if(isset($_POST['post_type'])){
        if ('page' == sanitize_text_field(wp_unslash($_POST['post_type']))) {  
            if (!current_user_can( 'edit_page', $post_id ) )  
                return $post_id;  
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
        }
    } 


    foreach ($fortyseven_street_sidebar_layout as $field) {  
        //Execute this saving function
        $old = get_post_meta( $post_id, 'fortyseven_street_sidebar_layout', true); 
        if(isset($_POST['fortyseven_street_sidebar_layout'])){
            $new = sanitize_text_field(wp_unslash($_POST['fortyseven_street_sidebar_layout']));
        }
        if ($new && $new != $old) {  
            update_post_meta($post_id, 'fortyseven_street_sidebar_layout', $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id,'fortyseven_street_sidebar_layout', $old);  
        } 
     } // end foreach   
     
 }
 add_action('save_post', 'fortyseven_street_save_sidebar_layout'); 