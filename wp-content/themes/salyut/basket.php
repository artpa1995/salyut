<?php
/*
    Template name: basket
*/
// session_start();

get_header();
?>

<?php


global $woocommerce;

// if(is_cart()){
//     echo "yes";
// }else{
//     echo "no";
// }

defined( 'ABSPATH' ) || exit;

//do_action( 'woocommerce_before_cart' ); 
 
// foreach ( $woocommerce->cart->get_cart() as $cart_item ) {
//     $item_name = $cart_item['data']->get_title();
//     $quantity = $cart_item['quantity'];
//     $price = $cart_item['data']->get_price();
//     $id = $cart_item['data']->get_id();
// print_r($id);
// }



//  $prod_unique_id = $woocommerce->cart->generate_cart_id( 96 );
//     $woocommerce->cart->set_quantity($prod_unique_id, 10);
    
?>


   <!-- add_action( 'woocommerce_before_cart', 'my_coupons' );
function my_coupons() {
    global $woocommerce;
 
    $my_coupon_code = 'friday'; // your coupon code here
 
 if ( $woocommerce->cart->cart_contents_count >= 1 ) {
        $woocommerce->cart->add_discount( $my_coupon_code );
        //$woocommerce->show_messages();
    } 
 
}-->





           <main>
                 
                 <section class="basket">
                      <div class="basket_wrapper">
                          <div class="basket_links_wrapper">
                               <a href="" class="basket_link">Главная
                                  <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79322 2.36279L1.48057 0.0565417C1.4048 -0.0189756 1.28212 -0.0188486 1.20648 0.0569323C1.13089 0.132704 1.13109 0.255447 1.20687 0.331023L3.38186 2.50001L1.20679 4.66898C1.13102 4.74457 1.13083 4.86724 1.2064 4.94302C1.24432 4.98101 1.294 5 1.34368 5C1.39323 5 1.44271 4.98113 1.48056 4.94341L3.79322 2.63722C3.82971 2.60091 3.85019 2.55149 3.85019 2.50001C3.85019 2.44852 3.82965 2.39917 3.79322 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                               </a>
                               <a href="" class="basket_link">Корзина</a>
                          </div>
                          <h1 class="basket_item_title hide_title">В корзине <span class="cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?></span> товара</h1>
                          <h1 class="basket_item_title hidden_title">Корзина</h1>
                          <div class="basket_items_wrapper">
                               
                               <div class="basket_item" id="basket_item1">
                                   <div class="basket_item_info_titles_wrapper">
                                       <div class="basket_item_info_titles_first_wrapper">
                                            <p class="basket_item_info_title">Товар</p>
                                       </div>
                                       <div class="basket_item_info_titles_second_wrapper">
                                              <p class="basket_item_info_title">Количество</p>
                                             <p class="basket_item_info_title">Цена</p>
                                       </div>
                                    
                                   </div>

                                   <?php  do_action( 'woocommerce_before_cart' ); ?>

                                        <!-- <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post"> -->
                                            
                                                <?php do_action( 'woocommerce_before_cart_contents' ); ?>
                                                <?php
                                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                        $WC_Cart = new WC_Cart();
// echo "<pre>";
// print_r($WC_Cart );
                                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                         //$_product =  wc_get_product( $cart_item['data']->get_id() );
                                                        //  echo "<pre>";
                                                        //  print_r($_product);
                                                        
                                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                    ?>
                                                    <?php 
                                                    global $woocommerce;
                                                    // $cartId = WC()->cart->generate_cart_id( $_product);
                                                    // $cartItemKey = WC()->cart->find_product_in_cart( $cartId );
                                                    // $startingVal = WC()->cart->get_cart_contents()[$cartItemKey]["quantity"];


                                                    // echo "<pre>";
                                                    // print_r($cartId);

                                                    if ( empty( $product_id ) ) {
                                                        global $product;
                                                        $product_id = $product->id;
                                                      }
                                                  
                                                      $wc_cart = WC()->cart;
                                                  
                                                      $product_cart_id = $wc_cart->generate_cart_id( $product_id );
                                                      $in_cart = $wc_cart->find_product_in_cart( $product_cart_id );
                                                      $cart = $wc_cart->get_cart();
                                                    //   echo "<pre>";
                                                    //   print_r($cart);
                                                     //  echo  $in_cart;

                                                     

                                                    /* cuyc e talis te qani tesaki apranq ka*/
                                                    // global $woocommerce;
                                                    // print_r(count(WC()->cart->get_cart()));
                                                    ?>


                                                                        <div class="basket_item_box">
                                                                                <div class="basket_item_box_close">
                                                                                <?php
                                                                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                                                            '<a href="%s" class="remove icon-cart-delete" data-item='.$cart_item_key.' aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M5.55221 5.00078L9.88535 0.667622C10.0379 0.515064 10.0379 0.26772 9.88535 0.115182C9.73279 -0.0373571 9.48545 -0.0373766 9.33291 0.115182L4.99975 4.44834L0.666615 0.115182C0.514057 -0.0373766 0.266713 -0.0373766 0.114175 0.115182C-0.0383642 0.26774 -0.0383837 0.515083 0.114175 0.667622L4.44731 5.00076L0.114175 9.33392C-0.0383837 9.48647 -0.0383837 9.73382 0.114175 9.88636C0.190444 9.96263 0.290424 10.0008 0.390405 10.0008C0.490385 10.0008 0.590346 9.96263 0.666635 9.88636L4.99975 5.55322L9.33289 9.88636C9.40916 9.96263 9.50914 10.0008 9.60912 10.0008C9.7091 10.0008 9.80906 9.96263 9.88535 9.88636C10.0379 9.7338 10.0379 9.48645 9.88535 9.33392L5.55221 5.00078Z" fill="#001A34"></path></g><defs><clipPath id="clip0"><rect width="10" height="10" fill="white"></rect></clipPath></defs></svg></a>',
                                                                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                                            __( 'Remove this item', 'woocommerce' ),
                                                                                            esc_attr( $product_id ),
                                                                                            esc_attr( $_product->get_sku() )
                                                                                        ), $cart_item_key );
                                                                                    ?>
                                                                                    
                                                                                </div>
                                                                                <div class="basket_item_box_mian_wrapper">
                                                                                    <div class="basket_item_box_img_info_wrapper">
                                                                                <div class="basket_item_box_img">
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
                                                                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="basket_item_box_info" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                                                                        }

                                                                                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                                                                        // Meta data.
                                                                                        echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                                                                        // Backorder notification.
                                                                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                                                                        }
                                                                                    //     print_r($product_id);
                                                                                    //     // $WC_Cart = new WC_Cart();
                                                                                    //     // $WC_Cart->set_quantity( 102, 5, false );
                                                                                    //     $WC_Cart = new WC_Cart();
                                                                                    //  $r =  $WC_Cart->get_cart_item( $product_id  );

                                                                                     
                                                                                    ?>
                                                                                    </div>

                                                                                    <div class="basket_item_box_cart_number_btns_wrapper">
                                                                                        <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_minus_btn but_input_qty">
                                                                                        <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <line x1="1" y1="1" x2="23" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                                                        </svg>
                                                                                            
                                                                                        </button>
                                                                                        <input type="text" name="<? echo $product_id; ?>" value="<? echo  $cart_item['quantity'];?>" class="basket_item_box_cart_number input_qty">
                                                                                        <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_plus_btn but_input_qty">
                                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <line x1="1" y1="13" x2="23" y2="13" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                                                            <line x1="12" y1="23" x2="12" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                                                            </svg>
                                                                                            
                                                                                        </button>
                                                                                </div>
                                                                                    <p class="basket_item_box_prise">
                                                                                            <?php
                                                                                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); 
                                                                                            ?> 
                                                                                    </p>
                                                                                </div>
                                                                                
                                                                        </div>

                                                                    <?php

                                                                    
                                                                // if ( $_product->is_sold_individually() ) {
                                                                //     $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                                // } else {
                                                                //     $product_quantity = woocommerce_quantity_input( array(
                                                                //         'input_name'   => "cart[{$cart_item_key}][qty]",
                                                                //         'input_value'  => $cart_item['quantity'],
                                                                //         'max_value'    => $_product->get_max_purchase_quantity(),
                                                                //         'min_value'    => '0',
                                                                //         'product_name' => $_product->get_name(),
                                                                //     ), $_product, false );
                                                                // }
                                                                // echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                                                ?>
                                                                <?php
                                                                        // echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                                                    ?>
                                                                <?php do_action( 'woocommerce_cart_contents' ); ?>
                                                                        <!-- <input type="text" class="number" value="" readonly/> -->
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                            <?php do_action( 'woocommerce_cart_contents' ); ?>  
                                                    
                                                        <?php //do_action( 'woocommerce_cart_contents' ); ?>
                                                




                                        <!-- </form> -->








