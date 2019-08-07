<?php

/**
 * @package Street
 */
function fortyseven_street_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {

    extract($widget_field);

    switch ($fortyseven_street_widgets_field_type) {

        // Standard text field
        case 'text' :
        ?>
        <p>
            <label for="<?php echo esc_attr($instance->get_field_id($fortyseven_street_widgets_name)); ?>"><?php echo esc_html($fortyseven_street_widgets_title); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($fortyseven_street_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($fortyseven_street_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value) ; ?>" />

            <?php if (isset($fortyseven_street_widgets_description)) { ?>
            <br />
            <small><?php echo esc_html($fortyseven_street_widgets_description); ?></small>
            <?php } ?>
        </p>
        <?php
        break;

        case 'number' :
        ?>
        <p>
            <label for="<?php echo esc_attr($instance->get_field_id($fortyseven_street_widgets_name)); ?>"><?php echo esc_html($fortyseven_street_widgets_title); ?>:</label><br />
            <input name="<?php echo esc_attr($instance->get_field_name($fortyseven_street_widgets_name)); ?>" type="number" step="1" min="1" id="<?php echo esc_attr($instance->get_field_id($fortyseven_street_widgets_name)); ?>" value="<?php echo esc_attr($athm_field_value); ?>" class="small-text" />

            <?php if (isset($fortyseven_street_widgets_description)) { ?>
            <br />
            <small><?php echo esc_html($fortyseven_street_widgets_description); ?></small>
            <?php } ?>
        </p>
        <?php
        break;
    }
}

function fortyseven_street_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($fortyseven_street_widgets_field_type == 'number') {
        return absint($new_field_value);
    }
    else {
        return strip_tags($new_field_value);
    }
}