<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title ?>
    </title>
    <link rel="icon" href="/images/iconYB.png"/>
    <link href="/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src="/js/main.js"></script>
</head>

<body>
    <?= $content ?>
    <?php
        if (isset($_SESSION['flash'])) {
            include("flashPopupTemplate.php");
        }
    ?>
</body>

</html>