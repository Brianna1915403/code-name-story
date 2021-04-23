<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class StoryController extends \App\core\Controller {

        function index() {
            
        }

        function createStory(){
            if(isset($_POST['action'])){
                $story = new \App\models\Story();
                $story->profile_id = $_SESSION['profile_id'];
                $story->title = $_POST['title'];
                $story->tags = $_POST['tags'];
                $story->favorites = $_POST['favorites'];
                $story->series_id = $_POST['series_id'];
                $story->author = $_POST['author'];
                $story->insert();
                header('location:'.BASE.'/Story/viewAllStoriesByProfile/'.$_SESSION['profile_id']);
             } else {
                 $this->view('Story/createStory');
             }
        }

        function viewStory($story_id){
            $story = new \App\models\Story();
            $story = $story->findByID($story_id);
            $this->view('Story/viewStoryInfo', $story);
        }

        function viewAllStoriesByProfile($profile_id){
            $story = new \App\models\Story();
            $story = $story->findByProfile($profile_id);
            $this->view('Story/viewAllStoriesForUser', $story);
        }

        function viewAllMyStories(){
            $story = new \App\models\Story();
            $story = $story->findByProfile($_SESSION['profile_id']);
            $this->view('Story/viewAllMyStories', $story);
        }

        function viewAllStoriesBySeries($series_id){
            $story = new \App\models\Story();
            $story = $story->findBySeries($series_id);
            $this->view('Story/viewAllMyStories', $story);
        }

        function addTags($story_id){
            if(isset($_POST['action']) && is_array($_POST['tags'])){
            $story = new \App\models\Story();
            $story = $story->findByID($story_id);
            
            $tags = array();
            $tags = implode(', ', $_POST['fruit']);
            $story->addTagsToStory($story_id, $tags);
            $this->view('Story/viewStoryInfo', $story);
            }else{
                $story = new \App\models\Story();
                $story = $story->findByID($story_id);
                $this->view('Story/AddTagsToStory', $story);
            }
        }


    } 
?>