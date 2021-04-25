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
            $this->view('Search/browse');
        }
    }   
?>