<?php
    namespace App\controllers;

    class ChapterController extends \App\core\Controller {

        function index() {
            
        }

        function createChapter($story_id){
            $chapter = new \App\models\Chapter();
            $chapter = $chapter->findByID($chapter_id);
            if($chapter->profile_id == $_SESSION['profile_id']){
                if(isset($_POST['action'])){
                    $chapter = new \App\models\Chapter();
                    $chapter->story_id = $story_id;
                    $chapter->chapter_title = $_POST['chapter_title'];
                    $chapter->chapter_text = $_POST['chapter_text'];
                    $chapter->chapter_picture_id = $_POST['chapter_picture_id'];
                    $chapter->insert();
                    header('location:'.BASE.'/Chapter/viewAllChaptersByStory/'.$story_id);
                } else {
                    $this->view('Chapter/createChapter');
                }
            }else{
                $this->view('Home');
            }
        }

        function viewChapter($chapter_id){
            $chapter = new \App\models\Chapter();
            $chapter = $chapter->findByID($chapter_id);
            $comments = new \App\models\Comment();
            $comments = $comments->getCommentsForChapter($chapter_id);
            $this->view('Chapter/viewChapter', ['chapter'=>$chapter, 'comment'=>$comments]);
        }
    } 
?>