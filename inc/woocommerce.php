<?php
/**
 * Add WooCommerce support
 *
 * @package picostrap5
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'picostrap_woocommerce_support' );
if ( ! function_exists( 'picostrap_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function picostrap_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add Product Gallery support.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Add Bootstrap classes to form fields.
		add_filter( 'woocommerce_form_field_args', 'picostrap_wc_form_field_args', 10, 3 );
		add_filter( 'woocommerce_quantity_input_classes', 'picostrap_quantity_input_classes' );
	}
}

// First unhook the WooCommerce content wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Then hook in your own functions to display the wrappers your theme requires.
add_action( 'woocommerce_before_main_content', 'picostrap_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'picostrap_woocommerce_wrapper_end', 10 );

if ( ! function_exists( 'picostrap_woocommerce_wrapper_start' ) ) {
	/**
	 * Display the theme specific start of the page wrapper.
	 */
	function picostrap_woocommerce_wrapper_start() {
		//$container = get_theme_mod( 'picostrap_container_type' );
		echo '<div id="woocommerce-wrapper">';
		
		//get_template_part( 'global-templates/left-sidebar-check' );
		//echo '<div id="divmain">';
	}
}

if ( ! function_exists( 'picostrap_woocommerce_wrapper_end' ) ) {
	/**
	 * Display the theme specific end of the page wrapper.
	 */
	function picostrap_woocommerce_wrapper_end() {
		//echo '</div><!-- #divmain -->';
		//get_template_part( 'global-templates/right-sidebar-check' );
		
		echo '</div><!-- WooCommerce Wrapper end -->';
	}
	
}

if ( ! function_exists( 'picostrap_wc_form_field_args' ) ) {
	/**
	 * Filter hook function monkey patching form classes
	 * Author: Adriano Monecchi http://stackoverflow.com/a/36724593/307826
	 *
	 * @param string $args Form attributes.
	 * @param string $key Not in use.
	 * @param null   $value Not in use.
	 *
	 * @return mixed
	 */
	function picostrap_wc_form_field_args( $args, $key, $value = null ) {
		// Start field type switch case.
		switch ( $args['type'] ) {
			// Targets all select input type elements, except the country and state select input types.
			case 'select':
				/*
				 * Add a class to the field's html element wrapper - woocommerce
				 * input types (fields) are often wrapped within a <p></p> tag.
				 */
				$args['class'][] = 'form-group';
				// Add a class to the form input itself.
				
				//$args['input_class'] = array( 'form-control' );
				$args['input_class'][] = 'form-control'; 
				// Add custom data attributes to the form input itself.
				$args['custom_attributes'] = array(
					'data-plugin'      => 'select2',
					'data-allow-clear' => 'true',
					'aria-hidden'      => 'true',
				);
				break;

			/*
			 * By default WooCommerce will populate a select with the country names - $args
			 * defined for this specific input type targets only the country select element.
			 */
			case 'country':
				$args['class'][] = 'form-group single-country';
				break;

			/*
			 * By default WooCommerce will populate a select with state names - $args defined
			 * for this specific input type targets only the country select element.
			 */
			case 'state':
				$args['class'][] = 'form-group';
				$args['custom_attributes'] = array(
					'data-plugin'      => 'select2',
					'data-allow-clear' => 'true',
					'aria-hidden'      => 'true',
				);
				break;
			case 'password':
			case 'text':
			case 'email':
			case 'tel':
			case 'number':
				$args['class'][]     = 'form-group';
				//$args['input_class'] = array( 'form-control' );
				$args['input_class'][] = 'form-control'; 
				break;
			case 'textarea':
				//$args['input_class'] = array( 'form-control' );
				$args['input_class'][] = 'form-control';

				break;
			case 'checkbox':
				// Add a class to the form input's <label> tag.
				$args['label_class'] = array( 'custom-control custom-checkbox' );
				//$args['input_class'] = array( 'custom-control-input' );
				$args['input_class'][] = 'custom-control-input'; 
				break;
			case 'radio':
				$args['label_class'] = array( 'custom-control custom-radio' );
				//$args['input_class'] = array( 'custom-control-input' );
				$args['input_class'][] = 'custom-control-input';
				break;
			default:
				$args['class'][]     = 'form-group';
				//$args['input_class'] = array( 'form-control' );
				$args['input_class'][] = 'form-control'; 
				break;
		} // End of switch ( $args ).
		return $args;
	}
}

if ( ! is_admin() && ! function_exists( 'wc_review_ratings_enabled' ) ) {
	/**
	 * Check if reviews are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	function wc_reviews_enabled() {
		return 'yes' === get_option( 'woocommerce_enable_reviews' );
	}

	/**
	 * Check if reviews ratings are enabled.
	 *
	 * Function introduced in WooCommerce 3.6.0., include it for backward compatibility.
	 *
	 * @return bool
	 */
	function wc_review_ratings_enabled() {
		return wc_reviews_enabled() && 'yes' === get_option( 'woocommerce_enable_review_rating' );
	}
}

if ( ! function_exists( 'picostrap_quantity_input_classes' ) ) {
	/**
	 * Add Bootstrap class to quantity input field.
	 *
	 * @param array $classes Array of quantity input classes.
	 * @return array
	 */
	function picostrap_quantity_input_classes( $classes ) {
		$classes[] = 'form-control';
		return $classes;
	}
}