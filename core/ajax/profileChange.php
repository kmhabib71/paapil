<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();




if(isset($_POST['uid'])){

$uid = $_POST['uid'];
$name_change= $_POST['name_change'];
$bio_change = $_POST['bio_change'];
$location_change = $_POST['location_change'];
$website_change = $_POST['website_change'];
$birthday_change = $_POST['birthday_change'];
$profilePic = "";
$coverPic = "";
if($uid == $userid){

if(!empty($_FILES["coverUpload"]["tmp_name"])){
                $imgeFile_name1 = $_FILES['coverUpload']['name'];
                $imageTmp_name1 = $_FILES['coverUpload']['tmp_name'];

                $imagePath_directory1 = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/coverPhoto/";

                if(!file_exists($imagePath_directory1) && !is_dir($imagePath_directory1)){
                    mkdir($imagePath_directory1, 0777, true);
                }
                move_uploaded_file($imageTmp_name1,$imagePath_directory1.$imgeFile_name1);
                $coverPic = 'user/'.$userid.'/coverPhoto/'.$imgeFile_name1;
}
if(!empty($_FILES["proifleUpload"]["tmp_name"])){
    
        $imgeFile_name2 = $_FILES['proifleUpload']['name'];
                $imageTmp_name2 = $_FILES['proifleUpload']['tmp_name'];

                $imagePath_directory2 = $_SERVER['DOCUMENT_ROOT']."/user/".$userid."/profilePhoto/";

                if(!file_exists($imagePath_directory2) && !is_dir($imagePath_directory2)){
                    mkdir($imagePath_directory2, 0777, true);
                }
                move_uploaded_file($imageTmp_name2,$imagePath_directory2.$imgeFile_name2);
                $profilePic = 'user/'.$userid.'/profilePhoto/'.$imgeFile_name2;
                
}
if($birthday_change == ''){
   $birthday_change = '2020-01-01';
}
if($profilePic == '' && $coverPic == ''){
     $loadFromUser->update('profile',$userid, array('userId'=>$userid, 'full_name'=>$name_change,  'bio'=>$bio_change,'location'=>$location_change, 'website'=>$website_change,'birthday'=>$birthday_change));
     echo 'No pro and cov';
}else if($coverPic == '' && $profilePic != ''){
    $loadFromUser->update('profile',$userid, array('userId'=>$userid, 'full_name'=>$name_change, 'profilePic'=>$profilePic, 'bio'=>$bio_change,'location'=>$location_change, 'website'=>$website_change,'birthday'=>$birthday_change));
    echo 'No pro and Yes cov';
}else if($coverPic != '' && $profilePic == ''){
     $loadFromUser->update('profile',$userid, array('userId'=>$userid, 'full_name'=>$name_change, 'coverPic'=>$coverPic, 'bio'=>$bio_change,'location'=>$location_change, 'website'=>$website_change,'birthday'=>$birthday_change));
     echo 'Yes pro and No cov';
}else{
     $loadFromUser->update('profile',$userid, array('userId'=>$userid, 'full_name'=>$name_change, 'profilePic'=>$profilePic, 'coverPic'=>$coverPic, 'bio'=>$bio_change, 'location'=>$location_change, 'website'=>$website_change,'birthday'=>$birthday_change));
      echo 'Yes pro and Yes cov';
}

    $loadFromUser->userUpdate('users', $userid, $fields = array('birthday'=>$birthday_change));
    
    echo json_encode(['userId'=>$userid, 'full_name'=>$name_change, 'profilePic'=>$profilePic, 'coverPic'=>$coverPic, 'bio'=>$bio_change,'location'=>$location_change,'website'=>$website_change,'birthday'=>$birthday_change]);

}
}