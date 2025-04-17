<!-- static example  https://dev.to/typo3freelancer/updated-bootstrap-5-1-1-navbar-multi-level-and-mega-menu-4j1o -->


<nav class="navbar prismNav align-items-center  d-flex <?php echo get_theme_mod('picostrap_header_navbar_expand', 'navbar-expand-lg'); ?> <?php echo get_theme_mod('picostrap_header_navbar_position') ?> bg-transparent"
    aria-label="Main Navigation">
    <div class="container">
        <?php the_custom_logo(); ?>
        <button class="navbar-toggler border-0 order-2 btn-header-action " type="button" data-bs-toggle="offcanvas"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarsExample05" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown dropdown-mega position-static">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">Surf</a>
                    <div class="dropdown-menu shadow-lg">
                        <div class="mega-content px-4">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4 py-4">
                                        <p class="h5 mb-3">
											<a href="/surf/" class="text-decoration-none">Planches de surf</a>
										</p>
                                        <a class=" list-group-item pb-3" href="/surf/">Toutes les planches</a>
                                        <a class=" list-group-item pb-3" href="/shortboards/">Shortboards</a>
                                        <a class="list-group-item pb-3" href="/fish/">Fish</a>
                                        <a class="list-group-item pb-3" href="/eggs/">Eggs</a>
                                        <a class="list-group-item pb-3" href="/evolutive/">Évolutives</a>
                                        <a class="list-group-item pb-3" href="/mid-length/">Mid Length</a>
										<a class="list-group-item pb-3" href="/mini-longboards/">Mini Longboards</a>
                                        <a class="list-group-item pb-3" href="/longboards-mini-malibu/">Longboards &
                                            mini-malibu</a>
                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 py-4">
                                        <p class="h5 mb-3">
											<a href="/gammes-surf-prism/" class="text-decoration-none">Nos gammes</a>
										</p>
                                        <a class=" list-group-item pb-3" href="/gammes-surf-prism/softboards/">Planches
                                            en mousse -
                                            Starter series</a>
                                        <a class="list-group-item pb-3" href="/gammes-surf-prism/epoxy/">Epoxy -
                                            Essentials Series</a>
                                        <a class="list-group-item pb-3"
                                            href="/gammes-surf-prism/wood-paulownia/">Paulownia - Original Series</a>
                                        <a class="list-group-item pb-3" href="/gammes-surf-prism/epoxy-carbone/">Carbone
                                            - Performance Series - Hybrid Shapes</a>
										                                        <a class="list-group-item pb-3" href="https://www.prism-surfboards.com/carbone-classic-shape/">Carbone
                                            - Performance Series - Classic Shapes</a>
																	<a class="list-group-item pb-3 fw-bold text-coral" href="/ltd-edition/">Éditions Limitées</a>
                                        

                                    </div>
                                    <div class="col-12 col-sm-4 col-md-4 py-4">
                                        <h5>Notre sélection</h5>
                                        <div class="card position-relative">
                                            <img src="https://www.prism-surfboards.com/wp-content/uploads/2023/12/6_4-ESSENTIAL-SERIES-Fish-FCS-II-scaled-e1711122333385-600x660.jpg"
                                                class="card-img-top" alt="Surf Fish 6'4 Essentials">
                                            <div class="card-body">
                                                <p class="card-title">Fish 6'4 Essentials</p>
                                                <p class="card-text">399€</p>
                                            </div>
                                            <a href="https://www.prism-surfboards.com/fish/fish-64-essential-series/"
                                                class="w-100 h-100 position-absolute"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="/skimboards/">Skimboards</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">Stand-up Paddle</a>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item fw-bold" href="/stand-up-paddle">Tous les SUPs</a></li>
                        <li><a class="dropdown-item" href="/sup-gonflables/">SUPs Gonflables</a></li>
                        <li><a class="dropdown-item" href="/sups-rigides/">SUPs rigides</a></li>
                    </ul>
                </li>
              
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside">Accessoires</a>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item fw-bold" href="/accessoires/">Tous les accessoires</a></li>
                        <li><a class="dropdown-item" href="/accessoires/housses-chaussette/">Housses de surf</a></li>
                        <li><a class="dropdown-item" href="/accessoires/ailerons/">Ailerons</a></li>
                        <li><a class="dropdown-item" href="/accessoires/leash/">Leash</a></li>
                        <li><a class="dropdown-item" href="/accessoires/pads/">Pad</a></li>
                        <li><a class="dropdown-item" href="/combinaison-neoprene/">Combinaisons</a></li>
                        <li><a class="dropdown-item" href="/accessoires/wax">Wax</a></li>
                        <li><a class="dropdown-item" href="/accessoires/autres/">Autres accessoires</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="/bons-plans/" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        class="nav-link text-coral fw-bold dropdown-toggle">
                        Bons plans
                    </a>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item fw-bold" href="/bons-plans/">Tous les bons plans</a></li>
                        <li><a class="dropdown-item" href="/bons-plans/fin-de-serie/">Fin de série</a></li>
                        <li><a class="dropdown-item" href="/bons-plans/occasions-2nd-choix//">Occasion/2nd choix</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/a-propos/" class="nav-link">
                        À propos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/blog/" class="nav-link">
                        Blog
                    </a>
                </li>
            </ul>
        </div>
        <div class="d-flex ms-auto">
            <button type="button" data-bs-toggle="modal" data-bs-target="#search" class="btn btn-header-action ">
                <span class="material-symbols-outlined">search</span>
            </button>
            <div class="modal fade" id="search" tabindex="-1" aria-labelledby="search-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- <form action="<?php echo bloginfo('url') ?>" method="get" id="header-search-form" class="me-4">
                            <input class="form-control form-control-lg" type="text" placeholder="Recherche un produit"
                                aria-label="Search" name="s" value="">
                        </form> -->
                        <?php get_product_search_form() ?>
                    </div>
                </div>
            </div>
            <a class="btn btn-header-action d-none d-md-block"
                href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>)">

                <span class="material-symbols-outlined">person</span>
            </a>
            <button class="btn btn-header-action d-flex position-relative basket-item-count" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#prismCart" aria-controls="prismCart">

                <span class="material-symbols-outlined">shopping_cart</span>
                <span id="cart-contents-count">


                    <div class="cart-count text-coral" style="top:0; right:0">
                        <span class="text-coral"></span>
                    </div>
                </span>


        </div>
        </button>
    </div>
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
    <div class="offcanvas-body d-flex flex-column">
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
<div class="offcanvas offcanvas-end w-100" id="navbarNavDropdown">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">
            <?php the_custom_logo(); ?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="d-inline-flex w-100 align-items-center justify-content-between" data-bs-toggle="collapse"
            data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
            <div class="h4">Surf</div>
            <div>
                <span class="material-symbols-outlined">expand_more</span>
            </div>

        </div>
        <hr>
        <div style="w-100">
            <div class="collapse" id="collapseWidthExample">
                <div class="card border-0">
                    <a class="h5 text-decoration-none" href="/surf/">Planches de surf</a>
                    <a class=" list-group-item pb-3" href="/shortboards/">Shortboards</a>
                    <a class="list-group-item pb-3" href="/fish/">Fish</a>
                    <a class="list-group-item pb-3" href="/eggs/">Eggs</a>
                    <a class="list-group-item pb-3" href="/evolutive/">Évolutives</a>
                   <a class="list-group-item pb-3" href="/mid-length/">Mid Length</a>
                    <a class="list-group-item pb-3" href="/longboards-mini-malibu/">Longboards &
                        mini-malibu</a>

                    <a class="h5 text-decoration-none mt-4" href="/gammes-surf-prism/">Nos gammes</a>
                    <a class=" list-group-item pb-3" href="/gammes-surf-prism/softboards/">Planches
                        en mousse -
                        Starter series</a>
                    <a class="list-group-item pb-3" href="/gammes-surf-prism/epoxy/">Epoxy -
                        Essentials Series</a>
                    <a class="list-group-item pb-3" href="/gammes-surf-prism/wood-paulownia/">Paulownia - Original
                        Series</a>
                    <a class="list-group-item pb-3" href="/gammes-surf-prism/epoxy-carbone/">Carbone
                        - Performance Series - Hybrid Shapes</a>
					                    <a class="list-group-item pb-3" href="/gammes-surf-prism/carbone-classic-shape/">Carbone
                        - Performance Series - Classic Shapes</a>
				<a class="list-group-item pb-3 fw-bold text-coral" href="/ltd-edition/">Éditions Limitées</a>
                    <hr>


                </div>
            </div>
        </div>
        <div class="d-inline-flex w-100 align-items-center justify-content-between">
            <div class="h3">
                <a class="text-decoration-none h4" href="/skimboards/">Skimboards</a>
            </div>
        </div>
        <hr>
        <div class="d-inline-flex w-100 align-items-center justify-content-between" data-bs-toggle="collapse"
            data-bs-target="#SUPS_mobile" aria-expanded="false" aria-controls="collapseWidthExample">
            <div class="h4">Stand-Up Paddle</div>
            <div>
                <span class="material-symbols-outlined">expand_more</span>
            </div>

        </div>
        <hr>
        <div style="w-100">
            <div class="collapse" id="SUPS_mobile">
                <div class="card border-0">
                    <a class="h5 text-decoration-none" href="/stand-up-paddle/">Tous les SUPs</a>
                    <a class=" list-group-item pb-3" href="/paddle-gonflable/">Paddle gonflable</a>
                    <a class="list-group-item pb-3" href="/sups-rigides/">SUP Rigides</a>
                    <hr>
                </div>
            </div>
        </div>

        <hr>
        <div class="d-inline-flex w-100 align-items-center justify-content-between" data-bs-toggle="collapse"
            data-bs-target="#Accessories_mobile" aria-expanded="false" aria-controls="collapseWidthExample">
            <div class="h4">Accessoires</div>
            <div>
                <span class="material-symbols-outlined">expand_more</span>
            </div>

        </div>
        <hr>
        <div style="w-100">
            <div class="collapse" id="Accessories_mobile">
                <div class="card border-0">
                    <a class="list-group-item pb-3" href="/accessoires/housses-chaussette/">Housses de surf</a>
                    <a class="list-group-item pb-3" href="/accessoires/ailerons/">Ailerons</a>
                    <a class="list-group-item pb-3" href="/accessoires/leash/">Leash</a>
                    <a class="list-group-item pb-3" href="/accessoires/pads/">Pad</a>
                    <a class="list-group-item pb-3" href="/combinaison-neoprene/">Combinaisons</a>
                    <a class="list-group-item pb-3" href="/accessoires/wax">Wax</a>
                    <a class="list-group-item pb-3" href="/accessoires/autres/">Autres accessoires</a>
                    <hr>
                </div>
            </div>
        </div>
        <div class="d-inline-flex w-100 align-items-center justify-content-between">
            <div class="h3 w-100">
                <a class="text-decoration-none h4 fw-bold text-coral w-100" href="/bons-plans/">Bons plans</a>
            </div>
        </div>
        <hr>
        <div class="d-inline-flex w-100 align-items-center justify-content-between">
            <div class="h3 w-100">
                <a class="text-decoration-none h4 w-100" href="/a-propos/">À propos</a>
            </div>
        </div>
        <hr>
        <div class="d-inline-flex w-100 align-items-center justify-content-between">
            <div class="h3 w-100">
                <a class="text-decoration-none h4 w-100" href="/blog/">Blog</a>
            </div>
        </div>
        <hr>
        <div class="d-inline-flex w-100 align-items-center justify-content-between">
            <div class="h3 w-100">
                <a class="text-decoration-none h4 w-100" href="/contact/">Contact</a>
            </div>
        </div>
        <hr>
        <div class="d-inline-flex w-100 align-items-center justify-content-between">
            <div class="h3 w-100">
                <a class="text-decoration-none h4 w-100" href="/mon-compte/">Mon compte</a>
            </div>
        </div>
        <hr>
    </div>
    <!-- .collapse -->
</div>