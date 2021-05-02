<?php
    namespace App\models;

    class Story extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }
        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO story(profile_id, title, description, series_id, author) VALUES (:profile_id, :title, :description, :series_id, :author)");
            $stmt->execute(["profile_id"=>$this->profile_id, "title"=>$this->title, "description"=>$this->description,"series_id"=>$this->series_id, "author"=>$this->author]);
        }

        public function findByID($story_id){
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE story_id = :story_id");
            $stmt->execute(['story_id'=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetch();
        }

        public function findByProfile($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function addTagsToStory($story_id, $tags){
            $tag = new \App\models\Tag();
            $tag->deleteAllTagsForStory($story_id);
            for($i = 0; $i < count($tags); $i++){
                $tag = $tag->findTagByName($tags[0]);
                $stmt = self::$connection->prepare("INSERT INTO story_tags(tag_id, story_id) VALUES (:tag_id, :story_id)");
                $stmt->execute(['tag_id'=>$tag->tag_id, 'story_id'=>$story_id]);
            }
        }

        public function findBySeries($series_id){
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE series_id = :series_id");
            $stmt->execute(['series_id'=>$series_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function findAllStoriesByTag($tag_id){
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE story_id = (SELECT story_id FROM story_tags WHERE tag_id = :tag_id)");
            $stmt->execute(['tag_id'=>$tag_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }
    }
?>