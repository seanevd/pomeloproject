<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
	</div>
	<div class="row">
		<div class="woocommerce-tabs">
			<h2>About <?php the_title();?></h2>
			<div class="details">
				<?php the_content(); ?>
			</div>
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<div class="panel entry-content" id="tab-<?php echo $key ?>">
					<?php call_user_func( $tab['callback'], $key, $tab ) ?>
				</div>

			<?php endforeach; ?>
		</div>
</div>



<?php endif; ?>