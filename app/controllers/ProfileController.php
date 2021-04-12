<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class ProfileController extends \App\core\Controller {        
        
        function index() {
            $this->view('Profile/viewProfile', $_SESSION['user_id']);
        }

        #[\App\core\LoginFilter]
        function createProfile() {
            if(isset($_POST['action'])){
               $profile = new \App\models\Profile();
               $profile->user_id = $_SESSION['user_id'];
               $profile->first_name = $_POST['first_name'];
               $profile->middle_name = $_POST['middle_name'];
               $profile->last_name = $_POST['last_name'];
               $profile->insert();
               header('location:'.BASE.'/Profile/viewProfile/'.$_SESSION['user_id']);
            } else {
                $this->view('Profile/createProfile');
            }
        }
        
        #[\App\core\LoginFilter]
        function viewProfile($user_id) {
          $profile = new \App\models\Profile();
            $profile = $profile->findByUserID($user_id);
            $picture = new \App\models\Picture();
            $pictures = $picture->getAllByProfileID($profile->profile_id);  
            if (isset($_POST['action'])) {
                $profile = new \App\models\Profile();
                $profile = $profile->findByUserID($user_id);
                $message = new \App\models\Message();
                $message->sender = $profile->findByUserID($_SESSION['user_id'])->profile_id;
                $message->receiver = $profile->profile_id;
                $message->message = $_POST['message'];
                $message->privacy_status = $_POST['privacy_status'];
                $message->insert();
                $messages = $message->getAllWhereReceiver($profile->profile_id);
                $this->view('Profile/viewProfile', ['profile'=>$profile, 'pictures'=>$pictures, 'messages'=>$messages]);
                echo "Message Sent";
            } else {
                $profile = new \App\models\Profile();
                $profile = $profile->findByUserID($user_id);
                $message = new \App\models\Message();
                $messages = $message->getAllWhereReceiver($profile->profile_id);
                if ($profile->profile_id == $profile->findByUserID($_SESSION['user_id'])->profile_id) {
                    $pictureLike = new \App\models\PictureLike();
                    $pictureLikes = $pictureLike->getAllByProfileID($profile->profile_id);
                    foreach ($pictureLikes as $pictureLike) {
                        $pictureLike->updateSeen();
                    }
                    foreach ($messages as $message) {
                        if ($message->privacy_status == "public") {
                            $message->read_status = 'read';
                            $message->updateReadStatus();
                        }
                    }
                }   
                         
                $this->view('Profile/viewProfile', ['profile'=>$profile, 'pictures'=>$pictures, 'messages'=>$messages]);
            }
        }

        #[\App\core\LoginFilter]
        function editProfile($user_id) {
            if(isset($_POST['action'])) {
                $profile = new \App\models\Profile();
                $profile = $profile->findByUserID($user_id);
                $profile->first_name = $_POST['first_name'];
                $profile->middle_name = $_POST['middle_name'];
                $profile->last_name = $_POST['last_name'];
                $profile->update();
                header('location:'.BASE.'/Settings/index'); //Hard coded since setting is the only way to get here
            } else {
                $profile = new \App\models\Profile();            
                $this->view('Profile/editProfile', $profile->findByUserID($user_id));
            }
        }

        #[\App\core\LoginFilter]
        function post() {
            $this->view('Profile/post');
        }
    }
    
?>