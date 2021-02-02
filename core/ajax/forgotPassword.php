
 <?php

    include '../load.php';
    include '../../connect/login.php';

    $user_id = login::isLoggedIn();


    if(isset($_POST['forgotPass'])){
                function fRand($len) {
            $str = '';
            $a = "abcdefghijklmnopqrstuvwxyz0123456789";
            $b = str_split($a);
            for ($i=1; $i <= $len ; $i++) { 
                $str .= $b[rand(0,strlen($a)-1)];
                }
                return $str;
            }
            
            $email = $_POST['forgotPass'];
            
            $psess = fRand(50);
            
            $loadFromUser->deleteR('forgotPassword', array('femail'=>$email));
            
            $loadFromUser->create('forgotPassword', array('femail'=>$email, 'fcode'=>$psess, 'fstatus'=>'0', 'fon' => date('Y-m-d H:i:s') ));
            
            
        $to = "".$email."";

        $subject = "Password reset link";
        
        $message = '<!DOCTYPE html><html lang="en"><head> <meta charset="UTF-8"> <title> </title> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></head><body> <div class="container"> <div class="wrap card"> <div class="row"> <div class="col"> <h2 class="text-primary">Password rest link</h2> <p>Click the link below to reset password</p> <a href="https://paapil.com/password-reset.php?psess'.$psess.'>https://paapil.com/password-reset.php?psess'.$psess.'</a> <p>Thanks</p> <p>Paapil</p> </div> </div> </div> </div></body></html>';
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <password@paapil.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";
        
        $success = mail($to,$subject,$message,$headers);
        if (!$success) {
            echo error_get_last()['message'];
        }
        
     
        
            
    }else{
        echo 'Not found';
    }
    
    ?>