<?php
    namespace App\models;

    class LikedChapter extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findByProfile($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM liked_chapter WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\LikedChapter");
            return $stmt->fetchAll();
        }

        public function getLikesChapter($chapter_id){
            $stmt = self::$connection->prepare("SELECT * FROM liked_chapter WHERE chapter_id = :chapter_id");
            $stmt->execute(['chapter_id'=>$chapter_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\LikedChapter");
            return $stmt->fetchAll();
        }

        public function find($chapter_id, $profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM liked_chapter WHERE chapter_id = :chapter_id AND profile_id = :profile_id");
            $stmt->execute(['chapter_id'=>$chapter_id,'profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\LikedChapter");
            return $stmt->fetch();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO liked_chapter(profile_id, chapter_id) VALUES (:profile_id, :chapter_id)");
            $stmt->execute(["profile_id"=>$this->profile_id, "chapter_id"=>$this->chapter_id]);
        }

        public function delete() {
            $stmt = self::$connection->prepare("DELETE FROM liked_chapter WHERE profile_id = :profile_id AND chapter_id = :chapter_id");
            $stmt->execute(['profile_id'=>$this->profile_id, 'chapter_id'=>$this->chapter_id]);
        }
    }
?>