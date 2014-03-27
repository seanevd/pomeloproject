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

?>