<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

wc_print_notices();

?>

<div class="empty-cart-wrapper">
    <?php
    /**
     * @hooked wc_empty_cart_message - 10
     */
    do_action( 'woocommerce_cart_is_empty' );

    if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
        <p class="return-to-shop">
            <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                <?php _e( 'Return To Shop', 'woocommerce' ) ?>
            </a>
        </p>
    <?php endif; ?>
</div>