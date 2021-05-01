<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView(); ?>
        <title>Profile</title>
    </head>
    <body>
        <?= spawnNavBar(); ?>
        
        <div class="container">
            <div class="hform">
                <?php 
                    $profile = new \App\models\Profile();
                    $profile = $profile->findByID($data);
                    if ($profile->profile_picture_id != null) {
                        $picture = new \App\models\Picture();
                        $picture = $picture->findByPictureID($profile->profile_picture_id);
                        echo "<img class='profile-img' src='".BASE."/uploads/$picture->filename' alt='$picture->alt'>";
                    } else {
                        echo "<img class='profile-img' src='".BASE."/uploads/DefaultPicture.png' alt='Default Profile Picture'>";
                    }
                ?>
                <div class="profile-info">
                    <h2 class="header">
                        <?php 
                            
                        ?>    
                    </h2>
                </div>
            </div>
        </div>
        <?php 
            // $profile = new \App\models\Profile();            
            // $user = new \App\models\User();
            // if ($data['profile']->profile_id == $profile->findByUserID($_SESSION['user_id'])->profile_id)
            //     echo "<ul><li><a href='".BASE."/Message/viewInbox'>Inbox</a></li><li><a href='".BASE."/Message/viewOutbox'>Outbox</a></li></ul>";
                        
            // echo "<br><br><form action='' method='POST'>";
            // echo "<textarea name='message' placeholder='Enter your message'></textarea><br>";
            // echo "<select name='privacy_status'>";
            // echo "<option value='private'>Private Message</option>";
            // echo "<option value='public'>Public Message</option>";
            // echo "</select>";
            // echo "<input type='submit' name='action'></form><br><br>";

            // echo "<div class='messages'>";
            // foreach ($data['messages'] as $message) {
            //     if ($message->privacy_status == "public") {
            //         $profile = $profile->findByID($message->sender);
            //         $user = $user->findByUserID($profile->user_id);
            //         echo "<span> $user->username : $message->message @ $message->time_stamp</span><br>";
            //     }
            // }
            // echo "</div>";

            // echo "<div class='images'>";
            // foreach ($data['pictures'] as $picture) {
            //     $pictureLike = new \App\models\PictureLike();
            //     $pictureLikes = $pictureLike->getAllByPictureID($picture->picture_id);
            //     $pictureLikes = count($pictureLikes);
            //     $hasLiked = $pictureLike->findPictureLike($profile->findByUserID($_SESSION['user_id'])->profile_id, $picture->picture_id);
            //     echo "<div class='image'>";
            //     echo "<img src='".BASE."/uploads/$picture->filename'/>";
            //     echo "<br><div><p id='caption'>$picture->caption</p><span>Likes: ".$pictureLikes."<input type='button' class='like' value='".($hasLiked == null? 'Like' : 'Unlike')."' pic='".$picture->picture_id."' user='".$data['profile']->user_id."'></span>";
            //     if ($data['profile']->profile_id == $profile->findByUserID($_SESSION['user_id'])->profile_id) {
            //         echo "<a href='".BASE."/Picture/edit/$picture->picture_id'>Modify</a>";
            //     }
            //     echo "</div></div>";
            // }
            // echo "</div>";
            // echo "<br><a href='".BASE."/Profile/viewProfile/".$data['profile']->user_id."'>Back to the Top</a>";
        ?>
        <?= spawnFooter(); ?>
    </body>
</html>