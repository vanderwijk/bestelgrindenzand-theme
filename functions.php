<?php

/**
 * Loads the child theme textdomain.
 */
function bestelgrindenzand_child_theme_setup() {
	load_child_theme_textdomain( 'bestelgrindenzand', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'bestelgrindenzand_child_theme_setup' );

require 'shortcode-calculator.php';

function bestelgrindenzand_tracking() { ?>

<!-- Global site tag (gtag.js) - Google Ads: 666638924 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-666638924"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-666638924');
</script>

<?php }
add_action( 'wp_head', 'bestelgrindenzand_tracking', 10 );

// Get most expensive variable and tag this for remarketing in Google Ads
function bestelgrindenzand_dynamic_remarketing() {
	if ( is_product() ) {
		global $product;

		$id = $product->get_id();

		if ( $product->is_type( 'variable' ) ) {

			$prices = $product->get_variation_prices();

			// get the most expensive variation
			$variation_id = array_key_last( $prices['price'] );
			$variation_price = end( $prices['price'] );

			echo "<script>
			gtag('event', 'page_view', {
			  'send_to': 'AW-666638924',
			  'value': " . $variation_price . ",
			  'items': [{
				'id': '" . $variation_id . "',
				'google_business_vertical': 'retail'
			  }]
			});
		  </script>";

		}
	}
}
add_action( 'wp_footer', 'bestelgrindenzand_dynamic_remarketing', 10 );


// Conversion tracking
function track_conversion( $order_id ) {

	if ( ! $order_id ) {
		return;
	}

	// Getting an instance of the order object
	$order = wc_get_order( $order_id );

	if ( $order->is_paid() ) {
		echo "<!-- Event snippet for Aankoop bestelgrindenzand.nl conversion page -->
		<script>
		  gtag('event', 'conversion', {
			  'send_to': 'AW-666638924/dbfGCMrB_PYBEMy08L0C',
			  'value': " . $order->get_total() . ",
			  'currency': 'EUR',
			  'transaction_id': '" . $order_id . "'
		  });
		</script>";

	}
}
add_action('woocommerce_thankyou', 'track_conversion', 10, 1);

// Add backend styles for Gutenberg.
function bestelgrindenzand_add_gutenberg_assets() {
	wp_enqueue_style( 'bestelgrindenzand-gutenberg', get_theme_file_uri( '/gutenberg-editor-style.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'bestelgrindenzand_add_gutenberg_assets' );

function bestelgrindenzand_storefront_header_content() {
	echo '<h2>Bestel Grind en Zand</h2>';
}
//add_action( 'storefront_header', 'bestelgrindenzand_storefront_header_content', 40 );

function bestelgrindenzand_remove_actions() {
	remove_action( 'storefront_header', 'storefront_product_search', 40 );
}
//add_action( 'init', 'bestelgrindenzand_remove_actions' );

if ( ! function_exists( 'storefront_credit' ) ) {
	function storefront_credit() {
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
			<?php if ( apply_filters( 'storefront_credit_link', true ) ) { ?>
			<br />
			<?php
				if ( apply_filters( 'storefront_privacy_policy_link', true ) && function_exists( 'the_privacy_policy_link' ) ) {
					the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span><a href="https://thewebworks.nl/">The Web Works</a>' );
				}
			?>
			<?php } ?>
		</div>
		<?php
	}
}

function bestelgrindenzand_checkout_bezorgdatum( $checkout ) {
	echo '<div id="bezorgdatum"><h2>' . __('Gewenste bezorgdatum') . '</h2>';
	echo '<p>Het is niet mogelijk minder dan 24 uur vooruit te bestellen, wilt u uw bestelling eerder ontvangen, neem dan telefonisch contact met ons op voor de mogelijkheden.</p>';

	woocommerce_form_field( 'bezorgdatum', array(
		'type'          => 'date',
		'class'         => array('bezorgdatum form-row-wide'),
		'label'         => __('Kies uw gewenste bezorgdatum'),
		'placeholder'   => __('Datum'),
		'required'      => true,
		), $checkout->get_value( 'bezorgdatum' ));

		woocommerce_form_field( 'bezorgtijd', array(
		'type'          => 'time',
		'class'         => array('bezorgtijd form-row-wide'),
		'label'         => __('Kies uw gewenste bezorgtijd'),
		'placeholder'   => __('Tijd'),
		), $checkout->get_value( 'bezorgtijd' ));

	echo '</div>';
}
//add_action( 'woocommerce_before_order_notes', 'bestelgrindenzand_checkout_bezorgdatum' );

function bestelgrindenzand_order_meta_keys( $keys ) {
	$keys[] = 'bezorgdatum';
	$keys[] = 'bezorgtijd';
	return $keys;
}
//add_filter('woocommerce_email_order_meta_keys', 'bestelgrindenzand_order_meta_keys');

function bestelgrindenzand_remove_menu_items(){
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'bestelgrindenzand_remove_menu_items', 999 );

function bestelgrindenzand_variation_price_format( $price, $product ) {
	// Main prices
	$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
	$price = $prices[0] !== $prices[1] ? sprintf( __( '<span class="woofrom">Vanaf: </span>%1$s', 'show-only-lowest-prices-in-woocommerce-variable-products' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	// Sale price
	$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
	sort( $prices );
	$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '<span class="woofrom">Vanaf: </span>%1$s', 'show-only-lowest-prices-in-woocommerce-variable-products' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
	if ( $price !== $saleprice ) {
		$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
	}
	return $price;
}
add_filter( 'woocommerce_variable_sale_price_html', 'bestelgrindenzand_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'bestelgrindenzand_variation_price_format', 10, 2 );

function rekenhulp_tab( $tabs ) {
	$terms = wp_get_post_terms( get_the_ID(), 'product_tag' );
	if ( $terms ) {
		$tabs['rekenhulp'] = array(
			'title'     => __( 'Rekenhulp', 'bestelgrindenzand' ),
			'priority'  => 50,
			'callback'  => 'rekenhulp_tab_callback'
		);
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'rekenhulp_tab' );

function rekenhulp_tab_callback() {
	echo '<h2>Rekenhulp</h2>';
	echo '<p>Met behulp van onderstaande rekenhulp kunt u eenvoudig berekenen hoeveel ';
	echo strtolower(get_the_title(get_the_ID()));
	echo ' u nodig heeft voor uw toepassing.</p>';

	//$shortcodes = get_post_meta( get_the_ID(), 'rekenhulp', false );
	$shortcodes = wp_get_post_terms( get_the_ID(), 'product_tag' );
	foreach ( $shortcodes as $shortcode ) {
		echo do_shortcode( '[' . $shortcode->slug . ']' );
	}
}

// Fix search console errors
function filter_woocommerce_structured_data_product( $markup, $product ) {
	$markup['brand'] = get_bloginfo( 'name' );
	$markup['itemCondition'] = 'new';
	$markup['mpn'] = $markup['sku'];
	return $markup;
};
add_filter( 'woocommerce_structured_data_product', 'filter_woocommerce_structured_data_product', 10, 2 );
