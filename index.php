<?php
require('controller/frontend.php');

try {
    
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'presentation':
                home();
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