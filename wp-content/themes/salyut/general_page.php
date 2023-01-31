<?php
/*
    Template name: catalog
*/
// session_start();

get_header();

$taxonomy     = 'product_cat';
$orderby      = 'name';  
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 0;

$args = array(
       'taxonomy'     => $taxonomy,
       'orderby'      => $orderby,
       'show_count'   => $show_count,
       'pad_counts'   => $pad_counts,
       'hierarchical' => $hierarchical,
       'title_li'     => $title,
       'hide_empty'   => $empty
);
$all_categories = get_categories( $args );

foreach ($all_categories as $cat ) {
    
  if($cat->category_parent == 0) {
      $category_id = $cat->term_id;       

      $args2 = array(
              'taxonomy'     => $taxonomy,
              'child_of'     => 0,
              'parent'       => $category_id,
              'orderby'      => $orderby,
              'show_count'   => $show_count,
              'pad_counts'   => $pad_counts,
              'hierarchical' => $hierarchical,
              'title_li'     => $title,
              'hide_empty'   => $empty
      );
      $sub_cats = get_categories( $args2 );
      if($sub_cats) {
          foreach($sub_cats as $sub_category) {
          }   
      }
  }       
}

?>

<?php 


 $args3 = get_terms( 'product_cat', array(
    'child_of'     => 0,
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
));


foreach(  $args3 as $prod_cat ) :
 
    $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
    $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
    $term_link = get_term_link( $prod_cat, 'product_cat' );?>

<?php endforeach; wp_reset_query();

