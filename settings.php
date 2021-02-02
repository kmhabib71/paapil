<?php
include 'connect/login.php';
include 'core/load.php';
if(login::isLoggedIn()){
$userid=login::isLoggedIn();
}else{
header('location:log.php');
}
if(isset($_GET['username'])==true&&empty($_GET['username'])===false){
$username=$loadFromUser->checkInput($_GET['username']);
$profileId=$loadFromUser->userIdByUsername($username);
}else{
$username=$loadFromUser->usernameFetch($userid);    
$profileId=$loadFromUser->userIdByUsername($username);
}
$profileData=$loadFromUser->userData($profileId);
$userData=$loadFromUser->userData($userid);
$requestCheck=$loadFromPost->requestCheck($userid, $profileId);
$requestConf=$loadFromPost->requestConf($profileId, $userid);
$followerCount= $loadFromPost->followerCount($profileId);
$followingCount= $loadFromPost->followingCount($profileId);
$otherUsers=$loadFromPost->otherUsers($profileId, $userid);
$notification=$loadFromPost->notification($userid);
$notificationCount=$loadFromPost->notificationCount($userid);
$requestNotificationCount=$loadFromPost->requestNotificationCount($useri);
$messageNotification=$loadFromPost->messageNotificationCount($userid);
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
    <link href="assets/css/settingStyle.css" rel="stylesheet" media="screen and (min-width: 601px)">
    <link rel="stylesheet" href="assets/css/settingMobileCustom.css" media="screen and (max-width: 600px)">
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
                <li class="active" style="margin-right:10px;"><a href="profile.php" ><i class="fa fa-user" aria-hidden="true"></i><span class="pl-0.5">Profile</span></a></li>

            </ul>
        </nav>

        


    </header>
    <!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <div class="ui" data-uid="<?php echo $userData->user_id ?>" data-pid="<?php echo $profileId; ?>"></div>
    <main id="main">
        
<div class="settings-wrap ">
    <div class="user-setting-wrap justify b" style="border-top-left-radius:5px; border-top-right-radius:5px; background-color: #007bff; color:white;">
        <h3 class="align-middle" style="color: white">Settings</h3>
    </div>
    <div class="user-name-wrap justify" data-userid="<?php echo $userid; ?>">
        <div class="sett-head">Change Name</div><span class="set-changed-name"><?php echo $userData->full_name; ?></span>
    </div>
    <div class="user-link-wrap justify" data-userid="<?php echo $userid; ?>">
        <div class="sett-head">Change Username</div><span class="set-changed-userLink"><?php echo $userData->username; ?></span>
    </div>
    <div class="mobile-number-wrap justify" data-userid="<?php echo $userid; ?>">
       <?php if(!empty($userData->mobile)){ ?>
        <div class="sett-head">Change Mobile Number</div><span class="set-changed-mobile"><?php echo $userData->mobile; ?></span>
        <?php }else{?>
        <div class="sett-head">Change Mobile Number</div><span class="set-changed-mobile">No mobile number has found. Add one.</span>
          <?php } ?>
    </div>
      <div class="email-id-wrap justify" data-userid="<?php echo $userid; ?>">
       <?php if(!empty($userData->email)){ ?>
        <div class="sett-head">Change Your Email</div><span class="set-changed-email"><?php echo $userData->email; ?></span>
        <?php }else{?>
        <div class="sett-head">Change Your Email</div><span class="set-changed-email">No email has found. Add one.</span>
          <?php } ?>
    </div>
    <div class="user-password-wrap justify" data-userid="<?php echo $userid; ?>">
        <div class="sett-head">Change Password</div><span class="set-changed-password">*******</span>
    </div>




</div>
</main>
<div class="top-box-show2">




</div>



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

<script>

