<?php
    namespace App\controllers;

    class SearchController extends \App\core\Controller {
        
        #[\App\core\ProfileFilter]
        function index() {
            if(isset($_POST['action'])) {
                $search = $_POST['search'];
                $user = new \App\models\User();
                $users = $user->findBySearch($search);
                $this->view("Search/index", ['users'=>$users, 'search'=>$search]);
            } else {
                $user = new \App\models\User();
                $users = $user->getAll();
                $this->view('Search/index', ['search'=>'', 'users'=>$users]);
            }
        } 

        function browse() {
            if(isset($_POST['action'])) {
                $story = new \App\models\Story();
                if (isset($_POST['tags'])) {
                    $stories = $story->findAllStoriesByTagsOrdered($_POST['tags'], $_POST['sorting']);
                    $this->view('Search/browse', ['stories'=>$stories, 'tags'=>$_POST['tags']]);
                } else {
                    $stories = $story->getAllOrdered($_POST['sorting']);
                    $this->view('Search/browse', ['stories'=>$stories, 'tags'=>[]]);
                }
            } else {
                $story = new \App\models\Story();
                $stories = $story->getAll();
                $this->view('Search/browse', ['stories'=>$stories, 'tags'=>[]]);
            }
        }

        function browseBytag($tag_id){
            $story = new \App\models\Story();
            $story = $story->findAllStoriesByTag($tag_id);
            $this->view('Search/browse', ['stories'=>$story, 'tags'=>$tag_id]);
        }
    }   
?>