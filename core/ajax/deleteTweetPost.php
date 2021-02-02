<?php

include '../load.php';
include '../../connect/login.php';

$userid =login::isLoggedIn();


if(isset($_POST['postid'])){

    $postid= $_POST['postid'];
    $userid=$_POST['userid'];
    $loadFromUser->delete('post', array('post_id'=>$postid, 'userId'=>$userid));
    
        echo 'Tweet deleted seccessfully.';





}




?>