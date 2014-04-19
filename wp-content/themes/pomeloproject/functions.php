<?php 

add_theme_support( 'woocommerce' );

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

/*function display_seamstress_image( $atts, $content = null ){
    extract( shortcode_atts( array(
        'image' => $content;,
    ), $atts ) );

    echo '</div></div>';
    echo '<div class="row">
        <div class="small-12 medium-6 columns">
          <div class="seamstress"><img src="';
            echo $image;
          echo '" alt="Portrait of seamstress"></div>
          </div>
      </div>';
    echo '<div class="row"><div class="small-12 columns">';

}*/

function display_hero_image( $atts, $content = null ){
    extract( shortcode_atts( array(
        'image' => 'documentary.jpg',
    ), $atts ) );
    $upload_dir = wp_upload_dir();
    $image_dir = $upload_dir['baseurl'] . '/assets/' . $image;

    echo '</div></div>';
    echo '<div class="heroimage" style="background-image:url('. $image_dir .'); width: 100%; height: 500px;">
        <div class="row">
          <div class="small-12 columns">
            <div class="banner-text">';
              echo $content;
            echo '</div>
            </div>
        </div>
      </div>';
    echo '<div class="row"><div class="small-12 columns">';

}
add_shortcode( 'hero', 'display_hero_image' );

//add_shortcode( 'seamstress', 'display_seamstress_image' );

add_image_size( 'widest', 970 );

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;
  
  ob_start();
  
  ?>
  <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>
  <?php
  
  $fragments['a.cart-contents'] = ob_get_clean();
  
  return $fragments;
  
}

class WC_Meta_Box_Seamstress_Images {

  /**
   * Output the metabox
   */
  public static function output( $post ) {
    ?>
    <div id="product_images_container">
      <ul class="product_images">
        <?php
          if ( metadata_exists( 'post', $post->ID, '_product_seamstress_image' ) ) {
            $product_seamstress_image = get_post_meta( $post->ID, '_product_seamstress_image', true );
          } else {
            // Backwards compat
            $attachment_ids = get_posts( 'post_parent=' . $post->ID . '&numberposts=-1&post_type=attachment&orderby=menu_order&order=ASC&post_mime_type=image&fields=ids&meta_key=_woocommerce_exclude_image&meta_value=0' );
            $attachment_ids = array_diff( $attachment_ids, array( get_post_thumbnail_id() ) );
            $product_seamstress_image = implode( ',', $attachment_ids );
          }

          $attachments = array_filter( explode( ',', $product_seamstress_image ) );

          if ( $attachments )
            foreach ( $attachments as $attachment_id ) {
              echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                ' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '
                <ul class="actions">
                  <li><a href="#" class="delete tips" data-tip="' . __( 'Delete image', 'woocommerce' ) . '">' . __( 'Delete', 'woocommerce' ) . '</a></li>
                </ul>
              </li>';
            }
        ?>
      </ul>

      <input type="hidden" id="product_seamstress_image" name="product_seamstress_image" value="<?php echo esc_attr( $product_seamstress_image ); ?>" />

    </div>
    <p class="add_product_images hide-if-no-js">
      <a href="#" data-choose="<?php _e( 'Add Seamstress Image', 'woocommerce' ); ?>" data-update="<?php _e( 'Add seamstress image', 'woocommerce' ); ?>" data-delete="<?php _e( 'Delete image', 'woocommerce' ); ?>" data-text="<?php _e( 'Delete', 'woocommerce' ); ?>"><?php _e( 'Full Functionality Coming Soon', 'woocommerce' ); ?></a>
    </p>
    <?php
  }

  /**
   * Save meta box data
   */
  public static function save( $post_id, $post ) {
    $attachment_idz = array_filter( explode( ',', wc_clean( $_POST['product_seamstress_image'] ) ) );

    update_post_meta( $post_id, '_product_image_gallery', implode( ',', $attachment_idz ) );
  }
}

add_action( 'add_meta_boxes', 'add_seamstress_metaboxes' );

function add_seamstress_metaboxes() {
  add_meta_box('wpt_seamstress_content', 'Seamstress Image', 'WC_Meta_Box_Seamstress_Images::output', 'product', 'side', 'low');
}




?>