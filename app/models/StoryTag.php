<?php
    namespace App\models;

    class StoryTag extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function insert() {
            $stmt = self::$connection->prepare("INSERT INTO story_tags(tag_id, story_id) VALUES (:tag_id, :story_id)");
            $stmt->execute(["tag_id"=>$this->tag_id, "story_id"=>$this->story_id]);
        }

        public function getAllFromStory($story_id) {
            $stmt = self::$connection->prepare("SELECT * FROM story_tags WHERE story_id = :story_id ORDER BY tag_id ASC");
            $stmt->execute(["story_id"=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\StoryTag");
            return $stmt->fetchAll();
        }

        public function getTagName() {
            $stmt = self::$connection->prepare("SELECT name FROM tag WHERE tag_id = :tag_id");
            $stmt->execute(["tag_id"=>$this->tag_id]);
            $stmt->setFetchMode(\PDO::FETCH_COLUMN, 0);
            return $stmt->fetch();
        }

        public function deleteAllTagsForStory($story_id){
            $stmt = self::$connection->prepare("DELETE FROM story_tags WHERE story_id = :story_id");
            $stmt->execute(["story_id"=>$this->story_id]);
        }        
    }
?>