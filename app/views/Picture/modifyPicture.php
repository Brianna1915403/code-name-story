<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Caption</title>
    <link rel="stylesheet" href="../../css/modifyPicture.css">
</head>
<body>
    <img src='<?= BASE ?>/uploads/<?= $data->filename ?>' />
    <form action="" method="post">
        <label>Caption: <textarea name="caption"><?= $data->caption ?></textarea></label><br />
        <input type="submit" name="action" value="Modify Caption">
    </form>
    <form action="" method="post">        
        <input type="submit" name="delete" id="delete" value="Delete Picture">
    </form>
    <a href="<?=BASE?>/Profile/viewProfile/<?= $_SESSION['user_id'] ?>">Cancel</a>
</body>
</html>