<!-- 
                                   <div class="basket_item_box">
                                          <div  class="basket_item_box_close">
                                              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M5.55221 5.00078L9.88535 0.667622C10.0379 0.515064 10.0379 0.26772 9.88535 0.115182C9.73279 -0.0373571 9.48545 -0.0373766 9.33291 0.115182L4.99975 4.44834L0.666615 0.115182C0.514057 -0.0373766 0.266713 -0.0373766 0.114175 0.115182C-0.0383642 0.26774 -0.0383837 0.515083 0.114175 0.667622L4.44731 5.00076L0.114175 9.33392C-0.0383837 9.48647 -0.0383837 9.73382 0.114175 9.88636C0.190444 9.96263 0.290424 10.0008 0.390405 10.0008C0.490385 10.0008 0.590346 9.96263 0.666635 9.88636L4.99975 5.55322L9.33289 9.88636C9.40916 9.96263 9.50914 10.0008 9.60912 10.0008C9.7091 10.0008 9.80906 9.96263 9.88535 9.88636C10.0379 9.7338 10.0379 9.48645 9.88535 9.33392L5.55221 5.00078Z" fill="#001A34"/></g><defs><clipPath id="clip0"><rect width="10" height="10" fill="white"/></clipPath></defs></svg>
                                          </div>
                                          <div class="basket_item_box_mian_wrapper">
                                              <div class="basket_item_box_img_info_wrapper">
                                           <div class="basket_item_box_img">
                                               <img src="<?php echo get_template_directory_uri(); ?>/images/box_img.png" alt="">
                                           </div>
                                           <a href="" class="basket_item_box_info">
                                               Фейерверк + фонтан GW218-89 Балет / BALET (0,8" х 11)

                                           </a>
                                       </div>
                                              <div class="basket_item_box_cart_number_btns_wrapper">
                                                <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_minus_btn">
                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                 </svg>
                                                     
                                                </button>
                                                <input type="text" name="name" value="1" class="basket_item_box_cart_number">
                                                <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_plus_btn">
                                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <line x1="1" y1="13" x2="23" y2="13" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                     <line x1="12" y1="23" x2="12" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                     </svg>
                                                     
                                                </button>
                                          </div>
                                              <p  class="basket_item_box_prise">22 330 ₽</p>
                                          </div>
                                          
                                   </div>
                                   
                                   <div class="basket_item_box">
                                          <div  class="basket_item_box_close">
                                              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M5.55221 5.00078L9.88535 0.667622C10.0379 0.515064 10.0379 0.26772 9.88535 0.115182C9.73279 -0.0373571 9.48545 -0.0373766 9.33291 0.115182L4.99975 4.44834L0.666615 0.115182C0.514057 -0.0373766 0.266713 -0.0373766 0.114175 0.115182C-0.0383642 0.26774 -0.0383837 0.515083 0.114175 0.667622L4.44731 5.00076L0.114175 9.33392C-0.0383837 9.48647 -0.0383837 9.73382 0.114175 9.88636C0.190444 9.96263 0.290424 10.0008 0.390405 10.0008C0.490385 10.0008 0.590346 9.96263 0.666635 9.88636L4.99975 5.55322L9.33289 9.88636C9.40916 9.96263 9.50914 10.0008 9.60912 10.0008C9.7091 10.0008 9.80906 9.96263 9.88535 9.88636C10.0379 9.7338 10.0379 9.48645 9.88535 9.33392L5.55221 5.00078Z" fill="#001A34"/></g><defs><clipPath id="clip0"><rect width="10" height="10" fill="white"/></clipPath></defs></svg>
                                          </div>
                                          <div class="basket_item_box_mian_wrapper">
                                              <div class="basket_item_box_img_info_wrapper">
                                           <div class="basket_item_box_img">
                                               <img src="<?php echo get_template_directory_uri(); ?>/images/box_img.png" alt="">
                                           </div>
                                           <a href="" class="basket_item_box_info">
                                               Фейерверк + фонтан GW218-89 Балет / BALET (0,8" х 11)

                                           </a>
                                       </div>
                                              <div class="basket_item_box_cart_number_btns_wrapper">
                                                <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_minus_btn">
                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                 </svg>
                                                     
                                                </button>
                                                <input type="text" name="name" value="1" class="basket_item_box_cart_number">
                                                <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_plus_btn">
                                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <line x1="1" y1="13" x2="23" y2="13" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                     <line x1="12" y1="23" x2="12" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                     </svg>
                                                     
                                                </button>
                                          </div>
                                              <p  class="basket_item_box_prise">22 330 ₽</p>
                                          </div>
                                          
                                   </div>
                                  <div class="basket_item_box">
                                          <div  class="basket_item_box_close">
                                              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M5.55221 5.00078L9.88535 0.667622C10.0379 0.515064 10.0379 0.26772 9.88535 0.115182C9.73279 -0.0373571 9.48545 -0.0373766 9.33291 0.115182L4.99975 4.44834L0.666615 0.115182C0.514057 -0.0373766 0.266713 -0.0373766 0.114175 0.115182C-0.0383642 0.26774 -0.0383837 0.515083 0.114175 0.667622L4.44731 5.00076L0.114175 9.33392C-0.0383837 9.48647 -0.0383837 9.73382 0.114175 9.88636C0.190444 9.96263 0.290424 10.0008 0.390405 10.0008C0.490385 10.0008 0.590346 9.96263 0.666635 9.88636L4.99975 5.55322L9.33289 9.88636C9.40916 9.96263 9.50914 10.0008 9.60912 10.0008C9.7091 10.0008 9.80906 9.96263 9.88535 9.88636C10.0379 9.7338 10.0379 9.48645 9.88535 9.33392L5.55221 5.00078Z" fill="#001A34"/></g><defs><clipPath id="clip0"><rect width="10" height="10" fill="white"/></clipPath></defs></svg>
                                          </div>
                                          <div class="basket_item_box_mian_wrapper">
                                              <div class="basket_item_box_img_info_wrapper">
                                           <div class="basket_item_box_img">
                                               <img src="<?php echo get_template_directory_uri(); ?>/images/box_img.png" alt="">
                                           </div>
                                           <a href="" class="basket_item_box_info">
                                               Фейерверк + фонтан GW218-89 Балет / BALET (0,8" х 11)

                                           </a>
                                       </div>
                                              <div class="basket_item_box_cart_number_btns_wrapper">
                                                <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_minus_btn">
                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                 </svg>
                                                     
                                                </button>
                                                <input type="text" name="name" value="1" class="basket_item_box_cart_number">
                                                <button class="basket_item_box_cart_number_add_btn basket_item_box_cart_plus_btn">
                                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <line x1="1" y1="13" x2="23" y2="13" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                     <line x1="12" y1="23" x2="12" y2="1" stroke="#001A34" stroke-width="2" stroke-linecap="round"></line>
                                                     </svg>
                                                     
                                                </button>
                                          </div>
                                              <p  class="basket_item_box_prise">22 330 ₽</p>
                                          </div>
                                          
                                   </div> -->
                               </div>
                               <div class="basket_item" id="basket_item2">
                                   <form class="basket_item_form" action="<? echo wc_get_checkout_url();?>">
                                       <div class="basket_item_form_info_svg_wrapper">
                                           <div class="basket_item_form_info_svg" id="hidden_item_form_info_svg2">
                                               <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.9062 11.7829H23.8916L24.4986 4.81351C24.4997 4.80089 24.4999 4.78845 24.5 4.77601C24.5 4.77495 24.5001 4.77395 24.5001 4.77289C24.5001 4.7727 24.5001 4.77258 24.5001 4.77239C24.5001 4.5827 24.3857 4.41551 24.2175 4.34282C24.216 4.3422 24.2147 4.34145 24.2132 4.34082C24.2028 4.33645 24.192 4.3327 24.1811 4.32907C24.177 4.32776 24.1732 4.32614 24.1691 4.32489C24.1602 4.3222 24.1511 4.32007 24.142 4.31789C24.1357 4.31639 24.1295 4.31457 24.1231 4.31332C24.1152 4.31176 24.1069 4.31076 24.0988 4.30957C24.0912 4.30845 24.0837 4.30714 24.076 4.30645C24.0747 4.30632 24.0735 4.30607 24.0722 4.30595C24.0639 4.3052 24.0558 4.30532 24.0476 4.30501C24.0421 4.30482 24.0367 4.3042 24.0312 4.3042H24.0253C24.0248 4.3042 24.0243 4.3042 24.0239 4.3042H14.4382C14.1794 4.3042 13.9694 4.5142 13.9694 4.77295C13.9694 5.03108 14.1794 5.2417 14.4382 5.2417H23.5203L22.5874 15.9527C22.5873 15.9535 22.5873 15.9543 22.5872 15.9551L22.3518 18.6577H6.06365L6.33609 15.8453H9.43741C9.69635 15.8453 9.90616 15.6354 9.90616 15.3766C9.90616 15.1177 9.69635 14.9078 9.43741 14.9078H6.42696L7.00222 8.97059H11.9382C12.1971 8.97059 12.4069 8.76072 12.4069 8.50184C12.4069 8.24297 12.1971 8.03309 11.9382 8.03309H7.09309L7.36359 5.2417H12.5632C12.8213 5.2417 13.0319 5.03108 13.0319 4.77295C13.0319 4.5142 12.8213 4.3042 12.5632 4.3042H6.93815C6.9379 4.3042 6.93772 4.30426 6.93746 4.30426C6.71728 4.3042 6.52628 4.4592 6.48009 4.67408C6.47978 4.67564 6.47921 4.67714 6.4789 4.6787C6.47653 4.69039 6.47496 4.70233 6.4734 4.71433C6.47296 4.71814 6.47215 4.72176 6.47178 4.72558C6.47171 4.72633 6.47153 4.72701 6.47146 4.72776L6.15121 8.03309H0.468752C0.209813 8.03309 0 8.24297 0 8.50184C0 8.76072 0.209813 8.97059 0.468752 8.97059H6.06034L5.48508 14.9078H3.81264C3.5537 14.9078 3.34389 15.1177 3.34389 15.3766C3.34389 15.6354 3.5537 15.8453 3.81264 15.8453H5.39427L5.08102 19.0779C5.08096 19.0784 5.08096 19.0789 5.08089 19.0793L4.59658 24.078C4.59652 24.0786 4.59646 24.0792 4.59639 24.0797L4.59621 24.0815C4.59558 24.088 4.59564 24.0944 4.59527 24.1009C4.59483 24.1095 4.59396 24.118 4.59396 24.1267C4.59396 24.1271 4.59402 24.1275 4.59402 24.1279C4.59402 24.14 4.59489 24.1518 4.59577 24.1637C4.59614 24.1675 4.59602 24.1714 4.59646 24.1752C4.59771 24.1873 4.59977 24.1992 4.60196 24.2111C4.60258 24.2146 4.60289 24.2182 4.60358 24.2216C4.60539 24.2306 4.60796 24.2393 4.61033 24.2481C4.61196 24.2543 4.61327 24.2606 4.61514 24.2667C4.61571 24.2683 4.61646 24.27 4.61696 24.2717C4.63964 24.3415 4.67814 24.4041 4.72839 24.4552C4.72933 24.4562 4.73008 24.4572 4.73102 24.4581C4.73602 24.4631 4.74146 24.4676 4.74671 24.4723C4.77902 24.502 4.81552 24.5271 4.85546 24.5468C4.86377 24.5509 4.87196 24.5552 4.88046 24.5588C4.88302 24.5599 4.88577 24.5607 4.88839 24.5617C4.90014 24.5663 4.91196 24.5708 4.92414 24.5747C4.92527 24.575 4.92633 24.5752 4.92746 24.5755C4.94133 24.5797 4.95533 24.5833 4.96964 24.5862C4.97152 24.5866 4.97346 24.5867 4.97527 24.5871C4.98889 24.5897 5.00258 24.5918 5.01652 24.5932C5.01683 24.5932 5.01708 24.5933 5.01739 24.5933C5.03277 24.5948 5.04802 24.5956 5.06315 24.5956C5.06333 24.5956 5.06358 24.5955 5.06383 24.5955H7.15059C7.38103 26.3426 8.87885 27.6957 10.6879 27.6957C12.4969 27.6957 13.9947 26.3426 14.2251 24.5955H21.7438C21.9743 26.3426 23.4721 27.6957 25.2811 27.6957C27.09 27.6957 28.588 26.3426 28.8185 24.5955H30.9057C30.9061 24.5955 30.9064 24.5956 30.9067 24.5956C30.9224 24.5956 30.9377 24.5947 30.953 24.5932C30.9557 24.5929 30.9584 24.5923 30.9611 24.592C30.9733 24.5906 30.9854 24.5889 30.9973 24.5865C31.0024 24.5855 31.0074 24.5842 31.0124 24.583C31.0216 24.5808 31.0309 24.5786 31.0399 24.5759C31.046 24.5741 31.0519 24.572 31.0579 24.5699C31.0656 24.5673 31.0733 24.5645 31.0809 24.5615C31.0874 24.5589 31.0936 24.5561 31.0999 24.5533C31.1067 24.5501 31.1136 24.5468 31.1203 24.5434C31.1267 24.5402 31.1328 24.5368 31.1389 24.5333C31.1454 24.5295 31.1517 24.5257 31.1581 24.5217C31.1639 24.5179 31.1698 24.5141 31.1754 24.5101C31.1818 24.5057 31.1879 24.501 31.1941 24.4962C31.1992 24.4922 31.2044 24.4882 31.2094 24.4839C31.2158 24.4785 31.2219 24.4728 31.228 24.467C31.2322 24.4629 31.2367 24.4589 31.2408 24.4547C31.2473 24.448 31.2535 24.441 31.2597 24.434C31.263 24.4302 31.2664 24.4265 31.2696 24.4226C31.2765 24.4141 31.2827 24.4053 31.289 24.3965C31.2911 24.3935 31.2935 24.3906 31.2956 24.3875C31.3032 24.376 31.3104 24.3643 31.317 24.3522C31.3175 24.3514 31.318 24.3507 31.3183 24.3499C31.3254 24.3369 31.3319 24.3236 31.3377 24.3098C31.3393 24.3059 31.3406 24.3018 31.3421 24.2979C31.3459 24.2882 31.3497 24.2785 31.3529 24.2685C31.3549 24.262 31.3564 24.2553 31.3582 24.2487C31.3603 24.2409 31.3625 24.2332 31.3642 24.2252C31.3658 24.2182 31.3668 24.2109 31.368 24.2037C31.3691 24.1974 31.3704 24.1912 31.3712 24.1848C31.3911 24.0255 31.7582 21.0806 31.9221 19.1763C31.9223 19.1745 31.9224 19.1726 31.9226 19.1708C31.9698 18.6219 32 18.1596 32 17.8766C32 14.5166 29.2664 11.7829 25.9062 11.7829ZM23.8099 12.7205H25.7276L25.4827 15.5327H23.565L23.8099 12.7205ZM10.688 26.7582C9.23697 26.7582 8.05647 25.5777 8.05647 24.1267C8.05647 22.6756 9.23704 21.4951 10.688 21.4951C12.139 21.4951 13.3196 22.6756 13.3196 24.1267C13.3196 25.5777 12.139 26.7582 10.688 26.7582ZM25.2811 26.7582C23.8301 26.7582 22.6497 25.5777 22.6497 24.1267C22.6497 22.6756 23.8302 21.4951 25.2811 21.4951C26.7322 21.4951 27.9127 22.6756 27.9127 24.1267C27.9127 25.5777 26.7322 26.7582 25.2811 26.7582ZM30.4916 23.6577H28.8186C28.5882 21.9105 27.0904 20.5573 25.2812 20.5573C23.4722 20.5573 21.9743 21.9106 21.744 23.6577H14.2253C13.9949 21.9105 12.4971 20.5573 10.688 20.5573C8.87897 20.5573 7.38103 21.9106 7.15065 23.6577H5.57915L5.97284 19.5949H22.7813V19.5952C22.7816 19.5952 22.7818 19.5952 22.782 19.5952C22.7977 19.5952 22.8133 19.5943 22.8287 19.5928C22.8315 19.5925 22.8343 19.5919 22.8372 19.5915C22.8495 19.5901 22.8617 19.5883 22.8737 19.5859C22.8788 19.5849 22.8839 19.5834 22.889 19.5822C22.8984 19.5799 22.9078 19.5778 22.9169 19.575C22.9232 19.5731 22.9291 19.5709 22.9352 19.5688C22.943 19.566 22.9509 19.5633 22.9585 19.5602C22.9651 19.5575 22.9714 19.5545 22.9778 19.5515C22.9847 19.5483 22.9917 19.5451 22.9983 19.5416C23.0047 19.5383 23.011 19.5346 23.0173 19.531C23.0237 19.5273 23.0301 19.5234 23.0363 19.5194C23.0424 19.5155 23.0482 19.5114 23.054 19.5073C23.0602 19.5029 23.0662 19.4984 23.0722 19.4937C23.0775 19.4894 23.0828 19.4849 23.0881 19.4804C23.094 19.4753 23.0998 19.47 23.1055 19.4646C23.1102 19.46 23.115 19.4553 23.1196 19.4505C23.1252 19.4446 23.1307 19.4386 23.136 19.4324C23.1402 19.4275 23.1443 19.4226 23.1483 19.4176C23.1535 19.4111 23.1585 19.4043 23.1633 19.3975C23.167 19.3924 23.1706 19.3873 23.1741 19.382C23.1787 19.3749 23.183 19.3677 23.1872 19.3603C23.1904 19.3548 23.1937 19.3493 23.1965 19.3437C23.2005 19.3363 23.2038 19.3288 23.2074 19.3213C23.2102 19.3152 23.213 19.3093 23.2155 19.303C23.2185 19.2956 23.2211 19.2881 23.2238 19.2805C23.2261 19.2738 23.2285 19.2671 23.2306 19.2603C23.2327 19.253 23.2343 19.2456 23.2362 19.2382C23.238 19.2308 23.24 19.2234 23.2415 19.2158C23.2429 19.2084 23.2438 19.2009 23.2449 19.1934C23.246 19.1857 23.2473 19.1781 23.2481 19.1702C23.2482 19.1691 23.2485 19.168 23.2485 19.1669L23.4835 16.47H25.9061C27.3423 16.47 27.99 17.2141 28.6757 18.002C29.2416 18.6521 29.8732 19.3774 30.947 19.5543C30.8106 20.9962 30.5902 22.8472 30.4916 23.6577ZM31.0271 18.6149C30.3306 18.4729 29.902 17.9833 29.3828 17.3868C28.7335 16.6408 27.9408 15.7305 26.4212 15.5609L26.6637 12.7766C29.149 13.1442 31.0625 15.2909 31.0625 17.8768C31.0625 18.0524 31.0494 18.3077 31.0271 18.6149Z" fill="#001A34"/><path d="M10.688 22.4078C9.7403 22.4078 8.96924 23.1788 8.96924 24.1266C8.96924 25.0743 9.7403 25.8454 10.688 25.8454C11.6357 25.8454 12.4068 25.0743 12.4068 24.1266C12.4068 23.1789 11.6357 22.4078 10.688 22.4078ZM10.688 24.9078C10.2572 24.9078 9.90674 24.5574 9.90674 24.1266C9.90674 23.6958 10.2572 23.3453 10.688 23.3453C11.1188 23.3453 11.4692 23.6958 11.4692 24.1266C11.4692 24.5574 11.1187 24.9078 10.688 24.9078Z" fill="#001A34"/><path d="M25.2811 22.4078C24.3334 22.4078 23.5624 23.1788 23.5624 24.1266C23.5624 25.0743 24.3334 25.8454 25.2811 25.8454C26.2288 25.8454 26.9999 25.0743 26.9999 24.1266C26.9999 23.1789 26.2288 22.4078 25.2811 22.4078ZM25.2811 24.9078C24.8503 24.9078 24.4999 24.5574 24.4999 24.1266C24.4999 23.6958 24.8503 23.3453 25.2811 23.3453C25.7119 23.3453 26.0624 23.6958 26.0624 24.1266C26.0624 24.5574 25.7119 24.9078 25.2811 24.9078Z" fill="#001A34"/><path d="M4.43751 11.783H2.14588C1.88694 11.783 1.67712 11.9929 1.67712 12.2517C1.67712 12.5106 1.88694 12.7205 2.14588 12.7205H4.43751C4.69645 12.7205 4.90626 12.5106 4.90626 12.2517C4.90626 11.9929 4.69645 11.783 4.43751 11.783Z" fill="#001A34"/></svg>
                                           </div>
                                           <p class="basket_item_form_info">Бесплатная доставка  по Москве  <span>Бесплатно</span> </p>
                                       </div>
                                       <div class="basket_item_form_info_svg_wrapper hidden_item_form_info_svg_wrapper">
                                           <div class="basket_item_form_info_svg" id="hidden_item_form_info_svg">
                                               <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25.9062 11.7829H23.8916L24.4986 4.81351C24.4997 4.80089 24.4999 4.78845 24.5 4.77601C24.5 4.77495 24.5001 4.77395 24.5001 4.77289C24.5001 4.7727 24.5001 4.77258 24.5001 4.77239C24.5001 4.5827 24.3857 4.41551 24.2175 4.34282C24.216 4.3422 24.2147 4.34145 24.2132 4.34082C24.2028 4.33645 24.192 4.3327 24.1811 4.32907C24.177 4.32776 24.1732 4.32614 24.1691 4.32489C24.1602 4.3222 24.1511 4.32007 24.142 4.31789C24.1357 4.31639 24.1295 4.31457 24.1231 4.31332C24.1152 4.31176 24.1069 4.31076 24.0988 4.30957C24.0912 4.30845 24.0837 4.30714 24.076 4.30645C24.0747 4.30632 24.0735 4.30607 24.0722 4.30595C24.0639 4.3052 24.0558 4.30532 24.0476 4.30501C24.0421 4.30482 24.0367 4.3042 24.0312 4.3042H24.0253C24.0248 4.3042 24.0243 4.3042 24.0239 4.3042H14.4382C14.1794 4.3042 13.9694 4.5142 13.9694 4.77295C13.9694 5.03108 14.1794 5.2417 14.4382 5.2417H23.5203L22.5874 15.9527C22.5873 15.9535 22.5873 15.9543 22.5872 15.9551L22.3518 18.6577H6.06365L6.33609 15.8453H9.43741C9.69635 15.8453 9.90616 15.6354 9.90616 15.3766C9.90616 15.1177 9.69635 14.9078 9.43741 14.9078H6.42696L7.00222 8.97059H11.9382C12.1971 8.97059 12.4069 8.76072 12.4069 8.50184C12.4069 8.24297 12.1971 8.03309 11.9382 8.03309H7.09309L7.36359 5.2417H12.5632C12.8213 5.2417 13.0319 5.03108 13.0319 4.77295C13.0319 4.5142 12.8213 4.3042 12.5632 4.3042H6.93815C6.9379 4.3042 6.93772 4.30426 6.93746 4.30426C6.71728 4.3042 6.52628 4.4592 6.48009 4.67408C6.47978 4.67564 6.47921 4.67714 6.4789 4.6787C6.47653 4.69039 6.47496 4.70233 6.4734 4.71433C6.47296 4.71814 6.47215 4.72176 6.47178 4.72558C6.47171 4.72633 6.47153 4.72701 6.47146 4.72776L6.15121 8.03309H0.468752C0.209813 8.03309 0 8.24297 0 8.50184C0 8.76072 0.209813 8.97059 0.468752 8.97059H6.06034L5.48508 14.9078H3.81264C3.5537 14.9078 3.34389 15.1177 3.34389 15.3766C3.34389 15.6354 3.5537 15.8453 3.81264 15.8453H5.39427L5.08102 19.0779C5.08096 19.0784 5.08096 19.0789 5.08089 19.0793L4.59658 24.078C4.59652 24.0786 4.59646 24.0792 4.59639 24.0797L4.59621 24.0815C4.59558 24.088 4.59564 24.0944 4.59527 24.1009C4.59483 24.1095 4.59396 24.118 4.59396 24.1267C4.59396 24.1271 4.59402 24.1275 4.59402 24.1279C4.59402 24.14 4.59489 24.1518 4.59577 24.1637C4.59614 24.1675 4.59602 24.1714 4.59646 24.1752C4.59771 24.1873 4.59977 24.1992 4.60196 24.2111C4.60258 24.2146 4.60289 24.2182 4.60358 24.2216C4.60539 24.2306 4.60796 24.2393 4.61033 24.2481C4.61196 24.2543 4.61327 24.2606 4.61514 24.2667C4.61571 24.2683 4.61646 24.27 4.61696 24.2717C4.63964 24.3415 4.67814 24.4041 4.72839 24.4552C4.72933 24.4562 4.73008 24.4572 4.73102 24.4581C4.73602 24.4631 4.74146 24.4676 4.74671 24.4723C4.77902 24.502 4.81552 24.5271 4.85546 24.5468C4.86377 24.5509 4.87196 24.5552 4.88046 24.5588C4.88302 24.5599 4.88577 24.5607 4.88839 24.5617C4.90014 24.5663 4.91196 24.5708 4.92414 24.5747C4.92527 24.575 4.92633 24.5752 4.92746 24.5755C4.94133 24.5797 4.95533 24.5833 4.96964 24.5862C4.97152 24.5866 4.97346 24.5867 4.97527 24.5871C4.98889 24.5897 5.00258 24.5918 5.01652 24.5932C5.01683 24.5932 5.01708 24.5933 5.01739 24.5933C5.03277 24.5948 5.04802 24.5956 5.06315 24.5956C5.06333 24.5956 5.06358 24.5955 5.06383 24.5955H7.15059C7.38103 26.3426 8.87885 27.6957 10.6879 27.6957C12.4969 27.6957 13.9947 26.3426 14.2251 24.5955H21.7438C21.9743 26.3426 23.4721 27.6957 25.2811 27.6957C27.09 27.6957 28.588 26.3426 28.8185 24.5955H30.9057C30.9061 24.5955 30.9064 24.5956 30.9067 24.5956C30.9224 24.5956 30.9377 24.5947 30.953 24.5932C30.9557 24.5929 30.9584 24.5923 30.9611 24.592C30.9733 24.5906 30.9854 24.5889 30.9973 24.5865C31.0024 24.5855 31.0074 24.5842 31.0124 24.583C31.0216 24.5808 31.0309 24.5786 31.0399 24.5759C31.046 24.5741 31.0519 24.572 31.0579 24.5699C31.0656 24.5673 31.0733 24.5645 31.0809 24.5615C31.0874 24.5589 31.0936 24.5561 31.0999 24.5533C31.1067 24.5501 31.1136 24.5468 31.1203 24.5434C31.1267 24.5402 31.1328 24.5368 31.1389 24.5333C31.1454 24.5295 31.1517 24.5257 31.1581 24.5217C31.1639 24.5179 31.1698 24.5141 31.1754 24.5101C31.1818 24.5057 31.1879 24.501 31.1941 24.4962C31.1992 24.4922 31.2044 24.4882 31.2094 24.4839C31.2158 24.4785 31.2219 24.4728 31.228 24.467C31.2322 24.4629 31.2367 24.4589 31.2408 24.4547C31.2473 24.448 31.2535 24.441 31.2597 24.434C31.263 24.4302 31.2664 24.4265 31.2696 24.4226C31.2765 24.4141 31.2827 24.4053 31.289 24.3965C31.2911 24.3935 31.2935 24.3906 31.2956 24.3875C31.3032 24.376 31.3104 24.3643 31.317 24.3522C31.3175 24.3514 31.318 24.3507 31.3183 24.3499C31.3254 24.3369 31.3319 24.3236 31.3377 24.3098C31.3393 24.3059 31.3406 24.3018 31.3421 24.2979C31.3459 24.2882 31.3497 24.2785 31.3529 24.2685C31.3549 24.262 31.3564 24.2553 31.3582 24.2487C31.3603 24.2409 31.3625 24.2332 31.3642 24.2252C31.3658 24.2182 31.3668 24.2109 31.368 24.2037C31.3691 24.1974 31.3704 24.1912 31.3712 24.1848C31.3911 24.0255 31.7582 21.0806 31.9221 19.1763C31.9223 19.1745 31.9224 19.1726 31.9226 19.1708C31.9698 18.6219 32 18.1596 32 17.8766C32 14.5166 29.2664 11.7829 25.9062 11.7829ZM23.8099 12.7205H25.7276L25.4827 15.5327H23.565L23.8099 12.7205ZM10.688 26.7582C9.23697 26.7582 8.05647 25.5777 8.05647 24.1267C8.05647 22.6756 9.23704 21.4951 10.688 21.4951C12.139 21.4951 13.3196 22.6756 13.3196 24.1267C13.3196 25.5777 12.139 26.7582 10.688 26.7582ZM25.2811 26.7582C23.8301 26.7582 22.6497 25.5777 22.6497 24.1267C22.6497 22.6756 23.8302 21.4951 25.2811 21.4951C26.7322 21.4951 27.9127 22.6756 27.9127 24.1267C27.9127 25.5777 26.7322 26.7582 25.2811 26.7582ZM30.4916 23.6577H28.8186C28.5882 21.9105 27.0904 20.5573 25.2812 20.5573C23.4722 20.5573 21.9743 21.9106 21.744 23.6577H14.2253C13.9949 21.9105 12.4971 20.5573 10.688 20.5573C8.87897 20.5573 7.38103 21.9106 7.15065 23.6577H5.57915L5.97284 19.5949H22.7813V19.5952C22.7816 19.5952 22.7818 19.5952 22.782 19.5952C22.7977 19.5952 22.8133 19.5943 22.8287 19.5928C22.8315 19.5925 22.8343 19.5919 22.8372 19.5915C22.8495 19.5901 22.8617 19.5883 22.8737 19.5859C22.8788 19.5849 22.8839 19.5834 22.889 19.5822C22.8984 19.5799 22.9078 19.5778 22.9169 19.575C22.9232 19.5731 22.9291 19.5709 22.9352 19.5688C22.943 19.566 22.9509 19.5633 22.9585 19.5602C22.9651 19.5575 22.9714 19.5545 22.9778 19.5515C22.9847 19.5483 22.9917 19.5451 22.9983 19.5416C23.0047 19.5383 23.011 19.5346 23.0173 19.531C23.0237 19.5273 23.0301 19.5234 23.0363 19.5194C23.0424 19.5155 23.0482 19.5114 23.054 19.5073C23.0602 19.5029 23.0662 19.4984 23.0722 19.4937C23.0775 19.4894 23.0828 19.4849 23.0881 19.4804C23.094 19.4753 23.0998 19.47 23.1055 19.4646C23.1102 19.46 23.115 19.4553 23.1196 19.4505C23.1252 19.4446 23.1307 19.4386 23.136 19.4324C23.1402 19.4275 23.1443 19.4226 23.1483 19.4176C23.1535 19.4111 23.1585 19.4043 23.1633 19.3975C23.167 19.3924 23.1706 19.3873 23.1741 19.382C23.1787 19.3749 23.183 19.3677 23.1872 19.3603C23.1904 19.3548 23.1937 19.3493 23.1965 19.3437C23.2005 19.3363 23.2038 19.3288 23.2074 19.3213C23.2102 19.3152 23.213 19.3093 23.2155 19.303C23.2185 19.2956 23.2211 19.2881 23.2238 19.2805C23.2261 19.2738 23.2285 19.2671 23.2306 19.2603C23.2327 19.253 23.2343 19.2456 23.2362 19.2382C23.238 19.2308 23.24 19.2234 23.2415 19.2158C23.2429 19.2084 23.2438 19.2009 23.2449 19.1934C23.246 19.1857 23.2473 19.1781 23.2481 19.1702C23.2482 19.1691 23.2485 19.168 23.2485 19.1669L23.4835 16.47H25.9061C27.3423 16.47 27.99 17.2141 28.6757 18.002C29.2416 18.6521 29.8732 19.3774 30.947 19.5543C30.8106 20.9962 30.5902 22.8472 30.4916 23.6577ZM31.0271 18.6149C30.3306 18.4729 29.902 17.9833 29.3828 17.3868C28.7335 16.6408 27.9408 15.7305 26.4212 15.5609L26.6637 12.7766C29.149 13.1442 31.0625 15.2909 31.0625 17.8768C31.0625 18.0524 31.0494 18.3077 31.0271 18.6149Z" fill="#001A34"/><path d="M10.688 22.4078C9.7403 22.4078 8.96924 23.1788 8.96924 24.1266C8.96924 25.0743 9.7403 25.8454 10.688 25.8454C11.6357 25.8454 12.4068 25.0743 12.4068 24.1266C12.4068 23.1789 11.6357 22.4078 10.688 22.4078ZM10.688 24.9078C10.2572 24.9078 9.90674 24.5574 9.90674 24.1266C9.90674 23.6958 10.2572 23.3453 10.688 23.3453C11.1188 23.3453 11.4692 23.6958 11.4692 24.1266C11.4692 24.5574 11.1187 24.9078 10.688 24.9078Z" fill="#001A34"/><path d="M25.2811 22.4078C24.3334 22.4078 23.5624 23.1788 23.5624 24.1266C23.5624 25.0743 24.3334 25.8454 25.2811 25.8454C26.2288 25.8454 26.9999 25.0743 26.9999 24.1266C26.9999 23.1789 26.2288 22.4078 25.2811 22.4078ZM25.2811 24.9078C24.8503 24.9078 24.4999 24.5574 24.4999 24.1266C24.4999 23.6958 24.8503 23.3453 25.2811 23.3453C25.7119 23.3453 26.0624 23.6958 26.0624 24.1266C26.0624 24.5574 25.7119 24.9078 25.2811 24.9078Z" fill="#001A34"/><path d="M4.43751 11.783H2.14588C1.88694 11.783 1.67712 11.9929 1.67712 12.2517C1.67712 12.5106 1.88694 12.7205 2.14588 12.7205H4.43751C4.69645 12.7205 4.90626 12.5106 4.90626 12.2517C4.90626 11.9929 4.69645 11.783 4.43751 11.783Z" fill="#001A34"/></svg>
                                           </div>
                                           <p class="basket_item_form_info">До бесплатной  доставки по Москве: 

                                        <span>5000 руб</span>.</p>
                                       </div>
                                       <div class="basket_item_form_line first_line"></div>
                                       <p class="basket_item_form_info2">Доставка по М.О. и всей России</p>
                                       <div class="basket_item_form_line second_line"></div>
                                       <div class="basket_item_form_inputs_wrapper" style="display:none;">
                                           <div class="basket_item_form_line_input_svg_wrapper">
                                                 <div class="basket_item_form_input_svg_wrapper">
                                               <div class="basket_item_form_input_svg">
                                                     <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5644 15.9998C10.3084 15.9998 10.0517 15.9458 9.81508 15.8378L8.47374 15.2278C8.17374 15.0918 7.82841 15.0911 7.52774 15.2278L6.18641 15.8371C5.73041 16.0438 5.20574 16.0525 4.74441 15.8618C4.28308 15.6705 3.91774 15.2925 3.74174 14.8251L3.22441 13.4451C3.10841 13.1358 2.86441 12.8918 2.55574 12.7765L1.17574 12.2591C0.707743 12.0831 0.33041 11.7178 0.139076 11.2565C-0.052257 10.7951 -0.0429237 10.2698 0.163743 9.81447L0.773743 8.47314C0.909743 8.17247 0.909743 7.82781 0.773743 7.52714L0.163076 6.1858C-0.0435904 5.73114 -0.0529237 5.20514 0.13841 4.7438C0.329743 4.28247 0.707743 3.91714 1.17508 3.74114L2.55508 3.2238C2.86441 3.1078 3.10841 2.8638 3.22374 2.55514L3.74108 1.17514C3.91708 0.707137 4.28241 0.329804 4.74374 0.138471C5.20574 -0.0528627 5.73041 -0.0435293 6.18574 0.163137L7.52708 0.773138C7.82708 0.909138 8.17241 0.909804 8.47308 0.773138L9.81441 0.163804C10.2691 -0.0435293 10.7951 -0.052196 11.2564 0.139137C11.7177 0.330471 12.0831 0.708471 12.2591 1.1758L12.7764 2.5558C12.8924 2.86514 13.1364 3.10914 13.4451 3.22447L14.8251 3.7418C15.2931 3.9178 15.6704 4.28314 15.8617 4.74447C16.0531 5.20581 16.0437 5.73114 15.8371 6.18647L15.2271 7.52781C15.0911 7.82847 15.0911 8.17314 15.2271 8.47381L15.8364 9.81514C16.0431 10.2698 16.0524 10.7958 15.8611 11.2571C15.6697 11.7185 15.2917 12.0838 14.8244 12.2598L13.4444 12.7771C13.1351 12.8931 12.8911 13.1371 12.7757 13.4458L12.2584 14.8258C12.0824 15.2938 11.7171 15.6711 11.2557 15.8625C11.0357 15.9538 10.7997 15.9998 10.5644 15.9998ZM8.00041 14.4591C8.25574 14.4591 8.51108 14.5131 8.74908 14.6211L10.0911 15.2311C10.3831 15.3645 10.7064 15.3698 11.0017 15.2465C11.2977 15.1238 11.5224 14.8911 11.6351 14.5918L12.1524 13.2118C12.3357 12.7225 12.7217 12.3365 13.2111 12.1531L14.5911 11.6358C14.8911 11.5238 15.1237 11.2985 15.2457 11.0025C15.3684 10.7065 15.3631 10.3831 15.2304 10.0918L14.6204 8.75047C14.4044 8.27447 14.4044 7.72847 14.6204 7.25247L15.2304 5.91047C15.3631 5.61914 15.3684 5.29581 15.2457 4.99981C15.1231 4.7038 14.8904 4.47914 14.5911 4.36647L13.2111 3.84914C12.7217 3.6658 12.3357 3.2798 12.1524 2.79047L11.6351 1.41047C11.5231 1.11047 11.2977 0.877804 11.0017 0.755804C10.7057 0.632471 10.3831 0.638471 10.0911 0.771137L8.74974 1.38114C8.27374 1.59647 7.72841 1.59647 7.25241 1.38114L5.90974 0.769804C5.61774 0.637137 5.29508 0.631804 4.99908 0.754471C4.70308 0.877138 4.47841 1.1098 4.36574 1.40914L3.84841 2.78914C3.66508 3.27847 3.27841 3.66514 2.78974 3.84847L1.40974 4.36581C1.10974 4.47781 0.877076 4.70314 0.755076 4.99914C0.631743 5.29514 0.637743 5.61847 0.769743 5.90981L1.37974 7.25114C1.59574 7.72714 1.59574 8.27314 1.37974 8.74914L0.769743 10.0911C0.637076 10.3825 0.631743 10.7058 0.75441 11.0018C0.877076 11.2978 1.10974 11.5225 1.40908 11.6351L2.78908 12.1525C3.27841 12.3358 3.66441 12.7218 3.84774 13.2111L4.36508 14.5911C4.47708 14.8911 4.70241 15.1238 4.99841 15.2458C5.29441 15.3685 5.61708 15.3631 5.90908 15.2305L7.25041 14.6205C7.48974 14.5131 7.74508 14.4591 8.00041 14.4591ZM8.61174 1.07647H8.61841H8.61174Z" fill="#838383"/><path d="M5.66667 6.66668C4.748 6.66668 4 5.91868 4 5.00001C4 4.08134 4.748 3.33334 5.66667 3.33334C6.58533 3.33334 7.33333 4.08134 7.33333 5.00001C7.33333 5.91868 6.58533 6.66668 5.66667 6.66668ZM5.66667 4.00001C5.11533 4.00001 4.66667 4.44868 4.66667 5.00001C4.66667 5.55134 5.11533 6.00001 5.66667 6.00001C6.218 6.00001 6.66667 5.55134 6.66667 5.00001C6.66667 4.44868 6.218 4.00001 5.66667 4.00001Z" fill="#838383"/><path d="M10.3333 12.6667C9.41462 12.6667 8.66663 11.9187 8.66663 11C8.66663 10.0814 9.41462 9.33337 10.3333 9.33337C11.252 9.33337 12 10.0814 12 11C12 11.9187 11.252 12.6667 10.3333 12.6667ZM10.3333 10C9.78196 10 9.33329 10.4487 9.33329 11C9.33329 11.5514 9.78196 12 10.3333 12C10.8846 12 11.3333 11.5514 11.3333 11C11.3333 10.4487 10.8846 10 10.3333 10Z" fill="#838383"/><path d="M5.66674 12C5.60541 12 5.54341 11.9833 5.48807 11.948C5.33274 11.8493 5.28674 11.6427 5.38607 11.488L10.0527 4.15467C10.1521 4 10.3574 3.954 10.5127 4.05267C10.6681 4.15134 10.7141 4.358 10.6147 4.51267L5.94807 11.846C5.88474 11.9453 5.77674 12 5.66674 12Z" fill="#838383"/></svg>
                                               </div>
                                               <input type="text" class="basket_item_form_input1" title="text"  placeholder="Введите промокод">
                                           </div>
                                                <div class="third_line"></div>
                                           </div>
                                           <div class="basket_item_form_input2_svg">
                                               <input type="submit">
                                              <div class="basket_item_form_input_svg2">
                                                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M9.86228 6.14326L3.8494 0.147008C3.65239 -0.0493365 3.33344 -0.0490065 3.13676 0.148024C2.94024 0.345029 2.94075 0.664163 3.13778 0.86066L8.79275 6.50002L3.13757 12.1394C2.94057 12.3359 2.94006 12.6548 3.13656 12.8518C3.23515 12.9506 3.36431 13 3.49347 13C3.6223 13 3.75096 12.9509 3.84937 12.8529L9.86228 6.85676C9.95716 6.76236 10.0104 6.63388 10.0104 6.50002C10.0104 6.36616 9.95701 6.23784 9.86228 6.14326Z" fill="#838383"/>
                                                   </svg>

                                              </div>
                                       </div>
                                  
                                      </div>
                                        <div  class="basket_item_form_not_found_item_wrapper">
                                            <p class="basket_item_form_not_found_item_text">Мы не нашли такого купона :(</p>
                                        </div>
                                          <div class="basket_item_form_info_details_wrapper">
                                          <div class="basket_item_form_info_details">
                                              <p class="basket_item_form_info_details_info">Товары (<span class="cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</p>
                                              <p class="basket_item_form_info_details_info"><span class="cart_prices"><?php echo  $woocommerce->cart->total; ?></span> руб</p>
                                          </div>
                                          <div  class="basket_item_form_info_details">
                                              <p class="basket_item_form_info_details_info">Скидка</p>
                                              <p class="basket_item_form_info_details_info red_info">-0%</p>
                                          </div>
                                           <div class="basket_item_form_info_details" >
                                              <p class="basket_item_form_info_details_info">Промокод</p>
                                              <p class="basket_item_form_info_details_info">-</p>
                                          </div>
                                          <div class="basket_item_form_info_details">
                                              <p class="basket_item_form_info_details_info1">Итого</p>
                                              <p class="basket_item_form_info_details_info1"><span class="cart_prices"><?php echo  $woocommerce->cart->total; ?></span> руб</p>
                                          </div>
                                      </div>
                                     <button class="basket_item_form_btn"> <span>ПЕРЕЙТИ К ОФОРМЛЕНИЮ</span></button>
                                     <a href=""class="basket_item_form_link">Условия доставки</a>
                                    </form>
                          </div>
                      </div>
                 </section>
                 
               
                  <div class="bought_firework_today_modal">
                        <div class="bought_firework_today_modal_close">
                             <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M9.99393 9.00078L17.7936 1.20109C18.0682 0.926489 18.0682 0.481271 17.7936 0.206701C17.519 -0.0678684 17.0738 -0.0679036 16.7992 0.206701L8.9995 8.00638L1.19986 0.206701C0.925253 -0.0679036 0.480035 -0.0679036 0.205465 0.206701C-0.0691044 0.481306 -0.0691395 0.926524 0.205465 1.20109L8.00511 9.00074L0.205465 16.8004C-0.0691395 17.075 -0.0691395 17.5202 0.205465 17.7948C0.34275 17.9321 0.522715 18.0007 0.702679 18.0007C0.882644 18.0007 1.06257 17.9321 1.19989 17.7948L8.9995 9.99517L16.7992 17.7948C16.9364 17.9321 17.1164 18.0007 17.2964 18.0007C17.4763 18.0007 17.6563 17.9321 17.7936 17.7948C18.0682 17.5202 18.0682 17.075 17.7936 16.8004L9.99393 9.00078Z" fill="#181A2F"/>
                              </svg>
                        </div>
                        <div class="fireworks_main_types_catalogue_item_video_wrapper">
                          <iframe src="https://www.youtube.com/embed/Q9KcDK5mb3o?autoplay=1&amp;mute=1&amp;enablejsapi=1&amp;modestbranding=1&amp;rel=0" frameborder="0" allowfullscreen="" gesture="media"></iframe>
                      </div>
                  </div>
              
           </main>
          


<?php
   get_footer();
?>
