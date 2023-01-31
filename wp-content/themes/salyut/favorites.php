<?php
/*
    Template name: favorits
*/
// session_start();

get_header();


?>
           <main>
                 
                 <section class="favorites">
                   <div class="favorites_wrapper">
                       <div class="favorites_links_main_wrapper">
                           <div class="favorites_links_wrapper">
                            <a href="/главная/" class="favorites_link">Главная
                                   <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79328 2.36279L1.48063 0.0565417C1.40486 -0.0189756 1.28218 -0.0188486 1.20654 0.0569323C1.13095 0.132704 1.13115 0.255447 1.20693 0.331023L3.38192 2.50001L1.20685 4.66898C1.13108 4.74457 1.13089 4.86724 1.20646 4.94302C1.24438 4.98101 1.29406 5 1.34374 5C1.39329 5 1.44277 4.98113 1.48062 4.94341L3.79328 2.63722C3.82977 2.60091 3.85025 2.55149 3.85025 2.50001C3.85025 2.44852 3.82971 2.39917 3.79328 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                            </a>
                            <a href="/каталог/" class="favorites_link">
                                Каталог товаров
                                <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79328 2.36279L1.48063 0.0565417C1.40486 -0.0189756 1.28218 -0.0188486 1.20654 0.0569323C1.13095 0.132704 1.13115 0.255447 1.20693 0.331023L3.38192 2.50001L1.20685 4.66898C1.13108 4.74457 1.13089 4.86724 1.20646 4.94302C1.24438 4.98101 1.29406 5 1.34374 5C1.39329 5 1.44277 4.98113 1.48062 4.94341L3.79328 2.63722C3.82977 2.60091 3.85025 2.55149 3.85025 2.50001C3.85025 2.44852 3.82971 2.39917 3.79328 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                            </a>
                            <a href="" class="favorites_link">Избранное</a>
                       </div>
                       </div>
                       
                       <div  class="favorites_items_wrapper">
                            <div  class="favorites_items_titles_wrapper">
                                 <p  class="favorites_item_title open"  data-id="favorites_open_item1" id="open_div">Избранное</p>
                                 <p  class="favorites_item_title" data-id="favorites_open_item2" >Сравнение</p>
                            </div>
                            <div  class="favorites_items open" id="favorites_open_item1" style="flex-wrap: wrap;">

                            <?
                            $data_h    = unserialize($_COOKIE['like_product']);
                            $data = $data_h === false ? [] : $data_h;
                            if(!empty($data_h)):
                            foreach ($data_h  as $key=> $product_id ) : 
                                $product = wc_get_product($product_id );
                                $price1           = $product->get_price();
                                $price2           = $product->get_regular_price();
                                $price_difference = round($price2-$price1);
                                $pracent          = round(100-($price1*100)/$price2);
                                $heart = array_search(intval($product_id), $data );
                                
                                ?>





                                 <div class="favorites_item ">
                                    <div class="fireworks_main_types_catalogue_item_img_video_wrapper">
                                        <div class="favorites_item_img_texts_wrapper">
                                                <div class="fireworks_main_types_catalogue_item_price_num_title_wrapper">
                                                        <?php if($price_difference > 0):   ?>
                                                            <div class="fireworks_main_types_catalogue_item_price_title_wrapper">
                                                                <p class="fireworks_main_types_catalogue_item_price_title">ШОК-ЦЕНА</p>
                                                            </div>
                                                        <div class="fireworks_main_types_catalogue_item_price_num_wrapper">
                                                            <p class="fireworks_main_types_catalogue_item_price_num">-<?php echo $price_difference;?>₽</p>
                                                        </div>
                                                        <?php else: echo "";
                                                        endif; ?>
                                                </div>
                                                <div class="fireworks_main_types_catalogue_item_img_wrapper">
                                             <div class="fireworks_main_types_catalogue_item_img">
                                             <?php if (has_post_thumbnail( $product_id )) echo get_the_post_thumbnail($product_id, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
                                             </div>
                                               </div>
                                              <div class="favorites_item_video_link_new_wrapper">
                                               <div class="fireworks_main_types_catalogue_item_video_link_wrapper open_video">
                                                 <svg width="34" height="26" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M0 6.80776C0 4.61783 1.42277 2.6671 3.53491 2.0886C13.7912 -0.72052 20.6555 -0.667821 30.4927 2.07665C32.5922 2.66238 34 4.60669 34 6.78635V19.1755C34 21.3447 32.6043 23.2829 30.5175 23.8753C20.4544 26.7325 13.5644 26.6869 3.50626 23.8662C1.40813 23.2778 0 21.3341 0 19.1551V6.80776Z" fill="#F91155"></path>
                                                     <g>
                                                     <path d="M21.8747 13.7588L13.0001 18.8826C12.7288 19.0391 12.395 19.0391 12.1234 18.8826C11.8526 18.7261 11.6855 18.4365 11.6855 18.1235V7.87609C11.6855 7.56291 11.8529 7.27359 12.1234 7.11733C12.2593 7.03893 12.4104 7 12.5617 7C12.7128 7 12.8643 7.03893 12.9997 7.11733L21.8743 12.241C22.1455 12.3974 22.3124 12.6868 22.3124 12.9998C22.313 13.3127 22.1457 13.6021 21.8747 13.7588Z" fill="white"></path>
                                                     </g>
                                                     <defs>
                                                     <clipPath id="clip0">
                                                     <rect width="12" height="12" fill="white" transform="matrix(1 0 0 -1 11 19)"></rect>
                                                     </clipPath>
                                                     </defs>
                                                 </svg>
                                                     
                                                 ВИДЕО
                                               </div>
                                               <div class="fireworks_main_types_catalogue_item_new_item_wrapper">
                                                           <p class="fireworks_main_types_catalogue_item_new_item_text">НОВИНКА</p>
                                               </div>
                                               <div class="fireworks_main_types_catalogue_item_new_item_wrapper_bestseller">
                                                <p class="fireworks_main_types_catalogue_item_new_item_text_bestseller">БЕСТСЕЛЛЕР</p>
                                            </div>
                                              </div>
                                        </div>
                                     
                                      
                                    </div>
                                    <div class="fireworks_main_types_catalogue_item_details_wrapper">
                                    <a href="<?php echo get_permalink( $product_id ); ?>" class="fireworks_main_types_catalogue_item_details_link"><?php echo $product->get_name(); ?></a>
                                      <p class="fireworks_main_types_catalogue_item_details_info">Хлопушки и пневпохлопушки</p>
                                      <div class="fireworks_main_types_catalogue_item_details_price_title_info_wrapper">

                                              <div class="fireworks_main_types_catalogue_item_details_price_title_info">
                                                    <p class="fireworks_main_types_catalogue_item_details_price_title_info_text">Калибр</p>
                                                    <p class="fireworks_main_types_catalogue_item_details_price_title_info_num"><?php  echo get_field("caliber", $product_id);?></p>
                                                </div>
                                                <div class="fireworks_main_types_catalogue_item_details_price_title_info">
                                                    <p class="fireworks_main_types_catalogue_item_details_price_title_info_text">Время</p>
                                                    <p class="fireworks_main_types_catalogue_item_details_price_title_info_num"><?php echo  get_field('duration', $product_id );?> сек.</p>
                                                </div>
                                                <div class="fireworks_main_types_catalogue_item_details_price_title_info">
                                                <p class="fireworks_main_types_catalogue_item_details_price_title_info_text">Залпов</p>
                                                <p class="fireworks_main_types_catalogue_item_details_price_title_info_num"><?php echo get_field("volley", $product_id);?></p>
                                            </div>
                                                <div class="fireworks_main_types_catalogue_item_details_price_title_info">
                                                    <p class="fireworks_main_types_catalogue_item_details_price_title_info_text">Высота</p>
                                                    <p class="fireworks_main_types_catalogue_item_details_price_title_info_num"><?php echo get_field("height", $product_id);?></p>
                                                </div>
                                            
                                      </div>
                                      <div class="fireworks_main_types_catalogue_item_details_sale_icons_wrapper">
                                              <div class="fireworks_main_types_catalogue_item_details_sale_wrapper">

                                              <?php if($price_difference>0): ?> 
                                                    <p class="fireworks_main_types_catalogue_item_details_sale_info1"><?php echo $product->get_regular_price();?> ₽</p>
                                                
                                                    <div class="fireworks_main_types_catalogue_item_details_sale_info2_wrapper">
                                                        <p class="fireworks_main_types_catalogue_item_details_sale_info2">-<?php echo  $pracent;?>%</p>
                                                    </div>
                                                    <?php else: echo ""; endif; ?>

                                              </div>
                                              <div class="fireworks_main_types_catalogue_item_details_icons_wrapper">
                                              <div class="fireworks_main_types_catalogue_item_details_icons1 <?= $heart !== false ? 'open' : ''?>">
                                                               
                                                               <input type="hidden" class="product_id" value="<?php echo  $product_id; ?>">                                                         
                                                               <svg class="red_heart" width="25" height="24" viewBox="0 0 25 24"  xmlns="http://www.w3.org/2000/svg">
                                                               <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 2.09486C19.4346 -5.17787 36.7725 7.54861 12.5 23.913C-11.7725 7.5502 5.56544 -5.17787 12.5 2.09486Z" fill="#F91155"/>
                                                               </svg>

                                                           
                                                               <svg class="black_heart" width="25" height="24" viewBox="0 0 25 24"  xmlns="http://www.w3.org/2000/svg"><path d="M12.4998 4.29383L11.3795 3.14226C8.74984 0.439138 3.92796 1.37195 2.18734 4.77039C1.37015 6.36883 1.18577 8.67664 2.67796 11.622C4.11546 14.4579 7.10609 17.8548 12.4998 21.5548C17.8936 17.8548 20.8826 14.4579 22.3217 11.622C23.8139 8.67508 23.6311 6.36883 22.8123 4.77039C21.0717 1.37195 16.2498 0.437576 13.6201 3.1407L12.4998 4.29383ZM12.4998 23.4376C-11.458 7.60633 5.12327 -4.74992 12.2248 1.78601C12.3186 1.87195 12.4108 1.96101 12.4998 2.0532C12.588 1.9611 12.6797 1.87249 12.7748 1.78758C19.8748 -4.75305 36.4576 7.60476 12.4998 23.4376Z" fill="#001A3A"/></svg>
                                                                  
                                                           </div>
                                                <div class="fireworks_main_types_catalogue_item_details_icons2">
                                                <svg class="black_cart" width="20" height="24" viewBox="0 0 20 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.5 0H6C5.20435 0 4.44129 0.316071 3.87868 0.87868C3.31607 1.44129 3 2.20435 3 3C2.20435 3 1.44129 3.31607 0.87868 3.87868C0.31607 4.44129 0 5.20435 0 6V21C0 21.7956 0.31607 22.5587 0.87868 23.1213C1.44129 23.6839 2.20435 24 3 24H13.5C14.2956 24 15.0587 23.6839 15.6213 23.1213C16.1839 22.5587 16.5 21.7956 16.5 21C17.2956 21 18.0587 20.6839 18.6213 20.1213C19.1839 19.5587 19.5 18.7956 19.5 18V3C19.5 2.20435 19.1839 1.44129 18.6213 0.87868C18.0587 0.316071 17.2956 0 16.5 0V0ZM16.5 19.5V6C16.5 5.20435 16.1839 4.44129 15.6213 3.87868C15.0587 3.31607 14.2956 3 13.5 3H4.5C4.5 2.60218 4.65804 2.22064 4.93934 1.93934C5.22064 1.65804 5.60218 1.5 6 1.5H16.5C16.8978 1.5 17.2794 1.65804 17.5607 1.93934C17.842 2.22064 18 2.60218 18 3V18C18 18.3978 17.842 18.7794 17.5607 19.0607C17.2794 19.342 16.8978 19.5 16.5 19.5ZM1.5 6C1.5 5.60218 1.65804 5.22064 1.93934 4.93934C2.22064 4.65804 2.60218 4.5 3 4.5H13.5C13.8978 4.5 14.2794 4.65804 14.5607 4.93934C14.842 5.22064 15 5.60218 15 6V21C15 21.3978 14.842 21.7794 14.5607 22.0607C14.2794 22.342 13.8978 22.5 13.5 22.5H3C2.60218 22.5 2.22064 22.342 1.93934 22.0607C1.65804 21.7794 1.5 21.3978 1.5 21V6Z" fill="#001A3A"></path></svg>
                                                 <svg class="red_cart" width="20" height="24" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                               <path d="M15.875 0H6.25C5.52065 0 4.82118 0.289731 4.30546 0.805456C3.78973 1.32118 3.5 2.02065 3.5 2.75C2.77065 2.75 2.07118 3.03973 1.55546 3.55546C1.03973 4.07118 0.75 4.77065 0.75 5.5V19.25C0.75 19.9793 1.03973 20.6788 1.55546 21.1945C2.07118 21.7103 2.77065 22 3.5 22H13.125C13.8543 22 14.5538 21.7103 15.0695 21.1945C15.5853 20.6788 15.875 19.9793 15.875 19.25C16.6043 19.25 17.3038 18.9603 17.8195 18.4445C18.3353 17.9288 18.625 17.2293 18.625 16.5V2.75C18.625 2.02065 18.3353 1.32118 17.8195 0.805456C17.3038 0.289731 16.6043 0 15.875 0V0ZM15.875 17.875V5.5C15.875 4.77065 15.5853 4.07118 15.0695 3.55546C14.5538 3.03973 13.8543 2.75 13.125 2.75H4.875C4.875 2.38533 5.01987 2.03559 5.27773 1.77773C5.53559 1.51987 5.88533 1.375 6.25 1.375H15.875C16.2397 1.375 16.5894 1.51987 16.8473 1.77773C17.1051 2.03559 17.25 2.38533 17.25 2.75V16.5C17.25 16.8647 17.1051 17.2144 16.8473 17.4723C16.5894 17.7301 16.2397 17.875 15.875 17.875ZM2.125 5.5C2.125 5.13533 2.26987 4.78559 2.52773 4.52773C2.78559 4.26987 3.13533 4.125 3.5 4.125H13.125C13.4897 4.125 13.8394 4.26987 14.0973 4.52773C14.3551 4.78559 14.5 5.13533 14.5 5.5V19.25C14.5 19.6147 14.3551 19.9644 14.0973 20.2223C13.8394 20.4801 13.4897 20.625 13.125 20.625H3.5C3.13533 20.625 2.78559 20.4801 2.52773 20.2223C2.26987 19.9644 2.125 19.6147 2.125 19.25V5.5Z" fill="#F91155"></path>
                                                </svg>
                                                </div>
                                        </div>
                                      </div>
                                      <div class="fireworks_main_types_catalogue_item_details_price_cart_wrapper">
                                                               <p class="fireworks_main_types_catalogue_item_details_price"><?php echo $product->get_price();?> ₽</p>
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


                             <? endforeach; 
                             else: echo "У вас нет сохраненного продукта "; 
                        endif;   ?>
   
                            </div>



















                            
                            <div  class="favorites_items" id="favorites_open_item2">
                                <p class="favorites_item_info1">Батареи салютов малые 2</p>
                                <div class="favorites_item_info_titles_swiper_wrapper">
                                
                                      <p class="favorites_item_info2">Товар</p>
                                     <div  class="favorites_item_info_swiper_wrapper">
                                    <div class="favorites_item_info_swiper_btns_wrapper">
                                          <div class="swiper" id="third_swiper">
                                               <!-- Additional required wrapper -->
                                               <div class="swiper-wrapper" >
                                                   <!-- Slides -->
                                                  <div class="swiper-slide">
                                                     <div class="fireworks_main_types_catalogue_item">
                                                         <div class="fireworks_favorites_close">
                                                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66295 6.00077L11.8627 0.800979C12.0458 0.617909 12.0458 0.321097 11.8627 0.13805C11.6796 -0.0449964 11.3828 -0.0450198 11.1998 0.13805L6 5.33784L0.800231 0.13805C0.617161 -0.0450198 0.320349 -0.0450198 0.137302 0.13805C-0.0457441 0.32112 -0.0457675 0.617932 0.137302 0.800979L5.33707 6.00074L0.137302 11.2005C-0.0457675 11.3836 -0.0457675 11.6804 0.137302 11.8635C0.228826 11.955 0.348802 12.0007 0.468778 12.0007C0.588755 12.0007 0.708708 11.955 0.800255 11.8635L6 6.66369L11.1998 11.8635C11.2913 11.955 11.4113 12.0007 11.5312 12.0007C11.6512 12.0007 11.7712 11.955 11.8627 11.8635C12.0458 11.6804 12.0458 11.3836 11.8627 11.2005L6.66295 6.00077Z" fill="#001A34"/></svg>
                                                         </div>
                                                          <div class="bought_firework_today_swiper_img_video_wrapper">
                                                        <div class="fireworks_main_types_catalogue_item_img">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/item1.png" alt="">
                                                        </div>
                                               </div>
                                                          <div class="fireworks_main_types_catalogue_item_details_wrapper">
                                                   <a href="" class="fireworks_main_types_catalogue_item_details_link">Фейерверк + фонтан GW218-89
                                                    Балет / BALET (0,8" х 11)
                                                  </a>
                                                 <div class="fireworks_main_types_catalogue_item_details_sale_icons_wrapper">
                                                         
                                                         <div class="fireworks_main_types_catalogue_item_details_icons_wrapper">
                                                            <div class="fireworks_main_types_catalogue_item_details_icons1">
                                                                                                                       
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
                                                                В КОРЗИНУ
                                                               </button>
                                                               <div class="fireworks_main_types_catalogue_item_details_cart_number_btns_wrapper">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_minus_btn" >
                                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                                 </svg>
                                                                     
                                                                </button>
                                                               <input type="text" name="name" value="1" class="fireworks_main_types_catalogue_item_details_cart_number">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_plus_btn">
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
                                                  <div class="swiper-slide">
                                                     <div class="fireworks_main_types_catalogue_item">
                                                           <div class="fireworks_favorites_close">
                                                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66295 6.00077L11.8627 0.800979C12.0458 0.617909 12.0458 0.321097 11.8627 0.13805C11.6796 -0.0449964 11.3828 -0.0450198 11.1998 0.13805L6 5.33784L0.800231 0.13805C0.617161 -0.0450198 0.320349 -0.0450198 0.137302 0.13805C-0.0457441 0.32112 -0.0457675 0.617932 0.137302 0.800979L5.33707 6.00074L0.137302 11.2005C-0.0457675 11.3836 -0.0457675 11.6804 0.137302 11.8635C0.228826 11.955 0.348802 12.0007 0.468778 12.0007C0.588755 12.0007 0.708708 11.955 0.800255 11.8635L6 6.66369L11.1998 11.8635C11.2913 11.955 11.4113 12.0007 11.5312 12.0007C11.6512 12.0007 11.7712 11.955 11.8627 11.8635C12.0458 11.6804 12.0458 11.3836 11.8627 11.2005L6.66295 6.00077Z" fill="#001A34"/></svg>
                                                         </div>
                                                          <div class="bought_firework_today_swiper_img_video_wrapper">
                                                        <div class="fireworks_main_types_catalogue_item_img">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/item1.png" alt="">
                                                        </div>
                                               </div>
                                                          <div class="fireworks_main_types_catalogue_item_details_wrapper">
                                                   <a href="" class="fireworks_main_types_catalogue_item_details_link">Фейерверк + фонтан GW218-89
                                                    Балет / BALET (0,8" х 11)
                                                  </a>
                                                 <div class="fireworks_main_types_catalogue_item_details_sale_icons_wrapper">
                                                         
                                                         <div class="fireworks_main_types_catalogue_item_details_icons_wrapper">
                                                            <div class="fireworks_main_types_catalogue_item_details_icons1">
                                                                                                                       
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
                                                                В КОРЗИНУ
                                                               </button>
                                                               <div class="fireworks_main_types_catalogue_item_details_cart_number_btns_wrapper">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_minus_btn" >
                                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                                 </svg>
                                                                     
                                                                </button>
                                                               <input type="text" name="name" value="1" class="fireworks_main_types_catalogue_item_details_cart_number">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_plus_btn">
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
                                                  <div class="swiper-slide">
                                                     <div class="fireworks_main_types_catalogue_item">
                                                           <div class="fireworks_favorites_close">
                                                             <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66295 6.00077L11.8627 0.800979C12.0458 0.617909 12.0458 0.321097 11.8627 0.13805C11.6796 -0.0449964 11.3828 -0.0450198 11.1998 0.13805L6 5.33784L0.800231 0.13805C0.617161 -0.0450198 0.320349 -0.0450198 0.137302 0.13805C-0.0457441 0.32112 -0.0457675 0.617932 0.137302 0.800979L5.33707 6.00074L0.137302 11.2005C-0.0457675 11.3836 -0.0457675 11.6804 0.137302 11.8635C0.228826 11.955 0.348802 12.0007 0.468778 12.0007C0.588755 12.0007 0.708708 11.955 0.800255 11.8635L6 6.66369L11.1998 11.8635C11.2913 11.955 11.4113 12.0007 11.5312 12.0007C11.6512 12.0007 11.7712 11.955 11.8627 11.8635C12.0458 11.6804 12.0458 11.3836 11.8627 11.2005L6.66295 6.00077Z" fill="#001A34"/></svg>
                                                         </div>
                                                          <div class="bought_firework_today_swiper_img_video_wrapper">
                                                        <div class="fireworks_main_types_catalogue_item_img">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/item1.png" alt="">
                                                        </div>
                                               </div>
                                                          <div class="fireworks_main_types_catalogue_item_details_wrapper">
                                                   <a href="" class="fireworks_main_types_catalogue_item_details_link">Фейерверк + фонтан GW218-89
                                                    Балет / BALET (0,8" х 11)
                                                  </a>
                                                 <div class="fireworks_main_types_catalogue_item_details_sale_icons_wrapper">
                                                         
                                                         <div class="fireworks_main_types_catalogue_item_details_icons_wrapper">
                                                            <div class="fireworks_main_types_catalogue_item_details_icons1">
                                                                                                                       
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
                                                                В КОРЗИНУ
                                                               </button>
                                                               <div class="fireworks_main_types_catalogue_item_details_cart_number_btns_wrapper">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_minus_btn" >
                                                                 <svg width="24" height="2" viewBox="0 0 24 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                     <line x1="1" y1="1" x2="23" y2="1" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                                                 </svg>
                                                                     
                                                                </button>
                                                               <input type="text" name="name" value="1" class="fireworks_main_types_catalogue_item_details_cart_number">
                                                                <button class="fireworks_main_types_catalogue_item_details_cart_number_add_btn cart_plus_btn">
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
                                               
                                              </div>
                                          </div>
                                          <div class="favorites_swiper_btns_wrapper">
                                                  <!-- If we need navigation buttons -->
                                               <div class="swiper-button-prev swiper-btn-prev3"></div>
                                                 <div class="swiper-button-next swiper-btn-next3"></div>
                                          </div>
                                          
                                     </div>
                               </div>
                                     
                                </div>
                                 <div class="favorites_item_info_items_wrapper">
                                <div class="favorites_items_info_item color_box">
                                     <p class="favorites_items_info_title">Цена</p>
                                      <p class="favorites_items_info">499.00</p>
                                       <p class="favorites_items_info">599.00</p>
                                       <p class="favorites_items_info">599.00</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                    <p class="favorites_items_info_title">Калибр</p>
                                      <p class="favorites_items_info special_item">0.7”</p>
                                     <p class="favorites_items_info special_item">0.8”</p>
                                        <p class="favorites_items_info special_item">0.8”</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                        <p class="favorites_items_info_title">Залпов</p>
                                        <p class="favorites_items_info special_item2">8</p>
                                        <p class="favorites_items_info special_item2">7</p>
                                         <p class="favorites_items_info special_item2">7</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                        <p class="favorites_items_info_title">Время</p>
                                        <p class="favorites_items_info special_item3">~15с</p>
                                        <p class="favorites_items_info special_item3">~15с</p>
                                        <p class="favorites_items_info special_item3">~15с</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                          <p class="favorites_items_info_title">Высота</p>
                                        <p class="favorites_items_info special_item3">35м</p>
                                         <p class="favorites_items_info special_item3">15м</p>
                                       <p class="favorites_items_info special_item3">15м</p>
                                </div>
                                <div class="favorites_items_info_item border_box">
                                         <p class="favorites_items_info_title">Цвета</p>
                                         <p class="favorites_items_info"></p>
                                         <p class="favorites_items_info special_item4">Нет данных</p>
                                         <p class="favorites_items_info special_item4">Нет данных</p>
                                </div>
                                <div class="favorites_items_info_item ">
                                         <p class="favorites_items_info_title">Цвета</p>
                                         <p class="favorites_items_info special_item4">Нет данных</p>
                                         <p class="favorites_items_info special_item4">Нет данных</p>
                                         <p class="favorites_items_info special_item4">Нет данных</p>
                                </div>
                                 <div class="favorites_items_info_item color_box">
                                         <p class="favorites_items_info_title">Вес</p>
                                         <p class="favorites_items_info special_item6">0.440кг</p>
                                         <p class="favorites_items_info special_item6">0.440кг</p>
                                          <p class="favorites_items_info special_item6">0.440кг</p>
                                </div>
                                 <div class="favorites_items_info_item color_box">
                                          <p class="favorites_items_info_title">Производитель</p>
                                        <p class="favorites_items_info special_item7">СЛК</p>
                                         <p class="favorites_items_info special_item7">СЛК</p>
                                          <p class="favorites_items_info special_item7">СЛК</p>
                                </div>
                            </div>
                           </div>
                            <div class="mobile_favorites_items_info_items_wrapper">
                                <div class="favorites_items_info_item color_box">
                                    <p class="favorites_items_info">499.00</p>
                                     <p class="favorites_items_info_title">Цена</p>
                                     <p class="favorites_items_info favorites_items_info_last">599.00</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                    <p class="favorites_items_info special_item">0.7”</p>
                                     <p class="favorites_items_info_title">Калибр</p>
                                     <p class="favorites_items_info favorites_items_info_last">0.8”</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                    <p class="favorites_items_info special_item2">8</p>
                                     <p class="favorites_items_info_title">Залпов</p>
                                     <p class="favorites_items_info special_item2 favorites_items_info_last">7</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                     <p class="favorites_items_info special_item3">~15с</p>
                                     <p class="favorites_items_info_title">Время</p>
                                     <p class="favorites_items_info special_item3 favorites_items_info_last">~15с</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                    <p class="favorites_items_info special_item3">35м</p>
                                     <p class="favorites_items_info_title">Высота</p>
                                     <p class="favorites_items_info special_item3 favorites_items_info_last">15м</p>
                                </div>
                                <div class="favorites_items_info_item border_box">
                                    <p class="favorites_items_info special_item4">Нет данных</p>
                                     <p class="favorites_items_info_title">Цвета</p>
                                     <p class="favorites_items_info special_item4 favorites_items_info_last">Нет данных</p>
                                </div>
                                <div class="favorites_items_info_item">
                                    <p class="favorites_items_info special_item5">Нет данных</p>
                                     <p class="favorites_items_info_title">Эффекты</p>
                                     <p class="favorites_items_info special_item5 favorites_items_info_last">Нет данных</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                     <p class="favorites_items_info special_item6">0.440кг</p>
                                     <p class="favorites_items_info_title">Вес</p>
                                     <p class="favorites_items_info special_item6 favorites_items_info_last">0.440кг</p>
                                </div>
                                <div class="favorites_items_info_item color_box">
                                     <p class="favorites_items_info special_item7">СЛК</p>
                                     <p class="favorites_items_info_title">Производитель</p>
                                     <p class="favorites_items_info special_item7 favorites_items_info_last">СЛК</p>
                                </div>
                           </div>
                            
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