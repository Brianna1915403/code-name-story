<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Inbox</title>
    </head>
    <body>
        <table>
            <tr><th>Receiver</th><th>Time</th><th>Status</th><th>Privacy</th></tr>
            <?php 
                foreach ($data as $message) {
                    $profile = new \App\models\Profile();
                    $profile = $profile->findByID($message->receiver);
                    $user = new \App\models\User();
                    $user = $user->findByUserID($profile->user_id);
                    $link = BASE."/Message/viewMessage/$message->message_id";
                    echo "<tr><td><a href='$link'>$user->username</a></td><td><a href='$link'>$message->time_stamp</a></td><td><a href='$link'>$message->read_status</a></td><td><a href='$link'>$message->privacy_status</a></td></tr>";
                }
            ?>
        </table>
        <a href='<?= BASE ?>./Profile/viewProfile/<?= $_SESSION['user_id'] ?>'>Back</a>
    </body>
</html>