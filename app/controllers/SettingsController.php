<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class SettingsController extends \App\core\Controller {
        
        function index() {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            $user = new \App\models\User();
            $user = $user->findByUserID($_SESSION['user_id']);

            if (isset($_POST['profile'])) {
                var_dump($_POST['picture']);
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

            } else if (isset($_POST['2fa'])) {

            } else {                
                $this->view('Settings/index', ['profile'=>$profile, 'user'=>$user]);
            }
        }

        // function setup2fa() {
        //     $_SESSION['source'] = "Settings";
        //     header('location:'.BASE.'/Login/setup2fa');
        // }

        // function updateProfile() {
        //     header('location:'.BASE.'/Profile/editProfile/'.$_SESSION['profile_id']);
        // }

        // function editPassword() {
        //     header('location:'.BASE.'/Login/editPassword/'.$_SESSION['profile_id']);
        // }
    }        
?>