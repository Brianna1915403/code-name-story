<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinView() ?>    
    <title>Code Name: Story | Story List</title>
</head>
<body>
    <?= spawnNavBar() ?>
    <div class="container">
    <div class="right-align flex">
        <a class='btn light-theme-bg-accent mt10 right-align' href="<?= BASE ?>/Story/createStory">Create New Story</a>
    </div>
    <h2 class="setting-header">All My Stories</h2>
        <?php 
            echo "<div class='container' style='overflow: hidden'>";
            echo "<ul class='card_lst' style='' >";
            spawnStoryCardWithinCreate($data);                            
            echo "</ul></div>";
        ?>
    </div>
    <?= spawnFooter() ?>
</body>
</html>