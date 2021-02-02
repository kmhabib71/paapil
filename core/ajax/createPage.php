<?php
include '../load.php';
include '../../connect/login.php';

$user_id = login::isLoggedIn();

if(isset($_POST['pageCat'])){
   $pageCat = $_POST['pageCat'];
   $pageName = $_POST['pageName'];
   
      function fRand($len) {
            $str = '';
            $a = "0123456789";
            $b = str_split($a);
            for ($i=1; $i <= $len ; $i++) { 
                $str .= $b[rand(0,strlen($a)-1)];
                }
                return $str;
            }
            
            $psess = fRand(4);
            
            function clean($string) {
                   $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
                
                   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                }

            $fineString = clean($pageName);
            $allPass = $fineString.$psess;
   
   
   $pageID = $loadFromUser->create('createPage',array('pageCreatedBy'=>$user_id, 'pageCategory' => $pageCat,'pageLink'=>$allPass, 'pageProfilePic'=>'assets/img/me.jpg','pageCoverPic'=>'assets/img/background.png', 'pageName' => $pageName, 'pageOn'=>date('Y-m-d H:i:s')));
    echo $pageID;

}


?>
