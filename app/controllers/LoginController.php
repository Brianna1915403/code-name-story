<?php
    namespace App\controllers;

    class LoginController extends \App\core\Controller {
        
        function index() {
            header('location:'.BASE.'/Login/login-register');
        }
        
        function setup2fa() {
        if(isset($_SESSION['profile_id'])){
            if(isset($_POST['action'])){
                $currentcode = $_POST['currentCode'];
                if(\App\core\TokenAuth::verify($_SESSION['token'], $currentcode)){
                    $user = new \App\models\User();
                    $user->user_id = $_SESSION['user_id']; 
                    $user->token = $_SESSION['token'];
                    $user->update2fa();
                    header('location:'.BASE.'/Settings/index?success=2-Factor Authentication Activated');
                } else
                    header('location:'.BASE.'/Login/setup2fa?error=Token Not Verified!');
            } else {
                $token = \App\core\TokenAuth::generateRandomClue();
                $_SESSION['token'] = $token;
                $url = \App\core\TokenAuth::getLocalCodeUrl($_SESSION['username'],'localhost', $token,'Code%20Name:%20Story');
                $this->view('Login/setup2fa', $url);
            }
        }else{
            header('location:'.BASE.'/home');
        }
        }

        #[\App\core\LoginFilter]
        function makeQRCode() {
            $data = $_GET['data'];
            \QRCode::png($data);
        }

        function login(){
            if(isset($_POST['login'])){
                $user = new \App\models\User();
                $user = $user->findByUsername($_POST['username']);    
                if($user != null && password_verify($_POST['password'], $user->password_hash)) {
                    // Checks if user has 2fa enabled
                    if ($user->token == null) {
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['user_id'] = $user->user_id; 
                        $profile = new \App\models\Profile();
                        $profile = $profile->findByUserID($_SESSION['user_id']);
                        $_SESSION['profile_id'] = $profile->profile_id;
                        $_SESSION['account_type'] = $profile->account_type;
                        header('location:'.BASE.'/home');
                    } else {
                        $_SESSION['tmp_username'] = $_POST['username'];
                        $_SESSION['tmp_user_id'] = $user->user_id;
                        $_SESSION['tmp_token'] = $user->token;
                        header('location:'.BASE.'/Login/validateLogin'); 
                    }
                }else
                    header('location:'.BASE.'/Login/login?error=Username/Password Mismatch');
            }else if(isset($_POST['register'])){
                $user = new \App\models\User();
                if ($user->findByUsername($_POST['username']) != null) {
                    header('location:'.BASE.'/Login/login?error=Username Already Taken');
                    exit(1);
                }
                $user->username = $_POST['username'];
                if($_POST['password'] == $_POST['confirm_password']) {
                    $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $user->insert();
                    $user = $user->findByUsername($user->username);
                    $_SESSION['username'] = $user->username;
                    $_SESSION['user_id'] = $user->user_id;
                    header('location:'.BASE.'/home');
                } else
                    header('location:'.BASE.'/Login/login?error=Passwords Dont Match');
            }else{
                $this->view('Login/login');
            }
        }

        #[\App\core\Validate2faFilter]
        function validateLogin() {
            if (isset($_POST['action'])) {
                $currentcode = $_POST['currentCode'];
                if(\App\core\TokenAuth::verify($_SESSION['tmp_token'], $currentcode)) {
                    $_SESSION['username'] = $_SESSION['tmp_username'];
                    $_SESSION['user_id'] = $_SESSION['tmp_user_id'];
                    $_SESSION['tmp_token'] = '';
                    $profile = new \App\models\Profile();
                    $profile = $profile->findByUserID($_SESSION['user_id']);
                    $_SESSION['profile_id'] = $profile->profile_id;
                    $_SESSION['account_type'] = $profile->account_type;
                    header('location:'.BASE.'/home');
                } else {
                    session_destroy();
                    header('location:'.BASE.'/Login/login?error=Invalid Token');
                }
            } else {
                $this->view('Login/validateLogin');
            }            
        }
        
        // Both create and view profile have login filters applied
        function home(){   
            $profile = new \App\models\Profile();
            if ($profile->findByUserID($_SESSION['user_id']) == null) {
                header('location:'.BASE.'/Profile/createProfile');
            } else
                header('location:'.BASE.'/Profile/viewProfile/'.$_SESSION['user_id']);
        }

        #[\App\core\LoginFilter]
        function editPassword($user_id) {
            if(isset($_POST['action'])){
                $user = new \App\models\User();
                $user = $user->findByUserID($user_id);
                if($_POST['password'] == $_POST['confirm_password']) {
                    $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $user->update();
                    header('location:'.BASE.'/Settings/index');
                } else
                    header('location:'.BASE.'/Login/editPassword?error=Passwords Dont Match');
            } else {
                $user = new \App\models\User();
                $user = $user->findByUserID($user_id);
                $this->view('Login/editPassword', $user);                 
            }
        }
    
        function logout(){
            session_destroy();
            header('location:'.BASE.'/Login/login');
        }        
    }
?>