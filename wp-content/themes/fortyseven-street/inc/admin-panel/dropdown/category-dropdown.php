<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * A class to create a dropdown for all categories in your wordpress site
 */
class fortyseven_street_Category_Dropdown extends WP_Customize_Control
{
  private $cats = false;

  public function __construct($manager, $id, $args = array(), $options = array())
  {
    $this->cats = get_categories($options);

    parent::__construct( $manager, $id, $args );
  }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
    {
      if(!empty($this->cats))
      {
        ?>
        <label>
          <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
          <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
          <select <?php $this->link(); ?>>
            <?php echo '<option value="">'.esc_html_e('Choose Category' , 'fortyseven-street' ).'</option>';?>
            <?php
            foreach ( $this->cats as $cat )
            {
              printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($cat->term_id), selected($this->value(), $cat->term_id, false), esc_html($cat->name));
            }
            ?>
          </select>
        </label>
        <?php
      }
    }
  }
  ?>