<?php $title = 'Accueil' ?>

<?php ob_start(); ?>
<h2>Qui suis-je ?</h2>

<p>
    Bienvenue sur mon portfolio, je m'appelle Yoan Bidet, j'ai 19 ans et je suis actuellement étudiant à l'IUT de Laval dans le DUT Métiers du Multimédia et de l'Internet.
</p>

<p>
    J'adore tout ce qui touche au domaine de la programmation.
</p>
<?php $content = ob_get_clean(); ?>

<?php require('view/basicTemplate.php'); ?>
