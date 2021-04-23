<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class StoryController extends \App\core\Controller {

        function index() {
            
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


    } 
?>