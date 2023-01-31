<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
do_action( 'woocommerce_review_order_before_cart_contents' );
?>
<div class="ordering_details_products_wrapper">
                                 <div class="ordering_details_products_titles_wrapper">
                                     <p class="ordering_details_products_title">Наименование</p>
                                     <div class="ordering_details_products_titles_second_wrapper">
                                         <p class="ordering_details_products_title">Количество</p>
                                         <p class="ordering_details_products_title">Цена</p>
                                     </div>
                                     
                                 </div>
<div class="ordering_details_products_items_wrapper">

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				//$_product =  wc_get_product( $cart_item['data']->get_id() );
			//  echo "<pre>";
			// print_r($product_id);
			
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
				$product_permalink   = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				global $woocommerce;
				$total_product_price = $woocommerce->cart->get_cart_total();
				$price = explode('₽', $total_product_price); 
				

	?>
				<input type="hidden" name="product_id[]" value="<? echo $product_id; ?>">

				<div class="ordering_details_products_item">
					<div class="ordering_details_products_img_link_wrapper">
						<div class="ordering_details_products_img">
						<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							?>
							<?php

								if ( ! $product_permalink ) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
							?> 
						</div>
						<?php
							if ( ! $product_permalink ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
							} else {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="ordering_details_products_link" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
							}

							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
							}
						?>
						
					</div>
					<div class="ordering_details_products_quantity_price_wrapper">
						<p class="ordering_details_products_quantity"><? echo  $cart_item['quantity'];?> шт</p>
						<p class="ordering_details_products_quantity_price">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); 
							?>  
						</p>
					</div>
				</div>
						

		<? endif;   endforeach;?>
	</div>
</div>
<?
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
							<div class="ordering_details_final_sum_wrapper">
                                  <div class="ordering_details_final_sum_item">
                                      <p class="ordering_details_final_sum_item_title">Итого:</p>
                                      <p class="ordering_details_final_sum_item_price"><?php wc_cart_totals_order_total_html(); ?> руб</p>
                                  </div>
                                  <div class="ordering_details_final_sum_item second_sum_item">
                                      <p class="ordering_details_final_sum_item_title">Доставка:</p>
                                      <p class="ordering_details_final_sum_item_price">400.00 руб</p>
                                  </div>
                                  <div class="ordering_details_final_sum_item">
                                      <p class="ordering_details_final_sum_item_title">К оплате:</p>
                                      <p class="ordering_details_final_sum_item_price">1 990 руб</p>
                                  </div>
								  <div class="ordering_details_final_sum_item">
								  <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                                      <!-- <p class="ordering_details_final_sum_item_title">Промокод:</p> -->
                                      <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
									  <p class="ordering_details_final_sum_item_title"><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
									  <p class="ordering_details_final_sum_item_price"><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
									  <?php endforeach; ?>
                                  </div>
                                  
                                  <button class="ordering_details_final_sum_btn"><span>ПЕРЕЙТИ К ОФОРМЛЕНИЮ</span></button>
                             </div>


					

	
