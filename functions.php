<?php

// DE-ENQUEUE PARENT THEME BOOTSTRAP JS BUNDLE
add_action( 'wp_print_scripts', function(){
    wp_dequeue_script( 'bootstrap5' );
     wp_dequeue_script( 'dark-mode-switch' );  //optionally
}, 100 );

// ENQUEUE THE BOOTSTRAP JS BUNDLE (AND EVENTUALLY MORE LIBS) FROM THE CHILD THEME DIRECTORY
add_action( 'wp_enqueue_scripts', function() {
    //enqueue js in footer, defer
    wp_enqueue_script( 'bootstrap5-childtheme', get_stylesheet_directory_uri() . "/js/bootstrap.bundle.min.js", array(), null, array('strategy' => 'defer', 'in_footer' => true)  );
    
    //optional: lottie (maybe...)
    //wp_enqueue_script( 'lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array(), null, array('strategy' => 'defer', 'in_footer' => true)  );

    //optional: rellax 
    //wp_enqueue_script( 'rellax', 'https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js', array(), null, array('strategy' => 'defer', 'in_footer' => true)  );

}, 101);


    
// ENQUEUE YOUR CUSTOM JS FILES, IF NEEDED 
add_action( 'wp_enqueue_scripts', function() {	   
    
    //UNCOMMENT next row to include the js/custom.js file globally
    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(/* 'jquery' */), null, array('strategy' => 'defer', 'in_footer' => true) ); 
    wp_enqueue_script('ajax-cart', get_stylesheet_directory_uri() . '/js/ajax-cart.js', array(/* 'jquery' */), null, array('strategy' => 'defer', 'in_footer' => true) ); 
    
    //UNCOMMENT next 3 rows to load the js file only on one page
    //if (is_page('mypageslug')) {
    //    wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array(/* 'jquery' */), null, array('strategy' => 'defer', 'in_footer' => true) ); 
    //}  

}, 102);

// OPTIONAL: ADD MORE NAV MENUS
//register_nav_menus( array( 'third' => __( 'Third Menu', 'picostrap' ), 'fourth' => __( 'Fourth Menu', 'picostrap' ), 'fifth' => __( 'Fifth Menu', 'picostrap' ), ) );
// THEN USE SHORTCODE:  [lc_nav_menu theme_location="third" container_class="" container_id="" menu_class="navbar-nav"]


add_action( 'admin_notices', function  () {
    if( (pico_get_parent_theme_version())>=3.0) return; 
	$message = __( 'This Child Theme requires at least Picostrap Version 3.0.0  in order to work properly. Please update the parent theme.', 'picostrap' );
	printf( '<div class="%1$s"><h1>%2$s</h1></div>', esc_attr( 'notice notice-error' ), esc_html( $message ) );
} );

add_filter( 'wp_is_application_passwords_available', '__return_false' );

function enqueue_material_icons() {
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined', array(), '1.0');
    wp_enqueue_style('fontawesome-brands', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '1.0');
}

add_action('wp_enqueue_scripts', 'enqueue_material_icons');

function enqueue_splide_script() {
    
        wp_enqueue_script('splide-script', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '1.0', true);
        wp_enqueue_style('splide-style', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), '1.0');

}

add_action('wp_enqueue_scripts', 'enqueue_splide_script');

add_filter('woocommerce_product_tabs', 'custom_product_tabs');

function custom_product_tabs($tabs) {
    // Renommer l'onglet "Informations complémentaires"
    if (isset($tabs['additional_information'])) {
        $tabs['additional_information']['title'] = __('Côtes & caractéristiques', 'textdomain');
    }

    return $tabs;
}

// remove_action( 'woocommerce_cart_collaterals', 'woocommerce_output_all_notices', 999 );

add_action( 'pre_get_posts', 'custom_products_per_page' );

function custom_products_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( is_post_type_archive( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
        $query->set( 'posts_per_page', 48 );
    }
}

