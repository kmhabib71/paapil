<?php

  
include '../load.php';
include '../../connect/login.php';

if(isset($_POST['full_name_up'])){
   
$full_name = $_POST['full_name_up'];
    $upEmailMobile = $_POST['email_mobile_up'];
    $password = $_POST['password_up'];
    $upgen = $_POST['gender_up'];
    
    if(empty($full_name)  or empty($upEmailMobile) or empty($upgen) or empty($password)){
        echo 'All feilds are required';
    }else{
$full_name = $loadFromUser->checkInput($full_name);
$email_mobile = $loadFromUser->checkInput($upEmailMobile);

if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email_mobile)){
   echo 'Email is not correct. Try again.';
    }else{
  if(!filter_var($email_mobile)){
      echo "Invalid Email Format";
  }else if(strlen($full_name) > 50 || strlen($full_name) < 2){
      echo "Name must be between 2-20 character";
  }else if(strlen($password) < 5 || strlen($password) >= 60){
      echo "The password is either too shor or too long";
  }else{
      if((filter_var($email_mobile,FILTER_VALIDATE_EMAIL)) && $loadFromUser->adminCheckEmail($email_mobile) === true){
          echo "Email is already in use";
      }else{
         
         $user_id = $loadFromUser->create('admin', array('adminName'=>$full_name,'adminEmail' => $email_mobile, 'adminPass'=>password_hash($password, PASSWORD_BCRYPT), 'adminRule'=>$upgen, 'adminJoin' => date('Y-m-d H:i:s') ));


      }
  }
}



    }
}


?>
