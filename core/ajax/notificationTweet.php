<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();

if(isset($_POST['counterReset'])){
    
    $loadFromPost->notificationCountReset($userid);
    echo count($loadFromPost->notificationCount($userid));
    
}

if(isset($_POST['msgCounterReset'])){
    
    $loadFromPost->msgNotificationCountReset($userid);
    echo count($loadFromPost->msgNotificationCount($userid));
    
}
?>