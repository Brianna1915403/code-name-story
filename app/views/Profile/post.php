<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post</title>
        <style>
            li {display: inline; margin-right: 10px;}
        </style>
    </head>
    <body>
        <ul>
            <li><a href="<?=BASE?>/Profile/viewProfile/<?= $_SESSION['user_id'] ?>">Home</a></li>
            <li><a href="<?=BASE?>/Profile/post">Post</a></li>
            <li><a href="<?=BASE?>/Search/index">Search Users</a></li>
            <li><a href="<?=BASE?>/Settings/index">Settings</a></li>
            <li><a href="<?=BASE?>/Login/logout">Log Out</a></li>
        </ul><br />

        <p> What would you like to do <?= $_SESSION['username'] ?> ? </p>
        <a href="<?=BASE?>/Picture/upload"> Post a Picture </a>
        <!-- <form action="" method="POST">
            <label>Select an image to upload: <input type="file" name="upload" /></label><br>
            <textarea name="description" placeholder="Image Caption" cols="50"></textarea><br>
            
        </form> -->
        <!-- TODO: Figure out how public message read status applies -->
        <a href="<?=BASE?>/Message/send"> Post a Message </a>
        <!-- <p> Post a Message: </p>
        <textarea name="description" placeholder="Message" cols="50"></textarea><br> -->
    </body>
</html>