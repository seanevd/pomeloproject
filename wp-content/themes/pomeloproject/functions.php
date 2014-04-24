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
register_nav_menu( 'footer', 'Footer Navigation' );

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
    $re = '/(?<=src=")(.*)(?=-\d{3}x\d{3})/';
    $str = $image;
    preg_match($re, $str, $matches);

    $image_dir = $matches[0].'.jpg';

    echo '</div></div>';
    echo '<div class="heroimage" style="background-image:url('. $image_dir .');">
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

add_image_size( 'widest', 970 );
add_image_size( 'standard', 600 );

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

  function WC_Meta_Box_Seamstress_Images( $post ) {
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_attachment_nonce');
    ?>
    <script>
      ( function( $ ) {
        $(document).ready(
          function() {
            $('#upload_image_button').click(
              function() {
                tb_show('', 'media-upload.php?postid=<?php echo $post->ID; ?>&type=image&amp;TB_iframe=true');
                return false;
              }
              );
          }
          );
      }) (jQuery);
      </script>
      <div class="media-upload">
          <h2>Upload Media</h2>
          <table>
             <tr valign="top">
                <td><input id="upload_image_button" type="button" value="Upload Media"></td>
             </tr>
          </table>
      </div>

    <?php
  }

function admin_scripts()
  {
     wp_enqueue_script('media-upload');
     wp_enqueue_script('thickbox');
  }
 
function admin_styles()
  {
     wp_enqueue_style('thickbox');
  }
 
add_action('admin_print_scripts', 'admin_scripts');
add_action('admin_print_styles', 'admin_styles');

  function meta_save( $post_id ) {
    //$attachment_idz = array_filter( explode( ',', wc_clean( $_POST['product_seamstress_image'] ) ) );

    update_post_meta( $post_id, 'seamstress_image_gallery', $_POST['product_seamstress_image'] );
  }

add_action( 'save_post', 'meta_save');

function add_seamstress_metaboxes() {
  add_meta_box('wpt_seamstress_content', 'Seamstress Image', 'WC_Meta_Box_Seamstress_Images', 'product', 'side', 'low');
}
add_action( 'add_meta_boxes', 'add_seamstress_metaboxes' );



function display_seamstress_image( $atts, $content = null ){
  extract( shortcode_atts( array(
        'image' => 'documentary.jpg',
    ), $atts ) );
    $re = '/(?<=src=")(.*)(?=-\d{3}x\d{3})/';
    $str = $image;
    preg_match($re, $str, $matches);
    echo '<div class="small-12 medium-6 columns">';
    echo $content;
    echo '</div>';
    echo '<div class="small-12 medium-6 columns">';
    echo '<img src="'.$matches[0].'.jpg" alt="'.get_the_title().'">';
    echo '</div>';
    //echo ' style="background-image:url('. $image_dir .'); width: 100%; height: 500px;">';

}
add_shortcode( 'seamstress', 'display_seamstress_image' );


function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="meta-text" class="prfx-row-title"><?php _e( 'Social Media URL', 'prfx-textdomain' )?></label>
        <input type="text" name="meta-text" id="meta-text" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $prfx_stored_meta['meta-text'][0]; ?>" />
    </p>
 
    <?php
}

function prfx_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'meta-text' ] ) ) {
        update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
    }
 
}
add_action( 'save_post', 'prfx_meta_save' );

function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'URL', 'prfx-textdomain' ), 'prfx_meta_callback', 'social_media' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );


add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'social_media',
    array(
      'labels' => array(
        'name' => __( 'Social Icons' ),
        'singular_name' => __( 'Social Icon' ),
        'edit_item' => __( 'Edit Social Media URL' )
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'add_meta_boxes' ),
      'rewrite' => array('slug' => 'social'),
    )
  );
}




?>