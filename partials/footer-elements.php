<footer class="site-footer bg-primary pt-5 pb-7 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div style="filter: brightness(100%);" class="mb-4 w-50">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/logo-prism-white.svg'; ?>"
                        alt="Logo Prism">
                </div>
                <p class="text-white ">Prism Surfboards produit des planches de surf et du matériel de sports de
                    glisse de qualité au meilleur prix
                </p>
                <div class="d-flex text-white align-items-center ">
                    <a href="https://facebook.com/prismSurfing" target="_blank" class="me-4 text-white h2">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://instagram.com/prism_surfboards" target="_blank" class="me-4 text-white h2">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@prismsurfboards" target=" _blank" class=" text-white h2">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <ul class="fa-ul text-white mt-4 ms-4">
                    <li class="d-flex align-items-center mb-3">
                        <span class="fa-li material-symbols-outlined text-secondary">
                            location_on
                        </span>
                        L’Endruère, Bat. C, 44840 les Sorinières
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="fa-li material-symbols-outlined text-secondary">
                            phone
                        </span>
                        <a href="tel:+33613691187" class="text-decoration-none text-white">
                            +33 6 13 69 11 87
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="text-white">Nos produits</h3>
                <?php
                wp_nav_menu(array(
                    'menu' => 'produit_footer',
                    'menu_class' => 'text-white list-unstyled', 
                    'container' => 'div', 
                    "link_before"  => '<p class="text-white ">',
                    'link_after' => '</p>',
                ));
            ?>
            </div>
            <div class="col-md-3">
                <h3 class="text-white">Mon compte</h3>
                <?php
                wp_nav_menu(array(
                    'menu' => 'account',
                    'menu_class' => 'text-white list-unstyled', 
                    'container' => 'div', 
                    "link_before"  => '<p class="text-white">',
                    'link_after' => '</p>',
                ));
                ?>
            </div>
            <div class="col-md-2">
                <h3 class="text-white">Infos utiles</h3>
                <?php
                wp_nav_menu(array(
                    'menu' => 'infos_utiles',
                    'menu_class' => 'text-white list-unstyled', 
                    'container' => 'div', 
                    "link_before"  => '<p class="text-white ">',
                    'link_after' => '</p>',
                ));
            ?>
				<a href="javascript:openAxeptioCookies()" class="text-white " style="text-decoration:none;">
Modifier vos préférences en matière de cookies
</a>
            </div>
        </div>
        <div class="row text-center text-white justify-content-center align-items-center">
            <p class="">
                <span class="material-symbols-outlined">favorite</span>
                Site conçu par <a href="https://paul-lefizelier.fr" target="_blank" class="text-white">Paul
                    Lefizelier</a>
            </p>
        </div>
    </div>
</footer>