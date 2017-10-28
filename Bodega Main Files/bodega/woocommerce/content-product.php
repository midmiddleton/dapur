<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $qode_options;



// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}


$products_list_type = 'type1';
if(isset($qode_options['woo_products_list_type'])){
	$products_list_type = $qode_options['woo_products_list_type'];
}

?>

<?php switch($products_list_type) { 
	
	case 'type1': ?>

	<li <?php post_class(); ?>>

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="top-product-section">

				<a href="<?php the_permalink(); ?>">
					<span class="image-wrapper">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
					</span>
				</a>

				<?php do_action('qode_woocommerce_after_product_image'); ?>

			</div>

			<div class="product_info_box">

				<span class="product-categories">
                    <?php echo wp_kses(wc_get_product_category_list( $product->get_id()), array(
                        'span' => array(
                            'class' => true,
                            'id' => true,
                            'title' => true
                        ),
                        'a' => array(
                            'href' => true,
                            'rel' => true,
                            'id' => true,
                            'class' => true,
                            'title' => true
                        )
                    )); ?>
                </span>

				<a href="<?php the_permalink(); ?>" class="product-category">

					<span class="product-title"><?php the_title(); ?></span>

					<?php
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' );
					?>
				</a>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</li>

<?php break; 
case 'type2': ?>

	<li <?php post_class(); ?>>
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="top-product-section">
				<a href="<?php the_permalink(); ?>">
					<span class="image-wrapper">
						<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
					</span>
				</a>
				<?php do_action('qode_woocommerce_after_product_image'); ?>
			</div>
			<div class="product_info_box">
				<span class="product-categories">
                    <?php echo wp_kses(wc_get_product_category_list( $product->get_id()), array(
                        'span' => array(
                            'class' => true,
                            'id' => true,
                            'title' => true
                        ),
                        'a' => array(
                            'href' => true,
                            'rel' => true,
                            'id' => true,
                            'class' => true,
                            'title' => true
                        )
                    )); ?>
                </span>
				<a href="<?php the_permalink(); ?>" class="product-category">            
					<div class="title_price_holder">
						<span class="product-title"><?php the_title(); ?></span>
						<div class="separator_holder"><span class="separator medium"></span></div>
						<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
					</div>
					<div class="product_info_holder">
						<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );?>
					</div>
				</a>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

	</li>

<?php break; 
case 'type3': ?>

	<li <?php post_class( $classes ); ?>>
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<div class="top-product-section">
				<a href="<?php the_permalink(); ?>">
					<span class="image-wrapper">
					<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
					</span>
				</a>
				<?php do_action('qode_woocommerce_after_product_image'); ?>
			</div>
			<div class="product_info_box">
				<span class="product-categories">
                    <?php echo wp_kses(wc_get_product_category_list( $product->get_id()), array(
                        'span' => array(
                            'class' => true,
                            'id' => true,
                            'title' => true
                        ),
                        'a' => array(
                            'href' => true,
                            'rel' => true,
                            'id' => true,
                            'class' => true,
                            'title' => true
                        )
                    )); ?>
                </span>
				<a href="<?php the_permalink(); ?>" class="product-category">            

					<span class="product-title"><?php the_title(); ?></span>
					<div class="separator_holder"><span class="separator medium"></span></div>
					<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
				</a>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	</li>
	
<?php break; } ?>
