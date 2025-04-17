<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! $notices ) {
	return;
}
?>

<?php foreach ( $notices as $notice ) : ?>
<?php if (strpos($notice['notice'], 'a été ajouté à votre panier') !== false): ?>
<?php
            // Obtenez le panier de l'utilisateur
            $cart = WC()->cart;
            // Obtenez les articles dans le panier
            $cart_items = $cart->get_cart();
            // Récupérez la clé du dernier élément ajouté
            $last_item_key = end(array_keys($cart_items));
            // Récupérez les détails du dernier élément ajouté
            $last_item = $cart_items[$last_item_key];
            // Récupérez le nom du produit
            $product_name = $last_item['data']->get_name();
        ?>
<div class="woocommerce-message bg-success-100 border-0 rounded justify-content-between d-flex"
    <?php echo wc_get_notice_data_attr( $notice ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    role="alert">
    <?php
                // Texte personnalisé avec le nom du produit
                echo '<div>Le produit ' . $product_name .' a été ajouté à votre panier !</div>';
            ?>
    <button type="button" data-bs-toggle="offcanvas" data-bs-target="#prismCart" aria-controls="prismCart"
        class="btn btn-primary btn-sm">Voir le
        panier
    </button>
</div>
<?php else: ?>
<div class="woocommerce-message border-0 bg-success-100 rounded"
    <?php echo wc_get_notice_data_attr( $notice ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    role="alert">
    <?php echo wc_kses_notice( $notice['notice'] ); ?>
</div>
<?php endif; ?>
<?php endforeach; ?>