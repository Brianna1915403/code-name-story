<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class PictureLikeController extends \App\core\Controller {        
        function like($picture_id, $user_id) {
            $profile = new \App\models\Profile();
            $profile = $profile->findByUserID($_SESSION['user_id']);
            $pictureLike = new \App\models\PictureLike();
            $pictureLike = $pictureLike->findPictureLike($profile->profile_id, $picture_id);
            if ($pictureLike == null) {  
                $pictureLike = new \App\models\PictureLike();              
                $pictureLike->picture_id = $picture_id;
                $pictureLike->profile_id = $profile->profile_id;
                $pictureLike->insert();
            } else {
                $pictureLike->delete();
            }
        }
    }   
?>