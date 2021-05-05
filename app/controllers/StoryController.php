<?php
    namespace App\controllers;

    class StoryController extends \App\core\Controller {

        function home() { }

        function createStory(){
            if(isset($_POST['action'])){
                $story = new \App\models\Story();
                $story->profile_id = $_SESSION['profile_id'];
                $story->title = $_POST['title'];
                $story->description = $_POST['description'];
                $story->author = $_POST['author'];
                $story->insert();
                $stories = $story->findByProfile($_SESSION['profile_id']);
                $story = $stories[count($stories) - 1];
                if (isset($_POST['tag'])) {
                    foreach ($_POST['tag'] as $tag) {                    
                        $story_tag = new \App\models\StoryTag();
                        $story_tag->tag_id = $tag;
                        $story_tag->story_id = $story->story_id;
                        $story_tag->insert();
                    }
                }
                $picture_controller = new \App\controllers\PictureController();
                if ($picture_controller->upload($_FILES['upload'], "$story->title cover", $_SESSION['username'])) {
                    $picture = new \App\models\Picture();
                    $pictures = $picture->getAllByProfileID($_SESSION['profile_id']);
                    $story->story_picture_id = $pictures[0]->picture_id;
                    $story->updateCoverPicture();                    
                } else if ($_FILES['upload']['tmp_name'] == "") {
                    // Set default picture?
                } else {
                    header('location:'.BASE.'/Story/createStory?error=Picture Invalid');
                }
                $this->view('Story/storyList', $stories);
             } else {
                $this->view('Story/createStory');
             }
        }

        function viewStory($story_id){
            $story = new \App\models\Story();
            $story = $story->findByID($story_id);
            $chapter = new \App\models\Chapter();
            $chapter = $chapter->selectEssentialInfoByStoryID($story_id);
            $this->view('Story/viewStory', ['story'=>$story, 'chapter'=>$chapter]);
        }

        function viewRandomStory(){
            $story = new \App\models\Story();
            $story = $story->getAll();
            $story = $story[rand(0, (count($story) - 1))];
            header('location:'.BASE.'/Story/viewStory/'.$story->story_id);
        }

        function viewAllStoriesByProfile($profile_id){
            $story = new \App\models\Story();
            $story = $story->findByProfile($profile_id);
            $this->view('Story/viewAllStoriesForUser', $story);
        }

        #[\App\core\LoginFilter]        
        #[\App\core\ProfileFilter]        
        function storyList(){
            $story = new \App\models\Story();
            $stories = $story->findByProfile($_SESSION['profile_id']);
            $this->view('Story/storyList', $stories);
        }

        function viewAllStoriesBySeries($series_id){
            $story = new \App\models\Story();
            $story = $story->findBySeries($series_id);
            $this->view('Story/viewStoriesBySeries', $story);
        }

        function viewAllStoriesForTag($tag_id){
            $story = new \App\models\Story();
            $story = $story->findAllStoriesByTag($tag_id);
            $this->view('Story/viewAllStoriesForTag', $story);
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