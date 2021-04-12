<?php
    namespace App\core;
    
    #[\Attribute]
    class LoginFilter {
        public function execute() {
            if (!isset($_SESSION['user_id'])){
                header('location:'.BASE.'/Login/login');
            }
        }
    }
?>
