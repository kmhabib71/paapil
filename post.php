<?php
include 'connect/login.php';
include 'core/load.php';
if(login::isLoggedIn()){
$userid=login::isLoggedIn();
}else{
header('location:log.php');
}


if(isset($_GET['postid']) == true && empty($_GET['postid']) === false){
    $postid = $_GET['postid'];
    
 $user_id = $userid;   
$username=$loadFromUser->checkInput($_GET['username']);
$profileId=$loadFromUser->userIdByUsername($username);
}else{
$username=$loadFromUser->usernameFetch($userid);    
$profileId=$loadFromUser->userIdByUsername($username);
}
$profileData=$loadFromUser->userData($profileId);
$userData=$loadFromUser->userData($userid);

if($userData->email == ''){
    
   
    
}else{
   
 if($userData->varification_status == '1'){
    
    
}else{
   $verifyShow = '<div class="verify-noti d-flex justify-content-center align-items-center btn btn-warning"><span style=" font-weight: 900; margin-right: 5px;">Verify </span><span> your profile. Paapil have sent you an email.</span> </div>';
}
   
}
if($userData->username == ''){
    $value = $userData->full_name;
    $usernameT =  strtok($value, " ");
    $usernameTook = $usernameT.rand();
    $loadFromUser->userUpdate('users', $userid, array('username'=>$usernameTook));
    header("Refresh:0");
    
}else{
   
}

$requestCheck=$loadFromPost->requestCheck($userid, $profileId);
$requestConf=$loadFromPost->requestConf($profileId, $userid);
$followerCount= $loadFromPost->followerCount($profileId);
$followingCount= $loadFromPost->followingCount($profileId);
$otherUsers=$loadFromPost->otherUsers($profileId, $userid);
$notification=$loadFromPost->notification($userid);
$notificationCount=$loadFromPost->notificationCount($userid);
$requestNotificationCount=$loadFromPost->requestNotificationCount($useri);
$messageNotification=$loadFromPost->messageNotificationCount($userid);

