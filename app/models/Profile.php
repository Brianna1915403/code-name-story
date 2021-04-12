<?php
    namespace App\models;

    class Profile extends \App\core\Model {

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
            $stmt = self::$connection->prepare("INSERT INTO profile(user_id, first_name, middle_name, last_name) VALUES (:user_id, :first_name, :middle_name, :last_name)");
            $stmt->execute(['user_id'=>$this->user_id, 'first_name'=>$this->first_name, 'middle_name'=>$this->middle_name, 'last_name'=>$this->last_name]);
        }

        public function update(){
            $stmt = self::$connection->prepare("UPDATE profile SET first_name = :first_name, middle_name = :middle_name, last_name = :last_name WHERE user_id = :user_id");
            $stmt->execute(['user_id'=>$this->user_id, 'first_name'=>$this->first_name, 'middle_name'=>$this->middle_name, 'last_name'=>$this->last_name]);
        }
    }
?>