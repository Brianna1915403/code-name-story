<html>
    <head>
        <?= spawnDependenciesWithinView() ?> 
        <title>Code Name: Story | 2fa Setup</title>
    </head>
    <body class='overflow-clip'>
        <?= spawnNavBar() ?>   
        <div class="container mtb50">
            <div class="card">
                <h2 class='setting-header'>To setup your 2-Factor Authentication: </h2>
                <div class="hForm light-theme-bg-main">
                    <section class='mr20'>
                        <img src="<?= BASE ?>/Login/makeQRCode?data=<?= $data ?>" />
                    </section>
                    <section>
                        <div class="2fa-explanation">
                            <p>Please scan the QR-code on the screen with your favorite Authenticator software, such as Google Authenticator.</p> 
                            <p>The authenticator software will generate codes that are valid for 30 seconds only.</p>  
                            <p>Enter such a code while and submit it while it is still valid to confirm that the 2-factor authentication can be applied to your account.</p> 
                        </div><br>
                        <form class='form-2fa' method="post" action="">
                            <label>Current code:<input type="text" name="currentCode" /></label><br><br>
                            <input class='btn light-theme-bg-accent' type="submit" name="action" value="Verify code" />
                            <a class='btn light-theme-bg-accent floatR' href='<?= BASE ?>/Settings/index'>Cancel</a>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <?= spawnFooter() ?>
    </body>
</html>