<?php
    namespace App\models;

    class FavoriteStory extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findByProfile($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM favorite_story WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\FavoriteStory");
            return $stmt->fetchAll();
        }

        public function getFavoritesStory($story_id){
            $stmt = self::$connection->prepare("SELECT * FROM favorite_story WHERE story_id = :story_id");
            $stmt->execute(['story_id'=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\FavoriteStory");
            return $stmt->fetchAll();
        }

        public function find($story_id, $profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM favorite_story WHERE story_id = :story_id AND profile_id = :profile_id");
            $stmt->execute(['story_id'=>$story_id,'profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\FavoriteStory");
            return $stmt->fetch();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO favorite_story(profile_id, story_id) VALUES (:profile_id, :story_id)");
            $stmt->execute(["profile_id"=>$this->profile_id, "story_id"=>$this->story_id]);
        }

        public function delete() {
            $stmt = self::$connection->prepare("DELETE FROM favorite_story VALUES profile_id = :profile_id AND story_id = :story_id");
            $stmt->execute(["profile_id"=>$this->profile_id, "story_id"=>$this->story_id]);
        }
    }
?>