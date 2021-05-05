<?php
    namespace App\models;

    class Story extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }
        
        public function insert() {
            $stmt = self::$connection->prepare("INSERT INTO story(profile_id, title, description, author) VALUES (:profile_id, :title, :description, :author)");
            $stmt->execute(["profile_id"=>$this->profile_id, "title"=>$this->title, "description"=>$this->description, "author"=>$this->author]);
        }

        public function getAll() {
            $stmt = self::$connection->prepare("SELECT * FROM story");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        // TODO: Order popular
        public function getAllOrdered($order_by) {
            switch($order_by) {
                case 'popular': $stmt = self::$connection->prepare("SELECT * FROM story");break;
                case 'recent': $stmt = self::$connection->prepare("SELECT * FROM story ORDER BY date_created DESC"); break;
                case 'asc': $stmt = self::$connection->prepare("SELECT * FROM story ORDER BY title ASC"); break;
                case 'desc': $stmt = self::$connection->prepare("SELECT * FROM story ORDER BY title DESC"); break;
                default: $stmt = self::$connection->prepare("SELECT * FROM story"); break;
            }            
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function findByID($story_id) {
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE story_id = :story_id");
            $stmt->execute(['story_id'=>$story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetch();
        }

        public function findByProfile($profile_id) {
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function findBySearch($search) {
            $search = '%'.$search.'%';
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE title LIKE :search OR author LIKE :search");
            $stmt->execute(['search'=>$search]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function addTagsToStory($story_id, $tags) {
            $tag = new \App\models\StoryTag();
            $tag->deleteAllTagsForStory($story_id);
            foreach($tags as $tag) {
                $stmt = self::$connection->prepare("INSERT INTO story_tags(tag_id, story_id) VALUES (:tag_id, :story_id)");
                $stmt->execute(['tag_id'=>$tag, 'story_id'=>$story_id]);
            }
        }

        public function findBySeries($series_id) {
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE series_id = :series_id");
            $stmt->execute(['series_id'=>$series_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function findAllStoriesByTag($tag_id) {
            $stmt = self::$connection->prepare("SELECT * FROM story WHERE story_id IN (SELECT story_id FROM story_tags WHERE tag_id = :tag_id)");
            $stmt->execute(['tag_id'=>$tag_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        // TODO: Order popular
        public function findAllStoriesByTagsOrdered($tag_ids, $order_by) {
            $placeholder = rtrim(str_repeat('?, ', count($tag_ids)), ', ');
            $query = "";
            switch($order_by) {
                case 'popular': $query = "SELECT * FROM story WHERE story_id IN (SELECT story_id FROM story_tags WHERE tag_id IN ($placeholder))"; break;
                case 'recent': $query = "SELECT * FROM story WHERE story_id IN (SELECT story_id FROM story_tags WHERE tag_id IN ($placeholder)) ORDER BY date_created DESC"; break;
                case 'asc': $query = "SELECT * FROM story WHERE story_id IN (SELECT story_id FROM story_tags WHERE tag_id IN ($placeholder)) ORDER BY title ASC"; break;
                case 'desc': $query = "SELECT * FROM story WHERE story_id IN (SELECT story_id FROM story_tags WHERE tag_id IN ($placeholder)) ORDER BY title DESC"; break;
                default: $query = "SELECT * FROM story WHERE story_id IN (SELECT story_id FROM story_tags WHERE tag_id IN ($placeholder))"; break;
            }    
            $stmt = self::$connection->prepare($query);        
            $stmt->execute($tag_ids);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function update() {
            $stmt = self::$connection->prepare("UPDATE story SET title = :title, author = :author, description = :description WHERE story_id = :story_id");
            $stmt->execute(['title'=>$this->title, 'author'=>$this->author, 'description'=>$this->description, 'story_id'=>$this->story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function updateCoverPicture() {
            $stmt = self::$connection->prepare("UPDATE story SET story_picture_id = :story_picture_id WHERE story_id = :story_id");
            $stmt->execute(['story_picture_id'=>$this->story_picture_id, 'story_id'=>$this->story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }

        public function unsetCoverPicture() {
            $stmt = self::$connection->prepare("UPDATE story SET story_picture_id = NULL WHERE story_id = :story_id");
            $stmt->execute(['story_id'=>$this->story_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Story");
            return $stmt->fetchAll();
        }
    }
?>