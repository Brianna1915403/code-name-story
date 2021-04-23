<?php
    namespace App\core;
    
    #[\Attribute]
    class ProfileFilter {
        public function execute() {
            if (isset($_SESSION['user_id'])) {
                if (!isset($_SESSION['profile_id'])) {
                    $profile = new \App\models\Profile();
                    $profile = $profile->findByUserID($_SESSION['user_id']); 
                    if ($profile == null) {
                        header('location:'.BASE.'/Profile/createProfile');
                    } else {
                        $_SESSION['profile_id'] = $profile->profile_id;
                    }
                }
            }
        }
    }
?>