$post = $loadFromPost->postDetails($postid);

  $main_react = $loadFromPost->main_react($user_id, $post->post_id);
            $react_max_show = $loadFromPost->react_max_show($post->post_id);
            $main_react_count = $loadFromPost-> main_react_count($post->post_id);

            $commentDetails = $loadFromPost->commentFetch($post->post_id);
            $totalCommentCount = $loadFromPost->totalCommentCount($post->post_id);
            $totalShareCount = $loadFromPost->totalShareCount($post->post_id);
            if(empty($post->shareId)){}else{
                $shareDetails = $loadFromPost->shareFetch($post->shareId, $post->postBy);
            }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $profileData->full_name; ?>| Paapil</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300;300i;400;400i;600;600i;700;700i|Raleway:300;300i;400;400i;500;500i;600;600i;700;700i|Poppins:300;300i;400;400i;500;500i;600;600i;700;700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" media="screen and (min-width: 601px)">
    <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (max-width: 600px)">

    <link href="assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="assets/dist/emojionearea.min.css">
    <!-- =======================================================
        * Template Name: Vesperr - v2.1.0
        * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
        <style>
            .noti-wrap{
                max-height: 330px;
                overflow-y: scroll;
            }
            .noti-wrap::-webkit-scrollbar {
            display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
                .noti-wrap {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }
            .noti-count {
                /*padding: 3px 4.5px;*/
                    width: 27px;
                    text-align: center;
                    background-color: #3498db;
                    border-radius: 50%;
                    height: 27px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 12px;
                    border: 2px solid mintcream;
                    box-shadow: 0 0 3px grey;
                    color:white;
            }
             .msg-noti-count {
                /*padding: 3px 4.5px;*/
                    width: 27px;
                    text-align: center;
                    background-color: #3498db;
                    border-radius: 50%;
                    height: 27px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 12px;
                    border: 2px solid mintcream;
                    box-shadow: 0 0 3px grey;
                    color:white;
            }
            span.noti-count-wrap {
                position: absolute;
                right: -20px;
                top: -4px;
            }
            section.bioWrap {
                margin-top: 68px;
                height: 100vh;
                overflow-y: scroll;
            }
            section.bioWrap::-webkit-scrollbar {
            display: none;
            }

            /* Hide scrollbar for IE, Edge and Firefox */
                section.bioWrap {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }
        </style>

</head>

<body>

    
    
    
    
    
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center justify-content-between" style="background-color:white;box-shadow: 1px 1px 5px grey">
        <div class="logo-head">
            <h5 class="profile-show">Profile</h5>
            <div class="mobile-logo"><i class="fa fa-twitter" aria-hidden="true"></i></div>
            <div class="mobile-search" style="    font-size: 20px;"><i class="fa fa-search" aria-hidden="true"></i></div>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active" style="margin-right:10px;"><a href="index.php" ><i class="fa fa-home" aria-hidden="true"></i><span class="pl-0.5">Home</span></a></li>
                <li style="margin-right:10px;">
                    <div class="dropdown open ">
                        <div class=" dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                            <a href="#services" class="msg-notification-container" style="position:relative;">
                                <i class="fa fa-envelope" aria-hidden="true"></i><span class="noti-count-wrap" ><?php if(count($loadFromPost->msgNotificationCount($userid)) == '0'){}else{ echo '<div class="msg-noti-count" style="background-color: #dc3545;;">'.count($loadFromPost->msgNotificationCount($userid)).'</div>'; } ?></span><span class="pl-0.5">Message</span></a>
                        </div>

                        <div class="dropdown-menu noti-wrap" style="box-shadow: 0px 0px 5px grey;">
                        <?php $notification = $loadFromPost->msgNotification($userid); 
                        foreach($notification as $noti){
                            
                        ?>
                            <a class="dropdown-item d-flex justify-content-start align-items-center" href="messenger.php?username=<?php echo $noti->username; ?>" style="padding: 8px 20px 12px 18px !important;">
                                <div class="noti-user-img"><img src="<?php echo BASE_URL.$noti->profilePic; ?>" style="height:40px;width:40px;border-radius:50%;" alt="" /></div>
                                <div class="noti-user-name" style="font-weight:600;margin-left:5px;"><?php echo $noti->full_name; ?></div>
                                <div class="noti-text" style="margin-left:5px;">
                                messaged you
                                </div>
                            </a>
                            <?php  } ?>
                            
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown open ">
                        <div class=" dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                            <a href="#services" class="notification-container" style="position:relative;">
                                <i class="fa fa-bell" aria-hidden="true"></i><span class="noti-count-wrap"><?php if(count($loadFromPost->notificationCount($userid)) == '0'){}else{ echo '<div class="noti-count">'.count($loadFromPost->notificationCount($userid)).'</div>'; } ?></span><span class="pl-0.5">Notification</span></a>
                        </div>

                        <div class="dropdown-menu noti-wrap" style="box-shadow: 0px 0px 5px grey;">
                        <?php $notification = $loadFromPost->notification($userid); 
                        foreach($notification as $noti){
                            
                        ?>
                            <a class="dropdown-item d-flex justify-content-start align-items-center" href="post.php?username=<?php echo $noti->username; ?>&postid=<?php echo $noti->postid; ?>" style="padding: 8px 20px 12px 18px !important;">
                                <div class="noti-user-img"><img src="<?php echo BASE_URL.$noti->profilePic; ?>" style="height:40px;width:40px;border-radius:50%;" alt="" /></div>
                                <div class="noti-user-name" style="font-weight:600;margin-left:5px;"><?php echo $noti->full_name; ?></div>
                                <div class="noti-text" style="margin-left:5px;"><?php 
                                
                                switch ($noti->type) {
                                case "comment":
                                    echo "commented in your post";
                                    break;
                                case "share":
                                    echo "Shared your post";
                                    break;
                                case "postReact":
                                    echo "reacted on your post";
                                    break;
                                case "commentReact":
                                    echo "reacted on your comment";
                                    break;
                                case "mention":
                                    echo "mentioned you";
                                    break;
                                default:
                                    echo "No notification";
                                }
                                
                                
                                
                                
                                ?></div>
                            </a>
                            <?php  } ?>
                            
                        </div>
                    </div>




                </li>


            </ul>
        </nav>

        <div class="logo d-flex align-items-center justify-content-center mr-4">

            <div class="dropdown open">
                <div class="reTweetContainer dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                    <div class="input-group">
                        <input type="text" class="form-control search-user" placeholder="Search in twitter" aria-label="Recipient's username" aria-describedby="basic-addon2" />
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>

                <div class="search-show"
                    <div class="search-spinner"></div>
                    <div class="dropdown-menu search-user-show" style="box-shadow: 0px 0px 5px grey;display:none;width: 100%;">



                </div>
            </div>



            <div class="get-started"><a href="#" data-toggle="modal" data-target="#createTweet">Tweet</a></div>

        </div>


    </header>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <div class="ui" data-uid="<?php echo $userData->user_id ?>" data-pid="<?php echo $profileId; ?>"></div>
    <main id="main">
        <!-- ======= Clients Section ======= -->
        
        <section class="bioWrap" style="margin-top: 68px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 card" style="background-color: #f8f9fa87 !important;padding-top:10px;visibility: hidden;">
                        <div class="userScreenName"><span> <?php echo $profileData->full_name; ?></span></div>
                        <div class="usersUserName"><span>@<?php echo $profileData->username; ?></span></div>
                        <div class="userWebsite text-primary"><span><i class="fa fa-link" aria-hidden="true"></i><span class="pl-1">kmhabib.com</span></span>
                        </div>
                        <div class="area-join">
                            <div class="userLiveIn text-primary"><span><i class="fa fa-location-arrow" aria-hidden="true"></i><span class="pl-1">Chittagong; Bangladesh</span></span>
                            </div>
                            <div class="userJoinedIn"><span><i class="fa fa-calendar" aria-hidden="true"></i><span class="pl-1">Joined July 2020</span></span>
                            </div>
                        </div>
                        <div class="mobile-foll" style="margin-bottom:10px;">
                            <div class="mobile-following" style=" color:gray;">
                                <snap style="font-weight:600; color:black;margin-right: 5PX;"><?php if(empty($followingCount)){echo '0';}else{echo count($followingCount); } ?></snap>Following
                            </div>
                            <div class="mobile-follower" style=" color:gray;">
                                <snap style="font-weight:600;margin-right:5px; color:black;margin-left:10px;"><?php if(empty($followerCount)){echo '0';}else{echo count($followerCount); } ?></snap>Followers
                            </div>
                            

                        </div>
                   
                        <div class="dropdown open" style="display: inherit;margin-top: 10px;">
                <div class="reTweetContainer text-secondary dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                    <div class="profile-more" style="color:gray;"><i class='bx bx-dots-horizontal-rounded'></i>
                </div>
                </div>

                <div class="dropdown-menu" style="box-shadow: 0px 0px 5px grey;">

                                             <?php
                        if($userid == $profileId){
                            ?>
                            <a class="dropdown-item block-user" data-profileid="<?php echo $profileId; ?>" href="settings.php"><i class="fa fa-cogs" aria-hidden="true"></i> <span style="margin-left:5px;">Settings</span></a>
                            <?php
                        }else{
                    ?>
                     <a class="dropdown-item block-user" data-profileid="<?php echo $profileId; ?>" data-toggle="modal" data-target="#block-modal" href="#!"><i class="fa fa-ban" aria-hidden="true"></i> <span style="margin-left:5px;">Block</span></a>
                    <?php } ?> 
                </div>
           
            </div>
                        

                        <?php $showTrend = $loadFromPost->showTrend();
                       
                            if(!empty($showTrend)){
                        echo '<div class="trend-wrapp" style="margin-top: 20px;"><h5 style="font-weight: 900;color: black;
                            ">Trends For You</h5><ul style="list-style: none;padding-left: 0;">';
                        foreach($showTrend as $trend){ 
                             if(!empty($trend->hashtag)){
                            ?>
                        <li>
                                <div class="hash-headline" style="font-size: 18px;font-weight:600;color: #2383c4;"> <a href="<?php echo BASE_URL.'trend/'.$trend->hashtag; ?>" style="color: #23aec4;">#<?php echo $trend->hashtag; ?></a></div>
                                <div class="hash-head-count" style="font-size: 13px;
                            "><?php echo $trend->hascount; ?> Tweet</div>


                            </li>
                        <?php
                        }}
                        echo '</ul></div>';
                            }
                        ?>

                    </div>
                    <div class=" col-lg-6 border h-50 bg-white pl-3 card all-post-holder">

                        <div class="row border-bottom post-box-wrap" style="padding-top: 10px;" data-postid="<?php echo $post->post_id; ?>">
    <div class="col-1 post-u-img-box" style="margin-left: -5px;">
        <img class="" src="<?php echo BASE_URL.$post->profilePic; ?>" style="height:50px;width:50px;border-radius:50%" alt="cover" />
    </div>
    <div class="col-10 post-wrap" data-postid="<?php echo $post->post_id; ?>" style="padding-left:25px">
        <div class="postUserIntro" style="margin-top: 12px;">
            <span class="postIntroName ml-1"><?php echo $post->full_name; ?></span><span class="postIntroUsername"> @<?php echo $post->username; ?></span> - <span class="postIntroDate"><?php echo $loadFromUser->timeAgo($post->postedOn); ?></span>
        </div>
        <div class="postDetails pb-2 pt-2" data-postid="<?php echo $post->post_id; ?>">
            <span class="postDetailsTexts">
                <?php 
            //     $postText = $post->post; 
            //     $postText = preg_replace("/@([\w]+)/", "<a href='".BASE_URL."$1'     >$0</a>",$postText);
            
            // $postText = preg_replace("/#([\w]+)/", "<a href='".BASE_URL."/hashtag/$1' style='color:#4267B2;'>$0</a>",$postText);
            //     echo $postText;
                ?>

            </span>
        </div>
           <?php if(empty($post->shareId)){
               ?>
               <span class="postDetailsText">
               <?php
                $postText = $post->post; 
                $postText = preg_replace("/@([\w]+)/", "<a href='".BASE_URL."$1'     >$0</a>",$postText);
            
            $postText = preg_replace("/#([\w]+)/", "<a href='".BASE_URL."/hashtag/$1' style='color:#4267B2;'>$0</a>",$postText);
                echo $postText;
                ?>
                
                </span>
                <?php
               
           }else{
                if(empty($shareDetails)){}else{echo '<span class="nf-2-text-span" data-postid = "'.$post->post_id.'" data-userid="'.$user_id.'" data-profilepic="'.$post->profilePic.'">'.$post->shareText.'</span>'; }

                foreach($shareDetails as $share){ ?>

                    <div class="share-container" style="padding:5px; box-shadow: 0 0 3px gray; margin-top:10px; display:flex; flex-direction:column; align-items:flex-start; cursor:pointer" data-userlink="<?php echo $share->userLink; ?>">

                        <div class="nf-1">
                            <div class="nf-1-left d-flex">
                                <div class="nf-pro-pic">
                                    <a href="<?php echo BASE_URL.$share->username; ?>"></a>
                                    <img src="<?php echo BASE_URL.$share->profilePic; ?>" style="height:50px;width:50px;border-radius:50%" class="pro-pic" alt="">
                                </div>
                                <div class="postUserIntro" style="margin-top: 12px;">
            <span class="postIntroName"><?php echo $post->full_name; ?></span><span class="postIntroUsername"> @<?php echo $post->username; ?></span> - <span class="postIntroDate"><?php echo $loadFromUser->timeAgo($share->postedOn); ?></span>
        </div>
                            </div>
                            <div class="nf-1-right">
                            </div>
                        </div>
                        <div class="nf-2" style="margin-left: 54px;margin-top: -5px;">
                            <div class="nf-2-text" data-postid="<?php echo $share->post_id; ?>" data-userid="<?php echo $user_id ?>" data-profilePic="<?php echo $share->profilePic; ?>">
                                <?php echo $share->post;  ?>
                            </div>
                            
                            <?php if(empty($share->postImage)){}else{
            $imgJson = json_decode($share->postImage);
            ?>
        <div class="nf-2-img" data-toggle="modal" data-target="#post-photo-show-modal" style="display:flex;    background-color: slategray;flex-wrap: wrap;justify-content: center;padding-right: 4.5px;align-items: center;border-radius: 12px;<?php if(count($imgJson) < 2 ){echo 'padding-bottom: 0px;'; }else{ echo 'padding-bottom: 5px;'; } ?>" data-postid="<?php echo $share->post_id; ?>" data-userid="<?php echo $user_id ?>">
            <?php
                            $count = 0;
            $singleImageSize = 400 / count($imgJson) ;

            if(count($imgJson) == 1){
                for($i = 0; $i < count($imgJson); $i++) {
                    echo '  <div class="post-img-box" data-postImgID="'.$share->id.'" style="max-height: 347px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$share->postBy.'/postImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$share->post_id.' imageShow" data-userid="'.$user_id.'" data-postid="'.$share->post_id.'" data-profileid="'.$profileId.'" alt="" style="width: 347px;cursor:pointer;"></div>';
                                                }
            }else if(count($imgJson) == 2 || count($imgJson) == 3 || count($imgJson) == 4){

                $singleImageSize = 400 / 2 ;

                 for($i = 0; $i < count($imgJson); $i++) {
                     echo '  <div class="post-img-box" data-postImgID="'.$share->id.'" style="height: '.$singleImageSize.'px; width:'.$singleImageSize.'px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$share->postBy.'/postImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$share->post_id.' imageShow" data-userid="'.$user_id.'" data-postid="'.$share->post_id.'" data-profileid="'.$profileId.'" alt="" style="min-width: 100%;max-height:100%;cursor:pointer;margin:5px;"></div>';
                                                }
            } else if(count($imgJson) > 4){

                $squarTotalSize = 400 * 400;
                $imgSizeWithouRoot= $squarTotalSize / count($imgJson);
                $singleImageSize = sqrt($imgSizeWithouRoot);



                 for($i = 0; $i < count($imgJson); $i++) {
                    echo '  <div class="post-img-box" data-postImgID="'.$share->id.'" style="height: '.$singleImageSize.'px; width:'.$singleImageSize.'px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$share->postBy.'/postImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$share->post_id.' imageShow" data-userid="'.$user_id.'" data-postid="'.$share->post_id.'" data-profileid="'.$profileId.'" alt="" style="min-width: 100%;max-height:100%;cursor:pointer;margin:5px;"></div>';
                                                }
            }else{};


                ?>
        </div>
        <?php } ?>
                        </div>

                    </div>

                    <?php

                }

            } ?>
        
        
        <?php if(empty($post->postImage)){}else{
            $imgJson = json_decode($post->postImage);
            ?>
        <div class="nf-2-img" data-toggle="modal" data-target="#post-photo-show-modal" style="display:flex;    background-color: slategray;flex-wrap: wrap;justify-content: center;padding-right: 4.5px;align-items: center;border-radius: 12px;<?php if(count($imgJson) < 2 ){echo 'padding-bottom: 0px;'; }else{ echo 'padding-bottom: 5px;'; } ?>" data-postid="<?php echo $post->post_id; ?>" data-userid="<?php echo $user_id ?>">
            <?php
                            $count = 0;
            $singleImageSize = 400 / count($imgJson) ;

            if(count($imgJson) == 1){
                for($i = 0; $i < count($imgJson); $i++) {
                    echo '  <div class="post-img-box" data-postImgID="'.$post->id.'" style="max-height: 347px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$post->postBy.'/postImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$post->post_id.' imageShow" data-userid="'.$user_id.'" data-postid="'.$post->post_id.'" data-profileid="'.$profileId.'" alt="" style="width: 347px;cursor:pointer;"></div>';
                                                }
            }else if(count($imgJson) == 2 || count($imgJson) == 3 || count($imgJson) == 4){

                $singleImageSize = 400 / 2 ;

                 for($i = 0; $i < count($imgJson); $i++) {
                     echo '  <div class="post-img-box" data-postImgID="'.$post->id.'" style="height: '.$singleImageSize.'px; width:'.$singleImageSize.'px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$post->postBy.'/postImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$post->post_id.' imageShow" data-userid="'.$user_id.'" data-postid="'.$post->post_id.'" data-profileid="'.$profileId.'" alt="" style="min-width: 100%;max-height:100%;cursor:pointer;margin:5px;"></div>';
                                                }
            } else if(count($imgJson) > 4){

                $squarTotalSize = 400 * 400;
                $imgSizeWithouRoot= $squarTotalSize / count($imgJson);
                $singleImageSize = sqrt($imgSizeWithouRoot);



                 for($i = 0; $i < count($imgJson); $i++) {
                    echo '  <div class="post-img-box" data-postImgID="'.$post->id.'" style="height: '.$singleImageSize.'px; width:'.$singleImageSize.'px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$post->postBy.'/postImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$post->post_id.' imageShow" data-userid="'.$user_id.'" data-postid="'.$post->post_id.'" data-profileid="'.$profileId.'" alt="" style="min-width: 100%;max-height:100%;cursor:pointer;margin:5px;"></div>';
                                                }
            }else{};


                ?>
        </div>
        <?php } ?>
        <div class="postAction d-flex align-items-center pb-2 justify-content-between" style="    padding: 10px 0;font-size: 18px;">
            <div class="reactContainer text-secondary" data-userid="<?php echo $user_id; ?>" data-postid="<?php echo $post->post_id; ?>" style="cursor:pointer; display:flex;justify-content: center;align-items: center;">
                <?php if(empty($main_react)){ ?>
                <i class="fa fa-heart-o" aria-hidden="true"></i>
                <?php }else{ ?>
                <i class="fa fa-heart react-color " aria-hidden="true"></i>
                <?php } ?>
                <span class="pl-1 react-count" style="font-size: 16px;"> <?php
            if($main_react_count->maxreact == '0'){}else{
                echo $main_react_count->maxreact;
            }            ?></span>
            </div>
            <div class="commentContainer text-secondary" style="cursor:pointer;" data-toggle="modal" data-target="#commentModal" data-postid="<?php echo $post->post_id; ?>">
                <i class="fa fa-comment-o com-hov"  aria-hidden="true"></i><span class="plaa-1 com-hov" style="font-size:16px;"> <?php if(empty($totalCommentCount->totalComment)){}else{
                echo $totalCommentCount->totalComment;
            } ?></span>
            </div>

            <div class="dropdown open">
                <div class="reTweetContainer text-secondary dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer;">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span class="plaa-1 " style="font-size:16px;"> <?php if(empty($totalShareCount->totalShare)){}else{ echo $totalShareCount->totalShare; } ?></span>
                </div>

                <div class="dropdown-menu" style="box-shadow: 0px 0px 5px grey;">

                    <a class="dropdown-item direct-retweet" data-postid="<?php echo $post->post_id; ?>" data-toggle="modal" data-target="#retweet-conf" href="#!"><i class="fa fa-retweet" aria-hidden="true"></i> <span style="margin-left:5px;">Retweet</span></a>
                    <a class="dropdown-item comment-retweet" data-postid="<?php echo $post->post_id; ?>" data-toggle="modal" data-target="#retweet-with-comment" href="#!"><i class="fa fa-pencil" aria-hidden="true"></i><span style="margin-left:5px;">Retweet with comment</span></a>
                </div>
            </div>
        </div>


    </div>

    <div class="col-1 edit-delete-container" style="cursor:pointer;">
        <div class="dropdown open">
            <div class="edit-delete-wrap dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer; color:gray;">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>

            <div class="dropdown-menu" style="box-shadow: 0px 0px 5px grey;">

                <a class="dropdown-item edit-post" data-toggle="modal" data-target="#createTweet" data-postid="<?php echo $post->post_id; ?>" href="#!"><i class="fa fa-pencil" aria-hidden="true"></i> <span style="margin-left:5px;">Edit</span></a>
                <a class="dropdown-item delete-post" data-postid="<?php echo $post->post_id; ?>" data-toggle="modal" data-target="#delete-post" href="#!"><i class="fa fa-trash-o" aria-hidden="true"></i><span style="margin-left:5px;">Delete</span></a>
                <a class="dropdown-item report-post" data-postid="<?php echo $post->post_id; ?>" data-postby="<?php echo $post->postBy; ?>" data-toggle="modal" data-target="#report-post" href="#!"><i class="fa fa-flag" style="" aria-hidden="true"></i><span style="margin-left:5px;">Report</span></a>
            </div>
        </div>


    </div>
    <div class="spinner-show" style="width: 100%;"></div>
    <div class="comment-show-container-wrap" data-postid="<?php echo $post->post_id; ?>" style="width: 100%;background-color: lightgray; "></div>
</div>



                    </div>

                    <div class="col-lg-3 bg-white card" style="background-color: #f8f9fa87 !important;visibility: hidden;">
                        <div class="whoToIntro">
                            <div class="whoToIntroHeading p-3">
                                <h4>Who to follow</h4>
                            </div>
                        </div>
                        <?php foreach($otherUsers as $toFollow){ 
                        $followCheck=$loadFromPost->followCheck($toFollow->userId, $userid);
                        if(empty($followCheck)){ 
                            
                            ?>
                            <div class="whoToDetails border-bottom pb-2 pt-2">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="<?php echo $toFollow->profilePic; ?>" style="height:50px; width:50px; border-radius:50%" alt="" />
                                </div>
                                <div class="col-lg-9">
                                    <div class="whoToUserName"><strong class="whoToName"><?php echo $toFollow->full_name; ?></strong> <span class="whoToUser">@<?php echo $toFollow->username; ?></span>
                                    </div>
                                    <div class="whoToUserName">
                                        <div data-userid="<?php echo $userid; ?>" data-profileid="<?php echo $toFollow->userId; ?>" class="btn followbtn border-primary rounded-pill profile-follow-button">Follow</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <?php  
                        } else { ?>
                        <div class="whoToDetails border-bottom pb-2 pt-2">
                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="<?php echo $toFollow->profilePic; ?>" style="height:50px; width:50px; border-radius:50%" alt="" />
                                </div>
                                <div class="col-lg-9">
                                    <div class="whoToUserName"><strong class="whoToName"><?php echo $toFollow->full_name; ?></strong> <span class="whoToUser">@<?php echo $toFollow->username; ?></span>
                                    </div>
                                    <div class="whoToUserName">
                                        <div data-userid="<?php echo $userid; ?>" data-profileid="<?php echo $toFollow->userId; ?>" class="btn followbtn border-primary rounded-pill profile-unfollow-button btn-primary">Unollow</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <?php    
                        }
                        
                        ?>
                        
                        
                        <?php } ?>



                    </div>
                </div>
            </div>
        </section>



        <div class="modal" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return false" method="post" action="core/ajax/profileChange.php" id="profile-upload-form">
                            <div class="my-modal-body justify-content-center align-items-center" style="display:flex; flex-direction:column">
                                <div class="my-modal-cover-change my-align-center m-1 border-bottom" style="background-image: url(assets/img/background.png)">
                                    <div class="modal-cover-upload">
                                        <div class="button-wrapper">
                                            <span class="label">
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </span>

                                            <input type="file" name="coverUpload" id="coverUpload" class="upload-box" placeholder="Upload File" />

                                        </div>
                                    </div>

                                    <!--
                                        <div class="border round-circle modal-remove-cover">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
-->

                                </div>
                                <div class="my-modal-profile-change rounded-circle my-align-center m-1" style="background-image: url(assets/img/me.jpg) ">
                                    <div class="modal-profile-upload ">
                                        <div class="button-wrapper">
                                            <span class="label">
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                            </span>

                                            <input type="file" name="proifleUpload" id="proifleUpload" class="upload-box" placeholder="Upload File" />

                                        </div>
                                    </div>
                                    <!--
                                        <div class="border round-circle modal-remove-profile">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
-->
                                </div>
                                <div class="my-modal-name-change p-3 border-bottom w-100">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="control-label">Name</label><input placeholder="Your name" type="text" class="form-control name-change" value="KM Habib" /></div>
                                    </div>
                                </div>

                                <div class="my-modal-bio-change p-3 border-bottom w-100">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="control-label">Bio</label><input placeholder="Your bio" type="text" class="form-control bio-change" value="This is simply me" /></div>
                                    </div>
                                </div>
                                <div class="my-modal-location-change p-3 border-bottom w-100">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="control-label">Location</label><input placeholder="Home Adress" type="text" class="form-control location-change" value="Chittagong" /></div>
                                    </div>
                                </div>
                                <div class="my-modal-website-change p-3 border-bottom w-100">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="control-label website-change">Website</label><input placeholder="You website link" type="text" class="form-control" value="kmhabib.com" /></div>
                                    </div>
                                </div>
                                <div class="my-modal-date-change p-3 w-100">
                                    <div class="col-md-12">
                                        <div class="form-group"><label class="control-label">Birthday</label><input placeholder="YYYY-MM-DD" type="text" class="form-control birthday-change" value="Edit birthday" /></div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">

                                <button class="btn btn-primary" id="profile-save-button">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="createTweet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form onsubmit="return false" method="post" action="core/ajax/postTweet.php" enctype="multipart/form-data" id="video-upload-form" class="edit-image-upload">
                            <div class="alert alert-danger textbox-error" style="display:none;" role="alert"></div>
                            <div class="main-textarea-wrap">
                                <ul class="hash-men-holder" style="position:absolute;margin-top: 0;z-index: 9;top: -60px;max-height: 200px;overflow-y: scroll;"></ul>
                                <textarea name="" id="tweetTextarea" cols="30" rows="10" placeholder="What's going on your mind?"></textarea>

                            </div>


                            <div class="file-upload-counter-wrap" style="display:flex;align-items:center;justify-content: space-between;">
                                <div class="file-upload-wrap" style="display:flex; margin-top:10px;">


                                    <div class="button-wrapperr restore-image-uploader" style="position: relative;">
                                        <span class="labell">
                                            <button type="button" class="btn btn-labeled btn-warning" style="margin-right:5px;">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                                </span>Upload Images</button>
                                        </span>
                                        <!--                                            <input type="file" name="tweetImagesUpload" id="tweetImagesUpload" class="upload-box" placeholder="Upload File" multiple/>-->
                                        <input type="file" id="tweetImagesUpload" class="upload-box" placeholder="Upload File" name="files[]" id="files" multiple />
                                    </div>

                                    <div class="button-wrapperr restore-video-uploader" style="position: relative;">
                                        <span class="labell">
                                            <button type="button" class="btn btn-labeled btn-success" style="margin-right:5px;">
                                                <span class="btn-label">
                                                    <i class="fa fa-file-video-o" aria-hidden="true"></i>
                                                </span>Upload Video</button>
                                        </span>
                                        <input type="file" name="video" id="video" class="upload-box" placeholder="Upload File" />
                                    </div>

                                </div>
                                <div class="text-counter-wrap">140</div>
                            </div>
                        </form>
                        <div id="sortable" style="position:relative;">
                            <ul>

                            </ul>
                        </div>

                        <div id="edit-sortable" style="position:relative;display:flex;flex-wrap: wrap;">

                        </div>
                        <div id="video-uploader-show-wrap" style="display:none; position:relative;">
                            <video width="150" height="100" id="video_here_wrap" controls>
                                <source src="" id="video_here">

                            </video>
                        </div>
                        <div id="progress">
                            <div class="progress" style="display:none;">

                                <div class="progress-bar progress-bar-striped progress-bar-animated tweet-progressbar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!--                                <span>50%</span>-->
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" id="tweet-post-button" style="border-radius:25px;">Tweet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="comment-write-wrap">

                        </div>
                        <form onsubmit="return false" method="post" action="core/ajax/commentTweet.php" id="comment-upload-form">
                            <div class="comment-user-action">
                                <div class="row border-bottom" style="align-items: center;padding-top: 30px;padding-bottom:10px;">
                                    <div class="col-lg-1 post-u-img-box"><img class="" src="<?php echo BASE_URL.$userData->profilePic; ?>" style="height:50px;width:50px;border-radius:50%" alt="cover" /></div>

                                    <div class="col-lg-11 comment-emoji-wrap" id="comment-emojiEditor" style="padding-left:35px;position: relative;display: flex;justify-content: center;align-items: center;">
                                        <textarea class="form-control" id="commentEmoji" style="border:none;height:30px;" placeholder="Tweet your comment"></textarea>
                                        <div class="media-container" style="position:absolute;top: 4px;right: 45px;display: flex;justify-content: center;align-items: center;">
                                            <div class="button-wrapperr comment-restore-image-uploader" style="position: relative; color: #b0b0b0;margin-right: 5px;">
                                                <span class="labell">
                                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                                </span>
                                                <input type="file" id="commentImage" class="upload-box" placeholder="Upload File" name="files[]" multiple="">
                                                
                                            </div>

                                            <div class="button-wrapperr comment-restore-video-uploader" style="position: relative; color: #b0b0b0;">
                                                <span class="labell">
                                                    <i class="fa fa-video-camera" aria-hidden="true">
                                                    </i>
                                                </span>
                                                <input type="file" id="commentVideo" class="upload-box" placeholder="Upload File" name="commentVideo" multiple="">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-left: 75px;width: 81.8%;">
                                        <div id="comment-sortable" style="position:relative;">
                                            <ul>

                                            </ul>
                                        </div>
                                        <div id="comment-video-uploader-show-wrap" style="display:none; position:relative;"> <video width="100" height="150" id="comment-video_here_wrap" controls>
                                                <source src="" id="comment-video_here">
                                            </video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="comment-progress">
                            <div class="progress" style="display:none;">

                                <div class="progress-bar progress-bar-striped progress-bar-animated tweet-progressbar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!--                                <span>50%</span>-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="comment-upload-save" style="border-radius:25px;">Tweet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="retweet-with-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="retweet-write-wrap">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="retweet-post-button" style="border-radius:25px;">Retweet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="retweet-conf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: none;">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="delete-post-confermation" style="border: none;text-align: center;">
                            <snap class="confirm-delete-tweet p-2"><i class="fa fa-check" style="color: #1ce449;font-size: 16px;border: 3px solid;border-radius: 50%;padding: 5px;margin-right: 10px;" aria-hidden="true"></i>Post successfully shared</snap>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="delete-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: none;">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="delete-post-confermation" style="border: none;text-align: center;">
                            <snap class="confirm-delete-tweet">Do you want to delete the tweet?</snap>

                        </div>
                        <div class="modal-footer" style="border: none;justify-content: center;">
                            <button class="btn btn-danger" id="delete-post-ok" style="border-radius:25px;">Yes</button>
                            <button class="btn btn-success" id="delete-post-no" style="border-radius:25px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="block-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: none;">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="delete-post-confermation" style="border: none;text-align: center;">
                            <snap class="confirm-block-user">Do you want to block <span class="block-username" style="color:gray;"></span>?</snap>

                        </div>
                        <div class="modal-footer" style="border: none;justify-content: center;">
                            <button class="btn btn-danger" id="block-ok" style="border-radius:25px;">Yes</button>
                            <button class="btn btn-success" id="block-no" style="border-radius:25px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="report-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="">
                                                    <h5 class="modal-title" id="exampleModalLabel">Report abuse of the post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body report-wrap">

                        <div class="report-post-confermation" style="border: none;text-align: center;display:none">
                            <snap class="confirm-report-tweet"><i class="fa fa-check" style="color: #1ce449;font-size: 16px;border: 3px solid;border-radius: 50%;padding: 5px;margin-right: 10px;" aria-hidden="true"></i>Report successfully submited.</snap>

                        </div>
                        <div class="form-group report-input-wrap">
    <!--<label for="exampleFormControlTextarea1">Report about the post</label>-->
    
    <textarea class="form-control" placeholder="Write report" id="report-val" rows="3"></textarea>
  </div>
                        <div class="modal-footer" style="border: none;justify-content: center;">
                            <button class="btn btn-danger" id="report-post-submit" style="border-radius:25px;">Submit</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="delete-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="display: none;">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="delete-post-confermation" style="border: none;text-align: center;">
                            <snap class="confirm-delete-comment">Do you want to delete the comment?</snap>

                        </div>
                        <div class="modal-footer" style="border: none;justify-content: center;">
                            <button class="btn btn-danger" id="delete-comment-ok" style="border-radius:25px;">Yes</button>
                            <button class="btn btn-success" id="delete-comment-no" style="border-radius:25px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="cover-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 100vw; margin: 0px;">
                <div class="modal-content" style="border: none;">
                    <div class="modal-header">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="cover-show-modal-wrap" style="height: 80vh;overflow-y: scroll;"><img src="" class="w-100" alt=""></div>

                    </div>
                </div>
            </div>
        </div>



        <div class="modal" id="post-photo-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 100vw; margin: 0px;">
                <div class="modal-content" style="border: none;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="image-show-modal-wrap" style="height: 80vh;overflow-y: scroll;display:flex; border-bottom: 1px solid lightgray; ">
                            <div class="post-image-container" style="min-width:60vw;display:flex;justify-content:space-between;;align-items:center; background-color:gray;width: 70%;">
                                <div class="prev-img-show" style="font-size: 35px;padding: 0 10px;background-color: lightgray; cursor:pointer;">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> </div>
                                <div class="show-img-box" style="height:100%;display: flex;justify-content: center;align-items: center;">
                                    <img src="" style="max-height: 100%;max-width: 100%;" alt="">
                                </div>
                                <div class="nex-img-show" style="font-size: 35px;padding: 0 10px;background-color: lightgray; cursor:pointer;"> <i class="fa fa-arrow-right" aria-hidden="true"></i> </div>
                            </div>

                            <div class="post-image-action-container" style="margin-left: 10px;width: 29%;padding: 0 20px;">
                                <div class="modal-img-wrap" style="display:flex; justify-content:flex-start;align-items:center; ">
                                    <div class="post-u-img-box post-u-img-box2">

                                    </div>

                                    <div class="postUserIntro postUserIntro2" style="margin-left:5px;">

                                    </div>
                                </div>
                                <div class="postDetails postDetails2" style="display:flex;justify-content:flex-center; align-items:center;margin-left:55px;">

                                </div>
                                <div class="postAction postAction2" style="    display: flex;height: 28px;justify-content: space-between;align-items: center;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray;margin-top: 15px;">

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--
            <div class="modal" id="post-photo-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 100vw; margin: 0px;">
                    <div class="modal-content" style="border: none;">
                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                        </div>
                        <div class="modal-body">

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">


                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
-->


        <div class="modal" id="profile-show-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 100vw; margin: 0px;">
                <div class="modal-content" style="border: none;">
                    <div class="modal-header">
                        <!--                            <h5 class="modal-title" id="exampleModalLabel">Post a tweet</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="profile-show-modal-wrap" style="height: 80vh;text-align:center;"><img src="" class="h-100" alt=""></div>

                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="" id="step" value="1">
        <div class="featured-image-list" style="display:none;"></div>
        <!-- End Clients Section -->
    </main>
    <!-- End #main -->
    <!-- ======= Footer ======= -->

    <!-- End Footer -->
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/mobile.js"></script>
    <script src="assets/js/jqueryForm.js"></script>
    <script src="assets/dist/emojionearea.min.js"></script>
  
    <!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>-->

    <script>
        $(document).ready(function() {
            $('#tweetTextarea').emojioneArea({
                pickerPosition: "left",
                tonesStyle: "bullet"
            });
            $('#commentEmoji').emojioneArea({
                pickerPosition: "left",
                tonesStyle: "bullet"
            });
            $(".emojionearea-editor").css({
                color: "black"
            });

            var uid = $(".ui").data('uid');
            var pid = $(".ui").data('pid');

            //...........Mention................

            var regex = /[#|@](\w+)$/ig;

            $(document).on('keyup', '.emojionearea-editor', function() {
                let status_text = $.trim($(this).text());

                let regex_text = status_text.match(regex);


                if (regex_text != null) {


                    //                    $('.status-prof-textarea').children("<ul class='status-user-list'></ul>");

                    $.post('https://paapil.com/core/ajax/hashtag_mention.php', {
                        regex_text_placeholder: regex_text
                    }, function(data) {
                        $('ul.hash-men-holder').html(data);


                    })
                } else {

                    $('ul.hash-men-holder').empty();
                }

            })
            $(document).on('click', 'li.mention-user', function() {
                if ($(this).data('hash') != '') {
                    var hashValue = $('.getValue').text();
                    var status_old = document.querySelector('.emojionearea-editor').textContent;
                    var status_new = status_old.replace(regex, "");
                    $('.emojionearea-editor').text('' + status_new + hashValue + '');
                    $('ul.hash-men-holder').empty();
                } else {
                    var mention_userLink = $(this).find('.mention-name').data('userlink');
                    var mention_profileid = $(this).find('.mention-name').data('profileid');
                    var status_old = document.querySelector('.emojionearea-editor').textContent;
                    var status_new = status_old.replace(regex, "");

                    $('ul.hash-men-holder').empty();
                    $('.emojionearea-editor').text('' + status_new + '@' + mention_userLink + '');
                }
                //                            $.post('https://paapil.com/core/ajax/hashtag_mention.php', {
                //                                mention_userLink: mention_userLink,
                //                                mention_profileid: mention_profileid
                //                            }, function(data) {
                //                                //                        $('adv_dem').html(data);
                //                                //                        location.reload();
                //                            })

            })


            //...........Mention................


            $(document).on("keyup", "#video-upload-form .emojionearea-editor", function() {
                var valueCount = $("#video-upload-form .emojionearea-editor").text().length;
                var characterLeft = 140 - valueCount;
                $(".text-counter-wrap").text(characterLeft);
                if (characterLeft < 0) {
                    $('.textbox-error').show().html('<p style="margin-bottom: 0px;">Text limit exceeded. Character must be under 140.</p>');
                    $(".emojionearea-editor").css({
                        color: "red"
                    });
                } else {
                    $('.textbox-error').hide().html('');
                    $(".emojionearea-editor").css({
                        color: "gray"
                    });
                }
            })
            var fileCollection = new Array();

            $(document).on("change", "#tweetImagesUpload", function(e) {
                var count = 0;
                var files = e.target.files;
                $(this).removeData();
                var text = "";
                $.each(files, function(i, file) {
                    fileCollection.push(file);
                    var reader = new FileReader();

                    reader.readAsDataURL(file);

                    reader.onload = function(e) {
                        var name = document.getElementById("tweetImagesUpload").files[i].name;
                        var template = '<li class="ui-state-default del" style="position:relative;"><img id="' + name + '" class="for-edit-image" style="width:60px; height:60px" src="' + e.target.result + '"></li>';
                        $("#sortable ul").append(template);
                    }
                })

                $("#sortable").append('<div class="remImg" style="position:absolute; top:0;right:0;cursor:pointer; display:flex;justify-content:center; align-items:center; background-color:white; border-radius:50%; height:1rem; width:1rem; font-size: 0.694rem;margin: 2px;"><i class="fa fa-times" aria-hidden="true"></i></div>')

            })
            $(document).on('click', '.remImg', function() {
                $('#tweetImagesUpload').val(null);
                $('#sortable ul').empty();
                $('.remImg').remove();
                $('#tweetImagesUpload').val(null);
                $('.restore-image-uploader').empty().html('<span class="labell"> <button type="button" class="btn btn-labeled btn-warning" style="margin-right:5px;"> <span class="btn-label"> <i class="fa fa-file-image-o" aria-hidden="true"></i> </span>Upload Images</button> </span> <input type="file" name="proifleUpload" id="tweetImagesUpload" class="upload-box" placeholder="Upload File" multiple/>');
            })
            $(document).on("change", "#commentImage", function(e) {
                var count = 0;
                var files = e.target.files;
                $(this).removeData();
                var text = "";
                $.each(files, function(i, file) {
                    fileCollection.push(file);
                    var reader = new FileReader();

                    reader.readAsDataURL(file);

                    reader.onload = function(e) {
                        var name = document.getElementById("commentImage").files[i].name;
                        var template = '<li class="ui-state-default del" style="position:relative;"><img id="' + name + '" style="width:60px; height:60px" src="' + e.target.result + '"></li>';
                        $("#comment-sortable ul").append(template);
                    }
                })

                $("#comment-sortable").append('<div class="com-remImg" style="position:absolute; top:0;right:0;cursor:pointer; display:flex;justify-content:center; align-items:center; background-color:white; border-radius:50%; height:1rem; width:1rem; font-size: 0.694rem;margin: 2px;"><i class="fa fa-times" aria-hidden="true"></i></div>')

            })
            $(document).on('click', '.com-remImg', function() {
                $('#commentImage').val(null);
                $('#comment-sortable ul').empty();
                $('.com-remImg').remove();
                $('.comment-restore-image-uploader').empty().html('<span class="labell"> <i class="fa fa-camera" aria-hidden="true"></i> </span> <input type="file" id="commentImage" class="upload-box" placeholder="Upload File" name="files[]" multiple="">');
            })
            $(document).on('change', '#commentVideo', function(evt) {
                var $source = $('#comment-video_here');
                $source[0].src = URL.createObjectURL(this.files[0]);
                $source.parent()[0].load();
                $("#comment-video-uploader-show-wrap").show();
                $("#comment-video-uploader-show-wrap").append('<div class="comment-remVid" style="position:absolute; top:0;right:0;cursor:pointer; display:flex;justify-content:center; align-items:center; background-color:white; border-radius:50%; height:1rem; width:1rem; font-size: 0.694rem;margin: 2px;"><i class="fa fa-times" aria-hidden="true"></i></div>')
            })
            $(document).on('click', '.comment-remVid', function() {
                $('#comment-video_here').src = '';
                $('#comment-video-uploader-show-wrap').hide();
                $('.comment-remVid').remove();
                $('.comment-restore-video-uploader').empty().html('<span class="labell"> <i class="fa fa-video-camera" aria-hidden="true"> </i> </span> <input type="file" id="commentVideo" class="upload-box" placeholder="Upload File" name="files[]" multiple="">');
            })
            $(document).on('click', '#tweet-post-button', function() {

              

                var tweetText = $(".emojionearea-editor").html();

                var hashs = /[#](\w+)/ig;
                var mention = /[@](\w+)/ig;
                var hashToStore = tweetText.match(hashs);
                var mentionStore = tweetText.match(mention);
                var hashToData = JSON.stringify(hashToStore);
                var mentionToData = JSON.stringify(mentionStore);

                var files = $('#tweetImagesUpload')[0].files;
                
                $('.edit-image-upload').ajaxSubmit({
                    beforeSubmit: function(formData, formObject, formOptions) {
                        formData.push({
                            name: 'uid',
                            value: uid
                        }, {
                            name: 'pid',
                            value: pid
                        }, {
                            name: 'postText',
                            value: tweetText
                        }, {
                            name: 'hashToData',
                            value: hashToData
                        }, {
                            name: 'mentionToData',
                            value: mentionToData
                        })
                        console.log('formData');
                        console.log(formData);
                        console.log('formObject');
                        console.log(formObject);
                        console.log('formOptions');
                        console.log(formOptions);


                    },
                    beforeSend: function() {
                        console.log('beforesend');
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        $('.progress').show();
                        $('.tweet-progressbar').css('width', percentComplete + '%')
                        //                            console.log('event');
                        //                            console.log(event)
                        //                            console.log('position');
                        //                            console.log(position)
                        //                            console.log('total');
                        //                            console.log(total)
                        //                            console.log('percentComplete');
                        //                            console.log(percentComplete);

                    },
                    success: function(response) {
                       
                        console.log(response);
                        //                            var returnData = $.parseJSON(response);
                        //                            console.log(returnData);
                        if ($('.progress-bar').css('width') >= '433px') {
                            //                                $('#modal').modal('hide');
                            $('#sortable ul').empty();
                            $('.remImg').remove();
                            //                                $('#sortable').empty();
                            $('.progress').hide();
                            $('#tweetImagesUpload').val(null);
                            $('#video').val(null);
                            $('.emojionearea-editor').text('');
                            $('#createTweet').modal('hide');
                            $('#video-uploader-show-wrap').hide();
                            //                                $("#createTweet .close").click();
                            //                                $('.modal').removeClass('show');
                        }
                        //                            $('.progress').hide();
                        //                            $().css('width', '0%');
                        //                            location.reload();

                    }
                })

            })
            $(document).on('click', '.commentContainer', function() {
                var postid = $(this).data('postid');

                let getPostBox = $(this).parents('.post-box-wrap');
                let profileImage = getPostBox.find('.post-u-img-box img').attr('src');
                let userName = getPostBox.find('.postIntroName').text();
                let postDate = getPostBox.find('.postIntroDate').text();
                let postUsername = getPostBox.find('.postIntroUsername').text();
                let postDetails = getPostBox.find('.postDetails').html();
                $('#comment-upload-save').attr("data-postid", postid);
                //...................For emptying text area, image input and video input
                $('#comment-emojiEditor .emojionearea-editor').text('');
                $('#commentImage').val(null);
                $('#comment-sortable ul').empty();
                $('.com-remImg').remove();
                $('.comment-restore-image-uploader').empty().html('<span class="labell"> <i class="fa fa-camera" aria-hidden="true"></i> </span> <input type="file" id="commentImage" class="upload-box" placeholder="Upload File" name="files[]" multiple="">');
                $('#comment-video_here').src = '';
                $('#comment-video-uploader-show-wrap').hide();
                $('.comment-remVid').remove();
                $('.comment-restore-video-uploader').empty().html('<span class="labell"> <i class="fa fa-video-camera" aria-hidden="true"> </i> </span> <input type="file" id="commentVideo" class="upload-box" placeholder="Upload File" name="files[]" multiple="">');
                //...................End: for emptying text area, image input and video input
                $('.comment-write-wrap').html('<div class="row"> <div class="col-lg-1 post-u-img-box"><img class="" src="' + profileImage + '" style="height:50px;width:50px;border-radius:50%" alt="cover" /></div> <div class="col-lg-11" style="padding-left:35px"> <div class="postUserIntro"><span class="postIntroName">' + userName + '</span><span class="postIntroUsername">' + postUsername + ' </span> - <span class="postIntroDate">' + postDate + '</span></div> <div class="postDetails pb-2">' + postDetails + '</div> </div> </div> ');

            })
            $(document).on('click', '.comCommentContainer', function() {
                var postid = $(this).data('postid');
                var commentid = $(this).data('commentid');

                let getPostBox = $(this).parents('.comment-show-container');
                let profileImage = getPostBox.find('.comment-u-img-box img').attr('src');
                let userName = getPostBox.find('.commentIntroName').text();
                let postDate = getPostBox.find('.commentIntroDate').text();
                let postUsername = getPostBox.find('.commentIntroUsername').text();
                let postDetails = getPostBox.find('.commentDetails').html();
                $('#comment-upload-save').attr("data-postid", postid);
                $('#comment-upload-save').attr("data-commentid", commentid);
                //...................For emptying text area, image input and video input
                $('#comment-emojiEditor .emojionearea-editor').text('');
                $('#commentImage').val(null);
                $('#comment-sortable ul').empty();
                $('.com-remImg').remove();
                $('.comment-restore-image-uploader').empty().html('<span class="labell"> <i class="fa fa-camera" aria-hidden="true"></i> </span> <input type="file" id="commentImage" class="upload-box" placeholder="Upload File" name="files[]" multiple="">');
                $('#comment-video_here').src = '';
                $('#comment-video-uploader-show-wrap').hide();
                $('.comment-remVid').remove();
                $('.comment-restore-video-uploader').empty().html('<span class="labell"> <i class="fa fa-video-camera" aria-hidden="true"> </i> </span> <input type="file" id="commentVideo" class="upload-box" placeholder="Upload File" name="files[]" multiple="">');
                //...................End: for emptying text area, image input and video input
                $('.comment-write-wrap').html('<div class="row"> <div class="col-lg-1 post-u-img-box"><img class="" src="' + profileImage + '" style="height:50px;width:50px;border-radius:50%" alt="cover" /></div> <div class="col-lg-11" style="padding-left:35px"> <div class="postUserIntro"><span class="postIntroName">' + userName + '</span><span class="postIntroUsername">' + postUsername + ' </span> - <span class="postIntroDate">' + postDate + '</span></div> <div class="postDetails pb-2">' + postDetails + '</div> </div> </div> ');

            })
            $(document).on('click', '.comment-retweet', function() {
                let postid = $(this).data('postid');
                $('#retweet-post-button').attr("data-postid", postid);
                let getPostBox = $(this).parents('.post-box-wrap');
                let profileImage = getPostBox.find('.post-u-img-box img').attr('src');
                let userName = getPostBox.find('.postIntroName').text();
                let postDate = getPostBox.find('.postIntroDate').text();
                let postUsername = getPostBox.find('.postIntroUsername').text();
                let postDetails = getPostBox.find('.postDetails').html();
                $('.retweet-write-wrap').html('<div class="row border-bottom" style="align-items: center;padding-bottom: 30px;"> <div class="col-lg-1 post-u-img-box"><img class="" src="' + profileImage + '" style="height:50px;width:50px;border-radius:50%" alt="cover" /></div> <div class="col-lg-11" style="padding-left:35px"> <input class="form-control retweet-comment-val" style="border:none;" type="text" placeholder="Add a comment"> </div> </div>   <div class="row" style="border:2px solid gray;border-radius:5px;MARGIN: 10px;"> <div class="col-lg-1 post-u-img-box"><img class="" src="' + profileImage + '" style="height:50px;width:50px;border-radius:50%" alt="cover" /></div> <div class="col-lg-11" style="padding-left:35px"> <div class="postUserIntro"><span class="postIntroName">' + userName + '</span><span class="postIntroUsername">' + postUsername + ' </span> - <span class="postIntroDate">' + postDate + '</span></div> <div class="postDetails pb-2">' + postDetails + '</div> </div> </div> ');

            })
            $(document).on('click', '.show-cover', function() {
                let coverImage = $(this).find('.coverImageHolder img').attr('src');

                $('.cover-show-modal-wrap img').attr('src', coverImage);

            })
            $(document).on('click', '.imageShow', function(e) {

                let imageWrap = $(this).parents('.nf-2-img');
                let postid = imageWrap.data('postid');
                let imgContainer = imageWrap.find('img.postImage' + postid + '');
                let postAction = imageWrap.siblings('.postAction').html();
                $('.postAction2').html(postAction);
                let clickecImage = $(this).attr('src');
                let userInfo = imageWrap.siblings('.postUserIntro').html();
                let postDetails = imageWrap.siblings('.postDetails ').html();
                let userImg = imageWrap.parents('.post-wrap').siblings('.post-u-img-box').html();
                $('.show-img-box img').attr('src', clickecImage);
                $('.postUserIntro2').html(userInfo);
                $('.post-u-img-box2').html(userImg);
                $('.postDetails2').html(postDetails);
                let index = $(imgContainer).index(this)
                let nextImage = parseInt(index) + 1

                function stepClear() {
                    $('#step').val('');
                }

                function stepStore() {
                    $('#step').val(index);
                }

                async function stepRestore() {
                    await stepClear()
                    await stepStore()

                }
                stepRestore()
                var a = [];
                for (var i = 0; i < imgContainer.length; i++) {
                    a.push(imgContainer[i].src);
                }
                console.log(JSON.stringify(a));

                $('#step').attr('data-classL', JSON.stringify(a));


                //                    jQuery('selector').attr('class').split(' ')[0]
                console.log(index)

                //                    var taskList = document.querySelector('.carousel-inner');
                //
                //                    var i;
                //
                //                    function resolveAfter2Seconds() {
                //                        $(taskList).empty();
                //                    }
                //
                //                    function resolveAfter1Seconds() {
                //                        for (i = 0; i < imgContainer.length; ++i) {
                //                            var html = "<div class='carousel-item'><img class='d-block w-100' src='" + imgContainer[i].src + "' data-src='" + imgContainer[i].src + "' alt='First slide'></div>"
                //                            //                        var html = "<div class='single-fi left'><img src='" + imgContainer[i].src + "' alt='Grand Beach Resort Cox's Bazar' style='opacity: 1;'>" + i + "</div>";
                //                            taskList.innerHTML += html;
                //                            //                        $(taskList).html(htmla)
                //                        }
                //                        $('.carousel-item:first-child').addClass('active')
                //                    }
                //
                //                    async function asyncCall() {
                //
                //                        await resolveAfter2Seconds();
                //                        await resolveAfter1Seconds();
                //
                //                        // expected output: "resolved"
                //                    }
                //
                //                                        asyncCall();
                //

                //                    var taskList = document.querySelector('.show-img-box');

                //                                        var i;



                //                                            for (i = 0; i < imgContainer.length; ++i) {
                //                                                var html = "<div class='carousel-item'><img class='d-block w-100' src='" + imgContainer[i].src + "' data-src='" + imgContainer[i].src + "' alt='First slide'></div>"
                //                        var html = "<div class='single-fi left'><img src='" + imgContainer[i].src + "' alt='Grand Beach Resort Cox's Bazar' style='opacity: 1;'>" + i + "</div>";
                //                                                taskList.innerHTML += html;
                //                                            }
                //                        $(taskList).html(htmla)





                //                    for (var key in imgContainer.length) {



                //                    var i;
                //                    for (i = 0; i < imgContainer.length; ++i) {
                //                        var html = "<div class='single-fi left'><img src='" + imgContainer[i].src + "' alt='Grand Beach Resort Cox's Bazar' style='opacity: 1;'>" + i + "</div>";
                //                        taskList.innerHTML += html;
                //                    }

            })
            $(document).on('click', '.nex-img-show', function(e) {
                let step = $('#step').val();
                $('#step').removeData();
                let classL = $('#step').data('classl');
                let imgs = $(classL).length - 1;
                if (step == imgs) {
                    step = -1

                }
                console.log(classL);
                var imgNum = parseInt(step) + 1;
                $('#step').val(imgNum);



                let imgSrc = $(classL)[imgNum];

                $(".show-img-box img").attr('src', imgSrc);

            })
            $(document).on('click', '.prev-img-show', function(e) {
                let step = $('#step').val();
                $('#step').removeData();
                let classL = $('#step').data('classl');
                let imgs = $(classL).length - 1;
                if (step == 0) {

                    step = imgs + 1

                }
                var imgNum = parseInt(step) - 1;
                $('#step').val(imgNum);


                let imgSrc = $(classL)[imgNum];
                $(".show-img-box img").attr('src', imgSrc);

            })
            $(document).on('click', '.show-profile', function() {
                let coverImage = $(this).attr('src');

                $('.profile-show-modal-wrap img').attr('src', coverImage);

            })
            $(document).on('click', '.reactContainer', function() {
                if (!$(this).hasClass("text-danger")) {
                    $(this).addClass("text-danger");
                } else {
                    $(this).removeClass('text-danger');
                }
            })
            $(document).on('click', '.comReactContainer', function() {
                if (!$(this).hasClass("text-danger")) {
                    $(this).addClass("text-danger");
                } else {
                    $(this).removeClass('text-danger');
                }
            })
            $(document).on('change', '#proifleUpload', function() {

                var file = this.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('.my-modal-profile-change').css('background-image', 'url("' + reader.result + '")');
                }
                if (file) {
                    reader.readAsDataURL(file);
                } else {}

            })
            $(document).on('change', '#coverUpload', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('.my-modal-cover-change').css('background-image', 'url("' + reader.result + '")');
                }
                if (file) {
                    reader.readAsDataURL(file);
                } else {}
            })
            $(document).on('click', '#profile-save-button', function() {
                if (!$(this).hasClass("text-danger")) {

                    var nameChange = $('.name-change').val();
                    var bioChange = $('.bio-change').val();
                    var locationChange = $('.location-change').val();
                    var websiteChange = $('.website-change').val();
                    var birthdayChange = $('.birthday-change').val();

                    $('#profile-upload-form').ajaxSubmit({
                        beforeSubmit: function(formData, formObject, formOptions) {
                            formData.push({
                                name: 'uid',
                                value: uid
                            }, {
                                name: 'name_change',
                                value: nameChange
                            }, {
                                name: 'bio_change',
                                value: bioChange
                            }, {
                                name: 'location_change',
                                value: locationChange
                            }, {
                                name: 'website_change',
                                value: websiteChange
                            }, {
                                name: 'birthday_change',
                                value: birthdayChange
                            })
                            console.log('beforesend');
                            console.log('formData');
                            console.log(formData);
                            console.log('formObject');
                            console.log(formObject);
                            console.log('formOptions');
                            console.log(formOptions);


                        },
                        beforeSend: function() {

                        },
                        uploadProgress: function(event, position, total, percentComplete) {

                        },
                        success: function(response) {

                        }
                    })
                }
            })
            $(document).on('click', '#comment-upload-save', function() {

                var postid = $(this).data('postid');
                var commentid = $(this).data('commentid');
                var commentVal = $("#comment-emojiEditor .emojionearea-editor").text();


                $('#comment-upload-form').ajaxSubmit({
                    beforeSubmit: function(formData, formObject, formOptions) {
                        formData.push({
                            name: 'uid',
                            value: uid
                        },{
                            name: 'pid',
                            value: pid
                        }, {
                            name: 'postid',
                            value: postid
                        }, {
                            name: 'commentid',
                            value: commentid
                        }, {
                            name: 'commentVal',
                            value: commentVal
                        })

                        console.log('formData');
                        console.log(formData);
                        console.log('formObject');
                        console.log(formObject);
                        console.log('formOptions');
                        console.log(formOptions);


                    },
                    beforeSend: function() {

                    },
                    uploadProgress: function(event, position, total, percentComplete) {

                    },
                    success: function(response) {
                        
                        $('#commentModal').modal('hide');

                    }
                })

            })
            $(document).on('click', 'a.dropdown-item.com-delete-post', function() {
                var commentid = $(this).data('commentid');
                $('#delete-comment-ok').attr('data-commentid', commentid);
                $('#delete-comment-ok').attr('data-class', '.commentid' + commentid + '');
                $(this).parents('.comment-show-container').addClass('commentid' + commentid + '');
                $('.confirm-delete-comment').text('Do you want to delete the comment?');
                $('#delete-comment-ok').show();
                $('#delete-comment-no').text('No');

            })
            $(document).on('click', '#delete-comment-ok', function() {
                var commentid = $(this).data('commentid');
                $(this).removeData();


                console.log(commentid);
                $.post('https://paapil.com/core/ajax/commentTweet.php', {
                    commentid: commentid,
                    useridd: uid,
                }, function(data) {
                    if (data.trim() !== '') {
                        // $('.confirm-delete-tweet').text(data);
                        $('#delete-comment-ok').hide();
                        $('#delete-comment-no').text('Ok');
                        setTimeout(function() {
                            $('#delete-comment').modal('hide');
                            $('.commentid' + commentid + '').empty();
                        }, 2000);



                    } else {
                        $('.confirm-delete-comment').text("Tweet can't be deleted");
                        alert(data);

                    }
                })

            })

            $(document).on('click', '#delete-comment-no', function() {
                $('#delete-post').modal('hide');
                $('#delete-comment').modal('hide');
            })
            
            // $(document).on('click', '.com-delete-post', function() {
            //     var postid = $(this).data('postid');
            //     var presentReactCount = $(this).find('.react-count');
            //     if ($(this).find('i').hasClass('fa-heart-o')) {
            //         $(this).find('i').removeClass('fa-heart-o').addClass('fa-heart text-danger');
            //         $.post('https://paapil.com/core/ajax/reactTweeter.php', {
            //             postid: postid,
            //             userid: uid,
            //             profileid: pid,
            //             reactType: 'love'
            //         }, function(data) {
                    
            //             presentReactCount.text(data);
            //         })
            //     } else {
            //         $(this).find('i').removeClass('fa-heart text-danger').addClass('fa-heart-o text-secondary');

            //         $.post('https://paapil.com/core/ajax/reactTweeter.php', {
            //             postid: postid,
            //             userid: uid,
            //             profileid: pid,
            //             deleteReactType: 'love'
            //         }, function(data) {
                       
            //             presentReactCount.text(data);
            //         })
            //     }

            // })
            $(document).on('click', '.reactContainer', function() {
                var postid = $(this).data('postid');
                var presentReactCount = $(this).find('.react-count');
                if ($(this).find('i').hasClass('fa-heart-o')) {
                    $(this).find('i').removeClass('fa-heart-o').addClass('fa-heart text-danger');
                    $.post('https://paapil.com/core/ajax/reactTweeter.php', {
                        postid: postid,
                        userid: uid,
                        profileid: pid,
                        reactType: 'love'
                    }, function(data) {
                        presentReactCount.text(data);
                    })
                } else {
                    $(this).find('i').removeClass('fa-heart text-danger').addClass('fa-heart-o text-secondary');

                    $.post('https://paapil.com/core/ajax/reactTweeter.php', {
                        postid: postid,
                        userid: uid,
                        profileid: pid,
                        deleteReactType: 'love'
                    }, function(data) {
                        presentReactCount.text(data);
                    })
                }

            })
            $(document).on('click', '.comReactContainer', function() {
                var postid = $(this).data('postid');
                var commentid = $(this).data('commentid');
                var presentReactCount = $(this).find('.react-count');
                if ($(this).find('i').hasClass('fa-heart-o')) {
                    $(this).find('i').removeClass('fa-heart-o').addClass('fa-heart text-danger');
                    $.post('https://paapil.com/core/ajax/reactTweeter.php', {
                        commentid: commentid,
                        postid: postid,
                        userid: uid,
                        profileid: pid,
                        reactTypee: 'love'
                    }, function(data) {
                        presentReactCount.text(data);
                    })
                } else {
                    $(this).find('i').removeClass('fa-heart text-danger').addClass('fa-heart-o text-secondary');

                    $.post('https://paapil.com/core/ajax/reactTweeter.php', {
                        commentidDelete: commentid,
                        postid: postid,
                        userid: uid,
                        profileid: pid,
                        deleteReactTypee: 'love'
                    }, function(data) {
                        presentReactCount.text(data);
                    })
                }

            })
            $(document).on('click', '.post-wrap', function() {
                
                var mainDiv = $(this).parents('.post-box-wrap');
                $('html, body').animate({scrollTop: $(mainDiv).offset().top -75 }, 'slow');
                var postidd = $(this).data('postid');
                var thisDom = $(this);
                $(this).attr('id', 'activeCom');
                var gotSpinner = $(this).siblings('.spinner-show');
                if(thisDom.siblings('#comSpinner').length){
                    
                    gotSpinner.removeAttr('id').html('');
                    thisDom.siblings('.comment-show-container-wrap').empty().html('');
                    
                }else{
                    gotSpinner.attr('id','comSpinner').html('<div class=" d-flex justify-content-center align-items-center w-100 border-top-0 pb-2 pt-2" style="background-color:lightgray;"><div class="spinner-border text-primary" role="status"><pan class = "sr-only">Loading... < /span> </div></div>');
                }
                $.post('https://paapil.com/core/ajax/showTweetComment.php', {
                    postid: postidd,
                    uid: uid
                }, function(data) {
                    $('.spinner-show').empty();
                    thisDom.siblings('#comSpinner').siblings('.comment-show-container-wrap').empty().html(data)
                    

                })
            })
            $(document).on('click', '#retweet-post-button', function() {
                var postid = $(this).data('postid');
                var shareText = $('.retweet-comment-val').val();

                $.post('https://paapil.com/core/ajax/retweet.php', {
                    shareText: shareText,
                    profileid: pid,
                    postid: postid,
                    userid: uid

                }, function(data) {
                    
                    $('#retweet-with-comment').modal('hide');
                    $('.retweet-comment-val').val('');
                })
            })
            $(document).on('click', '.direct-retweet', function() {
                var postid = $(this).data('postid');

                $.post('https://paapil.com/core/ajax/retweet.php', {
                    postidd: postid,
                    profileidd: pid,
                    useridd: uid

                }, function(data) {
                    setTimeout(function() {
                            $('#retweet-conf').modal('hide');
                            
                        }, 2000);
                    
                })
            })
            $(document).on('click', '.edit-delete-wrap', function() {
                $('#edit-sortable').empty();
                $(".emojionearea-editor").html('');
                $('#tweet-post-button').removeAttr('data-postid');
                $('#tweet-post-button').removeAttr().attr('id', 'tweet-edit-post');
                $('#edit-sortable').empty();
              
            })
            
            $(document).on('click', '.com-edit-delete-wrap', function() {
                $('#comment-sortable ul').empty();
                $("#comment-emojiEditor .emojionearea-editor").html('');
                $('#comment-upload-save').removeAttr('data-commentid');
                $('#comment-upload-save').removeAttr().attr('id', 'comment-edit-post');
                
            })
            
            $(document).on('click', '.edit-image-remove', function() {

                var removeImage = $(this).parents('.edit-image-box');
                removeImage.detach();
            })



            $(document).on('click', '.get-started', function() {
                $('#tweet-edit-post').removeAttr().attr('id', 'tweet-post-button');
            })
            $(document).on('click', '#tweet-edit-post', function() {
                var postid = $(this).data('postid');
                var postText = $('.emojionearea-editor').html();
                var getImageSrc = $('.edit-image-box img')
                var b = [];
                var getNewImage = $('.for-edit-image')
                for (var i = 0; i < getImageSrc.length; i++) {
                    if (getImageSrc[i].src != '') {
                        b.push('{"imageName":"' + getImageSrc[i].src + '"}');
                    }
                }




                var files = $('#tweetImagesUpload')[0].files;

                for (var i = 0; i < files.length; i++) {
                    b.push('{"imageName":"https://paapil.com/user/' + uid + '/postImage/' + files[i].name + '"}');
                }



                var editedImage = b.toString();

                var editImage = '[' + editedImage + ']';
                console.log(editImage);







                $('.edit-image-upload').ajaxSubmit({
                    beforeSubmit: function(formData, formObject, formOptions) {
                        formData.push({
                            name: 'uidForEdit',
                            value: uid
                        }, {
                            name: 'pid',
                            value: pid
                        }, {
                            name: 'postText',
                            value: postText
                        }, {
                            name: 'editImage',
                            value: editImage
                        }, {
                            name: 'postid',
                            value: postid
                        })
                        console.log('formData');
                        console.log(formData);
                        console.log('formObject');
                        console.log(formObject);
                        console.log('formOptions');
                        console.log(formOptions);



                    },
                    beforeSend: function() {
                        console.log('beforesend');
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        $('.progress').show();
                        $('.tweet-progressbar').css('width', percentComplete + '%')
                        //                            console.log('event');
                        //                            console.log(event)
                        //                            console.log('position');
                        //                            console.log(position)
                        //                            console.log('total');
                        //                            console.log(total)
                        //                            console.log('percentComplete');
                        //                            console.log(percentComplete);

                    },
                    success: function(response) {

                        console.log(response);
                        
                        //                            var returnData = $.parseJSON(response);
                        //                            console.log(returnData);
                        if ($('.progress-bar').css('width') >= '433px') {
                            //                                $('#modal').modal('hide');
                            $('#sortable ul').empty();
                            $('.remImg').remove();
                            //                                $('#sortable').empty();
                            $('.progress').hide();
                            $('#tweetImagesUpload').val(null);
                            $('#video').val(null);
                            $('.emojionearea-editor').text('');
                            $('#createTweet').modal('hide');
                            $('#video-uploader-show-wrap').hide();
                            //                                $("#createTweet .close").click();
                            //                                $('.modal').removeClass('show');
                        }
                        //                            $('.progress').hide();
                        //                            $().css('width', '0%');
                        //                            location.reload();

                    }
                })

            });
            
             $(document).on('click', '#comment-edit-post', function() {
                var commentid = $(this).data('commentid');
                var commentText = $('#comment-emojiEditor .emojionearea-editor').html();
                var getImageSrc = $('.com-edit-image-box img')
                var b = [];
                var getNewImage = $('.for-edit-image')
                for (var i = 0; i < getImageSrc.length; i++) {
                    if (getImageSrc[i].src != '') {
                        b.push('{"imageName":"' + getImageSrc[i].src + '"}');
                    }
                }




                var files = $('#commentImage')[0].files;

                for (var i = 0; i < files.length; i++) {
                    b.push('{"imageName":"https://paapil.com/user/' + uid + '/postImage/' + files[i].name + '"}');
                }



                var editedImage = b.toString();

                var editImage = '[' + editedImage + ']';
                console.log(editImage);







                $('.comment-upload-form').ajaxSubmit({
                    beforeSubmit: function(formData, formObject, formOptions) {
                        formData.push({
                            name: 'uidForComEdit',
                            value: uid
                        }, {
                            name: 'pid',
                            value: pid
                        }, {
                            name: 'commentText',
                            value: commentText
                        }, {
                            name: 'editImage',
                            value: editImage
                        }, {
                            name: 'commentid',
                            value: commentid
                        })
                        console.log('formData');
                        console.log(formData);
                        console.log('formObject');
                        console.log(formObject);
                        console.log('formOptions');
                        console.log(formOptions);



                    },
                    beforeSend: function() {
                        console.log('beforesend');
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        $('.progress').show();
                        $('.tweet-progressbar').css('width', percentComplete + '%')
                        //                            console.log('event');
                        //                            console.log(event)
                        //                            console.log('position');
                        //                            console.log(position)
                        //                            console.log('total');
                        //                            console.log(total)
                        //                            console.log('percentComplete');
                        //                            console.log(percentComplete);

                    },
                    success: function(response) {

                        console.log(response);
                        
                        //                            var returnData = $.parseJSON(response);
                        //                            console.log(returnData);
                        if ($('.progress-bar').css('width') >= '433px') {
                            //                                $('#modal').modal('hide');
                            $('#comment-sortable ul').empty();
                            $('.com-remImg').remove();
                            //                                $('#sortable').empty();
                            $('.progress').hide();
                            $('#commentImage').val(null);
                            $('#video').val(null);
                            $('#comment-emojiEditor .emojionearea-editor').text('');
                            $('#commentModal').modal('hide');
                            $('#video-uploader-show-wrap').hide();
                            //                                $("#createTweet .close").click();
                            //                                $('.modal').removeClass('show');
                        }
                        //                            $('.progress').hide();
                        //                            $().css('width', '0%');
                        //                            location.reload();

                    }
                })

            })







            $(document).on('click', 'a.dropdown-item.edit-post', function() {
                var postid = $(this).data('postid');
                var postText = $(this).parents('.post-wrap').find('.postDetailsText').html();
                $(".emojionearea-editor").html(postText);
                var postImageHolder = $(this).parents('.edit-delete-container').siblings('.post-wrap').find('.nf-2-img>.post-img-box img');
                $('#edit-sortable').empty();
                var editSortable = $('#edit-sortable');
                $('#tweet-edit-post').attr('data-postid', postid);
                console.log(postImageHolder.length)
                var i;
                for (i = 0; i < postImageHolder.length; ++i) {
                    var imageEdit = '<div class="edit-image-wrap"> <div class="edit-image-box" style="height:50px; width:50px; position:relative;"> <img src="' + postImageHolder[i].src + '" data-src="' + postImageHolder[i].src + '" alt="" style="height:100%; width:100%;"> <div class="edit-image-remove"> <i class="fa fa-times" aria-hidden="true"></i> </div> </div> </div>';
                    editSortable.append(imageEdit);

                }

            })
             $(document).on('click', 'a.dropdown-item.com-edit-post', function() {
                var commentid = $(this).data('commentid');
                var commentText = $(this).parents('.comment-show-container').find('.commentDetailsText').html();
                $('#comment-emojiEditor .emojionearea-editor').html(commentText)
              
                var commentImageHolder = $(this).parents('.comment-show-container').find('.nf-2-img>.post-img-box img');
                var editSortable = $('#comment-sortable');
                 $('#comment-edit-post').attr('data-commentid', commentid);
                // console.log(postImageHolder.length)
                var i;
                for (i = 0; i < commentImageHolder.length; ++i) {
                    var imageEdit = '<div class="edit-image-wrap"> <div class="com-edit-image-box" style="height:50px; width:50px; position:relative;"> <img src="' + commentImageHolder[i].src + '" data-src="' + commentImageHolder[i].src + '" alt="" style="height:100%; width:100%;"> <div class="edit-image-remove"> <i class="fa fa-times" aria-hidden="true"></i> </div> </div> </div>';
                    editSortable.append(imageEdit);

                }

            })
            $(document).on('click', 'a.dropdown-item.delete-post', function() {
                var postid = $(this).data('postid');
                $('#delete-post-ok').attr('data-postid', postid);
                $('#delete-post-ok').attr('data-class', '.postid' + postid + '');
                $(this).parents('.post-box-wrap').addClass('postid' + postid + '');
                $('.confirm-delete-tweet').text('Do you want to delete the tweet?');
                $('#delete-post-ok').show();
                $('#delete-post-no').text('No');

            })
            $(document).on('click', '#delete-post-ok', function() {
                var postid = $(this).data('postid');
                $(this).removeData();


                console.log(postid);
                $.post('https://paapil.com/core/ajax/deleteTweetPost.php', {
                    postid: postid,
                    userid: uid
                }, function(data) {
                    if (data.trim() !== '') {
                        $('.confirm-delete-tweet').text(data);
                        $('#delete-post-ok').hide();
                        $('#delete-post-no').text('Ok');
                        setTimeout(function() {
                            $('#delete-post').modal('hide');
                            $('.postid' + postid + '').empty();
                        }, 2000);



                    } else {
                        $('.confirm-delete-tweet').text("Tweet can't be deleted");

                    }
                })

            })

            $(document).on('click', '#delete-post-no', function() {
                $('#delete-post').modal('hide');
            })
            $(document).on('keyup', '.search-user', function() {
                var searchVal = $(this).val();
                if ($(".search-user").val().length == 0) {
                    $('.search-user-show').hide();
                    
                //      var gotSpinner = $(this).siblings('.spinner-show');
                // if(thisDom.siblings('#comSpinner').length){
                    
                //     gotSpinner.removeAttr('id').html('');
                //     thisDom.siblings('.comment-show-container-wrap').empty().html('');
                    
                // }else{
                    $('.search-spinner').html('<div class="bg-white d-flex justify-content-center align-items-center w-100 border-top-0 pb-2 pt-2"><div class="spinner-border text-primary" role="status"><pan class = "sr-only">Loading... < /span> </div></div>');
                
                // $.post('https://paapil.com/core/ajax/showTweetComment.php', {
                //     postid: postidd,
                //     uid: uid
                // }, function(data) {
                //     $('.spinner-show').empty();
                //     thisDom.siblings('#comSpinner').siblings('.comment-show-container-wrap').empty().html(data)
                    

                // })
                    
                    
                    
                    

                } else {
                    $.post('https://paapil.com/core/ajax/searchTweetUser.php', {
                        searchVal: searchVal,
                        uid: uid
                    }, function(data) {
                        if (data.trim() !== '') {
                             $('.search-spinner').html('');
                            $('.search-user-show').show().html(data);



                        } else {
                            $('.search-user-show').html("");
                            $('.search-user-show').hide();


                        }


                    })
                }



            })
            //...........................follow  ......................
            $(document).on('click', '.profile-follow-button', function() {
                $(this).removeClass().addClass('profile-unfollow-button rounded-pill btn btn-primary').text('Unfollow');
                var userid = $(this).data('userid');
                var profileid = $(this).data('profileid');

                $.post('https://paapil.com/core/ajax/request.php', {
                    follow: profileid,
                    userid: uid
                }, function(data) {})
            })
            $(document).on('click', '.profile-unfollow-button', function() {
                $(this).removeClass().addClass('profile-follow-button rounded-pill btn border-primary').text('Follow');
                //                $(this).removeClass().addClass('profile-follow-button').html(' <img src="assets/image/followGray.JPG" alt=""><div class="profile-activity-button-text">Follow</div>');
                var userid = $(this).data('userid');
                var profileid = $(this).data('profileid');

                $.post('https://paapil.com/core/ajax/request.php', {
                    unfollow: profileid,
                    userid: uid
                }, function(data) {})
            })
            $(document).on('click', 'a.dropdown-item.report-post', function() {
                $('.report-post-confermation').hide();
                $('.report-input-wrap').show();
                $("#report-val").val('');
                var postby = $(this).data('postby');
                var postid = $(this).data('postid');
                $('#report-post-submit').attr('data-postid', postid);
                $('#report-post-submit').attr('data-postby', postby);
                $('#report-post-submit').show();

            })
            $(document).on('click', '#report-post-submit', function() {
                var reportVal = $("#report-val").val();
                var postid = $(this).data('postid');
                var postby = $(this).data('postby');
                $.post('https://paapil.com/core/ajax/report.php', {
                    reportVal: reportVal,
                    postid:postid,
                    userid: uid,
                    postby:postby
                }, function(data) {
                    $('.report-input-wrap').hide();
                    $('.report-post-confermation').show();
                    $("#report-val").val('');
                    $('#report-post-submit').hide();
                    
                    
                })
            })
            
     
         $(document).on('click', 'a.dropdown-item.block-user', function() {
                var profileid = $(this).data('profileid');
                $('#block-ok').attr('data-profileid', profileid);
                $('#block-ok').attr('data-class', '.profileid' + profileid + '');
                $('.confirm-block-user').text('Do you want to block the user?');
                $('#block-ok').show();
                $('#block-no').text('No');
                $('.block-username').text($('.usersUserName').text())

            })
            $(document).on('click', '#block-ok', function() {
                var profileid = $(this).data('profileid');
                $(this).removeData();


                console.log(postid);
                $.post('https://paapil.com/core/ajax/block.php', {
                    profileid: profileid,
                    userid: uid
                }, function(data) {
                    if (data.trim() !== '') {
                        $('.confirm-block-user').text(data);
                        $('#block-ok').hide();
                        $('#block-no').text('Ok');
                        setTimeout(function() {
                            $('#block-modal').modal('hide');
                            $('.profileid' + profileid + '').empty();
                        }, 2000);



                    } else {
                        $('.confirm-delete-tweet').text("Tweet can't be deleted");

                    }
                })

            })

            $(document).on('click', '#block-no', function() {
                $('#block-modal').modal('hide');
            })
        $(document).on('click', '.notification-container', function() {
        var notiType = 'countReset';
        
        $.post('https://paapil.com/core/ajax/notificationTweet.php', {
            counterReset:notiType
        }, function(data){
            $('.noti-count').html(data);
        })
    })
    $(document).on('click', '.msg-notification-container', function(){
        var notiType = 'msgCountReset';
        
        $.post('https://paapil.com/core/ajax/notificationTweet.php', {
            msgCounterReset:notiType
        }, function(data){
            $('.msg-noti-count').html(data);
        })
    })
            

            //...........................follow end ......................


            // $(document).mouseup(function(e) {
            //     var container = new Array();
            //     container.push($('.post-box-wrap'));
            //     container.push($('#commentModal'));
            //     $.each(container, function(key, value) {
            //         if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
            //             $('.comment-show-container-wrap').empty();
            //         }
            //     })


            // })

        })

    </script>
</body>

</html>