add_filter( 'woocommerce_sale_flash', 'custom_sale_flash', 10, 3 );
function custom_sale_flash( $html, $post, $product ) {
    if( $product->is_on_sale() ) {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();

        // Vérifier si les prix sont numériques
        if ( is_numeric($regular_price) && is_numeric($sale_price) && $regular_price != 0 ) {
            $percentage = round( ( ($regular_price - $sale_price) / $regular_price ) * 100 );
            $html = '<span class="onsale">Bon plan -' . $percentage .'% </span>';
        } else {
            // Si les prix ne sont pas numériques ou si le prix régulier est 0, afficher un message par défaut
            $html = '<span class="onsale">Bon plan </span>';
        }
    }
    return $html;
}


add_action('wp_enqueue_scripts', 'add_custom_ajax_script');

function add_custom_ajax_script() {
    wp_enqueue_script('custom-ajax-script', get_stylesheet_directory_uri() . '/js/ajax-cart.js', array('jquery'), '2.5', true);
    wp_localize_script('custom-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_ajax_add_to_cart_ajax', 'add_to_cart_ajax');
add_action('wp_ajax_nopriv_add_to_cart_ajax', 'add_to_cart_ajax');

function custom_add_to_cart() {
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
  
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity)) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        WC_AJAX::get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        wp_send_json($data);
    }
    die();
}
add_action('wp_ajax_add_to_cart', 'custom_add_to_cart');
add_action('wp_ajax_nopriv_add_to_cart', 'custom_add_to_cart');

// Fonction pour récupérer le nombre de produits dans le panier
function get_cart_contents_count_ajax() {
    if (class_exists('WooCommerce')) {
        $nombre_produits = WC()->cart->get_cart_contents_count();
        wp_send_json_success($nombre_produits);
    } else {
        wp_send_json_error('WooCommerce n\'est pas activé.');
    }
}
add_action('wp_ajax_get_cart_contents_count', 'get_cart_contents_count_ajax');
add_action('wp_ajax_nopriv_get_cart_contents_count', 'get_cart_contents_count_ajax');

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

function display_new_badge() {
    global $product;

    // Vérifier si le champ ACF "new" est vrai (true) pour le produit
    $is_new = get_field('new', $product->get_id());

    // Si le champ ACF "new" est vrai (true) pour le produit
    if ($is_new) {
        echo '<span class="new-badge">Nouveau</span>';
    }
}

add_action('woocommerce_before_shop_loop_item_title', 'display_new_badge', 5);


/**
* @author Paul Lefizelier
**/

function action_woocommerce_applied_coupon( $coupon_code ) {
    // Settings
    $product_id = 9690;
    $quantity = 1;
    $free_price = 0;
    $coupon_codes = array( 'freeleash' );

    // Compare
    if ( in_array( $coupon_code, $coupon_codes ) ) {
        // Add product to cart
        WC()->cart->add_to_cart( $product_id, $quantity, 0, array(), array( 'free_price' => $free_price ) );
    }
}
add_action( 'woocommerce_applied_coupon', 'action_woocommerce_applied_coupon', 10, 1 );

// Set free price from custom cart item data
function action_woocommerce_before_calculate_totals( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 ) return;

    // Loop through cart contents
    foreach ( $cart->get_cart_contents() as $cart_item ) {
        if ( isset( $cart_item['free_price'] ) ) {
            $cart_item['data']->set_price( $cart_item['free_price'] );
        }
    }
}
add_action( 'woocommerce_before_calculate_totals', 'action_woocommerce_before_calculate_totals', 10, 1 );

function action_woocommerce_removed_coupon( $coupon_code ) {
    // Settings
    $product_id = 9690;
    $coupon_codes = array( 'freeleash' );

    // Compare
    if ( in_array( $coupon_code, $coupon_codes ) ) {
        // Loop through cart contents
        foreach ( WC()->cart->get_cart_contents() as $cart_item_key => $cart_item ) {
            // When product in cart
            if ( $cart_item['product_id'] == $product_id ) {
                // Remove cart item
                WC()->cart->remove_cart_item( $cart_item_key );
                break;
            }
        }
    }
}
add_action( 'woocommerce_removed_coupon', 'action_woocommerce_removed_coupon', 10, 1 );

// End free product with promo code

add_filter( 'weglot_get_regex_checkers', 'custom_weglot_add_regex_checkers' );

function custom_weglot_add_regex_checkers( $regex_checkers ) {
   // JSON
   $regex_checkers[] = new \Weglot\Parser\Check\Regex\RegexChecker( '#"messages":(.*]}}),#', 'JSON', 1, array() );

   return $regex_checkers;
}

