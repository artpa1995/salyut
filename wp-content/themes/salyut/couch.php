<?php
session_start();
/*
    Template name:coach-profile
*/
get_header();

$user_d =get_user();


if(!is_user_logged_in())
{   
   // wp_redirect('http://sport.loc/home/');
    header("Location:/login/");
} else {
   
   
    if(isset($user_d[1]) && !empty($user_d[1])) {

        
        $role = $user_d[1]['rol'][0];

        if($role == 'player') {
            header("Location:/user-page/");
            exit();

        }
    

    }


}

// echo "<pre>";
// print_r($user_d);die;

?>


<form action="<?php echo  admin_url('admin-post.php'); ?>" method="post" >
<input type="hidden" name="action" value="logout_action">
<button class="btn btn-lg btn-danger" type="submit" style="float: right;">Выход</button>
</form>

<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-4"><h1 class="hsize"><?php echo $user_d[1]['first_name'][0];?></h1></div>
          <div class="col-sm-6"><h1 class="hsize" style="color: #28a745; font-weight: 900;"><?php echo $user_d[1]['team'][0];?></h1></div>
    	<div class="col-sm-2">
        <h1>
        <?php if( $user_d[1]['rol'][0] === 'couch'){
                echo"<h1 class='hsize'>Тренер </h1>";
            }else{
                echo "<h1 class='hsize'>Игрок </h1>";
            }
            ?>
        </h1>
            <!-- <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a> -->
        </div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

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
      
          <div class="tab-content">
            <div class="tab-pane active" id="home">
               
                  <form class="form"  id="registrationForm" action="<?php echo  admin_url('admin-post.php'); ?>" method="post" >
                             <input type="hidden" name="action" value="change_coach">    
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
                              <label for="email"><h4>Команда</h4></label>
                              <?php if(empty($user_d[1]['team'][0])): ?>
                                <input type="text" class="form-control" id="location" placeholder="Команда" name="team" title="enter a location">                                                                                    
                                    <?php else: ?>  
                                        <input type="text" class="form-control" id="location" placeholder="Команда" name="team" title="enter a location" value="<?php  echo $user_d[1]['team'][0];?>">
                                    <?php endif; ?> 
                              
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <!-- <div class="col-xs-6">
                              <label for="password"><h4>Пароль</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Повтарите Пароль</h4></label>
                              <input type="password" class="form-control" name="password2" id="conpassword" placeholder="Повтарите Пароль" title="enter your password2.">
                          </div> -->
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Сахранить</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Очистить</button>
                            </div>
                      </div>
              	</form>
              
              
              
             </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
  
    <div class="container pl_setings" style="margin-top: 30px;  background-color:white;">
        <div class="row">
            <div class="col-sm-12">
            <table style="width: 100%;">
                        <?php
                       
                      $DBRecord = array();
                      $args = array(
                         
                          'order'   => 'ASC'
                      );
                      $users = get_users( $args );
                      $i=0;
                        foreach($users as $user){
                            $UserData  = get_user_meta( $user->ID );

                            if(!empty($DBRecord[$i]['p_team']= $user->p_team) && ($DBRecord[$i]['p_team']= $user->p_team == $user_d[1]['team'][0])){
                            
                            ?>
                           <tr>
                                <td class="td2"><p>Имя</p> <?php echo $DBRecord[$i]['FirstName'] = $user->first_name;?></td>
                                <td class="td2"><p>Фамилия</p><?php echo $DBRecord[$i]['surname']      = $user->surname;?></td>
                                <td  class="td2"><p>Возраст</p><?php echo $DBRecord[$i]['age']         = $user->age;?></td>
                                <td class="td2"><p>Показатель</p><?php echo $DBRecord[$i]['total_count']  = $user->total_count;?></td>
                                <td class="td2"><p>Откуда</p><?php echo $DBRecord[$i]['from_city']  = $user->from_city;?></td>
                                <td class="td2" style="width:200px;"><?php if(!empty($DBRecord[$i]['image']   = $user->image)): ?>
                                   <img class="imjj" src="<?php echo content_url(). '/uploads/images/'.$DBRecord[$i]['image']=$user->image; ?> " alt="" class="avatar img-circle img-thumbnail"> 
                                <?php else: ?> <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar"> <?php endif;?>
                                </td>
                            </tr>
                           <?php 
                            }
                        //    echo "<pre>";
                        //         print_r($UserData);
                            }
                        
                        
                        ?>
</table>
            </div>
        </div>
    </div>

<?php 

  unset($_SESSION['error']);
  get_footer();

 ?>
