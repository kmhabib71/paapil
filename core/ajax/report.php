<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();




if(isset($_POST['reportVal'])){

    $reportVal = $_POST['reportVal'];
    $postid = $_POST['postid'];
    $postby = $_POST['postby'];
    
    $loadFromUser->create('report', array('report'=>$reportVal, 'reportBy'=>$userid,'useridReported'=>$postby, 'reportPostOn'=>$postid, 'reportOn'=>date('Y-m-d H:i:s')));
}
    
    ?>