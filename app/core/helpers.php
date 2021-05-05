<?php 

    function spawnDependencies() {
        echo "<link rel='icon' type='image/x-ico' href='favicon.ico'/>";
        if (isset($_SESSION['profile_id'])) {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            switch ($profile->theme) {
                case "light":
                    echo "<link rel='stylesheet' href='css/style.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='css/utilities.css' type='text/css'>";
                  break;
                case "dark":
                    echo "<link rel='stylesheet' href='css/style-dark.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='css/utilities-dark.css' type='text/css'>";
                  break;
                case "green":
                    echo "<link rel='stylesheet' href='css/style-green.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='css/utilities-green.css' type='text/css'>";
                  break;

                case "blue":
                    echo "<link rel='stylesheet' href='css/style-blue.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='css/utilities-blue.css' type='text/css'>";
                  break;
            }   
        } else {
            echo "<link rel='stylesheet' href='css/style.css' type='text/css'>";
            echo "<link rel='stylesheet' href='css/utilities.css' type='text/css'>";
        }
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>";
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
        echo "<script src='js/navbar.js'></script>";
    }

    function spawnDependenciesWithinView() {
        echo "<link rel='icon' type='image/x-ico' href='../favicon.ico'/>";
        if (isset($_SESSION['profile_id'])) {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            switch ($profile->theme) {
                case "light":
                    echo "<link rel='stylesheet' href='../css/style.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../css/utilities.css' type='text/css'>";
                    break;
                case "dark":
                    echo "<link rel='stylesheet' href='../css/style-dark.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../css/utilities-dark.css' type='text/css'>";
                    break;
                case "green":
                    echo "<link rel='stylesheet' href='../css/style-green.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../css/utilities-green.css' type='text/css'>";
                    break;

                case "blue":
                    echo "<link rel='stylesheet' href='../css/style-blue.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../css/utilities-blue.css' type='text/css'>";
                    break;
                default:
                    echo "<link rel='stylesheet' href='../css/style.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../css/utilities.css' type='text/css'>";
                    break;
            }   
        } else {
            echo "<link rel='stylesheet' href='../css/style.css' type='text/css'>";
            echo "<link rel='stylesheet' href='../css/utilities.css' type='text/css'>";
        }
        echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.1/css/all.css' integrity='sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz'
        crossorigin='anonymous'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>";
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
        echo "<script src='../js/navbar.js'></script>";
    }

    function spawnDependenciesWithinViewWithArgument(){
        echo "<link rel='icon' type='image/x-ico' href='../favicon.ico'/>";
        if (isset($_SESSION['profile_id'])) {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            switch ($profile->theme) {
                case "light":
                    echo "<link rel='stylesheet' href='../../css/style.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../../css/utilities.css' type='text/css'>";
                    break;
                case "dark":
                    echo "<link rel='stylesheet' href='../../css/style-dark.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../../css/utilities-dark.css' type='text/css'>";
                    break;
                case "green":
                    echo "<link rel='stylesheet' href='../../css/style-green.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../../css/utilities-green.css' type='text/css'>";
                    break;

                case "blue":
                    echo "<link rel='stylesheet' href='../../css/style-blue.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../../css/utilities-blue.css' type='text/css'>";
                    break;
                default:
                    echo "<link rel='stylesheet' href='../../css/style.css' type='text/css'>";
                    echo "<link rel='stylesheet' href='../../css/utilities.css' type='text/css'>";
                    break;
            }   
        } else {
            echo "<link rel='stylesheet' href='../../css/style.css' type='text/css'>";
            echo "<link rel='stylesheet' href='../../css/utilities.css' type='text/css'>";
        }
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>";
        echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>";
        echo "<script src='../../js/navbar.js'></script>";
    }

    function spawnNavBar() {
        echo "<div class='navbar'><div class='container flex'>";
        if (isset($_SESSION['profile_id'])) {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            switch ($profile->theme) {
                case "light": echo "<a href='".BASE."'><div class='logo-dark'></div></a>"; break;
                case "dark": echo "<a href='".BASE."'><div class='logo-light'></div></a>"; break;
                case "green": echo "<a href='".BASE."'><div class='logo-light'></div></a>"; break;
                case "blue": echo "<a href='".BASE."'><div class='logo-light'></div></a>"; break;
                default: echo "<a href='".BASE."'><div class='logo-dark'></div></a>"; break;
            }   
        } else {
            echo "<a href='".BASE."'><div class='logo-dark'></div></a>";
        }

        echo "<nav><ul><li class='dropdown'>";
        echo "<a href='".BASE."/Search/browse' class='light-theme-link'>Browse</a>";
        echo "<div class='dropdown-menu light-theme-bg-main'  style='z-index: 30;'>";
        echo "<ul class='lg header light-theme-bg-accent'>";
        echo "<li><a href='".BASE."/Search/browse' id='by-tags' class='browse-options-light selected-light'>Tags</a></li>";
        echo "<li><a href='".BASE."/Search/browse' id='by-numbers' class='browse-options-light'>Sort</a></li>";
        echo "<li><a href='".BASE."/Search/browse' id='all' class='browse-options-light'>All</a></li>";
        echo "</ul><div class='drop-content-tags grid grid-3'>";         
        
        $tag = new \App\models\Tag();
        $tags = $tag->getAll();
        foreach ($tags as $tag) {
            echo "<a href='".BASE."/Search/browse?tags=$tag->tag_id'>$tag->name</a>";
        }
                                
        echo "</div><div class='drop-content-numbers grid grid-3' style='display: none;'>";
        echo "<a href='".BASE."/Search/browse?sort=popular'>Most Popular</a><a href='".BASE."/Search/browse?sort=recent'>Most Recent</a>";
        echo "<a href='".BASE."/Search/browse?sort=asc'>A-Z</a><a href='".BASE."/Search/browse?sort=desc'>Z-A</a></div></div></li>";
        echo "<li><a href='".BASE."/Story/storyList' class='light-theme-link'>Create</a></li></ul></nav>";
        echo "<input type='search' name='search' id='search' placeholder='Search'>";
        echo "<div class='dropdown'><i class='fas fa-user-circle fa-2x'></i>";
        echo "<div class='dropdown-content light-theme-bg-main light-theme-text'>";

        if(isset($_SESSION['user_id'])) {            
            echo "<ul>
                    <li>Logged in as ".$_SESSION['username']."!</li>
                    <li><a href='".BASE."/Profile/viewProfile/".$_SESSION['profile_id']."'>Profile</a></li>
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
                    <div>";
        if (isset($_SESSION['profile_id'])) {
            $profile = new \App\models\Profile();
            $profile = $profile->findByID($_SESSION['profile_id']);
            switch ($profile->theme) {
                case "light": echo "<a href='".BASE."'><div class='logo-dark'></div></a>"; break;
                case "dark": echo "<a href='".BASE."'><div class='logo-light'></div></a>"; break;
                case "green": echo "<a href='".BASE."'><div class='logo-light'></div></a>"; break;
                case "blue": echo "<a href='".BASE."'><div class='logo-light'></div></a>"; break;
                default: echo "<a href='".BASE."'><div class='logo-dark'></div></a>"; break;
            }   
        } else {
            echo "<a href='".BASE."'><div class='logo-dark'></div></a>";
        }
        echo "<br><p>Copyright &copy; 2021</p>
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

    function spawnStoryCard($stories) {
        foreach ($stories as $story) {
            $story_tag = new \App\models\StoryTag();
            $story_tags = $story_tag->getAllFromStory($story->story_id);
            if ($story->story_picture_id != null) {
                $picture = new \App\models\Picture();
                $picture = $picture->findByPictureID($story->story_picture_id);
            }
            echo "<li>";
                echo "<a href='".BASE."/Story/viewStory/$story->story_id' class='card_item NPI=a:list,i:2574,r:2,g:en_en' >";
                    echo "<div class='card_flipper'>";
                        echo "<div class='card_front'>";
                            echo $story->story_picture_id == null? "<img src='' alt='' width='210' height='210'>" : "<img src='../../uploads/$picture->filename' alt=\"$picture->alt\" width='210' height='210'>";
                        echo "</div>";
                        echo "<div class='card_back'>";
                            echo "<div class='info'>";
                                echo "<h3 class='subj'>$story->title</h3>";
                                echo "<p class='author'>$story->author</p>";
                                echo "<p class='grade_area'>";
                                    echo "<span class='ico_like3'>Likes: </span><em class='grade_num'>UNKNOWN</em>";
                                echo "</p>";
                                echo "<span class='genre'>";
                                    foreach($story_tags as $story_tag) {
                                        echo "#".$story_tag->getTagName()." ";
                                    }
                                echo "</span>";
                                echo "<p class='line'></p>";
                                echo "<p class='summary'>$story->description</p>";
                            echo "</div>";
                        echo "</div>"; 
                    echo "</div>";
                echo "</a>"; 
            echo "</li>";
            $story_tags = [];
        } 
    }

    function spawnStoryCardWithinCreate($stories) {
        foreach ($stories as $story) {
            $story_tag = new \App\models\StoryTag();
            $story_tags = $story_tag->getAllFromStory($story->story_id);
            if ($story->story_picture_id != null) {
                $picture = new \App\models\Picture();
                $picture = $picture->findByPictureID($story->story_picture_id);
            }
            echo "<li>";
                echo "<a href='".BASE."/Story/viewStory/$story->story_id' class='card_item NPI=a:list,i:2574,r:2,g:en_en' >";
                    echo "<div class='card_flipper'>";
                        echo "<div class='card_front'>";
                            echo $story->story_picture_id == null? "<img src='' alt='' width='210' height='210'>" : "<img src='../uploads/$picture->filename' alt=\"$picture->alt\" width='210' height='210'>";
                        echo "</div>";
                        echo "<div class='card_back'>";
                            echo "<div class='info'>";
                                echo "<h3 class='subj'>$story->title</h3>";
                                echo "<p class='author'>$story->author</p>";
                                echo "<p class='grade_area'>";
                                    echo "<span class='ico_like3'>Likes: </span><em class='grade_num'>UNKNOWN</em>";
                                echo "</p>";
                                echo "<span class='genre'>";
                                    foreach($story_tags as $story_tag) {
                                        echo "#".$story_tag->getTagName()." ";
                                    }
                                echo "</span>";
                                echo "<p class='line'></p>";
                                echo "<p class='summary'>$story->description</p>";
                            echo "</div>";
                        echo "</div>"; 
                    echo "</div>";
                echo "</a>"; 
            echo "</li>";
            $story_tags = [];
        } 
    }
?>