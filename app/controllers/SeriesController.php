<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class SeriesController extends \App\core\Controller {

        function index() {
            
        }

        function createSeries(){
            if(isset($_POST['action'])){
                $story = new \App\models\Story();
                $story->profile_id = $_SESSION['profile_id'];
                $story->title = $_POST['title'];
                $story->tags = $_POST['tags'];
                $story->favorites = $_POST['favorites'];
                $story->series_id = $_POST['series_id'];
                $story->author = $_POST['author'];
                $story->insert();
                header('location:'.BASE.'/Series/viewAllSeriesByProfile/'.$_SESSION['profile_id']);
             } else {
                 $this->view('Story/createSeries');
             }
        }

        function viewSeries($series_id){
            $series = new \App\models\Series();
            $series = $story->findByID($series_id);
            $this->view('Story/viewSeriesInfo', $series);
        }

        function viewAllSeriesByProfile($profile_id){
            $series = new \App\models\Series();
            $series = $story->findByProfile($profile_id);
            $this->view('Story/viewAllSeriesForUser', $series);
        }

        function viewAllMySeries(){
            $series = new \App\models\Series();
            $series = $series->findByProfile($_SESSION['profile_id']);
            $this->view('Story/viewAllMySeries', $series);
        }


    } 
?>