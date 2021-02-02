    <?php
        include 'connect/login.php';
        include 'core/load.php';
        if(login::isLoggedIn()){
        $userid=login::isLoggedIn();
        }else{
        header('location:log.php');
        }
        
        if(isset($_POST['schTime'])){
         $userSchedule = $_POST['schTime'];   
        $allSchedule = $loadFromPost->getOnlySchedule();
        
        foreach($allSchedule as $allsch){
           $currentPostDate = $allsch->postDate;
           $userGMT =  $allsch->getGmtForSchedule.'</br>';
           $updatedTime = 3600*$userGMT ;
            $schTime=strtotime($currentPostDate);
           $adjustedTime =  date("Y-m-d H:i:s",$schTime - $updatedTime.' hours')  ;
           $serverTime = date('Y-m-d H:i:s');
           if($adjustedTime == $serverTime){
              $loadFromUser->create('post', array('userId'=>$allsch->postBy, 'post'=>$allsch->post, 'postBy'=>$allsch->postBy,'postImage'=>$allsch->postImage, 'postVideo'=>$allsch->postVideo, 'postedOn'=>date('Y-m-d H:i:s'), 'vidShare'=>$allsch->vidShare, 'vid' => $allsch->vid));
              $loadFromUser->delete('events', array('id'=>$allsch->post_id));
           }
        }
        
        }
//         echo 'server time '.date("Y-m-d H:i:s").'</br>';
//         $new_time = date("Y-m-d H:i:s", strtotime('+6 hours'));
//   echo $new_time;

    ?>
    <script>
       var d = new Date();
  var n = d.getUTCDate();

// alert(d);
    </script>
    
    
    
    