<?php
    namespace App\controllers;

    class HomeController extends \App\core\Controller {
        
        function home() {
            $this->view('home');
        }
    }        
?>