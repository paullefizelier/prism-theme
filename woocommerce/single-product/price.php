<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<div class="d-flex justify-content-between align-items-center">
    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
        <?php echo $product->get_price_html(); ?></p>
    <div class="fw-bold prsmStock">
        <?php
        // echo wc_get_stock_html( $product ); // WPCS: XSS ok.

        if ( $product->get_stock_status() === 'instock' ) {
            // Le produit est en stock
            echo '<span class="text-success">En stock</span>';
        } 
		elseif ( $product->get_stock_status() === 'onbackorder' ) {
    // Le produit est en réapprovisionnement
    echo '<span class="text-warning">En réapprovisionnement</span>';
}
		else {
            // Le produit n'est pas en stock
            echo '<span class="text-danger">Rupture de stock</span>';
        }
?>
    </div>
</div>
    <div class="row justify-content-center rounded pt-4 mb-4 bg-light">
        <div class="col-6 col-md-4 text-center mb-2">
            <span class="material-symbols-outlined h5 text-secondary">
                lock
            </span>
            <p class="fw-bold">Paiement sécurisé</p>
        </div>
        <div class="col-6 col-md-4 text-center mb-2">
            <span class="material-symbols-outlined h5 text-secondary">
                local_shipping
            </span>
            <p class="fw-bold">Livraison rapide</p>
        </div>
        <div class="col-6 col-md-4 text-center mb-2">
            <span class="material-symbols-outlined h5 text-secondary">
                support_agent
            </span>
            <p class="fw-bold">Service client 24/7</p>
        </div>
    </div>