<?php

include '../load.php';
include '../../connect/login.php';


$user_id = login::isLoggedIn();

if(isset($_POST['time'])){
    
    $days = $_POST['time']; 
    
    if($days == ''){
        
        $allUsers = $loadFromPost->allUsersFilter();
        foreach($allUsers as $user){ 
            
?>
<tr>
    <td><?php echo $user->user_id; ?></td>
    <td><?php echo $user->username; ?></td>
    <td><?php echo $user->profilePic; ?></td>
    <td><?php echo $user->joind_at; ?></td>
</tr>

<?php    }
        
    }else if($days == 'hour'){
        
        $usersLastHourFilter = $loadFromPost->usersLastHourFilter($days);
        
        foreach($usersLastHourFilter as $user){ 
?>
<tr>
    <td><?php echo $user->user_id; ?></td>
    <td><?php echo $user->username; ?></td>
    <td><?php echo $user->profilePic; ?></td>
    <td><?php echo $user->joind_at; ?></td>
</tr>

<?php    }
        
    }else{
        $usersLastFilter = $loadFromPost->usersLastFilter($days);
        
        foreach($usersLastFilter as $user){ 
?>
<tr>
    <td><?php echo $user->user_id; ?></td>
    <td><?php echo $user->username; ?></td>
    <td><img src="<?php echo BASE_URL.$user->profilePic; ?>" alt="" style="height:50px;width:50px;"></td>
    <td><?php echo $user->joind_at; ?></td>
</tr>

<?php    }
    }
    
}
    



?>
