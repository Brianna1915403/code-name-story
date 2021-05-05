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
            $story = $data['story'];

            $favorite_story = new \App\models\FavoriteStory();
            $favorite_story = $favorite_story->getFavoritesStory($story->story_id);
            $count_num = count($favorite_story);
                if ($story->story_picture_id != null) {
                    $picture = new \App\models\Picture();
                    $picture = $picture->findByPictureID($story->story_picture_id);
                }
                if(isset($_SESSION['profile_id'])){
                $favorite_story_profile = new \App\models\FavoriteStory();    
                $favorite_story_profile = $favorite_story_profile->find($story->story_id, $_SESSION['profile_id']);
                    if($story->profile_id == $_SESSION['profile_id']){
                        echo"
                            <a class='btn caution-btn float-right mt10' href='".BASE."/Story/deleteStory/$story->story_id'>Delete Story</a>
                            <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Chapter/addChapter/$story->story_id'>Add Chapter</a>
                            <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Story/editStory/$story->story_id'>Edit Story Info</a>
                        ";
                    }
                    if($favorite_story_profile === false){
                        echo "
                        <button class='btn caution-btn float-right mt10' href='".BASE."/Story/subscribe/$story->story_id'>Subscribe</button>";
                    }else if($favorite_story_profile->profile_id !== $_SESSION['profile_id']){
                        echo "
                        <button class='btn caution-btn float-right mt10' href='".BASE."/Story/subscribe/$story->story_id'>Subscribe</button>";
                    }else{
                        echo "
                        <button class='btn caution-btn float-right mt10' href='".BASE."/Story/unsubscribe/$story->story_id'>Unsubscribe</button>";
                    }
                }

                echo"
                    <div class=\"info\">
                        <h3 class=\"subj\">$story->title</h3>
                        <p class=\"author\">$story->author</p>
                        <p class=\"grade_area\">
                            <span class=\"ico_like3\">Subscribed: </span><em class=\"grade_num\">$count_num</em>
                        </p>
                    <span class=\"genre\" style=\"position: unset\">GENRE</span>                    
                        <p class=\"summary\">Description: $story->description</p>
                        <img src=\"../../uploads/$picture->filename\" alt=\"$picture->alt\" width=\"500\" height=\"500\">
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
        foreach($data['chapter'] as $chapter){
            echo"<li>
            
                <a href='".BASE."/Chapter/viewChapter/$chapter->chapter_id' class=\"NPI=a:list,i=1022,r=133,g:en_en\">
                    
                    <span class=\"subj\"><span>$chapter->chapter_title</span></span>
                    <span class=\"manage_blank\"></span>
                    <span class=\"date\">$chapter->date_created</span>
                    
                    
                    
                    <span class=\"like_area _likeitArea\"><em class=\"ico_like _btnLike _likeMark\">Likes</em>$chapter->likes</span>
                </a>
            </li>";
        }
    }
    else{
        echo"<h3>There are no chapters added to the story yet...</h3>";
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