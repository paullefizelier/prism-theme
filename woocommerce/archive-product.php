<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );
$category_id = get_queried_object_id();
$category_color = get_field('category_color', 'category_' . $category_id);
$accroche = get_field('accroche', 'product_cat_' . $category_id);
$category_id = get_queried_object_id();
$thumbnail_url = wp_get_attachment_image_src( get_term_meta( $category_id, 'thumbnail_id', true ), 'full' );
$thumbnail_style = $thumbnail_url ? 'style="background-size: cover !important;background-position: center !important;background:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . esc_url( $thumbnail_url[0] ) . ');"' : '';

?>
<?php 

if ( !is_shop() ):
?>
<header class="woocommerce-products-header py-7 bg-<?php echo esc_attr($category_color) ?>"
    <?php echo $thumbnail_style; ?>>
    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-white">
                    <?php do_action( 'woocommerce_before_main_content' ); ?>
                </div>
                <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="woocommerce-products-header__title page-title text-white"><?php woocommerce_page_title(); ?>
                    <?php endif; ?>

                </h1>
                <div class="text-white accroche"><?php echo wp_kses_post($accroche) ?></div>
            </div>
        </div>

        <?php 
            if ( is_product_category('surf') ) {

        ?>
        <div class="row my-4 align-items-center">
            <div class="col-md"><a class="btn btn-green h-100 mb-2" href="/gammes-surf-prism/epoxy/">Gamme
                    Epoxy
                    -
                    Essentials</a></div>
            <div class="col-md"><a class="btn btn-coral h-100 mb-2" href="/gammes-surf-prism/epoxy-carbone/">Gamme
                    Carbone - Performance</a></div>

            <div class="col-md"><a class="btn btn-dark  h-100 mb-2" href="/gammes-surf-prism/wood-paulownia">Gamme
                    Paulownia - Originals</a></div>
            <div class="col-md"><a class="btn btn-secondary  h-100 mb-2" href="/gammes-surf-prism/softboards">Gamme
                    Softboards - Starter</a></div>

        </div>
        <?php 
            }
        ?>
    </div>
    </div>
</header>
<?php
    ; else: 
    ?>
<header class="woocommerce-products-header py-7 bg-primary">
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="text-white">
                    <?php do_action( 'woocommerce_before_main_content' ); ?>
                </div>
                <?php 
                         $shop_page_id = wc_get_page_id( 'shop' );

                         // Vérifier si la page boutique existe
                         if ( $shop_page_id ) {
                             // Récupérer le contenu de la page boutique
                             $shop_page_content = get_post_field( 'post_content', $shop_page_id );
                             // Afficher le contenu dans la div spécifique
                              echo apply_filters( 'the_content', $shop_page_content, 'text-white' ) ;
                         }
                    ?>
            </div>
        </div>
    </div>
    <?php 
        endif;
    ?>
</header>
<div class="container">
    <div class="row mt-5">

        <div class="<?php if (is_active_sidebar( 'wc-sidebar' )) echo "col-md-9 order-2"; else echo "col"; ?>">
            <?php
		if ( woocommerce_product_loop() ) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );

			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );
                    
					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}


		?>
        </div>
        <?php if (is_active_sidebar( 'wc-sidebar' )): ?>

        <div id="store-sidebar" class="col-md-3 order-1 pt-1 mb-4 navbar-expand-md">
            <button class="btn btn-primary navbar-toggler  bg-primary rounded text-white w-100 " type="button"
                data-bs-toggle="offcanvas" data-bs-target="#Prism_filters" aria-controls="navbarTogglerDemo01"
                aria-expanded="false" aria-label="Toggle navigation">
                <div class="d-flex align-items-center justify-content-center">

                    Filtres
                    <span class="material-symbols-outlined ps-3">tune</span>
                </div>
            </button>
            <div class="offcanvas offcanvas-end w-100" tabindex="-1" id="Prism_filters" aria-labelledby="Prism_filters">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="Prism_filters">Filtres</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php
			/**
			 * Hook: woocommerce_sidebar.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
			?>
                </div>
            </div>
        </div> <!-- close col -->
        <?php endif ?>
    </div>
</div>
<div class=" container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if ( !is_shop() ) {
                    if ( class_exists( 'WooCommerce' ) ) {
                        
                        $current_cat = get_queried_object();
                        $cat_id = $current_cat->term_id;    
                        $cat_description = term_description( $cat_id );    
                        if ( ! empty( $cat_description ) ) {
                            echo '<div class="category-description">' . $cat_description . '</div>';
                        }
                    }
                }
                ?>
        </div>
    </div>
</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );