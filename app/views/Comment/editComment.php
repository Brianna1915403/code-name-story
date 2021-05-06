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
            $comment = $data;

            if(isset($_SESSION['profile_id'])){
                echo"
                <form action=\"\" method=\"post\">                                  
                    <textarea class='comment-textarea' name=\"text\" cols=\"50\" rows=\"5\" maxlength='1024' placeholder=\"Reply to this comment\">$comment->text</textarea><br /><br />
                    <input class='btn light-theme-bg-accent light-theme-text' type=\"submit\" name=\"update\" value=\"Update\">
                </form>
                    ";
                }
        ?>
        <?= spawnFooter() ?>
    </body>
</html>