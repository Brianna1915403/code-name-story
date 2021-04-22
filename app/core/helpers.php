<?php 

    function spawnCSSDependencies() {
        echo "<link rel='stylesheet' href='css/style.css' type='text/css'>
                <link rel='stylesheet' href='css/utilities.css' type='text/css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>";
    }

    function spawnNavBar() {
        echo "<div class='navbar'>
                <div class='container flex'>
                    <div class='logo-light-theme'></div>
                    <nav>
                        <ul>
                            <li><a href='#' class='link-theme-light'>Browse</a></li>
                            <li><a href='#' class='link-theme-light'>Create</a></li>
                        </ul>
                    </nav>
                    <input type='search' name='search' id='search' placeholder='Search'>
                    <a href='#'><i class='fas fa-user-circle fa-2x'></i></a>
                </div>
            </div>";
    }

    function spawnFooter() {
        echo "<footer class='footer bg-accent-light-theme'>
                <div class='container grid grid-3'>
                    <div>
                        <div class='logo-light-theme'></div>
                        <br>
                        <p>Copyright &copy; 2021</p>
                    </div>        
                    <nav>
                        <ul>
                            <li><a href='Home.php'>Home</a></li>
                            <li><a href='#'>Browse</a></li>
                            <li><a href='#'>Create</a></li>
                        </ul>
                    </nav>
                    <div class='social'>
                        <a href='https://github.com/Brianna1915403/code-name-story'><i class='fab fa-github fa-2x'></i></a>
                        <a href='#'><i class='fab fa-facebook fa-2x'></i></a>
                        <a href='#'><i class='fab fa-instagram fa-2x'></i></a>
                        <a href='#'><i class='fab fa-twitter fa-2x'></i></a>
                    </div>
                </div>
            </footer>";
    }
?>