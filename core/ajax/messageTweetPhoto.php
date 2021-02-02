<?php
include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();


if(!empty($_FILES["files"]["tmp_name"])){

        $imgArr = "";
    $imgArr .= "[";
    foreach ($_FILES["files"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $imgArr .= "{";
                $imgArr .= '"imageName": "'.$_FILES["files"]["name"][$key].'"';

                $imgeFile_name = $_FILES['files']['name'][$key];
                $imageTmp_name = $_FILES['files']['tmp_name'][$key];

                $imagePath_directory = $_SERVER['DOCUMENT_ROOT']."/twitter/user/".$user_id."/msgPhoto/";

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
        
    $loadFromUser->create('message', array('userId'=>$userid, 'msgImage'=>$imgArr, 'postBy'=>$userid,'postImage'=>$postImageFile, 'postVideo'=>$videoFile, 'postedOn'=>date('Y-m-d H:i:s')));
    echo $imgArr;

        }
?>
