<?php

include 'connect/login.php';
include 'core/load.php';

if(login::isLoggedIn()){
    $userid = login::isLoggedIn();
}else{
    header('Location: log.php');
}

if(isset($_GET['username']) == true && empty($_GET['username']) === false){
    $username = $loadFromUser->checkInput($_GET['username']);
    $profileId = $loadFromUser->userIdByUsername($username);
}else{
    $profileId = $userid;
}
    $profileData = $loadFromUser->userData($profileId);
    $userData = $loadFromUser->userData($userid);
    $requestCheck =$loadFromPost->requestCheck($userid, $profileId);
    $requestConf = $loadFromPost->requestConf($profileId, $userid);
    $followCheck= $loadFromPost->followCheck($profileId, $userid);
    $allusers = $loadFromPost->lastPersonWithAllUserMSG($userid);
    $lastPersonIdFromPost= $loadFromPost->lastPersonMsg($userid);
    if(!empty($lastPersonIdFromPost)){$lastpersonid = $lastPersonIdFromPost->userId; };
 $notification = $loadFromPost->notification($userid);
    $notificationCount = $loadFromPost->notificationCount($userid);
    $requestNotificationCount = $loadFromPost->requestNotificationCount($userid);
  $messageNotification = $loadFromPost->messageNotificationCount($userid);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Messenger</title>

    <link rel="stylesheet" href="assets/dist/emojionearea.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="assets/css/style.css" media="screen and (min-width: 601px)">
    <link rel="stylesheet" href="assets/css/mobileCustom.css" media="screen and (max-width: 600px)">
    <style>
     
    </style>

</head>