?>
           <main>               
                 <section class="fireworks_batteries" >
                     <div class="fireworks_batteries_wrapper">
                         <div class="fireworks_batteries_slider_btns_wrapper">
                              <div class="swiper" id="first_swiper">
                                 <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="fireworks_batteries_slider_item_wrapper">
                                            <div class="fireworks_batteries_slider_item_info_wrapper">
                                                 <h1 class="fireworks_batteries_slider_item_title">Батареи салютов</h1>
                                                 <p class="fireworks_batteries_slider_item_text">от 43,13 ₽/шт</p>
                                                 <a href="" class="fireworks_batteries_slider_item_link">Подробнее</a>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="swiper-slide">  
                                        <div class="fireworks_batteries_slider_item_wrapper">
                                            <div class="fireworks_batteries_slider_item_info_wrapper">
                                                  <h1 class="fireworks_batteries_slider_item_title">Батареи салютов</h1>
                                                 <p class="fireworks_batteries_slider_item_text">от 43,13 ₽/шт</p>
                                                 <a href="" class="fireworks_batteries_slider_item_link">Подробнее</a>   
                                            </div>
                                       
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="fireworks_batteries_slider_item_wrapper">
                                            <div class="fireworks_batteries_slider_item_info_wrapper">
                                                <h1 class="fireworks_batteries_slider_item_title">Батареи салютов</h1>
                                                <p class="fireworks_batteries_slider_item_text">от 43,13 ₽/шт</p>
                                                <a href="" class="fireworks_batteries_slider_item_link">Подробнее</a>
                                            </div>
                                          
                                        </div>
                                    </div>
                                 </div>
                             </div>
                             <div class="swiper-btns-wrapper">
                                 <div class="swiper-button-prev swiper-btn-prev1"></div>
                                <div class="swiper-button-next swiper-btn-next1"></div>
                             </div>
                              
                         </div>
                         
                     </div>
                 </section>
                 <section class="select_a_category">
                      <div class="select_a_category_wrapper">
                          <h1 class="select_a_category_title">Выберите категорию:</h1>
                          <div class="select_a_category_items_first_wrapper">
                              <?php 
                              foreach(  $args3 as $prod_cat ) :
                                if($prod_cat->parent == 0):
                                //print_r($prod_cat );
                                $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                                $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
                                $term_link = get_term_link( $prod_cat, 'product_cat' );
                               
                                ?>



                                <a href=" <?php echo get_term_link($prod_cat->slug, 'product_cat')?>" class="select_a_category_item_first">
                                   <div class="select_a_category_item_first_img">
                                       <img src="<?php echo $shop_catalog_img[0]; ?>">
                                   </div>
                                   <p class="select_a_category_item_first_firework_name"><?php echo $prod_cat->name ?></p>
                                    <p class="select_a_category_item_first_firework_price">от <?php echo  get_field("price", 'product_cat_'.$prod_cat->term_id); ?> ₽</p>
                               </a>
                               <!-- <a href="<?php echo get_term_link($all_categories[6]->slug, 'product_cat')?>" class="select_a_category_item_first">
                                   <div class="select_a_category_item_first_img">
                                       <img src="<?php echo get_template_directory_uri(); ?>//images/firework_type1.png">
                                   </div>
                                   <p class="select_a_category_item_first_firework_name"><?php echo $all_categories[6]->name ?></p>
                                   <p class="select_a_category_item_first_firework_price">от 43,13 ₽</p>
                                   
                               </a>-->
                              
                             
                               <?php 
                                      endif;
                                    endforeach;
                                     wp_reset_query();
                                    ?>



                          </div>
                          <div class="select_a_category_items_second_wrapper">
                                  <div  class="select_a_category_item_second" id="select_a_category_item_second1">
                                           <div class="select_a_category_item_second_img">
                                             <img src="<?php echo get_template_directory_uri(); ?>//images/firework_type11.png">
                                          </div>
                                          
                                     <div  class="select_a_category_item_first_firework_title_link_wrapper">
                                           <p class="select_a_category_item_first_firework_title">Подборка для Нового года</p>
                                          <div class="select_a_category_item_first_info_img_link_wrapper">
                                          <a href="" class="select_a_category_item_first_info_img_link">
                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="14" viewBox="0 0 20 14"><g><g><image width="20" height="14" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAOCAYAAAAvxDzwAAAAAXNSR0IArs4c6QAAAPNJREFUOE+l079KBDEQx/Hv7CvIJTFe4b9CFCwEm2vUwiew8gWtrrNTUBAOFAQLQUEL0SLc7EPcyICCyiLsJmXIfMjkNxF6rpjjzLCltrRbXaXS0yPmeAqcCfIwL/O9v/W9QQdCDseCXHShg8D/0MGgo2mcDm1h18C9Ft33vSrQgdF4tNksmlfDbtrSHkjM8RxY7xvO13nDeEfwcBLw6OAlsDEQ9B4/MHyEoiAv1S2nlFatsTfgTotOqsCQw0SQmbeqRXerQvmR8JMW3fl+skE3TCvpyMyugF/YoBuG5XAiIlPgWYtuV3+9mOOtJ6pF17om4xNOQFNOKOI5JwAAAABJRU5ErkJggg=="/></g></g></svg>
                                        </a>
                                     </div>
                                     </div>
                                    
                                     
                               </div>
                                   <div  class="select_a_category_item_second" id="select_a_category_item_second2">
                                           <div class="select_a_category_item_second_img">
                                             <img src="<?php echo get_template_directory_uri(); ?>//images/firework_type12.png">
                                          </div>
                                          
                                  <div   class="select_a_category_item_first_firework_title_link_wrapper">
                                       <p class="select_a_category_item_first_firework_title">Подборка для Дня Рождения</p>
                                       <div class="select_a_category_item_first_info_img_link_wrapper">
                                          <a href="" class="select_a_category_item_first_info_img_link">
                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="14" viewBox="0 0 20 14"><g><g><image width="20" height="14" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAOCAYAAAAvxDzwAAAAAXNSR0IArs4c6QAAAPNJREFUOE+l079KBDEQx/Hv7CvIJTFe4b9CFCwEm2vUwiew8gWtrrNTUBAOFAQLQUEL0SLc7EPcyICCyiLsJmXIfMjkNxF6rpjjzLCltrRbXaXS0yPmeAqcCfIwL/O9v/W9QQdCDseCXHShg8D/0MGgo2mcDm1h18C9Ft33vSrQgdF4tNksmlfDbtrSHkjM8RxY7xvO13nDeEfwcBLw6OAlsDEQ9B4/MHyEoiAv1S2nlFatsTfgTotOqsCQw0SQmbeqRXerQvmR8JMW3fl+skE3TCvpyMyugF/YoBuG5XAiIlPgWYtuV3+9mOOtJ6pF17om4xNOQFNOKOI5JwAAAABJRU5ErkJggg=="/></g></g></svg>
                                        </a>
                                     </div>
                                  </div>
                                     
                               </div>
                                    <div  class="select_a_category_item_second" id="select_a_category_item_second3">
                                           <div class="select_a_category_item_second_img">
                                             <img src="<?php echo get_template_directory_uri(); ?>//images/firework_type13.png">
                                          </div>
                                          
                                          <div  class="select_a_category_item_first_firework_title_link_wrapper">
                                                <p class="select_a_category_item_first_firework_title">Подборка для свадьбы</p>
                                                <div class="select_a_category_item_first_info_img_link_wrapper">
                                          <a href="" class="select_a_category_item_first_info_img_link">
                                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="14" viewBox="0 0 20 14"><g><g><image width="20" height="14" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAOCAYAAAAvxDzwAAAAAXNSR0IArs4c6QAAAPNJREFUOE+l079KBDEQx/Hv7CvIJTFe4b9CFCwEm2vUwiew8gWtrrNTUBAOFAQLQUEL0SLc7EPcyICCyiLsJmXIfMjkNxF6rpjjzLCltrRbXaXS0yPmeAqcCfIwL/O9v/W9QQdCDseCXHShg8D/0MGgo2mcDm1h18C9Ft33vSrQgdF4tNksmlfDbtrSHkjM8RxY7xvO13nDeEfwcBLw6OAlsDEQ9B4/MHyEoiAv1S2nlFatsTfgTotOqsCQw0SQmbeqRXerQvmR8JMW3fl+skE3TCvpyMyugF/YoBuG5XAiIlPgWYtuV3+9mOOtJ6pF17om4xNOQFNOKOI5JwAAAABJRU5ErkJggg=="/></g></g></svg>
                                        </a>
                                     </div>
                                          </div>
                                         
                               </div>
                          </div>
                          
                      </div>
                 </section>
                 <section class="fireworks_city_features">
                     <div class="fireworks_city_features_wrapper">
                          <div class="fireworks_city_features_items_wrapper">
                              <div class="fireworks_city_features_item">
                                   <div  class="fireworks_city_features_item_svg">
                                       <img src="<?php echo get_template_directory_uri(); ?>//images/icon1.png">
                                   </div>
                                  <p class="fireworks_city_features_item_info">Салюты и фейерверкипо ценам от производителя</p>
                              </div>
                              <div class="fireworks_city_features_item">
                                   <div  class="fireworks_city_features_item_svg">
                                       <img src="<?php echo get_template_directory_uri(); ?>//images/icon2.png">
                                     </div>
                                  <p class="fireworks_city_features_item_info">Накопительная система скидок</p>
                              </div>
                              <div class="fireworks_city_features_item">
                                   <div  class="fireworks_city_features_item_svg">
                                      <img src="<?php echo get_template_directory_uri(); ?>//images/icon3.png">
                                   </div>
                                  <p class="fireworks_city_features_item_info">Оперативная доставка по Москве и МО</p>
                              </div>
                              <div class="fireworks_city_features_item">
                                   <div  class="fireworks_city_features_item_svg">
                                       <img src="<?php echo get_template_directory_uri(); ?>//images/icon4.png">
                                   </div>
                                  <p class="fireworks_city_features_item_info">Различные удобные формы оплаты</p>
                              </div>
                              <div class="fireworks_city_features_item">
                                    <div  class="fireworks_city_features_item_svg">
                                        <img src="<?php echo get_template_directory_uri(); ?>//images/icon5.png">
                                   </div>
                                  <p class="fireworks_city_features_item_info">Сертифицированный товар</p>
                              </div>
                              <div class="fireworks_city_features_item">
                                   <div  class="fireworks_city_features_item_svg">
                                        <img src="<?php echo get_template_directory_uri(); ?>//images/icon6.png">
                                   </div>
                                  <p class="fireworks_city_features_item_info">Помощь в выборе продукции и оформлении заказа</p>
                              </div>
                          </div>
                     </div>
                 </section>
                 <section class="bought_firework_today">
                     <div class="bought_firework_today_wrapper">
                         <h1 class="bought_firework_today_title">Купили сегодня</h1>
                        <div class="bought_firework_today_swiper_btns_wrapper">
                            <div class="swiper" id="second_swiper">
                                <div class="swiper-wrapper">
                                
                                 
                                 

                              
                               <?php
                              
                              $item_id  = get_today_orders();
                              
                              $all_orders = array_slice( $item_id, -1);
                                 
                               $ord_items = [];
                              foreach($all_orders as $all_order){
                                  
                                  $order = new WC_Order( $all_order );
                                  
                                  $items = $order->get_items();
                                 
                                  foreach ( $items as $item ) :
                                        $product_id = $item['product_id'];
                                                    $product = wc_get_product( $product_id );
                                                    $image_id  = $product->get_image_id();
                                                    $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                                                    $item_quantity  = $item->get_quantity();
                                                    $product_name   = $item->get_name();
                                //       echo "<pre>";
                                //   print_r( $product_name);
                                       $ord_items[] = [
                                                      
                                                      'product_id' => $item['product_id'],
                                                      'quantity'=> $item_quantity,
                                                      'image_id' => $image_url,
                                                      'product_name' => $product_name,
                                                      'product'   => $product_item

                                                  ];

                              ?>
                                               
                                                
                                                
                                                
                                                
                                  <div class="swiper-slide">
                                     <div class="fireworks_main_types_catalogue_item">
                                               <div class="bought_firework_today_swiper_img_video_wrapper">
                                                        <div class="fireworks_main_types_catalogue_item_img">
                                                            <img src="<?php echo $image_url; ?>" alt="">
                                                        </div>
                                               </div>
                                               <div class="fireworks_main_types_catalogue_item_details_wrapper">
                                                   <a href="" class="fireworks_main_types_catalogue_item_details_link">
                                                       <?=$product_name;?>
                                                  </a>
                                                 <div class="fireworks_main_types_catalogue_item_details_sale_icons_wrapper">
                                                         
                                                        <div class="fireworks_main_types_catalogue_item_details_icons_wrapper">
                                                            <div class="fireworks_main_types_catalogue_item_details_icons1 <?= $heart !== false ? 'open' : ''?>">
                                                                <input type="hidden" class="product_id" value="<?php echo  $product_id; ?>">                                                         
                                                            <svg class="red_heart" width="25" height="24" viewBox="0 0 25 24"  xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 2.09486C19.4346 -5.17787 36.7725 7.54861 12.5 23.913C-11.7725 7.5502 5.56544 -5.17787 12.5 2.09486Z" fill="#F91155"/>
                                                        </svg>
        
                                                    
                                                        <svg class="black_heart" width="25" height="24" viewBox="0 0 25 24"  xmlns="http://www.w3.org/2000/svg"><path d="M12.4998 4.29383L11.3795 3.14226C8.74984 0.439138 3.92796 1.37195 2.18734 4.77039C1.37015 6.36883 1.18577 8.67664 2.67796 11.622C4.11546 14.4579 7.10609 17.8548 12.4998 21.5548C17.8936 17.8548 20.8826 14.4579 22.3217 11.622C23.8139 8.67508 23.6311 6.36883 22.8123 4.77039C21.0717 1.37195 16.2498 0.437576 13.6201 3.1407L12.4998 4.29383ZM12.4998 23.4376C-11.458 7.60633 5.12327 -4.74992 12.2248 1.78601C12.3186 1.87195 12.4108 1.96101 12.4998 2.0532C12.588 1.9611 12.6797 1.87249 12.7748 1.78758C19.8748 -4.75305 36.4576 7.60476 12.4998 23.4376Z" fill="#001A3A"/></svg>
                                                                    
                                                                    
                                                            </div>
                                                            <div class="fireworks_main_types_catalogue_item_details_icons2">
                                                            
                                                            <svg class="black_cart" width="20" height="24" viewBox="0 0 20 24"  xmlns="http://www.w3.org/2000/svg"><path d="M16.5 0H6C5.20435 0 4.44129 0.316071 3.87868 0.87868C3.31607 1.44129 3 2.20435 3 3C2.20435 3 1.44129 3.31607 0.87868 3.87868C0.31607 4.44129 0 5.20435 0 6V21C0 21.7956 0.31607 22.5587 0.87868 23.1213C1.44129 23.6839 2.20435 24 3 24H13.5C14.2956 24 15.0587 23.6839 15.6213 23.1213C16.1839 22.5587 16.5 21.7956 16.5 21C17.2956 21 18.0587 20.6839 18.6213 20.1213C19.1839 19.5587 19.5 18.7956 19.5 18V3C19.5 2.20435 19.1839 1.44129 18.6213 0.87868C18.0587 0.316071 17.2956 0 16.5 0V0ZM16.5 19.5V6C16.5 5.20435 16.1839 4.44129 15.6213 3.87868C15.0587 3.31607 14.2956 3 13.5 3H4.5C4.5 2.60218 4.65804 2.22064 4.93934 1.93934C5.22064 1.65804 5.60218 1.5 6 1.5H16.5C16.8978 1.5 17.2794 1.65804 17.5607 1.93934C17.842 2.22064 18 2.60218 18 3V18C18 18.3978 17.842 18.7794 17.5607 19.0607C17.2794 19.342 16.8978 19.5 16.5 19.5ZM1.5 6C1.5 5.60218 1.65804 5.22064 1.93934 4.93934C2.22064 4.65804 2.60218 4.5 3 4.5H13.5C13.8978 4.5 14.2794 4.65804 14.5607 4.93934C14.842 5.22064 15 5.60218 15 6V21C15 21.3978 14.842 21.7794 14.5607 22.0607C14.2794 22.342 13.8978 22.5 13.5 22.5H3C2.60218 22.5 2.22064 22.342 1.93934 22.0607C1.65804 21.7794 1.5 21.3978 1.5 21V6Z" fill="#001A3A"/></svg>
                                                                <svg class="red_cart" width="20" height="24" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M15.875 0H6.25C5.52065 0 4.82118 0.289731 4.30546 0.805456C3.78973 1.32118 3.5 2.02065 3.5 2.75C2.77065 2.75 2.07118 3.03973 1.55546 3.55546C1.03973 4.07118 0.75 4.77065 0.75 5.5V19.25C0.75 19.9793 1.03973 20.6788 1.55546 21.1945C2.07118 21.7103 2.77065 22 3.5 22H13.125C13.8543 22 14.5538 21.7103 15.0695 21.1945C15.5853 20.6788 15.875 19.9793 15.875 19.25C16.6043 19.25 17.3038 18.9603 17.8195 18.4445C18.3353 17.9288 18.625 17.2293 18.625 16.5V2.75C18.625 2.02065 18.3353 1.32118 17.8195 0.805456C17.3038 0.289731 16.6043 0 15.875 0V0ZM15.875 17.875V5.5C15.875 4.77065 15.5853 4.07118 15.0695 3.55546C14.5538 3.03973 13.8543 2.75 13.125 2.75H4.875C4.875 2.38533 5.01987 2.03559 5.27773 1.77773C5.53559 1.51987 5.88533 1.375 6.25 1.375H15.875C16.2397 1.375 16.5894 1.51987 16.8473 1.77773C17.1051 2.03559 17.25 2.38533 17.25 2.75V16.5C17.25 16.8647 17.1051 17.2144 16.8473 17.4723C16.5894 17.7301 16.2397 17.875 15.875 17.875ZM2.125 5.5C2.125 5.13533 2.26987 4.78559 2.52773 4.52773C2.78559 4.26987 3.13533 4.125 3.5 4.125H13.125C13.4897 4.125 13.8394 4.26987 14.0973 4.52773C14.3551 4.78559 14.5 5.13533 14.5 5.5V19.25C14.5 19.6147 14.3551 19.9644 14.0973 20.2223C13.8394 20.4801 13.4897 20.625 13.125 20.625H3.5C3.13533 20.625 2.78559 20.4801 2.52773 20.2223C2.26987 19.9644 2.125 19.6147 2.125 19.25V5.5Z" fill="#F91155"/>
                                                            </svg>
                                                            </div>
                                                    </div>
                                                         <div class="fireworks_main_types_catalogue_item_details_price_cart_wrapper">
                                                              
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_btn">
                                                                   <div class="fireworks_main_types_catalogue_item_details_cart_btn_svg">
                                                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8.50015 1.0625C9.06374 1.0625 9.60424 1.28638 10.0028 1.6849C10.4013 2.08341 10.6252 2.62391 10.6252 3.1875V5.3125H6.37515V3.1875C6.37515 2.62391 6.59903 2.08341 6.99755 1.6849C7.39606 1.28638 7.93657 1.0625 8.50015 1.0625ZM11.6877 5.3125V3.1875C11.6877 2.34212 11.3518 1.53137 10.7541 0.933597C10.1563 0.335825 9.34553 0 8.50015 0C7.65477 0 6.84402 0.335825 6.24625 0.933597C5.64848 1.53137 5.31265 2.34212 5.31265 3.1875V5.3125H3.57121C3.18964 5.31258 2.82076 5.44956 2.53162 5.69854C2.24247 5.94753 2.05225 6.29198 1.99553 6.66931L0.903276 13.9506C0.846738 14.3284 0.872357 14.714 0.978384 15.081C1.08441 15.448 1.26835 15.7878 1.51766 16.0773C1.76697 16.3667 2.07578 16.599 2.42302 16.7582C2.77026 16.9175 3.14776 16.9999 3.52978 17H13.4705C13.8525 16.9999 14.23 16.9175 14.5773 16.7582C14.9245 16.599 15.2333 16.3667 15.4826 16.0773C15.7319 15.7878 15.9159 15.448 16.0219 15.081C16.1279 14.714 16.1536 14.3284 16.097 13.9506L15.0048 6.66931C14.9481 6.29216 14.758 5.94785 14.4691 5.69889C14.1802 5.44993 13.8115 5.31284 13.4302 5.3125H11.6877ZM10.6252 6.375V7.96875C10.6252 8.10965 10.6811 8.24477 10.7808 8.3444C10.8804 8.44403 11.0155 8.5 11.1564 8.5C11.2973 8.5 11.4324 8.44403 11.5321 8.3444C11.6317 8.24477 11.6877 8.10965 11.6877 7.96875V6.375H13.4291C13.5563 6.37513 13.6792 6.42087 13.7755 6.50393C13.8718 6.58699 13.9351 6.70184 13.954 6.82763L15.0462 14.1068C15.0803 14.3336 15.0651 14.565 15.0015 14.7853C14.938 15.0056 14.8277 15.2096 14.6781 15.3834C14.5285 15.5572 14.3432 15.6967 14.1348 15.7923C13.9264 15.8879 13.6998 15.9374 13.4705 15.9375H3.52978C3.30048 15.9374 3.0739 15.8879 2.86549 15.7923C2.65709 15.6967 2.47177 15.5572 2.32219 15.3834C2.17261 15.2096 2.06229 15.0056 1.99877 14.7853C1.93524 14.565 1.92 14.3336 1.95409 14.1068L3.04634 6.82763C3.06513 6.70202 3.1283 6.58731 3.2244 6.50428C3.32049 6.42124 3.44315 6.37538 3.57015 6.375H5.31265V7.96875C5.31265 8.10965 5.36862 8.24477 5.46825 8.3444C5.56788 8.44403 5.703 8.5 5.8439 8.5C5.9848 8.5 6.11992 8.44403 6.21955 8.3444C6.31918 8.24477 6.37515 8.10965 6.37515 7.96875V6.375H10.6252Z" fill="white"/>
                                                                    </svg>
                                                                        
                                                                   </div>
                                                                   <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
                                                               </button>
                                                               <div class="fireworks_main_types_catalogue_item_details_cart_number_btns_wrapper">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_minus_btn but_input_qty" >
                                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                                 </svg>
                                                                     
                                                                </button>
                                                               <input type="text"  value="1" class="fireworks_main_types_catalogue_item_details_cart_number input_qty" name="<? echo $product_id;  ?>">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_plus_btn but_input_qty">
                                                                 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                     <line x1="1" y1="13" x2="23" y2="13" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                                     <line x1="12" y1="23" x2="12" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                                     </svg>
                                                                     
                                                                </button>
                                                          </div>
                                                 </div>
                                                 </div>
                                                 
                                               </div>
                                           </div>
                                 </div>
                                
                                
                                
                                
                                    <?php endforeach; } ?>
                                
                                
                               
                                 
                                 
                                 
                                 
                                 
                              </div>
                          </div>
                          <div class="bought_firework_today_swiper-btns_wrapper">
                              <div class="swiper-button-prev swiper-btn-prev2"></div>
                              <div class="swiper-button-next swiper-btn-next2"></div>   
                          </div>
                           
                        </div>
                        
                     </div>
                 </section>
                 <section class= "fireworks_online_store">
                      <div class= "fireworks_online_store_wrapper">
                          <h1 class= "fireworks_online_store_title">Фейерверки интернет-магазин</h1>
                          <p  class= "fireworks_online_store_info"><?php echo the_content(); ?> </p>
                         
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
            <?php global $woocommerce; 
            if(count(WC()->cart->get_cart()) !==0 ):?>
           <div class="loader_product_price_btn_wrapper">
            <div class="loader_btn">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>    
            </div>
           
            <div class="product_price_num_info_wrapper">
              <span class="product_price_num cart_prices"><?php  echo $woocommerce->cart->get_cart_total();?></span>
              <span class="product_price_info">Заказать</span>
            </div>
           
        </div>
         <?php else:?>
             <div class="loader_product_price_btn_wrapper" style="display:none;">
            <div class="loader_btn">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>    
            </div>
           
            <div class="product_price_num_info_wrapper">
              <span class="product_price_num cart_prices"><?php  echo $woocommerce->cart->get_cart_total();?></span>
              <span class="product_price_info">Заказать</span>
            </div>
           
        </div>
            <?php endif;?>
        
    <?php
    get_footer();
    ?>