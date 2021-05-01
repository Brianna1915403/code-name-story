<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView() ?>  
        <script src="../js/settings.js"></script>
        <title>Code Name: Story | Settings</title>
    </head>
    <body>    
        <?= spawnNavBar() ?>   
        <div class="notice">
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
        </div>     
        <div class="settings container flex flex-between">            
            <aside class="card menu">
                <ul>
                    <li id='profile' class="menu-item">Update Profile</li>
                    <li id='appearance' class="menu-item">Appearance</li>
                    <li id='password' class="menu-item">Change Password</li>
                    <li id='2fa' class="menu-item">2-Factor Authentication</li>
                </ul>
            </aside>
            <!-- FIX: Section stops $_POST from seeing upload -->
            <div class="card content">
                <div id="profile-settings">
                    <h2 class='setting-header'>Update Profile</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php  
                            if ($data['profile']->profile_picture_id != null) {                      
                                $picture = new \App\models\Picture();
                                $picture = $picture->findByPictureID($data['profile']->profile_picture_id);
                                echo "<img id='preview-img' class='profile-img' src='".BASE."/uploads/$picture->filename' alt='$picture->alt'>";
                                echo "<div class='pic-upload'>";
                                echo "<label>Upload a profile picture: <input id='upload' type='file' name='upload'></label><br>";
                                echo "<label>Image Alt Text: <input type='text' name='alt' value=\"$picture->alt\"></lable>";
                            } else {
                                echo "<img id='preview-img' class='profile-img' src='".BASE."/uploads/DefaultPicture.png' alt='Default Profile Picture'>";
                                echo "<div class='pic-upload'>";
                                echo "<label>Upload a profile picture: <input id='upload' type='file' name='upload'></label><br>";
                                echo "<label>Image Alt Text: <input type='text' name='alt' value=\"".$data['user']->username."'s Profile Picture\"></lable>";
                            }   
                            echo "</div><br>";
                        ?>
                            <label for="description">Description</label><br>
                            <textarea class='profile-textarea update-textarea'  name="description" cols="50" rows="5" maxlength='255' placeholder="Describe Yourself"><?= $data['profile']->description?></textarea><br><br>
                            <label>What account type would you like to be? <select id="account-type" name="account_type">
                                <option value="reader" <?php echo $data['profile']->account_type == 'reader'? "selected" : ""; ?>>Reader</option>
                                <option value="writer" <?php echo $data['profile']->account_type == 'reader'? "" : "selected"; ?>>Writer</option>
                            </select></label><br><br>
                            <input class="btn btn-accent-light" type="submit" name='profile' value="Update Profile">
                    </form>
                </div>
                <div id="account-settings" style="display:none;">
                    <h2 class='setting-header'>Change Password</h2>
                    <form action="" method="post">
                    
                        <label>Old Password <input type="password" name="old-password" id=""></label><br><br>
                        <label>New Password <input type="password" name="new-password" id=""></label><br><br>
                        <label>Confirm New Password <input type="password" name="confirm-new-password" id=""></label><br><br>
                        <input class="btn btn-accent-light" type="submit" name='account' value="Change Password">
                    </form>
                </div>
                <div id="theme-settings" style="display:none;">
                    <h2 class='setting-header'>Theme</h2>
                    <form id="theme-form" action="" method="post">      
                        <div id='theme-options' class="flex flex-wrap">
                            <div id='light-theme' class="radio-button light-theme-outline">              
                                <label for="light-theme">
                                    <img src="../images/light_theme_preview.png" alt="">
                                    <span class='mr5 ml5'>Light</span>
                                </label>
                                <input type="radio" name="color_scheme" id="light-theme-radio" value='light' <?php echo $data['profile']->theme == 'light'? "checked" : ""; ?>>
                            </div>
                            <div id='dark-theme' class="radio-button light-theme-outline">              
                                <label for="dark-theme">
                                    <img src="../images/dark_theme_preview.png" alt="">
                                    <span class='mr5 ml5'>Dark</span>
                                </label>
                                <input type="radio" name="color_scheme" id="dark-theme-radio" value='dark' <?php echo $data['profile']->theme == 'dark'? "checked" : ""; ?>>
                            </div>
                            <div id='blue-theme' class="radio-button light-theme-outline">              
                                <label for="light-theme">
                                    <img src="../images/light_theme_preview.png" alt="">
                                    <span class='mr5 ml5'>Blue</span>
                                </label>
                                <input type="radio" name="color_scheme" id="blue-theme-radio" value='blue' <?php echo $data['profile']->theme == 'blue'? "checked" : ""; ?>>
                            </div>
                            <div id='green-theme' class="radio-button light-theme-outline">              
                                <label for="light-theme">
                                    <img src="../images/light_theme_preview.png" alt="">
                                    <span class='mr5 ml5'>Green</span>
                                </label>
                                <input type="radio" name="color_scheme" id="green-theme-radio" value='green' <?php echo $data['profile']->theme == 'green'? "checked" : ""; ?>>
                            </div>
                        </div><br><br>
                        <input class="btn btn-accent-light" type="submit" name='theme' value="Change Theme">
                    </form>
                </div>
                <div id="2fa-settings" style="display:none;">
                    <h2 class='setting-header'>2-Factor Authentication</h2>
                    <form action="" method="post">  
                        <label>Enter your password to confirm it's you: <input type="password" name="password" id="" require></label><br><br>
                        <?php     
                            $hasToken = $data['user']->token == null;        
                            echo "<input class='btn light-theme-bg-accent".($hasToken? "" : "caution-btn")."' type='submit' name='2fa' value='".($hasToken? "Activate 2-Factor Authentication" : "Deactivate 2-Factor Authentication")."'>";
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <?= spawnFooter() ?>         
    </body>
</html>