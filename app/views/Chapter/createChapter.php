<!DOCTYPE html>
<html lang="en">
<head>
    <?= spawnDependenciesWithinViewWithArgument() ?>   
    <script src="<?= BASE ?>/app/core/RichText-v.1.0.16/RichText-v.1.0.16/src/jquery.richtext.min.js"></script>
    <link rel="stylesheet" href="<?= BASE ?>/app/core/RichText-v.1.0.16/RichText-v.1.0.16/src/richtext.min.css">
    <title>Code Name: Story | Create Chapter</title>
</head>
<body>
    <?= spawnNavBar() ?>
    <div class="container">
        <div class="card mtb50">
            <h2 class='setting-header'>Create Your Story</h2>
            <form action="" method="post">
                <label>Chapter Title: <input type="text" name="chapter_title" value='<?= "Chapter ".($data + 1) ?>' required></label><br><br>
                <textarea id='chapter_text' name="chapter_text" placeholder="Write you chapter" maxlenght=50000 style="font-family: Open Sans Condensed, sans-serif !important;" required></textarea><br><br>           
                <input class='btn light-theme-bg-accent' type="submit" name='action' value="Create Story">
            </form>
        </div>
    </div>
    <?= spawnFooter() ?>
    <script>
        $(document).ready(function() {
            $('#chapter_text').richText({
                leftAlign: false,
                centerAlign: false,
                rightAlign: false,
                ol: false,
                justify: false,
                fonts: false,
                fontColor: false,
                fontSize: false,
                imageUpload: false,
                fileUpload: false,
                videoEmbed: false,
                urls: false,
                table: false,
                removeStyles: false,
                maxlenght: 50000,
                useSingleQuotes: true,
                code: false
            });
        })
    </script>
</body>
</html>