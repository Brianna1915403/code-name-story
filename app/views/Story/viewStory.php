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
                if ($story->story_picture_id != null) {
                    $picture = new \App\models\Picture();
                    $picture = $picture->findByPictureID($story->story_picture_id);
                }
                echo"
                
                    <div class=\"info\">
                        <h3 class=\"subj\">$story->title</h3>
                        <p class=\"author\">$story->author</p>
                        <p class=\"grade_area\">
                            <span class=\"ico_like3\">Likes: </span><em class=\"grade_num\">UNKNOWN</em>
                        </p>
                    <span class=\"genre\" style=\"position: unset\">GENRE</span>
                    
                        <p class=\"summary\">Description: $story->description</p>
                        <img src=\"../../uploads/$picture->filename\" alt=\"$picture->alt\" width=\"550\" height=\"550\">
                    </div>
                </div>";
            
            ;
        ?>

        <?php
        
        
        ?>

<div class="container" style="overflow: hidden">
<div class="detail_body banner" style="background:#fff ;background-size:306px">
    <div class="detail_lst">
    
            <ul id="_listUl">
            
            <li id="episode_133" data-episode-no="133">
            
                <a href="https://www.webtoons.com/en/fantasy/lumine/s2-episode-123/viewer?title_no=1022&amp;episode_no=133" class="NPI=a:list,i=1022,r=133,g:en_en">
                    
                    <span class="subj"><span>[S2] Episode 123</span></span>
                    <span class="manage_blank"></span>
                    <span class="date">Apr 24, 2021</span>
                    
                    
                    
                    <span class="like_area _likeitArea"><em class="ico_like _btnLike _likeMark">Likes</em>63,177</span>
                </a>
            </li>
            
            </ul>
        </div>
    </div>
</div>

    
        
        <?= spawnFooter() ?>
    </body>
</html>