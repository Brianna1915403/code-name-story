<?php
    namespace App\controllers;

    
    class SettingsController extends \App\core\Controller {
        
        function index() {
            if(isset($_SESSION['profile_id'])){
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            $user = new \App\models\User();
            $user = $user->findByUserID($_SESSION['user_id']);

            if (isset($_POST['profile'])) {
                $picture_controller = new \App\controllers\PictureController();
                if ($picture_controller->upload($_FILES['upload'], $_POST['alt'], "")) {
                    $picture = new \App\models\Picture();
                    if ($profile->profile_picture_id != null ) {
                        $profile->unsetProfilePicture();
                        $picture_controller->delete($profile->profile_picture_id);
                    }
                    $pictures = $picture->getAllByProfileID($profile->profile_id);
                    $profile->updateProfilePicture($pictures[0]->picture_id);   
                    $profile->description = $_POST['description'];
                    $profile->account_type = $_POST['account_type']; 
                    $profile->update();
                    header('location:'.BASE.'/Settings/index?success=Profile Updated');          
                } else if ($_FILES['upload']['tmp_name'] == "") {
                    $profile->description = $_POST['description'];
                    $profile->account_type = $_POST['account_type'];
                    $profile->update();
                    header('location:'.BASE.'/Settings/index?success=Profile Updated');
                } else {
                    header('location:'.BASE.'/Settings/index?error=Picture Invalid');
                }
            } else if (isset($_POST['account'])) {
                if(password_verify($_POST['old-password'], $user->password_hash)) {
                    if ($_POST['new-password'] == $_POST['confirm-new-password']) {
                        $user->password_hash = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
                        $user->update();
                        header('location:'.BASE.'/Settings/index?success=Password Changed');
                    } else {
                        header('location:'.BASE.'/Settings/index?error=Password Mismatch');
                    }
                } else {
                    header('location:'.BASE.'/Settings/index?error=Incorrect Password');
                }
            } else if (isset($_POST['theme'])) {
                $profile->theme = $_POST['color_scheme'];
                $profile->updateTheme();
                header('location:'.BASE.'/Settings/index');
            } else if (isset($_POST['2fa'])) {
                if(password_verify($_POST['password'], $user->password_hash)) {
                    header('location:'.BASE.'/Login/setup2fa');
                } else {
                    header('location:'.BASE.'/Settings/index?error=Incorrect Password');
                }
            } else {                
                $this->view('Settings/index', ['profile'=>$profile, 'user'=>$user]);
            }
        }else{
            header("location:".BASE."/home");
        }
        }
    
    }        
?>