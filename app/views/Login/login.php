<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinView() ?>    
    <title>Code Name: Story | Login/Register</title>
</head>
<body class="light-theme-bg-accent">
    <?= spawnNavBar() ?>
    <!-- Forms -->
    <div class="container">
        <div class="hForm card light-theme-bg-main">
            <?php 
                if(isset($_GET['error'])) {
                    echo "<div class='error'>
                        <i class='fas fa-info-circle'></i>
                        <span id='#error-text' style='margin-left: 5px;'>".$_GET['error']."!</span></div>";
                }
            ?>
            <section class="login-form">
                <header>
                    <h2>Login</h2>
                    <p>Have an account? Log in below.</p>
                </header>                
                <form action="" method="post">
                    <label>Username <input type="text" name="username" required></label><br /><br />
                    <label>Password <input type="password" name="password" required></label><br /><br />
                    
                    <input class="btn light-theme-bg-accent light-theme-text" type="submit" name="login" value="Login">
                </form>
                <footer>
                    Having trouble login in? Maybe you don't have an account?
                </footer>
            </section>
            <section class="registration-form">
                <header>                    
                    <h2>Register</h2>
                    <p>Don't have an account? What are you waiting for!?</p>
                </header> 
                <form action="" method="post">
                    <label>Username <input type="text" name="username" required></label><br /><br />
                    <label>Password <input type="password" name="password" required></label><br /><br />
                    <label>Confirm Password <input type="password" name="confirm_password" required></label><br /><br />

                    <input class="btn light-theme-bg-accent light-theme-text" type="submit" name="register" value="Register">
                </form>
                <footer>
                    Having trouble registering? Open an issue on our GitHub.
                </footer>
            </section>
        </div>
    </div>
    <?= spawnFooter() ?>
</body>
</html>