<?php
    namespace App\models;

    class Message extends \App\core\Model {

        public function __construct() { 
            parent::__construct();
        }

        public function getAllWhereSender($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM message WHERE sender = :profile_id ORDER BY read_status DESC, time_stamp");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Message");
            return $stmt->fetchAll();
        }

        public function getAllWhereReceiver($profile_id){
            $stmt = self::$connection->prepare("SELECT * FROM message WHERE receiver = :profile_id ORDER BY read_status DESC, time_stamp");
            $stmt->execute(['profile_id'=>$profile_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Message");
            return $stmt->fetchAll();
        }

        public function getMessage($message_id){
            $stmt = self::$connection->prepare("SELECT * FROM message WHERE message_id = :message_id");
            $stmt->execute(['message_id'=>$message_id]);
            $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Message");
            return $stmt->fetch();
        }
    
        public function insert() {
            $stmt = self::$connection->prepare("INSERT INTO message(sender, receiver, message, privacy_status) VALUES (:sender, :receiver, :message, :privacy_status)");
            $stmt->execute(['sender'=>$this->sender, 'receiver'=>$this->receiver, 'message'=>$this->message, 'privacy_status'=>$this->privacy_status]);
        }

        public function updateReadStatus() {
            // if status = 0 -> unread, if 1 -> read, if 2 -> reread
            $stmt = self::$connection->prepare("UPDATE message SET read_status = :read_status WHERE message_id = :message_id");
            $stmt->execute(['message_id'=>$this->message_id,'read_status'=>$this->read_status]);
        }

        public function delete(){
            $stmt = self::$connection->prepare("DELETE FROM message WHERE message_id = :message_id");
            $stmt->execute(['message_id'=>$this->message_id]);
        }
    }
?>