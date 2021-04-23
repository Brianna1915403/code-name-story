<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class ProfileController extends \App\core\Controller {        
        
        function index() {
            $this->view('Profile/viewMyProfile', $_SESSION['profile_id']);
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
        
        function viewProfile($profile_id){
            if(isset($_SESSION['user_id'])){
            $picture = new \App\models\Picture();
            $pictures = $picture->findByProfile($profile_id);
    
            $profile = new \App\models\Profile();
            $profile = $profile->find($profile_id);
    
            $message = new \App\models\Message();
            $messages = $message->getAllPublicMessages($profile_id);
    
            $this->view('Wall/wall', ['profile'=>$profile,'messages'=>$messages, 'pictures'=>$pictures]);
    
            if(isset($_POST["action"])){
                header("location:".BASE."/Message/add/".$profile_id);
            }else if(isset($_POST["search"])){
                $keyword = $_POST['keyword'];
    
                if($keyword == null){
                    $keyword = "_";
                    header("location:".BASE."/Profile/searchProfiles/".$keyword);
                } else {
                    header("location:".BASE."/Profile/searchProfiles/".$keyword);
                }
                
            }
        }else{
            header("location:".BASE."/Default/index/");
        }
    }
    
        function viewMyProfile(){
            if(isset($_SESSION['user_id'])){
            $picture = new \App\models\Picture();
            $pictures = $picture->findByProfile($_SESSION['profile_id']);
    
            $profile = new \App\models\Profile();
            $profile = $profile->find($_SESSION['profile_id']);
    
            $message = new \App\models\Message();
            $messages = $message->getAllMessagesForProfile($_SESSION['profile_id']);
            
            $picture_like = new \App\models\PictureLike();
            $pictures_like = $picture_like->getAll();
    
            $this->view('Wall/myWall', ['profile'=>$profile,'messages'=>$messages, 'pictures'=>$pictures, 'pictures_like'=>$pictures_like]);
    
            if(isset($_POST["action"])){
                header("location:".BASE."/Picture/add/");
            }
            else if(isset($_POST["search"])){
                $keyword = $_POST['keyword'];
    
                if($keyword == null){
                    $keyword = "_";
                    header("location:".BASE."/Profile/searchProfiles/".$keyword);
                } else {
                    header("location:".BASE."/Profile/searchProfiles/".$keyword);
                }
                
            }
        }else{
                header("location:".BASE."/Default/index/");
    
            }
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