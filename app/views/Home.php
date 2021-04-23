<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnCSSDependencies() ?>
        <script src="js/home.js"></script>
        <title>Login</title>
    </head>
    <body>        
        <?= spawnNavBar() ?>
        <!-- Reader -->
        <section class="reader">
            <div class="container">
                <div class="card grid light-theme-bg-main light-theme-text">
                    <div class="description-text text-theme-light">
                        <h2>Dive into Wonderus Adventures!</h2>
                        <p> As a reader explore wonderful and exciting worlds created by users like you! Touching all types of genres from fantasy, to horror and a dash of comedy. We are sure you will find something to enjoy, and look forward to when new chapters are published!</p>
                        <br />
                        <p> If you don’t yet know what to read you can either browse our collection, while filtering genres, or we can serve you a randomly picked story!</p>
                    </div>
                    <i class="fas fa-book-open fa-5x"></i>
                    <div class="options">
                        <a href="#" class="btn btn-light-theme-accent">Browse</a>
                        <a href="#" class="btn btn-light-theme-accent">Random Story</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Writer -->
        <section class="writer">
            <div class="container">
                <div class="card grid light-theme-bg-accent light-theme-text">
                    <div class="description-text text-theme-light">
                        <h2>Create Marvelous Stories!</h2>
                        <p> If you cannot find the perfect story for you or your creativity is simply bursting. Why not try your hand at writing! Your story can be the perfect touch to brighten someone’s day, and not to mention you can share your world with others!</p>
                        <br />
                        <p> So why not give it a try?</p>
                    </div>
                    <i class="fas fa-pen fa-5x"></i>
                    <a href="#" class="btn btn-light-theme-main">Create You Story!</a>                                       
                </div>
            </div>
        </section>
        <?= spawnFooter() ?>
    </body>
</html>