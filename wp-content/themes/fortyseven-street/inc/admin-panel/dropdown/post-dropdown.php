<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom post control
 */
class fortyseven_street_Post_Dropdown extends WP_Customize_Control
{
    private $posts = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $postargs = wp_parse_args($options, array('numberposts' => '-1'));
        $this->posts = get_posts($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
    * Render the content on the theme customizer page
    */
    public function render_content()
    {
        if(!empty($this->posts))
        {
            ?>
            <label>
                <span class="customize-post-dropdown"><?php echo esc_html( $this->label ); ?></span>
                <select data-customize-setting-link="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" id="<?php echo esc_attr($this->id); ?>">
                    <option value="" <?php if ( get_theme_mod($this->id) == '' ) echo 'selected="selected"'; ?>><?php esc_html_e( 'Choose Post' , 'fortyseven-street' ) ?></option>
                    <?php  $posts = get_posts('numberposts=-1');
                    foreach ( $posts as $post ) { ?>
                    <option value="<?php echo esc_attr($post->ID); ?>" <?php if ( get_theme_mod($this->id) == $post->ID ) echo 'selected="selected"'; ?>><?php echo esc_html($post->post_title); ?></option>
                    <?php } ?>
                </select>
            </label>
            <?php
        }
    }
}
?>