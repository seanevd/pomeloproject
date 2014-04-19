<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="woocommerce-info" id="message"><div id="close-message">×</div><?php echo wp_kses_post( $message ); ?></div>
<?php endforeach; ?>
<script>
	function removeBox() {
		var message = document.getElementById("message");
		message.parentNode.removeChild(message);
	}

	var close = document.getElementById("close-message");
	close.addEventListener("click", removeBox, false);
</script>