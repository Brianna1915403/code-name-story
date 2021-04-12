<html>
<head>
	<title>2fa Setup</title>
</head>
<body>
    <?php echo ($_SESSION['source'] == "Login" ? "<p>Your account was successfully created!</p>" : ""); ?>
    <img src="<?= BASE ?>/Login/makeQRCode?data=<?= $data ?>" />

    <h3>To setup your 2-Factor Authentication: </h3>
    <p>Please scan the QR-code on the screen with your favorite Authenticator software, such as Google Authenticator.</p> 
    <p>The authenticator software will generate codes that are valid for 30 seconds only.</p>  
    <p>Enter such a code while and submit it while it is still valid to confirm that the 2-factor authentication can be applied to your account.</p> 
    <form method="post" action="">
        <label>Current code:<input type="text" name="currentCode" /></label>
        <input type="submit" name="action" value="Verify code" />
    </form>
    <?php echo "<a href='".BASE.($_SESSION['source'] == "Login" ? "/Login/login" : "/Settings/index")."'>Cancel</a>"; ?>
    
</body>
</html>