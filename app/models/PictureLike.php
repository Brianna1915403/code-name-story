<?php
    namespace App\models;

    class PictureLike extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function getAllByPictureID($picture_id) {
            $stmt = self::$connection->prepare("SELECT * FROM picture_like WHERE picture_id = :picture_id");
            $stmt->execute(['picture_id'=>$picture_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\PictureLike");
            return $stmt->fetchAll();
        }

        public function getAllByProfileID($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM picture_like WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\PictureLike");
            return $stmt->fetchAll();
        }

        public function findPictureLike($profile_id, $picture_id) {
            $stmt = self::$connection->prepare("SELECT * FROM picture_like WHERE profile_id = :profile_id AND picture_id = :picture_id ");
            $stmt->execute(['profile_id'=>$profile_id, 'picture_id'=>$picture_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\PictureLike");
            return $stmt->fetch();
        }

    
        public function insert() {
            $stmt = self::$connection->prepare("INSERT INTO picture_like(picture_id, profile_id) VALUES (:picture_id, :profile_id)");
            $stmt->execute(['picture_id'=>$this->picture_id, 'profile_id'=>$this->profile_id]);
        }

        public function delete(){
            $stmt = self::$connection->prepare("DELETE FROM picture_like WHERE picture_id = :picture_id AND profile_id = :profile_id");
            $stmt->execute(['picture_id'=>$this->picture_id, 'profile_id'=>$this->profile_id]);
        }

        public function updateSeen(){
            $stmt = self::$connection->prepare("UPDATE picture_like SET read_status = 'seen' WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$this->profile_id]);
        }
    }
?>