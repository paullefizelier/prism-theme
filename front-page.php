<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<header>
    <div id="prsm_carousel" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <?php 
                $repeater_field = get_field('carousel');
                if ($repeater_field) {
                    foreach ($repeater_field as $row)  {
                        $image = $row['image'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $link = $row['link'];
                        $buttonLabel = $row['buttonLabel'];

                        echo '<li class="splide__slide w-100 d-flex align-items-center">' ;
                        echo '<img src="' . $image['url'] . '" alt="" >';
                        echo '<div class="container prismSlider">';
                        echo '<div class="row">';
                        echo '<div class="col-md-6">';
                        echo '<p class="h2 text-white"> ' . $title .  ' </p>';
                        echo '<p class="text-white">' . $description .'</p>';
                        echo '<a href="'. $link .'" class="btn btn-primary"> '. $buttonLabel .' </a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        
                    }
                }

            ?>
            </ul>
        </div>
    </div>
</header>
<section class=" py-5 bg-light">
    <div class="container">
        <div class="row align-items-center reassurance">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="d-md-flex justify-content-center">
                    <div class="me-2">
                        <span class="material-symbols-outlined h2 text-secondary">lock</span>
                    </div>
                    <div>
                        <p class="h4 text-primary">
                            Paiement sécurisé
                        </p>
                        <p class="mb-0">Payez de manière sécurisée,
                            chiffrée et en plusieurs fois </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="d-md-flex justify-content-center">
                    <div class="me-2">
                        <span class="material-symbols-outlined h2 text-secondary">local_shipping</span>
                    </div>
                    <div>
                        <p class="h4 text-primary">
                            Livraison rapide
                        </p>
                        <p class="mb-0">Recevez votre commande dans
                            les 48h en France et en Europe </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="d-md-flex justify-content-center">
                    <div class="me-2">
                        <span class="material-symbols-outlined h2 text-secondary">support</span>
                    </div>
                    <div>
                        <a href="tel:+33613691187" class="text-decoration-none">
                            <p class="h4 text-primary">
                                Service client 24/7
                            </p>
                            <p class="mb-0">
                                Contactez-nous par mail ou au +33 6 13 69 11 87
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <strong class="text-uppercase text-secondary pb-3">Planches de surf</strong>
                <h2 class="text-primary">
                    Des gammes adaptées à tous les niveaux
                </h2>
            </div>
        </div>
        <div class="row mt-5">
			            <div class="col-6 col-md-3">
                <div class="card border-0 h-100 mb-3 position-relative">
                    <img class="card-img-top"
                        src="https://www.prism-surfboards.com/wp-content/uploads/2024/03/gamme-starter-series.jpg">
                    <div class="card-body text-center bg-light py-3">
                        <h3 class="card-title text-secondary h5">
                            Starter Series
                        </h3>
                        <p class="mb-0">Les planches parfaites pour les débutants, les petites conditions & pour
                            s'éclater dans le shorebreak
                        </p>

                    </div>
                    <div class="card-footer bg-light border-0 d-flex justify-content-between">
                        <a href="/gammes-surf-prism/softboards/" class="text-decoration-none fw-bold">Découvrir la
                            gamme</a>
                        <div>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </div>
                    </div>
										 <a href="/gammes-surf-prism/softboards/" class="text-decoration-none fw-bold position-absolute w-100 h-100"></a>
                </div>
            </div>
            
            <div class="col-6 col-md-3 ">
                <div class="card border-0 h-100 position-relative  mb-3">
                    <img class="card-img-top"
                        src="https://www.prism-surfboards.com/wp-content/uploads/2024/03/gamme-essential-series.jpg">
                    <div class="card-body text-center bg-light py-3">
                        <h3 class="card-title h5 text-green">
                            Essential Series
                        </h3>
                        <p class="mb-0">Une gamme de planches ultra
                            légères et minimalistes pour tous
                            les niveaux & toutes les conditions
                        </p>
                    </div>
                    <div class="card-footer bg-light border-0 d-flex justify-content-between">
                        <a href="/gammes-surf-prism/epoxy/" class="text-decoration-none fw-bold">Découvrir la gamme</a>
                        <div>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </div>
                    </div>
									                        <a href="/gammes-surf-prism/epoxy/" class="text-decoration-none fw-bold position-absolute w-100 h-100"></a>
                </div>

            </div>
            <div class="col-6 col-md-3 ">
                <div class="card border-0 h-100 mb-3 position-relative">
                    <img class="card-img-top"
                        src="https://www.prism-surfboards.com/wp-content/uploads/2024/03/gamme-original-series.jpg">
                    <div class="card-body text-center bg-light py-3">
                        <h3 class="card-title h5 text-dark">
                            Original Series
                        </h3>
                        <p class="mb-0">Des planches légères aux finitions bois Paulownia
                            pour tous les niveaux
                        </p>
                    </div>
                    <div class="card-footer bg-light border-0 d-flex justify-content-between">
                        <a href="/gammes-surf-prism/wood-paulownia/" class="text-decoration-none fw-bold">Découvrir la
                            gamme</a>
                        <div>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </div>
                    </div>
					 <a href="/gammes-surf-prism/wood-paulownia/" class="text-decoration-none fw-bold position-absolute w-100 h-100"></a>
                </div>
            </div>
		<div class="col-6 col-md-3  ">
                <div class="card border-0 h-100 mb-3 position-relative">
                    <img class="card-img-top"
                        src="https://www.prism-surfboards.com/wp-content/uploads/2024/03/gamme-performance-series.jpg">

                    <div class="card-body text-center bg-light py-3">
                        <h3 class="card-title h5 text-coral">
                            Performance Series
                        </h3>
                        <p class="mb-0">Des planches performantes et
                            robustes pour performer
                            dans toutes les conditions
                        </p>
                    </div>
                    <div class="card-footer bg-light border-0 d-flex justify-content-between">
                        <a href="/gammes-surf-prism/epoxy-carbone/" class="text-decoration-none fw-bold">Découvrir la
                            gamme</a>
                        <div>
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </div>
                    </div>
<a href="/gammes-surf-prism/epoxy-carbone/" class="position-absolute w-100 h-100"></a>
                </div>
									
            </div>
        </div>
		
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="/surf" class="btn btn-primary btn-lg">Toutes nos gammes</a>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <?php
                // Récupération de l'ID de la catégorie par son slug
                $sup = get_term_by('slug', 'stand-up-paddle', 'product_cat');

                // Vérification si la catégorie existe et si c'est bien une catégorie WooCommerce
                if ($sup && !is_wp_error($sup)) {
                    // Récupération des informations de la catégorie
                    $category_name = $sup->name; // Nom de la catégorie
                    $category_slug = $sup->slug; // Slug de la catégorie
                    $category_description = $sup->description; // Description de la catégorie

                    // Récupération de l'URL de l'image mise en avant de la catégorie
                    $category_image_id = get_term_meta($sup->term_id, 'thumbnail_id', true);
                    $category_image = wp_get_attachment_url($category_image_id);
            ?>
            <div class="col-md-6">
                <img src="<?php echo esc_attr($category_image)?>" alt="<?php echo esc_attr($category_name)?>">
            </div>
            <div class="col-md-6">
                <?php 
                        echo '<h2 class="h4 text-green text-uppercase">' . $category_name . '</h2>';
                        echo "<h3 class='h1'>Partez à l'aventure !</h3>";
                        echo '<p>Gonflables pour les balades et les débutants ou rigides pour des sessions de surf de folie, découvrez nos Stand-Up Paddles (SUPs) conçus en France, inspirés des meilleurs shapes. </p>';
                        echo '<a href="'. $category_slug .'" class="btn btn-primary">Découvrir les SUPs</a>';
                    ?>
            </div>
            <?php
                } 
            ?>
        </div>
    </div>
</section>
<section class=" py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <span class="h5 text-uppercase text-secondary">Planches de surf</span>
                <h2>Nos meilleures ventes</h2>
            </div>
        </div>


        <div class=" mt-5 featured-products ">
            <div id="splideProduct1" class="splide">
                <div class="splide__track">
                    <div class="splide__list d-flex">
                        <?php
                        $featured_products = wc_get_products(array('featured' => true, 'limit' => 5));

                        if ($featured_products) :
                            
                            foreach ($featured_products as $product) :    
                                $image_id = $product->get_image_id();
                                $image_url = wp_get_attachment_url($image_id);
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        ?>
                        <div class="splide__slide col-md">
                            <div class="card col-md position-relative mx-2 h-100">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                                    class="card-img-top h-100">
                                <div class="card-body">

                                    <h3 class=" h6 text-secondary card-title" style="word-break:break-word">
                                        <?php echo esc_html($product->get_name()); ?>
                                    </h3>

                                    <p><?php echo $product->get_price_html(); ?></p>
                                    <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                                        class="btn btn-primary d-block">Voir</a>
                                </div>
                                <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                                    class="position-absolute w-100 h-100">
                                </a>
                            </div>
                        </div>

                        <?php
        endforeach;
    else :
        // Aucun produit en vedette disponible
        echo '<p>Aucun produit en vedette trouvé.</p>';
    endif;
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <span class="h5 text-uppercase text-secondary">Accessoires</span>
                <h2>Nous avons tout ce qu'il vous faut</h2>
            </div>
        </div>
        <div class=" mt-5 featured-products ">
            <div id="splideProduct2" class="splide">
                <div class="splide__track">
                    <div class="splide__list d-flex h-100">
                        <?php
                            $args = array(
                                'limit' => 5, 
                                'status' => 248,
                                'category' => array("accessoires"),
                                 'order'  => 'meta_value_num',
                                'order' => 'desc'
                            );
                        $best_accessories = wc_get_products($args);

                        if ($best_accessories) :
                            
                            foreach ($best_accessories as $product) : 
                                $image_id = $product->get_image_id();
                                $image_url = wp_get_attachment_url($image_id);
                                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        ?>
                        <div class="splide__slide col-md">
                            <div class="card col-md border-none position-relative mx-2 h-100">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                                    class="card-img-top h-100">
                                <div class="card-body   ">

                                    <h3 class=" h6 text-secondary card-title" style="word-break:break-word">
                                        <?php echo esc_html($product->get_name()); ?>
                                    </h3>
                                    <p class="fw-bold"><?php echo $product->get_price_html(); ?></p>
                                    <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                                        class="btn btn-primary d-block">Voir</a>
                                </div>
                                <a href="<?php echo esc_url(get_permalink($product->get_id())); ?>"
                                    class="position-absolute w-100 h-100">
                                </a>

                            </div>
                        </div>
                        <?php
                        
        endforeach; 

    else :
        // Aucun produit en vedette disponible
        echo '<p>Aucun produit en vedette trouvé.</p>';
    endif;
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3">
                <span class="h5 text-uppercase text-green">Témoignages</span>
                <h2>Ils en parlent mieux que nous</h2>
                <p>
                    Des centaines de surfeurs se sont équipés des planches de surf, SUP et skimboards Prism
                    Surfboards ! Qu’attendez-vous ?
                </p>
                <p>
                    Besoin de conseils ? Notre équipe se tient à votre disposition pour vous aider à choisir la
                    meilleure planche adaptée à votre niveau et votre style de surf !
                </p>
                <a href="/contact/" class="btn btn-primary">Nous contacter</a>
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100 p-3">
                            <p class="h4 text-yellow">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <blockquote class="fw-bold">
                                “Expédition et livraison ultra rapide. Et contact super réactif pour des conseils.
                                Merci”
                            </blockquote>
                            <p class="fw-bold text-secondary">
                                Cyril B.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100 p-3">
                            <p class="h4 text-yellow">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <blockquote class="fw-bold">
                                “Ma commande a été parfaitement honorée le colis a été très bien conditionné et en plus
                                de ça j'ai reçu un surf d'excellente qualité”
                            </blockquote>
                            <p class="fw-bold text-secondary">
                                Thierry J.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <div class="card h-100 p-3">
                            <p class="h4 text-yellow">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <blockquote class="fw-bold">
                                "Cela fait plusieurs fois que je commande des planches ou SUP chez Prism Surfboards et à
                                chaque fois la qualité et la rapidité d'expédition sont remarquables."
                                Merci”
                            </blockquote>
                            <p class="fw-bold text-secondary">
                                Alain D.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100 p-3">
                            <p class="h4 text-yellow">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </p>
                            <blockquote class="fw-bold">
                                "Surf acheté pour mon fils, j'ai eu de très bons conseils par téléphone, et c'est un
                                cadeau réussi !"
                            </blockquote>
                            <p class="fw-bold text-secondary">
                                Nicolas P.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-5 pb-7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <span class="h5 text-uppercase text-secondary">Tous les produits</span>
                <h2>Que souhaitez-vous voir ? </h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="https://www.prism-surfboards.com/wp-content/uploads/2023/12/6_0-STARTER-SERIES-FCS-UNIVERSEL-scaled-e1711125100909-600x600.jpg"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h2 class="card-title text-center">
                            <a href="/surf/" class="text-decoration-none"> Surf</a>
                        </h2>
                        <p>
                            Des planches de surf de qualité adaptées à tous les niveaux et toutes les conditions. Nos
                            planches sont légères, solides & polyvalentes
                        </p>
                    </div>
                    <a href="/surf/" class="position-absolute w-100 h-100"></a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-100 position-relative">
                    <img src="https://www.prism-surfboards.com/wp-content/uploads/2020/10/PRISM-Paddle-10.6x31x6-1280x1280.jpg.webp"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h2 class="card-title text-center">
                            <a href="/stand-up-paddle/" class="text-decoration-none">SUPs</a>
                        </h2>
                        <p>
                            Des Stand-Up Paddle gonflables et rigides pour des balades et sessions de qualité
                        </p>
                    </div>
                    <a href="/stand-up-paddle/" class="position-absolute w-100 h-100"></a>
                </div>

            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <img src="https://www.prism-surfboards.com/wp-content/uploads/2024/12/PRISM-fish-6.7-2024-V2-2000pix.jpg.webp"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h2 class="card-title text-center">
                            <a href="/ltd-edition/" class="text-decoration-none">Éditions limitées</a>
                        </h2>
                        <p>Des rétro fish en édition limitée à pré-commander de toute urgence.
                        </p>
                    </div>
                    <a href="https://www.prism-surfboards.com/ltd-edition/" class="position-absolute w-100 h-100"></a>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <img src="https://www.prism-surfboards.com/wp-content/uploads/2020/10/Skimboard-PRISM-40-2000pix-1280x1280.jpg.webp"
                        class="card-img-top">
                    <div class="card-body text-center">
                        <h2 class="card-title text-center">
                            <a href="/wing-foil/" class="text-decoration-none">Skimboards</a>
                        </h2>
                        <p>
                            Nos skimboards en epoxy sont adaptés à tout niveau du débutant au professionnel pour des
                            sessions flat ou surf.
                        </p>
                    </div>
                    <a href="/skimboards/" class="position-absolute w-100 h-100"></a>
                </div>
            </div>
        </div>
</section>
<section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2713.104298240138!2d-1.5135387839785392!3d47.155811679157296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805e85274dc88c3%3A0xda0201e947f128e7!2sL'Endruere%2C%2044840%20Les%20Sorini%C3%A8res!5e0!3m2!1sfr!2sfr!4v1664544936843!5m2!1sfr!2sfr"></iframe>
                </div>
                <div class="ratio ratio-16x9 d-none d-md-block">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!4v1674574328594!6m8!1m7!1sCAoSLEFGMVFpcFBLc25Uemt6YU4tQy04RWNhSVZFRUhpYTQwei1SV3FhbVJmdURa!2m2!1d47.154236512461!2d-1.5118569228747!3f329.3238571553959!4f-0.5459976601364218!5f0.7820865974627469"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <span class="h5 text-uppercase text-coral">Le showroom</span>
                <h2>Venez-nous voir !</h2>
                <p>Notre showroom près de Nantes vous accueille le lundi, le mercredi et le vendredi de 16h à 18h !
                </p>
                <p>Bénéficiez de conseils personnalisés et découvrez nos différentes gammes !</p>
                <ul class="fa-ul ml-0">
                    <li class="mb-4 ml-0">
                        <span class="fa-li text-coral">
                            <i class="fa-solid fa-map-marker"></i>
                        </span>
                        L’Endruère, Bat. C, 44840 les Sorinières
                    </li>
                    <li class="mb-4 ml-0">
                        <span class="fa-li text-coral">
                            <i class="fa-solid fa-phone"></i>
                        </span>
                        <a href="tel:+33 6 13 69 11 87">+33 6 13 69 11 87</a>
                    </li>
                    <li class="mb-4 ml-0">
                        <span class="fa-li text-coral">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        Ouvert le lundi, mercredi et vendredi
                        de 16h à 18h
                    </li>
                </ul>
                <a href="/contact/" class="btn btn-primary">Nous contacter</a>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <span class="h5 text-uppercase text-grey">Blog</span>
                <h2>Dernières actus</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="card-group">
                <?php
            $args_post = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $query_posts = new WP_Query($args_post);

            if($query_posts->have_posts()) :
            while($query_posts->have_posts()) : $query_posts->the_post();
        ?>
                <div class="card prsm_blog border-0z">
                    <?php 
                    if (has_post_thumbnail()) {
                        echo '<div class="post-thumbnail card-img-top">' . get_the_post_thumbnail(get_the_ID(), ) . '</div>';} 
                    ?>

                    <div class="card-body">
                        <h3 class="card-title ">
                            <?php the_title() ?>
                        </h3>
                        <div class="card-text">
                            <?php  the_excerpt() ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="<?php echo esc_url( get_permalink( get_the_ID() ) ) ?>" class="btn btn-primary">
                            Lire la suite
                        </a>
                    </div>
                </div>
                <?php 
                    endwhile;

                    wp_reset_postdata();

                    else:
                        echo 'Aucun article trouvé';

                    endif;

                ?>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Splide('#prsm_carousel', {
        cover: true,
        heightRatio: 0.5,
        type: 'loop',
        breakpoints: {
            768: {
                heightRatio: 2
            }
        }

    }).mount();

    new Splide('#splideProduct1', {

        perPage: 1,
        mediaQuery: 'min',
        pagination: false,
        breakpoints: {
            768: {
                perPage: 1,
                destroy: true
            }
        }
    }).mount();
    new Splide('#splideProduct2', {

        perPage: 1,
        mediaQuery: 'min',
        pagination: false,
        breakpoints: {
            768: {
                perPage: 1,
                destroy: true
            }
        }
    }).mount();

});
</script>
<?php
    get_footer()
?>