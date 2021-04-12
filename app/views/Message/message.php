<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Message</title>
    </head>
    <body>
        <table>
            <?php 
                $profile = new \App\models\Profile(); 
                $isReceiver = $data->receiver == $profile->findByUserID($_SESSION['user_id'])->profile_id 
            ?>
            <tr><th> <?= $isReceiver? "Sender" : "Receiver" ?></th><th>Time</th>
            <?php                 
                $profile = $isReceiver? $profile->findByID($data->sender) : $profile->findByID($data->receiver);
                $user = new \App\models\User();
                $user = $user->findByUserID($profile->user_id);
                echo "<tr><td>$user->username</td><td>$data->time_stamp</td></tr><br>";
            ?>
        </table>
        <p style='margin: 2px 10px;'><?= $data->message ?></p><br>

        <!-- FIX: Make outbox come here too -->
        <?php
            if ($isReceiver) {
                echo "<form action='' method='post'>";
                    echo "<select name='read_status'>";
                        echo "<option value='read' selected>read</option>";
                        echo "<option value='unread'>unread</option>";
                        echo "<option value='reread'>reread</option>";
                    echo "</select>";
                    echo "<input type='submit' name='action' value='Update Status'>";
                echo "</form>";
                echo "<a style='margin-right: 10px;' href='".BASE."/Profile/viewProfile/$user->user_id'>Reply</a>";
                echo "<a style='margin-right: 10px;' href='".BASE."/Message/viewInbox'>Back</a>";
                echo "<a href='".BASE."/Message/delete/$data->message_id'>Delete</a>"; 
            } else {
                echo "<a style='margin-right: 10px;' href='".BASE."/Message/viewOutbox'>Back</a>";
            }
        ?>
    </body>
</html>