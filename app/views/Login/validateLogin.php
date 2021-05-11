<html>
<head>
    <?= spawnDependenciesWithinView() ?> 
	<title>Code Name: Story | 2fa Verification</title>
</head>
<body class='overflow-clip'>
        <?= spawnNavBar() ?>   
        <div class="container mtb50">
            <div class="card">
                <h2 class='setting-header'>To setup your 2-Factor Authentication: </h2>
                <section>
                    <p>Validate your login by providing your 6-digit passcode.</p>
                    <form method="post" action="">
                        <label>Current code:<input type="text" name="currentCode" /></label><br><br>
                        <input class='btn light-theme-bg-accent' type="submit" name="action" value="Verify code" />
                    </form>
                </section>
            </div>
        </div>
        <?= spawnFooter() ?>
    </body>
</html>