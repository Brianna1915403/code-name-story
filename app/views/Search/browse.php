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
            echo "<div class='container' style='overflow: hidden'>";
            echo "<ul class='card_lst' style='' >";
            spawnStoryCard($data);                            
            echo "</ul></div>";

        // echo"<div class=\"container\" style=\"overflow: hidden\">
        // <ul class=\"card_lst\" style=\"\">";
        //     foreach($data as $story){
        //         if ($story->story_picture_id != null) {
        //             $picture = new \App\models\Picture();
        //             $picture = $picture->findByPictureID($story->story_picture_id);
        //         }
        //         echo"<li>
        //         <a href='".BASE."/Story/viewStory/$story->story_id' class=\"card_item NPI=a:list,i:2574,r:2,g:en_en\">
        //             <div class=\"card_flipper\">
        //                 <div class=\"card_front\">
        //                     <img src=\"../../uploads/$picture->filename\" alt=\"$picture->alt\" width=\"210\" height=\"210\">
                            
        //                 </div>
                        
        //                 <div class=\"card_back\">
        //                     <div class=\"info\">
        //                         <h3 class=\"subj\">$story->title</h3>
        //                         <p class=\"author\">$story->author</p>
        //                         <p class=\"grade_area\">
        //                             <span class=\"ico_like3\">Likes: </span><em class=\"grade_num\">UNKNOWN</em>
        //                         </p>
        //                     <span class=\"genre\">GENRE</span>
                                
        //                         <p class=\"line\"></p>
        //                         <p class=\"summary\">$story->description</p>
        //                     </div>
        //                 </div>
        //             </div>
        //     </a>
        // </li>";
        //     }
            

        // echo"</ul>
        // </div>";

        ?>

    
        
        <?= spawnFooter() ?>
    </body>
</html>