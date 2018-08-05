<?php
require('controller/frontend.php');

try {
    
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'presentation':
                home();
                break;
            case 'skills':
                skills();
                break;
            case 'chinesePortrait':
                chinesePortrait();
                break;
            case 'gallery':
                if (isset($_GET['item'])) {
                    galleryItem();
                } else {
                    gallery();
                }
                break;
            case 'contact':
                contact();
                break;
            default:
                home();
        }
    } else {
        home();
    }
    
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}