<?php
    namespace App\core;
    
    #[\Attribute]
    class Validate2faFilter {
        public function execute() {
            if (!isset($_SESSION['tmp_user_id'])){
                header('location:'.BASE.'/Login/login');
            }
        }
    }
?>
