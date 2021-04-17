<?php
    namespace App\models;

    class Story extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }
        // public function insert(){
        //     $stmt = self::$connection->prepare("INSERT INTO story(profile_id, title, tags, favorites, series_id, author) VALUES (:profile_id, :title, :tags, :favorites, :series_id, :author)");
        //     $stmt->execute(["profile_id"=>$this->profile_id, "title"=>$this->title, "tags"=>$this->tags, "favorites"=>$this->favorites, "series_id"=>$this->series_id, "author"=>$this->author]);
        // }
    }
?>