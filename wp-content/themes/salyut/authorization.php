<?php
/*
    Template name: authorization
*/
// session_start();
if(is_user_logged_in())
{ 
    header("Location:/мой-аккаунт/");
    exit;
}

get_header();
?>
           <main>
                 
                 
                  <section class="authorization">
                      <div class="authorization_wrapper">
                          <div class="authorization_links_wrapper">
                              <a href="" class="authorization_link">Главная
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="8" viewBox="0 0 5 8"><g><g><image width="5" height="8" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAICAYAAAAx8TU7AAAAAXNSR0IArs4c6QAAAEFJREFUGFd1zkEKgCAARNHnITxnhGu9T7iou3ShEBRMapb/M8wEXMi49QREHNiGaLDlJQacRVphxf5b/xw6UeZLD5jhDmsnOPBMAAAAAElFTkSuQmCC"/></g></g></svg>
                              </a>
                              <a href="" class="authorization_link">Вход в личный кабинет</a>
                          </div>
                          <div class="authorization_items_wrapper">
                              <div class="authorization_item" id="authorization_item1">
                                  <h1 class="authorization_item_title">Я - зарегистрированный пользователь</h1>
                                  <form class="authorization_form_wrapper authorization_form_wrapper_phone" >
                                      <!-- <input type="hidden" name="action" value="login_form_phone"> -->
                                      <p class="authorization_item_info3">Авторизация</p>
                                      <div class="authorization_form_input_field_wrapper">
                                          <p class="authorization_form_input_field_title">Введите номер телефона</p>
                                          
                                               <div class="alert-error alert-error-phone" ></div>
                                               <div class="alert-error phone_exist"></div>
                                           
                                           <div class="registration_form_input_field_wrapper">
                                            
                                                 <div class="alert-error"></div>
                                         
                                                <input type="text" class="authorization_form_input_field author_login_phone_phone" id="authorization_form_phone_input" placeholder="+7 (___)___-__-__" name="phone" >
                                            </div>
                                      </div>
                                      <div class="registration_form_input_field_wrapper">
                                            
                                                    <div class="alert-error alert-error-password"></div>
                                              
                                                <input type="text" class="registration_form_input_field author_login_phone_password"  name="password"  placeholder="Пароль" style="    padding: 15px 40px!important;">
                                      </div>
                                          <a  class="authorization_form_link_login_width_password  with_email">Войти по логину и паролю</a>
                                          <button  class="authorization_form_enter_btn author_login_phone_button"><span>Войти</span></button>
                                  </form>

                                  <form class="authorization_form_wrapper authorization_form_wrapper_email" >
                                      <!-- <input type="hidden" name="action" value="login_form_email"> -->
                                      <p class="authorization_item_info3">Авторизация</p>
                                      <div class="authorization_form_input_field_wrapper">
                                          <p class="authorization_form_input_field_title">Введите email</p>
                                          <div class="registration_form_input_field_wrapper">
                                            
                                                    <div class="alert-error  alert-error-email_email"></div>
                                                    <div class="alert-error email_exist"></div>
                                                
                                                <input type="text" class="registration_form_input_field author_login_email_email" name="email" placeholder="E-mail" id="registration_form_email_input" style="    padding: 15px 40px!important;">
                                            </div>
                                            <div class="registration_form_input_field_wrapper">
                                           
                                                    <div class="alert-error alert-error-email_password"></div>
                                                
                                                <input type="text" class="registration_form_input_field author_login_email_password"  name="password"  placeholder="Пароль" style="    padding: 15px 40px!important;">
                                            </div>
                                      </div>
                                          <a  class="authorization_form_link_login_width_password with_phone">Войти по телефону</a>
                                          <button  class="authorization_form_enter_btn author_login_email_button"><span>Войти</span></button>
                                  </form>
                                  
                              </div>
                              <div class="authorization_item" id="authorization_second_item">
                                  <div class="authorization_item_delimiter">
                                      <div class="authorization_item_delimiter_box">
                                          <span class="authorization_item_delimiter_text">или</span>
                                      </div>
                                      
                                   </div>
                              </div>
                              <div class="authorization_item" id="authorization_item3">
                                  <h1 class="authorization_item_title2">Я - новый пользователь</h1>
                                  <p class="authorization_item_info1">Если Вы впервые на сайте,заполните, пожалуйста, регистрационную форму.</p>
                                  <p class="authorization_item_info2">
                                     Зарегистрировавшись на SALUT Вы сможете 
                                     самостоятельно совершать покупки и быть в курсе всех акций.
                                   </p>
                                     <a href="/регистрация/" class="authorization_item_registration_link"> <span>Зарегистрироваться</span></a>
                                     
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
