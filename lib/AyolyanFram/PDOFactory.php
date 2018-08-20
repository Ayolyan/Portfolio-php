<?php
/**
 * Created by PhpStorm.
 * User: Yoan
 * Date: 13/08/2018
 * Time: 00:13
 */

namespace AyolyanFram;


class PDOFactory {
    public static function getMysqlConnexion() {
        $db = new \PDO('mysql:host=localhost;dbname=portfolio', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}