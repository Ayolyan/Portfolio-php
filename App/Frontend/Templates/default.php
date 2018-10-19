<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title ?>
    </title>
    <meta name="author" content="Yoan Bidet">
    <meta name="description" content="Consulter le portfolio et la présentation de Yoan Bidet, Étudiant en 1ère année du DUT Métiers du Multimédia et de l'Internet (MMI - Ex-SRC) à l'IUT de Laval. Dévelopement WEB, Communication et Audiovisuel.">
    <meta name="keywords" content="Yoan Bidet, Étudiant, IUT, DUT, MMI, Métiers Multimédia et Internet, SRC, Laval, Développement WEB, Programmation">
    <meta name="contact" content="yoan_bidet@orange.fr" />
    <!--Open Graph-->
    <meta property="og:site_name" content="Yoan Bidet" />
    <meta property="og:url" content="https://yoanbidet.fr/" />
    <meta property="og:description" content="Consulter le portfolio et la présentation de Yoan Bidet, Étudiant en 2ème année du DUT Métiers du Multimédia et de l'Internet (MMI - Ex-SRC) à l'IUT de Laval. Dévelopement WEB, Communication et Audiovisuel." />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="fr_FR" />
    <link rel="icon" href="/images/iconYB.png"/>
    <link href="/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script type="text/javascript" src="/js/main.js"></script>
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