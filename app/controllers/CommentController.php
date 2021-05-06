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

        public function editComment($comment_id){            
            $comment = new \App\models\Comment();
            $comment = $comment->findCommentByID($comment_id);
            if(isset($_POST['update'])){
                $comment->text = $_POST['text'];
                $comment->update();
                header('location:'.BASE.'/Comment/viewComment/'.$comment_id);
            } else {
                $this->view('Comment/editComment', $comment);
            }
        }

        public function deleteComment($comment_id){            
            $comment = new \App\models\Comment();
            $comment = $comment->findCommentByID($comment_id);
            $comment->delete();
            header('location:'.BASE.'/Chapter/viewChapter/'.$comment->chapter_id);
        }
    }

?>