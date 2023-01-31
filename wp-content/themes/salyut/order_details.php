<?php
/*
    Template name: order_details
*/
// session_start();

get_header();
  /**
         * Checkout Form
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see https://docs.woocommerce.com/document/template-structure/
         * @package WooCommerce\Templates
         * @version 3.5.0
         */
        $checkout= WC()->checkout();
        if ( ! defined( 'ABSPATH' ) ) {
            exit;
        }

$user_data =get_user();

$fields = WC()->checkout()->checkout_fields;
//  echo "<pre>";

//  print_r($fields);die;


?>
           <main>
           <?php 
          
           
       
           
           
           foreach ( $fields['billing'] as $key => $field ) : 
            
            
           
            ?>
      
<?php //woocommerce_form_field( "billing_first_name", $field ); ?>

<?php endforeach; ?>

                 
                 <section class="ordering_details">
                     
                    
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
       
      
      
        
        do_action( 'woocommerce_before_checkout_form', $checkout );
        
        // If checkout registration is disabled and not logged in, the user cannot checkout.
        if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
            echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
            return;
        }
        
        ?>
        
        <form name="checkout" method="post" class="checkout woocommerce-checkout ordering_details_wrapper" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        
            <?php if ( $checkout->get_checkout_fields() ) : ?>
        
                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
        
                <div  class="ordering_details_contact_information_wrapper">
                              <h1 class="ordering_details_contact_information_title">Контактная информация</h1>
                              <div class="ordering_details_contact_information_inputs_wrapper">
                                  <div class="ordering_details_contact_information_input">
                                  <?php woocommerce_form_field( "billing_first_name", $fields['billing']['billing_first_name']); ?>
                                      <!-- <input  type="text" class="ordering_details_contact_information_input_field" placeholder="Имя" id="name_input" name="name" value="<?php echo isset($user_data[1]['first_name'][0])  ?  $user_data[1]['first_name'][0] : "" ?>"> -->
                                  </div>
                                  <div class="ordering_details_contact_information_input">
                                  <?php woocommerce_form_field( "billing_phone", $fields['billing']['billing_phone']); ?>
                                      <!-- <input  type="text" class="ordering_details_contact_information_input_field" placeholder="Телефон" id="phone_input"  name="phone" value="<?php echo isset($user_data[1]['user_phone'][0])  ?  $user_data[1]['user_phone'][0] : "" ?>"> -->
                                  </div>
                                  <div class="ordering_details_contact_information_input">
                                  <?php woocommerce_form_field( "billing_email", $fields['billing']['billing_email']); ?>
                                      <!-- <input  type="text" class="ordering_details_contact_information_input_field" placeholder="E-mail" id="email_input" name="email" value="<?php echo isset($user_data[0]->data->user_email)  ?  $user_data[0]->data->user_email : "" ?>"> -->
                                  </div>
                              </div>
                                
                              </div>
                              <div class="ordering_details_delivery_wrapper">
                                     <h1 class="ordering_delivery_title">Доставка</h1>
                                     <div class="ordering_details_enter_delivery_address_wrapper">
                                         <h2  class="ordering_details_enter_delivery_address_title">Введите адрес доставки</h2>
                                         <div class="ordering_details_enter_delivery_address_input_field_wrapper delivery_second_input">
                                             <?php woocommerce_form_field( "shipping_city", $fields['shipping']['shipping_city']); ?>
                                             <!-- <input  type="text"  placeholder="Город" class="ordering_details_enter_delivery_address_input_field  delivery_second_input"  name="city" > -->
                                         </div>
                                         <div class="ordering_details_enter_delivery_address_input_field_wrapper delivery_second_input" >
                                         <?php woocommerce_form_field( "shipping_address_1", $fields['shipping']['shipping_address_1']); ?>
                                             <!-- <input type="text"  placeholder="Улица, дом" class="ordering_details_enter_delivery_address_input_field delivery_second_input" name="street"> -->
                                         </div>
                                         <div class="ordering_details_enter_delivery_address_input_field_wrapper  ">
                                                <?php woocommerce_form_field( "shipping_address_2", $fields['shipping']['shipping_address_2']); ?>
                                              <!-- <input type="text"  placeholder="Квартира/офис" class="ordering_details_enter_delivery_address_input_field  delivery_second_input" name="apartment_office"> -->
                                         </div>
                                         <div class="ordering_details_enter_delivery_address_input_fields_three_wrapper">
                                              <div class="ordering_details_enter_delivery_address_input_field_wrapper delivery_input">
                                                 <?php woocommerce_form_field( "billing_podezd", $fields['billing']['billing_podezd']); ?>
                                                  <!-- <input  type="text" placeholder="подъезд" class="ordering_details_enter_delivery_address_input_field delivery_input " name="entrance"> -->
                                              </div>
                                              <div class="ordering_details_enter_delivery_address_input_field_wrapper delivery_input">
                                              <?php woocommerce_form_field( "billing_etaj", $fields['billing']['billing_etaj']); ?>
                                                  <!-- <input type="text"  placeholder="этаж" class="ordering_details_enter_delivery_address_input_field delivery_input"  name="floor"> -->
                                              </div>
                                              <div class="ordering_details_enter_delivery_address_input_field_wrapper delivery_input">
                                              <?php woocommerce_form_field( "billing_domofon", $fields['billing']['billing_domofon']); ?>
                                                  <!-- <input type="text"  placeholder="домофон" class="ordering_details_enter_delivery_address_input_field delivery_input" name="intercom"> -->
                                              </div>
                                         </div>
                                          <div class="ordering_details_enter_delivery_address_input_field_wrapper delivery_second_input">
                                          <?php woocommerce_form_field( "billing_coment", $fields['billing']['billing_coment']); ?>
                                               <!-- <input placeholder="Комментарий к заказу" class="ordering_details_enter_delivery_address_input_field delivery_second_input" name="comment"> -->
                                          </div>
                                          <div class="ordering_details_hour_date_icons_info_main_wrapper">
                                              <div  class="ordering_details_hour_date_icons_info_wrapper date">
                                                  <div  class="ordering_details_date_icon">
                                                      <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4067 34.1313H27.5313C28.515 34.1313 29.3155 33.3309 29.3155 32.3471V27.2226C29.3155 26.2388 28.515 25.4384 27.5313 25.4384H22.4067C21.423 25.4384 20.6226 26.2388 20.6226 27.2226V32.3471C20.6226 33.3309 21.423 34.1313 22.4067 34.1313ZM22.4683 27.2841H27.4697V32.2856H22.4683V27.2841Z" fill="#F91155"/><path d="M35.4678 34.1313H40.5923C41.5761 34.1313 42.3765 33.3309 42.3765 32.3471V27.2226C42.3765 26.2388 41.5761 25.4384 40.5923 25.4384H35.4678C34.484 25.4384 33.6836 26.2388 33.6836 27.2226V32.3471C33.6836 33.3309 34.484 34.1313 35.4678 34.1313ZM35.5293 27.2841H40.5308V32.2856H35.5293V27.2841Z" fill="#F91155"/><path d="M48.5283 34.1313H53.6529C54.6366 34.1313 55.437 33.3309 55.437 32.3471V27.2226C55.437 26.2388 54.6366 25.4384 53.6529 25.4384H48.5283C47.5446 25.4384 46.7441 26.2388 46.7441 27.2226V32.3471C46.7441 33.3309 47.5446 34.1313 48.5283 34.1313ZM48.5898 27.2841H53.5913V32.2856H48.5898V27.2841Z" fill="#F91155"/><path d="M7.56396 55.1987C7.56396 56.1825 8.36439 56.9829 9.34814 56.9829H14.4727C15.4564 56.9829 16.2569 56.1825 16.2569 55.1987V50.074C16.2569 49.0903 15.4564 48.2899 14.4727 48.2899H9.34814C8.36439 48.2899 7.56396 49.0903 7.56396 50.074V55.1987ZM9.40967 50.1356H14.4112V55.1372H9.40967V50.1356Z" fill="#F91155"/><path d="M20.6226 55.1987C20.6226 56.1825 21.423 56.9829 22.4067 56.9829H27.5313C28.515 56.9829 29.3155 56.1825 29.3155 55.1987V50.074C29.3155 49.0903 28.515 48.2899 27.5313 48.2899H22.4067C21.423 48.2899 20.6226 49.0903 20.6226 50.074V55.1987ZM22.4683 50.1356H27.4697V55.1372H22.4683V50.1356Z" fill="#F91155"/><path d="M33.6836 55.1987C33.6836 56.1825 34.484 56.9829 35.4678 56.9829H40.5923C41.5761 56.9829 42.3765 56.1825 42.3765 55.1987V50.074C42.3765 49.0903 41.5761 48.2899 40.5923 48.2899H35.4678C34.484 48.2899 33.6836 49.0903 33.6836 50.074V55.1987ZM35.5293 50.1356H40.5308V55.1372H35.5293V50.1356Z" fill="#F91155"/><path d="M46.7441 55.1987C46.7441 56.1825 47.5446 56.9829 48.5283 56.9829H53.6529C54.6366 56.9829 55.437 56.1825 55.437 55.1987V50.074C55.437 49.0903 54.6366 48.2899 53.6529 48.2899H48.5283C47.5446 48.2899 46.7441 49.0903 46.7441 50.074V55.1987ZM48.5898 50.1356H53.5913V55.1372H48.5898V50.1356Z" fill="#F91155"/><path d="M9.34814 45.557H14.4727C15.4564 45.557 16.2569 44.7566 16.2569 43.7729V38.6482C16.2569 37.6644 15.4564 36.864 14.4727 36.864H9.34814C8.36439 36.864 7.56396 37.6644 7.56396 38.6482V43.7729C7.56396 44.7566 8.36439 45.557 9.34814 45.557ZM9.40967 38.7097H14.4112V43.7113H9.40967V38.7097Z" fill="#F91155"/><path d="M20.6226 43.7729C20.6226 44.7566 21.423 45.557 22.4067 45.557H27.5313C28.515 45.557 29.3155 44.7566 29.3155 43.7729V38.6482C29.3155 37.6644 28.515 36.864 27.5313 36.864H22.4067C21.423 36.864 20.6226 37.6644 20.6226 38.6482V43.7729ZM22.4683 38.7097H27.4697V43.7113H22.4683V38.7097Z" fill="#F91155"/><path d="M33.6836 43.7729C33.6836 44.7566 34.484 45.557 35.4678 45.557H40.5923C41.5761 45.557 42.3765 44.7566 42.3765 43.7729V38.6482C42.3765 37.6644 41.5761 36.864 40.5923 36.864H35.4678C34.484 36.864 33.6836 37.6644 33.6836 38.6482V43.7729ZM35.5293 38.7097H40.5308V43.7113H35.5293V38.7097Z" fill="#F91155"/><path d="M46.7441 43.7729C46.7441 44.7566 47.5446 45.557 48.5283 45.557H53.6529C54.6366 45.557 55.437 44.7566 55.437 43.7729V38.6482C55.437 37.6644 54.6366 36.864 53.6529 36.864H48.5283C47.5446 36.864 46.7441 37.6644 46.7441 38.6482V43.7729ZM48.5898 38.7097H53.5913V43.7113H48.5898V38.7097Z" fill="#F91155"/><path d="M62.0771 14.4477C62.5869 14.4477 63 14.0345 63 13.5249V11.464C63 8.91959 60.9301 6.84969 58.3857 6.84969H55.572V1.96645C55.572 1.14216 54.9014 0.471558 54.0771 0.471558H49.9302C49.1059 0.471558 48.4353 1.14216 48.4353 1.96645V6.84969H41.903V1.96645C41.903 1.14216 41.2324 0.471558 40.4082 0.471558H36.2612C35.437 0.471558 34.7664 1.14216 34.7664 1.96645V6.84969H28.2341V1.96645C28.2341 1.14216 27.5635 0.471558 26.7393 0.471558H22.5923C21.7681 0.471558 21.0975 1.14216 21.0975 1.96645V6.84969H14.5652V1.96645C14.5652 1.14216 13.8946 0.471558 13.0703 0.471558H8.92299C8.0987 0.471558 7.42809 1.14216 7.42809 1.96645V6.84969H4.61426C2.06989 6.84969 0 8.91971 0 11.464V46.1192C0 46.6289 0.413068 47.0421 0.922852 47.0421C1.43263 47.0421 1.8457 46.6289 1.8457 46.1192V21.7384H61.1543V57.9141C61.1543 59.4408 59.9123 60.6827 58.3857 60.6827H4.61426C3.08774 60.6827 1.8457 59.4408 1.8457 57.9141V50.4259C1.8457 49.9162 1.43263 49.503 0.922852 49.503C0.413068 49.503 0 49.9162 0 50.4259V57.9141C0 60.4585 2.06989 62.5284 4.61426 62.5284H58.3857C60.9301 62.5284 63 60.4585 63 57.9141C63 56.4306 63 19.1814 63 17.8314C63 17.3217 62.5869 16.9085 62.0771 16.9085C61.5674 16.9085 61.1543 17.3217 61.1543 17.8314V19.8927H1.8457V11.464C1.8457 9.93731 3.08774 8.6954 4.61426 8.6954H7.42797V11.6688C7.42797 13.6363 9.02869 15.2372 10.9963 15.2372C12.964 15.2372 10.9963 15.2372 10.9963 15.2372C12.964 15.2372 14.5647 13.6363 14.5647 11.6688V8.6954H21.097V11.6688C21.097 13.6365 22.6978 15.2372 24.6654 15.2372C26.6329 15.2372 28.2337 13.6365 28.2337 11.6688V8.6954H34.766V11.6688C34.766 13.6359 36.3677 15.2372 38.3344 15.2372C40.3019 15.2372 41.9028 13.6365 41.9028 11.6688V8.6954H48.4351V11.6688C48.4351 13.6365 50.0359 15.2372 52.0035 15.2372C53.9711 15.2372 55.5719 13.6365 55.5719 11.6688V8.6954H58.3857C59.9123 8.6954 61.1543 9.93731 61.1543 11.464V13.5247C61.1543 14.0345 61.5674 14.4477 62.0771 14.4477ZM9.27367 2.31738H12.7191V11.6689C12.7191 12.6189 11.9463 13.3916 10.9963 13.3916C10.0464 13.3916 9.27367 12.6189 9.27367 11.6689C9.27367 9.9522 9.27367 4.07363 9.27367 2.31738ZM26.3881 11.6689C26.3881 12.6189 25.6154 13.3916 24.6655 13.3916C23.7156 13.3916 22.9428 12.6189 22.9428 11.6689C22.9428 9.9522 22.9428 4.07376 22.9428 2.31738H26.3881V11.6689ZM40.0572 11.6689C40.0572 12.6189 39.2844 13.3916 38.3345 13.3916C37.3824 13.3916 36.6119 12.616 36.6119 11.6689C36.6119 5.34151 36.6119 8.8289 36.6119 2.31738H40.0572V11.6689ZM53.7263 11.6689C53.7263 12.6189 52.9536 13.3916 52.0037 13.3916C51.0537 13.3916 50.281 12.6189 50.281 11.6689C50.281 10.771 50.2809 6.14168 50.2809 2.31738H53.7263V11.6689Z" fill="#F91155"/></g><defs><clipPath id="clip0"><rect width="63" height="63" fill="white"/></clipPath></defs></svg>
                                                  </div>
                                                  <p class="ordering_details_date_icon_info">31 окт</p>
                                              </div>
                                              <div  class="ordering_details_hour_date_icons_info_wrapper">
                                                  <div class="ordering_details_hour_icon">
                                                      <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.4999 10.2718C32.2532 10.2718 32.8695 9.65545 32.8695 8.90219V8.2174C32.8695 7.46414 32.2532 6.84784 31.4999 6.84784C30.7467 6.84784 30.1304 7.46414 30.1304 8.2174V8.90219C30.1304 9.65545 30.7467 10.2718 31.4999 10.2718Z" fill="#F91155"/><path d="M31.4999 52.7283C30.7467 52.7283 30.1304 53.3446 30.1304 54.0978V54.7826C30.1304 55.5359 30.7467 56.1522 31.4999 56.1522C32.2532 56.1522 32.8695 55.5359 32.8695 54.7826V54.0978C32.8695 53.3446 32.2532 52.7283 31.4999 52.7283Z" fill="#F91155"/><path d="M8.902 30.1304H8.21722C7.46396 30.1304 6.84766 30.7467 6.84766 31.5C6.84766 32.2533 7.46396 32.8696 8.21722 32.8696H8.902C9.65527 32.8696 10.2716 32.2533 10.2716 31.5C10.2716 30.7467 9.65527 30.1304 8.902 30.1304Z" fill="#F91155"/><path d="M54.7829 30.1304H54.0981C53.3448 30.1304 52.7285 30.7467 52.7285 31.5C52.7285 32.2533 53.3448 32.8696 54.0981 32.8696H54.7829C55.5361 32.8696 56.1524 32.2533 56.1524 31.5C56.1524 30.7467 55.5361 30.1304 54.7829 30.1304Z" fill="#F91155"/><path d="M16.0241 14.1065C15.4762 13.5587 14.6545 13.5587 14.1067 14.1065C13.5588 14.6544 13.5588 15.4761 14.1067 16.0239L14.586 16.5033C14.8599 16.7772 15.2023 16.9142 15.5447 16.9142C15.8871 16.9142 16.2295 16.7772 16.5034 16.5033C17.0512 15.9555 17.0512 15.1337 16.5034 14.5859L16.0241 14.1065Z" fill="#F91155"/><path d="M14.586 46.4967L14.1067 46.9761C13.5588 47.5239 13.5588 48.3457 14.1067 48.8935C14.3806 49.1674 14.723 49.3044 15.0654 49.3044C15.4078 49.3044 15.7501 49.1674 16.0241 48.8935L16.5034 48.4141C17.0512 47.8663 17.0512 47.0446 16.5034 46.4967C15.9556 45.9489 15.1338 45.9489 14.586 46.4967Z" fill="#F91155"/><path d="M46.9762 14.1065L46.4968 14.5859C45.949 15.1337 45.949 15.9555 46.4968 16.5033C46.7707 16.7772 47.1131 16.9142 47.4555 16.9142C47.7979 16.9142 48.1403 16.7772 48.4142 16.5033L48.8935 16.0239C49.4414 15.4761 49.4414 14.6544 48.8935 14.1065C48.3457 13.5587 47.524 13.5587 46.9762 14.1065Z" fill="#F91155"/><path d="M32.8695 30.9522V18.4891C32.8695 17.7359 32.2532 17.1196 31.4999 17.1196C30.7467 17.1196 30.1304 17.7359 30.1304 18.4891V31.5C30.1304 31.8424 30.2673 32.1848 30.5412 32.4587L45.538 47.4554C45.8119 47.7294 46.1543 47.8663 46.4967 47.8663C46.8391 47.8663 47.1815 47.7294 47.4554 47.4554C48.0032 46.9076 48.0032 46.0859 47.4554 45.538L32.8695 30.9522Z" fill="#F91155"/><path d="M31.5 0C14.1065 0 0 14.1065 0 31.5C0 48.8935 14.1065 63 31.5 63C48.8935 63 63 48.8935 63 31.5C63 14.1065 48.8935 0 31.5 0ZM31.5 60.2609C15.613 60.2609 2.73913 47.387 2.73913 31.5C2.73913 15.613 15.613 2.73913 31.5 2.73913C47.387 2.73913 60.2609 15.613 60.2609 31.5C60.2609 47.387 47.387 60.2609 31.5 60.2609Z" fill="#F91155"/></svg>
                                                  </div>
                                                  <p class="ordering_details_hour_icon_info">10:00 - 18:00</p>
                                              </div>
                                              
                                          </div>
                                          <p class="ordering_details_info">
                                               Стоимость доставки: <span>уточняйте у оператора </span> Яндекс доставка. Доставка осуществляется при 100% оплате заказа с учётом стоимости доставки. Стоимость доставки зависит от размера, веса и расстояния. Точную стоимость Вашей доставки можно узнать у оператора.
                                          </p>
                                         
                                     </div>
                             </div>
                             <div class="ordering_details_payment_wrapper">
                                  <h1 class="ordering_details_title">Оплата</h1>
                                  <p class="ordering_details_paymen_info">Выберите способ оплаты</p>
                                  <div class="ordering_details_payment_items_wrapper ">
                                      <div class="ordering_details_payment_item pay1">
                                          <input type="radio" id="radio_input1" class="ordering_details_radio_input" name="payment" hidden="">
                                          <label for="radio_input1" class="ordering_details_radio_label">
                                              <div class="ordering_details_payment_item_svg">
                                                    <img src="<?php echo get_template_directory_uri();?>/images/dollar.png">
                                              </div>
                                              <p class="ordering_details_payment_item_title">Наличными</p>
                                          </label>
                                      </div>
                                      <div class="ordering_details_payment_item pay2">
                                          <input type="radio" id="radio_input2" class="ordering_details_radio_input" name="payment" hidden="">
                                          <label for="radio_input2" class="ordering_details_radio_label">
                                              <div class="ordering_details_payment_item_svg">
                                                   <svg width="77" height="77" viewBox="0 0 77 77" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M41.0539 50.688H61.5807C62.3505 50.688 62.8636 50.1748 62.8636 49.4051V37.8587C62.8636 37.0889 62.3505 36.5758 61.5807 36.5758H41.0539C40.2841 36.5758 39.771 37.0889 39.771 37.8587V49.4051C39.7708 50.1747 40.2841 50.688 41.0539 50.688ZM42.3368 39.1416H60.2979V48.122H42.3368V39.1416Z" fill="#001A34"></path><path d="M6.41472 34.0097H16.6782C17.448 34.0097 17.9611 33.4966 17.9611 32.7268C17.9611 31.9571 17.448 31.444 16.6782 31.444H6.41472C5.64496 31.444 5.13184 31.9571 5.13184 32.7268C5.13184 33.4966 5.64496 34.0097 6.41472 34.0097Z" fill="#001A34"></path><path d="M21.8097 34.0097H32.0732C32.843 34.0097 33.3561 33.4966 33.3561 32.7268C33.3561 31.9571 32.843 31.444 32.0732 31.444H21.8097C21.04 31.444 20.5269 31.9571 20.5269 32.7268C20.5269 33.4966 21.04 34.0097 21.8097 34.0097Z" fill="#001A34"></path><path d="M6.41472 39.1416H23.0928C23.8625 39.1416 24.3757 38.6284 24.3757 37.8587C24.3757 37.0889 23.8625 36.5758 23.0928 36.5758H6.41472C5.64496 36.5758 5.13184 37.0889 5.13184 37.8587C5.13184 38.6284 5.64496 39.1416 6.41472 39.1416Z" fill="#001A34"></path><path d="M32.0731 36.5756H28.2243C27.4545 36.5756 26.9414 37.0887 26.9414 37.8584C26.9414 38.6282 27.4545 39.1413 28.2243 39.1413H32.0731C32.8428 39.1413 33.356 38.6282 33.356 37.8584C33.356 37.0887 32.8428 36.5756 32.0731 36.5756Z" fill="#001A34"></path><path d="M75.8213 20.6673C74.9233 19.5126 73.7687 18.8711 72.3574 18.7429L69.2784 18.3697V14.7657V12.1999C69.2784 9.37752 66.9691 7.06824 64.1467 7.06824H5.13168C2.30928 7.06809 0 9.37737 0 12.1999V14.7658V25.0293V53.2538C0 55.571 1.55711 57.5413 3.67635 58.1727C3.61171 60.768 5.57534 63.021 8.21087 63.2607L67.4824 69.9319C67.6106 69.9319 67.8672 69.9319 67.9955 69.9319C70.5614 69.9319 72.8707 68.0075 73.1272 65.57L76.976 24.3878C77.1042 23.1048 76.7193 21.6935 75.8213 20.6673ZM2.56592 16.0487H66.7126V19.3844V23.7463H2.56592V16.0487ZM5.13168 9.634H64.1465C65.5578 9.634 66.7124 10.7886 66.7124 12.1999V13.4828H2.56592V12.1999C2.56592 10.7886 3.72055 9.634 5.13168 9.634ZM2.56592 53.2537V26.3121H66.7126V53.2537C66.7126 54.6649 65.558 55.8196 64.1467 55.8196H5.26007H5.13183C3.72055 55.8196 2.56592 54.6649 2.56592 53.2537ZM74.41 23.8746L70.5612 65.0567C70.433 66.468 69.15 67.4942 67.7388 67.366L8.5956 60.6948C7.31272 60.5665 6.41456 59.5401 6.28632 58.3855H64.1465C66.9689 58.3855 69.2782 56.0762 69.2782 53.2538V25.0292V20.7955L72.229 21.0521C72.8705 21.0521 73.5119 21.437 73.8968 21.9502C74.2818 22.4633 74.5384 23.233 74.41 23.8746Z" fill="#001A34"></path></svg>
                                              </div>
                                              <p class="ordering_details_payment_item_title">Картой курьеру</p>
                                          </label>
                                      </div>
                                      <div class="ordering_details_payment_item pay3">
                                          <input type="radio" id="radio_input3" class="ordering_details_radio_input" name="payment" hidden="">
                                          <label for="radio_input3" class="ordering_details_radio_label">
                                              <div class="ordering_details_payment_item_svg_img_wrapper">
                                                  <div class="ordering_details_payment_item_img">
                                                      <img src="<?php echo get_template_directory_uri();?>/images/cart.png">
                                                  </div>
                                                 <div class="ordering_details_payment_item_svg">
                                                   <svg width="79" height="79" viewBox="0 0 79 79" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M28.9668 50.8485L32.9795 28.2771H39.2493L35.362 50.8485H28.9668Z" fill="#3C58BF"></path><path d="M28.9668 50.8485L34.1081 28.2771H39.2493L35.362 50.8485H28.9668Z" fill="#293688"></path><path d="M58.0588 28.5278C56.8048 28.0262 54.7984 27.5247 52.2905 27.5247C46.0207 27.5247 41.5064 30.6596 41.5064 35.1739C41.5064 38.5596 44.6413 40.3151 47.1492 41.4437C49.6572 42.5723 50.4096 43.3247 50.4096 44.3278C50.4096 45.8326 48.4032 46.585 46.6477 46.585C44.1397 46.585 42.7604 46.2088 40.6286 45.331L39.7508 44.9548L38.873 50.0961C40.3778 50.7231 43.1365 51.35 46.0207 51.35C52.6667 51.35 57.0556 48.2151 57.0556 43.4501C57.0556 40.8167 55.4254 38.8104 51.6635 37.1802C49.4064 36.0516 48.027 35.4247 48.027 34.2961C48.027 33.2929 49.1556 32.2897 51.6635 32.2897C53.7953 32.2897 55.3 32.6659 56.4286 33.1675L57.0556 33.4183L58.0588 28.5278Z" fill="#3C58BF"></path><path d="M68.8418 28.2771C67.3371 28.2771 66.2085 28.4025 65.5815 29.9073L56.1768 50.8485H62.9482L64.2021 47.0866H72.2275L72.9799 50.8485H78.9989L73.7323 28.2771H68.8418ZM65.9577 43.3247C66.3339 42.1961 68.4656 36.6787 68.4656 36.6787C68.4656 36.6787 68.9672 35.2993 69.3434 34.4215L69.7196 36.5533C69.7196 36.5533 70.9736 42.1961 71.2243 43.4501H65.9577V43.3247Z" fill="#3C58BF"></path><path d="M70.3466 28.2771C68.8418 28.2771 67.7132 28.4025 67.0863 29.9073L56.1768 50.8485H62.9482L64.2021 47.0866H72.2275L72.9799 50.8485H78.9989L73.7323 28.2771H70.3466ZM65.9577 43.3247C66.4593 42.0708 68.4656 36.6787 68.4656 36.6787C68.4656 36.6787 68.9672 35.2993 69.3434 34.4215L69.7196 36.5533C69.7196 36.5533 70.9736 42.1961 71.2243 43.4501H65.9577V43.3247Z" fill="#293688"></path><path d="M17.4302 44.0767L16.8032 40.8164C15.6746 37.0545 12.0381 32.9164 8.02539 30.91L13.6682 50.9735H20.4397L30.5968 28.4021H23.8254L17.4302 44.0767Z" fill="#3C58BF"></path><path d="M17.4302 44.0767L16.8032 40.8164C15.6746 37.0545 12.0381 32.9164 8.02539 30.91L13.6682 50.9735H20.4397L30.5968 28.4021H25.0794L17.4302 44.0767Z" fill="#293688"></path><path d="M0 28.2771L1.12857 28.5279C9.15397 30.4088 14.6714 35.1739 16.8032 40.8168L14.546 30.1581C14.1698 28.6533 13.0413 28.2771 11.6619 28.2771H0Z" fill="#FFBC00"></path><path d="M0 28.2771C8.0254 30.1581 14.6714 35.0485 16.8032 40.6914L14.6714 31.7882C14.2952 30.2835 13.0413 29.4057 11.6619 29.4057L0 28.2771Z" fill="#F7981D"></path><path d="M0 28.2771C8.0254 30.1581 14.6714 35.0485 16.8032 40.6914L15.2984 35.8009C14.9222 34.2961 14.4206 32.7914 12.6651 32.1644L0 28.2771Z" fill="#ED7C00"></path><path d="M23.6996 43.3247L19.4361 39.0612L17.4298 43.8263L16.9282 40.6914C15.7996 36.9295 12.1631 32.7914 8.15039 30.785L13.7932 50.8485H20.5647L23.6996 43.3247Z" fill="#001A34"></path><path d="M35.362 50.8488L29.97 45.3313L28.9668 50.8488H35.362Z" fill="#001A34"></path><path d="M49.7826 43.0741C50.2842 43.5757 50.535 43.9519 50.4096 44.4535C50.4096 45.9582 48.4032 46.7106 46.6477 46.7106C44.1397 46.7106 42.7603 46.3344 40.6286 45.4566L39.7508 45.0804L38.873 50.2217C40.3778 50.8487 43.1365 51.4757 46.0207 51.4757C50.0334 51.4757 53.2937 50.3471 55.1746 48.3408L49.7826 43.0741Z" fill="#001A34"></path><path d="M57.0547 50.8484H62.9483L64.2023 47.0865H72.2277L72.9801 50.8484H78.9991L76.8674 41.6944L69.3436 34.4214L69.7198 36.4277C69.7198 36.4277 70.9737 42.0706 71.2245 43.3246H65.9579C66.4594 42.0706 68.4658 36.6785 68.4658 36.6785C68.4658 36.6785 68.9674 35.2992 69.3436 34.4214" fill="#001A34"></path></svg>
                                              </div>
                                              </div>
                                              <p class="ordering_details_payment_item_title">Онлайн</p>
                                          </label>
                                      </div>
                                  </div>
                             </div>
     
                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
    
            <?php endif; ?>
            
            <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
           
           
            
            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
      
            <div id="order_review" class="woocommerce-checkout-review-order">
            
                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>
         
            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
      
        </form>
        
        <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
        

<?  get_footer();?>