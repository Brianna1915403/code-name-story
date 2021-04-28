<?php
    namespace App\models;

    class Chapter extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }
        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO chapter(story_id, chapter_text, date_created, likes, chapter_picture_id) VALUES (:story_id, :chapter_text, :date_created, :likes, ;chapter_picture_id)");
            $stmt->execute(["story_id"=>$this->story_id, "chapter_text"=>$this->chapter_text, "date_created"=>$this->date_created, "likes"=>$this->likes, "chapter_picture_id"=>$this->chapter_picture_id]);
        }

        public function findByID($chapter_id){
            $stmt = self::$connection->prepare("SELECT * FROM chapter WHERE chapter_id = :chapter_id");
            $stmt->execute(['chapter_id'=>$chapter_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Chapter");
            return $stmt->fetch();
        }

        public function findByStoryID($story_id){
            $stmt = self::$connection->prepare("SELECT * FROM chapter WHERE story_id = :story_id");
            $stmt->execute(['story_id'=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Chapter");
            return $stmt->fetchAll();
        }
    }
?>