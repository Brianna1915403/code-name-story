<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView() ?>
        <script src="../js/createProfile.js"></script>
        <title>Profile Creation</title>
    </head>
    <body class="light-theme-bg-accent">
        <?= spawnNavBar() ?>
        <div class="container mb70">
            <div class="hForm card light-theme-bg-main">                
                <section class="profile-form">
                    <header>
                        <h2>Create Your Profile!</h2>
                        <p>Let the world know who you are!</p>
                    </header>                
                    <form action="" method="post">                                  
                        <label>What your type would you like to be? <select id="account-type" name="account_type">
                            <option value="reader">Reader</option>
                            <option value="writer">Writer</option>
                        </select></label><br />
                        <div id="account-type-description">
                            As a reader you can keep track of all the stories you love, while showing their creatures love in the comments!
                        </div>
                        <textarea name="description" cols="50" rows="5" maxlength='255' placeholder="Describe yourself!"></textarea><br /><br />
                        <input class='btn light-theme-bg-accent light-theme-text' type="submit" name="action" value="Create Profile">
                    </form>
                </section>
            </div>
        </div>        
        <?= spawnFooter() ?>
    </body>
</html>