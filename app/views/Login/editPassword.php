<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Password</title>
</head>
<body>
    <form action="" method="post">
        <label>Username: <?= $data->username ?> </label><br />
        <label>Password: <input type="password" name="password"></label><br />
        <label>Confirm Password: <input type="password" name="confirm_password"></label><br /><br />

        <input type="submit" name="action" value="Edit Password">
    </form>
    <a href="<?=BASE?>/Settings/index">Cancel</a>
</body>
</html>