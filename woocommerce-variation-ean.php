<?php

/**
 * Lightweight replacement for the Product GTIN plugin variation EAN field.
 *
 * Existing values are kept because the same meta key is used:
 * _wpm_gtin_code
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bestelgrindenzand_get_product_ean( $product ) {
	if ( ! function_exists( 'wc_get_product' ) ) {
		return '';
	}

	if ( is_numeric( $product ) ) {
		$product = wc_get_product( $product );
	}

	if ( ! $product instanceof WC_Product ) {
		return '';
	}

	$ean = $product->get_meta( '_wpm_gtin_code', true );

	if ( '' === $ean && $product->get_parent_id() ) {
		return bestelgrindenzand_get_product_ean( $product->get_parent_id() );
	}

	return $ean;
}

if ( ! function_exists( 'wpm_get_code_gtin_by_product' ) ) {
	function wpm_get_code_gtin_by_product( $product ) {
		return bestelgrindenzand_get_product_ean( $product );
	}
}

function bestelgrindenzand_variation_ean_field( $loop, $variation_data, $variation ) {
	if ( class_exists( 'WPM_Product_GTIN_WC' ) ) {
		return;
	}

	$variation_product = wc_get_product( $variation->ID );

	if ( ! $variation_product ) {
		return;
	}

	woocommerce_wp_text_input(
		array(
			'id'            => "_wpm_gtin_code_variable{$loop}",
			'name'          => "_wpm_gtin_code_variable[{$loop}]",
			'value'         => $variation_product->get_meta( '_wpm_gtin_code', true, 'edit' ),
			'label'         => __( 'EAN code:', 'bestelgrindenzand' ),
			'desc_tip'      => true,
			'description'   => __( 'EAN code voor Google Merchant Center.', 'bestelgrindenzand' ),
			'wrapper_class' => 'form-row form-row-first',
		)
	);
}
add_action( 'woocommerce_variation_options_pricing', 'bestelgrindenzand_variation_ean_field', 10, 3 );

function bestelgrindenzand_save_variation_ean_field( $variation_id, $loop ) {
	if ( class_exists( 'WPM_Product_GTIN_WC' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $variation_id ) ) {
		return;
	}

	if ( ! isset( $_POST['_wpm_gtin_code_variable'][ $loop ] ) ) {
		return;
	}

	$variation = wc_get_product( $variation_id );

	if ( ! $variation ) {
		return;
	}

	$ean = sanitize_text_field( wp_unslash( $_POST['_wpm_gtin_code_variable'][ $loop ] ) );

	if ( '' === $ean ) {
		$variation->delete_meta_data( '_wpm_gtin_code' );
		$variation->delete_meta_data( '_global_unique_id' );
		if ( method_exists( $variation, 'set_global_unique_id' ) ) {
			$variation->set_global_unique_id( '' );
		}
	} else {
		$variation->update_meta_data( '_wpm_gtin_code', $ean );
		$variation->update_meta_data( '_global_unique_id', $ean );
		if ( method_exists( $variation, 'set_global_unique_id' ) ) {
			try {
				$variation->set_global_unique_id( $ean );
			} catch ( Exception $e ) {
				// Keep the legacy EAN value even if WooCommerce rejects the global unique ID.
			}
		}
	}

	$variation->save_meta_data();
}
add_action( 'woocommerce_save_product_variation', 'bestelgrindenzand_save_variation_ean_field', 10, 2 );

function bestelgrindenzand_add_variation_ean_to_available_variation( $args, $product, $variation ) {
	if ( class_exists( 'WPM_Product_GTIN_WC' ) ) {
		return $args;
	}

	$args['wpm_pgw_code'] = $variation->get_meta( '_wpm_gtin_code', true );

	return $args;
}
add_filter( 'woocommerce_available_variation', 'bestelgrindenzand_add_variation_ean_to_available_variation', 10, 3 );

function bestelgrindenzand_google_product_feed_ean_field( $fields ) {
	$fields['meta:_wpm_gtin_code'] = __( 'EAN code', 'bestelgrindenzand' );

	return $fields;
}
add_filter( 'woocommerce_gpf_custom_field_list', 'bestelgrindenzand_google_product_feed_ean_field' );

function bestelgrindenzand_product_feed_ean_data( $product_data, $feed, $product ) {
	$ean = bestelgrindenzand_get_product_ean( $product );

	if ( '' === $ean && method_exists( $product, 'get_global_unique_id' ) ) {
		$ean = $product->get_global_unique_id();
	}

	if ( '' === $ean ) {
		return $product_data;
	}

	$product_data['gtin'] = $ean;
	$product_data['global_unique_id'] = $ean;
	$product_data['_wpm_gtin_code'] = $ean;
	$product_data['custom_attributes__wpm_gtin_code'] = $ean;

	return $product_data;
}
add_filter( 'adt_get_product_data', 'bestelgrindenzand_product_feed_ean_data', 10, 3 );
