<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinView() ?>   
    <script src="../js/storyCoverLoader.js"></script>
    <title>Code Name: Story | Create Story</title>
</head>
<body>
    <?= spawnNavBar() ?>
    <div class="container">
        <div class="card mtb50">
            <h2 class='setting-header'>Create Your Story</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="story-container hForm">
                    <div class="story-meta mr20">
                        <label>Story Title: <input type="text" name="title" required></label><br><br>
                        <label>Author: <input type="text" name="author" value='<?= $_SESSION['username'] ?>' required></label><br><br>
                        <textarea name="description" placeholder="Write the synopsis/description of your story." maxlength=255 required></textarea>
                    </div>
                    <img id='preview-img' class='float-right mr100' src='' alt='' width='210' height='210'><br>
                    <br><label>Upload a cover picture: <input id='upload' type='file' name='upload' required></label>
                </div>
                <div class='tag-container'>
                    <ul class='tag-list'>
                        <?php 
                            $tag = new \App\models\Tag();
                            $tags = $tag->getAll();
                            foreach ($tags as $tag) {
                                echo "<li>";
                                echo "<input type='checkbox' name='tag[]' id='checkbox$tag->tag_id' value='$tag->tag_id'>";
                                echo "<label for='checkbox$tag->tag_id'>$tag->name</label>";
                                echo "</li>";
                            }
                        ?>                         
                    </ul>  
                </div>             
                <input class='btn light-theme-bg-accent' type="submit" name='action' value="Create Story">
            </form>
        </div>
    </div>
    <?= spawnFooter() ?>
</body>
</html>