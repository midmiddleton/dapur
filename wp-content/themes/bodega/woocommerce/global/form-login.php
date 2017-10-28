<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( is_user_logged_in() ) {
    return;
}

?>
<form class="woocomerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

    <?php do_action( 'woocommerce_login_form_start' ); ?>

    <div class="login-entrance-text">
        <?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; ?>
    </div>

    <p class="form-row form-row-first">
        <input type="text" placeholder="<?php _e( 'Username or email', 'woocommerce' ); ?>" class="input-text placeholder" name="username" id="username" />
    </p>
    <p class="form-row form-row-last">
        <input class="input-text placeholder" placeholder="<?php _e( 'Password', 'woocommerce' ); ?>" type="password" name="password" id="password" />
    </p>
    <div class="clear"></div>

    <?php do_action( 'woocommerce_login_form' ); ?>

    <p class="form-row">
        <?php wp_nonce_field( 'woocommerce-login' ); ?>
        <input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
        <a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
        <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php _e( 'Remember me', 'woocommerce' ); ?></span>
        </label>
    </p>

    <div class="clear"></div>

    <?php do_action( 'woocommerce_login_form_end' ); ?>

</form>