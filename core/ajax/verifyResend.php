<?php

  
include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();

if(isset($_POST['verify'])){
    
    $userData = $loadFromUser->userData($user_id);
    $userEmail = $userData->email;
     $myStr = rand();
    $varification_code = substr($myStr, 0, 5);
    
    $loadFromUser->userUpdate('users', $user_id, array('varification_code'=>$varification_code));
    $to = "".$userEmail."";

$subject = "Paapil verification Code";

$message = '<!DOCTYPE html><html lang="en"><head> <meta charset="UTF-8"> <title> </title> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body> <div class="container"> <div class="wrap card"> <div class="row"> <div class="col"> <h2 class="text-primary">Confirm your email address</h2> <p> There’s one quick step you need to complete before creating your paapil account. Let’s make sure this is the right email address for you — please confirm this is the right address to use for your new account. Please enter this verification code to get started on Paapil: </p> <h1><span style="border: 1px solid black;padding:5px;border-radius:2px;">'.$varification_code.'</span></h1> <p>Thanks,</p> <p>Paapil</p> </div> </div> </div> </div></body></html>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


$headers .= 'From: <welcome.paapil.com>' . "\r\n";


mail($to,$subject,$message,$headers);
    
    
}