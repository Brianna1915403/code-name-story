<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class ProfileController extends \App\core\Controller {        
        
        function home() {
            $this->view('Profile/viewProfile', $_SESSION['profile_id']);
        }

        #[\App\core\LoginFilter]
        function createProfile() {
            if(isset($_POST['action'])){
               $profile = new \App\models\Profile();
               $profile->user_id = $_SESSION['user_id'];
               $profile->account_type = $_POST['account_type'];
               $profile->description = $_POST['description'];
               $profile->insert();
               $profile = $profile->findByUserID($profile->user_id);
               $_SESSION['profile_id'] = $profile->profile_id;
               header('location:'.BASE.'/home');
            } else {
                $this->view('Profile/createProfile');
            }
        }
        
        function viewProfile($profile_id) {
            $this->view('Profile/viewProfile', $profile_id);
        }

        #[\App\core\LoginFilter]
        function editProfile($profile_id) {
            if(isset($_POST['action'])) {
                $profile = new \App\models\Profile();
                $profile = $profile->findByUserID($profile_id);
                $profile->account_type = $_POST['account_type'];
                $profile->description = $_POST['description'];
                $profile->theme = $_POST['theme'];
                $profile->update();
                header('location:'.BASE.'/Profile/editProfile/'.$_SESSION['profile_id']);
            } else {
                $profile = new \App\models\Profile();            
                $this->view('Profile/editProfile', $profile->findByID($profile_id));
            }
        }

        #[\App\core\LoginFilter]
        function post() {
            $this->view('Profile/post');
        }
    }
    
?>