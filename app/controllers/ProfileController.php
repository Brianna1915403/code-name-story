<?php
    namespace App\controllers;

    class ProfileController extends \App\core\Controller {        
        #[\App\core\LoginFilter]
        function home() {
            $this->view('Profile/viewProfile', $_SESSION['profile_id']);
        }
        #[\App\core\LoginFilter]
        function createProfile() {
        if(isset($_SESSION['user_id'])){
            if(isset($_POST['action'])){
               $profile = new \App\models\Profile();
               $profile->user_id = $_SESSION['user_id'];
               $profile->account_type = $_POST['account_type'];
               $profile->description = $_POST['description'];
               $profile->insert();
               $profile = $profile->findByUserID($profile->user_id);
               $_SESSION['profile_id'] = $profile->profile_id;
               $_SESSION['account_type'] = $profile->account_type;
               header('location:'.BASE.'/home');
            } else {
                $this->view('Profile/createProfile');
            }
        }else{
            header('location:'.BASE.'/home');
        }
        }
        
        function viewProfile($profile_id) {
            $this->view('Profile/viewProfile', $profile_id);
        }
    }    
?>