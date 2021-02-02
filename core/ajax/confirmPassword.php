    <?php
    include '../load.php';
    include '../../connect/login.php';
    
    
    if(isset($_POST['newPass'])){
        
        $newpassword = $_POST['newPass'];
        $confpassword = $_POST['confPass'];
        $uid = $_POST['uid'];
        if($newpassword != $confpassword){
            echo 'Password is not match';
        }else{
    if(strlen($confpassword) < 5 || strlen($confpassword) >= 60){
          echo "The password is either too shor or too long";
      }else{
          
          $loadFromUser->userUpdate('users', $uid, array('password'=>password_hash($confpassword, PASSWORD_BCRYPT)));
          echo $uid;
        }
            
        }
    }
    
    
    ?>
