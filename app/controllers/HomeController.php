<?php
    namespace App\controllers;

    class HomeController extends \App\core\Controller {
        
        function index() {
            $this->view('Home');
        }
    }        
?>