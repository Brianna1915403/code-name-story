<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinView() ?>    
    <title>Code Name: Story | Story List</title>
</head>
<body>
    <?= spawnNavBar() ?>
    <div class="container">
        <div class="card mtb50">
            <h2 class='setting-header'>Create Your Story</h2>
            <form action="" method="post">
                <section class="story-container">
                    <label>Story Title: <input type="text" name="title"></label><br><br>
                    <label>Author: <input type="text" name="author" value='<?= $_SESSION['username'] ?>'></label><br><br>
                    <textarea name="description" placeholder="Story description/synopsis" maxlength=255></textarea>
                </section class='tag-container'>
                <section>
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
                </section>             
                <input class='btn light-theme-bg-accent' type="submit" name='action' value="Create Story">
            </form>
        </div>
    </div>
    <?= spawnFooter() ?>
</body>
</html>