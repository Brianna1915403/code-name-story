<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Settings</title>
        <style>
            li {display: inline; margin-right: 10px;}
        </style>
    </head>
    <body>    
        <ul>
            <li><a href="<?=BASE?>/Profile/viewProfile/<?= $_SESSION['user_id'] ?>">Home</a></li>
            <li><a href="">Search Users</a></li>
            <li><a href="<?=BASE?>/Login/logout">Log Out</a></li>
        </ul><br />
        <p> What would you like to do? </p>
        <a href="<?=BASE?>/Settings/editPassword">Change Password</a><br />            
        <a href="<?=BASE?>/Settings/editProfile">Edit Profile</a><br />             
        <a href="<?=BASE?>/Settings/setup2fa">Activate 2-Factor Authentication</a>             
    </body>
</html>