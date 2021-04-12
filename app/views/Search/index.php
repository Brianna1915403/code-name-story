<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>
        <form method="post">
            <label>Search: <input type="text" name="search" value='<?= $data['search']?>'> <button name="action" type="submit">Search</button> </label> <a href="<?=BASE?>/Profile/viewProfile/<?= $_SESSION['user_id'] ?>">Home</a><br><br>
        </form> 
        <?php
            $profile = new \App\models\Profile();
            if ($data['users'] !== [] && !(count($data['users']) == 1 && $profile->findByUserID($data['users'][0]->user_id) == null)) {
                echo "<table><tr><th>Username</th></tr>";
                foreach($data['users'] as $user) {
                    
                    if ($profile->findByUserID($user->user_id) != null)
                        echo "<tr><td><a href='".BASE."/Profile/viewProfile/$user->user_id'>$user->username</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "No Users Found.";
            }
        ?>
    </body>
</html>