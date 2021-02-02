<?php

include '../load.php';
include '../../connect/login.php';

$userid =login::isLoggedIn();

if(isset($_POST['shareText'])){
    $shareText = $_POST['shareText'];
    $postid = $_POST['postid'];
    $userid = $_POST['userid'];
    $profileid = $_POST['profileid'];

    $loadFromUser->create('post', array('userId'=>$userid, 'shareId' => $postid, 'sharedFrom'=>$profileid, 'sharedBy'=>$userid, 'shareText'=>$shareText, 'postBy'=>$profileid, 'postedOn'=>date('Y-m-d H:i:s')));
    
     if($profileid != $userid){
    $loadFromUser->create('notification',array('notificationFrom'=>$userid, 'notificationFor' => $profileid, 'postid' => $postid, 'type'=>'share', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
    }

}
if(isset($_POST['postidd'])){
    $postid = $_POST['postidd'];
    $userid = $_POST['useridd'];
    $profileid = $_POST['profileidd'];
    echo ''.$postid.' '.$userid.' '.$profileid.' ';
   
    $loadFromUser->create('post', array('userId'=>$userid, 'shareId' => $postid, 'sharedFrom'=>$profileid, 'sharedBy'=>$userid, 'postBy'=>$profileid, 'postedOn'=>date('Y-m-d H:i:s')));
    
       if($profileid != $userid){
    $loadFromUser->create('notification',array('notificationFrom'=>$userid, 'notificationFor' => $profileid, 'postid' => $postid, 'type'=>'share', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
    }

}

?>