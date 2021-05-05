<?php
    namespace App\controllers;

    class StoryController extends \App\core\Controller {

        function home() { }

        function createStory(){
            if(isset($_POST['action'])){
                $story = new \App\models\Story();                
                $picture_controller = new \App\controllers\PictureController();
                if ($picture_controller->upload($_FILES['upload'], "$story->title cover", $_SESSION['username'])) {
                    $picture = new \App\models\Picture();
                    $pictures = $picture->getAllByProfileID($_SESSION['profile_id']);
                    $story->profile_id = $_SESSION['profile_id'];
                    $story->title = $_POST['title'];
                    $story->description = $_POST['description'];
                    $story->author = $_POST['author'];
                    $story->insert();
                    $stories = $story->findByProfile($_SESSION['profile_id']);
                    $story = $stories[count($stories) - 1];
                    if (isset($_POST['tag'])) {                   
                        $story->addTagsToStory($story->story_id, $_POST['tag']);
                    }
                    $story->story_picture_id = $pictures[0]->picture_id;
                    $story->updateCoverPicture();                    
                } else {
                    header('location:'.BASE.'/Story/createStory?error=Invalid Picture, allowed extensions are: .png, .jpg/.jpeg and .gif.');
                }
                $this->view('Story/storyList', $stories);
             } else {
                $this->view('Story/createStory');
             }
        }

        function editStory($story_id) {
            if(isset($_POST['action'])) {
                $story = new \App\models\Story();
                $story = $story->findByID($story_id);
                $story->title = $_POST['title'];
                $story->author = $_POST['author'];
                $story->description = $_POST['description'];
                $story->update();
                if (isset($_POST['tag'])) {
                    $story->addTagsToStory($story_id, $_POST['tag']);
                }
                if ($_FILES['upload']['tmp_name'] != "") {
                    if ($picture_controller->upload($_FILES['upload'], $_POST['title']." cover", $_POST['author'])) {
                        $picture = new \App\models\Picture();
                        if ($story->story_picture_id != null ) {
                            $picture_id = $story->story_picture_id;
                            $story->unsetCoverPicture();
                            $picture_controller->delete($picture_id);
                        }
                        $pictures = $picture->getAllByProfileID($_SESSION['profile_id']);
                        $story->story_picture_id = $pictures[0]->picture_id;
                        $story->updateCoverPicture();          
                    } else {
                        header('location:'.BASE.'/Story/editStory/'.$story_id.'?error=Picture Invalid');
                    }
                }
                header('location:'.BASE.'/Story/viewStory/'.$story_id.'?success=Story Editied');
            } else {
                $story = new \App\models\Story();
                $story = $story->findByID($story_id);
                $picture = new \App\models\Picture();
                $picture = $picture->findByPictureID($story->story_picture_id);
                $this->view('Story/editStory', ['story'=>$story, 'picture'=>$picture]);                
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

        function subscribe($story_id){
            $favorite_story = new \App\models\FavoriteStory();
            $favorite_story->profile_id = $_SESSION['profile_id'];
            $favorite_story->story_id = $story_id;
            $favorite_story->insert();
            header('location:'.BASE.'/Story/viewStory/'.$story_id);
        }

        function unsubscribe($story_id){
            $favorite_story = new \App\models\FavoriteStory();
            $favorite_story->profile_id = $_SESSION['profile_id'];
            $favorite_story->story_id = $story_id;
            $favorite_story->delete();
            header('location:'.BASE.'/Story/viewStory/'.$story_id);
        }


    } 
?>