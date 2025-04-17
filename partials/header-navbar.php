<!-- ******************* The Navbar Area ******************* -->
<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

    <a class="skip-link visually-hidden-focusable" href="#theme-main">
        <?php esc_html_e('Skip to content', 'picostrap5'); ?>
    </a>


    <nav class="navbar align-items-center d-flex <?php echo get_theme_mod('picostrap_header_navbar_expand', 'navbar-expand-lg'); ?> <?php echo get_theme_mod('picostrap_header_navbar_position') ?> bg-transparent"
        aria-label="Main Navigation">
        <div class="container">
            <div id="logo-tagline-wrap">
                <!-- Your site title as branding in the menu -->
                <?php if (!has_custom_logo()) { ?>

                <?php if (is_front_page() && is_home()): ?>

                <div class="navbar-brand mb-0 h3"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>"
                        title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
                        <?php bloginfo('name'); ?>
                    </a></div>

                <?php else: ?>

                <a class="navbar-brand mb-0 h3" rel="home" href="<?php echo esc_url(home_url('/')); ?>"
                    title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" itemprop="url">
                    <?php bloginfo('name'); ?>
                </a>

                <?php endif; ?>


                <?php } else {
                    the_custom_logo();
                } ?>
                <!-- end custom logo -->


                <?php if (!get_theme_mod('header_disable_tagline')): ?>

                <?php endif ?>


            </div> <!-- /logo-tagline-wrap -->



            <div class="offcanvas offcanvas-end w-100" id="navbarNavDropdown">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasLabel">
                        <?php the_custom_logo(); ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => '',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    )
                );
                ?>

                    <div class="d-md-none px-2 mt-3">
                        <hr>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="
                                    <?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>)"
                                    class="nav-link">
                                    S'identifier
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/contact/" class="nav-link">
                                    Nous contacter
                                </a>
                            </li>
                        </ul>
                    </div>

                    <?php if (get_theme_mod('enable_dark_mode_switch')): ?>
                    <div class="d-flex align-items-center gap-1 mt-4 mt-md-0 navbar-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sun-fill me-1" viewBox="0 0 16 16">
                            <path
                                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                        </svg>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="theme-toggle">
                            <label class="form-check-label visually-hidden" for="theme-toggle"> Toggle Dark / Light mode
                            </label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-moon-fill" viewBox="0 0 16 16">
                            <path
                                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                        </svg>
                    </div>


                    <?php endif; ?>

                </div>
            </div> <!-- .collapse -->



            <?php if (get_theme_mod('enable_search_form')): ?>
            <div class="dropdown d-flex align-items-center">
                <button type="button" data-bs-toggle="modal" data-bs-target="#search" class="btn btn-header-action ">
                    <span class="material-symbols-outlined">search</span>
                </button>
                <div class="modal fade" id="search" tabindex="-1" aria-labelledby="search-modal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="<?php echo bloginfo('url') ?>" method="get" id="header-search-form"
                                class="me-4">
                                <input class="form-control form-control-lg" type="text"
                                    placeholder="Recherche un produit" aria-label="Search" name="s"
                                    value="<?php the_search_query(); ?>">
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn btn-header-action d-none d-md-block"
                    href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>)">

                    <span class="material-symbols-outlined">person</span>
                </a>
                <button class="btn btn-header-action" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#prismCart" aria-controls="prismCart">

                    <span class="material-symbols-outlined">shopping_cart</span>
                    <button class="navbar-toggler border-0 order-2 btn-header-action " type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#navbarNavDropdown" aria-controls="navbarsExample05"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </button>

            </div>

            <?php endif ?>
        </div> <!-- .container -->
    </nav> <!-- .site-navigation -->
    <?php

    //AS A TEST / DEMO for a mock-up megamenu
    //include("nav-static-mega.php");
    ?>
</div><!-- #wrapper-navbar end -->
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
        <?php woocommerce_mini_cart() ?>
    </div>
</div>