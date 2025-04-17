<nav class="navbar prismNav align-items-center  d-flex <?php echo get_theme_mod('picostrap_header_navbar_expand', 'navbar-expand-lg'); ?> <?php echo get_theme_mod('picostrap_header_navbar_position') ?> bg-transparent"
    style="border-bottom:2px solid #F7F7F7;" aria-label="Main Navigation">
    <div class="container">
        <?php the_custom_logo(); ?>

        <button class="btn btn-header-action d-flex position-relative" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#prismCart" aria-controls="prismCart">

            <span class="material-symbols-outlined">shopping_cart</span>
            <?php
if (class_exists('WooCommerce')) {
    $nombre_produits = WC()->cart->get_cart_contents_count();
    echo '<div class="cart-count" style="top:0; right:0"><span class="text-coral">' . $nombre_produits . '</span></div>';
}
?>
        </button>
    </div>
</nav>

<div class="offcanvas offcanvas-end w-30" tabindex="-1" id="prismCart" aria-labelledby="Prism Cart">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="prismCartLabel">Panier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div id="carousel_cart_reassurance" class="carousel slide bg-secondary" data-bs-touch="true"
        data-bs-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active px-2 py-2 ">
                <div class="d-flex align-items-center text-white content">
                    <span class="material-symbols-outlined fw-normal h3 me-2 px-1 mb-0">local_shipping</span>
                    <div>
                        <small class="mb-0 fw-bold">Livraison rapide</small></br>
                        <small>en 48h</small>
                    </div>
                </div>
            </div>
            <div class="carousel-item px-2 py-2">
                <div class="d-flex align-items-center text-white content">
                    <span class="material-symbols-outlined fw-normal h3 me-2 px-1 mb-0">payments</span>
                    <div>
                        <small class="mb-0 fw-bold">Paiement sécurisé</small></br>
                        <small>et en plusieurs fois sans frais</small>
                    </div>
                </div>
            </div>
            <div class="carousel-item px-2 py-2">
                <div class="d-flex align-items-center text-white content">
                    <span class="material-symbols-outlined h3 fw-normal me-2 px-1 mb-0">support</span>
                    <div>
                        <small class="mb-0 fw-bold">Service client 24/7</small></br>
                        <small>
                            <a href="tel:+33613691187" class="text-white text-decoration-none">
                                Appelez-nous au +33 6 13 69 11 87
                            </a>
                        </small>
                    </div>
                </div>
            </div>
            <div class="carousel-item py-2 px-2">
                <div class="d-flex align-items-center text-white content">
                    <span class="material-symbols-outlined h3 me-2 px-1 mb-0">star</span>
                    <div>
                        <small class="mb-0 fw-bold">Avis client</small></br>
                        <small>Plus de 1000 clients satisfaits</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel_cart_reassurance" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel_cart_reassurance" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel_cart_reassurance" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carousel_cart_reassurance" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>

    </div>
    <div class="offcanvas-body">
        <?php
        
        // Vérifier si WooCommerce est activé
if (class_exists('WooCommerce')) {
    // Afficher le widget de panier
    echo '<div class="woocommerce-mini-cart widget_shopping_cart_content">';
    woocommerce_mini_cart();
    echo '</div>';
}
?>
    </div>
</div>