<?php
session_start();
/*
    Template name:login-page
*/
get_header();

if(!is_user_logged_in())
{
    ?>
    <script>
        location.href = '/login';
    </script>
    <?php

    exit();
} else {
    $user_d = get_user();

    
    if(isset($user_d[1]) && !empty($user_d[1])) {
        
        $role = $user_d[1]['rol'][0];

        if($role == 'couch') {


            ?>
            <script>
                location.href = '/coach';
            </script>
            <?php
            exit();

        }
       
    }
}
// echo "<pre>";
//  print_r($user_d);die;
//$arr = [0 => 10, 1 => 20, 2 => 20, 3 => 30];
$a  = get_user();
$b=$a[1]['indicator'];

// echo "<pre>";
//     print_r($b);die;

if(!empty($b)){

    $slice = array_slice($b, 0);
    $result_count = array_sum($slice) / sizeof($slice);
}


// echo "<pre>";
// print_r($result);die;

?>


<form action="<?php echo  admin_url('admin-post.php'); ?>" method="post" >
<input type="hidden" name="action" value="logout_action">
<button class="btn btn-lg btn-danger" type="submit" style="float: right;">Выход</button>
</form>

<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-7"><h1 class="hsize"><?php echo $user_d[1]['first_name'][0];?></h1></div>
        <div class="col-sm-3"><h1 class="hsize" style="color: #28a745; font-weight: 900;"><?php echo $user_d[1]['p_team'][0];?></h1></div>
    	<div class="col-sm-2">
        <h1>
            <?php if( $user_d[1]['rol'][0] === 'couch'){
                echo"<h1 class='hsize'>Тренер </h1>";
            }else{
                echo "<h1 class='hsize'>Игрок </h1>";
            }
            ?>
        </h1>
            
        </div>
    </div>
    <div class="row">
  		<div class="col-sm-3">
              

      <div class="text-center">
      <form action="<?php echo  admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data" id="form_img_upload">
        <input type="hidden" name="action" value="img_uploid">
        <?php 
        
        if(!empty($user_d[1]['image'][0])): ?>
                             
                             <img src="<?php echo content_url(). '/uploads/images/'.$user_d[1]['image'][0]; ?> " alt="" class="avatar img-circle img-thumbnail"> 
 
                      <?php else: ?>
 
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
 
                      <?php endif; ?>
       
       
        <!-- <input type="file" class="text-center center-block file-upload" name="photo"> -->
        <input type="file" class="text-center center-block file-upload" name="photo" id="file-upload" style=" display: none;">
        <label class="btn btn-lg btn-success" for="file-upload" id="but_-up"><i class="fas fa-camera" name="sub"></i> Добавить фото</label>
        <!-- <button class="btn btn-lg btn-success" type="submit"><i class="fas fa-camera" name="sub"></i> Добавить фото</button> -->
        </form>
      </div></hr><br>

               
    
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <!-- <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
                <li><a data-toggle="tab" href="#settings">Menu 2</a></li>
              </ul> -->

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form"  id="registrationForm" action="<?php echo  admin_url('admin-post.php'); ?>" method="post" >
                  <input type="hidden" name="action" value="change_player">
                      <div class="form-group">
                          
                      <div class="col-xs-6">
                              <label for="first_name"><h4>Имя</h4></label>
                              <input type="text" class="form-control" name="name" id="first_name" placeholder="Имя" title="enter your first name if any." value="<?php echo $user_d[1]['first_name'][0];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                      <div class="col-xs-6">
                            <label for="last_name"><h4>Фамилия</h4></label>
                              <input type="text" class="form-control" name="surname" id="last_name" placeholder="Фамилия" title="enter your last name if any." value="<?php echo $user_d[1]['surname'][0];?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                      <div class="col-xs-6">
                              <label for="phone"><h4>Возраст</h4></label>
                              <input type="text" class="form-control" name="age" id="phone" placeholder="Возраст" title="enter your phone number if any." value="<?php echo $user_d[1]['age'][0];?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                      <div class="col-xs-6">
                             <label for="mobile"><h4>Откуда Вы</h4></label>
                              <input type="text" class="form-control" name="from_city" id="mobile" placeholder="Откуда Вы" title="enter your mobile number if any." value="<?php echo $user_d[1]['from_city'][0];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                      <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email" title="enter your email." value="<?php echo $user_d[0]->data->user_email;?>">
                        </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Позиция играка</h4></label>
                              <input type="text" class="form-control" id="location" placeholder="Позиция играка" title="enter a location" name="team" value="<?php echo $user_d[1]['team_role'][0];?>">
                          </div>
                      </div>
                    
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Сахранить</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Очистить</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div>
           
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->












    <div class="container pl_setings" style="margin-top: 30px;  background-color:white;">
        <div class="row">
            <div class="col-sm-12">
                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                        
                                                <form action="<?php echo  admin_url('admin-post.php'); ?>" method="post" >
                                                    <input type="hidden" name="action" value="count_num">
                                                        <div class="form-group">
                                                            
                                                        <div class="col-xs-6">
                                                                <label for="first_name"><h4>A</h4></label>
                                                                <input type="number" class="form-control a" name="A" placeholder="A" title="enter your first name if any." value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                        <div class="col-xs-6">
                                                                <label for="last_name"><h4>B</h4></label>
                                                                <input type="number" class="form-control b" name="B"  placeholder="B" title="enter your last name if any." value="" required>
                                                            </div>
                                                        </div>
                                            
                                                        <div class="form-group">
                                                            
                                                        <div class="col-xs-6">
                                                                <label for="phone"><h4>C</h4></label>
                                                                <input type="number" class="form-control c" name="C"  placeholder="C" title="enter your phone number if any." value="" required>
                                                            </div>
                                                        </div>
                                            
                                                        <div class="form-group">
                                                        <div class="col-xs-6">
                                                                <label for="mobile"><h4>D</h4></label>
                                                                <input type="number" class="form-control d" name="D"  placeholder="D" title="enter your mobile number if any." value="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                        <div class="col-xs-6">
                                                                <label for="email"><h4>E</h4></label>
                                                                <input type="number" class="form-control e" name="E"  placeholder="E" title="enter your email." value="" required>
                                                            </div>
                                                        </div>
                                                       
                                                        
                                                        <div class="form-group">
                                                            <div class="col-xs-12">
                                                                    <br>
                                                                    <?php 
                                                                    if( isset($_COOKIE['report']) && $_COOKIE['report'] == get_current_user_id()){
                                                                        echo "<h1>Следующий показатель нужно ввести завтро</h1>";
                                                                  }else{
                                                                        ?>
                                                                        <button class="btn btn-lg btn-success kn"   type="submit"><i class="glyphicon glyphicon-ok-sign "></i> Считать</button>
                                                                        <?php }
                                                                    ?>
                                                                    
                                                                    
                                                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat "></i> Очистить</button>
                                                                </div>
                                                                <div class="form-group">
                                                            <div class="col-xs-12">
                                                                    <br>
                                                                   <h1 style="color: red; display:none" class="time_text">Следующий показатель нужно ввести завтро</h1>
                                                                </div>
                                                        </div>
                                                        </div>
                                                </form>
                                        
                                        </div>
                            
                     </div><!--/tab-pane-->
               </div>
        </div>
    </div>






    <div class="container pl_setings" style="margin-top: 30px;  background-color:white;">
  
        <div class="row">
            <div class="col-sm-12">
            <h1 style="text-align: center;">Показатели игрока</h1>
            
        <table>
            <?php  
                $g    = $user_d[1]['indicator'];
                $allg = array_slice($g, -30);
                echo "<pre>";
                print_r($allg);die;
                // echo ceil($allg[0]);die;
            //    echo !empty($allg) && isset($allg[0]) && !empty($allg[0]) ? ceil($allg[0]) : '0';die;
            ?>

          
                    <tr>
                        <td class="td">1 день<p><?php echo !empty($allg) && isset($allg[0]) && !empty($allg[0]) ? ceil($allg[0]) : '0';?></p></td>
                        <td class="td">2 день<p><?php echo !empty($allg) && isset($allg[1]) && !empty($allg[1]) ? ceil($allg[1]) : '0';?></p></td>
                        <td class="td">3 день<p><?php echo !empty($allg) && isset($allg[2]) && !empty($allg[2]) ? ceil($allg[2]) : '0';?></p></td>
                        <td class="td">4 день<p><?php echo !empty($allg) && isset($allg[3]) && !empty($allg[3]) ? ceil($allg[3]) : '0';?></p></td>
                        <td class="td">5 день<p><?php echo !empty($allg) && isset($allg[4]) && !empty($allg[4]) ? ceil($allg[4]) : '0';?></p></td>
                        <td class="td">6 день<p><?php echo !empty($allg) && isset($allg[5]) && !empty($allg[5]) ? ceil($allg[5]) : '0';?></p></td>
                      
                        
                    </tr>
                    <tr>
                    <td class="td">7 день<p><?php echo !empty($allg) && isset($allg[6]) && !empty($allg[6]) ? ceil($allg[6]) : '0';?></p></td>
                    <td class="td">8 день<p><?php echo !empty($allg) && isset($allg[7]) && !empty($allg[7]) ? ceil($allg[7]) : '0';?></p></td>
                    <td class="td">9 день<p><?php echo !empty($allg) && isset($allg[8]) && !empty($allg[8]) ? ceil($allg[8]) : '0';?></p></td>
                    <td class="td">10 день<p><?php echo !empty($allg) && isset($allg[9]) && !empty($allg[9]) ? ceil($allg[9]) : '0';?></p></td>
                    <td class="td">11 день<p><?php echo !empty($allg) && isset($allg[10]) && !empty($allg[10]) ? ceil($allg[10]) : '0';?></p></td>
                    <td class="td">12 день<p><?php echo !empty($allg) && isset($allg[11]) && !empty($allg[11]) ? ceil($allg[11]) : '0';?></p></td>
                        
                    </tr>
                    <tr>
                    <td class="td">13 день<p><?php echo !empty($allg) && isset($allg[12]) && !empty($allg[12]) ? ceil($allg[12]) : '0';?></p></td>
                    <td class="td">14 день<p><?php echo !empty($allg) && isset($allg[13]) && !empty($allg[13]) ? ceil($allg[13]) : '0';?></p></td>
                    <td class="td">15 день<p><?php echo !empty($allg) && isset($allg[14]) && !empty($allg[14]) ? ceil($allg[14]) : '0';?></p></td>
                    <td class="td">16 день<p><?php echo !empty($allg) && isset($allg[15]) && !empty($allg[15]) ? ceil($allg[15]) : '0';?></p></td>
                    <td class="td">17 день<p><?php echo !empty($allg) && isset($allg[16]) && !empty($allg[16]) ? ceil($allg[16]) : '0';?></p></td>
                    <td class="td">18 день<p><?php echo !empty($allg) && isset($allg[17]) && !empty($allg[17]) ? ceil($allg[17]) : '0';?></p></td>

                       
                    </tr>
                    <tr>
                    <td class="td">19 день<p><?php echo !empty($allg) && isset($allg[18]) && !empty($allg[18]) ? ceil($allg[18]) : '0';?></p></td>
                    <td class="td">20 день<p><?php echo !empty($allg) && isset($allg[19]) && !empty($allg[19]) ? ceil($allg[19]) : '0';?></p></td>
                    <td class="td">21 день<p><?php echo !empty($allg) && isset($allg[20]) && !empty($allg[20]) ? ceil($allg[20]) : '0';?></p></td>
                    <td class="td">22 день<p><?php echo !empty($allg) && isset($allg[21]) && !empty($allg[21]) ? ceil($allg[21]) : '0';?></p></td>
                    <td class="td">23 день<p><?php echo !empty($allg) && isset($allg[22]) && !empty($allg[22]) ? ceil($allg[22]) : '0';?></p></td>
                    <td class="td">24 день<p><?php echo !empty($allg) && isset($allg[23]) && !empty($allg[23]) ? ceil($allg[23]) : '0';?></p></td>

                        
                    </tr>
                    <tr>
                    <td class="td">25 день<p><?php echo !empty($allg) && isset($allg[24]) && !empty($allg[24]) ? ceil($allg[24]) : '0';?></p></td>
                    <td class="td">26 день<p><?php echo !empty($allg) && isset($allg[25]) && !empty($allg[25]) ? ceil($allg[25]) : '0';?></p></td>
                    <td class="td">27 день<p><?php echo !empty($allg) && isset($allg[26]) && !empty($allg[26]) ? ceil($allg[26]) : '0';?></p></td>
                    <td class="td">28 день<p><?php echo !empty($allg) && isset($allg[27]) && !empty($allg[27]) ? ceil($allg[27]) : '0';?></p></td>
                    <td class="td">29 день<p><?php echo !empty($allg) && isset($allg[28]) && !empty($allg[28]) ? ceil($allg[28]) : '0';?></p></td>
                    <td class="td">30 день<p><?php echo !empty($allg) && isset($allg[29]) && !empty($allg[29]) ? ceil($allg[29]) : '0';?></p></td>

                     
                    </tr>
                    

            </table>
            <h1 style="text-align: center;">средний показатель</h1>
            <h2 style="text-align: center;"><?php echo ceil($result_count);?></h2>
            </div>
        </div>
    </div>

     <div class="container pl_setings" style="margin-top: 30px;  background-color:white;">

  

        <div class="row">

            <div class="col-sm-12">

            <h1 style="text-align: center;">YOUR DAILY CHANCE TO GET INJURED</h1>

            

        <table>

        <?php
          for ($k = 1; $k <30; $k++){
            echo $k;
        }
            for ($i = 0; $i < 6; $i++){
                echo "<tr>" ; 
                for ($j = 0; $j < 6; $j++){
                  

                            echo "<td class='td'>". $k ."</td>"; //выведет 0, 1, 2... 9
                        }  "</tr>"; //выведет 0, 1, 2... 9
            } //<--- точки с запятой нет
           


            ?>
            </table>
            </div>
            </div>
            </div
                                                      

<?php get_footer(); ?>