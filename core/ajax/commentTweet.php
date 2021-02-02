<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();




if(isset($_POST['uid'])){

    $uid = $_POST['uid'];
    $profileid = $_POST['pid'];
    $postid = $_POST['postid'];
    $commentidd = $_POST['commentid'];
    $commentVal = $_POST['commentVal'];

 if($profileid != $userid){

    $loadFromUser->create('notification',array('notificationFrom'=>$userid, 'notificationFor' => $profileid, 'postid' => $postid, 'type'=>'comment', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
    }
   

    if(!empty($_FILES['commentVideo']['tmp_name'])){

    $file_name = $_FILES['commentVideo']['name'];
    $tmp_name = $_FILES['commentVideo']['tmp_name'];

    $path_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/commentVideo/";

    if(!file_exists($path_directory) && !is_dir($path_directory)){
        mkdir($path_directory, 0777, true);
    }
    move_uploaded_file($_FILES['commentVideo']['tmp_name'],$path_directory.$file_name);
    $commentVideo = $file_name;

    }else{
        echo 'video not found';
    }

    // if(!empty($_FILES['commentImage']['tmp_name'])){

    // $file_name1 = $_FILES['commentImage']['name'];
    // $tmp_name1 = $_FILES['commentImage']['tmp_name'];

    // $path_directory1 = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/commentImage/";

    // if(!file_exists($path_directory1) && !is_dir($path_directory1)){
    //     mkdir($path_directory1, 0777, true);
    // }
    // move_uploaded_file($_FILES['commentImage']['tmp_name'],$path_directory1.$file_name1);
    // $commentImage = $file_name1;

    // }else{
    //     // echo 'video not found';
    // }
if(!empty($_FILES["files"]["tmp_name"])){
        
                $imgArr = "";
            $imgArr .= "[";
            foreach ($_FILES["files"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $imgArr .= "{";
                        $imgArr .= '"imageName": "'.$_FILES["files"]["name"][$key].'"';
        
                        $imgeFile_name = $_FILES['files']['name'][$key];
                        $imageTmp_name = $_FILES['files']['tmp_name'][$key];
        
                        $imagePath_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/commentImage/";
        
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
                $commentImageFile = $imgArr;
        echo $commentImageFile;
                }else{
                    echo 'Files not found';
                }
if($commentidd == ''){
    echo $postid;
     $commentid = $loadFromUser->create('comments', array('commentBy'=>$userid, 'comment_parent_id' => $postid,'commentReplyID' => '0','replyID' => '0','commentOnPostImage' => '0','commentOnCommentImage' => '0','comment'=>$commentVal, 'commentOn'=>$postid, 'commentImage'=>$commentImageFile, 'commentAt' => date('Y-m-d H:i:s')));
}else{
 $commentid = $loadFromUser->create('comments', array('commentBy'=>$userid, 'comment_parent_id' => $postid,'commentReplyID' => $commentidd,'replyID' => '0','commentOnPostImage' => '0','commentOnCommentImage' => '0', 'comment'=>$commentVal, 'commentOn'=>$postid, 'commentImage'=>$commentImageFile,'commentAt' => date('Y-m-d H:i:s')));
}

  $commentDetails = $loadFromPost->lastCommentFetch($commentid);



    if(!empty($commentDetails)){
             foreach($commentDetails as $comment){
                 $com_main_react_count = $loadFromPost->com_main_react_count($comment->commentOn, $comment->commentID);
                 $commentReactCheck = $loadFromPost->commentReactCheck($userid, $comment->commentOn, $comment->commentID);
?>
    <div class="comment-show-container" style="display: flex;background-color: white;margin:5px;">
        <div class="col-1 comment-u-img-box">
            <img class="" src="<?php echo BASE_URL.$comment->profilePic; ?>" style="height:40px;width:40px;border-radius:50%" alt="cover" />
        </div>
        <div class="col-10" style="padding-left:35px">
            <div class="commentUserIntro">
                <span class="commentIntroName"><?php echo $comment->full_name; ?></span><span class="commentIntroUsername"> @<?php echo $comment->username; ?></span> - <span class="commentIntroDate">Jul 11</span>
            </div>
            <div class="commentDetails pb-2 pt-2">
                <span class="commentDetailsText"><?php echo $comment->comment; ?></span>
            </div>
            <div class="commentAction d-flex align-items-center pb-2 border-bottom">
                <div class="comReactContainer text-secondary" data-userid="<?php echo $userid; ?>" data-postid="<?php echo $postid; ?>" data-commentid="<?php echo $comment->commentID; ?>" style="cursor:pointer;">
                    <?php if(empty($commentReactCheck)){ ?>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <?php }else{ ?>
                    <i class="fa fa-heart text-danger" aria-hidden="true"></i>
                    <?php } ?>
                    <span class="pl-1 pr-5 react-count"> <?php
            if($com_main_react_count->maxreact == '0'){}else{
                echo $com_main_react_count->maxreact;
            }            ?></span>
                </div>
                <div class="comCommentContainer text-secondary" style="cursor:pointer;" data-toggle="modal" data-target="#commentModal" data-postid="<?php echo $postid; ?>" data-commentid="<?php echo $comment->commentID; ?>">
                    <i class="fa fa-comment-o" aria-hidden="true"></i><span class="pl-1 pr-5"> 12</span>
                </div>


            </div>


        </div>
        <div class="col-1" style="padding: 0 5px;"><i class="fa fa-angle-down" aria-hidden="true"></i>
        </div>
    </div>



    <?php
             }
    }

   
}
if(isset($_POST['commentid'])){
    
    $commentid = $_POST['commentid'];
    $userid = $_POST['useridd'];
    $loadFromUser->delete('comments', array('commentID'=>$commentid,'commentBy'=>$userid));
    echo 'Found';
}else{
    echo 'Not found';
}

if(isset($_POST['uidForComEdit'])){
            $pid = $_POST['pid'];
            $uid = $_POST['uidForComEdit'];
            $commentText = $_POST['commentText'];
            // $postText = $_POST['postText'];
            $postImage = $_POST['editImage'];
            $commentid = $_POST['commentid'];
            $postImageFile = "";
            $videoFile = "";
        
       
        
            if(!empty($_FILES['video']['tmp_name'])){
        
            $file_name = $_FILES['video']['name'];
            $tmp_name = $_FILES['video']['tmp_name'];
        
            $path_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/commentVideo/";
        
            if(!file_exists($path_directory) && !is_dir($path_directory)){
                mkdir($path_directory, 0777, true);
            }
            move_uploaded_file($_FILES['video']['tmp_name'],$path_directory.$file_name);
            $videoFile = $file_name;
        
            }else{
                echo 'video not found';
            }
        
            if(!empty($_FILES["files"]["tmp_name"])){
        
                $imgArr = "";
            $imgArr .= "[";
            foreach ($_FILES["files"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $imgArr .= "{";
                        $imgArr .= '"imageName": "'.$_FILES["files"]["name"][$key].'"';
        
                        $imgeFile_name = $_FILES['files']['name'][$key];
                        $imageTmp_name = $_FILES['files']['tmp_name'][$key];
        
                        $imagePath_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/commentImage/";
        
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
                
        
                }else{
                    echo 'Files not found';
                }
        
        //        insertPost($userid, $postText, $postImageFile, $videoFile);
        // $loadFromUser->postImageUpd($uid, $post_id, $postText, $postImage);
        $loadFromPost->commentUpd($uid, $commentText, $commentid,$imgArr,$videoFile);
        
                // echo json_encode(['userid'=>$uid, 'postid'=>$post_id, 'post_text'=> $postText, 'postImage'=>$postImage, 'post_video'=>$videoFile]);
        
          
        }

?>
