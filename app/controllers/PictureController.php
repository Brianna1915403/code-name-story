<?php
    namespace App\controllers;

    #[\App\core\LoginFilter]
    class PictureController extends \App\core\Controller {
        function upload() {
            if (isset($_POST['action'])) {
                if (isset($_FILES['upload'])) {
                    $check = getimagesize($_FILES['upload']['tmp_name']);
                    $allowedTypes = ['image/gif', 'image/jpg', 'image/jpeg', 'image/png'];
                    if ($check !== false && in_array($check['mime'], $allowedTypes)) {
                        // Continue w/ upload since it is the proper type
                        $extensions = ['image/gif'=>'gif', 'image/jpg'=>'jpg', 'image/jpeg'=>'jpg','image/png'=>'png'];
                        $extension = $extensions[$check['mime']];

                        $targetFolder = 'uploads/';
                        $targetFile = uniqid().'.'.$extension;

                        if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFolder.$targetFile)) {
                            // Save the file information to the Database
                            $profile = new \App\models\Profile();
                            $profile = $profile->findByUserID($_SESSION['user_id']);
                            $picture = new \App\models\Picture();
                            $picture->filename = $targetFile;
                            $picture->caption = $_POST['caption'];
                            $picture->profile_id = $profile->profile_id;
                            $picture->insert();
                            header('location:'.BASE.'/Profile/viewProfile/'.$_SESSION['user_id']);
                        } else {
                            echo 'Error ';
                        }
                    } else {
                        header('location:'.BASE.'/Picture/upload?error=Invalid File Format');
                    }
                }
            } else {
                $this->view('Picture/upload');
            }
        }

        // TODO: Refactor 
        function edit($picture_id) {
            if (isset($_POST['action'])) {
                $picture = new \App\models\Picture();
                $picture = $picture->findByPictureID($picture_id);
                $picture->caption = $_POST['caption'];
                $picture->update();
                header('location:'.BASE.'/Profile/viewProfile/'.$_SESSION['user_id']);
            } if (isset($_POST['delete'])) {
                $picture = new \App\models\Picture();
                $picture = $picture->findByPictureID($picture_id);
                
                $path = getcwd().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$picture->filename;
                unlink($path);
                $picture->delete();
                header('location:'.BASE.'/Profile/viewProfile/'.$_SESSION['user_id']);
            } else {
                $picture = new \App\models\Picture();
                $picture = $picture->findByPictureID($picture_id);
                $this->view('Picture/modifyPicture', $picture);
            }
        }
    }
?>