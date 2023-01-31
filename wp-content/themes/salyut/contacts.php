<?php
/*
    Template name: contact
*/
// session_start();

get_header();
?>
           <main>
                 
                 
                   <section  class="contacts">
                        <div class="contacts_wrapper">
                            <div class="contacts_links_wrapper">
                                 <a href="" class="contacts_link">Главная 
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="8" viewBox="0 0 5 8"><g><g><image width="5" height="8" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAICAYAAAAx8TU7AAAAAXNSR0IArs4c6QAAAEFJREFUGFd1zkEKgCAARNHnITxnhGu9T7iou3ShEBRMapb/M8wEXMi49QREHNiGaLDlJQacRVphxf5b/xw6UeZLD5jhDmsnOPBMAAAAAElFTkSuQmCC"/></g></g></svg>
                                 </a>
                                 <a href="" class="contacts_link">Контакты</a>
                            </div>
                            <div class="contacts_items_wrapper">
                               
                                <div class="contacts_item" id="contacts_item1">
                                    <div class="contacts_info_items_wrapper">
                                        <h1 class="contacts_title" id="desktop_title">Контакты</h1>
                                        <div class="contacts_info_item_wrapper">
                                            <div class="contacts_info_item_svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="27" viewBox="0 0 20 27"><g><g><image width="20" height="27" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAbCAYAAAB836/YAAAAAXNSR0IArs4c6QAAArpJREFUSEuV1UvI1VUUBfCfPSkCo7BRQTQoelBmJpk0ECkIDSwoiSwrsoGPkIosFR8TEyOiDBpoaGlS9g4Ugl4URRKVWmoWYjRImiQlWZQ9WLJP/Lne+/G5R/ees/c65+y11v6P0D+Oww2YhqtxDrK2H1/gVbyI33vLR/TBuxJrcGntbcNeHC7gcTihwGfj9S5GL+BtWIu/8TSewI89h47E3ViIM7G8fh9J6wJOxlv4AVOwc0A72vJZeA0T8AhWdAHPwLeVmSfv64CdgtE4CV/h587eafgYl2Asvmw3fBQP43ZsqILjsQgP4dRa+wfrMA8Ha+2yAOFtXB/Axt4BXIQUJVbjnkp+Dn/gJlyHTzARf1buK7V3bgAvLyl0mzu+ijZXYitM/WN4ELPwTAHegpdCVgBvxUZk8eVKeBz344JOb1vrTsZP+ByTavF87MlhAbyzpJInfFAJL9RBaUe/SM9C0sW1eTrSsicDeDM24Ua8UQntWSnY1YMY1nPDrbi29s4r8S8PYIq+RpheUAmRwGd4tzQZQprMnsIczCxHZT0WjRWnN5Yj5hSlF43lFM7FN0gLDhVBEfL7xXbsmIi3p+LspsMlWIq7SmftNg+UCyL8RA6NnKLZHJBoOnwzbWuA8Weckv9hNg1ucSIuLBJ247fOXvI/wlUYgx1dL0/H+rrBvQPY7V2+AxH9KtzXntVNeqe0lT7FDUNFe1Vy0vtf+gFmYwe+qyf8NQRiI20Gnm95/QbsYizDfKwcABgi4pRPcQ3+HQow1sotM/YzLL7vAe0ScQW2d/f73TD7seF72IIM3m4cRcRwAJOTvmQ+xpoZT4m+RAwXcFRNkHzZosNf0ZeI4QImLwM2zojOnh1ExLEApscf1rc58y6yOoqIYwFMbqZRvs35Fv/viEH6HMRyb36GQawZBx1xxKD4D+Aamq7KwepyAAAAAElFTkSuQmCC"/></g></g></svg>
                                            </div>
                                            <div class="contacts_info_item_title_info">
                                                <p class="contacts_info_item_title">АДРЕС</p>
                                                <p class="contacts_info_items_info">111141 Москва, З-й Проезд Перова Поля, 4А, стр. 3 </p>

                                            </div>
                                        </div>
                                        <div class="contacts_info_item_wrapper">
                                            <div class="contacts_info_item_svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27" height="27" viewBox="0 0 27 27"><g><g><image width="27" height="27" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABsAAAAbCAYAAACN1PRVAAAAAXNSR0IArs4c6QAAAtpJREFUSEut1lvIlFUYBeBHyYuiiCKsCBHEIrvQijALLLowJQkl6WAElWlZhAWJaKBGhZIamZRmF0EHrMg06OABQtEiS6HIi0zLIEyvCoLoQFSy4P1gmObH32/cMMzMN3uvNe9hrXcP8f91JqZiCD7Abz32tHoUwM41GtuL4F+cgwk41gq961AnWYh2YjhG4Se8jgtwI0Le12rIAvg5PsIZRTAFSelXWI8VfTFVXYKxGX/jdpyNr7EML+Fq7MB12NcPYSIbiUP13tRmEjZhLH7A47i3vv/RljBkt2E+xneBvFjg19fzpDPRvtUP2Zxq9eldIKnXl5XKZ/Ex3sbL/ZClTo/imh4gE7EVa/AgLsPRfsgCsBfn4q8eQO/hhmr/dGzrlZrldQSzsK0LKfVM2iaXNFoT5WCjs2dwMW7pQtuA77G4L5Y63JBdVKBp9YMdwLPxCMadSgcJftJ1PqbhcvyD7/ANnsQr/UbX6Y3n4Vvcg3x+GlfiitJW3iPw1qvb9e/DUxXZalxYzRFfjFdei1/asnWTBScOkcjSLLuwv6zqTYzBTfixB2FS37jOF4hZHO7c14vsrNJdJsBKfIpobUG5yc14oJ41WDHrzMEX8BoexkzElT5pNvUiy2+ZbSF5DhvL9aPBkNyFpDgCfwL/FdEw3IoPCzyOs6rOvNGps15lSFoyTJfi3RL8HqSuSXMmwf04HQtrmq+r2beoRlbMIH4au1s6UGSd6ck9JHMtUeYP/IrfSxIZtCH7uQ5cinfqWhHPTW1jh4l2w4nIgpGmSD0S5dwaorkE7R6gK0OeSGbgbrxfXbx1MGTBjASaLg3IgUG0/x1lFDGLLan9YMmCfVoJfV516XL8eQLS+G0mflK5+GTIGtyrsLaaJGJ/FQNdFUKSEiSVD7UhC+lQ3InHMKI0lyEbA8hMjLFHY2n/NNaSSKQtWWf2ckeJ2+T2dUldBXNxivs8j8+azccBn52V/sw2vjUAAAAASUVORK5CYII="/></g></g></svg>
                                            </div>
                                            <div class="contacts_info_item_title_info">
                                                <p class="contacts_info_item_title">ТЕЛЕФОН</p>
                                                <p class="contacts_info_items_info">+7 (800) 700-45-24</p>
                                            </div>
                                        </div>
                                        <div class="contacts_info_item_wrapper">
                                            <div class="contacts_info_item_svg">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="19" viewBox="0 0 28 19"><g><g><image width="28" height="19" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAATCAYAAACDW21BAAAAAXNSR0IArs4c6QAAAcNJREFUSEu11U2IT3EUxvHPeEnKQtjY2IhsKCVCZIGRJBtvSWYhiSTNxtssJGQzNRMSWUiREKJsbEjCUFJWygIbkWTpvaNzp3+3/5uZO7fu6p7zfH/nuc89twOHsA9jjOz1Fqs78BmTcD/hPyrmLkIvxqIrgF+xGwfxDRvxrgJoaHfjKI5gIW4WwGV4g9NYi224MwxoOHYRc7EJj3Ar7lrgywR04RTO4gD+1+KY5CpeY2u+spBuCIyHs3Eti+OEH9qYtmzhSfyp6WsKjLoJOeWqPOm9JtB6FpbLWwKLhu3oz/swfpaU5qeFkYEt+NTgYG0DG1kcFu7FCRzDcfxu4kJL4MpM7YwUqbX4DGKyOdiMB1mzByuwrg68KXA6BrAf50qnXo81eI++koWT8RyXc4nUtjYExiRP8BC72khnuSSmfhxbBddbpTTeyw1MwXJ8HwIwWjbgAhbjVWrUnbAHOzAPH4cIK9oiRPENh9aXeh/+NFzBUrwYJizaR+M2xiMCGM4NrradGY5Y4pcqgBUSE/EUdxFBHASOwvnc7hXy/knNwrPcyd0Rkkjkgtzov6qmpd5MTMWSAMYe7MS4EYIVsvH3GPgLgh9/ZcNg5xwAAAAASUVORK5CYII="/></g></g></svg>
                                            </div>
                                            <div class="contacts_info_item_title_info">
                                                <p class="contacts_info_item_title">ЭЛ. ПОЧТА</p>
                                                <p class="contacts_info_items_info">info@gmail.ru</p>
                                            </div>
                                        </div>
                                        <div class="contacts_info_item_wrapper">
                                            <div class="contacts_info_item_svg">
                                                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="28" height="28" viewBox="0 0 28 28"><g><g><image width="28" height="28" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAAAXNSR0IArs4c6QAAArtJREFUSEu11kuolVUYxvGfl9QsQS0NIzQi8IAE5sBSLDQMutmFUiuiiWhgOCgqUKRRsygCT1jijaJRkl0IIsomRYmEl8qBhmCIBdFVLMsu8hzWB1+bvU/ft+Us2IO991rrv971vut5n1HajUsxB1fgApzBN/gCp5psNarBpKlYhQcxF3/jW/yBCzED/+AzvIpX8HuvfYcDJoInsQE/YCfexQH8WdtwIubjTjxcDrQRW/FvJ7gXcBZex1VYjx34q8FtXIR1eBof4iH8Ul/XDTi7TD6GFfiuCyg5fBvXd0RbTR3AGyXam/B99UcncDr2lSK4t+SpW2DJ5X5Mwc89Ik/uPyg3c2MpMJ3A9zANN+C3Ya6wCTDLE0ByvhuP5oc68IFSGNfgyP/kqykw2yzF+7gut1cBR+MrvIOnGhRHG2C2exPjcWsFTGJzipk4OQLABfgkVV8BB3E1bmkAy5S2EWbN1xisgEnsa3h2BIEv45IKGE28G6nSJqOfCCMIjwQ4Cb/i2lLCbYAR88hek3EfNgU4GT+1BOatHsanyEZ1be0FvwdbqiuNTt6Mj5octczJe93TAroGT1TAo3gOL7UAZmob6PMYqIDpYXmYK1sC20A/x1sVMF1hOy7D6RGA5o3nFudVwAk4gWfwQh/AKtI8qxw+qlIfEZaFdWD+jIamw6cf/tgntNuy9MZDuD89st4tksP0uJT78m72oI9DjMPHJYAh2ezsh6m6veVa42XOZ4wpcrm4aO+Qc+hmMW4r7STa9zjO9kG9uLi3JcgnWj00epmonGoX4mtW42ALaFrdZozFXfiyvnY4mxij9CKWlYhj+6IsEfrOkYhux9piT7ZFVTod23AR1jdchMdwRymknPh4cdoxUVcWNx7zm1tJi0vhdR1NnHe1MFHEXKWwLke+x97H6qe647y7Rf8f8DmUDqE+h+J46AAAAABJRU5ErkJggg=="/></g></g></svg>
                                            </div>
                                            <div class="contacts_info_item_title_info">
                                                <p class="contacts_info_item_title">РЕЖИМ РАБОТЫ</p>
                                                <p class="contacts_info_items_info">Пн. – Пт.: с 9:00 до 18:00</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                     
                                     
                                </div>
                                <div class="contacts_item" id="contacts_item2">
                                     <h1 class="contacts_title" id="mobile_title">Контакты</h1>
                                    <div id="map" ></div>
                                </div>
                            </div>
                            <div class="contacts_details_main_wrapper">
                                <div class="contacts_details_wrapper">
                                <div class="contacts_details">
                                    <p class="contacts_details_bold_text1">РЕКВИЗИТЫ</p>
                                    <p class="contacts_details_light_text">ООО «Корсар-сервис»</p>
                                </div>
                                <div class="contacts_details">
                                    <div class="contacts_details_second_wrapper">
                                        <p class="contacts_details_bold_text">ИНН</p>
                                        <p class="contacts_details_light_text">689798764358</p>
                                    </div>
                                    <div class="contacts_details_second_wrapper">
                                         <p class="contacts_details_bold_text">ОГРНИП</p>
                                        <p class="contacts_details_light_text">689798764358</p>
                                    </div>
                                </div>
                                <div class="contacts_details">
                                    <div class="contacts_details_second_wrapper">
                                        <p class="contacts_details_bold_text">Р/С</p>
                                        <p class="contacts_details_light_text">689798764358</p>
                                    </div>
                                    <div class="contacts_details_second_wrapper">
                                         <p class="contacts_details_bold_text">К/С</p>
                                        <p class="contacts_details_light_text">689798764358</p>
                                    </div>
                                </div>
                                <div class="contacts_details">
                                    <div class="contacts_details_second_wrapper">
                                        <p class="contacts_details_bold_text">БИК</p>
                                        <p class="contacts_details_light_text">689798764358</p>
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


