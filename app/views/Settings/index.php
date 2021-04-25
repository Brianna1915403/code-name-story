<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView() ?>  
        <title>Code Name: Story | Settings</title>
    </head>
    <body>    
        <?= spawnNavBar() ?>
        <div class="container flex flex-between">
            <aside class="card menu">
                <ul>
                    <li class="menu-item">Account</li>
                    <li class="menu-item">2-Factor Authentication</li>
                    <li class="menu-item">Profile</li>
                </ul>
            </aside>
            <div class="card content">
                <div id="account-settings">
                    <form action="" method="post">
                        <label>Old Password <input type="password" name="old-password" id=""></label><br><br>
                        <label>New Password <input type="password" name="new-password" id=""></label><br><br>
                        <label>Confirm New Password <input type="password" name="confirm-new-password" id=""></label>
                    </form>
                </div>
            </div>
        </div>
        <!-- <a href="<?=BASE?>/Settings/editPassword">Change Password</a><br />            
        <a href="<?=BASE?>/Settings/editProfile">Edit Profile</a><br />             
        <a href="<?=BASE?>/Settings/setup2fa">Activate 2-Factor Authentication</a>     -->
        <?= spawnFooter() ?>         
    </body>
</html>