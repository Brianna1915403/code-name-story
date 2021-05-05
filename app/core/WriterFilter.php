<?php
    namespace App\core;
    
    #[\Attribute]
    class WriterFilter {
        public function execute() {
            if ($_SESSION['account_type'] != "writer") {
                header('location:'.BASE.'/Settings/index');
            }
        }
    }
?>
