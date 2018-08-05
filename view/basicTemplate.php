 <!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>
            <?= $title ?>
        </title>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <div>
            <nav class="leftNav">
                <?= $leftNav ?>
            </nav>
        </div>
        
        <div>
            <nav class="rightNav">
                <?= $rightNav ?>
            </nav>
            <main>
                <?= $content ?>
            </main>
        </div>
    </body>

</html>
