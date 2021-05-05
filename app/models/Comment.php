<?php
    namespace App\models;

    class Comment extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function insert(){
            $stmt = self::$connection->prepare("INSERT INTO comment(chapter_id, profile_id, text, date_commented) VALUES (:chapter_id, :profile_id, :text, :date_commented)");
            $stmt->execute(["chapter_id"=>$this->chapter_id, "text"=>$this->text, "date_commented"=>$this->date_commented, "profile_id"=>$this->profile_id]);
        }

        public function insertReply($original_comment_id){
            $this->insert();
            $comment = new \App\models\Comment();
            $comment = $this->getCommentsIDForProfile($this->profile_id);
            $reply = new \App\models\Reply();
            $reply->original_comment_id = $original_comment_id;
            $reply->reply_id = $comment[0]->comment_id;
            $reply->insert();
        }

        public function findCommentByID($comment_id){
            $stmt = self::$connection->prepare("SELECT * FROM comment WHERE comment_id = :comment_id");
            $stmt->execute(['comment_id'=>$comment_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Comment");
            return $stmt->fetch();
        }
        
        public function getCommentsForChapter($chapter_id){
            $stmt = self::$connection->prepare("SELECT * FROM comment WHERE chapter_id = :chapter_id AND comment_id NOT IN (SELECT reply_id FROM reply) ORDER BY date_commented ASC");
            $stmt->execute(['chapter_id'=>$chapter_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Comment");
            return $stmt->fetchAll();
        }

        public function getCommentsIDForProfile($profile_id){
            $stmt = self::$connection->prepare("SELECT comment_id FROM comment WHERE profile_id = :profile_id ORDER BY date_commented DESC");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Comment");
            return $stmt->fetchAll();
        }
    }
?>