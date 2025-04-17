<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>
<div class="d-flex flex-column justify-content-between h-100">
    <ul
        class="woocommerce-mini-cart cart_list product_list_widget list-style-none ps-0 <?php echo esc_attr( $args['list_class'] ); ?>">
        <?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				/**
				 * This filter is documented in woocommerce/templates/cart/cart.php.
				 *
				 * @since 2.1.0
				 */
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
        <li
            class="woocommerce-mini-cart-item d-flex align-items-center justify-content-start <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <?php if ( empty( $product_permalink ) ) : ?>
                <?php echo $thumbnail . '<div>' . wp_kses_post( $product_name ) . '</div>';  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php else : ?>

                <a class="d-flex align-items-center" href="<?php echo esc_url( $product_permalink ); ?>">
                    <?php 
                    $delivery_message = '';
                    
                    // Debug
                    echo "<!-- Debug info:";
                    echo "Stock status: " . $_product->get_stock_status();
                    echo "Is in stock: " . ($_product->is_in_stock() ? 'true' : 'false');
                    echo "Stock quantity: " . $_product->get_stock_quantity();
                    echo "Manage stock: " . ($_product->get_manage_stock() ? 'true' : 'false');
                    echo "-->";
                    
                    if ($_product->get_stock_status() === 'onbackorder' || !$_product->is_in_stock()) {
                        $delivery_message = '<div class="d-block text-dark"><small>Pré-commande</small></div>';
                    } else if ($_product->get_stock_status() === 'instock' || $_product->is_in_stock()) {
                        $delivery_message = '<div class="d-block text-dark"><small>Livré en 48h chrono !</small></div>';
                    } else {
                        $delivery_message = ''; // Pour tout autre statut
                    }
                    
                    echo $thumbnail . wp_kses_post( '<div><span class="fw-bold text-primary">' . $product_name . '</span>' . $delivery_message . '</div>' ); 
                    ?>
                </a>
                <?php endif; ?>
                <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<div class="px-1"><span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                <?php
					echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'woocommerce_cart_item_remove_link',
						sprintf(
							'<p class="mb-0"><a href="%s" class="wc-block-cart-item__remove-link remove text-secondary remove-product" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">SUPPRIMER</a></p></div>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							/* translators: %s is the product name */
							esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						),
						$cart_item_key
					);
					?>
            </div>
        </li>
        <?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
    </ul>
    <div>
        <div class="mb-3">
            <?php
    $cart = WC()->cart->get_cart();
    $products_in_cart = array();

    foreach ($cart as $cart_item) {
        $products_in_cart[] = $cart_item['product_id'];
    }
    
    $cross_sell_products = array();
    $cross_sell_limit = 3; // Limite à 3 produits
    
    foreach ($products_in_cart as $product_id) {
        $product = wc_get_product($product_id);
        $cross_sell_ids = $product->get_cross_sell_ids();
        if (!empty($cross_sell_ids)) {
            $cross_sell_products = array_merge($cross_sell_products, $cross_sell_ids);
        }
    }
    
    // Mélanger les produits recommandés de manière aléatoire
    shuffle($cross_sell_products);
    
    $cross_sell_count = 0; // Initialisation du compteur
    
    if (!empty($cross_sell_products)) {
        echo '<h6>Nous vous recommandons</h6>';
    ?>
            <div id="crossSellProducts" class="row">

                <?php $first = true; ?>
                <?php foreach ($cross_sell_products as $cross_sell_product_id): ?>
                <?php 
                    if ($cross_sell_count >= $cross_sell_limit) {
                        break; // Sortir de la boucle si le compteur atteint la limite
                    }
                    $cross_sell_product = wc_get_product($cross_sell_product_id);
                    $cross_sell_count++; // Incrémenter le compteur
                ?>
                <div class="col-4">
                    <div class="card h-100 <?php echo $first ? 'active' : ''; ?>">
                        <?php echo $cross_sell_product->get_image('full', array('class' => 'rounded-start card-img-top')); ?>
                        <div class="card-body px-0">

                            <a class="fw-bold fs-sm text-decoration-none"
                                href="<?php echo get_permalink($cross_sell_product_id); ?>">
                                <small class=" d-inline-block text-truncate" style="max-width:100%">
                                    <?php echo $cross_sell_product->get_name(); ?></small>
                            </a>
                            <div class="fw-normal text-dark">
                                <small><?php echo $cross_sell_product->get_price_html(); ?></small>
                            </div>


                        </div>


                        <?php
                    // Ajouter le produit au panier via le template add-to-cart.php de WooCommerce
                    // Inclure les classes nécessaires pour l'AJAX
                    echo sprintf(
                        '<a href="?add-to-cart=%d" data-quantity="1" class="button product_type_simple add_to_cart_button fw-bold text-center border-0 text-secondary ajax_add_to_cart" data-product_id="%d" data-product_sku="%s" aria-label="%s" rel="nofollow">%s</a>',
                        esc_attr($cross_sell_product->get_id()),
                        esc_attr($cross_sell_product->get_id()),
                        esc_attr($cross_sell_product->get_sku()),
                        esc_attr(sprintf(__('Add “%s” to your cart', 'woocommerce'), $cross_sell_product->get_name())),
                        esc_html__('Add to cart', 'woocommerce')
                    );
                    ?>


                    </div>
                </div>

                <?php $first = false; ?>
                <?php endforeach; ?>

            </div>

            <?php
    } 