function custom_change_out_of_stock_button_text( $text, $product ) {
    if ( ! $product->is_in_stock() ) {
        $text = __( 'Rupture de stock', 'woocommerce' ); // Texte à afficher pour les produits en rupture de stock
    }
    return $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_change_out_of_stock_button_text', 10, 2 );





// register a custom post status 'awaiting-delivery' for Orders
add_action( 'init', 'register_custom_post_status', 20 );
function register_custom_post_status() {
    register_post_status( 'wc-awaiting-delivery', array(
        'label'                     => _x( 'Prête à être retirée', 'Order status', 'woocommerce' ),
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Prête à être retirée <span class="count">(%s)</span>', 'Prête à être retirée <span class="count">(%s)</span>', 'woocommerce' )
    ) );
}

// Adding custom status 'awaiting-delivery' to order edit pages dropdown
add_filter( 'wc_order_statuses', 'custom_wc_order_statuses' );
function custom_wc_order_statuses( $order_statuses ) {
    $order_statuses['wc-awaiting-delivery'] = _x( 'Prête à être retirée', 'Order status', 'woocommerce' );
    return $order_statuses;
}

// Adding custom status 'awaiting-delivery' to admin order list bulk dropdown
add_filter( 'bulk_actions-edit-shop_order', 'custom_dropdown_bulk_actions_shop_order', 20, 1 );
function custom_dropdown_bulk_actions_shop_order( $actions ) {
    $actions['mark_awaiting-delivery'] = __( 'Prête à être retirée', 'woocommerce' );
    return $actions;
}

// Adding action for 'awaiting-delivery'
add_filter( 'woocommerce_email_actions', 'custom_email_actions', 20, 1 );
function custom_email_actions( $actions ) {
    $actions[] = 'woocommerce_order_status_wc-awaiting-delivery';
    return $actions;
}

add_action( 'woocommerce_order_status_wc-awaiting-delivery', array( WC(), 'send_transactional_email' ), 10, 1 );

// Sending an email notification when order get 'awaiting-delivery' status
add_action('woocommerce_order_status_awaiting-delivery', 'awaiting_delivery_order_status_email_notification', 20, 2);
function awaiting_delivery_order_status_email_notification( $order_id, $order ) {
    // HERE below your settings
    $heading   = __('Votre commande est prête à être retirée','woocommerce');
    $subject   = '[{site_title}] Votre commande N°{order_number} est prête à être retirée au dépôt';

        // The email notification type
        $email_key   = 'WC_Email_Customer_Processing_Order';

        // Get specific WC_emails object
        $email_obj = WC()->mailer()->get_emails()[$email_key];

        // Sending the customized email
        $email_obj->trigger( $order_id );
}

// Customize email heading for this custom status email notification
add_filter( 'woocommerce_email_heading_customer_processing_order', 'email_heading_customer_awaiting_delivery_order', 10, 2 );
function email_heading_customer_awaiting_delivery_order( $heading, $order ){
    if( $order->has_status( 'awaiting-delivery' ) ) {
        $email_key   = 'WC_Email_Customer_Processing_Order'; // The email notification type
        $email_obj   = WC()->mailer()->get_emails()[$email_key]; // Get specific WC_emails object
        $heading_txt = __('Votre commande est prête à être retirée','woocommerce'); // New heading text

        return $email_obj->format_string( $heading_txt );
    }
    return $heading;
}



// Customize email subject for this custom status email notification
add_filter( 'woocommerce_email_subject_customer_processing_order', 'email_subject_customer_awaiting_delivery_order', 10, 2 );
function email_subject_customer_awaiting_delivery_order( $subject, $order ){
    if( $order->has_status( 'awaiting-delivery' ) ) {
        $email_key   = 'WC_Email_Customer_Processing_Order'; // The email notification type
        $email_obj   = WC()->mailer()->get_emails()[$email_key]; // Get specific WC_emails object
        $subject_txt = sprintf( __('Votre commande est prête à être retirée', 'woocommerce'), '{site_title}', '{order_number}', '{order_date}' ); // New subject text

        return $email_obj->format_string( $subject_txt );
    }
    return $subject;
}