<?php
/**
 * Testimonial post/page widget
 *
 * @package FortySeven Street
 */
/**
 * Adds FortySeven Street Loader Widgets.
 */
add_action('widgets_init', 'fortyseven_street_register_loader_widget');

function fortyseven_street_register_loader_widget() {
    register_widget('fortyseven_street_loader');
}

class fortyseven_street_Loader extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
        'fortyseven_street_loader', __('Street : Loader','fortyseven-street'), array(
        'description' => __('A widget to add loader.', 'fortyseven-street')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $fields = array(
            // This widget has no title
            // Other fields
            'loader_title' => array(
                'fortyseven_street_widgets_name' => 'loader_title',
                'fortyseven_street_widgets_title' => __('Loader Title', 'fortyseven-street'),
                'fortyseven_street_widgets_field_type' => 'text',
            ),
            
            'loader_percentage' => array(
                'fortyseven_street_widgets_name' => 'loader_percentage',
                'fortyseven_street_widgets_title' => __('Loader Percentage', 'fortyseven-street'),
                'fortyseven_street_widgets_field_type' => 'number',
            )
        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args , $instance) {
        extract($args);
        if($instance != null){
            $loader_title = $instance['loader_title'];
            $loader_percentage = $instance['loader_percentage'];
            $loader_color = '#439cc9';
    
            echo wp_kses_post($before_widget);
            ?>
            <canvas class="classyloader" color="<?php echo esc_attr( $loader_color) ?>" data-percentage="<?php echo esc_attr($loader_percentage); ?>"></canvas>
            <h4><?php echo esc_html($loader_title);?></h4>
            <?php
            echo wp_kses_post($after_widget);
            }
        }

        /**
         * Sanitize widget form values as they are saved.
         *
         * @see WP_Widget::update()
         *
         * @param	array	$new_instance	Values just sent to be saved.
         * @param	array	$old_instance	Previously saved values from database.
         *
         * @uses	fortyseven_street_widgets_updated_field_value()		defined widgets-functions.php
         *
         * @return	array Updated safe values to be saved.
         */
        public function update($new_instance, $old_instance) {
            
            $widget_fields = $this->widget_fields();

            // Loop through fields
            foreach ($widget_fields as $widget_field) {

                extract($widget_field);
                // Use helper function to get updated field values
                $instance[$fortyseven_street_widgets_name] = fortyseven_street_widgets_updated_field_value($widget_field, $new_instance[$fortyseven_street_widgets_name]);
            }

            return $instance;
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param	array $instance Previously saved values from database.
         *
         * @uses	fortyseven_street_widgets_show_field()		defined widgets-functions.php
         */
        public function form($instance) {
            $widget_fields = $this->widget_fields();
            // Loop through fields
            foreach ($widget_fields as $widget_field) {
                // Make array elements available as variables
                extract($widget_field);
                $fortyseven_street_widgets_field_value = isset($instance[$fortyseven_street_widgets_name]) ? esc_attr($instance[$fortyseven_street_widgets_name]) : '';
                fortyseven_street_widgets_show_widget_field($this, $widget_field, $fortyseven_street_widgets_field_value);
            }
        }

    }
    