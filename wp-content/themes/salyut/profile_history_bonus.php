<?php
 session_start();
/*
    Template name: my account
*/
if(!is_user_logged_in())
{ 
    header("Location:/авторизация/");
    exit;
}

$user_data =get_user();
//  echo "<pre>";
//  print_r($user_data[1]);die;

get_header();
?>
           <main>
                 
                 <section  class="user_profile">
                      <div class="user_profile_wrapper">
                           <div class="user_profile_links_wrapper">
                                 <a href="" class="user_profile_link">Главная
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="8" viewBox="0 0 5 8"><g><g><image width="5" height="8" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAICAYAAAAx8TU7AAAAAXNSR0IArs4c6QAAAEFJREFUGFd1zkEKgCAARNHnITxnhGu9T7iou3ShEBRMapb/M8wEXMi49QREHNiGaLDlJQacRVphxf5b/xw6UeZLD5jhDmsnOPBMAAAAAElFTkSuQmCC"/></g></g></svg>
                                 </a>
                                 <a href="" class="user_profile_link">Личный профиль</a>
                           </div>
                           <div class="user_profile_items_wrapper">
                               <div class="user_profile_titles_wrapper">
                                   <p class="user_profile_title open" id="user_profile_title_first_title" data-id="open_user_div1">Личный профиль</p>
                                   <p class="user_profile_title" data-id="open_user_div2">Бонусы</p>
                                   <p class="user_profile_title" data-id="open_user_div3">История заказов</p>
                                   <div class="user_profile_logout_btn_svg_wrapper" id="desktop_btn">
                                       <div class="user_profile_logout_svg">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9" height="9" viewBox="0 0 9 9"><g><g><image width="9" height="9" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAAAXNSR0IArs4c6QAAAFlJREFUKFOV0LENgDAMRNHHLgwDO1AzB3NQswNUTMIwyEWiEIrASZZs6+t0docTMy5v9Vg7RLNhqsC8DyhUg485QSW4ICo7l1CAA3aMOFLEX07NTJ+ua/7pBs4tG84RhS7XAAAAAElFTkSuQmCC"/></g></g></svg>
                                         </div>
                                         <form   action="<?php echo  admin_url('admin-post.php'); ?>" method="post">
                                            <input type="hidden" name="action" value="logout_action">
                                              
                                                    <button type="submit" class="user_profile_logout_btn">
                                                            Выход
                                                    </button>
                                         </form>
                                   </div>
                               </div>
                               <div class="user_profile_item open " id="open_user_div1" >
                                   <form class="user_profile_personal_data_form" action="<?php echo  admin_url('admin-post.php'); ?>" method="post">
                                      <input type="hidden" name="action" value="change_info">
                                         <div class="user_profile_personal_data_form_input_fields_wrapper">
                                              <div class="user_profile_personal_data_form_input_field">
                                                   <input type="text" placeholder="Имя" class="user_personal_data_input_field" name="name" value="<?php echo isset($user_data[1]['first_name'][0])  ?  $user_data[1]['first_name'][0] : "" ?>">
                                              </div>
                                              <div class="user_profile_personal_data_form_input_field">
                                                   <input type="text" placeholder="Фамилия" class="user_personal_data_input_field" name="surname" value="<?php echo isset($user_data[1]['surname'][0])  ?  $user_data[1]['surname'][0] : "" ?>">
                                              </div>
                                              <div class="user_profile_personal_data_form_input_field">
                                              <?php  if(isset($_SESSION['error']['email'])): ?>
                                                    <div class="alert-errors"><?php echo $_SESSION['error']['email']; ?></div>
                                                <?php endif; ?>
                                                <?php if(isset($_SESSION['error']['email_exist'])): ?>
                                                    <div class="alert-errors"><?php echo $_SESSION['error']['email_exist']; ?></div>
                                                <?php endif; ?>
                                                   <input type="text" placeholder="E-mail" class="user_personal_data_input_field" id="user_personal_data_input_mail" name="email" value="<?php echo isset($user_data[0]->data->user_email)  ?  $user_data[0]->data->user_email : "" ?>">
                                              </div>
                                              <div class="user_profile_personal_data_form_input_field">
                                              <?php  if(isset($_SESSION['error']['phone'])): ?>
                                                    <div class="alert-errors"><?php echo $_SESSION['error']['phone']; ?></div>
                                                <?php endif; ?>
                                                <?php if(isset($_SESSION['error']['phone_exist'])): ?>
                                                    <div class="alert-errors"><?php echo $_SESSION['error']['phone_exist']; ?></div>
                                                <?php endif; ?>
                                                   <input type="text" placeholder="+7 (___)___-__-__" class="user_personal_data_input_field" id="user_personal_data_input_phone" name="phone" value="<?php echo isset($user_data[1]['user_phone'][0])  ?  $user_data[1]['user_phone'][0] : "" ?>" >
                                              </div>
                                         </div>
                                         <div class="user_profile_personal_data_form_btn_wrapper">
                                             <button type="submit" class="user_profile_personal_data_form_btn" type="button" > <span>Сохранить</span></button>
                                         </div>
                                   </form>
                                   <form class="user_profile_password_info_form" >
                                        <h2 class="user_profile_password_info_form_title">Изменить пароль</h2>
                                        <div class="user_profile_password_info_form_input_fields_wrapper">
                                             <div class="user_profile_password_info_form_input_field">
                                             
                                                 <input type="text" class="user_profile_password_info_input user_chenge_password_input" placeholder="Новый пароль" name="password">
                                             </div>
                                             <div class="user_profile_password_info_form_input_field">
                                                 <input type="text" class="user_profile_password_info_input user_chenge_conpassword_input" placeholder="Повторите пароль" name="conpassword">
                                             </div>
                                        </div>
                                        <div class="user_profile_password_info_form_btn_wrapper">
                                             <div class="alert-error alert-error-empty_password"></div>
                                             <div class="alert-error alert-error-password_mismatch"></div>
                                             <button class="user_profile_password_info_form_btn user_chenge_password_button" type="button"><span>Сохранить</span></button>
                                        </div>
                                        <div class="password_changed_successfully_wrapper" >
                                            <div class="password_changed_successfully_svg">
                                                <img src="<?php echo get_template_directory_uri();?>/images/btn_sign.png">
                                            </div>
                                            <p class="password_changed_successfully_text">Пароль успешно изменен</p>
                                        </div>
                                   </form>
                               </div>
                               <div class="user_profile_item" id="open_user_div2">
                                   <div class="user_profile_item_bonus_wrapper">
                                       <h1 class="user_profile_item_bonus_title">Ваша постоянная скидка</h1>
                                       <div class="user_profile_item_bonus_items_wrapper">
                                             <div class="user_profile_item_bonus_item" id="user_profile_item_bonus_item_first">
                                                 <div class="user_profile_item_bonus_img_wrapper">
                                                     <div class="user_profile_item_bonus_img">
                                                         <img src="<?php echo get_template_directory_uri(); ?>/images/bonus_cart.png">
                                                        
                                                     </div>
                                                      <div class="user_profile_item_bonus_info_wrapper">
                                                          <div class="user_profile_item_bonus_info_title">
                                                              <p class="user_profile_item_bonus_info1">ЛОГО</p>
                                                              <p class="user_profile_item_bonus_info2">активна</p>
                                                          </div>
                                                           <div  class="user_profile_item_bonus_discount_wrapper">
                                                               <p class="user_profile_item_bonus_discount_title">скидка</p>
                                                               
                                                                  <?php 
                          
                                                                $customer = wp_get_current_user();
                                                                $customer_orders = get_posts(array(
                                                                    'numberposts' => -1,
                                                                    'meta_key' => '_customer_user',
                                                                    'orderby' => 'date',
                                                                    'order' => 'DESC',
                                                                    'meta_value' => get_current_user_id(),
                                                                    'post_type' => wc_get_order_types(),
                                                                    'post_status' => array_keys(wc_get_order_statuses()), 'post_status' => array('wc-processing'),
                                                                ));
                                                               
                    
                                                                $Order_Array = []; //
                                                                foreach ($customer_orders as $customer_order) {
                                                                     
                                                                    $order = wc_get_order($customer_order);
                    
                                                                    $ord_items = [];
                    
                                                                    foreach ($order->get_items() as $key => $item) {
                                                                        
                                                                        $total = $item['total'];
                                                                      
                                                                        $ord_items[] = [
                                                                            
                                                                            'total'   => $total
                    
                                                                        ];
                    
                                                                    }
                    
                                                                    $Order_Array[] = $ord_items;
                                                                    
                                                                }
                                                            $total_price = "";
                                                            foreach( $Order_Array as $order_arrays){
                      
                                                                foreach($order_arrays as $order_array){
                                                                    $total_price = (int)$total_price + (int)$order_array["total"];
                                                                    
                                             
                                                                 }
                                                              
                                                            }
                                                              
                                                              if ($total_price >= 5000) {
                                                                    $skidka = 5;
                                                                } elseif ($total_price >=10000) {
                                                                    $skidka = 7;
                                                                }
                                                                elseif ($total_price >=15000) {
                                                                    $skidka = 10;
                                                                }
                                                                elseif ($total_price >=50000) {
                                                                    $skidka = 15;
                                                                }
                                                                elseif ($total_price >=100000) {
                                                                    $skidka = 20;
                                                                }
                                                                
                                                                else {
                                                                    $skidka = 0;
                                                                }
                                                            ?>
                                                               
                                                               <p class="user_profile_item_bonus_discount_num"><?= $skidka?>%</p>
                                                           </div>
                                                     </div>
                                                      
                                                      
                                                 </div>
                                                 
                                             </div>
                                             <div class="user_profile_item_bonus_item">
                                                 <p class="user_profile_item_bonus_text">Скидки и промокод 
                                                  не суммируются</p>
                                             </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="user_profile_item" id="open_user_div3">
                                   <div class="user_profile_history_of_orders_wrapper">
                                       <div class="user_profile_history_of_orders_titles_wrapper">
                                           <p class="user_profile_history_of_orders_title"></p>
                                           <p class="user_profile_history_of_orders_title">Наименование</p>
                                           <p class="user_profile_history_of_orders_title">Артикул</p>
                                           <p class="user_profile_history_of_orders_title">Количество</p>
                                           <p class="user_profile_history_of_orders_title">Цена</p>
                                       </div>
                                       <div class="user_profile_history_of_orders_items_wrapper">
                                          
                                        <?php 
                          
                                            $customer = wp_get_current_user();
                                            $customer_orders = get_posts(array(
                                                'numberposts' => -1,
                                                'meta_key' => '_customer_user',
                                                'orderby' => 'date',
                                                'order' => 'DESC',
                                                'meta_value' => get_current_user_id(),
                                                'post_type' => wc_get_order_types(),
                                                'post_status' => array_keys(wc_get_order_statuses()), 'post_status' => array('wc-processing'),
                                            ));
                                           

                                            $Order_Array = []; //
                                            foreach ($customer_orders as $customer_order) {
                                                 
                                                $order = wc_get_order($customer_order);

                                                $ord_items = [];

                                                foreach ($order->get_items() as $key => $item) {
                                                    
                                                    
                                                    $total = $item['total'];
                                                    $product_id = $item['product_id'];
                                                    $product = wc_get_product( $product_id );
                                                    $image_id  = $product->get_image_id();
                                                    $image_url = wp_get_attachment_image_url( $image_id, 'full' );
                                                    $item_quantity  = $item->get_quantity();
                                                    $product_name   = $item->get_name();
                                                   
                                                    $ord_items[] = [
                                                        
                                                        'product_id' => $item['product_id'],
                                                        'quantity'=> $item_quantity,
                                                        'image_id' => $image_url,
                                                        'product_name' => $product_name,
                                                        'product'   => $product_item,
                                                        'total'   => $total

                                                    ];

                                                }

                                                $Order_Array[] = $ord_items;
                                                
                                            }

                                        foreach( $Order_Array as $order_arrays){
  
                                            foreach($order_arrays as $order_array):
                                               
                         
                                                $_product = wc_get_product( $order_array["product_id"]);
                                        ?>

                                                <div class="user_profile_history_of_orders_item_line"></div>
                                                <div class="user_profile_history_of_orders_item">
                                                    
                                                    <div class="user_profile_history_of_orders_item_img">
                                                        <img src="<?php echo $order_array['image_id']; ?>"> 
                                                    </div>
                                                    <a href="<?php echo $_product->get_permalink()?>" class="user_profile_history_of_orders_item_link"><?php   echo $order_array['product_name']; ?></a>
                                                    <p class="user_profile_history_of_orders_item_vendor_code"> <?php  echo $_product->get_attribute( 'артикул' );?></p>
                                            
                                            
                                                    <p class="user_profile_history_of_orders_item_quantity"><?php  echo $order_array['quantity'];?> шт</p>
                                                    <p class="user_profile_history_of_orders_item_price"><?php echo  $_product->get_price(); ?> ₽</p>
                                            
                                                </div>
                                            
                                            <?php endforeach; }?>
      
                                               <div class="user_profile_history_of_orders_item_line"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="user_profile_logout_btn_svg_wrapper" id="mobile_btn">
                                       <div class="user_profile_logout_svg">
                                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9" height="9" viewBox="0 0 9 9"><g><g><image width="9" height="9" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAkAAAAJCAYAAADgkQYQAAAAAXNSR0IArs4c6QAAAFlJREFUKFOV0LENgDAMRNHHLgwDO1AzB3NQswNUTMIwyEWiEIrASZZs6+t0docTMy5v9Vg7RLNhqsC8DyhUg485QSW4ICo7l1CAA3aMOFLEX07NTJ+ua/7pBs4tG84RhS7XAAAAAElFTkSuQmCC"/></g></g></svg>
                                         </div>
                                       <button class="user_profile_logout_btn">
                                             Выход
                                       </button>
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
         
<?php
   get_footer();
?>
