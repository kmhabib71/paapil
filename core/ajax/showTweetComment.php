<?php

include '../load.php';
include '../../connect/login.php';

$userid = login::isLoggedIn();

if(isset($_POST['postid'])){
     $postid = $_POST['postid'];
    $userid = $_POST['uid'];



$main_react = $loadFromPost->main_react($userid, $postid);
            $react_max_show = $loadFromPost->react_max_show($postid);
            $main_react_count = $loadFromPost-> main_react_count($postid);

            $commentDetails = $loadFromPost->commentFetch($postid);
            $totalCommentCount = $loadFromPost->totalCommentCount($postid);
            $totalShareCount = $loadFromPost->totalShareCount($postid);
             
            if(!empty($commentDetails)){
               
             foreach($commentDetails as $comment){
                 $com_react_max_show = $loadFromPost->com_react_max_show($comment->commentOn, $comment->commentID);
                 $com_main_react_count = $loadFromPost->com_main_react_count($comment->commentOn, $comment->commentID);
                 $commentReactCheck = $loadFromPost->commentReactCheck($userid, $comment->commentOn, $comment->commentID);

            ?>

<div class="comment-show-container" style="display: flex;background-color: white;margin:5px;border-radius: 15px;">
    <div class="col-1 comment-u-img-box">
        <a href="<?php echo BASE_URL.$comment->username; ?>">
        <img class="" src="<?php echo BASE_URL.$comment->profilePic; ?>" style="height:40px;width:40px;border-radius:50%" alt="cover" />
        </a>
    </div>
    <div class="col-10" style="padding-left:10px">
        <a href="<?php echo BASE_URL.$comment->username; ?>">
        <div class="commentUserIntro" style="margin-top: 12px;">
            <span class="commentIntroName" style="color: #444444;"><?php echo $comment->full_name; ?></span><span class="commentIntroUsername" > @<?php echo $comment->username; ?></span> - <span class="commentIntroDate"><?php echo $loadFromUser->timeAgo($comment->commentAt); ?></span>
        </div>
        </a>
        <div class="commentDetails">
            <span class="commentDetailsText"><?php echo $comment->comment; ?></span>
        </div>
        <?php $imgJson = json_decode( $comment->commentImage ) ?>
        
        
        <div class="nf-2-img" data-toggle="modal" data-target="#post-photo-show-modal" style="display:flex;    background-color: slategray;flex-wrap: wrap;justify-content: center;padding-right: 4.5px;align-items: center;border-radius: 12px;<?php if(count($imgJson) < 2 ){echo 'padding-bottom: 0px;'; }else{ echo 'padding-bottom: 5px;'; } ?>" data-postid="<?php echo $comment->commentOn; ?>" data-userid="<?php echo $userid ?>">
            <?php
                            $count = 0;
            $singleImageSize = 400 / count($imgJson) ;

            if(count($imgJson) == 1){
                for($i = 0; $i < count($imgJson); $i++) {
                    echo '  <div class="post-img-box" data-postImgID="'.$post->id.'" style="max-height: 347px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$comment->commentBy.'/commentImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$comment->commentOn.' imageShow" data-userid="'.$userid.'" data-commentid="'.$comment->commentID.'" data-postid="'.$comment->commentOn.'" data-profileid="'.$profileId.'" alt="" style="width: 347px;cursor:pointer;"></div>';
                                                }
            }else if(count($imgJson) == 2 || count($imgJson) == 3 || count($imgJson) == 4){

                $singleImageSize = 400 / 2 ;

                 for($i = 0; $i < count($imgJson); $i++) {
                     echo '  <div class="post-img-box" data-postImgID="'.$comment->commentBy.'" style="height: '.$singleImageSize.'px; width:'.$singleImageSize.'px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$comment->commentBy.'/commentImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$comment->commentOn.' imageShow" data-userid="'.$userid.'" data-postid="'.$comment->commentOn.'" data-commentid="'.$comment->commentID.'" data-profileid="'.$profileId.'" alt="" style="min-width: 100%;max-height:100%;cursor:pointer;margin:5px;"></div>';
                                                }
            } else if(count($imgJson) > 4){

                $squarTotalSize = 400 * 400;
                $imgSizeWithouRoot= $squarTotalSize / count($imgJson);
                $singleImageSize = sqrt($imgSizeWithouRoot);



                 for($i = 0; $i < count($imgJson); $i++) {
                    echo '  <div class="post-img-box" data-postImgID="'.$comment->commentBy.'" style="height: '.$singleImageSize.'px; width:'.$singleImageSize.'px; overflow: hidden;"> <img src="'.BASE_URL.'user/'.$comment->commentBy.'/commentImage/'.$imgJson[''.$count++.'']->imageName.'" class="postImage'.$comment->commentOn.' imageShow" data-userid="'.$userid.'" data-postid="'.$comment->commentOn.'" data-commentid="'.$comment->commentID.'" data-profileid="'.$profileId.'" alt="" style="min-width: 100%;max-height:100%;cursor:pointer;margin:5px;"></div>';
                                                }
            }else{};


                ?>
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
                <i class="fa fa-comment-o" aria-hidden="true"></i><span class="pl-1 pr-5"> </span>
            </div>


        </div>


    </div>
    <div class="col-1 com-edit-delete-container" style="padding: 0 5px;">

        <div class="dropdown open">
            <div class="com-edit-delete-wrap dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor:pointer; color:gray;">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>

            <div class="dropdown-menu" style="box-shadow: 0px 0px 5px grey;">

                <a class="dropdown-item com-edit-post" data-toggle="modal" data-target="#commentModal" data-commentid="<?php echo $comment->commentID; ?>" href="#!"><i class="fa fa-pencil" aria-hidden="true"></i> <span style="margin-left:5px;">Edit</span></a>
                <a class="dropdown-item com-delete-post" data-commentid="<?php echo $comment->commentID; ?>" data-toggle="modal" data-target="#delete-comment" href="#!"><i class="fa fa-trash-o" aria-hidden="true"></i><span style="margin-left:5px;">Delete</span></a>
            </div>
        </div>



    </div>
</div>

<?php
        }
        }
}else{
    echo 'Not found';
}
            ?>
