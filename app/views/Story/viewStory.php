<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinViewWithArgument() ?>  
        <title>Code Name: Story | Browse</title>
    </head>
    <body>
        <?= spawnNavBar() ?>
        <?php 
            if(isset($_GET['error'])) {
                echo "<div class='error'>
                    <i class='fas fa-info-circle'></i>
                    <span id='#error-text' style='margin-left: 5px;'>".$_GET['error']."!</span></div>";
            } else if(isset($_GET['success'])) {
                echo "<div class='success'>
                    <i class='fas fa-check'></i>
                    <span id='#success-text' style='margin-left: 5px;'>".$_GET['success']."!</span></div>";
            }
        ?>
        <?php
        echo"<div class=\"container\" style=\"overflow: hidden\">";
            $story = $data['story'];

            $favorite_story = new \App\models\FavoriteStory();
            $favorite_story = $favorite_story->getFavoritesStory($story->story_id);
            $count_num = count($favorite_story);
            echo"<a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Profile/viewProfile/$story->profile_id'>View Profile</a>";
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
                            <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Chapter/createChapter/$story->story_id'>Add Chapter</a>
                            <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Story/editStory/$story->story_id'>Edit Story Info</a>
                        ";
                    }
                    if($favorite_story_profile === false){
                        echo "
                        <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Story/subscribe/$story->story_id'>Favorite</a>";
                    }else if($favorite_story_profile->profile_id !== $_SESSION['profile_id']){
                        echo "
                        <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Story/subscribe/$story->story_id'>Favorite</a>";
                    }else{
                        echo "
                        <a class='btn light-theme-bg-accent float-right mt10' href='".BASE."/Story/unsubscribe/$story->story_id'>Unfavorite</a>";
                    }
                }

                echo"
                    <div class=\"banner hForm mt100 \">
                        <div class='cover mr20'>
                            <img src=\"../../uploads/$picture->filename\" alt=\"$picture->alt\" width=\"210\" height=\"210\">
                        </div>
                        <div>
                            <h3 class=\"subj\">$story->title</h3>
                            <p class=\"author\">$story->author</p>
                            <p class=\"grade_area\">
                                <span class=\"ico_like3\">Favorites: </span><em class=\"grade_num\">$count_num</em>
                            </p>
                            <span class=\"genre\" style=\"position: unset\">";
                            $story_tag = new \App\models\StoryTag();
                            $story_tags = $story_tag->getAllFromStory($story->story_id);
                            foreach($story_tags as $story_tag) {
                                echo "#".$story_tag->getTagName()." ";
                            }
                    echo "
                            </span>                    
                            <p class=\"summary\">Description: $story->description</p>
                        </div>
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
            $liked_chapter = new \App\models\LikedChapter();
            $liked_chapter = $liked_chapter->getLikesChapter($chapter->chapter_id);
            $count_num = count($liked_chapter);

            echo"<li>
            
                <a href='".BASE."/Chapter/viewChapter/$chapter->chapter_id' class=\"NPI=a:list,i=1022,r=133,g:en_en\">
                    
                    <span class=\"subj\"><span>$chapter->chapter_title</span></span>
                    <span class=\"manage_blank\"></span>
                    <span class=\"date\">$chapter->date_created</span>
                    
                    
                    
                    <span class=\"like_area _likeitArea\"><em class=\"ico_like _btnLike _likeMark\">Likes: </em>$count_num</span>
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