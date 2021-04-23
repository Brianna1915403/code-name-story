<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Upload an Image</title>
    </head>
    <body>
        <p>Upload a picture to your wall!</p>
        <form action="" method="post" enctype="multipart/form-data">
        <label>Select an image to upload: <input type="file" name="upload" /></label><br>
            <textarea name="caption" placeholder="Image Caption" cols="50" maxlength="100"></textarea><br><br>
            
            <input type="submit" name="action" value="Upload Image" />
            <a href="<?=BASE?>/Profile/viewProfile/<?= $_SESSION['user_id'] ?>">Cancel</a>
        </form>        
    </body>
</html>