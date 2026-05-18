<?php

class WC_Product {
	public function get_id(): int {
		return 0;
	}

	public function get_name(): string {
		return '';
	}

	public function is_type( $type ): bool {
		return false;
	}

	public function get_variation_prices(): array {
		return array();
	}

	public function get_variation_price( $min_or_max = '', $for_display = false ) {
		return 0;
	}

	public function get_variation_regular_price( $min_or_max = '', $for_display = false ) {
		return 0;
	}

	public function get_meta( $key = '', $single = true, $context = 'view' ): string {
		return '';
	}

	public function get_parent_id(): int {
		return 0;
	}

	public function delete_meta_data( $key ): void {}

	public function update_meta_data( $key, $value ): void {}

	public function set_global_unique_id( $value ): void {}

	public function get_global_unique_id(): string {
		return '';
	}

	public function save_meta_data(): void {}
}

class WC_Order {
	public function is_paid(): bool {
		return false;
	}

	public function get_total(): string {
		return '';
	}

	public function get_billing_email(): string {
		return '';
	}

	public function get_shipping_country(): string {
		return '';
	}

	public function get_billing_country(): string {
		return '';
	}

	public function get_items(): array {
		return array();
	}
}

function woocommerce_form_field() {};
function woocommerce_wp_text_input() {};
function storefront_product_search() {};
function wc_get_product(): ?WC_Product {
	return null;
};
function wc_get_order(): ?WC_Order {
	return null;
};
function wc_price(): string {
	return '';
};
function is_product() {};