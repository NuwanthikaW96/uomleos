<?php
/**
 * The template for search form.
 *
 * @package Maggie Lite
 */
?>

<div class="search-icon">
    <div class="ed-search">
       <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search">
        <label>
            <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'fortyseven-street' ) ?></span>
            <input type="search" title="<?php esc_attr_e( 'Search for:', 'fortyseven-street' ); ?>" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search content...', 'fortyseven-street' );?>" class="search-field" />
        </label>
        <button type="submit" class="search-submit" title="<?php esc_attr_e( 'Search', 'fortyseven-street' ); ?>"><i class="fa fa-search"></i></button>
    </form>
</div>
</div> 
