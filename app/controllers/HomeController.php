<?php
    namespace App\controllers;

    class HomeController extends \App\core\Controller {
        
        #[\App\core\ProfileFilter]
        function home() {
            $this->view('home');
        }
    }        
?>