<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class MessageController extends \App\core\Controller {

        function index() {
            
        }

        function viewOutbox() {
            $profile = new \App\models\Profile();
            $profile = $profile->findByUserID($_SESSION['user_id']);
            $message = new \App\models\Message();
            $messages = $message->getAllWhereSender($profile->profile_id);
            $this->view('Message/outbox', $messages);
        }

        function viewInbox() {
            $profile = new \App\models\Profile();
            $profile = $profile->findByUserID($_SESSION['user_id']);
            $message = new \App\models\Message();
            $messages = $message->getAllWhereReceiver($profile->profile_id);
            $this->view('Message/inbox', $messages);            
        }

        function viewMessage($message_id) {
            if (isset($_POST['action'])) {
                $message = new \App\models\Message();
                $message = $message->getMessage($message_id);
                $message->read_status = $_POST['read_status'];
                $message->updateReadStatus();
                $this->viewInbox();
            } else {
                $profile = new \App\models\Profile();
                $profile = $profile->findByUserID($_SESSION['user_id']);
                $message = new \App\models\Message();
                $message = $message->getMessage($message_id);
                $message->read_status = "read";
                $message->updateReadStatus();
                $this->view('Message/message', $message);
            }
        }

        function delete($message_id) {
            $message = new \App\models\Message();
            $message = $message->getMessage($message_id);
            $message->delete();
            $this->viewInbox();
        }
    }

?>