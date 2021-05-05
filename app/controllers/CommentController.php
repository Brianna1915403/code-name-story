<?php
    namespace App\controllers;

    class CommentController extends \App\core\Controller {

        function index() {
            
        }

        public function viewComment($comment_id){
            $original_comment = new \App\models\Comment();
            $original_comment = $original_comment->findCommentByID($comment_id);
            $reply_object = new \App\models\Reply();
            $reply_comments = new \App\models\Comment();
            $reply_comments = $reply_object->getRepliesForComment($comment_id);
            $this->view('Comment/viewComment', ['original_comment'=>$original_comment, 'reply_comments'=>$reply_comments]);

            if(isset($_POST["reply"])){
                $text = $_POST['text'];
    
                if($text == null){
                    
                } else {
                    $comment = new \App\models\Comment();
                    $comment->chapter_id = $original_comment->chapter_id;
                    $comment->profile_id = $_SESSION['profile_id'];
                    $comment->text = $text;
                    $comment->insertReply($comment_id);
                }
            }
        }
    }

?>