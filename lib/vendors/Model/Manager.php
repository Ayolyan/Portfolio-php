<?php
require_once('param.inc.php');

class Manager {
    
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=' . MYHOST . ';dbname=' . MYDB, MYUSER, MYPASS)
        return $db;
    }
    
}