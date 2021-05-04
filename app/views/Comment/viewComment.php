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
            $comment = $data['original_comment'];
            if(isset($_SESSION['profile_id']))
                    if($comment->profile_id == $_SESSION['profile_id']){
                        echo"
                            <button href='".BASE."/Comment/editComment/$comment->comment_id'>Edit Comment</button>
                            <button href='".BASE."/Comment/deleteComment/$comment->comment_id'>Delete Comment</button>
                        ";
                    }

            $profile = new \App\models\Profile();
            $profile = $profile->findByID($comment->profile_id);

            $picture = new \App\models\Picture();
            $picture = $picture->findByPictureID($profile->profile_picture_id);

            $user = new \App\models\User();
            $user = $user->findByUserID($profile->user_id);

            
            
            echo"<li>
            <a href='".BASE."/Comment/viewComment/$profile->profile_id'>
            <img src=\"../../uploads/$picture->filename\" alt=\"$picture->alt\" width=\"50\" height=\"50\">
            <h3 style=\"color: white; display: inline\">$user->username</h3><br>
                <span class=\"subj\"><span>$comment->text</span></span>
                <span class=\"manage_blank\"></span>
            <h3 class=\"date\">Commented on: $comment->date_commented</h3>
            
            </a>
            </li>";

            if(isset($_SESSION['profile_id'])){
                        echo"
                    <form action=\"\" method=\"post\">                                  
                        <textarea class='comment-textarea' name=\"text\" cols=\"50\" rows=\"5\" maxlength='1024' placeholder=\"Reply to this comment\"></textarea><br /><br />
                        <input class='btn light-theme-bg-accent light-theme-text' type=\"submit\" name=\"action\" value=\"Comment\">
                    </form>
                        ";
                    }

        ?>

        <?php
        echo"
        <div class=\"container\" style=\"overflow: hidden\">
            <div class=\"detail_body banner\" style=\"background:#fff ;background-size:306px\">
                <div class=\"detail_lst\">
                    <ul id=\"_listUl\">";
        if($data['reply_comments'] != null){
        foreach($data['reply_comments'] as $comment){
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($comment->profile_id);

            $picture = new \App\models\Picture();
            $picture = $picture->findByPictureID($profile->profile_picture_id);

            $user = new \App\models\User();
            $user = $user->findByUserID($profile->user_id);

            
            
            echo"<li>
            <a href='".BASE."/Comment/viewComment/$comment->comment_id'>
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
        echo"<h3>There are no replies...</h3>";
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