<body style=" height:100vh; overflow:hidden;" class="msg-body">
    <div class="loader"></div>
    <header>

    </header>
    <div class="main" style="">
        <div class="mes-top-bar" style="display: flex; width: 100%;height: 100vh;">
            <div class="top-left" style="flex-basis: 20%; ">
                <div class="top-area" style="height: 50px; width: 100%; ">
                    <div class="msg-setting-write" style="height: 100%;display: flex;justify-content: space-between;align-items: center;padding: 0 10px;">
                        <div class="msg-about-user div-center">
                            <div class="mobile msg-user-top-image" style="font-size: 22px;"><img src="assets/img/me.jpg" alt="" style="height:45px;width:45px;border-radius:50%;margin-right:10px;"></div>
                            <div class="msg-name-text" style="font-size: 20px;font-hweight:900;">Chats</div>
                        </div>
                        <!--<div class="button-wrapper restore-msg-uploader" style="margin:0;">-->
                        <!--    <form onsubmit="return false" method="post" action="core/ajax/message.php" enctype="multipart/form-data" id="msg-upload-form" class="msg-image-upload">-->
                        <!--        <span class="labell">-->
                        <!--            <i class="fa fa-picture-o" aria-hidden="true"></i>-->
                        <!--        </span>-->
                        <!--        <input type="file" id="msgImageUpload" class="upload-box" placeholder="Upload File" name="files[]" multiple="">-->
                        <!--    </form>-->

                        <!--</div>-->
                        <div class="msg-camera-action div-center">
                            <div class="mobile msg-camera-capture div-center"><i class="fa fa-camera" aria-hidden="true"></i></div>
                            <div class="msg-write-text div-center"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                        </div>

                    </div>
                </div>
                <div class="user-search-wrap" style="margin: 5px 0;padding: 0 10px;position:relative;">
                    <i class="fa fa-search" style="position: absolute;left: 20px;top: 10px;"></i>
                    <input type="text" name="" class="user-search" placeholder="Search" style="height: 25px;border-radius: 34px;border: 1px solid lightgray;padding:5px;text-align:center;font-size:16px;text-align: inherit;padding-left: 26px;outline: none;">
                    <div class="user-show" style="width:90%;position:absolute;text-align:center;">

                    </div>
                </div>
                <ul class="msg-user-add" style="padding: 0 10px;">

                    <?php

                         ?>

                </ul>

                <div class="mobile action-chat-people" style="height: 60px;width: 102%;background-color:white;box-shadow: 0px -4px 7px lightgrey;margin-left: -10px;margin-right: -10px;position: absolute;bottom: 0;display: flex;justify-content: space-around;align-items: center;bottom: -12px;">
                    <div class="chat-now" style="font-size: 28px;position:relative;"><i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="chat-count-now">3</div>

                    </div>
                    <div class="find-people" style="font-size: 28px;"><i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="top-middle" style="flex-basis: 60%;border:1px solid lightgray;/* overflow: scroll; */position: relative;border-top: none;border-right: none; display: flex;flex-direction: column;height: 99.9%;">
                <div class="top-area" style="height: 50px;width: 100%;border-bottom:1px solid lightgray;/* display: block; */">
                    <?php if(!empty($lastPersonIdFromPost)){ ?>
                    <div class="top-user-name-pic-wrap " style="display: flex;margin-left:5px;height: 100%;align-items: center;">
                        <div class="top-msg-user-photo ">

                            <img src="<?php echo $lastPersonIdFromPost->profilePic; ?>" alt="" style="height:40px;width:40px;border-radius:50%;">
                        </div>
                        <div class="top-msg-user-name align-middle" style="margin-left: 10px; font-size: 17px; font-weight:600;">
                            <?php echo ''.$lastPersonIdFromPost->full_name.'' ?>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="top-user-name-pic-wrap " style="display: flex;margin-left:5px;height: 100%;align-items: center;">
                        <div class="top-msg-user-photo ">
                            <img src="assets/image/defaultProfile.png" alt="" style="height:40px;width:40px;border-radius:50%;">
                        </div>
                        <div class="top-msg-user-name align-middle" style="margin-left: 10px; font-size: 17px; font-weight:600;">
                        </div>
                    </div>
                    <?php }  ?>

                </div>

                <div class="msgg-details" style=" height: 86.3%;overflow-y: scroll;">
                    <div class="msg-show-wrap">
                        <div class="user-info" data-userid="<?php echo $userid; ?>" data-otherid="<?php if(!empty($lastpersonid)){echo $lastpersonid; } ?>"></div>
                        <div class="msg-box" style="    display: flex;flex-direction: column;">

                        </div>
                    </div>
                </div>
                <div class="img-text-send-show" style="display: flex;justify-content: center;align-items: center;margin-bottom: 9px;">
                    <div class="img-upload" style="padding: 10px;background-color: white;border-right: 1px solid #80808024;cursor:pointer;">
                        <div class="button-wrapper restore-msg-uploader" style="margin:0;">
                            <form onsubmit="return false" method="post" action="core/ajax/message.php" enctype="multipart/form-data" id="msg-upload-form" class="msg-image-upload">
                                <span class="labell">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                </span>
                                <input type="file" id="msgImageUpload" class="upload-box" placeholder="Upload File" name="files[]" id="files" multiple />
                            </form>

                        </div>


                    </div>
                    <div class="text-html" style="width: 100%;">
                        <div id="msg-sortable" style="background-color:white;margin-right: -36px;position:relative;">
                            <ul style="margin:0px; padding:0px;list-style:none;display:flex;flex-wrap: wrap;"></ul>
                        </div>
                        <textarea name="" id="msgInput" cols="30" rows="10" placeholder="type a message... " style="height: 50px;width: 100%;    border-radius: 20px;position: absolute;bottom: 42px;"></textarea>
                    </div>
                    <div class="send-button" style="padding: 10px;background-color: white;cursor:pointer;align-self: flex-end;"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                </div>
            </div>
            <div class="top-right" style="flex-basis: 20%; border-bottom:1px solid lightgray;">
                <div class="top-area" style="height: 50px; width: 100%; border-bottom:1px solid lightgray;"></div>
                <div class="right-users-details align-middle" style="height: 100%; display:flex; flex-direction: column;margin-top: -100px;justify-content:center; align-items:center;">
                    <div class="users-right-pro-pic">
                        <img src="<?php if(!empty($lastPersonIdFromPost)){echo $lastPersonIdFromPost->profilePic; } ?>" alt="" style="height:100px; width: 100px;border-radius: 50%;">
                    </div>
                    <div class="users-right-pro-name" style="font-size: 20px;margin-top:10px; font-weight: 600;">
                        <?php if(!empty($lastPersonIdFromPost)){
    echo ''.$lastPersonIdFromPost->full_name.'';
}else { } ?>
                    </div>


                </div>
            </div>
        </div>

        <div class="mes-rest-bar"></div>

    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/dist/emojionearea.min.js"></script>
    <script src="assets/js/jqueryForm.js"></script>
    <script>
        $(document).ready(function() {
            var mq = window.matchMedia( "(max-width: 600px)" );
if (mq.matches) {
    $('.top-middle').css({display:"inline-block"});
    $(document).on('click', 'li.msg-user-name-wrap', function(){
        $('.top-left').css({display:"none"});
        $('.top-middle').css({display:"block",flexBasis:"100%"});
        $('.top-middle').css({display:"inline-block"});
       
    })
}
else {
      $('.top-left').css({display:"block"});
        $('.top-middle').css({display:"block",flexBasis:"100%"});
       
}
$(document).on('click','.msg-option-click', function(){
    
$(this).siblings('.single-msg-open').toggle();
})
$(document).on('click','.single-msg-open', function(){
    var messageid = $(this).data('messageid')
    $.post('https://paapil.com/core/ajax/mesgFetch.php', {
                    deleteMsg:messageid,
                    useridd: userid
                }, function(data) {
                    // $('ul.msg-user-add').html(data);
                })

})

            $(document).on('click','.msg-write-text', function(){
                $('input.user-search').focus();
            })

            $('textarea#msgInput').emojioneArea({
                pickerPosition: "top",
                spellcheck: true
            })


            function userLoad() {
                var userid = '<?php echo $userid; ?>';
              
                $.post('https://paapil.com/core/ajax/mesgFetch.php', {
                    loadUserid: userid
                }, function(data) {
                    $('ul.msg-user-add').html(data);
                })
            }

            userLoad();

            var lastpersonid = '<?php if(!empty($lastpersonid)){echo $lastpersonid;} ?>';

            if (lastpersonid != '') {

                var userid = '<?php echo $userid; ?>';

                $.post('https://paapil.com/core/ajax/mesgFetch.php', {
                    lastpersonid: lastpersonid,
                    userid: userid
                }, function(data) {
                    $('.msg-box').html(data);
                    scrollItself();
                    $('.loader').hide();
                })
            } else {
                $('.loader').hide();
            }



            var useridd = $('.user-info').data('userid');
            var otheridd = $('.user-info').data('otherid');


            var useridForAjax;
            var otherid;

            function abc(var1, var2) {

                if (var1 === undefined || var2 === undefined) {
                    return useridForAjax = useridd, otherid = otheridd;

                } else {
                    return useridForAjax = var1, otherid = var2;

                }
            }

            function xyz(name, surname, callback) {
                if (typeof callback == "function") {

                    callback(name, surname);

                } else {
                    alert("Argument is not function type");
                }
            }
            var fileCollectionn = new Array();
            $(document).on("change", "input#msgImageUpload", function(e) {

                var count = 0;
                var files = e.target.files;
                $(this).removeData();
                var text = "";
                console.log(files);
                $.each(files, function(i, file) {
                    fileCollectionn.push(file);
                    var reader = new FileReader();

                    reader.readAsDataURL(file);

                    reader.onload = function(e) {
                        var name = document.getElementById("msgImageUpload").files[i].name;
                        console.log(name);
                        var template = '<li class="ui-state-default del" style="position:relative;"><img id="' + name + '" class="for-edit-image" style="width:59px; height:59px" src="' + e.target.result + '"></li>';
                        $("#msg-sortable  ul").append(template);
                    }

                })
                $("#msg-sortable").css({
                    "border": "1px solid #e6ecf0"
                })
                $('.img-upload').hide();

                $("#msg-sortable").append('<div class="msg-remImg" style="position:absolute; top:0;right:0;cursor:pointer; display:flex;justify-content:center; align-items:center; background-color:white; border-radius:50%; height:1rem; width:1rem; font-size: 0.694rem;margin: 2px;"><i class="fa fa-times" aria-hidden="true"></i></div>')

            })
            $(document).on('click', '.msg-remImg', function() {
                $('#msgImageUpload').val(null);
                $('#msg-sortable ul').empty();
                $('.msg-remImg').remove();
                //                $('#tweetImagesUpload').val(null);
                $('.restore-msg-uploader').empty().html('<span class="labell"> <i class="fa fa-picture-o" aria-hidden="true"></i> </span> <input type="file" id="msgImageUpload" class="upload-box" placeholder="Upload File" name="files[]" id="files" multiple />');
                $('.img-upload').show();
            })





            setTimeout(function() {
                $(document).on('keyup', '.emojionearea .emojionearea-editor', function(e) {
                    if (e.keyCode == 13) {

                        var ThisEl = $(this);
                        var rawMsg = $(this).html();
                        if (useridForAjax === undefined) {
                            xyz(useridForAjax, otherid, abc);
                        }
                        var msg = rawMsg.slice(0, -15);



                        $('.msg-image-upload').ajaxSubmit({
                            beforeSubmit: function(formData, formObject, formOptions) {
                                formData.push({
                                    name: 'useridForAjax',
                                    value: useridForAjax
                                }, {
                                    name: 'otherid',
                                    value: otherid
                                }, {
                                    name: 'msg',
                                    value: msg
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

                            },
                            success: function(response) {


                                userLoad();
                                $('.msg-box').html(response);
                                $(ThisEl).text('');
                                scrollItself();



                                console.log(response);
                                $('#msg-sortable ul').empty();
                                $('.msg-remImg').remove();

                                $('#msgImageUpload').val(null);
                                $('.emojionearea-editor').text('');



                            }
                        })






                    }
                })




                //do click


                $(document).on("click", ".send-button", function() {
                    var ThisEl = $('.emojionearea .emojionearea-editor');
                    var msg = $('.emojionearea .emojionearea-editor').html();

                    if (useridForAjax === undefined) {
                        xyz(useridForAjax, otherid, abc);
                    }
                    //                    var msg = rawMsg.slice(0, -15);

                    $.ajax({
                        type: "POST",
                        url: "https://paapil.com/core/ajax/message.php",
                        data: {
                            useridForAjax: useridForAjax,
                            otherid: otherid,
                            msg: msg


                        },
                        success: function(data) {
                            userLoad();
                            $('.msg-box').html(data);
                            $(ThisEl).text('');
                            scrollItself();
                        }
                    })





                })

            }, 500);

            function scrollItself() {
                var elViewHeight = $('.msgg-details').height();
                var elTotalHeight = $('.msgg-details')[0].scrollHeight;
                if (elTotalHeight > elViewHeight) {
                    $('.msgg-details').scrollTop(elTotalHeight - elViewHeight);
                }

            }
            scrollItself();

            function loadMessage() {
                var pastDataCount = $('.past-data-count').data('datacount');

                $.ajax({
                    type: "POST",
                    url: "https://paapil.com/core/ajax/message.php",
                    data: {
                        showmsg: otheridd,
                        yourid: useridd
                    },
                    success: function(msgdata) {
                        $.post('https://paapil.com/core/ajax/message.php', {
                            dataCount: otheridd,
                            profileid: useridd
                        }, function(data) {
                            if (pastDataCount == data) {
                                console.log('data is same');
                            } else {
                                scrollItself();
                                $('.msg-box').html(msgdata);
                                console.log('data is not same');
                            }
                        })



                    }
                })


            }

            var loadTimer = setInterval(function() {
                loadMessage();
            }, 1000);

            $(document).on('keyup', 'input.user-search', function() {
                var searchText = $(this).val();

                if (searchText == '') {
                    $('.user-show').empty();
                } else {
                    $.post('https://paapil.com/core/ajax/search.php', {
                        msgUser: searchText,
                        userid: useridd
                    }, function(data) {

                        if (data == '') {
                            console.log('No user found.')
                        } else {
                            $('.user-show').html(data);
                        }
                    })
                }
            })
            var intervalId;
            var intervalIdtwo;
            $(document).on('click', 'li.mention-individuals', function() {
                $('.user-search').val('');
                $('.loader').show();
                clearInterval(loadTimer);
                var otheridFromSearch = $(this).data('profileid');
                var searchImage = $(this).find('img.search-image').attr('src');
                var searchName = $(this).find('.mention-name').text();
                $('.users-right-pro-pic img').attr('src', searchImage);
                $('.users-right-pro-name').text(searchName);

                $('.user-info').attr("data-otherid", otheridFromSearch);

                xyz(useridd, otheridFromSearch, abc);

                $.post('https://paapil.com/core/ajax/message.php', {
                    showmsg: otheridFromSearch,
                    yourid: useridForAjax
                }, function(data) {
                    $('.msg-box').html(data);
                    $('.user-show').empty();
                    $('.top-msg-user-photo').attr('src', searchImage);
                    $('.top-msg-user-name').text(searchName);
                    scrollItself();
                    $('.loader').hide();

                })

                if (!intervalId) {
                    intervalId = setInterval(function() {
                        loadMessageFromSearch(useridForAjax, otheridFromSearch);
                    }, 1000);

                    clearInterval(intervalIdtwo);
                    intervalIdtwo = null;

                } else if (!intervalIdtwo) {
                    clearInterval(intervalId);
                    intervalId = null;
                    intervalIdtwo = setInterval(function() {
                        loadMessageFromSearch(useridForAjax, otheridFromSearch)
                    }, 1000)
                } else {
                    alert('Nothing found');
                }


            })

            function loadMessageFromSearch(useridForAjax, otheridFromSearch) {

                var pastDataCount = $('.past-data-count').data('datacount');

                $.ajax({
                    type: "POST",
                    url: "https://paapil.com/core/ajax/message.php",
                    data: {
                        showmsg: otheridFromSearch,
                        yourid: useridForAjax
                    },
                    success: function(data) {
                        $('.msg-box').html(data);
                        $('.loader').hide();


                    }
                })

                $.post('https://paapil.com/core/ajax/message.php', {
                    dataCount: otheridFromSearch,
                    profileid: useridForAjax
                }, function(data) {
                    if (pastDataCount == data) {
                        console.log('data is same');
                    } else {
                        scrollItself();
                        console.log('data is not same');
                    }
                })
            }

            $(document).on('click', 'ul.msg-user-add > li', function() {
                $('ul.msg-user-add > li').css("background-color", "#e9ebee");
                $(this).css('background-color', 'lightgray');
            })

            $(document).on('click', 'li.msg-user-name-wrap.align-middle', function() {
                $('.loader').show();
                var profileName = $(this).find('.msg-user-name').text();
                var userProPic = $(this).find('.msg-user-photo img').attr('src');
                $('.top-msg-user-photo').attr('src', userProPic);
                $('.top-msg-user-name').text(profileName);
                $('.users-right-pro-pic img').attr('src', userProPic);
                $('.users-right-pro-name').text(profileName);
                clearInterval(loadTimer);
                scrollItself();

                var userProfileId = $(this).data('profileid');

                xyz(useridd, userProfileId, abc);

                if (!intervalId) {
                    intervalId = setInterval(function() {
                        loadMessageFromSearch(useridForAjax, userProfileId);
                    }, 1000);

                    clearInterval(intervalIdtwo);
                    intervalIdtwo = null;

                } else if (!intervalIdtwo) {
                    clearInterval(intervalId);
                    intervalId = null;
                    intervalIdtwo = setInterval(function() {
                        loadMessageFromSearch(useridForAjax, userProfileId)
                    }, 1000)
                } else {
                    alert('Nothing found');
                }




            })
            
            
               $(document).mouseup(function(e) {
                var container = new Array();
                container.push($('.msg-option'));
                $.each(container, function(key, value) {
                    if (!$(value).is(e.target) && $(value).has(e.target).length === 0) {
                        $('.single-msg-open').hide();
                    }
                })


            })


        });

    </script>

</body>

</html>
