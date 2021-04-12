<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
    <form action="" method="post">
        <label>Username <input type="text" name="username"></label><br />
        <label>Password <input type="password" name="password"></label><br />
        <label>Confirm Password <input type="password" name="confirm_password"></label><br />
        <label>Activate 2 Factor Authentication? <input type="checkbox" name="2fa"> Yes</label><br /><br />

        <input type="submit" name="action" value="Register">
    </form>
    <a href="<?=BASE?>/Login/login">Cancel</a>
</body>
</html>