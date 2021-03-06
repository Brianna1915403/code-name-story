<?php
    namespace App\models;

    class Reply extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO reply(reply_id, original_comment_id) VALUES (:reply_id, :original_comment_id)");
            $stmt->execute(["reply_id"=>$this->reply_id, "original_comment_id"=>$this->original_comment_id]);
        }

        public function getRepliesForComment($comment_id){
            $stmt = self::$connection->prepare("SELECT * FROM comment WHERE comment_id IN 
            (SELECT reply_id FROM reply WHERE original_comment_id = :original_comment_id) ORDER BY date_commented DESC");
            $stmt->execute(['original_comment_id'=>$comment_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Comment");
            return $stmt->fetchAll();
        }

        public function delete() {
            $stmt = self::$connection->prepare("DELETE FROM reply WHERE reply_id = :reply_id");
            $stmt->execute(['reply_id'=>$this->reply_id]);
        }
    }
?>