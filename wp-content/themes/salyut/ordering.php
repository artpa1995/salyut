<?php
/*
    Template name: ordering
*/
// session_start();

get_header();




$order_id = $_GET['order'];
$order    = wc_get_order( $order_id );
//echo  $order->get_date_created();
// echo "<pre>";
// print_r($order);
?>

           <main>
                 
                  <section  class="ordering">
                      <div class="ordering_wrapper">
                          <div class="ordering_links_main_wrapper">
                              <div class="ordering_links_wrapper">
                               <a class="ordering_link"  href="">Персональный раздел
                                    <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79328 2.36279L1.48063 0.0565417C1.40486 -0.0189756 1.28218 -0.0188486 1.20654 0.0569323C1.13095 0.132704 1.13115 0.255447 1.20693 0.331023L3.38192 2.50001L1.20685 4.66898C1.13108 4.74457 1.13089 4.86724 1.20646 4.94302C1.24438 4.98101 1.29406 5 1.34374 5C1.39329 5 1.44277 4.98113 1.48062 4.94341L3.79328 2.63722C3.82977 2.60091 3.85025 2.55149 3.85025 2.50001C3.85025 2.44852 3.82971 2.39917 3.79328 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                               </a>
                               <a  class="ordering_link" href="">Мои заказы
                                  <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M3.79328 2.36279L1.48063 0.0565417C1.40486 -0.0189756 1.28218 -0.0188486 1.20654 0.0569323C1.13095 0.132704 1.13115 0.255447 1.20693 0.331023L3.38192 2.50001L1.20685 4.66898C1.13108 4.74457 1.13089 4.86724 1.20646 4.94302C1.24438 4.98101 1.29406 5 1.34374 5C1.39329 5 1.44277 4.98113 1.48062 4.94341L3.79328 2.63722C3.82977 2.60091 3.85025 2.55149 3.85025 2.50001C3.85025 2.44852 3.82971 2.39917 3.79328 2.36279Z" fill="#838383"/></g><defs><clipPath id="clip0"><rect width="5" height="5" fill="white"/></clipPath></defs></svg>
                               </a>
                               <a class="ordering_link"  href="">Оформление заказа</a>
                          </div>
                          </div>
                          
                          <div class="ordering_info_link_wrapper">
                              <h1 class="ordering_info_title">
								  <? if(empty($_GET['order'])):?>
									У вас еще нет заказа 
								 <? else: ?>	
								  Ваш заказ №<?= $order_id; ?> от <? echo  $order->get_date_created(); ?> успешно создан. Номер
                                вашей оплаты: №493027
								<? endif; ?>	
                            </h1>
                            <div class="ordering_info_box">
                                 <p class="ordering_info_text">Вы можете следить за выполнением своего заказа в личном кабинете сайта.Обратите внимание, что для входа в этот раздел вам необходимо будет ввести логин и пароль пользователя сайта.</p>
                            </div>
                              <a href="/мой-аккаунт/" class="ordering_info_link">Личный кабинет</a>
                          </div>
                      </div>
                  </section>
              
                 
              
           </main>
          
<?php
   get_footer();
?>