?>



        </div>
        <p class="woocommerce-mini-cart__total total d-flex justify-content-between">
            <?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
        </p>

        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
        <?php
// Afficher les frais de livraison

// Vérifier si les frais d'expédition sont nécessaires et si l'expédition est affichée
if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) {
    // Initialiser une variable pour vérifier si au moins un produit n'est pas de la classe "accessoires"
    $has_non_accessory_product = false;

    // Vérifier chaque produit dans le panier
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        // Récupérer l'ID du produit
        $product_id = $cart_item['product_id'];

        // Vérifier si le produit n'est pas de la classe "accessoires"
        if (!has_term('accessoires', 'product_cat', $product_id)) {
            $has_non_accessory_product = true;
            break; // Sortir de la boucle dès qu'un produit qui n'est pas de la classe "accessoires" est trouvé
        }
    }

    // Afficher les frais de livraison en conséquence
    if ($has_non_accessory_product) {
        // Récupérer le montant total des frais de livraison
        $shipping_total = WC()->cart->get_shipping_total();
        ?>
        <p class="woocommerce-mini-cart__shipping-total total d-flex justify-content-between">
            <?php
            // Vérifier si la zone de livraison est connue
            if (WC()->customer->get_shipping_country()) {
                // Afficher les frais de livraison normaux
                echo '<span>' . esc_html__('Shipping:', 'woocommerce') . '</span>';
                echo '<span>' . wc_price($shipping_total) . '</span>';
            } else {
                // Afficher le montant par défaut (19€)
                echo '<span>' . esc_html__('Shipping:', 'woocommerce') . '</span>';
                echo '<span>à partir de ' . wc_price('19', array('currency' => get_woocommerce_currency())) . '</span>';
            }
            ?>
        </p>
        <?php
    } else {
        // Afficher le montant alternatif (4,80€)
        ?>
        <p class="woocommerce-mini-cart__shipping-total total d-flex justify-content-between">
            <?php
            echo '<span>' . esc_html__('Shipping:', 'woocommerce') . '</span>';
            echo '<span>' . wc_price('4.80', array('currency' => get_woocommerce_currency())) . '</span>';
            ?>
        </p>
        <?php
    }
}
?>


        <div class="woocommerce-mini-cart__buttons buttons d-block ">
            <a href="https://www.prism-surfboards.com/commander" class="btn btn-primary d-block">Commander</a>
        </div>

        <?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>
    </div>
</div>
<?php else : ?>

<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?>
</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>