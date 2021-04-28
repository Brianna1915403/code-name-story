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
            return $stmt->fetchAll();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO series(profile_id, name, description) 
                VALUES (:profile_id, :name, :description)");
            $stmt->execute(['profile_id'=>$this->profile_id, 'name'=>$this->name, 'description'=>$this->description]);
        }
    }
?>