<?php
    namespace App\models;

    class Profile extends \App\core\Model {
        public $default_picture_id = 0;

        public function __construct() { 
            parent::__construct();
        }

        public function findByID($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM profile WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
            return $stmt->fetch();
        }
    
        public function findByUserID($user_id){
            $stmt = self::$connection->prepare("SELECT * FROM profile WHERE user_id = :user_id");
            $stmt->execute(['user_id'=>$user_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
            return $stmt->fetch();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO profile(user_id, account_type, description) 
                VALUES (:user_id, :account_type, :description)");
            $stmt->execute(['user_id'=>$this->user_id, 'account_type'=>$this->account_type, 'description'=>$this->description]);
        }

        public function updateProfilePicture($picture_id){
            $stmt = self::$connection->prepare("UPDATE profile SET profile_picture_id = :profile_picture_id WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$this->profile_id, 'profile_picture_id'=>$picture_id]);
        }

        public function updateTheme(){
            $stmt = self::$connection->prepare("UPDATE profile SET theme = :theme WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$this->profile_id, 'theme'=>$this->theme]);
        }

        public function update(){
            $stmt = self::$connection->prepare("UPDATE profile SET account_type = :account_type, description = :description WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$this->profile_id, 'account_type'=>$this->account_type, 'description'=>$this->description]);
        }
    }
?>