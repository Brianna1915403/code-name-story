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
        echo "<div class='container' style='overflow: hidden'>" ;    
            echo "<ul class='card_lst' style='' >"; 
                spawnStoryCard($data);
            echo "</ul>";                          
        echo "</div>";                          
        ?>
            
        
        <?= spawnFooter() ?>
    </body>
</html>