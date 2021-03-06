<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class PictureController extends \App\core\Controller {
        function upload($file, $alt, $artist) {
            if ($file['tmp_name'] == "") {
                return false;
            } else {
                $check = getimagesize($file['tmp_name']);
                $allowedTypes = ['image/gif', 'image/jpg', 'image/jpeg', 'image/png'];
                if ($check !== false && in_array($check['mime'], $allowedTypes)) {
                    // Continue w/ upload since it is the proper type
                    $extensions = ['image/gif'=>'gif', 'image/jpg'=>'jpg', 'image/jpeg'=>'jpg','image/png'=>'png'];
                    $extension = $extensions[$check['mime']];
    
                    $targetFolder = 'uploads/';
                    $targetFile = uniqid().'.'.$extension;
    
                    if (move_uploaded_file($file['tmp_name'], $targetFolder.$targetFile)) {
                        // Save the file information to the Database
                        $picture = new \App\models\Picture();
                        $picture->filename = $targetFile;
                        $picture->alt = $alt;
                        $picture->artist = $artist;
                        $picture->profile_id = $_SESSION['profile_id'];
                        $picture->insert();
                        return true;
                    }
                    return false;
                }
            }
        }

        function delete($picture_id) {
            $picture = new \App\models\Picture();
            $picture = $picture->findByPictureID($picture_id);                
            $path = getcwd().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$picture->filename;
            if (unlink($path)) {
                $picture->delete();
                return true;
            } else {
                return false;
            }
        }        
    }
?>