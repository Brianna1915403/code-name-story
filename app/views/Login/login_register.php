<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinView() ?>
    <title>Code Name: Story | Login/Register</title>
</head>
<body>
    <?= spawnNavBar() ?>
    <div class="login-form">
        <form action="" method="post">
            <label>Username <input type="text" name="username"></label><br />
            <label>Password <input type="password" name="password"></label><br />
            
            <input type="submit" name="login" value="Login">
        </form>
    </div>
    <div class="register-form">  
        <form action="" method="post">
            <label>Username <input type="text" name="username"></label><br />
            <label>Password <input type="password" name="password"></label><br />
            <label>Confirm Password <input type="password" name="confirm_password"></label><br />
            <label>Activate 2 Factor Authentication? <input type="checkbox" name="2fa"> Yes</label><br /><br />

            <input type="submit" name="register" value="Register">
        </form>
    </div>  
    <?= spawnFooter() ?>
</body>
</html>