<?php
    namespace App\models;

    class Picture extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findByPictureID($picture_id) {
            $stmt = self::$connection->prepare("SELECT * FROM picture WHERE picture_id = :picture_id ORDER BY picture_id DESC");
            $stmt->execute(['picture_id'=>$picture_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Picture");
            return $stmt->fetch();
        }

        public function getAllByProfileID($profile_id) {
            $stmt = self::$connection->prepare("SELECT * FROM picture WHERE profile_id = :profile_id ORDER BY picture_id DESC");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Picture");
            return $stmt->fetchAll();
        }
    
        public function insert() {
            $stmt = self::$connection->prepare("INSERT INTO picture(filename, profile_id, alt, artist) VALUES (:filename, :profile_id, :alt, :artist)");
            $stmt->execute(['profile_id'=>$this->profile_id, 'filename'=>$this->filename, 'alt'=>$this->alt, 'artist'=>$this->artist]);
        }

        public function delete(){
            $stmt = self::$connection->prepare("DELETE FROM picture WHERE picture_id = :picture_id");
            $stmt->execute(['picture_id'=>$this->picture_id]);
        }

        public function update(){
            $stmt = self::$connection->prepare("UPDATE picture SET alt = :alt, artist = :artist WHERE picture_id = :picture_id");
            $stmt->execute(['picture_id'=>$this->picture_id,'alt'=>$this->alt, 'artist'=>$this->artist]);
        }
    }
?>

