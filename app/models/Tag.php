<?php
    namespace App\models;

    class Story extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findTagByName($tag_name){
            $stmt = self::$connection->prepare("SELECT * FROM tag WHERE name = :name");
            $stmt->execute(['name'=>$tag_name]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Tag");
            return $stmt->fetch();
        }
    }
?>