<?php
    namespace App\controllers;

    class ChapterController extends \App\core\Controller {

        function home() {
            
        }

        function createChapter($story_id){
            if(isset($_POST['action'])) {
                $chapter = new \App\models\Chapter();
                $chapter->story_id = $story_id;
                $chapter->chapter_title = $_POST['chapter_title'];
                $targetFolder = 'stories/';
                $targetFile = uniqid().'.txt';
                file_put_contents($targetFolder.$targetFile, $_POST['chapter_text']);
                $chapter->chapter_text = $targetFile;
                $chapter->insert();
                header('location:'.BASE.'/Story/viewStory/'.$story_id);
            } else {
                $chapter = new \App\models\Chapter();
                $chapters = $chapter->findByStoryID($story_id);
                $this->view('Chapter/createChapter', count($chapters));
            }
        }

        function viewChapter($chapter_id){
            $chapter = new \App\models\Chapter();
            $chapter = $chapter->findByID($chapter_id);
            $comments = new \App\models\Comment();
            $comments = $comments->getCommentsForChapter($chapter_id);
            $this->view('Chapter/viewChapter', ['chapter'=>$chapter, 'comment'=>$comments]);

            if(isset($_POST["comment"])){
                $text = $_POST['text'];
    
                if($text == null){
                    
                } else {
                    $comment = new \App\models\Comment();
                    $comment->chapter_id = $chapter_id;
                    $comment->profile_id = $_SESSION['profile_id'];
                    $comment->text = $text;
                    $comment->insert();
                }
            }
        }

        function editChapter($chapter_id) {
            if(isset($_POST['action'])) {
                $chapter = new \App\models\Chapter();
                $chapter = $chapter->findByID($chapter_id);
                $chapter->chapter_title = $_POST['chapter_title'];
                $targetFolder = 'stories/';
                $targetFile = $chapter->chapter_text;
                file_put_contents($targetFolder.$targetFile, $_POST['chapter_text']);
                $chapter->update();
                header('location:'.BASE.'/Story/viewStory/'.$chapter->story_id);
            } else {
                $chapter = new \App\models\Chapter();
                $chapter = $chapter->findByID($chapter_id);
                $this->view('Chapter/editChapter', $chapter);
            }
        }

        function deleteChapter($chapter_id) {
            $chapter = new \App\models\Chapter();
            $chapter = $chapter->findByID($chapter_id);                
            $path = getcwd().DIRECTORY_SEPARATOR.'stories'.DIRECTORY_SEPARATOR.$chapter->chapter_text;
            unlink($path);
            $chapter->delete();
            header('location:'.BASE.'/Story/viewStory/'.$chapter->story_id);
        }

        function like($chapter_id){
            $liked_chapter = new \App\models\LikedChapter();
            $liked_chapter->profile_id = $_SESSION['profile_id'];
            $liked_chapter->chapter_id = $chapter_id;
            $liked_chapter->insert();
            header('location:'.BASE.'/Chapter/viewChapter/'.$chapter_id);
        }

        function unlike($chapter_id){
            $liked_chapter = new \App\models\LikedChapter();
            $liked_chapter->profile_id = $_SESSION['profile_id'];
            $liked_chapter->chapter_id = $chapter_id;
            $liked_chapter->delete();
            header('location:'.BASE.'/Chapter/viewChapter/'.$chapter_id);
        }
    } 
?>