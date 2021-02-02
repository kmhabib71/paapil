<?php
include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();

if(isset($_POST['useridForAjax'])){

$useridForAjax = $_POST['useridForAjax'];
    $otherid = $_POST['otherid'];
    $msg = $_POST['msg'];

    
    $imgArr = "";
    if(!empty($_FILES["files"]["tmp_name"])){

        
    $imgArr .= "[";
    foreach ($_FILES["files"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $imgArr .= "{";
                $imgArr .= '"imageName": "'.$_FILES["files"]["name"][$key].'"';

                $imgeFile_name = $_FILES['files']['name'][$key];
                $imageTmp_name = $_FILES['files']['tmp_name'][$key];

                $imagePath_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$user_id."/msgPhoto/";

                if(!file_exists($imagePath_directory) && !is_dir($imagePath_directory)){
                    mkdir($imagePath_directory, 0777, true);
                }
                move_uploaded_file($imageTmp_name,$imagePath_directory.$imgeFile_name);

                 $imgArr .= '},';

                } else {
                    echo "There was an error uploading the file, please try again!";
                }
            }
        $imgArr = substr($imgArr, 0, strlen($imgArr)-1);
                        $imgArr .= "]";
        
//    $loadFromUser->create('message', array('userId'=>$userid, 'msgImage'=>$imgArr, 'postBy'=>$userid,'postImage'=>$postImageFile, 'postVideo'=>$videoFile, 'postedOn'=>date('Y-m-d H:i:s')));
//    echo $imgArr;

        }
    
    
    
    
    $loadFromUser->create('messages', array("message" => $msg, "msgImage" => $imgArr,  'messageTo'=>$otherid, 'messageFrom'=> $useridForAjax, 'messageOn' => date('Y-m-d H:i:s') ));

    $loadFromUser->delete('notification', array("notificationFrom"=>$useridForAjax, 'notificationFor' => $otherid, 'type' => 'message'));


    // if($otherid != $useridForAjax){

    // $loadFromUser->create('notification',array('notificationFrom'=> $useridForAjax , 'notificationFor' => $otherid, 'postid' => '0', 'type'=>'message', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
    // }



        $messageData = $loadFromPost->messageData($useridForAjax, $otherid);

    foreach($messageData as $message){
if($message->messageFrom == $useridForAjax){ ?>

<div class="right-msg" style="align-items: center;">
    <div class="right-receiver-text-time">
        <div class="receiver-text" style="background-color:#03A9F4;color:white;max-width: 100%;">
            <?php echo $message->message; ?>
        </div>
        <div class="receiver-time" style="margin-right:10px;">
            <?php echo $loadFromUser->timeAgoForCom($message->messageOn);  ?>
        </div>
    </div>
    <div class="receiver-img" style="align-self: flex-end;">
        <img src="<?php echo $message->profilePic; ?>" alt="" style="height:30px; width:30px; border-radius:50%;">
    </div>
</div>

<?php
}else{ ?>
<div class="left-msg">
    <div class="receiver-img">
        <img src="<?php echo $message->profilePic; ?>" alt="" style="height:30px; width:30px; border-radius:50%;">
    </div>
    <div class="receiver-text-time">
        <div class="receiver-text" style="background-color: ghostwhite;
    box-shadow: 0 0 2px;max-width: 100%;
">
            <?php echo $message->message; ?>
        </div>
        <div class="imgContainer">
            <?php $imgJson = json_decode($message->msgImage);
                            $count = 0;
                                for($i = 0; $i < count($imgJson); $i++) {
                                    echo '  <div class="post-img-box" data-postImgID="'.$message->messageID.'" style="max-height: 100px;max-width:100px;
    overflow: hidden;"><img src="'.BASE_URL.$imgJson[''.$count++.'']->imageName.'" class="postImage" data-userid="'.$user_id.'" data-postid="'.$message->messageID.'" data-profileid="'.$message->messageTo.'" alt="" style="width: 100%;cursor:pointer;"></div>';
                                }
                ?>
        </div>
        <div class="receiver-time" style="margin-left:10px;">
            <?php echo $loadFromUser->timeAgoForCom($message->messageOn);  ?>
        </div>
    </div>

</div>


<?php
}

    }
}

