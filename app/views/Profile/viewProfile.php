<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView(); ?>
        <title>Profile</title>
    </head>
    <body>
        <?= spawnNavBar(); ?>
        
        <div class="container">
            <div class="banner">
                <div class="hForm">
                    <?php 
                        $profile = new \App\models\Profile();
                        $profile = $profile->findByID($data);
                        if ($profile->profile_picture_id != null) {
                            $picture = new \App\models\Picture();
                            $picture = $picture->findByPictureID($profile->profile_picture_id);
                            echo "<img class='profile-img mr20' src='".BASE."/uploads/$picture->filename' alt='$picture->alt'>";
                        } else {
                            echo "<img class='profile-img mr20' src='".BASE."/uploads/DefaultPicture.png' alt='Default Profile Picture'>";
                        }
                    ?>
                    <div class="profile-info">
                        <h2 class="header grid">
                            <?= $_SESSION['username'] ?>  
                            <?php echo ($profile->account_type == 'reader')? "<i class='fas fa-book-open tooltip'><span class='tooltip-text'>This user is a Reader.</span></i>" : "<i class='fas fa-pen tooltip'><span class='tooltip-text'>This user is a Writer.</span></i>"; ?> 
                        </h2>
                        <p class="description"><?= $profile->description ?></p>
                    </div>
                </div>
            </div>
            <div class="shelves">
                <div class="story-shelf">
                    <h2 class="setting-header">Stories</h2>
                    <?php 
                        $story = new \App\models\Story();
                        $stories = $story->findByProfile($profile->profile_id);
                        echo "<div class='container' style='overflow: hidden'>";
                        echo "<ul class='card_lst' style='' >";
                        spawnStoryCard($stories);                            
                        echo "</ul></div>";
                    ?>
                </div>
                <div class="favorite-shelf">
                    <h2 class="setting-header">Favorites</h2>
                    <?php 
                        $fav_story = new \App\models\FavoriteStory();
                        $fav_stories = $fav_story->findByProfile($profile->profile_id);
                        $stories = [];
                        foreach($fav_stories as $fav_story) {
                            $story = $story->findByID($fav_story->story_id);
                            array_push($stories, $story);
                        }
                        echo "<div class='container' style='overflow: hidden'>";
                        echo "<ul class='card_lst' style=''>";
                        spawnStoryCard($stories);                            
                        echo "</ul></div></div>";
                    ?>
                </div>
            </div>
        </div>
        <?= spawnFooter(); ?>
    </body>
</html>