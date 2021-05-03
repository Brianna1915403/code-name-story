<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinViewWithArgument() ?>  
        <title>Code Name: Story | Browse</title>
    </head>
    <body>
        <?= spawnNavBar() ?>
        <?php 
            if (isset($_GET['tags']))
                echo $_GET['tags'];
        ?>

        <?php
        echo"<div class=\"container\" style=\"overflow: hidden\">";
            $chapter = $data['chapter'];
                echo"
                    <div class=\"info\">
                        <h3 class=\"subj\">$chapter->chapter_title</h3>
                        <p class=\"date\">$chapter->date_created</p>
                        <p class=\"text\">$chapter->chapter_text</p>
                        <p class=\"grade_area\">
                            <span class=\"ico_like3\">Likes: </span><em class=\"grade_num\">$chapter->likes</em>
                        </p>
                    </div>
                </div>";
            
            ;
        ?>

        <?php
        echo"
        <div class=\"container\" style=\"overflow: hidden\">
            <div class=\"detail_body banner\" style=\"background:#fff ;background-size:306px\">
                <div class=\"detail_lst\">
                    <ul id=\"_listUl\">";
        if($data['chapter'] != null){
        foreach($data['comment'] as $comment){
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($comment->profile_id);

            $picture = new \App\models\Picture();
            $picture = $picture->findByPictureID($profile->profile_picture_id);

            $user = new \App\models\User();
            $user = $user->findByUserID($profile->user_id);
            
            echo"<li>
            <a href='".BASE."/Comment/viewComment/$profile->profile_id'>
            <img src=\"../../uploads/$picture->filename\" alt=\"$picture->alt\" width=\"50\" height=\"50\">
            <h3 style=\"color: white; display: inline\">$user->username</h3>
                <span class=\"subj\"><span>$comment->text</span></span>
                <span class=\"manage_blank\"></span>
            <h3 class=\"date\">Commented on: $comment->date_commented</h3>
            
            </a>
            </li>";
        }
    }
    else{
        echo"<h3>There are no comments...</h3>";
    }


        echo"
                    </ul>
                </div>
            </div>
        </div>";
        
        
        ?>


            
            
            
            

    
        
        <?= spawnFooter() ?>
    </body>
</html>