if(isset($_POST['showmsg'])){

$otherid = $_POST['showmsg'];
    $useridForAjax = $_POST['yourid'];

        $messageData = $loadFromPost->messageData($useridForAjax, $otherid);
echo '<div class="past-data-count" data-datacount="'.count($messageData).'"></div>';
    foreach($messageData as $message){
if($message->messageFrom == $useridForAjax){ ?>

<div class="right-msg" style="align-items: center;">
    <!--               ...........New edit for messenger course.............-->
    <div class="msg-option" style="display:flex;flex-direction:row-reverse; cursor:pointer;height:100%;position:relative;">
        <div class="single-msg-open" data-messageid="<?php echo $message->messageID; ?>" style="position:absolute;display:none;margin-top:-12px; margin-right:5px;">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </div>
        <div class="msg-option-click"  style="font-size:16px; font-weight:600;color:lightgray;margin-bottom: 16px;margin-right: 5px;"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
    </div>
    <!--               ...........New edit for messenger course.............-->
    <div class="right-receiver-text-time">
        <div class="receiver-text" style="background-color:#03A9F4;color:white;box-shadow: 0 0 3px grey;">
            <?php echo $message->message; ?>
        </div>
        <div class="imgContainer" style="display: flex;justify-content: center;align-items: center;background-color:#03A9F4;color:white;">
            <?php $imgJson = json_decode($message->msgImage);
                            $count = 0;
                                for($i = 0; $i < count((array)$imgJson); $i++) {
                                    echo '  <div class="post-img-box" data-postImgID="'.$message->messageID.'" style="max-height: 100px;max-width:100px;
    overflow: hidden;"><img src="'.BASE_URL.'user/'.$useridForAjax.'/msgPhoto/'.$imgJson[''.$count++.'']->imageName.'" class="postImage" data-userid="'.$useridForAjax.'" data-postid="'.$message->messageID.'" data-profileid="'.$message->messageTo.'" alt="" style="width: 100%;cursor:pointer;"></div>';
                                }
                ?>
        </div>


        <div class="receiver-time" style="margin-right:10px;">
            <?php echo $loadFromUser->timeAgoForCom($message->messageOn);  ?>
        </div>
    </div>
    <div class="receiver-img" style="align-self: flex-end;">
        <img src="<?php echo $message->profilePic; ?>" alt="" style="height:30px; width:30px; border-radius:50%;">
    </div>
</div>

<?php
}else{ ?>
<div class="left-msg">
    <div class="receiver-img">
        <img src="<?php echo $message->profilePic; ?>" alt="" style="height:30px; width:30px; border-radius:50%;">
    </div>
    <div class="receiver-text-time">
        <div class="receiver-text" style="background-color: ghostwhite;box-shadow: 0 0 3px grey;
">
            <?php echo $message->message; ?>
        </div>
        <div class="single-msg-option"> </div>
        <div class="imgContainer" style="display: flex;justify-content: center;align-items: center;">
            <?php $imgJson = json_decode($message->msgImage);
                            $count = 0;
                                for($i = 0; $i < count((array)$imgJson); $i++) {
                                    echo '  <div class="post-img-box" data-postImgID="'.$message->messageID.'" style="max-height: 100px;max-width:100px;
    overflow: hidden;"><img src="'.BASE_URL.'user/'.$useridForAjax.'/msgPhoto/'.$imgJson[''.$count++.'']->imageName.'" class="postImage" data-userid="'.$useridForAjax.'" data-postid="'.$message->messageID.'" data-profileid="'.$message->messageTo.'" alt="" style="width: 100%;cursor:pointer;"></div>';
                                }
                ?>
        </div>
        
        <div class="receiver-time" style="margin-left:10px;">
            <?php echo $loadFromUser->timeAgoForCom($message->messageOn);  ?>
        </div>
    </div>
    <div class="msg-option" style="display:flex;flex-direction:row-reverse; cursor:pointer;height: auto;align-items: center;justify-content: center;margin-left: 5px;position:relative;">
        
       
        <div class="msg-option-click" style="font-size:16px; font-weight:600;color:lightgray;margin-bottom: 12px;margin-right: 5px;"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
        <div class="single-msg-open" data-messageid="<?php echo $message->messageID; ?>" style="position:absolute;display:none;margin-top:-16px; margin-right:5px;">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </div>
    </div>

</div>


<?php
}

    }
}

if(isset($_POST['dataCount'])){
$otherid = $_POST['dataCount'];
    $useridForAjax = $_POST['profileid'];

        $messageData = $loadFromPost->messageData($useridForAjax, $otherid);
    echo count($messageData);


}





?>
