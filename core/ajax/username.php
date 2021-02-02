
 <?php

    include '../load.php';
    include '../../connect/login.php';

    $user_id = login::isLoggedIn();


    if(isset($_POST['usernameTextPut'])){
        
       
    $username_text = $_POST['usernameTextPut'];
 
    $dbusername = $loadFromPost->getAllUsername($username_text);
    
   
     
    if(count($dbusername) != 0){
        echo 'Username exit, choose a different username';
        
    }else{
        
       $loadFromUser->userUpdate('users', $user_id, array('username'=>$username_text));
    }


    }else{
        echo 'Not found';
    }

    ?>
