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
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="card mb-3 h-100 border-0  " <?php wc_product_class( '', $product ); ?>>
    <?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
		
	 ?>
    <div class="card-img-top ">

        <?php
		do_action('woocommerce_template_loop_price');
	do_action( 'woocommerce_before_shop_loop_item' );
		
    ?>


        <?php
	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	
		
    ?>
    </div>
    <div class="card-body px-0">
        <h2 class="h6 text-secondary fw-normal card-title"><?php the_title() ; ?></h2>
        <?php
	 $average_rating = $product->get_average_rating();
	 $rating_count = $product->get_rating_count();
	 ?>
        <div class="d-flex align-items-center" style="flex-wrap: wrap">
            <?php
			 echo $product->get_price_html();
	 	?>
        </div>
		<?php echo wc_get_rating_html($average_rating, $rating_count); ?>
    </div>
    <div class="card-footer px-0  bg-transparent border-0">
        <?php

// echo apply_filters('woocommerce_loop_add_to_cart_link', // Filtre pour modifier le lien "Ajouter au panier"
// sprintf('<a href="%s" data-quantity="%s" class="btn %s" %s>%s</a>',
// 	esc_url($product->add_to_cart_url()), // URL du bouton "Ajouter au panier"
// 	esc_attr(isset($args['quantity']) ? $args['quantity'] : 1), // Quantité
// 	esc_attr(isset($args['class']) ? $args['class'] : 'btn btn-primary btn-sm w-100'), // Classes CSS du bouton
// 	isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '', // Attributs supplémentaires
// 	esc_html($product->add_to_cart_text()) // Texte du bouton "Ajouter au panier"
// ),
// $product // Objet produit
// );
do_action( 'woocommerce_after_shop_loop_item' );
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );
	
    
    /**
    * Hook: woocommerce_after_shop_loop_item_title.
    
    * @hooked woocommerce_template_loop_price - 10
	* @hooked woocommerce_template_loop_rating - 5
    */
    // do_action( 'woocommerce_after_shop_loop_item_title' );
	?>

        <?php
    /**
    * Hook: woocommerce_after_shop_loop_item.
    *
    * @hooked woocommerce_template_loop_product_link_close - 5
    * @hooked woocommerce_template_loop_add_to_cart - 10
    */
    ?>

    </div>
</div>