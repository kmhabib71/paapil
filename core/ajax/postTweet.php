        <?php
        
        include '../load.php';
        include '../../connect/login.php';
        
        $userid = login::isLoggedIn();
        
        //echo count($_FILES['tweetImagesUpload']);
        //echo $_FILES['tweetImagesUpload']['name'];
        // foreach($_FILES as $file) {
        //            $n = $file['name'];
        //            $s = $file['size'];
        //            if (!$n) continue;
        //            echo "File: $n ($s bytes)";
        //        }
        
        
        
        if(isset($_POST['uid'])){
        
            $pid = $_POST['pid'];
            $uid = $_POST['uid'];
            $postText = $_POST['postText'];
            $hashToData = $_POST['hashToData'];
            $hash = json_decode($hashToData);
            $mentionToData = $_POST['mentionToData'];
            $mention = json_decode($mentionToData);
            $postSchedule = $_POST['postSchedule'];
            $getGmtForSchedule = $_POST['getGmtForSchedule'];
            echo 'post schedule is '.$postSchedule.'';
            
            $sharedVideoStore = $_POST['sharedVideoStore'];
            echo 'this is vid code'.$sharedVideoStore;
            // $sharedVideo = json_decode($sharedVideoStore);
            
            $sharedVidLink = $loadFromPost->sharedVidLink($sharedVideoStore);
            
           
            $count = 0;
            if($hashToData == ''){
                echo 'its empty: '.$hashToData;
            }else{
                echo 'its not empty: '.$hashToData;
                for($i = 0; $i < count(array($hash)); $i++) {
                    $hashValue = $hash[''.$count++.''];
                    $str = substr($hashValue, 1);
                   $loadFromUser->create('trend', array( 'hashtag'=>$str,'hashOn'=>date('Y-m-d H:i:s'))); 
                    echo $hashValue;
                }
            }
        
            $postImageFile = "";
            $videoFile = "";
        
            if($pid == $uid && $uid == $userid){
      
            if(!empty($_FILES['video']['tmp_name'])){
        
            $file_name = $_FILES['video']['name'];
            $tmp_name = $_FILES['video']['tmp_name'];
        
            $path_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/postVideo/";
        
            if(!file_exists($path_directory) && !is_dir($path_directory)){
                mkdir($path_directory, 0777, true);
            }
            move_uploaded_file($_FILES['video']['tmp_name'],$path_directory.$file_name);
            $videoFile = $file_name;
            echo $videoFile;
            
                  function fRand($len) {
            $str = '';
            $a = "abcdefghijklmnopqrstuvwxyz0123456789";
            $b = str_split($a);
            for ($i=1; $i <= $len ; $i++) { 
                $str .= $b[rand(0,strlen($a)-1)];
                }
                return $str;
            }
            
            $vid = fRand(8);
            
         
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
        
                        $imagePath_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/postImage/";
        
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
                $postImageFile = $imgArr;
        
                }else{
                    echo 'Files not found';
                }
        
        //        insertPost($userid, $postText, $postImageFile, $videoFile);
        echo 'this is for video share post id'.$sharedVidLink->post_id.'';
        
        if(empty($postSchedule)){
        
                $postid = $loadFromUser->create('post', array('userId'=>$userid, 'post'=>$postText, 'postBy'=>$userid,'postImage'=>$postImageFile, 'postVideo'=>$videoFile, 'postedOn'=>date('Y-m-d H:i:s'), 'vidShare'=>$sharedVidLink->post_id, 'vid' => $vid));
                echo 'from post normal post store';
                
                 $counta = 0;
            if($mentionToData == ''){
                echo 'its empty: '.$mentionToData;
            }else{
                echo 'its not empty: '.$mentionToData;
                for($i = 0; $i < count(array($mention)); $i++) {
                    $mentionValue = $mention[''.$counta++.''];
                    $stra = substr($mentionValue, 1);
                    $mentionUserId = $loadFromUser->mentionUserId($stra);
                    $loadFromUser->create('notification',array('notificationFrom'=>$userid, 'notificationFor' => $mentionUserId, 'postid' => $postid, 'type'=>'mention', 'status'=> '0', 'notificationCount'=>'0', 'notificationOn'=>date('Y-m-d H:i:s')));
                    
                }
            }
        
                echo json_encode(['userid'=>$userid, 'post_text'=> $postText, 'post_image'=>$postImageFile, 'post_video'=>$videoFile]);
                
        }else{
             $postid = $loadFromUser->create('postSchedule', array('userId'=>$userid, 'post'=>$postText, 'postBy'=>$userid,'postImage'=>$postImageFile, 'postVideo'=>$videoFile, 'postDate'=>$postSchedule, 'postedOn'=>date('Y-m-d H:i:s'), 'vidShare'=>$sharedVidLink->post_id, 'vid' => $vid, 'getGmtForSchedule'=> $getGmtForSchedule ));
             
             $loadFromUser->create('events', array('id'=>$postid,'userid'=>$userid, 'title'=>$postText, 'start_event'=>$postSchedule, 'end_event'=>$postSchedule));
             echo 'from post schedule store';
             
             
        }
                    
        
            } else {
            echo 'User not found';
            }
        }
        if(isset($_POST['uidForEdit'])){
            $pid = $_POST['pid'];
            $uid = $_POST['uidForEdit'];
            $postText = $_POST['postText'];
            $postImage = $_POST['editImage'];
            $post_id = $_POST['postid'];
            $postImageFile = "";
            $videoFile = "";
        
            if($pid == $uid && $uid == $userid){
        
            if(!empty($_FILES['video']['tmp_name'])){
        
            $file_name = $_FILES['video']['name'];
            $tmp_name = $_FILES['video']['tmp_name'];
        
            $path_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/postVideo/";
        
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
        
                        $imagePath_directory = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/postImage/";
        
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
        $loadFromUser->postImageUpd($uid, $post_id, $postText, $postImage);
        
                // echo json_encode(['userid'=>$uid, 'postid'=>$post_id, 'post_text'=> $postText, 'postImage'=>$postImage, 'post_video'=>$videoFile]);
        
            } else {
            echo 'User not found';
            }
        }
        
        
        ?>
