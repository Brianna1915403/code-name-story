<?php
    namespace App\models;

    class Chapter extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }
        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO chapter(story_id, chapter_title, chapter_text) VALUES (:story_id, :chapter_title, :chapter_text)");
            $stmt->execute(["story_id"=>$this->story_id, "chapter_title"=>$this->chapter_title,"chapter_text"=>$this->chapter_text]);
        }

        public function findByID($chapter_id){
            $stmt = self::$connection->prepare("SELECT * FROM chapter WHERE chapter_id = :chapter_id");
            $stmt->execute(['chapter_id'=>$chapter_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Chapter");
            return $stmt->fetch();
        }

        public function findByStoryID($story_id){
            $stmt = self::$connection->prepare("SELECT * FROM chapter WHERE story_id = :story_id ORDER BY date_created DESC");
            $stmt->execute(['story_id'=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Chapter");
            return $stmt->fetchAll();
        }

        public function selectEssentialInfoByStoryID($story_id){
            $stmt = self::$connection->prepare("SELECT chapter_id, story_id, chapter_title, date_created FROM chapter WHERE story_id = :story_id ORDER BY date_created DESC");
            $stmt->execute(['story_id'=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Chapter");
            return $stmt->fetchAll();
        }

        public function update() {
            $stmt = self::$connection->prepare("UPDATE chapter SET chapter_title = :chapter_title WHERE chapter_id = :chapter_id");
            $stmt->execute(["chapter_id"=>$this->chapter_id, "chapter_title"=>$this->chapter_title]);
        }

        public function delete() {
            $stmt = self::$connection->prepare("DELETE FROM chapter WHERE chapter_id = :chapter_id");
            $stmt->execute(['chapter_id'=>$this->chapter_id]);
        }
    }
?>