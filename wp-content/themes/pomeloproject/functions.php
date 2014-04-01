<?php 
/*
hack to add the description/tagline at the wp_title on homepage
*/

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return get_bloginfo('name') . ' | ' . get_bloginfo( 'description' );
  }
  else
  	return the_title();
}

register_nav_menu( 'primary', 'Top Navigation' );


function display_hero_image( $atts ){
    extract( shortcode_atts( array(
        'image' => 'Cambodia.jpg',
    ), $atts ) );
    $upload_dir = wp_upload_dir();
    $image_dir = $upload_dir['baseurl'] . '/assets/' . $image;

    echo '</div></div>';
    echo '<div class="heroimage" style="background-image:url('. $image_dir .'); width: 100%; height: 500px;"></div>';
    echo '<div class="row"><div class="small-12 columns">';

}
add_shortcode( 'hero', 'display_hero_image' );

add_image_size( 'widest', 970 );

?>