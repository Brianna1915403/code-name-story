<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView() ?>  
        <title>Code Name: Story | Browse</title>
    </head>
    <body>
        <?= spawnNavBar() ?>
        <?php 
            if (isset($_GET['tags']))
                echo $_GET['tags'];
        ?>
        <?= spawnFooter() ?>
    </body>
</html>