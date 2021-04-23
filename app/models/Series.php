<?php
    namespace App\models;

    class Series extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function findByID($series_id){
            $stmt = self::$connection->prepare("SELECT * FROM series WHERE series_id = :series_id");
            $stmt->execute(['series_id'=>$series_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Series");
            return $stmt->fetch();
        }

        public function findByProfile($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM series WHERE profile_id = :profile_id");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Series");
            return $stmt->fetch();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO series(series_id, name, description) 
                VALUES (:series_id, :name, :description)");
            $stmt->execute(['series_id'=>$this->series_id, 'name'=>$this->name, 'description'=>$this->description]);
        }
    }
?>