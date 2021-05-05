<!DOCTYPE html>
<html lang="en">
    <head>
        <?= spawnDependenciesWithinView() ?>  
        <script src="../js/browse.js"></script>
        <title>Code Name: Story | Browse</title>
    </head>
    <body>
        <?= spawnNavBar() ?>
        <?php 
            if (isset($_GET['tags'])) {
                $data['tags'] = $_GET['tags'];
                $story = new \App\models\Story();
                $data['stories'] = $story->findAllStoriesByTag($_GET['tags']);
            } if (isset($_GET['sort'])) {
                $data['sort'] = $_GET['sort'];
                $story = new \App\models\Story();
                $data['stories'] = $story->getAllOrdered($_GET['sort']);
            } if (isset($_GET['search'])) {
                $story = new \App\models\Story();
                $data['stories'] = $story->findBySearch($_GET['search']);
            }
        ?>
        <div class="container">
            <div class="sort-options">
                <form action="<?=BASE?>/Search/browse" method="post">
                    <div class="sort">
                        <select name="sorting" id="">
                            <option value="popular" <?php echo (isset($data['sort']) && $data['sort'] == 'popular'? 'selected' : ''); ?> >Most Popular</option>
                            <option value="recent" <?php echo (isset($data['sort']) && $data['sort'] == 'recent'? 'selected' : ''); ?> >Most Recent</option>
                            <option value="asc" <?php echo (isset($data['sort']) && $data['sort'] == 'asc'? 'selected' : ''); ?> >A-Z</option>
                            <option value="desc" <?php echo (isset($data['sort']) && $data['sort'] == 'desc'? 'selected' : ''); ?> >Z-A</option>
                        </select>
                    </div>
                    <div class='tag-container'>
                        <ul class='tag-list'>
                            <?php 
                                $tag = new \App\models\Tag();
                                $tags = $tag->getAll();
                                foreach ($tags as $tag) {
                                    echo "<li>";
                                    if (is_array($data['tags'])) {
                                        echo "<input type='checkbox' name='tags[]' id='checkbox$tag->tag_id' value='$tag->tag_id' ".(isset($data['tags']) && in_array($tag->tag_id, $data['tags'])? "checked" : "").">";
                                    } else {
                                        echo "<input type='checkbox' name='tags[]' id='checkbox$tag->tag_id' value='$tag->tag_id' ".(isset($data['tags']) && $tag->tag_id == $data['tags']? "checked" : "").">";
                                    }
                                    echo "<label for='checkbox$tag->tag_id'>$tag->name</label>";
                                    echo "</li>";
                                }
                            ?>                         
                        </ul> 
                    </div>
                    <input class='btn light-theme-bg-accent float-right' name='action' type="submit" value="Search & Sort">
                </form>
            </div>
            <h2 class="setting-header">Stories</h2>            
            <?php     
                echo "<div class='container' style='overflow: hidden'>" ;    
                    echo "<ul class='card_lst' style='' >"; 
                        spawnStoryCardWithinCreate($data['stories']);
                    echo "</ul>";                          
                echo "</div>";                          
            ?>
        </div>
        <?= spawnFooter() ?>
    </body>
</html>