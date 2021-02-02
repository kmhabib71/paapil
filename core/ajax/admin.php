<?php
include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();

if(isset($_POST['deleteUser'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deleteUser']);
    $userid = $_POST['userid1'];
    $loadFromUser->delete('token', array('user_id'=>$deleteUser));
    $loadFromUser->delete('users', array('user_id'=>$deleteUser));
    $loadFromUser->delete('profile', array('userId'=>$deleteUser));
    echo 'User Deleted Succesfully';
}
if(isset($_POST['deletePost'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deletePost']);
    $userid = $_POST['userid2'];
    $loadFromUser->delete('post', array('post_id'=>$deleteUser));
    echo 'Post Deleted Succesfully';
}
if(isset($_POST['deleteComment'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deleteComment']);
    $userid = $_POST['userid3'];
    $loadFromUser->delete('comments', array('commentID'=>$deleteUser));
    echo 'Comment Deleted Succesfully';
}
if(isset($_POST['deleteTrend'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deleteTrend']);
    $userid = $_POST['userid4'];
    $loadFromUser->delete('trend', array('trendid'=>$deleteUser));
    echo 'Hashtag Deleted Succesfully';
}
if(isset($_POST['deleteMessage'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deleteMessage']);
    $userid = $_POST['userid5'];
    $loadFromUser->delete('messages', array('messageID'=>$deleteUser));
    echo 'Message Deleted Succesfully';
}
if(isset($_POST['deleteBlock'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deleteBlock']);
    $userid = $_POST['userid6'];
    $loadFromUser->delete('block', array('blockID'=>$deleteUser));
    echo 'Block Deleted Succesfully';
}
if(isset($_POST['deleteReport'])){
    $deleteUser = $loadFromUser->checkInput($_POST['deleteReport']);
    $userid = $_POST['userid7'];
    $loadFromUser->delete('report', array('reportID'=>$deleteUser));
    echo 'Report Deleted Succesfully';
}
?>