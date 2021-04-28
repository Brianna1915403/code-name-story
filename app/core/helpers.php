<?php 

    function spawnDependencies() {
        echo "<link rel='icon' type='image/x-ico' href='favicon.ico'/>
                <link rel='stylesheet' href='css/style.css' type='text/css'>
                <link rel='stylesheet' href='css/utilities.css' type='text/css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                <script src='js/navbar.js'></script>";
    }

    function spawnDependenciesWithinView() {
        echo "<link rel='icon' type='image/x-ico' href='../favicon.ico'/>
                <link rel='stylesheet' href='../css/style.css' type='text/css'>
                <link rel='stylesheet' href='../css/utilities.css' type='text/css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
                <script src='../js/navbar.js'></script>";
    }

    function spawnNavBar() {
        echo "<div class='navbar'>
        <div class='container flex'>
            <a href='".BASE."'><div class='logo-light-theme'></div></a>
            <nav>
                <ul>
                    <li class='dropdown'>
                        <a href='".BASE."/Search/browse' class='light-theme-link'>Browse</a>
                        <div class='dropdown-menu light-theme-bg-main'>
                            <ul class='lg header light-theme-bg-accent'>
                                <li><a href='#' id='by-tags' class='browse-options-light selected-light'>By Tags</a></li>
                                <li><a href='#' id='by-numbers' class='browse-options-light'>By Numbers</a></li>
                                <li><a href='".BASE."/Search/browse' id='all' class='browse-options-light'>All</a></li>
                            </ul>
                            <div class='drop-content-tags grid grid-3'>";     
        
        $tag = new \App\models\Tag();
        $tags = $tag->getAll();
        foreach ($tags as $tag) {
            echo "<a href='".BASE."/Search/browse?tags=$tag->name'>$tag->name</a>";
        }
                                
        echo "</div>
                            <div class='drop-content-numbers grid grid-3' style='display: none;'>
                                <a href='#'>Most Popular</a>
                                <a href='#'>Most Recent</a>
                            </div>
                        </div>
                    </li>
                    <li><a href='#' class='light-theme-link'>Create</a></li>
                </ul>
            </nav>
            <input type='search' name='search' id='search' placeholder='Search'>
            <div class='dropdown'>
                <i class='fas fa-user-circle fa-2x'></i>
                <div class='dropdown-content light-theme-bg-main light-theme-text'>
        ";

        if(isset($_SESSION['user_id'])) {
            $user = new \App\models\User();
            $user = $user->findByUserID($_SESSION['user_id']);
            echo "<ul>
                    <li>Logged in as $user->username!</li>
                    <li><a href='#'>Profile</a></li>
                    <li><a href='#'>Favorites</a></li>
                    <li><a href='".BASE."/Settings/index'>Settings</a></li>
                    <li><a href='".BASE."/Login/logout'>Logout <i class='fas fa-sign-out-alt' style='margin-left: 2px;'></i></a></li>
                </ul> ";            
        } else {
            echo "<ul>
                    <li><a href='".BASE."/Login/login'>Login <i class='fas fa-sign-in-alt' style='margin-left: 2px;'></i></a></li>
                </ul>";
        }
        echo "</div></div></div></div>";
    }

    function spawnFooter() {
        echo "<footer class='footer light-theme-bg-accent'>
                <div class='container grid grid-3'>
                    <div>
                        <div class='logo-light-theme'></div>
                        <br>
                        <p>Copyright &copy; 2021</p>
                    </div>        
                    <nav>
                        <ul>
                            <li><a href='".BASE."/home'>Home</a></li>
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