$(function(){
    $(document).on('click','.user-name-wrap', function(){
        var userid = $(this).data('userid');
        var full_name='<?php echo $userData->full_name; ?>';
        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input"><h3>Change your name</h3><label for="first-name-change">Name shows in profile: </label><input type="text" name="" id="first-name-change" value="'+full_name+'" class="input-style"><br><br><input type="submit" value="Submit" id="name-change-submit" data-userid="'+userid+'" class="input-style btn btn-primary"></div></div>');

})

    $(document).on('click', '#name-change-submit', function(){
        var firstName = $('#first-name-change').val();
        var userid = $(this).data('userid');
        if(firstName == ''){
            alert('Field must be filled.')
        }else{
            $.post('https://paapil.com/core/ajax/settings.php', {
                changeName: userid,
                firstName : firstName
            }, function(data){
                $('.set-changed-name').html(''+firstName+'');
                $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                setTimeout(function(){
                    $('.top-box-show2').empty();
                    location.reload();
                }, 3000);
            })
        }
    })

    $(document).on('click','.user-link-wrap', function(){
        var userid = $(this).data('userid');
        var userLink='<?php echo $userData->username; ?>';
        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input"><h3>Change Username</h3><label for="user-link-change">Username: </label><input type="text" name="" id="user-link-change" value="'+userLink+'" class="input-style"><br><br><input type="submit" value="Submit" id="user-link-submit" data-userid="'+userid+'" class="input-style btn btn-primary"></div></div>');

})

    $(document).on('click', '#user-link-submit', function(){
        var userLink = $('#user-link-change').val();
        var userid = $(this).data('userid');
        if(userLink == ''){
            alert('Field is empty.')
        }else{
            $.post('https://paapil.com/core/ajax/settings.php', {
                userLink: userLink,
                userid: userid
            }, function(data){
                    if(data.trim() == '<h3 style="color:#4caf50;">Username has changed successfully.</h3>'){
                                    $('.set-changed-userLink').html(userLink);
                                    $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);
                        }else{
                              $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);
                        }
            })
        }
    })
 $(document).on('click','.mobile-number-wrap', function(){
        var userid = $(this).data('userid');
        var mobileChange='<?php echo $userData->mobile; ?>';
        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input"><h3>Change Your Mobile Number</h3><label for="mobile-number-change">Mobile Number: </label><input type="text" name="" id="mobile-number-change" value="'+mobileChange+'" class="input-style"><br><br><input type="submit" value="Submit" id="mobile-number-submit" data-userid="'+userid+'" class="input-style btn btn-primary"></div></div>');

})


    $(document).on('click', '#mobile-number-submit', function(){
        var mobileChange = $('#mobile-number-change').val();
        var userid = $(this).data('userid');
        if(mobileChange == ''){
            alert('Field is empty.')
        }else{
            $.post('https://paapil.com/core/ajax/settings.php', {
                mobileChange: mobileChange,
                userid: userid
            }, function(data){
                    if(data.trim() == '<h3 style="color:#4caf50;">Mobile number has changed successfully.</h3>'){
                        $('.set-changed-mobile').html(mobileChange);
                                    $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);
                    }else{
                        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);

                    }

            })
        }
    })

    $(document).on('click','.email-id-wrap', function(){
        var userid = $(this).data('userid');
        var emailChange='<?php echo $userData->email; ?>';
        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input"><h3>Change Your Email</h3><label for="email-id-change">Email: </label><input type="email" name="" id="email-id-change" value="'+emailChange+'" class="input-style"><br><br><input type="submit" value="Submit" id="email-id-submit" data-userid="'+userid+'" class="input-style btn btn-primary"></div></div>');

})


    $(document).on('click', '#email-id-submit', function(){
        var emailChange = $('#email-id-change').val();
        var userid = $(this).data('userid');
        if(emailChange == ''){
            alert('Field is empty.')
        }else{
            $.post('https://paapil.com/core/ajax/settings.php', {
                emailChange: emailChange,
                userid: userid
            }, function(data){
                    if(data.trim() == '<h3 style="color:#4caf50;">Email has changed successfully.</h3>'){
                        $('.set-changed-email').html(emailChange);
                                    $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);
                    }else{
                        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);

                    }

            })
        }
    })
    $(document).on('click','.user-password-wrap', function(){
        var userid = $(this).data('userid');
        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input"><h3>Change Password</h3><label for="old-password">Old Password: </label><input type="password" name="" id="old-password" value="" class="input-style"><label for="new-password">New Password: </label><input type="password" name="" id="new-password" value="" class="input-style"><br><br><input type="submit" value="Submit" id="password-submit" data-userid="'+userid+'" class="input-style btn btn-primary"></div></div>');

})


    $(document).on('click', '#password-submit', function(){
        var oldPassword = $('#old-password').val();
        var newPassword = $('#new-password').val();
        var userid = $(this).data('userid');
        if(oldPassword == '' || newPassword == ''){
            alert('All field must be filled.');
        }else{
            $.post('https://paapil.com/core/ajax/settings.php', {
                oldPassword: oldPassword,
                newPassword: newPassword,
                userid: userid
            }, function(data){
                    if(data.trim() == '<h3 style="color:#4caf50;">Password has changed successfully.</h3>'){
                                    $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        window.location.href="logout.php";
                                    }, 3000);
                    }else{
                        $('.top-box-show2').html('<div class="change-input-wrap"><div class="change-input">'+data+'</div></div>');
                                    setTimeout(function(){
                                        $('.top-box-show2').empty();
                                        location.reload();
                                    }, 3000);

                    }

            })
        }
    })


  $(document).mouseup(function(e) {
                    var container = new Array();
                    container.push($('.change-input'));

                    $.each(container, function(key, value) {
                        if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
                            $('.top-box-show2').empty();
                        }
                    })


                })


})

</script>




</body>
</html>