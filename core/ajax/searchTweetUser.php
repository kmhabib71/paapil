<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();

if(isset($_POST['searchVal'])){
    $search = $_POST['searchVal'];
    
    $searchUser = $loadFromPost->searchText($search);
    if(!empty($searchUser)){
      
    foreach($searchUser as $user){
        ?>
<a class="dropdown-item" href="<?php echo BASE_URL.$user->username; ?>" target="__blank" style="border:1px solid #80808033;/* display: flex; */padding: 5px 0px;"> <span style="margin-left:5px;display: flex;justify-content: flex-start;align-items: center;"><img src="<?php echo BASE_URL.$user->profilePic; ?>" style="height:40px;width:40px;border-radius:50%;margin-right:5px;" alt="">
        <div style="">
            <div style="font-weight:600;"><?php echo $user->full_name; ?></div>
            <div style="color:lightgray;">@<?php echo $user->username; ?></div>
        </div>
    </span></a>


<?php
        
    }
        }
    
}
