<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class SeriesController extends \App\core\Controller {

        function index() {
            
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