<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinViewWithArgument() ?>   
    <script src="../js/storyCoverLoader.js"></script>
    <title>Code Name: Story | Edit Story</title>
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
    <div class="container">
        <div class="card mtb50">
            <h2 class='setting-header'>Edit Story Info</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="story-container hForm">
                    <div class="story-meta mr20">
                        <label>Story Title: <input type="text" name="title" value='<?= $data['story']->title ?>' required></label><br><br>
                        <label>Author: <input type="text" name="author" value='<?= $data['story']->author ?>' required></label><br><br>
                        <textarea name="description" placeholder="Write the synopsis/description of your story." maxlength=255 required><?= $data['story']->description ?></textarea>
                    </div>
                    <img id='preview-img' class='float-right mr100' src='../../uploads/<?= $data['picture']->filename ?>' alt='' width='210' height='210'><br>
                    <br><label>Upload a cover picture: <input id='upload' type='file' name='upload' ></label>
                </div>
                <div class='tag-container'>
                    <ul class='tag-list'>
                        <?php 
                            $tag = new \App\models\Tag();
                            $tags = $tag->getAll();
                            $story_tag = new \App\models\StoryTag();
                            $story_tags = $story_tag->getAllFromStory($data['story']->story_id);
                            $story_tag_ids = array();
                            foreach ($story_tags as $story_tag) {
                                array_push($story_tag_ids, $story_tag->tag_id);
                            }
                            foreach ($tags as $tag) {
                                $is_checked = in_array($tag->tag_id, $story_tag_ids);
                                echo "<li>";
                                echo "<input type='checkbox' name='tag[]' id='checkbox$tag->tag_id' value='$tag->tag_id' ".($is_checked? 'checked' : "").">";
                                echo "<label for='checkbox$tag->tag_id'>$tag->name</label>";
                                echo "</li>";
                            }
                        ?>                         
                    </ul>  
                </div>             
                <input class='btn light-theme-bg-accent' type="submit" name='action' value="Edit Story">
            </form>
        </div>
    </div>
    <?= spawnFooter() ?>
</body>
</html>