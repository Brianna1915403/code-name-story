<?php
    namespace App\controllers;

    class SettingsController extends \App\core\Controller {
        
        function index() {
            $this->view('Settings/index');
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