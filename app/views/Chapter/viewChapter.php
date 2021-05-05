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
            $story = new \App\models\Story();
            $story = $story->findByID($chapter->story_id);

            $liked_chapter = new \App\models\LikedChapter();
            $liked_chapter = $liked_chapter->getLikesChapter($chapter->chapter_id);
            $count_num = count($liked_chapter);

            if(isset($_SESSION['profile_id']))
                    if($story->profile_id == $_SESSION['profile_id']){
                        echo"
                        <a class='btn caution-btn float-right mt10' href='".BASE."/Chapter/editChapter/$chapter->chapter_id'>Edit Chapter</a>
                        <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Chapter/deleteChapter/$chapter->chapter_id'>Delete Chapter</a>
                        ";
                    }
                echo"
                    <div class=\"info\">
                        <h3 class=\"subj\">$chapter->chapter_title</h3>
                        <p class=\"date\">$chapter->date_created</p>
                        <p class=\"text\">$chapter->chapter_text</p><br>
                        <p class=\"grade_area\" style=\"display: inline\">
                            <span class=\"ico_like3\">Likes: </span><em class=\"grade_num\">$count_num</em>
                        </p>";
                    if(isset($_SESSION['profile_id'])){
                            $like_chapter_profile = new \App\models\LikedChapter();    
                            $like_chapter_profile = $like_chapter_profile->find($chapter->chapter_id, $_SESSION['profile_id']);
                        if($like_chapter_profile === false){
                            echo "
                            <a class='btn caution-btn float-right mt10' href='".BASE."/Chapter/like/$chapter->chapter_id'>Like</a>";
                        }else if($like_chapter_profile->profile_id !== $_SESSION['profile_id']){
                            echo "
                            <a class='btn caution-btn float-right mt10' href='".BASE."/Chapter/like/$chapter->chapter_id'>Like</a>";
                        }else{
                            echo "
                            <a class='btn caution-btn float-right mt10' href='".BASE."/Chapter/unlike/$chapter->chapter_id'>Liked!</a>";
                        }
                    }
                    echo"</div>
                </div>";
            
            ;
        ?>

        <?php
        $chapter = $data['chapter'];
        echo"
        <div class=\"container\" style=\"overflow: hidden\">
            <div class=\"detail_body banner\" style=\"background:#fff ;background-size:306px\">
                <div class=\"detail_lst\">
                    <ul id=\"_listUl\">";
                    
                    if(isset($_SESSION['profile_id'])){
                        echo"
                    <form action=\"\" method=\"post\">                                  
                        <textarea class='comment-textarea' name=\"text\" cols=\"50\" rows=\"5\" maxlength='1024' placeholder=\"What is on your mind\"></textarea><br />
                        <input class='btn light-theme-bg-accent light-theme-text' type=\"submit\" name=\"comment\" value=\"Comment\"><br /><br />
                    </form>
                        ";
                    }
        if($data['chapter'] != null){
        foreach($data['comment'] as $comment){
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