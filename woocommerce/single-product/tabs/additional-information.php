<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
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

defined( 'ABSPATH' ) || exit;

global $product;

$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) );

?>

<?php if ( $heading ) : ?>
<h2><?php echo esc_html( $heading ); ?></h2>
<?php endif; ?>

<?php do_action( 'woocommerce_product_additional_information', $product ); ?>

<div class="row my-4">
    <div class="col-12">
        <div class="alert alert-secondary d-flex align-items-start" role="alert">
            <span class="h2 material-symbols-outlined flex-shrink-0 me-2">
                help
            </span>
            <div>
                <div class="h4">Besoin d'aide ?</div>
                <p class="mb-0 lead">Contactez-nous au <a href="tel:+33681042149" class="text-decoration-none">06 81 04 21 49</a> ou par
                    mail
                    <a href="mailto:contact@prism-surfboards.com"
                        class="text-decoration-none">contact@prism-surfboards.com</a>
                </p>
            </div>
        </div>
    </div>
</div>