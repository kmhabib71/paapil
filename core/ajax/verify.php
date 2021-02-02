<?php

include '../load.php';
include '../../connect/login.php';
$user_id = login::isLoggedIn();

if(isset($_POST['verify_code_up'])){
    
    $userData = $loadFromUser->userData($user_id);

$verificationCode=$userData->varification_code;
$verify_code_up = $_POST['verify_code_up'];

    if($verificationCode == $verify_code_up){
        
    $loadFromUser->userUpdate('users', $user_id, array('varification_status'=>'1'));
    }else{
        echo 'Verification code is not correct, try again';
    }

}else{
    echo 'not found';
}


?>
