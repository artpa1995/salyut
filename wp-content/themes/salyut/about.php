<?php
/*
    Template name: about
*/
// session_start();

get_header();
?>
           <main>
                 
                  <section class="about_company">
                       <div class="about_company_wrapper">
                           <div  class="about_company_links_wrapper">
                                <a href="" class="about_company_link">
                                    Главная
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="8" viewBox="0 0 5 8"><g><g><image width="5" height="8" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAICAYAAAAx8TU7AAAAAXNSR0IArs4c6QAAAEFJREFUGFd1zkEKgCAARNHnITxnhGu9T7iou3ShEBRMapb/M8wEXMi49QREHNiGaLDlJQacRVphxf5b/xw6UeZLD5jhDmsnOPBMAAAAAElFTkSuQmCC"/></g></g></svg>
                                </a>
                                <a href="" class="about_company_link">О компании</a>
                           </div>
                            <div class="about_company_items_wrapper">
                                <div class="about_company_item" id="about_company_item_first">
                                    <div class="about_company_item_img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/about_img.png">
                                    </div>
                                    <p class="about_company_item_img_info">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. 
                                    </p>
                                </div>
                                <div class="about_company_item">
                                    <h1 class="about_company_item_title">Почему покупают у нас</h1>
                                    <div class="about_company_item_title_info_wrapper">
                                        <p class="about_company_item_title2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                        <p class="about_company_item_info2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                    </div>
                                    <div class="about_company_item_title_info_wrapper">
                                        <p class="about_company_item_title2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                        <p class="about_company_item_info2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                    </div>
                                    <div class="about_company_item_title_info_wrapper" id="last-item">
                                        <p class="about_company_item_title2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                        <p class="about_company_item_info2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                                    </div>
                                     <div class="about_company_item_mail_title_wrapper">
                                         <p class="about_company_item_mail_title">Мы открыты для сотрудничества</p>
                                         <a href="mailto:info@gmail.com" class="about_company_item_mail">info@gmail.com</a>
                                     </div>
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
         

<?php
   get_footer();
?>

