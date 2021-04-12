<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Profile</title>
    </head>
    <body>
        Edit your profile<br /><br />
        <form action="" method="post">
            <label>First Name <input type="text" name="first_name" value="<?= $data->first_name ?>"></label><br />
            <label>Middle Name <input type="text" name="middle_name" value="<?= $data->middle_name ?>"></label><br />
            <label>Last Name <input type="text" name="last_name" value="<?= $data->last_name ?>"></label><br /><br />           

            <input type="submit" name="action" value="Update Profile">
        </form>
        <a href="<?= BASE ?>/Settings/index">Cancel</a>
    </body>
</html>