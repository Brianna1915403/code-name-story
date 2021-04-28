<?php
    namespace App\models;

    class Tag extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findTagByName($tag_name){
            $stmt = self::$connection->prepare("SELECT * FROM tag WHERE name = :name");
            $stmt->execute(['name'=>$tag_name]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Tag");
            return $stmt->fetch();
        }

        public function deleteAllTagsForStory($story_id){
            $stmt = self::$connection->prepare("DELETE FROM story_tags WHERE story_id = :story_id");
            $stmt->execute(["story_id"=>$this->story_id]);
        }

        public function getAll() {
            $stmt = self::$connection->prepare("SELECT * FROM tag ORDER BY name ASC");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Tag");
            return $stmt->fetchAll();
        }
    }
?>