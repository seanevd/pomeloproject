<?php
/**
 * Show error messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>
<ul class="woocommerce-error" id="message"><div id="close-message">×</div>
	<?php foreach ( $messages as $message ) : ?>
		<li><?php echo wp_kses_post( $message ); ?></li>
	<?php endforeach; ?>
</ul>
<script>
	function removeBox() {
		var message = document.getElementById("message");
		message.parentNode.removeChild(message);
	}

	var close = document.getElementById("close-message");
	close.addEventListener("click", removeBox, false);
</script>