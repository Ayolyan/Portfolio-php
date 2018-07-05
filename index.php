<?php
require('controller/frontend.php');

try {
    
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'home':
                home();
                break;
            default:
                home();
        }
    } else {
//        echo("ETTS");
        home();
    }
    
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}