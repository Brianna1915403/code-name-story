<?php
    namespace App\models;

    class User extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findByUsername($username){
            $stmt = self::$connection->prepare("SELECT * FROM user WHERE username = :username");
            $stmt->execute(['username'=>$username]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
            return $stmt->fetch();
        }
    
        public function findByUserID($user_id){
            $stmt = self::$connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
            $stmt->execute(['user_id'=>$user_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
            return $stmt->fetch();
        }

        public function getAll() {
            $stmt = self::$connection->prepare("SELECT * FROM user");
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "\\App\\models\\User");
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)");
            $stmt->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);
        }

        public function update2fa() {
            $stmt = self::$connection->prepare("UPDATE user SET token = :token WHERE user_id = :user_id");
            $stmt->execute(['token'=>$this->token, 'user_id'=>$this->user_id]);
        }        

        public function update(){
            $stmt = self::$connection->prepare("UPDATE user SET password_hash = :password_hash WHERE user_id = :user_id");
            $stmt->execute(['user_id'=>$this->user_id, 'password_hash'=>$this->password_hash]);
        }
    }
?>