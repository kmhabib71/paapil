<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();
if(isset($_POST['reactType'])){
$reactType = $_POST['reactType'];
$postid = $_POST['postid'];
$userid = $_POST['userid'];
$profileid = $_POST['profileid'];
 
   $loadFromUser->delete('react', array('reactBy'=>$userid, 'reactOn' => $postid, 'reactCommentOn' => '0', 'reactReplyOn'=>'0'));

    $loadFromUser->create('react',array('reactBy'=>$userid, 'reactOn' => $postid, 'reactType' => $reactType,'reactCommentOn' => '0', 'reactReplyOn'=>'0', 'reactOnPostImage' => '0', 'reactOnCommentImage'=>'0','reactTimeOn'=>date('Y-m-d H:i:s')));

if($profileid != $userid){

    $loadFromUser->create('notification',array('notificationFrom'=>$userid, 'notificationFor' => $profileid, 'postid' => $postid, 'type'=>'postReact', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
    }

    $main_react_count = $loadFromPost->main_react_count($postid);


    if($main_react_count->maxreact == '0'){
        
    }else{
        echo $main_react_count->maxreact;
        
        
    }
}


if(isset($_POST['deleteReactType'])){
    $deleteReactType = $_POST['deleteReactType'];
$postid = $_POST['postid'];
$userid = $_POST['userid'];
$profileid = $_POST['profileid'];

    $loadFromUser->delete('react', array('reactBy'=>$userid, 'reactOn' => $postid, 'reactCommentOn' => '0', 'reactReplyOn'=>'0'));

$main_react_count = $loadFromPost->main_react_count($postid);

    if($main_react_count->maxreact == '0'){}else{echo $main_react_count->maxreact ;}

}
if(isset($_POST['commentid'])){
$commentid = $_POST['commentid'];
$reactType = $_POST['reactTypee'];
$postid = $_POST['postid'];
$userid = $_POST['userid'];
$profileid = $_POST['profileid'];
   $loadFromUser->delete('react', array('reactBy'=>$userid, 'reactOn' => $postid, 'reactCommentOn' => $commentid, 'reactReplyOn'=>'0'));

    $loadFromUser->create('react',array('reactBy'=>$userid, 'reactOn' => $postid, 'reactType' => $reactType, 'reactReplyOn'=>'0','reactCommentOn' => $commentid, 'reactTimeOn'=>date('Y-m-d H:i:s')));

 if($profileid != $userid){

    $loadFromUser->create('notification',array('notificationFrom'=>$userid, 'notificationFor' => $profileid, 'postid' => $postid, 'type'=>'commentReact', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
    }
    $com_main_react_count = $loadFromPost->com_main_react_count($postid, $commentid);


    if($com_main_react_count->maxreact == '0'){}else{echo $com_main_react_count->maxreact ;}
}


if(isset($_POST['commentidDelete'])){
    $commentidDelete = $_POST['commentidDelete'];
    $deleteReactType = $_POST['deleteReactTypee'];
$postid = $_POST['postid'];
$userid = $_POST['userid'];
$profileid = $_POST['profileid'];

    $loadFromUser->delete('react', array('reactBy'=>$userid, 'reactOn' => $postid, 'reactCommentOn' => $commentidDelete, 'reactReplyOn'=>'0'));

$com_main_react_count = $loadFromPost->com_main_react_count($postid, $commentidDelete);


    if($com_main_react_count->maxreact == '0'){}else{echo $com_main_react_count->maxreact ;}

}


?>
