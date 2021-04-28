<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class SettingsController extends \App\core\Controller {
        
        function index() {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            $user = new \App\models\User();
            $user = $user->findByUserID($_SESSION['user_id']);
            $this->view('Settings/index', ['profile'=>$profile, 'user'=>$user]);
        }

        function setup2fa() {
            $_SESSION['source'] = "Settings";
            header('location:'.BASE.'/Login/setup2fa');
        }

        function editProfile() {
            header('location:'.BASE.'/Profile/editProfile/'.$_SESSION['profile_id']);
        }

        function editPassword() {
            header('location:'.BASE.'/Login/editPassword/'.$_SESSION['profile_id']);
        }
    }        
?>