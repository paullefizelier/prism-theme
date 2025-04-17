<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

if ( $product->is_in_stock() ) : ?>

<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<div class="prsm_add_cart">
    <span class="fw-bold">Quantité</span>
    <form class="cart d-flex" method="post" enctype='multipart/form-data'>

        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

        <?php
	
		do_action( 'woocommerce_before_add_to_cart_quantity' );
		
		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		
		?>

        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"
            class="single_add_to_cart_button ajax_add_to_cart btn btn-primary align-items-center justify-content-center d-flex w-100 add_to_cart_button  alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
            data-product_id="<?php echo get_the_ID(); ?>">
            <span class="material-symbols-outlined">shopping_cart</span>
            <?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
    </form>
</div>
<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>